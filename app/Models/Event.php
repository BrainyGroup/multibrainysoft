<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'deal_id',
        'name',
        'description',
        'event_type_id',
        'event_date',
        'start_time',
        'end_time',
        'next_date',
        'next_start_time',
        'next_end_time',
        'next_event_type_id',
        'next_description'       
    ];
}
