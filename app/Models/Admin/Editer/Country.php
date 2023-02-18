<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use EloquentFilter\Filterable;
use App\ModelFilters\BrandFilter;

class Country extends Model
{
    use HasFactory, Mediable, Filterable;

    protected $table = 'countries';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'code',
        'code3',
        'name',
        'num_code',
        'phone_code'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(BrandFilter::class);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }

    public function resellers()
    {
        return $this->hasMany(Reseller::class, 'country_id', 'id')->where('activate', '1');
    }
}
