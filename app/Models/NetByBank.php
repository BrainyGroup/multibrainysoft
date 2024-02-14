<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NetByBank extends Model
{


  protected $table = 'net_by_banks';
  
  

  protected $fillable = ['company_id', 'pay_number','bank_name','bank amount'];

   public function scopeOrderByName($query)
   {
       $query->orderBy('bank_name')->orderBy('bank_name');
   }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('bank_name', 'like', '%'.$search.'%')
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
