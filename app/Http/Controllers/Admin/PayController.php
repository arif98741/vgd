<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Providers\DistributionHelper;
use Auth;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PayController extends Controller
{
    /**
     * @return Application|FactoryAlias|View
     */
    public function payBeneficiary()
    {
        return view('backend.admin.beneficiary.pay');
    }

    /**
     * @return Application|FactoryAlias|View
     * @throws Exception
     * @throws Exception
     */
    function distribution(Request $request)
    {
        if ($request->ajax()) {

            if ($request->has('search') && !empty($request->search['value'])) {

                $searchKey = $request->search['value'];
                $distributions = DB::select("select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where beneficiaries.mobile like '%$searchKey%'
                    or beneficiaries.nid like '%$searchKey%'
                    or beneficiaries.name like '%$searchKey%'
                    or beneficiaries.fh_name like '%$searchKey%' group by beneficiaries.mobile limit 10");
               /* echo "select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where beneficiaries.mobile like '%$searchKey%'
                    or beneficiaries.nid like '%$searchKey%'
                    or beneficiaries.name like '%$searchKey%'
                    or beneficiaries.fh_name like '%$searchKey%' group by beneficiaries.mobile limit 10";
                exit;*/

            } else {

                $distributions = DB::select("select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id group by beneficiaries.mobile limit 10");
            }
            return Datatables::of($distributions)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->status == 0) {
                        $message = 'প্রদান করুন';
                        $btn = '<a rowid="' . $row->id . '" data-toggle="modal" class="btn btn-primary btn-sm modalOTP">
<i  class="fa fa-hand-o-up"></i>
' . $message . '</a>';
                    } else {
                        $message = 'প্রদান হয়েছে';
                        $btn = '<a rowid="' . $row->id . '" class="btn btn-success btn-sm">
<i  class="fa fa-money"></i>
' . $message . '</a>';
                    }

                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }


        $data = [
            'distribution' => DistributionHelper::distributionAll(),
            'card' => [
                'total' => Distribution::count(),
                'distributed' => Distribution::where('status', 1)->count(),
                'not_distributed' => Distribution::where('status', 0)->count(),
            ]
        ];
        return view('backend.admin.beneficiary.distribution1')->with($data);
    }


}
