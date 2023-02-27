<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use EloquentFilter\Filterable;
use App\ModelFilters\DriverFilter;

class Driver extends Model
{
    use HasFactory, Mediable, Filterable;

    protected $table = 'drivers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'brand_id',
        'cpu_id',
        'driver_name',
        'driver_version',
        'driver_link',
        'description'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(DriverFilter::class);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->orderBy('updated_at', 'desc')->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->orderBy('updated_at', 'desc')->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function cpu()
    {
        return $this->belongsTo(Cpu::class, 'cpu_id', 'id');
    }
}
