<?php

namespace App\Models\Admin\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use App\ModelFilters\DongleUserFilter;

class DongleUser extends Model
{
    use HasFactory, Filterable;

    protected $table = 'dongle_users';

    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'ic_serial',
        'snplain',
        'name',
        'phone',
        'messenger',
        'resellerid',
        'countryid',
        'activationhash',
        'datetimeregistered',
        'datetimeactivated',
        'isblocked',
        'pcmac',
        'ipadd',
        'localip',
        'pcuser',
        'computername',
        'access_right',
        'available_credits',
        'email',
        'email_verification',
        'email_verified',
        'password',
        'ProPack'
    ];

    public function modelFilter()
    {
        return $this->provideFilter(DongleUserFilter::class);
    }

    public function scopePaginate($query, $per_page)
    {
        if($per_page != null)
            return $query->paginate($per_page)->appends(['per_page' => $per_page]);
        else
           return $query->paginate(config('pagination.per_page'))->appends(['per_page' => config('pagination.per_page')]);
    }
}
