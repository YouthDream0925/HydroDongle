<?php

namespace App\Models\Admin\Editer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use EloquentFilter\Filterable;
use App\ModelFilters\CpuFilter;

class Cpu extends Model
{
    use HasFactory, Mediable, Filterable;

    protected $table = 'cpus';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'explanation'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(CpuFilter::class);
    }

    public function scopePopular($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }

    public function socs()
    {
        return $this->hasMany(Soc::class, 'cpu', 'id');
    }

    public function models()
    {
        return $this->hasMany(PhoneModel::class, 'cpu_id', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'cpu_id', 'id');
    }

    public function helps()
    {
        return $this->hasMany(Help::class, 'cpu_id', 'id');
    }
}
