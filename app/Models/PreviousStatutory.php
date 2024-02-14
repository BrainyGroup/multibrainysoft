<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousStatutory extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','employee_id','statutory_id','start_date', 'end_date', 'amount'];

 

    
    public function scopeOrderByName($query)
    {
        $query->orderBy('employee_id')->orderBy('employee_id');
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
