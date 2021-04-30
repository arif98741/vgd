<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Otp;
use App\Providers\HelperProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Validator;

class OtpController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendOtp(Request $request)
    {
        $rules = [
            'purpose' => 'required',
            'distribution_id' => 'required|numeric',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json([
                'status' => 'error',
                'message' => 'Parameter missing',
                'error' => $validator->getMessageBag()->toArray(),
                'code' => 203
            ]);
        }
        $data = $request->all();


        $smsConfig = Config::get('api-config.sms');

        $distribution = Distribution::with('beneficiary')
            ->find($request->distribution_id);
        $mobile = $distribution->beneficiary->mobile;
        $otp = rand(1111, 9999);
        //otp encryption

        $message = "VGD%20{$otp}%20বাস্তবায়নেঃ-%20মেলান্দহ%20উপজেলা";
        $status = HelperProvider::sendSMS($mobile, $message);
        if (property_exists($status, 'status_code')) {
            if ($status->status_code == '200') {
                $data['sent'] = Carbon::now();
                $data['code'] = md5(sha1($otp));
                $data['expiration'] = Carbon::now()
                    ->addMinute($smsConfig['expiration_time'])
                    ->format('Y-m-d H:i:s');
                try {
                    Otp::create($data);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'ওটিপি সফলভাবে ' . $mobile . ' নাম্বারে প্রেরণ করা হয়েছে',
                    'code' => 200
                ]);
            }

            if ($status->status_code == '4025') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'উপকারভোগী মোবাইল নাম্বার সঠিক নয়',
                    'code' => 4025
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'unexpected error',
                'error' => $validator->getMessageBag()->toArray(),
                'code' => 203
            ]);
        }
    }

    /**
     * OTP Verification
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyOtp(Request $request)
    {
        $rules = [
            'code' => 'required|numeric',
            'distribution_id' => 'required|numeric',
            'purpose' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return response()->json([
                'status' => 'error',
                'message' => 'Parameter missing',
                'error' => $validator->getMessageBag()->toArray(),
                'code' => 203
            ]);
        }
        $distribution = Otp::where([
            'distribution_id' => $request->distribution_id,
            'purpose' => $request->purpose,
            'code' => md5(sha1($request->code)),
            'status' => 0,
        ])->orderBy('id', 'desc')
            ->first();


        if ($distribution == null) {
            return response()->json([
                'status' => 'error',
                'message' => 'আপনি ভুল ওটিপি প্রদান করেছেন। অনুগ্রহ করে আবার চেষ্টা করুন।',
                'code' => 204
            ]);
        }

        if (strtotime(Carbon::now()) > strtotime($distribution->expiration)) {

            return response()->json([
                'status' => 'error',
                'message' => 'আপনি মেয়াদউত্তীর্ণ ওটিপি প্রদান করেছেন। অনুগ্রহ করে পুনরায় ওটিপি প্রেরণ করুন। ',
                'code' => 205
            ]);
        }

        $updateDistribution = Distribution::find($request->distribution_id);
        $updateDistribution->distribution_date = Carbon::now();
        $updateDistribution->status = 1;
        $updateDistribution->save();

        $otp = Otp::find($distribution->id);
        $otp->status = 1;
        $otp->save();

        return response()->json([
            'status' => 'success',
            'message' => 'ওটিপি ভেরিফিশন সম্পন্ন হয়েছে।',
            'code' => 200
        ]);

    }
}
