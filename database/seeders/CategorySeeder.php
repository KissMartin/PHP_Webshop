<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Office', 'Furniture', 'Accessories', 'Lighting', 'Bags', 
            'Gaming', 'Power', 'Smart Home', 'Electronics', 'Photography', 
            'Audio', 'Video', 'Computers', 'Components', 'Storage', 
            'Networking', 'Cables', 'Creative', 'Stationery', 'Kids', 'Home'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }

        $productCategories = [
            'Ergonomic Office Chair' => ['Office', 'Furniture'],
            'Laptop Stand' => ['Office', 'Accessories'],
            'LED Desk Lamp' => ['Office', 'Lighting'],
            'Notebook Cooling Pad' => ['Office', 'Accessories'],
            'Laptop Backpack' => ['Office', 'Bags'],
            'Gaming Chair' => ['Gaming', 'Furniture'],
            'Dual Monitor Arm' => ['Office', 'Accessories'],
            'Phone Stand' => ['Accessories'],
            'Portable Power Bank' => ['Power', 'Accessories'],
            'Smart Plug' => ['Smart Home', 'Power'],
            'Surge Protector' => ['Power', 'Accessories'],
            '4K Action Camera' => ['Electronics', 'Photography'],
            'Streaming Microphone' => ['Electronics', 'Audio'],
            'Mini Projector' => ['Electronics', 'Video'],
            'Smartphone Gimbal' => ['Photography', 'Accessories'],
            'Ring Light' => ['Photography', 'Lighting'],
            'Graphics Card' => ['Computers', 'Components'],
            'Laptop Sleeve' => ['Computers', 'Accessories'],
            'Laptop Docking Station' => ['Computers', 'Accessories'],
            'PC Case ATX' => ['Computers', 'Components'],
            'USB Flash Drive 128GB' => ['Computers', 'Storage'],
            'Portable SSD 2TB' => ['Computers', 'Storage'],
            'Router Dual Band' => ['Networking'],
            'Ethernet Switch' => ['Networking'],
            'HDMI Cable' => ['Accessories', 'Cables'],
            'Gaming Mousepad' => ['Gaming', 'Accessories'],
            'VR Headset' => ['Gaming', 'Electronics'],
            'Compact Bluetooth Keyboard' => ['Gaming', 'Accessories'],
            'Graphic Tablet' => ['Creative', 'Electronics'],
            'Mechanical Pencil Set' => ['Stationery'],
            'Digital Drawing Pad' => ['Creative', 'Kids'],
            'Keyboard Wrist Rest' => ['Office', 'Accessories'],
            'Cable Organizer' => ['Accessories'],
            'Digital Alarm Clock' => ['Home', 'Electronics'],
            'USB Desk Fan' => ['Office', 'Accessories'],
            'Wireless Presenter' => ['Office', 'Accessories'],
            'Tablet Stand' => ['Accessories'],
        ];

        foreach ($productCategories as $productName => $categoryNames) {
            $product = Product::where('name', $productName)->first();
            if ($product) {
                $categoryIds = Category::whereIn('name', $categoryNames)->pluck('id')->toArray();
                $product->categories()->sync($categoryIds);
            }
        }
    }
}
