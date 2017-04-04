<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization_Level extends Model
{
    protected $table ='authorization_levels';
    
    public $timestamps = false;
    
    public function permission()
    {
        return $this->hasMany('App\Permission');
    }
    
/*
|--------------------------------------------------------------------------
| createAuthorizationLevel (returns created authorization_level) --static
|--------------------------------------------------------------------------
|
| Used to create an authorization level. Provide the level's name and
| description.
|
*/
    
    public static function createAuthorizationLevel($auth_name, $auth_description)
    {
        $authLevel = new Authorization_Level;
        
        $authLevel->auth_name = $auth_name;
        $authLevel->description = $auth_description;
            
        $authLevel->save();
        
        return $authLevel;
    }    
}
