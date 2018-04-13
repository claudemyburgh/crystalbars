<?php

namespace App;

use App\User;
use App\UserSocials;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
   

	protected $guarded = ['id'];



	public function scopeLastFirst($query)
	{
		return $query->orderBy('id', 'desc');
	}



	public function user()
	{
	    return $this->belongsTo(User::class);
	}


	public function social()
	{
	    return $this->hasMany(UserSocials::class);
	}


	public function scopeMakeRandom($builder)
	{
		return $builder->orderByRaw('RAND()');
	}

}
