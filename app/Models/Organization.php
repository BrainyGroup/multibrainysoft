<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

  protected $fillable = ['name', 'description','account_number', 'statutory_type_id', 'bank_id', 'company_id','country_id'];

  public function statutory_type()
  {

      return $this->belongsTo(Statutory_type::class);

  }

  public function company()
  {

      return $this->belongsTo(Company::class, 'company_id', 'id');

  }

  public function country()
  {

      return $this->belongsTo(Country::class, 'country_id', 'id');

  }


  public function bank()
  {
      return $this->belongsTo(Bank::class, 'bank_id', 'id');
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
                //   ->orWhere('statutory_type_name', 'like', '%'.$search.'%')   
                //   ->orWhere('bank_name', 'like', '%'.$search.'%')
                  ->orWhere('account_number', 'like', '%'.$search.'%');            
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
