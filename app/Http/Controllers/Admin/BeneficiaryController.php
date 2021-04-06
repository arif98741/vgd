<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Union;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Validator;

class BeneficiaryController extends Controller
{
    /**
     * @return array|Application|Factory|View
     */
    public function index()
    {
        $data['beneficiaries'] = Beneficiary::with('union')
            ->where('union_id', User::getUnion())->get();

        return view('backend.admin.beneficiary.index')->with($data);
    }

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     * @throws ValidationException
     */
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

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function editBeneficiary(Request $request, $id)
    {
        $data = [
            'unions' => Union::all(),
            'beneficiary' => Beneficiary::findOrFail($id)
        ];
        return view('backend.admin.beneficiary.edit')->with($data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
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
        if ($beneficiary->update($data)) { //if successfully updated
            $request->session()->flash('alert-success', 'Updated Successfully');
            return redirect('admin/view-vgd-beneficiaries');
        } else {
            $request->session()->flash('alert-error', 'User error');
            return redirect()->route('admin.add-vgd-beneficiary');
        }

    }


}
