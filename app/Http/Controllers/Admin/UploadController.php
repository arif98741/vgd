<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DuplicateExport;
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

            $uniqueNids = array_unique($excelNids);
            $duplicatesNids = array_diff_assoc($excelNids, $uniqueNids);

            $uniqueMobiles = array_unique($excelMobiles);
            $duplicatesMobiles = array_diff_assoc($excelMobiles, $uniqueMobiles);

            /**excel duplicate filter**/
            $duplicateDataArray = $duplicateDataArrayDB = [];
            if (count($duplicatesMobiles) > 0) {  //push if available duplicates mobile
                foreach ($rows[0] as $key => $row) {
                    if (in_array($row['mobile'], $duplicatesMobiles)) {
                        array_push($duplicateDataArray, $row);
                    }
                }
            }

            if (count($duplicatesNids) > 0) { //push if available duplicates nid
                foreach ($rows[0] as $key => $row) {
                    if (in_array($row['nid'], $duplicatesNids)) {
                        array_push($duplicateDataArray, $row);
                    }
                }
            }

            $filterMobile = array_column($duplicateDataArray, 'mobile');
            $filterNid = array_column($duplicateDataArray, 'nid');
            /**excel duplicate filter**/

            $beneficiaries = DB::table('beneficiaries')
                ->select('mobile', 'nid')
                ->get()
                ->toArray();
            $dbNids = array_column($beneficiaries, 'nid');
            $dbMobiles = array_column($beneficiaries, 'mobile');


            foreach ($rows[0] as $row) {

                if (in_array($row['mobile'], $dbMobiles)) {

                    array_push($duplicateDataArrayDB, $row);
                }
                if (in_array($row['nid'], $dbNids)) {
                    array_push($duplicateDataArrayDB, $row);
                }

            }

            foreach ($rows[0] as $key => $row) {
                if (in_array($row['nid'], $filterNid) || in_array($row['mobile'], $filterMobile)) {
                    continue;
                }
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

            if (count($duplicateDataArray) > 0) {


                return Excel::download(new DuplicateExport($duplicateDataArray), 'duplicate_excel_data' . '.xlsx');
            }

            $notification = array(
                'message' => 'ডাটা সফলভাবে আপলোড হয়েছে',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
            exit;
            /*
             $duplicateMobiles = array_intersect($dbMobiles, $excelMobiles);
            $duplicateNids = array_intersect($dbNids, $excelNids);
            $excelArray = $this->duplicatesArray($duplicateMobiles, $duplicateNids);

            $uniqueMobiles = array_unique($excelMobiles);
            $duplicatesMobiles = array_diff_assoc($dbMobiles, $uniqueMobiles);


            $uniqueNids = array_unique($excelNids);
            $duplicatesNids = array_diff_assoc($dbNids, $uniqueNids);

            if (count($duplicatesMobiles) > 0 || count($duplicatesNids) > 0) {

                foreach ($rows[0] as $row) {

                    if (in_array($row['mobile'], $dbMobiles)) {
                        continue;
                    }

                    if (in_array($row['nid'], $dbNids)) {
                        continue;
                    }
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
                $fileName = 'duplicate_data_server' . '.xlsx';
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
            }*/

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
            $temp['village'] = $duplicatesBeneficiary->village;
            $temp['ward'] = $duplicatesBeneficiary->ward;
            $temp['card_no'] = $duplicatesBeneficiary->card_no;
            $temp['nid'] = $duplicatesBeneficiary->nid;
            $temp['mobile'] = $duplicatesBeneficiary->mobile;
            $excelArray  [] = $temp;
        }

        return $excelArray;
    }


}
