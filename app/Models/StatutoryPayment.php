<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatutoryPayment extends Model
{
  
  

  



   public function scopeOrderByName($query)
   {
       $query->orderBy('pay_number')->orderBy('pay_number');
   }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('pay_number', 'like', '%'.$search.'%')
                    ->orWhere('amount', 'like', '%'.$search.'%');       
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
