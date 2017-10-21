<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
		'firstname',
		'middlename',
		'surname',
		'email',
		'admission',
		'course',
		'year',
		'status'
    ];
}
