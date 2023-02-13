<?php
 
 namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
 
class Role extends Model
{
    protected $guard = "roles";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'guard_name',
    ];
    /**
     * The users that belong to the role.
     */
    public function admins()
    {
        // return $this->belongsToMany(Admin::class, 'model_has_roles', 'model_id');
        return $this->belongsToMany(Admin::class, 'model_has_roles');
    }
}