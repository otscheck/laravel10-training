<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory(5)->create();

        $json = File::get('database/json/posts.json');
        $posts = collect(json_decode($json));

        $posts->each(function($post){
             Post::create([
                'titre'=>$post->titre,
                'slug'=>$post->slug,
                'excerpt'=>$post->excerpt,
                'description'=>$post->description,
                'est_publie'=>$post->est_publie,
                'min_a_lire'=>$post->min_a_lire
            ]);
        });

    }
}
