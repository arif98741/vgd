<?php

namespace App\Http\Controllers\Admin;

use alidator;
use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Union;
use App\Providers\HelperProvider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Image;
use Session;
use Storage;
use Yajra\DataTables\DataTables;


class BeneficiaryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $beneficiaries = Beneficiary::with('union')
                ->latest()
                ->get();
            return Datatables::of($beneficiaries)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . url("admin/edit-beneficiary/" . $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';

                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.beneficiary.index');
    }


    public function addBeneficiary(Request $request)
    {
        if ($request->isMethod('post')) {


            $data = $this->validate($request, [
                'name' => 'required',
                'card_no' => 'required|unique:beneficiaries',
                'nid' => 'required|unique:beneficiaries',
                'fh_name' => 'required',
                'mother_name' => 'required',
                'union_id' => 'required',
                'ward' => 'required',
                'village' => 'required',
                'mobile' => 'required|unique:beneficiaries|min:11|max:11',
            ]);

            if ($request->hasFile('photo')) {

                $data['photo'] = HelperProvider::uploadImage($request, 'beneficiary', 'photo');
            }

            try {
                $status = Beneficiary::create($data);
                if (!$status)
                    throw  new \Exception('Error');
            } catch (\Exception $e) {
                $request->session()->flash('alert-error', 'Something wrong');
                return redirect()->route('admin.add-vgd-beneficiary');
            }

            if ($status) { //if successfully inserted
                $request->session()->flash('alert-success', 'উপকারভোগী সফলভাবে যুক্ত হয়েছে');
                return redirect()->route('admin.add-vgd-beneficiary');
            } else {
                $request->session()->flash('alert-error', 'User error');
                return redirect()->route('admin.add-vgd-beneficiary');
            }
        }
        $data['unions'] = Union::all();
        return view('backend.admin.beneficiary.add')->with($data);
    }

    public function editBeneficiary(Request $request, $id)
    {
        $data = [
            'unions' => Union::all(),
            'beneficiary' => Beneficiary::findOrFail($id)
        ];
        return view('backend.admin.beneficiary.edit')->with($data);
    }


    public function updateBeneficiary(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'card_no' => 'required|unique:beneficiaries,card_no,' . $id,
            'nid' => 'required|unique:beneficiaries,nid,' . $id,
            'fh_name' => 'required',
            'mother_name' => 'required',
            'union_id' => 'required',
            'ward' => 'required',
            'village' => 'required',
            'mobile' => 'required|unique:beneficiaries,mobile,' . $id,
        ]);
        $beneficiary = Beneficiary::find($id);
        if ($request->hasFile('photo')) {

            $data['photo'] = HelperProvider::uploadImage($request, 'beneficiary', 'photo');
        }

        if ($beneficiary->update($data)) {
            //if successfully updated
            $request->session()->flash('alert-success', 'উপকারভোগী সফলভাবে আপডেট হয়েছে');
            return redirect('admin/view-vgd-beneficiaries');
        } else {
            $request->session()->flash('alert-error', 'অনাকাঙ্খিত সমস্যা। পুনরায় চেষ্টা করুন।');
            return redirect()->route('admin.add-vgd-beneficiary');
        }

    }


}
