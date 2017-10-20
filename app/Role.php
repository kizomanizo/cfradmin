<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

	/**
	 * [$table description]
	 * @var string
	 */
    protected $table = 'roles';
    protected $fillable = ['name', 'description', 'level'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
