<?php

use App\Album;
use App\Gallery;
use App\Category;
use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create(['category_type' => Album::class])->each(function (Category $category) {
            factory(Album::class, 6)->create()->each(function (Album $album) use ($category) {
                $album->categories()->sync($category->id);
                factory(Gallery::class, rand(5, 15))->create(['gallery_id' => $album->id, 'gallery_type' => Album::class]);
            });
        });
    }
}
