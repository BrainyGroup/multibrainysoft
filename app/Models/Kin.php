<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kin extends Model
{

  public function Kin()
  {

    return $this->belongsTo(Kin::class);

  }
}
