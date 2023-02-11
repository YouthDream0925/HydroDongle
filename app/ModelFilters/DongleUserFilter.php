<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DongleUserFilter extends ModelFilter
{
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "%$name%")
                    ->orWhere('email', 'LIKE', "$name%");
        });
    }

    public function setup()
    {
        $this->activeStatus();
    }

    public function activeStatus()
    {
        $user = Auth::user();
        if(!empty($user->getRoleNames()) && $user->hasExactRoles('SuperAdmin'))
            return $this->orderBy('id','DESC');
        else
            return $this->where('ProPack', '0')
                    ->orderBy('id','DESC');
    }
}