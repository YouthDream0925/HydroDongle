<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class LicenseFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->join('users', 'licence_history.user_id', '=', 'users.id');
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}