<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function addBeneficiary() {
        return view('backend.admin.beneficiary.add');
    }
}
