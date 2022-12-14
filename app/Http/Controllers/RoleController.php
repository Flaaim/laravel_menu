<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Base;
use App\Models\Role;
use App\Http\Controllers\Services\Service;

class RoleController extends Base
{

    private $service;

    public function __construct(Service $service){
        parent::__construct();
        $this->service = $service;
    }

    public function view(){
        $this->authorize('view', Role::class);
        $role = Role::all();
        $this->content = view('roles.role')->with(['roles'=>$role])->render();
        return $this->renderOutPut();
    }


    public function create(){
        $this->content = view('roles.create')->render();

        return $this->renderOutput();
    }

    public function store(RoleRequest $request, Role $role){
        $validated = $request->validated();
        
        $this->service->save($request, new Role);
        return redirect()->route('roles.view');
        
    }

    public function edit(Role $role){
        $this->content = view('roles.edit')->with(['role'=>$role])->render();
        return $this->renderOutput();
    }

    public function update(Request $request, Role $role){
        
        $role = Role::find($role->id);
        
        $this->service->save($request, $role);
        return redirect()->route('roles.view');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('roles.view');
    }
}
