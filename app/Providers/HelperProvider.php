<?php

namespace App\Providers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class HelperProvider extends ServiceProvider
{
    public static function monthsUntilNow()
    {
        $month = Carbon::now()->month;
        $months = Config::get('months.list');
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
    public static function getMonthByNumber($number)
    {
        $dateObj = DateTime::createFromFormat('!m', $number);
        return strtolower($dateObj->format('F'));
    }

    /**
     * SSL SMS
     * @param $mobile
     * @param $message
     * @return bool
     */
    public static function sendSMS($mobile, $message): bool
    {
        $ssl = Config::get('api-config.ssl');

        $apiToken = $ssl['apiToken'];
        $sid = $ssl['sid'];
        $csms_id = $ssl['csms_id'];

        $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$apiToken&sid=$sid&sms=$message&msisdn=$mobile&csms_id=$csms_id";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $smsResult = curl_exec($ch);
        curl_close($ch);
        $decode = json_decode($smsResult);


        if ($decode->status_code == 4003) { //Todo:: will have to change in server.
            return true;
        } else {
            return false;
        }
    }
}
