<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Union;
use App\Providers\HelperProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function reports()
    {
        return view('backend.admin.reports.reports');
    }

    /**
     * All Months Report
     * @return Application|Factory|View
     */
    public function reportsAllMonths()
    {
        return view('backend.admin.reports.all-union-report');
    }

    /**
     * All Months Dropdown
     * @return Application|Factory|View
     */
    public function reportsAllMonthsDropdown(Request $request)
    {

        $reports = DB::table('stocks')
            ->select('unions.union_name', 'stocks.year', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_amount'))
            ->join('unions', 'unions.id', '=', 'stocks.union_id')
            ->groupBy('stocks.union_id');

        $data = [
            'reports' => $reports->get()
        ];
        return view('backend.admin.reports.all-union-report')->with($data);


        $data = [
            'months' => HelperProvider::monthsUntilNow('months.list')
        ];

        return view('backend.admin.reports.allmonths-report-dropdown')->with($data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function reportsBeneficiariesByUnion(Request $request)
    {
        if ($request->has('union_id')) {

            $reports = DB::table('distributions')
                ->join('unions', 'unions.id', '=', 'distributions.union_id')
                ->join('beneficiaries', 'beneficiaries.id', '=', 'distributions.beneficiary_id')
                ->select('beneficiaries.*')
                ->where(
                    [
                        'distributions.union_id' => $request->union_id,
                        'distributions.status' => 1
                    ]
                )->get();


            $data = [
                'union' => Union::find($request->union_id),
                'reports' => $reports,
                'total_amount' => DB::table('stocks')
                    ->select(DB::raw('sum(stocks.amount) as total_amount'))
                    ->where(
                        [
                            'stocks.union_id' => $request->union_id
                        ]
                    )->first(),
                'total_distribution' => DB::table('distributions')
                    ->select(DB::raw('(count(distributions.id) * 450) as total_distributed'))
                    ->where([
                        'distributions.union_id' => $request->union_id,
                        'distributions.status' => 1
                    ])->first(),
                'total_card' => Distribution::where('union_id', $request->union_id)->count(),
            ];

            return view('backend.admin.reports.beneficiary.distributed_print')->with($data);
        }

        $data = [
            'unions' => Union::all()
        ];

        return view('backend.admin.reports.beneficiary.distributed')->with($data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function reportsBeneficiariesByUnionNotDistributed(Request $request)
    {
        if ($request->has('union_id')) {

            $reports = DB::table('distributions')
                ->join('unions', 'unions.id', '=', 'distributions.union_id')
                ->join('beneficiaries', 'beneficiaries.id', '=', 'distributions.beneficiary_id')
                ->select('beneficiaries.*')
                ->where([
                    'distributions.union_id' => $request->union_id,
                    'distributions.status' => 0
                ])->get();


            $data = [
                'union' => Union::find($request->union_id),
                'reports' => $reports,
                'total_amount' => DB::table('stocks')
                    ->select(DB::raw('sum(stocks.amount) as total_amount'))
                    ->where(
                        [
                            'stocks.union_id' => $request->union_id
                        ]
                    )->first(),
                'total_distribution' => DB::table('distributions')
                    ->select(DB::raw('(count(distributions.id) * 450) as total_distributed'))
                    ->where(
                        [
                            'distributions.union_id' => $request->union_id,
                            'distributions.status' => 1
                        ]
                    )->first(),
                'total_card' => Distribution::where('union_id', $request->union_id)
                    ->count(),
            ];

            return view('backend.admin.reports.beneficiary.not_distributed_print')->with($data);
        }

        $data = [
            'unions' => Union::all()
        ];

        return view('backend.admin.reports.beneficiary.not-distributed')->with($data);
    }

}
