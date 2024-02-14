<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    //

    public  function employee()
    {

        return $this->belongsTo(Employee::class);

     }

     public  function deduction_type()
     {

         return $this->belongsTo(Deduction_type::class);

      }
    
  
      
       public function scopeOrderByName($query)
       {
           $query->orderBy('first_name')->orderBy('last_name');
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
                $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('deduction_types.name', 'like', '%'.$search.'%')
                    ->orWhere('deductions.start_date', 'like', '%'.$search.'%')
                    ->orWhere('deductions.end_date', 'like', '%'.$search.'%')
                    ->orWhere('amount', 'like', '%'.$search.'%');        
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
