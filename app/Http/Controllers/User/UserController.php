<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
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
        $currentUnionId = Auth::user()->union_id;
        $data = [
            'stocks' => DB::table('stocks')
                ->select('unions.union_name', 'stocks.year', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_bosta'))
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->where('stocks.union_id', $currentUnionId)
                ->get(),
            'monthName' => '',
            'card' => [
                'total' => Distribution::where('union_id', $currentUnionId)->count(),
                'distributed' => Distribution::where(['status' => 1, 'union_id' => $currentUnionId])->count(),
                'not_distributed' => Distribution::where(['status' => 0, 'union_id' => $currentUnionId])->count(),
            ]
        ];

        $data['unionName'] = User::getUnionName();

        return view('backend.user.dashboard')->with($data);

    }
}
