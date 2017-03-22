<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['username','email','password','firstname','lastname'];

    public function setPasswordAttribute($value){
    	$this->attributes['password'] = bcrypt($value);
    }

    public function posts(){
    	return $this->hasMany('App\Post');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    public function relationships(){
        //return $this->belongsTo('App\Relationship');
        return $this->hasMany('App\Relationship','action_user_id');
    }

}
