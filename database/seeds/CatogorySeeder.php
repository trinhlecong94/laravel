<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CatogorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = new Category();
        $category_1->name = 'Women';
        $category_1->description = 'Women';
        $category_1->delete_flag = '0';
        $category_1->save();

        $category_2 = new Category();
        $category_2->name = 'Men';
        $category_2->description = 'Men';
        $category_2->delete_flag = '0';
        $category_2->save();

        $category_3 = new Category();
        $category_3->name = 'Kids';
        $category_3->description = 'Kids';
        $category_3->delete_flag = '0';
        $category_3->save();
    }
}
