<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'uuid',
        'name',
        'description',
        'domain',
        'email',
        'mobile',
        'first_name',
        'last_name',
        'database',            
    ];
}
