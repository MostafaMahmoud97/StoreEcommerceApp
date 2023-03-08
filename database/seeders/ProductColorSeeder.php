<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Colors = [
            [
                "color_name" => "black",
                "color" => "#000000"
            ],
            [
                "color_name" => "white",
                "color" => "#ffffff"
            ],
            [
                "color_name" => "red",
                "color" => "#f44336"
            ],
            [
                "color_name" => "green",
                "color" => "#6aa84f"
            ],
            [
                "color_name" => "yellow",
                "color" => "#ffed00"
            ],
            [
                "color_name" => "purple",
                "color" => "#e20185"
            ],
            [
                "color_name" => "gray",
                "color" => "#bcbcbc"
            ],
            [
                "color_name" => "orange",
                "color" => "#ff8200"
            ],
            [
                "color_name" => "blue",
                "color" => "#5ea5e5"
            ],
            [
                "color_name" => "brown",
                "color" => "#783f04"
            ],
        ];

        ProductColor::truncate();
        foreach ($Colors as $color){
            ProductColor::create([
                "color_name" => $color['color_name'],
                "color" => $color['color']
            ]);
        }
    }
}
