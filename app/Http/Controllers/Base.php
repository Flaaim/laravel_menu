<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Menu as ModelMenu;
use Menu;

class Base extends Controller
{
    protected $template;
    protected $user;
    protected $vars;
    protected $content;
    protected $sidebar;
    protected $navbar;
    
    public function __construct(){
        $this->template = "layout";

        $this->middleware(function($request, $next){
            $this->user = Auth::user();
            return $next($request);
        });
    }

    protected function renderOutput(){
        $menu = $this->getMenu();

        $this->vars = Arr::add($this->vars, 'content', $this->content);
        $this->navbar = view('parts.navigation')->with(['user'=>$this->user])->render();
        $this->vars = Arr::add($this->vars, 'navbar', $this->navbar);
        $this->sidebar = view('parts.sidebar')->with(['menu'=>$menu])->render();
        $this->vars = Arr::add($this->vars, 'sidebar', $this->sidebar);
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
