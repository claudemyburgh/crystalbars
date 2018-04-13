<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	/**
	 * Fillable fileds
	 * @var [type]
	 */
    protected $guarded = ['id'];


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    /**
     * Photo relationship
     * @return [type] [description]
     */
    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }



    

}
