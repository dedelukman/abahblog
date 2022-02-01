<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new Tag();
        $tag1->name = "HTML";
        $tag1->slug = "html";
        $tag1->save();

        $tag2 = new Tag();
        $tag2->name = "CSS";
        $tag2->slug = "css";
        $tag2->save();

        $tag3 = new Tag();
        $tag3->name = "PHP";
        $tag3->slug = "php";
        $tag3->save();

        $tag4 = new Tag();
        $tag4->name = "JavaScript";
        $tag4->slug = "javascript";
        $tag4->save();

        $tag5 = new Tag();
        $tag5->name = "Python";
        $tag5->slug = "Python";
        $tag5->save();

        $tag6 = new Tag();
        $tag6->name = "Rust";
        $tag6->slug = "rust";
        $tag6->save();
    }
}
