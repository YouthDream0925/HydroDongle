<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $table = 'memory_types';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'explanation'
    ];
}
