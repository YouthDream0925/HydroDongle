<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\BrandFilter;

class Faq extends Model
{
    use HasFactory, Filterable;

    protected $table = 'faqs';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'content',
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
}
