<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public $timestamps = false;
    
    public function widgets()
    {
        return $this->belongsToMany('App\Widget')
            ->withPivot('order');
    }
    
    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

/*
|--------------------------------------------------------------------------
| createDashboard (returns created dashboard) --static
|--------------------------------------------------------------------------
|
| Used to create a module and attach it as a child to another already-
| defined parent module. Provide the new module's name, description,
| google 'iron-icon' font, and optional parent module id.
|
*/
    
    public static function createDashboard($dashboard_name, $dashboard_description, &$dashboard_parent = null)
    {
        $dashboard = new Dashboard;
        
        $dashboard->dashboard_name = $dashboard_name;
        $dashboard->description = $dashboard_description;
            
        $dashboard->save();
        
        if ($dashboard_parent != null)
        {    
            $dashboard_parent->dashboards()->attach($dashboard);            
        }
        
        return $dashboard;
    }    
    
}
