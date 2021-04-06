<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $table = 'beneficiaries';
    protected $guarded = [];

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
