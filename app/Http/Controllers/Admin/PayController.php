<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Providers\HelperProvider;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PayController extends Controller
{
    /**
     * @return Application|FactoryAlias|\Illuminate\View\View
     */
    public function payBeneficiary()
    {
        return view('backend.admin.beneficiary.pay');
    }

    /**
     * @return Application|FactoryAlias|\Illuminate\View\View
     */
    function distribution(Request $request, $month)
    {
        if ($request->ajax()) {
            if ($month == 'all') {

                $distributions = Distribution::with(['beneficiary'])
                    ->whereIn('month', HelperProvider::dataQueryMonths(HelperProvider::monthsUntilNow()))
                    ->whereYear('created_at', date('Y'))
                    ->latest()
                    ->get();
            } else {

                if ($month > count(HelperProvider::monthsUntilNow())) {
                    abort(404);
                }

                $distributions = Distribution::with(['beneficiary'])
                    ->select('card_no', 'nid', 'name', 'fh_name', 'mother_name', 'village', 'mobile')
                    ->where('month', HelperProvider::getMonthByNumber($month))
                    ->whereYear('created_at', date('Y'))
                    ->latest()
                    ->get();

            }
            return Datatables::of($distributions)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a rowid="' . $row->id . '" data-toggle="modal" class="btn btn-primary btn-sm modalOTP">
<i  class="fa fa-hand-o-up"></i>
প্রদান করুন</a>';

                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }
        $data = [
            'month' => $month,
            'months' => HelperProvider::monthsUntilNow(),
        ];
        return view('backend.admin.beneficiary.distribution1')->with($data);
    }


}
