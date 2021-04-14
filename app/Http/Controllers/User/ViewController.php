<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ViewController extends Controller
{
    public function viewBeneficiary()
    {
        $Beneficiary = Beneficiary::all();
        return view('backend.user.beneficiary.view', compact('Beneficiary'));
    }

    public function DeleteBeneficiary($id)
    {

        $data = Beneficiary::where('id', $id)->first();
        $image = $data->photo;
        if ($image) {
            unlink($image);
            Beneficiary::where('id', $id)->delete();
            $notification = array(
                'message' => 'Delete successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } else {
            Beneficiary::where('id', $id)->delete();
            $notification = array(
                'message' => 'Delete successfully! without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    function EditBeneficiary($id)
    {
        $union = Union::all();
        $Beneficiary = Beneficiary::where('id', $id)->first();
        return view('backend.user.beneficiary.edit_beneficiary', compact('Beneficiary', 'union'));
    }

    public function UpdateBeneficiary(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['fh_name'] = $request->fh_name;
        $data['mother_name'] = $request->mother_name;
        $data['union_id'] = $request->union_id;
        $data['village'] = $request->village;
        $data['card_no'] = $request->card_no;
        $data['ward'] = $request->ward;
        $data['nid_no'] = $request->nid_no;
        $data['mobile'] = $request->mobile;

        $image = $request->file('photo');
        $old_image = $request->file('old_photo');

        if ($image) {
            $image_name = Str::random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $data['photo'] = $image_url;
                $Beneficiary = Beneficiary::where('id', $id)->first();
                $image_path = $Beneficiary->photo;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                $update1 = Beneficiary::where('id', $id)->update($data);
                if ($update1) {
                    $notification = array(
                        'message' => 'Update successfully!',
                        'alert-type' => 'success'
                    );
                    return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Something Went Wrong!',
                        'alert-type' => 'error'
                    );
                    return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
                }
            }
        } elseif ($old_image) {
            $updateOld = Beneficiary::where('id', $id)->update($data);
            if ($updateOld) {
                $notification = array(
                    'message' => 'Update successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'error'
                );
                return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
            }
        } else {
            $updateNoImg = Beneficiary::where('id', $id)->update($data);
            if ($updateNoImg) {
                $notification = array(
                    'message' => 'Update successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'error'
                );
                return redirect()->to('/admin/view-vgd-beneficiary')->with($notification);
            }
        }
    }
}
