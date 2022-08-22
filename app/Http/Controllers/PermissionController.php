<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Base;
use App\Models\Permission;
use App\Models\Role;


class PermissionController extends Base
{
    public function view(){
        $roles = Role::all();
        $permissions = Permission::all();
        $this->content = view('permission')->with(['roles'=>$roles, 'permissions'=>$permissions])->render();

        return $this->renderOutPut();
    }


    public function store(Request $request){
        $data = $request->except('_token');
       
        $roles = Role::all();
        $this->save($data, $roles);

        return redirect()->back();
    }

    public function save($data, $roles)
    {
        foreach($roles as $role){
            if(isset($data[$role->id])){
                $role->perms()->sync($data[$role->id]);
            } else {
                $role->perms()->detach();
            }
        }
    }
}
