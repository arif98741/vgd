<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\HelperProvider;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $monthKey = $request->all();
        $currentUnionId = Auth::user()->union_id;

        if ($request->has('month') && $request->month != 'all') {

            $monthName = HelperProvider::getMonthByNumber($request->month);
            $monthBengali = HelperProvider::getBengaliName($monthName);

            $data = [
                'stocks' => DB::table('stocks')
                    ->select('unions.union_name', 'stocks.year', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_bosta'))
                    ->join('unions', 'unions.id', '=', 'stocks.union_id')
                    ->groupBy('stocks.union_id')
                    ->where(
                        [
                            'stocks.month' => $monthName,
                        ]
                    )->get(),
                'months' => Config::get('months.list'),
                'monthName' => $monthName,
                'monthBengali' => $monthBengali
            ];

        } else {
            $monthBengali = '';
            $data = [
                'stocks' => DB::table('stocks')
                    ->select('unions.union_name', 'stocks.year', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_bosta'))
                    ->join('unions', 'unions.id', '=', 'stocks.union_id')
                    ->groupBy('stocks.union_id')
                    ->get(),
                'months' => Config::get('months.list'),
                'monthBengali' => $monthBengali,
                'monthName' => '',
            ];
        }


        return view('backend.admin.dashboard')->with($data);

    }

}
