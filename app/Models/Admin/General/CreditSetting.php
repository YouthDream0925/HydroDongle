<?php

namespace App\Models\Admin\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditSetting extends Model
{
    use HasFactory;

    protected $table = 'credit_settings';

    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'type',
        'value'
    ];
}
