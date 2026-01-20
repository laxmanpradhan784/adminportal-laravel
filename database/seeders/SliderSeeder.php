<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        Slider::create([
            'title' => 'Summer Sale 2024',
            'description' => 'Up to 50% off on all products',
            'image' => 'sliders/summer-sale.jpg',
            'order' => 1,
            'status' => true,
        ]);

        Slider::create([
            'title' => 'New Arrivals',
            'description' => 'Check out our latest products',
            'image' => 'sliders/new-arrivals.jpg',
            'order' => 2,
            'status' => true,
        ]);

        Slider::create([
            'title' => 'Free Shipping',
            'description' => 'Free shipping on orders over $50',
            'image' => 'sliders/free-shipping.jpg',
            'order' => 3,
            'status' => true,
        ]);
    }
}