<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BrandFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('brand_name', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}