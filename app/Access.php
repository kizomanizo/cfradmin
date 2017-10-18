<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
	/**
	 * [$table description]
	 * @var string
	 */
    protected $table = 'accesses';

    public function users()
    {
    	return $this->belongsToMany('App\User', 'access_user', 'access_id', 'user_id');
    }
}
