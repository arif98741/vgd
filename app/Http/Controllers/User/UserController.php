<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\HelperProvider;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
                    ->where(
                        [
                            'stocks.union_id' => $currentUnionId,
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
                    ->where('stocks.union_id', $currentUnionId)
                    ->get(),
                'months' => Config::get('months.list'),
                'monthBengali' => $monthBengali,
                'monthName' => '',
            ];
        }

        $data['unionName'] = User::getUnionName();


        return view('backend.user.dashboard')->with($data);

    }
}
