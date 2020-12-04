<?php

namespace App;

use Auth;

class Help
{
    /**
     * Check if authenticated user has admin permissions.
     *
     * @return bool
     */
    public static function isAdmin()
    {
        if (Auth::check() && Auth::user()->is_admin)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}
