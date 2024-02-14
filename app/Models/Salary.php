<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
      'amount',
    ];


    public  function employee()
    {

		    return $this->belongsTo(Employee::class);

	   }

     public  function scale()
     {

 		    return $this->belongsTo(Scale::class);

 	   }

     public  function center()
     {

 		    return $this->belongsTo(Center::class);

 	   }

     public  function company()
     {

         return $this->belongsTo(Company::class);

      }

      public function scopeOrderByName($query)
      {
          $query->orderBy('amount')->orderBy('amount');
      }
   
   //    public function scopeWhereRole($query, $role)
   //    {
   //        switch ($role) {
   //            case 'user': return $query->where('owner', false);
   //            case 'owner': return $query->where('owner', true);
   //        }
   //    }
   
      public function scopeFilter($query, array $filters)
      {
          $query->when($filters['search'] ?? null, function ($query, $search) {
              $query->where(function ($query) use ($search) {
                  $query->where('amount', 'like', '%'.$search.'%');
                         
              });
       //    })->when($filters['role'] ?? null, function ($query, $role) {
       //        $query->whereRole($role);
   
          })->when($filters['trashed'] ?? null, function ($query, $trashed) {
              if ($trashed === 'with') {
                  $query->withTrashed();
              } elseif ($trashed === 'only') {
                  $query->onlyTrashed();
              }
          });
      }
   
}
