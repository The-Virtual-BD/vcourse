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
        $categories = ['Computer','Design','Programming','Photography','Development','Marketing'];

        for($i =0;$i < count($categories); $i++){
            $category = Category::create([
                'name' => $categories[$i]
            ]);
        }

    }
}
