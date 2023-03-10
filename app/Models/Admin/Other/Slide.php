<?php

namespace App\Models\Admin\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Slide extends Model
{
    use HasFactory, Mediable;

    protected $table = 'main_slider';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'description',
        'btn_text',
        'btn_link',
        'sort',
        'activate'
    ];

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }
}
