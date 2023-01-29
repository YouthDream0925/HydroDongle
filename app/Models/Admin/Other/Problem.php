<?php

namespace App\Models\Admin\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $table = 'problems';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'category_id',
        'poster',
        'description',
        'activate',        
    ];
}
