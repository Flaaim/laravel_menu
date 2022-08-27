<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Menu extends Model
{
    use HasFactory;

    const FRONT_MENU = 'front';
    const ADMIN_MENU = 'admin';


    public function scopeMenuByType($query, $type){
        $query->where('type', $type);
    }

    public function perms(){
        return $this->belongsToMany(Permission::class, 'permission_menu');
    }


}
