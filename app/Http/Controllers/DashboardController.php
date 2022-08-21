<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Base;

class DashboardController extends Base
{
    
    public function index(){
       $this->content = view('dashboard')->with(['user'=>$this->user])->render();
       return $this->renderOutput();
    }

}
