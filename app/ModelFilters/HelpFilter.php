<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HelpFilter extends ModelFilter
{    
    public function key($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('title', 'LIKE', "%$name%")
                        ->orWhere('content', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc')->where('activate', '1');
    }
}