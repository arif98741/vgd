<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DistributionHelper extends ServiceProvider
{

    /**
     * @param $month
     * @param $union_id
     * @param $stock
     * @return array
     */
    public static function distributed($month, $union_id, $stock)
    {
        $db = new DB();

        if ($month != '') {

            $total_distributed = DB::table('distributions')
                ->select(DB::raw('count(distributions.id) as total_distributed'))
                ->where(
                    [
                        'distributions.month' => $month,
                        'distributions.union_id' => $union_id,
                        'distributions.status' => 1
                    ]
                )->first();
        } else {
            $total_distributed = DB::table('distributions')
                ->select(DB::raw('count(distributions.id) as total_distributed'))
                ->where(
                    [
                        'distributions.union_id' => $union_id,
                        'distributions.status' => 1
                    ]
                )->first();
        }
        if ($total_distributed == null) {
            $distribution = 0;
        } else {
            $distribution = $total_distributed->total_distributed;
        }

        return [
            'distribution' => $distribution,
            'due_distribution' => $stock - $distribution
        ];

    }
}
