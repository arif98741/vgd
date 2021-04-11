<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Providers\HelperProvider;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;

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
    function distribution($month)
    {
        if ($month == 'all') {

            $data = [
                'month' => $month,
                'months' => HelperProvider::monthsUntilNow(),
                'distributions' => Distribution::with(['union', 'beneficiary'])
                    ->whereIn('month', HelperProvider::dataQueryMonths(HelperProvider::monthsUntilNow()))
                    ->whereYear('created_at', date('Y'))
                    ->get()
            ];
        } else {

            if ($month > count(HelperProvider::monthsUntilNow())) {
                abort(404);
            }

            $data = [
                'month' => $month,
                'months' => HelperProvider::monthsUntilNow(),
                'distributions' => Distribution::with(['union', 'beneficiary'])
                    ->where('month', HelperProvider::getMonthByNumber($month))
                    ->whereYear('created_at', date('Y'))
                    ->get()
            ];
        }

        return view('backend.admin.beneficiary.distribution')->with($data);
    }


}
