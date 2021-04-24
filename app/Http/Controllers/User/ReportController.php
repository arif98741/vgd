<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Providers\HelperProvider;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reports()
    {
        return view('backend.user.reports.reports');
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

        $currentUnionId = Auth::user()->union_id;
        $reports = DB::table('distributions')
            ->join('unions', 'unions.id', '=', 'distributions.union_id')
            ->join('beneficiaries', 'beneficiaries.id', '=', 'distributions.beneficiary_id')
            ->select('beneficiaries.*')
            ->where(
                [
                    'distributions.union_id' => $currentUnionId,
                    'distributions.status' => 1
                ]
            )->get();

        $data = [
            'reports' => $reports,
            'union' => User::getUnionName(),
            'total_amount' => DB::table('stocks')
                ->select(DB::raw('sum(stocks.amount) as total_amount'))
                ->where(
                    [
                        'stocks.union_id' => $currentUnionId
                    ]
                )->first(),
            'total_distribution' => DB::table('distributions')
                ->select(DB::raw('(count(distributions.id)) * 450 as total_distributed'))
                ->where(
                    [
                        'distributions.union_id' => $currentUnionId,
                        'distributions.status' => 1
                    ]
                )->first(),
            'total_card' => Distribution::where('union_id', $currentUnionId)
                ->count(),
        ];
        return view('backend.user.reports.all-beneficiaries-report')->with($data);


    }

}
