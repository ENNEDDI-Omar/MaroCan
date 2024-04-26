<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $articles = Article::all();
        $tags = Tag::all();

        // Parcourir tous les articles
        foreach ($articles as $article) {
            // Sélectionner un nombre aléatoire de tags à attacher à l'article
            $numberOfTags = rand(1, 3); // Par exemple, choisissez entre 1 et 3 tags aléatoirement

            // Sélectionner des tags de manière aléatoire
            $selectedTags = $tags->random($numberOfTags);

            // Attacher les tags sélectionnés à l'article
            $article->tags()->attach($selectedTags);
        }
    }
}
