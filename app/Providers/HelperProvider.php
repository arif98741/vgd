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
}
