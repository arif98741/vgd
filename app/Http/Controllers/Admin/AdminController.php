<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\HelperProvider;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uddoktaList()
    {
        $data = [
            'unionUsers' => User::with(['union'])
                ->orderBy('id', 'asc')->get()
        ];

        return view('backend.admin.uddokta')->with($data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUddokta(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $user = User::find($id);
            $user->name = $request->name;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($user->save()) {
                $notification = array(
                    'message' => 'তথ্য সফলভাবে আপডেট হয়েছে',
                    'alert-type' => 'success'
                );

            } else {
                $notification = array(
                    'message' => 'তথ্য আপডেট ব্যর্থ হয়েছে',
                    'alert-type' => 'error'
                );
            }
            return redirect('admin/uddokta-list')->with($notification);

        }

        $data = [
            'user' => User::with(['union'])
                ->where('id', $id)
                ->first()
        ];


        return view('backend.admin.edit-uddokta')->with($data);
    }

}
