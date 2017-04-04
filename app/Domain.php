<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public $timestamps = false;
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    public function parents()
    {
        return $this->belongsToMany('App\Domain', 
                                    'domain_domain', 
                                    'child_domain_id',
                                    'parent_domain_id');
    }
    
    public function children()
    {
        return $this->belongsToMany('App\Domain', 
                                    'domain_domain', 
                                    'parent_domain_id',
                                    'child_domain_id');
    }
}
