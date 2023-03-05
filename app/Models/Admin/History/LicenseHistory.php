<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use App\ModelFilters\CreditFilter;

class LicenseHistory extends Model
{
    use HasFactory, Filterable;

    protected $table = 'licence_history';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'licence_id',
        'history_date'
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
