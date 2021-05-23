<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\FebruaryDistribution;
use App\Models\JanuaryDistribution;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PayController extends Controller
{
    public function payBeneficiary()
    {
        return view('backend.user.beneficiary.pay');
    }

    /**
     * @return Application|FactoryAlias|View
     * @throws \Exception
     * @throws \Exception
     */
    function distribution(Request $request)
    {

        $currentUnionId = Auth::user()->union_id;

        if ($request->ajax()) {
            $currentUnionId = Auth::user()->union_id;


            if ($request->has('search') && !empty($request->search['value'])) {

                $searchKey = $request->search['value'];
                $distributions = DB::select("select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where beneficiaries.union_id='$currentUnionId'
                    and beneficiaries.mobile like '%$searchKey%'
                    or beneficiaries.nid like '%$searchKey%'
                    or beneficiaries.name like '%$searchKey%'
                    or beneficiaries.fh_name like '%$searchKey%'");
                /*echo "select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where
                          beneficiaries.union_id='$currentUnionId'
                    or beneficiaries.mobile like '%$searchKey%'
                    or beneficiaries.nid like '%$searchKey%'
                    or beneficiaries.name like '%$searchKey%'
                    or beneficiaries.fh_name like '%$searchKey%' limit 10;
                    ";
                exit;*/


            } else {

                $distributions = DB::select("select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where distributions.union_id='$currentUnionId' order by rand() limit 10");
            }
            return Datatables::of($distributions)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->status == 0) {
                        $message = 'প্রদান করুন';
                        $btn = '<a rowid="' . $row->distribution_id . '" data-toggle="modal" class="btn btn-primary btn-sm modalOTP">
<i  class="fa fa-hand-o-up"></i>
' . $message . '</a>';
                    } else {
                        $message = 'প্রদান হয়েছে';
                        $btn = '<a rowid="' . $row->distribution_id . '" class="btn btn-success btn-sm">
<i  class="fa fa-money"></i>
' . $message . '</a>';
                    }
                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }


        /* $status = Distribution::select('status',DB::raw('count(id) as total'))
             ->where('union_id',$currentUnionId)
              ->groupBy('status')
              ->get()
              ;
          return $status;*/

        $data = [
            'distribution' => self::distributionUnion($currentUnionId),
            'last_distributed' => Distribution::with('beneficiary')
                ->where(['union_id' => $currentUnionId, 'status' => 1])
                ->orderBy('updated_at', 'desc')
                ->first(),
            'distributed' => Distribution::where(['status' => 1, 'union_id' => $currentUnionId])->count(),
            'not_distributed' => Distribution::where(['status' => 0, 'union_id' => $currentUnionId])->count(),
            'total' => Distribution::where('union_id', $currentUnionId)->count(),
            'union_id' => $currentUnionId
        ];
        return view('backend.user.beneficiary.distribution1')->with($data);
    }


    /**
     * @param $union_id
     * @return array
     */
    private static function distributionUnion($union_id)
    {
        $stockObject = DB::table('stocks')
            ->select(DB::raw('sum(stocks.amount) as stock'))
            ->where(
                [
                    'stocks.union_id' => $union_id,
                ]
            )->first();

        if ($stockObject == null) {
            $total_stock = 0;
        } else {
            $total_stock = $stockObject->stock;
        }
        $distributionObject = DB::table('distributions')
            ->select(DB::raw('(count(distributions.id)) * 450 as total_distributed'))
            ->where(
                [
                    'distributions.union_id' => $union_id,
                    'distributions.status' => 1
                ]
            )->first();

        if ($distributionObject == null) {
            $total_distribution = 0;
        } else {
            $total_distribution = $distributionObject->total_distributed;
        }

        return [
            'distribution' => $total_distribution,
            'stock' => $total_stock,
            'due_distribution' => $total_stock - $total_distribution
        ];

    }


}
