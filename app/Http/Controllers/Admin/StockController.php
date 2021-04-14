<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Union;
use App\Providers\HelperProvider;
use Auth;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function StockVgd()
    {
        $data = [
            'unions' => Union::all(),
            'months' => HelperProvider::monthsUntilNow('months.names'),
        ];

        return view('backend.admin.beneficiary.stock')->with($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addStock(Request $request)
    {
        $currentUserId = Auth::user()->id;
        $count = Stock::where([
            'month' => $request->month,
            'year' => $request->year,
            'union_id' => $request->union_id,
        ])->count();

        if ($count > 0) {
            $notification = array(
                'message' => 'ইতোমধ্যে গোডাউনে যুক্ত করা হয়েছে',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        $data = array();
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['amount'] = $request->amount;
        $data['union_id'] = $request->union_id;


        $result = Stock::insert($data);
        if ($result) {
            $notification = array(
                'message' => 'গুদামে চাউল সফলভাবে মজুদ হয়েছে।',
                'alert-type' => 'success'
            );

        } else {
            $notification = array(
                'message' => 'অনাকাঙ্খিত সমস্যা। পুনরায় চেষ্টা করুন',
                'alert-type' => 'error'
            );

        }
        return redirect()->back()->with($notification);
    }
}
