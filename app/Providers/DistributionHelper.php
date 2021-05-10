<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DistributionHelper extends ServiceProvider
{

    /**
     * @param $union_id
     * @param $stock
     * @return array
     */
    public static function distributed($union_id, $stock): array
    {
        $total_distributed = DB::table('distributions')
            ->select(DB::raw('((count(distributions.id)) * 450) as total_distributed'))
            ->where(
                [
                    'distributions.union_id' => $union_id,
                    'distributions.status' => 1
                ]
            )->first();

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


    /**
     * @return array
     */
    public static function distributionAll()
    {
        $stockObject = DB::table('stocks')
            ->select(DB::raw('sum(stocks.amount) as stock'))
            ->first();

        if ($stockObject == null) {
            $total_stock = 0;
        } else {
            $total_stock = $stockObject->stock;
        }
        $distributionObject = DB::table('distributions')
            ->select(DB::raw('count(distributions.id) * 450 as total_distributed'))
            ->where(
                [
                    'distributions.status' => 1
                ]
            )->first();

        if ($distributionObject == null) {
            $total_distribution = 0;
        } else {
            $total_distribution = $distributionObject->total_distributed;
        }

        return [
            'distribution' => $total_distribution,
            'stock' => $total_stock,
            'due_distribution' => $total_stock - $total_distribution
        ];

    }


    /**
     * @param $month
     * @param $union_id
     * @return array
     */
    public static function distributionAllUnion($month, $union_id)
    {
        $stockObject = DB::table('stocks')
            ->select(DB::raw('sum(stocks.amount) as stock'))
            ->where(
                [
                    'stocks.month' => $month,
                    'stocks.union_id' => $union_id,
                ]
            )->first();

        if ($stockObject == null) {
            $total_stock = 0;
        } else {
            $total_stock = $stockObject->stock;
        }
        $distributionObject = DB::table('distributions')
            ->select(DB::raw('count(distributions.id) as total_distributed'))
            ->where(
                [
                    'distributions.month' => $month,
                    'distributions.union_id' => $union_id,
                    'distributions.status' => 1
                ]
            )->first();

        if ($distributionObject == null) {
            $total_distribution = 0;
        } else {
            $total_distribution = $distributionObject->total_distributed;
        }

        return [
            'distribution' => $total_distribution,
            'stock' => $total_stock,
            'due_distribution' => $total_stock - $total_distribution
        ];

    }
}
