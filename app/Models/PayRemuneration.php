<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayRemuneration extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','employee_id', 'pay_id', 'pay_number', 'month','year','remuneration_id','amount','balance','remuneration_type_id'];

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
                    ->orWhere('pay_allowances.pay_number', 'like', '%'.$search.'%')
                    ->orWhere('amount', 'like', '%'.$search.'%')
                    ->orWhere('month', 'like', '%'.$search.'%')
                    ->orWhere('year', 'like', '%'.$search.'%')
                    ->orWhere('allowance_types.name', 'like', '%'.$search.'%');         
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
