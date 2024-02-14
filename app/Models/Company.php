<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
      'name','tenant_id', 'employees','description', 'country_id','usage_count','last_renew_date','trial_expire_date',
    ];

    public function country()
    {

      return $this->belongsTo(Country::class);

    }

    public function center()
    {

      return $this->belongsTo(Center::class);

    }

    public function statutories()
    {

      return $this->hasMany(Statutory::class);

    }

    public function pays()
    {

      return $this->hasMany(Pay::class);

    }

    public function salaries()
    {

      return $this->hasMany(Salary::class);

    }

    public function statutory_types()
    {

      return $this->hasMany(Statutory_type::class);

    }

    public function users()
    {

      return $this->hasMany(User::class);

    }

    public function organizations()
    {

      return $this->hasMany(Organizations::class);

    }

    public function employees()
    {

      return $this->hasMany(Employee::class);

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
