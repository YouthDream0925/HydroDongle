<?php

namespace App\Models\Admin\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    use HasFactory;

    protected $table = 'transfer_credit_history';
    
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'sender',
        'recipient',
        'amount',
        'status'
    ];
}
