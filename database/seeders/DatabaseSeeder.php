<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserStatisticsSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            UserStatisticsSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
        ]);
        $admin->is_admin = true;
        $admin->password = Hash::make('adminadmin');
        $admin->save();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user.com',
        ]);
        $user->password = Hash::make('useruser');
        $user->save();
    }
}
