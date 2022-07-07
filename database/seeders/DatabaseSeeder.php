<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Demo',
            'email' => 'demo@domain.com',
            'password' => Hash::make('very_secure_password')
        ]);

        DB::table('personal_access_tokens')->insert([
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => '1',
            'name' => 'api-token',
            'token' => '4f1f43f36cceab6f51f7b08c7ac903d230b85b7e5da8ef4683060937f9022899',
            'abilities' => '["*"]'
        ]);
    }
}
