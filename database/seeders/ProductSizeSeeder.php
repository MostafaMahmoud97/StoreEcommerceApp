<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Sizes = [
            "small",
            "medium",
            "large",
            "x large"
        ];

        ProductSize::truncate();
        foreach ($Sizes as $size){
            ProductSize::create([
                "size" => $size
            ]);
        }
    }
}
