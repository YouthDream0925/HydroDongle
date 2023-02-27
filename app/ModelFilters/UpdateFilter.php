<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UpdateFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('title', 'LIKE', "%$name%")
                ->orWhere('version', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}