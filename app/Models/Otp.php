<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otps';

    protected $fillable = [
        'purpose', 'distribution_id', 'code', 'sent', 'expiration'
    ];

    protected $guarded = [];
}
