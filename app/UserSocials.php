<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSocials extends Model
{
    
	protected $table = 'users_social';
	
	protected $fillable = ['social_id', 'service'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
