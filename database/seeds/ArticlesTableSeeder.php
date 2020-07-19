<?php

use App\Article;
use App\ArticleCategory;
use App\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $faker = Factory::create();

        for($i = 0; $i < 100;$i++) {
            $name = $faker->sentences(1,true);

            $data[] = [
                'name' => $name,
                'slug' => Str::slug($name),
                'excerpt' => $faker->words(mt_rand(10,20),true),
                'body' => $faker->paragraph(mt_rand(3,5)),
                'created_at' => now()->subDays(mt_rand(1,500))
            ];
        }

        Article::insert($data);

        $cats = [
            [
                'name' => 'Server',
                'slug' => 'server'
            ],
            [
                'name' => 'Thoughts',
                'slug' => 'thoughts',
            ],
            [
                'name' => 'Security',
                'slug' => 'security',
            ]
        ];

        Category::insert($cats);


        $articles = Article::all();

        $articles = $articles->pluck('id');

        $cats = Category::all();

        $cats = $cats->pluck('id');

        $data = [];

        foreach ($articles as $articleID) {
            foreach($cats as $catID) {
                $data[] = [
                    'article_id' => $articleID,
                    'category_id' => $catID
                ];
            }
        }

        ArticleCategory::insert($data);

    }
}
