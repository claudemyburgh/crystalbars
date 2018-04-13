<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{


   protected $guarded = ['id'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function scopeRandomize($query)
	{
		return $query->orderByRaw('RAND()');
	}


}
