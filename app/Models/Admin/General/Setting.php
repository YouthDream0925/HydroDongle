<?php

namespace App\Models\Admin\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'site';

    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'property',
        'value'
    ];
}