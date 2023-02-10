<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\BrandFilter;

class Reseller extends Model
{
    use HasFactory, Filterable;
    
    protected $table = 'resellers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'website',
        'email',
        'tel',
        'country_id',
        'address',
        'facebook',
        'whatsapp',
        'skype',
        'telegram',
        'sonork',
        'activate'
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

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
