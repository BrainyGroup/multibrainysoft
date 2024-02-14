<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'national_id',
        'company_id',
        'first_name',
        'middle_name',
        'last_name',
        'initials',
        'marital_status',
        'dob',
        'designation',
        'profile_photo_path',
        'mobile',
        'organization_id',
        'storage_limit',
        'pa_email',
        'send_welcome_email',
        'send_start_guide',
        'updated_by',    
        'created_by',
        'terms',        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    public function pays(): HasManyThrough
    {
        return $this->hasManyThrough(Pay::class, Employee::class);
    }

    public function getFullName()
    {
      return $this->title . ' ' . $this->firstname . ' ' . $this->lastname;
    }

    public function getFirstnameOrUsername()
    {
      if(!$this->firstname){
        return $this->username;
      }

      return $this->firstname;
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('name')->orderBy('first_name');
    }

    // public function scopeWhereRole($query, $role)
    // {
    //     switch ($role) {
    //         case 'user': return $query->where('owner', false);
    //         case 'owner': return $query->where('owner', true);
    //     }
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('marital_status', 'like', '%'.$search.'%')
                    ->orWhere('mobile', 'like', '%'.$search.'%');
            });
        // })->when($filters['role'] ?? null, function ($query, $role) {
        //     $query->whereRole($role);

        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
