<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_Status extends Model
{
    protected $table ='account_statii';
    
    public $timestamps = false;
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
/*
|--------------------------------------------------------------------------
| createAccountStatus (returns created status) --static
|--------------------------------------------------------------------------
|
| Used to create an account status. Provide the status' name and
| description.
|
*/
    
    public static function createAccountStatus($status_name, $status_description)
    {
        $status = new Account_Status;
        
        $status->status_name = $status_name;
        $status->description = $status_description;
            
        $status->save();
        
        return $status;
    }    
}
