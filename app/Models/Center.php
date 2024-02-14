<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{

  protected $fillable = ['name', 'description', 'number','company_id'];

  public function salaries()
  {

    return $this->hasMany(Salary::class);

  }

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function employees()
  {

    return $this->hasMany(Employee::class);

  }

  public function scopeOrderByName($query)
  {
      $query->orderBy('name')->orderBy('description');
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
                  ->orWhere('description', 'like', '%'.$search.'%')
                  ->orWhere('number', 'like', '%'.$search.'%');         
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
