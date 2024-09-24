<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Article::factory(50)
//            ->hasCategory()
//            ->has(Tag::factory()->count(3))
//            ->create();

        Article::factory(50)->create()->each(function ($article) {
            $tags = Tag::factory()->count(3)->create(); // Crée 3 tags
            $article->tags()->attach($tags->pluck('id')->toArray()); // Attache les tags à l'article
        });

        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
