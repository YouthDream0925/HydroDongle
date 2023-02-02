<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ic_serial',
        'snplain',
        'first_name',
        'last_name',
        'phone',
        'messenger',
        'resellerid',
        'countryid',
        'isactivated',
        'datetimeregistered',
        'datetimeactivated',
        'datetimeexpired',
        'isblocked',
        'pcmac',
        'ipadd',
        'localip',
        'pcuser',
        'computername',
        'access_right',
        'credits',
        'email',
        'email_verification',
        'email_verified',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePopular($query, $per_page)
    {
        $user = Auth::user();
        $userId = $user->id;

        if(!empty($user->getRoleNames()) && $user->hasExactRoles('SuperAdmin'))
        {
            $query->orderBy('id','DESC');
        } else {
            $query->where('isactivated', '0')
                ->orwhere('datetimeexpired', '<', Carbon::now())
                    ->orderBy('id','DESC');
        }
        
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }

    public function isExpired()
    {
        $today = Carbon::now();
        if($this->datetimeexpired < $today)
            return true;
        else
            return false;
    }

    public function getDateTimeExpiredAtAttribute()
    {
        if($this->datetimeexpired)
            return Carbon::parse($this->datetimeexpired)->format('M d, Y');
        else
            return "NONE";
    }
}
