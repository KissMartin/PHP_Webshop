<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('user_statistics')->insert([
                'user_id' => $user->id,
                'total_sales' => fake()->numberBetween(0, 10000),
                'total_purchases' => fake()->numberBetween(0, 10000),
                'total_sales_amount' => fake()->randomFloat(2, 0, 10000),
                'total_purchases_amount' => fake()->randomFloat(2, 0, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
