<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Distribution;
use App\Models\FebruaryDistribution;
use App\Models\JanuaryDistribution;
use App\Providers\HelperProvider;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Config;

class PayController extends Controller
{
    public function payBeneficiary()
    {
        return view('backend.admin.beneficiary.pay');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function distribution($month)
    {
        $currentUnionId = Auth::user()->union_id;

        if ($month == 'all') {

            $data = [
                'month' => $month,
                'months' => HelperProvider::monthsUntilNow(),
                'distributions' => Distribution::with(['union', 'beneficiary'])
                    ->where('union_id', $currentUnionId)
                    ->whereIn('month', HelperProvider::dataQueryMonths(HelperProvider::monthsUntilNow()))
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
                    ->where('union_id', $currentUnionId)
                    ->get()
            ];
        }

        return view('backend.admin.beneficiary.distribution')->with($data);
    }

    function confirmJanDis($id)
    {
        return view('backend.admin.distribution.january_pay', compact('id'));
    }

    function doneJanDis(Request $request)
    {
        $date = date("Y-m-d");
        $currentUnionId = Auth::user()->union_id;
        $id = $request->id;
        $result = Beneficiary::where('id', $id)->first();
        $validation = $result->mobile == $request->mobile;

        $data = array();
        $data['mobile'] = $request->mobile;
        $data['beneficiary_id'] = $result->id;
        $data['union_id'] = $currentUnionId;
        $data['month'] = "jan";
        $data['status'] = 1;
        $data['distribution_date'] = $date;


        if ($validation) {
            JanuaryDistribution::insert($data);
            $notification = array(
                'message' => 'Payment Complete successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong! Please try Again',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }

    }


    function FebDistribution()
    {
        $currentUnionId = Auth::user()->union_id;

        $febDis = FebruaryDistribution::all();


        $Beneficiary = Beneficiary::join('unions', 'beneficiaries.union_id', 'unions.id')
            ->select('unions.*', 'beneficiaries.*')
            ->where('unions.id', $currentUnionId)
            ->get();


        return view('backend.admin.distribution.february', compact('Beneficiary', 'febDis'));
    }

    function confirmFebDis($id)
    {
        return view('backend.admin.distribution.february_pay', compact('id'));
    }

    function doneFebDis(Request $request)
    {
        $date = date("Y-m-d");
        $currentUnionId = Auth::user()->union_id;
        $id = $request->id;
        $result = Beneficiary::where('id', $id)->first();
        $validation = $result->mobile == $request->mobile;

        $data = array();
        $data['mobile'] = $request->mobile;
        $data['beneficiary_id'] = $result->id;
        $data['union_id'] = $currentUnionId;
        $data['month'] = "feb";
        $data['status'] = 1;
        $data['distribution_date'] = $date;


        if ($validation) {
            FebruaryDistribution::insert($data);
            $notification = array(
                'message' => 'Payment Complete successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something Went Wrong! Please try Again',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }


}
