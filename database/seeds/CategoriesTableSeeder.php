<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [

        	[
        		'name' => 'wood',
        		'slug' => 'wood'
        	],
        	[
        		'name' => 'plastic',
        		'slug' => 'plastic'
        	],
        	[
        		'name' => 'metal',
        		'slug' => 'metal'
        	],
        	[
        		'name' => 'aluminuim',
        		'slug' => 'aluminuim'
        	],

        ];

        Category::insert($styles);
    }
}
