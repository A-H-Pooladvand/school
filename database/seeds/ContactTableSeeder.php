<?php

use App\ContactUs;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::create([
            'title' => 'Lorem ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam commodi ea eligendi est in inventore nisi, odio pariatur perspiciatis porro quod repellendus sed similique sunt tempora vitae voluptates. Laboriosam?'
        ]);
    }
}
