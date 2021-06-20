<?php


namespace Database\Seeders;


use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'tag1'],
            ['name' => 'test2'],
            ['name' => 'kot1'],
            ['name' => 'taggable2'],
            ['name' => 'klient'],
            ['name' => 'User'],
            ['name' => 'Admin'],
            ['name' => 'insta'],
            ['name' => 'facebook']
        ];

        Tag::insert($tags);
    }
}
