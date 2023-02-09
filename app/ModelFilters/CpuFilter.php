<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CpuFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
    }
}