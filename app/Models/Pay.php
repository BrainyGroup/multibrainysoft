<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{

  public function company()
  {

    return $this->belongsTo(Company::class);

  } 


  public function scopePosted($query)
    {
      return $query->where('posted', 1);
    }

  public function scopeUnposted($query)
    {
      return $query->where('posted', 0);
    }

    public function employee()
  {

    return $this->belongsTo(Employee::class);

  }


   public function pay_statutories()
    {

      return $this->hasMany(Pay_statutory::class);

    }

    public function pay_statutory()
    {

      return $this->where($pay_statutories->statutory->statutory_types->name,'SSF');

    }

    public function scopeThisYear($query)
    {

      return $query->where('year', 2018);

    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('first_name')->orderBy('last_name');
    }
 
     public function scopeFilter($query, array $filters)
     {
         $query->when($filters['search'] ?? null, function ($query, $search) {
             $query->where(function ($query) use ($search) {
                 $query->where('first_name', 'like', '%'.$search.'%')
                     ->orWhere('last_name', 'like', '%'.$search.'%');       
             });
 
 
         })->when($filters['trashed'] ?? null, function ($query, $trashed) {
             if ($trashed === 'with') {
                 $query->withTrashed();
             } elseif ($trashed === 'only') {
                 $query->onlyTrashed();
             }
         });
 
     }
 
 
 




  


    //
}
