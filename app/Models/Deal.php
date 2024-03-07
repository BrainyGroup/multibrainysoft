<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
        'organization_id',  // organization_id but organization type client
        'number',
        'amount',
        'vat',
        'total',
        'status_id',
        'company_id',
        'country_id'
    ];
}
