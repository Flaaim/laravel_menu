<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function canDo($alias, $require = false){
        if(is_array($alias)){
            foreach($alias as $permAlias){
                $result = $this->canDo($permAlias);
                if($result && !$require){
                    return true;
                } elseif(!$result && $require){
                    return false;
                }
            }
        } else {
            foreach($this->roles as $role){
                foreach($role->perms as $perm){
                    if($perm->alias == $alias){
                        return true;
                    }
                }
                
            }
        }
        return $require;
    }
}
