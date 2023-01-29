<?php

namespace App\Models\Admin\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    use HasFactory;

    protected $table = 'intro';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'content'
    ];
}