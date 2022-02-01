<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = "Website";
        $category1->slug = "website";
        $category1->save();

        $category2 = new Category();
        $category2->name = "Android";
        $category2->slug = "android";
        $category2->save();

        $category3 = new Category();
        $category3->name = "Backend";
        $category3->slug = "backend";
        $category3->save();

        $category4 = new Category();
        $category4->name = "Frontend";
        $category4->slug = "frontend";
        $category4->save();
    }
}
