<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_image',
        'brand_link',
        'brand_activate'
    ];

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }
}
