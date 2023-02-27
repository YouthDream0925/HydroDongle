<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CreditFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('sender', 'LIKE', "%$name%")
                ->orWhere('recipient', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}