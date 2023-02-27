<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\CreditFilter;

class CreditHistory extends Model
{
    use HasFactory, Filterable;

    protected $table = 'transfer_credit_history';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'sender',
        'recipient',
        'amount',
        'status'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(CreditFilter::class);
    }
}
