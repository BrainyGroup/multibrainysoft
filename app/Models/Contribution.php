<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = [
      'name', 'description', 'employee', 'employer', 'total', 'date_required', 'type'
    ];

    public  function employee()
    {

        return $this->belongsTo(Employee::class);

     }

     public  function contribution_type()
     {

         return $this->belongsTo(Contrybution_type::class);

     }

     public function scopeOrderByName($query)
     {
         $query->orderBy('name')->orderBy('name');
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
                 $query->where('name', 'like', '%'.$search.'%')
                     ->orWhere('description', 'like', '%'.$search.'%');       
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
