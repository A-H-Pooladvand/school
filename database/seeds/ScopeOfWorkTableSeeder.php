<?php

use App\News;
use App\ScopeOfWork;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class ScopeOfWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ScopeOfWork::class, 20)->create();
    }
}
