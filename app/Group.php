<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

/*
|--------------------------------------------------------------------------
| createGroup (returns created group) --static
|--------------------------------------------------------------------------
|
| Used to create a user group. Provide the group's name and
| description.
|
*/
    
    public static function createGroup($group_name, $group_description)
    {
        $group = new Group;
        
        $group->group_name = $group_name;
        $group->description = $group_description;
            
        $group->save();
        
        return $group;
    }    
}
