<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadBeneficiary () {
        return view('backend.admin.beneficiary.upload-beneficiary');
    }
}
