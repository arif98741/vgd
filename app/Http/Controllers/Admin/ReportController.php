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

            $monthName = HelperProvider::getMonthByNumber($request->month);
            $monthBengali = HelperProvider::getBengaliName($monthName);
            $reports = DB::table('stocks')
                ->select('unions.union_name', 'stocks.year', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_bosta'))
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->groupBy('stocks.union_id')
                ->where(
                    [
                        'stocks.month' => $monthName,
                    ]
                );
            if ($reports->count() == 0) {
                $notification = array(
                    'message' => 'আপনার প্রদানকৃত ' . $monthBengali . ' মাসের জন্য কোন প্রতিবেদন পাওয়া যায়নি',
                    'alert-type' => 'error'
                );
                return redirect('admin/reports/all-months-dropdown')->with($notification);
            }

            $data = [
                'monthName' => $monthName,
                'months' => HelperProvider::monthsUntilNow('months.list'),
                'reports' => $reports->get()
            ];
            return view('backend.admin.reports.all-union-report')->with($data);
        }

        $data = [
            'months' => HelperProvider::monthsUntilNow('months.list')
        ];

        return view('backend.admin.reports.allmonths-report-dropdown')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
                        'distributions.union_id' => $request->union_id,
                        'distributions.status' => 1
                    ]
                )->get();


            $data = [
                'union' => Union::find($request->union_id),
                'months' => HelperProvider::monthsUntilNow('months.list'),
                'reports' => $reports,
                'total_bosta' => DB::table('stocks')
                    ->select(DB::raw('sum(stocks.amount) as total_bosta'))
                    ->where(
                        [
                            'stocks.month' => $monthName,
                            'stocks.union_id' => $request->union_id
                        ]
                    )->first(),
                'total_distribution' => DB::table('distributions')
                    ->select(DB::raw('count(distributions.id) as total_distributed'))
                    ->where(
                        [
                            'distributions.month' => $monthName,
                            'distributions.union_id' => $request->union_id,
                            'distributions.status' => 1
                        ]
                    )->first(),
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
