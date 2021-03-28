<?php

use Illuminate\Support\Facades\Auth;

/**
 * @return bool
 */
if (!function_exists('dashboardMessage')) {

    function dashboardMessage(): string
    {
        $user = Auth::user();
        if ($user->role == 1) {
            return 'Admin Panel';
        } elseif ($user->role == 2) {
            return 'Driver Panel';
        } elseif ($user->role == 3) {
            return 'User Panel';
        }
        return false;
    }
}
