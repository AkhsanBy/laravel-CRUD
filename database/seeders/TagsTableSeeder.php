<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Framework', 'Code', 'Bug', 'Help']);
        $tags->each(function($tag) {
        	\App\Models\Tag::create([
        		'name' => $tag,
        		'slug' => \Str::slug($tag),
        	]);
        });
    }
}
