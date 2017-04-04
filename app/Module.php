<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Authorization_Level;
use App\Permission;

class Module extends Model
{
    public $timestamps = false;
    
    public function permission()
    {
        return $this->hasMany('App\Permission');
    }
    
    public function dashboards()
    {
        return $this->belongsToMany('App\Dashboard');
    }
    
    public function parents()
    {
        return $this->belongsToMany('App\Module', 
                                    'module_module', 
                                    'child_module_id',
                                    'parent_module_id');
    }
    
    public function children()
    {
        return $this->belongsToMany('App\Module', 
                                    'module_module', 
                                    'parent_module_id',
                                    'child_module_id');
    }
    
    public function hasChildren()
    {
        return $this->children()->count > 0;
    }
    
/*
|--------------------------------------------------------------------------
| createModule (returns created module) --static
|--------------------------------------------------------------------------
|
| Used to create a module and attach it as a child to another already-
| defined parent module. Provide the new module's name, description,
| google 'iron-icon' font, and optional parent module id.
|
*/
    
    public static function createModule($module_name, $module_description, $module_icon, &$module_parent = null)
    {
        $module = new Module;
        
        $module->module_name = $module_name;
        $module->description = $module_description;
        $module->icon = $module_icon;
            
        $module->save();
        
        if ($module_parent != null)
        {    
            $module_parent->children()->attach($module);            
        }
        
        foreach (Authorization_Level::all() as $auth_level)
        {
            Permission::createPermission($module, $auth_level);
        }
        
        return $module;
    }    
}
