<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Union;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Validator;

use Illuminate\Support\Str;


class BeneficiaryController extends Controller
{


    public function index()
    {
        $data['beneficiaries'] = Beneficiary::with('union')
            ->where('union_id', User::getUnion())->get();

        return view('backend.admin.beneficiary.index')->with($data);
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
            $status = Beneficiary::create($data);
            if ($status) { //if successfully inserted
                $request->session()->flash('alert-success', 'User was successful added!');
                return redirect()->route('admin.add-vgd-beneficiary');
            } else {
                $request->session()->flash('alert-error', 'User error');
                return redirect()->route('admin.add-vgd-beneficiary');
            }
        }

        $data['unions'] = Union::all();
        return view('backend.admin.beneficiary.add')->with($data);
    }


    public function index()
    {
        $union = Union::all();
        return view('backend.admin.beneficiary.add', compact('union'));
    }

    public function store(Request $request)
    {
        //
    }


    public function addBeneficiary(Request $request)

    {


        public
        function editBeneficiary(Request $request, $id)
        {
            $data = [
                'unions' => Union::all(),
                'beneficiary' => Beneficiary::findOrFail($id)
            ];
            return view('backend.admin.beneficiary.edit')->with($data);
        }


        public
gi        {

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
            if ($beneficiary->update($data)) { //if successfully updated
                $request->session()->flash('alert-success', 'Updated Successfully');
                return redirect('admin/view-vgd-beneficiaries');
            } else {
                $request->session()->flash('alert-error', 'User error');
                return redirect()->route('admin.add-vgd-beneficiary');
            }

        }


        $data = array();
        $data['name'] = $request->name;
        $data['fh_name'] = $request->fh_name;
        $data['mother_name'] = $request->mother_name;
        $data['union_id'] = $request->union_id;
        $data['village'] = $request->village;
        $data['card_no'] = $request->card_no;
        $data['nid_no'] = $request->nid_no;
        $data['mobile'] = $request->mobile;

        $image = $request->file('photo');

        if ($image) {
            $image_name = Str::random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $Beneficiary = Beneficiary::insert($data);
                if ($Beneficiary) {
                    $notification = array(
                        'message' => 'Inserted successfully!',
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

        } else {
            Beneficiary::insert($data);
            $notification = array(
                'message' => 'Data Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


    }


}
