<?php

namespace App\Http\Controllers\Admin;

use alidator;
use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Distribution;
use App\Models\Union;
use App\Providers\HelperProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
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
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        /* $beneficiaries = Beneficiary::with(['union','distribution'])
             ->limit(10)
             ->get();
         */

        if ($request->ajax()) {

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchkey = $request->search['value'];
                $beneficiaries = Beneficiary::with(['union', 'distribution'])
                    ->where('name', 'LIKE', "%{$searchkey}%")
                    ->orWhere('nid', 'LIKE', "%{$searchkey}%")
                    ->orWhere('card_no', 'LIKE', "%{$searchkey}%")
                    ->orWhere('mobile', 'LIKE', "%{$searchkey}%")
                    ->limit(10)
                    ->get();
            } else {

                $beneficiaries = Beneficiary::with(['union', 'distribution'])
                    ->limit(10)
                    ->get();
            }

            return Datatables::of($beneficiaries)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->distribution != null) {

                        if ($row->distribution->status == 0) {
                            $btn = '<a href="' . url("admin/edit-beneficiary/" . $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                        } else {
                            $btn = '<a href="#" class="btn btn-success btn-sm">প্রদান হয়েছে</a>';
                        }
                    } else {

                        $btn = '<a href="#" class="btn btn-success btn-sm">প্রদান হয়েছে</a>';
                    }


                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.beneficiary.index');
    }


    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Http\RedirectResponse|View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addBeneficiary(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $this->validate($request, [
                'name' => 'required',
                'card_no' => 'required',
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
                $count = Beneficiary::where([
                    'union_id' => $request->union_id,
                    'card_no' => $request->card_no,
                ])->count();
                if ($count > 0) {
                    $request->session()->flash('alert-error', 'উপকারভোগি ইতোমধ্যে যুক্ত করা হয়েছে');
                    return redirect()->route('admin.add-vgd-beneficiary');
                }

                $status = Beneficiary::create($data);
                if ($status) {

                    /**
                     * vgf only accepts one distribution per user.
                     * vgd accepts 12 distribution in a year. it handled by month
                     */
                    $distributionArray = [
                        'union_id' => $status->union_id,
                        'beneficiary_id' => $status->id,
                    ];
                    Distribution::create($distributionArray);
                    $request->session()->flash('alert-success', 'উপকারভোগী সফলভাবে যুক্ত হয়েছে');
                    return redirect()->route('admin.add-vgd-beneficiary');

                } else {

                    throw  new \Exception('Error');
                }
            } catch (\Exception $e) {

                $request->session()->flash('alert-error', 'Something wrong');
                return redirect()->route('admin.add-vgd-beneficiary');
            }
        }

        $data['unions'] = Union::all();
        return view('backend.admin.beneficiary.add')->with($data);
    }

    /**
     * Edit Beneficiary
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
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
            'card_no' => 'required',
            //'nid' => 'required',
            'nid' => 'required|unique:beneficiaries,nid,' . $id,
            'fh_name' => 'required',
            'mother_name' => 'required',
            'union_id' => 'required',
            'ward' => 'required',
            'village' => 'required',
            //'mobile' => 'required',
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
