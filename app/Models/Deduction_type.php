<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction_type extends Model
{

  protected $fillable = ['name', 'description','company_id'];


  public function deduction()
  {

    return $this->hasMany(Deduction::class);

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
