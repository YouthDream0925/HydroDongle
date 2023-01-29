<?php

namespace App\Models\Admin\Other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $table = 'install_instructions';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'content',
        'activate'
    ];
}
