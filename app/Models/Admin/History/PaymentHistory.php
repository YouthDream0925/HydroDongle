<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use App\ModelFilters\CreditFilter;

class PaymentHistory extends Model
{
    use HasFactory, Filterable;

    protected $table = 'payments';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'code',
        'customer_id',
        'customer_surname',
        'customer_phone',
        'customer_email',
        'customer_identity',
        'customer_city',
        'customer_country',
        'contact_name',
        'address',
        'zip_code',
        'product_id',
        'products',
        'total_price',
        'currency',
        'locale',
        'description',
        'msg',
        'payment_group',
        'payment_channel',
        'status'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(CreditFilter::class);
    }

    public function getMonthAttribute()
    {
        if($this->updated_at)
            return Carbon::parse($this->updated_at)->format('M d H:m:s');
        else
            return "NONE";
    }

    public function getYearAttribute()
    {
        if($this->updated_at)
            return Carbon::parse($this->updated_at)->format('Y');
        else
            return "NONE";
    }
}
