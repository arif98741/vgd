<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Union;
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
        if (array_key_exists('month', $monthKey) && $monthKey['month'] != 'all') {
            $month = HelperProvider::getMonthByNumber($monthKey['month']);
            $stocks = DB::table('stocks')
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->select('stocks.month', 'stocks.year', 'stocks.amount', 'unions.union_name')
                ->where('stocks.month', $month)
                ->orderBy('stocks.month', 'desc')
                ->get();
        } else {
            $stocks = DB::table('stocks')
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->select('stocks.month', 'stocks.year', 'stocks.amount', 'unions.union_name')
                ->orderBy('stocks.month', 'desc')
                ->get();
        }

        $currentUserId = Auth::user()->id;
        $currentUnionId = Auth::user()->union_id;
        $unionName = Union::find($currentUnionId);
        $data = [
            'stocks' => $stocks,
            'months' => Config::get('months.list')
        ];

        return view('backend.admin.dashboard')->with($data);

    }

}
