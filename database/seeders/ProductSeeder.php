<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'user_id' => 1,
                'name' => 'Ergonomic Office Chair',
                'description' => 'Comfortable office chair with lumbar support.',
                'price' => 189.99,
                'stock' => 15,
                'image_url' => 'https://via.placeholder.com/150?text=Chair'
            ],
            [
                'user_id' => 1,
                'name' => 'Portable Power Bank',
                'description' => '10,000mAh portable USB-C charger.',
                'price' => 29.99,
                'stock' => 110,
                'image_url' => 'https://via.placeholder.com/150?text=Power+Bank'
            ],
            [
                'user_id' => 1,
                'name' => '4K Action Camera',
                'description' => 'Waterproof action camera with 4K recording.',
                'price' => 119.95,
                'stock' => 35,
                'image_url' => 'https://via.placeholder.com/150?text=Camera'
            ],
            [
                'user_id' => 1,
                'name' => 'Graphic Tablet',
                'description' => 'Drawing tablet with pressure-sensitive pen.',
                'price' => 84.50,
                'stock' => 40,
                'image_url' => 'https://via.placeholder.com/150?text=Tablet'
            ],
            [
                'user_id' => 1,
                'name' => 'Laptop Stand',
                'description' => 'Adjustable aluminum laptop stand.',
                'price' => 32.00,
                'stock' => 100,
                'image_url' => 'https://via.placeholder.com/150?text=Stand'
            ],
            [
                'user_id' => 1,
                'name' => 'LED Desk Lamp',
                'description' => 'Dimmable LED desk lamp with USB charging port.',
                'price' => 22.95,
                'stock' => 95,
                'image_url' => 'https://via.placeholder.com/150?text=Lamp'
            ],
            [
                'user_id' => 1,
                'name' => 'Mechanical Pencil Set',
                'description' => 'High-quality drafting pencil with refills.',
                'price' => 9.99,
                'stock' => 180,
                'image_url' => 'https://via.placeholder.com/150?text=Pencil'
            ],
            [
                'user_id' => 1,
                'name' => 'Notebook Cooling Pad',
                'description' => 'USB-powered cooling pad with 2 fans.',
                'price' => 17.50,
                'stock' => 85,
                'image_url' => 'https://via.placeholder.com/150?text=Cooling+Pad'
            ],
            [
                'user_id' => 1,
                'name' => 'Smart Light Bulb',
                'description' => 'Wi-Fi enabled RGB smart bulb.',
                'price' => 13.49,
                'stock' => 150,
                'image_url' => 'https://via.placeholder.com/150?text=Light+Bulb'
            ],
            [
                'user_id' => 1,
                'name' => 'HDMI Cable',
                'description' => 'High-speed 6ft HDMI cable (4K support).',
                'price' => 6.99,
                'stock' => 300,
                'image_url' => 'https://via.placeholder.com/150?text=HDMI'
            ],
            [
                'user_id' => 1,
                'name' => 'Laser Printer',
                'description' => 'All-in-one black & white wireless laser printer.',
                'price' => 129.99,
                'stock' => 18,
                'image_url' => 'https://via.placeholder.com/150?text=Printer'
            ],
            [
                'user_id' => 1,
                'name' => 'Graphics Card',
                'description' => 'High performance GPU for gaming and rendering.',
                'price' => 389.00,
                'stock' => 10,
                'image_url' => 'https://via.placeholder.com/150?text=GPU'
            ],
            [
                'user_id' => 1,
                'name' => 'Gaming Mousepad',
                'description' => 'Extended mousepad with stitched edges.',
                'price' => 14.99,
                'stock' => 140,
                'image_url' => 'https://via.placeholder.com/150?text=Mousepad'
            ],
            [
                'user_id' => 1,
                'name' => 'Streaming Microphone',
                'description' => 'USB condenser mic with noise filtering.',
                'price' => 79.90,
                'stock' => 35,
                'image_url' => 'https://via.placeholder.com/150?text=Mic'
            ],
            [
                'user_id' => 1,
                'name' => 'Mini Projector',
                'description' => 'Portable projector with HDMI and USB.',
                'price' => 99.99,
                'stock' => 22,
                'image_url' => 'https://via.placeholder.com/150?text=Projector'
            ],
            [
                'user_id' => 1,
                'name' => 'Laptop Backpack',
                'description' => 'Water-resistant tech backpack with USB port.',
                'price' => 49.00,
                'stock' => 60,
                'image_url' => 'https://via.placeholder.com/150?text=Backpack'
            ],
            [
                'user_id' => 1,
                'name' => 'Router Dual Band',
                'description' => 'Wi-Fi 5 router with MU-MIMO.',
                'price' => 45.99,
                'stock' => 55,
                'image_url' => 'https://via.placeholder.com/150?text=Router'
            ],
            [
                'user_id' => 1,
                'name' => 'Smart Plug',
                'description' => 'Wi-Fi enabled smart outlet with Alexa support.',
                'price' => 11.95,
                'stock' => 170,
                'image_url' => 'https://via.placeholder.com/150?text=Smart+Plug'
            ],
            [
                'user_id' => 1,
                'name' => 'VR Headset',
                'description' => 'Virtual reality headset for immersive gaming.',
                'price' => 229.00,
                'stock' => 8,
                'image_url' => 'https://via.placeholder.com/150?text=VR'
            ],
            [
                'user_id' => 1,
                'name' => 'Laptop Sleeve',
                'description' => 'Protective 15-inch laptop sleeve.',
                'price' => 15.99,
                'stock' => 75,
                'image_url' => 'https://via.placeholder.com/150?text=Sleeve'
            ],
            [
                'user_id' => 1,
                'name' => 'Digital Alarm Clock',
                'description' => 'LED display alarm clock with USB charging.',
                'price' => 18.90,
                'stock' => 120,
                'image_url' => 'https://via.placeholder.com/150?text=Clock'
            ],
            [
                'user_id' => 1,
                'name' => 'Portable SSD 2TB',
                'description' => 'Ultra-fast 2TB SSD with USB-C interface.',
                'price' => 159.99,
                'stock' => 25,
                'image_url' => 'https://via.placeholder.com/150?text=SSD+2TB'
            ],
            [
                'user_id' => 1,
                'name' => 'USB Desk Fan',
                'description' => 'Mini USB-powered desktop fan.',
                'price' => 10.99,
                'stock' => 200,
                'image_url' => 'https://via.placeholder.com/150?text=Fan'
            ],
            [
                'user_id' => 1,
                'name' => 'Surge Protector',
                'description' => '8-outlet surge protector with USB ports.',
                'price' => 25.49,
                'stock' => 90,
                'image_url' => 'https://via.placeholder.com/150?text=Surge'
            ],
            [
                'user_id' => 1,
                'name' => 'Bluetooth Earbuds',
                'description' => 'True wireless earbuds with charging case.',
                'price' => 39.99,
                'stock' => 130,
                'image_url' => 'https://via.placeholder.com/150?text=Earbuds'
            ],
            [
                'user_id' => 1,
                'name' => 'Tablet Stand',
                'description' => 'Adjustable stand for tablets and phones.',
                'price' => 16.00,
                'stock' => 70,
                'image_url' => 'https://via.placeholder.com/150?text=Tablet+Stand'
            ],
            [
                'user_id' => 1,
                'name' => 'Ring Light',
                'description' => '10-inch ring light with tripod and remote.',
                'price' => 28.95,
                'stock' => 50,
                'image_url' => 'https://via.placeholder.com/150?text=Ring+Light'
            ],
            [
                'user_id' => 1,
                'name' => 'Smartphone Gimbal',
                'description' => '3-axis stabilizer for cinematic videos.',
                'price' => 89.99,
                'stock' => 27,
                'image_url' => 'https://via.placeholder.com/150?text=Gimbal'
            ],
            [
                'user_id' => 1,
                'name' => 'Cable Organizer',
                'description' => 'Magnetic cable holder for desk and nightstand.',
                'price' => 7.99,
                'stock' => 210,
                'image_url' => 'https://via.placeholder.com/150?text=Cable+Holder'
            ],
            [
                'user_id' => 1,
                'name' => 'Ethernet Switch',
                'description' => '8-port gigabit switch for home network.',
                'price' => 34.90,
                'stock' => 48,
                'image_url' => 'https://via.placeholder.com/150?text=Switch'
            ],
            [
                'user_id' => 1,
                'name' => 'Digital Drawing Pad',
                'description' => 'LCD writing tablet for kids and creatives.',
                'price' => 12.99,
                'stock' => 80,
                'image_url' => 'https://via.placeholder.com/150?text=Drawing+Pad'
            ],
            [
                'user_id' => 1,
                'name' => 'Gaming Chair',
                'description' => 'Ergonomic racing-style gaming chair.',
                'price' => 199.00,
                'stock' => 12,
                'image_url' => 'https://via.placeholder.com/150?text=Gaming+Chair'
            ],
            [
                'user_id' => 1,
                'name' => 'Keyboard Wrist Rest',
                'description' => 'Gel-filled wrist support pad.',
                'price' => 8.99,
                'stock' => 100,
                'image_url' => 'https://via.placeholder.com/150?text=Wrist+Rest'
            ],
            [
                'user_id' => 1,
                'name' => 'USB Flash Drive 128GB',
                'description' => 'High-speed USB 3.0 flash drive.',
                'price' => 18.99,
                'stock' => 130,
                'image_url' => 'https://via.placeholder.com/150?text=Flash+Drive'
            ],
            [
                'user_id' => 1,
                'name' => 'Laptop Docking Station',
                'description' => 'Multiport dock with HDMI, Ethernet & USB-C.',
                'price' => 109.95,
                'stock' => 30,
                'image_url' => 'https://via.placeholder.com/150?text=Dock'
            ],
            [
                'user_id' => 1,
                'name' => 'PC Case ATX',
                'description' => 'Tempered glass mid-tower ATX case.',
                'price' => 79.90,
                'stock' => 14,
                'image_url' => 'https://via.placeholder.com/150?text=PC+Case'
            ],
            [
                'user_id' => 1,
                'name' => 'Dual Monitor Arm',
                'description' => 'Adjustable desk mount for 2 monitors.',
                'price' => 64.50,
                'stock' => 20,
                'image_url' => 'https://via.placeholder.com/150?text=Monitor+Arm'
            ],
            [
                'user_id' => 1,
                'name' => 'Compact Bluetooth Keyboard',
                'description' => 'Foldable keyboard for travel use.',
                'price' => 29.50,
                'stock' => 45,
                'image_url' => 'https://via.placeholder.com/150?text=Keyboard'
            ],
            [
                'user_id' => 1,
                'name' => 'Wireless Presenter',
                'description' => 'Laser pointer and slideshow remote.',
                'price' => 17.99,
                'stock' => 65,
                'image_url' => 'https://via.placeholder.com/150?text=Presenter'
            ],
            [
                'user_id' => 1,
                'name' => 'Phone Stand',
                'description' => 'Aluminum adjustable stand for phones.',
                'price' => 9.49,
                'stock' => 85,
                'image_url' => 'https://via.placeholder.com/150?text=Phone+Stand'
            ]
        ];

        DB::table('products')->insert($products);
    }
}
