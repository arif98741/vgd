<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DuplicateExport;
use App\Imports\DuplicateExportMobile;
use App\Imports\UsersImport;
use App\Models\Distribution;
use Excel;
use Illuminate\Http\Request;
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
            $excelNids = array_column($rows[0], 'nid');
            $excelMobiles = array_column($rows[0], 'mobile');

            //TODO:: this code should be analyszed for unique check in a sheet
            /*$uniqueMobiles = array_unique($excelMobiles);
            $duplicatesMobiles = array_diff_assoc($excelMobiles, $uniqueMobiles);

            $uniqueNids = array_unique($excelNids);
            $duplicatesNids = array_diff_assoc($excelMobiles, $uniqueNids);


            if (count($duplicatesMobiles) > 0 || count($duplicatesNids) > 0) {
                $excelArray = $this->duplicatesArray($duplicatesMobiles, $duplicatesNids);
                $fileName = 'duplicate_mobile' . '.xlsx';
                return Excel::download(new DuplicateExportMobile($excelArray), $fileName);
            }*/

            $beneficiaries = DB::table('beneficiaries')
                ->select('mobile', 'nid')
                ->get()
                ->toArray();
            $dbNids = array_column($beneficiaries, 'nid');
            $dbMobiles = array_column($beneficiaries, 'mobile');


            $duplicateMobiles = array_intersect($dbMobiles, $excelMobiles);
            $duplicateNids = array_intersect($dbNids, $excelNids);
            $excelArray = $this->duplicatesArray($duplicateMobiles, $duplicateNids);

            if (count($duplicateMobiles) > 0 || count($duplicateNids) > 0) {
                $fileName = 'duplicate ' . '.xlsx';

                return Excel::download(new DuplicateExport($excelArray), $fileName);

            } else {
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

                        $data['beneficiary_id'] = $beneficiaryId;
                        $data['union_id'] = $row['union_id'];
                        $data['status'] = 0;
                        Distribution::create($data);
                    }

                    $notification = array(
                        'message' => 'ডাটা সফলভাবে আপলোড হয়েছে',
                        'alert-type' => 'success'
                    );

                    return redirect()->back()->with($notification);

                } else {
                    throw new \Exception('Error Reading Excel File');
                }
            }

        } catch (Exception $e) {

            $notification = array(
                'message' => 'ডাটা আপলোড ব্যর্থ হয়েছে ' . $e->showMessage(),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

    }

    private function duplicatesArray($duplicateMobiles, $duplicateNids): array
    {
        $duplicatesBeneficiaries = DB::table('beneficiaries')
            ->whereIn('mobile', $duplicateMobiles)
            ->whereIn('nid', $duplicateNids)
            ->get()
            ->toArray();

        $excelArray = [];
        foreach ($duplicatesBeneficiaries as $duplicatesBeneficiary) {

            $temp['name'] = $duplicatesBeneficiary->name;
            $temp['fh_name'] = $duplicatesBeneficiary->fh_name;
            $temp['mother_name'] = $duplicatesBeneficiary->mother_name;
            $temp['union_id'] = $duplicatesBeneficiary->union_id;
            $temp['ward'] = $duplicatesBeneficiary->ward;
            $temp['card_no'] = $duplicatesBeneficiary->card_no;
            $temp['nid'] = $duplicatesBeneficiary->nid;
            $temp['mobile'] = $duplicatesBeneficiary->mobile;
            $excelArray  [] = $temp;
        }

        return $excelArray;
    }


}
