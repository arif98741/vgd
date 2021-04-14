<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Beneficiary;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function uploadBeneficiary()
    {
        return view('backend.admin.beneficiary.upload-beneficiary');
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file);

         $months = Config::get('months.names');
         $beneficiaries = Beneficiary::all();
         foreach ($months as $key => $month) {

             foreach ($beneficiaries as $item) { //240
                 $data['beneficiary_id'] = $item->id;
                 $data['union_id'] = $item->union_id;
                 $data['month'] = $key;
                 $data['status'] = 0;

                 Distribution::create($data);
             }
         }

        $notification = array(
            'message' => 'successfully Uploaded',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
