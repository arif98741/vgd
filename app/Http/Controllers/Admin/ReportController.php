<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Union;
use App\Providers\HelperProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reports()
    {
        return view('backend.admin.reports.reports');
    }

    /**
     * All Months Report
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reportsAllMonths()
    {
        return view('backend.admin.reports.all-union-report');
    }

    /**
     * All Months Dropdown
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reportsAllMonthsDropdown(Request $request)
    {
        if ($request->has('month')) {
            $monthName = HelperProvider::getMonthByNumber($request->get('month'));
            $reports = DB::table('distributions')
                ->join('stocks', 'stocks.union_id', '=', 'distributions.union_id')
                ->join('unions', 'unions.id', '=', 'distributions.union_id')
                ->select('distributions.union_id', 'unions.union_name', 'distributions.month', DB::raw('COUNT(distributions.id) as total_distributed'), DB::raw('sum(stocks.amount) as total_stock'))
                ->where(
                    [
                        'distributions.month' => $monthName,
                        'distributions.status' => 1,
                        'distributions.month' => $monthName,
                    ]
                )->groupBy('distributions.union_id')
                ->get();
            $data = [
                'months' => HelperProvider::monthsUntilNow('months.list'),
                'reports' => $reports
            ];

            return view('backend.admin.reports.all-union-report')->with($data);
        }

        $data = [
            'months' => HelperProvider::monthsUntilNow('months.list')
        ];

        return view('backend.admin.reports.allmonths-report-dropdown')->with($data);
    }

    /*
     * All Beneficiaries By Union
     * */
    public function reportsBeneficiariesByUnion(Request $request)
    {
        if ($request->has('month')) {

            $monthName = HelperProvider::getMonthByNumber($request->get('month'));
            $reports = DB::table('distributions')
                ->join('unions', 'unions.id', '=', 'distributions.union_id')
                ->join('beneficiaries', 'beneficiaries.id', '=', 'distributions.beneficiary_id')
                ->select('beneficiaries.*')
                ->where(
                    [
                        'distributions.month' => $monthName,
                        'distributions.status' => 1
                    ]
                )->get();
            $data = [
                'union' => Union::find($request->union_id),
                'months' => HelperProvider::monthsUntilNow('months.list'),
                'reports' => $reports
            ];

            return view('backend.admin.reports.all-beneficiaries-report')->with($data);
        }

        $data = [
            'months' => HelperProvider::monthsUntilNow('months.list'),
            'unions' => Union::all()
        ];

        return view('backend.admin.reports.beneficiary.all-beneficiaries-by-union')->with($data);
    }

}
