<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

        	[
        		'name' => 'Claude Myburgh',
        		'email' => 'claude@designbycode.co.za',
        		'password' => bcrypt('CMyburgh1978')
        	],
        	[
        		'name' => 'Hendry Olewagen',
        		'email' => 'hendry@crystalbars.co.za',
        		'password' => bcrypt('password*crystalbars')
        	],
        	[
        		'name' => 'Claude Myburgh',
        		'email' => 'luis@crystalbars.co.za',
        		'password' => bcrypt('password*crystalbars')
        	]

        ];

        User::insert($users);
    }
}
