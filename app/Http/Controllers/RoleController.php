<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base;
use App\Models\Role;

class RoleController extends Base
{
    public function view(){
        $role = Role::all();
        $this->content = view('role')->with(['roles'=>$role])->render();
        return $this->renderOutPut();
    }


}
