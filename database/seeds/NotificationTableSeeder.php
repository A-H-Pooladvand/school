<?php

use App\Tag;
use App\Notification;
use App\Category;
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create(['category_type' => Notification::class])->each(function (Category $category) {
            factory(Notification::class, 6)->create()->each(function (Notification $notification) use ($category) {
                $notification->categories()->sync($category->id);
                $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');
                $notification->tags()->attach($tags);
            });
        });
    }
}
