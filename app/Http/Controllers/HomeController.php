<?php

namespace App\Http\Controllers;

use App\Models\Union;
use Illuminate\Contracts\Support\Renderable;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        return view('home');
    }


    /**
     * Beneficiaries List by gRoups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vgdBeneficiaries()
    {
        $beneficiaries = DB::table('beneficiaries')
            ->join('unions', 'unions.id', '=', 'beneficiaries.union_id')
            ->select('unions.union_name', 'unions.id', DB::raw('count(beneficiaries.id) as total'))
            ->groupBy('beneficiaries.union_id')
            ->get();
        return view('public.beneficiaries')->with(compact('beneficiaries'));
    }

    /**
     * Beneficiaries List by gRoups
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vgdBeneficiariesView($union_id)
    {
        $beneficiaries = DB::table('beneficiaries')
            ->join('unions', 'unions.id', '=', 'beneficiaries.union_id')
            ->select('unions.union_name', 'beneficiaries.*')
            ->where('unions.id', $union_id)
            ->get();
        $data = [
            'beneficiaries' => $beneficiaries,
            'union' => Union::find($union_id)
        ];
        return view('public.beneficiaries-list')->with($data);
    }

}
