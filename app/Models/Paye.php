<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paye extends Model
{

    protected $fillable = ['country_id', 'minimum', 'maximum', 'ratio', 'offset'];

    public function country()
    {

      return $this->belongsTo(Country::class);

    }

    public function scopeOrderByMinimum($query)
    {
        $query->orderBy('minimum')->orderBy('minimum');
    }
  
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('minimum', 'like', '%'.$search.'%')
                    // ->orWhere('mimimum', 'like', '%'.$search.'%')
                    ->orWhere('maximum', 'like', '%'.$search.'%') 
                    ->orWhere('ratio', 'like', '%'.$search.'%') 
                    ->orWhere('offset', 'like', '%'.$search.'%');         
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
