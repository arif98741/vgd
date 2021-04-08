<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = [
        'beneficiary_id', 'mobile', 'beneficiary_id', 'union_id', 'month', 'status', 'distribution_date'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
