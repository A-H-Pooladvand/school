<?php

use App\Service;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create(['category_type' => Service::class])->each(function (Category $category) {
            factory(Service::class, 6)->create()->each(function (Service $news) use ($category) {
                $news->categories()->sync($category->id);
                $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');
                $news->tags()->attach($tags);
            });
        });
    }
}
