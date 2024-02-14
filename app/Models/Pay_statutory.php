<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay_statutory extends Model
{
    public function pay()
    {

      return $this->belongsTo(Pay::class);

    }

    public function statutories()
    {

      //return $this->belongsTo(Statutory::class);
      //return $this->hasMany(Statutory::class);
      return $this->hasMany(Statutory::class);

    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('first_name')->orderBy('last_name');
    }

    public function scopeFilter($query, array $filters)
    {
        
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('pay_statutories.pay_number', 'like', '%'.$search.'%')
                    ->orWhere('pay_statutories.employer', 'like', '%'.$search.'%')
                    ->orWhere('pay_statutories.employee', 'like', '%'.$search.'%')
                    ->orWhere('pay_statutories.total', 'like', '%'.$search.'%')
                    ->orWhere('month', 'like', '%'.$search.'%')
                    ->orWhere('year', 'like', '%'.$search.'%')
                    ->orWhere('statutories.name', 'like', '%'.$search.'%');         
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
