<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\HelpFilter;

class Help extends Model
{
    use HasFactory, Filterable;

    protected $table = 'helps';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'brand_id',
        'cpu_id',
        'title',
        'content',
        'tags',
        'view_type',
        'activate'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(HelpFilter::class);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
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
