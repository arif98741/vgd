<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $monthKey = $request->all();
        $monthBengali = '';
        $data = [
            'stocks' => DB::table('stocks')
                ->select('unions.union_name', 'stocks.year', 'stocks.number_of_card', 'stocks.union_id', DB::raw('sum(stocks.amount) as total_amount'))
                ->join('unions', 'unions.id', '=', 'stocks.union_id')
                ->groupBy('stocks.union_id')
                ->get(),
            'months' => Config::get('months.list'),
            'monthBengali' => $monthBengali,
            'monthName' => '',
        ];

        return view('backend.admin.dashboard')->with($data);

    }


    /**
     * @return Application|Factory|View
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
     * @return Application|Factory|View
     */
    public function editUddokta(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $user = User::find($id);
            $user->name = $request->name;
            if ($request->has('password') && !empty($request->password)) {
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
