<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use App\ModelFilters\AdminFilter;
use App\Models\Role;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Filterable;

    protected $guard = "admin";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'credit',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
    ];

    public function modelFilter()
    {
        return $this->provideFilter(AdminFilter::class);
    }

    public function roles()
    {
        // return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id');
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id');
    }

    // public function scopePaginate($query, $per_page)
    // {
    //     if($per_page != null)
    //         return $query->paginate($per_page)->appends(['per_page' => $per_page]);
    //     else
    //        return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    // }
}