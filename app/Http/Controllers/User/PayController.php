<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FebruaryDistribution;
use App\Models\JanuaryDistribution;
use App\Providers\DistributionHelper;
use App\Providers\HelperProvider;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PayController extends Controller
{
    public function payBeneficiary()
    {
        return view('backend.user.beneficiary.pay');
    }

    /**
     * @return Application|FactoryAlias|\Illuminate\View\View
     * @throws \Exception
     * @throws \Exception
     */
    function distribution(Request $request, $month)
    {

        $currentUnionId = Auth::user()->union_id;

        if ($month > count(HelperProvider::monthsUntilNow())) {
            abort(404);
        }

        if ($request->ajax()) {
            if ($month > count(HelperProvider::monthsUntilNow())) {
                abort(404);
            }
            $monthName = HelperProvider::getMonthByNumber($month);


            $currentUnionId = Auth::user()->union_id;

            $distributions = DB::select("select distributions.id as distribution_id,distributions.status,unions.union_name,
                   beneficiaries.* FROM `distributions` join beneficiaries on beneficiaries.id = distributions.beneficiary_id
                       join unions on unions.id = distributions.union_id
                    where distributions.union_id='$currentUnionId' and month='$monthName'
            ");
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

        $monthName = '';
        if ($month != 'all') {

            $monthName = HelperProvider::getMonthByNumber($month);
        }
        $todayFrom = date('Y-m-d 00:00:00');
        $todayTo = Carbon::today()->addHours(23)
            ->addMinutes(59)
            ->addSeconds(59)
            ->format('Y-m-d H:i:s');

        $yesterdayFrom = Carbon::yesterday();
        $yesterdayTo = $yesterdayFrom
            ->addHours(23)
            ->addMinutes(59)
            ->addSeconds(59)
            ->format('Y-m-d H:i:s');

        $today = DB::table('distributions')
            ->select(DB::raw('count(id) as total'))
            ->where('union_id', User::getUnionId())
            ->where('status', 1)
            ->whereBetween('created_at', [$todayFrom, $todayTo])
            ->first();

        $yesterday = DB::table('distributions')
            ->select(DB::raw('count(id) as total'))
            ->where('union_id', User::getUnionId())
            ->where('status', 1)
            ->whereBetween('created_at', [$yesterdayFrom, $yesterdayTo])
            ->first();

        $data = [
            'month' => $month,
            'monthName' => $monthName,
            'distribution' => DistributionHelper::distributionAllUnion($monthName, $currentUnionId),
            'months' => HelperProvider::monthsUntilNow(),
            'today' => $today,
            'yesterday' => $yesterday,
        ];
        return view('backend.user.beneficiary.distribution')->with($data);
    }


}
