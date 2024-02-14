<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

  protected $fillable = ['name', 'description', 'company_id'];

  public function employees()
  {

    return $this->hasMany(Employee::class);

  }

  
  public function scopeOrderByName($query)
  {
      $query->orderBy('name')->orderBy('name');
  }

  public function scopeFilter($query, array $filters)
  {
      $query->when($filters['search'] ?? null, function ($query, $search) {
          $query->where(function ($query) use ($search) {
              $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('description', 'like', '%'.$search.'%');       
          });


      })->when($filters['trashed'] ?? null, function ($query, $trashed) {
          if ($trashed === 'with') {
              $query->withTrashed();
          } elseif ($trashed === 'only') {
              $query->onlyTrashed();
          }
      });
  }
}
