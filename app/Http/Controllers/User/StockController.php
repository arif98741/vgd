<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Union;
use App\Providers\HelperProvider;
use Auth;

class StockController extends Controller
{
    public function stock()
    {
        $currentUnionId = Auth::user()->union_id;

        $stocks = Stock::with('union')
            ->where('union_id', $currentUnionId)
            ->orderBy('union_id', 'asc')
            ->get();

        $data = [
            'stocks' => $stocks,
            'unions' => Union::all(),
        ];

        return view('backend.user.stock')->with($data);
    }
}
