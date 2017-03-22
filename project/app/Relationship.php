<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function users(){
    	//return $this->hasOne('App\User');
    	return $this->belongsTo('App\User','action_user_id');
    }

    public function status(){
    	return $this->belongsTo('App\Status');
    }
}
