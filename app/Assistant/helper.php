<?php

use Illuminate\Support\Facades\Auth;

/**
 * @return bool
 */
if (!function_exists('isAdmin')) {

    function isAdmin(): bool
    {
        $user = Auth::user();
        if ($user->role == 1) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * @return bool
 */
if (!function_exists('isDriver')) {

    function isDriver(): bool
    {
        $user = Auth::user();
        if ($user->role == 2) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * @return bool
 */
if (!function_exists('isUser')) {

    function isUser(): bool
    {
        $user = Auth::user();
        if ($user->role == 2) {
            return true;
        } else {
            return false;
        }
    }
}


/**
 * @return bool
 */
if (!function_exists('numberFormat')) {

    function numberFormat($number): string
    {
        return number_format($number, 0, '.', ',');

    }

}
