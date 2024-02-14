<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll_group extends Model
{
    public function scales()
     {

       return $this->hasMany(Scale::class);

     }

     
}

