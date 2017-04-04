<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;
use App\Authorization_Level;

class Permission extends Model
{
    public $timestamps = false;
    
    public function authorizationLevel()
    {
        return $this->belongsTo('App\Authorization_Level');
    }
    
    public function module()
    {
        return $this->belongsTo('App\Module');
    }
    
    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
    
/*
|--------------------------------------------------------------------------
| createPermission (returns created permission) --static
|--------------------------------------------------------------------------
|
| Used to create a permission. Provide the permission's name and
| description.
|
*/
    
    public static function createPermission($module, $auth)
    {
        $module_id = $module->id;
        $module_name = $module->module_name;
        $auth_id = $auth->id;
        $auth_name = $auth->auth_name;
        
        $permission = new Permission;
        
        $permission->permission_name = $module_name . " " . $auth_name;
        $permission->description = "Permission to allow " . $auth_name . " access to the " . $module_name . " module." ;
        $permission->module_id = $module_id;
        $permission->authorization_level_id = $auth_id;
            
        $permission->save();
        
        return $permission;
    }    
}
