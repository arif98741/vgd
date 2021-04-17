<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Distribution;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadBeneficiary()
    {
        return view('backend.admin.beneficiary.upload-beneficiary');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function import(Request $request)
    {

        try {
            $rows = Excel::toArray(new UsersImport(), $request->file);
            $months = Config::get('months.names');
            if (array_key_exists(0, $rows)) {
                foreach ($rows[0] as $row) {

                    $beneficiaryId = DB::table('beneficiaries')
                        ->insertGetId([
                            'name' => $row['name'],
                            'fh_name' => $row['fh_name'],
                            'mother_name' => $row['mother_name'],
                            'union_id' => $row['union_id'],
                            'ward' => $row['ward'],
                            'village' => $row['village'],
                            'card_no' => $row['card_no'],
                            'nid' => $row['nid'],
                            'mobile' => $row['mobile'],
                        ]);
                    foreach ($months as $key => $month) {

                        $data['beneficiary_id'] = $beneficiaryId;
                        $data['union_id'] = $row['union_id'];
                        $data['month'] = $key;
                        $data['status'] = 0;

                        Distribution::create($data);
                    }
                }

                $notification = array(
                    'message' => 'ডাটা সফলভাবে আপলোড হয়েছে',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            } else {
                throw new \Exception('Error Reading Excel File');
            }
        } catch (Exception $e) {

            $notification = array(
                'message' => 'ডাটা আপলোড ব্যর্থ হয়েছে ' . $e->showMessage(),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

    }
}
