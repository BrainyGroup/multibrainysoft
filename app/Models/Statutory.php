<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statutory extends Model
{

    protected $fillable = [
        'name', 
        'description',
        'company_id',
        'statutory_type_id',
        'organization_id',
        'base_id',
        'before_paye',
        'selection',
        'mandatory',
        'employee',
        'employer',
        'total',
        'date_required'     
      ];
    

  public function company()
  {

    return $this->belongsTo(Company::class);

  }

  public function employee()
  {

    return $this->belongsToMany(Employee::class);

  }

  public  function statutory_type()
  {

      return $this->belongsTo(Statutory_type::class);

   }

   public  function salary_base()
   {

       return $this->belongsTo(Salary_base::class);

    }

    public  function organization()
    {

        return $this->belongsTo(Organization::class);

     }

     public  function pay_statutories()
    {

        //return $this->belongsMany(Pay_statutory::class);
         //return $this->hasMany(Pay_statutory::class);
         return $this->belongsTo(Pay_statutory::class);

     }

     public function scopeOrderByName($query)
     {
         $query->orderBy('name')->orderBy('description');
     }
   
     public function scopeFilter($query, array $filters)
     {
         $query->when($filters['search'] ?? null, function ($query, $search) {
             $query->where(function ($query) use ($search) {
                 $query->where('name', 'like', '%'.$search.'%')
                     ->orWhere('description', 'like', '%'.$search.'%')  
                    //  ->orWhere('description', 'like', '%'.$search.'%')
                    //  ->orWhere('description', 'like', '%'.$search.'%') 
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
