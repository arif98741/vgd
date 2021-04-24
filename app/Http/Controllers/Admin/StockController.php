<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Union;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function StockVgd()
    {
        numberFormat(12554454545);

        $stocks = Stock::with('union')
            ->orderBy('union_id', 'asc')
            ->get();

        $data = [
            'stocks' => $stocks,
            'unions' => Union::all(),
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
            'year' => $request->year,
            'union_id' => $request->union_id,
        ])->count();

        if ($count > 0) {
            $notification = array(
                'message' => 'ইতোমধ্যে বরাদ্ধ হয়েছে',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        $data = array();
        $data['year'] = $request->year;
        $data['number_of_card'] = $request->number_of_card;
        $data['amount'] = $request->amount;
        $data['union_id'] = $request->union_id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

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
