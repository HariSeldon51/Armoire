<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table ='data';
    
    public $timestamps = false;
    
    public function widgets()
    {
        return $this->hasMany('App\Widget');
    }
    
/*
|--------------------------------------------------------------------------
| createData (returns created data) --static
|--------------------------------------------------------------------------
|
| Used to create a data. Provide the data's name and
| description.
|
*/
    
    public static function createData($data_name, $data_description, $is_permanent = false)
    {
        $data = new Data;
        
        $data->table_name = $data_name;
        $data->description = $data_description;
        $data->is_permanent = $is_permanent;
        
        $data->save();
        
        return $data;
    }    
}
