<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CountryFilter extends ModelFilter
{    
    public function country($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('country', 'LIKE', "%$name%");
        });
    }
}