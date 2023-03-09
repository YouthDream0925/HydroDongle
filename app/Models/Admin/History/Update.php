<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use App\ModelFilters\UpdateFilter;

class Update extends Model
{
    use HasFactory, Filterable;

    protected $table = 'update_history';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'title',
        'version',
        'date',
        'type',
        'activate',
        'content'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(UpdateFilter::class);
    }

    public function getDateAtAttribute()
    {
        return Carbon::parse($this->date)->format('M d, Y');
    }
}