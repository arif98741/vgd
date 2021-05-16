<?php

namespace App\Providers;

use App\Models\Distribution;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class HelperProvider extends ServiceProvider
{
    /**
     * @param string $key
     * @return array
     */
    public static function monthsUntilNow($key = 'months.list'): array
    {
        $month = Carbon::now()->month;
        $months = Config::get($key);

        foreach ($months as $key => $value) {
            if ($key > $month) {
                continue;
            } else {
                $newMonth[$key] = $value;
            }
        }
        return $newMonth;
    }

    /**
     * @param $months
     * @return array
     */
    public static function dataQueryMonths($months)
    {
        foreach ($months as $key => $item) {

            $dateObj = DateTime::createFromFormat('!m', $key);
            $databaseQueryMonths[] = strtolower($dateObj->format('F')); // March
        }
        return $databaseQueryMonths;
    }

    /**
     * @param $number
     * @return string
     */
    public static function getMonthByNumber($number): string
    {
        $dateObj = DateTime::createFromFormat('!m', $number);

        return strtolower($dateObj->format('F'));
    }

    /**
     * @param $request
     * @param $path
     * @param $name
     * @return mixed
     */
    public static function uploadImage($request, $path, $name)
    {
        $filenameWithExt = $request->file($name)->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file($name)->getClientOriginalExtension();
        $fileNameToStore = "$filename" . '_' . time() . '.' . $extension;
        $path = $request->file($name)->storeAs("public/uploads/$path", $fileNameToStore);
        return str_replace('public/', '', $path);
    }

    /**
     * Get bengali name by english month name
     */
    public static function getBengaliName($month)
    {
        $months = Config::get('months.names');
        return $months[$month];
    }

    /**
     * Get Distributions
     * @param $union_id
     * @param $month
     * @param int $status
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public static function getDistributionData($union_id, $month, $status = 1)
    {

        $status = DB::table('distributions')
            ->select(DB::raw('count(distributions.id) as total_distribution'))
            ->where([
                'month' => $month,
                'union_id' => $union_id,
                'status' => $status
            ])->first();
        if ($status == null) {
            return 0;
        } else {
            return $status;
        }
    }

    /**
     * SSL SMS
     * @param $mobile
     * @param $message
     * @return bool
     */
    public static function sendSMS($mobile, $message)
    {
        $ssl = Config::get('api-config.ssl');

        $apiToken = $ssl['apiToken'];
        $sid = $ssl['sid'];
        $csms_id = $ssl['csms_id'];

        $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token={$apiToken}&sid={$sid}&sms={$message}&msisdn={$mobile}&csms_id={$csms_id}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $smsResult = curl_exec($ch);
        curl_close($ch);
        return json_decode($smsResult);
    }

    /**
     * Card Amount Calculation
     * @param $unionId
     * @return array
     */
    public static function calculateCard($unionId): array
    {
        $data ['card'] = [
            'total' => Distribution::where('union_id', $unionId)->count(),
            'distributed' => Distribution::where(['status' => 1, 'union_id' => $unionId])->count(),
            'not_distributed' => Distribution::where(['status' => 0, 'union_id' => $unionId])->count(),
        ];
        return $data;
    }

    public static function takaFormat($amount = 0)
    {
        $tmp = explode(' . ', $amount); // for float or double values
        $strMoney = '';
        $divide = 1000;
        $amount = $tmp[0];
        $strMoney .= str_pad($amount % $divide, 3, '0', STR_PAD_LEFT);
        $amount = (int)($amount / $divide);
        while ($amount > 0) {
            $divide = 100;
            $strMoney = str_pad($amount % $divide, 2, '0', STR_PAD_LEFT) . ',' . $strMoney;
            $amount = (int)($amount / $divide);
        }

        if (substr($strMoney, 0, 1) == '0')
            $strMoney = substr($strMoney, 1);

        if (isset($tmp[1])) // if float and double add the decimal digits here.
        {
            return $strMoney . ” . ” . $tmp[1];
        }
        return $strMoney;
    }
}
