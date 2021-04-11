<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Auth;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function StockVgd()
    {
        return view('backend.admin.beneficiary.stock');
    }

    public function addStock(Request $request)
    {

        $currentUserId = Auth::user()->id;

        $data = array();
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['amount'] = $request->amount;
        $data['user_id'] = $currentUserId;
        $data['status'] = 0;

        $result = Stock::insert($data);
        if ($result) {
            $notification = array(
                'message' => 'Stock Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong! Please Try Again',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
