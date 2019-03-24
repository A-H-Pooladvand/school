<?php

use App\News;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create(['category_type' => News::class])->each(function (Category $category) {
            factory(News::class, 6)->create()->each(function (News $news) use ($category) {
                $news->categories()->sync($category->id);
                $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');
                $news->tags()->attach($tags);
            });
        });
    }
}
