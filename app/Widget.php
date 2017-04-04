<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    public $timestamps = false;
    
    public function dashboards()
    {
        return $this->belongsToMany('App\Dashboard');
    }
    
    public function data()
    {
        return $this->belongsTo('App\Data');
    }
    
    public function template()
    {
        return $this->belongsTo('App\Template');
    }
}
