<?php

namespace App;

use App\Models\Union;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Customer Union Id
     * @return mixed
     */
    public static function getUnionId()
    {
        return Auth::user()->union_id;
    }


    /**
     * Get Customer Union Id
     * @return mixed
     */
    public static function getUnionName()
    {
        return Union::where('id', self::getUnionId())
            ->first()->union_name;
    }


}
