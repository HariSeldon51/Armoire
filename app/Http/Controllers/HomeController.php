<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Dashboard;
use Auth;

class HomeController extends Controller {
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $modules = collect([]);
        
        foreach (Auth::user()->groups as $group) {            
            foreach ($group->permissions as $permission) {
                
                $module = $permission->module;                
                $modules->push($module);                
            }
        }
        
        $modules = $modules->unique('id');
        
        $array_modules = $this->list_modules($modules);
            
        return view('home')->with(compact('array_modules'));
    }
    
    private function list_modules($modules) {
        $data = [];

        foreach ($modules as $module) {
            
            $dashboards = collect([]);
            foreach ($module->dashboards as $dashboard) {
                $dashboards->push($dashboard);
            }
            
            $data[] = [
                'name' => $module->module_name,
                'icon' => $module->icon,
                'children' => $this->list_modules($module->children),
                'dashboards' => $dashboards
            ];
        }

        return $data;
    }
}
