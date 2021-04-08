<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $table = "beneficiaries";

    protected $fillable = [
        'name', 'fh_name', 'mother_name', 'union_id', 'village', 'card_no', 'nid', 'mobile', 'photo'
    ];


    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public static function getBeneficiary()
    {
        $records = DB::table('beneficiaries')
            ->select('id', 'name', 'fh_name', 'mother_name', 'union_id', 'village', 'card_no', 'nid_no', 'mobile')
            ->get();
    }

    public function january_distribution()
    {
        return $this->hasMany(JanuaryDistribution::class);
    }

}
