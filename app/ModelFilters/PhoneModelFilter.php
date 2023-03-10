<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PhoneModelFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "%$name%");
        });
    }

    public function brand($key)
    {
        return $this->where(function($q) use ($key)
        {
            return $q->where('brand_id', "$key");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}