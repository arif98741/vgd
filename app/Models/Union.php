<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    public function beneficiary()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function january_distribution()
    {
        return $this->hasMany(JanuaryDistribution::class);
    }

}
