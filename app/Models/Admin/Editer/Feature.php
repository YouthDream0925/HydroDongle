<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use App\Scopes\OrderScope;
use EloquentFilter\Filterable;
use App\ModelFilters\FeatureFilter;

class Feature extends Model
{
    use HasFactory, Mediable, Filterable;

    protected $table = 'features';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'explanation',
        'sorting',
        'activate'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(FeatureFilter::class);
    }

    protected static function boot()
    {
        parent::boot();
  
        static::addGlobalScope(new OrderScope);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }
}
