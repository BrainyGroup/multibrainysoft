<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'deal_id',
        'status_id'
    ];
    
}
