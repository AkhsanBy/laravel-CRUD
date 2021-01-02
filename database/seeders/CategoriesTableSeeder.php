<?php

namespace Database\Seeders;

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
        $categories = collect(['Java', 'C#', 'PHP', 'Javascript', 'Python']);
        $categories->each(function($category) {
        	\App\Models\Category::create([
        		'name' => $category,
        		'slug' => \Str::slug($category),
        	]);
        });
    }
}
