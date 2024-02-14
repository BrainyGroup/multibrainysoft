<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    protected $fillable = [

      'designation', 
      'identity', 
      'user_id',
      'company_id',
      'center_id',
      'department_id',
      'tin',
      'account_number',
      'bank_id',
      'start_date', 
      'end_date',
      'updated_by',
    ];


    public function salary()
	   {

		     return $this->hasOne(Salary::class);

	   }


     public function allowances()
 	   {

 		     return $this->hasMany(Allowance::class);

 	   }

     public function pays()
     {

       return $this->hasMany(Pay::class);

     }

     public function center()
     {

       return $this->belongsTo(Center::class);

     }

    public function bank()
     {

       return $this->belongsTo(Bank::class);

     }

     public function designation()
     {

       return $this->belongsTo(Designation::class);

     }

     public function company()
     {

       return $this->belongsTo(Company::class);

     }

     public function scale()
     {

       return $this->designation->scale;

     }


     public function user()
     {

       return $this->belongsTo(User::class);

     }


     public function deductions()
 	   {

 		     return $this->hasMany(Deduction::class);

 	   }

     public function statutories()
 	   {

 		     return $this->belongsToMany(Statutory::class)

         ->withPivot('company_id','employee_statutories')

    	   ->withTimestamps();

 	   }


     public function kins()
      {

          return $this->hasMany(Kin::class);

      }


     


     public function level()
     {

       return $this->belongsTo(Level::class);

     }

     public function department()
     {

       return $this->belongsTo(Department::class);

     }

     public function getAge() 
     {

      return Carbon::parse($this->user->dob)->diffInYears(Carbon::now());
     
     }

     public function getFullName() 
     {

      // return $this->employee->user->first_name. ' ' . $employee->user->last_name;
      

          //return $this->user->getFullName();
     
     }

     public function scopeOrderByIdentity($query)
     {
         $query->orderBy('identity')->orderBy('identity');
     }

 
     public function scopeFilter($query, array $filters)
     {
         $query->when($filters['search'] ?? null, function ($query, $search) {
             $query->where(function ($query) use ($search) {
                 $query->where('identity', 'like', '%'.$search.'%')
                     ->orWhere('tin', 'like', '%'.$search.'%')
                     ->orWhere('account_number', 'like', '%'.$search.'%')
                     ->orWhere('start_date', 'like', '%'.$search.'%')
                    //  ->orWhere('full_name', 'like', '%'.$search.'%')
                     ->orWhere('end_date', 'like', '%'.$search.'%');
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
