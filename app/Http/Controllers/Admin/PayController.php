<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Providers\DistributionHelper;
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
     * @throws \Exception
     * @throws \Exception
     */
    function distribution(Request $request)
    {
        if ($request->ajax()) {

            $distributions = Distribution::with(['beneficiary', 'union'])
                ->whereYear('created_at', date('Y'))
                // ->limit(19)
                ->get();
            return Datatables::of($distributions)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->status == 0) {
                        $message = 'প্রদান করুন';
                        $btn = '<a rowid="' . $row->id . '" data-toggle="modal" class="btn btn-primary btn-sm modalOTP">
<i  class="fa fa-hand-o-up"></i>
' . $message . '</a>';
                    } else {
                        $message = 'প্রদান হয়েছে';
                        $btn = '<a rowid="' . $row->id . '" class="btn btn-success btn-sm">
<i  class="fa fa-money"></i>
' . $message . '</a>';
                    }

                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }


        $data = [
            'distribution' => DistributionHelper::distributionAll(),
        ];
        return view('backend.admin.beneficiary.distribution1')->with($data);
    }


}
