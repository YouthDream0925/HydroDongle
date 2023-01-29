<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Update extends Model
{
    use HasFactory;

    protected $table = 'update_history';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'version',
        'date',
        'activate',
        'content'
    ];

    public function getDateAtAttribute()
    {
        return Carbon::parse($this->date)->format('M d, Y');
    }
}