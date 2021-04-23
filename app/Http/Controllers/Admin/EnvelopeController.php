<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Union;


class EnvelopeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EnvelopeView()
    {
        $Union = Union::all();
        return view('backend.admin.reports.envelope', compact('Union'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EnvelopePrint($id)
    {
        $Beneficiary = Beneficiary::join('unions', 'beneficiaries.union_id', 'unions.id')
            ->select('beneficiaries.*', 'unions.union_name')
            ->where('union_id', $id)
            ->orderBy('card_no', 'asc')
            ->get();
        return view('backend.admin.reports.envelope-print', compact('Beneficiary'));
    }
}
