<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
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

    public function getDateTimeExpiredAtAttribute()
    {
        if($this->datetimeexpired)
            return Carbon::parse($this->datetimeexpired)->format('M d, Y');
        else
            return "NONE";
    }
}
