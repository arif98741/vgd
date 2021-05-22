<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Validator;

class DistributionController extends Controller
{

    /**
     * Last Distribution Data
     * @param $union_id
     * @return JsonResponse
     */
    public function lastDistribution($union_id): JsonResponse
    {
        $last_distributed = Distribution::with('beneficiary')
            ->where(['union_id' => $union_id, 'status' => 1])
            ->orderBy('updated_at', 'desc')
            ->first();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $last_distributed
        ]);
    }

     /**
     * Union Distribution Money
     * @param $union_id
     * @return array
      */
    public function distributionUnion($union_id): array
    {
        $stockObject = DB::table('stocks')
            ->select(DB::raw('sum(stocks.amount) as stock'))
            ->where(
                [
                    'stocks.union_id' => $union_id,
                ]
            )->first();

        if ($stockObject == null) {
            $total_stock = 0;
        } else {
            $total_stock = $stockObject->stock;
        }
        $distributionObject = DB::table('distributions')
            ->select(DB::raw('(count(distributions.id)) * 450 as total_distributed'))
            ->where(
                [
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
