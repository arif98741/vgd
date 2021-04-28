<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
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

        $currentUnionId = Auth::user()->union_id;
        $monthBengali = '';
        $data = [
            'stocks' => DB::table('stocks')
                ->select('unions.union_name', 'stocks.year', 'stocks.month', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_bosta'))
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->where('stocks.union_id', $currentUnionId)
                ->orderBy('stocks.id', 'asc')
                ->groupBy('stocks.month')
                ->get(),
            'months' => Config::get('months.list'),
            'monthBengali' => $monthBengali,
            'today' => $today,
            'yesterday' => $yesterday,
        ];

        $data['unionName'] = User::getUnionName();


        return view('backend.user.dashboard')->with($data);

    }
}
