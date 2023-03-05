<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentFilter extends ModelFilter
{    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('customer_surname', 'LIKE', "%$name%")
                ->orWhere('customer_surname', 'LIKE', "%$name%")
                    ->orWhere('customer_phone', 'LIKE', "%$name%")
                        ->orWhere('customer_email', 'LIKE', "%$name%")
                            ->orWhere('customer_country', 'LIKE', "%$name%")
                                ->orWhere('customer_city', 'LIKE', "%$name%");
        });
    }

    public function setup()
    {
        return $this->orderBy('updated_at', 'desc');
    }
}