<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Menu;
use App\Models\Menu as ModelMenu;
use App\Http\Controllers\Base;

class MenuController extends Base
{
    public function index(){
        $menu = $this->getMenu();
        return view('menu');
    }



}
