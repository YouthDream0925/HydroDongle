<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use EloquentFilter\Filterable;
use App\ModelFilters\ProductFilter;

class Product extends Model
{
    use HasFactory, Mediable, Filterable;

    protected $table = 'products';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'code',
        'name',
        'price',
        'tax',
        'discount',
        'activate',
        'features'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }
}