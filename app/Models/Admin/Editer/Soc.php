<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soc extends Model
{
    use HasFactory;

    protected $table = 'socs';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'cpu',
        'name',
        'explanation'
    ];
}
