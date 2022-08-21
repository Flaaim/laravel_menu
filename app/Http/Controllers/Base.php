<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;

class Base extends Controller
{
    protected $template;
    protected $user;
    protected $vars;
    protected $content;
    
    public function __construct(){
        $this->template = "layout";

        $this->middleware(function($request, $next){
            $this->user = Auth::user();
            return $next($request);
        });
    }

    protected function renderOutput(){
        $this->vars = Arr::add($this->vars, 'content', $this->content);
       
        return view($this->template)->with($this->vars);
    }

    private function getMenu(){
        return Menu::make('renderMenu', function($menu){
            foreach(ModelMenu::MenuByType(ModelMenu::ADMIN_MENU)->get() as $item){
                $menu->add($item->title, $item->path)->id($item->id);
            }
        });
    }
}
