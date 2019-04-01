<?php

use App\Service;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class EnrollmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Enrollment::class, 15)->create();
    }
}
