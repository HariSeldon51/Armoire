<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public $timestamps = false;
}

public function widgets()
{
    return $this->hasMany('App\Widget');
}
