<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Beneficiary;
use App\Models\Union;

use Illuminate\Support\Str;

class EnvelopeController extends Controller
{
    public function EnvelopeView () {
        $Union = Union::all();
        return view('backend.admin.reports.envelope', compact('Union'));
    }
    public function EnvelopePrint ($id) {
        $Beneficiary = Beneficiary::join('unions', 'beneficiaries.union_id', 'unions.id')
        ->select('beneficiaries.*', 'unions.union_name')
            ->where('union_id', $id)
        ->get();
        return view('backend.admin.reports.envelope-print', compact('Beneficiary'));
    }
}
