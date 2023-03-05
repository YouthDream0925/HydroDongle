<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use App\ModelFilters\LicenseFilter;
use App\Models\User;

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
        return $this->provideFilter(LicenseFilter::class);
    }

    public function scopeSearch($query, $per_page, $name)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(PaymentHistory::class, 'licence_id', 'id');
    }
}
