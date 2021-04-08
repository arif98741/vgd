<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function uploadBeneficiary () {
        return view('backend.admin.beneficiary.upload-beneficiary');
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file);

        $notification = array(
            'message' => 'successfully Uploaded',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
