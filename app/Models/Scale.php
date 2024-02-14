<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{

  protected $fillable = [
    'company_id', 
    'name', 
    'description',
    'minimum', 
    'maximum', 
    'employment_type_id', 
    'payroll_group_id' , 
    'pay_base_id'
  ];

  public function salaries()
  {

    return $this->hasMany(Salary::class);

  }

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function payroll_group()
  {

    return $this->belongsTo(Payroll_group::class);

  }

  public function pay_base()
  {

    return $this->belongsTo(Pay_base::class);

  }

  public function employment_type()
  {

    return $this->belongsTo(Employment_type::class);

  }

  public function employee()
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
                  ->orWhere('description', 'like', '%'.$search.'%')  
                  ->orWhere('description', 'like', '%'.$search.'%')
                  ->orWhere('description', 'like', '%'.$search.'%') 
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
