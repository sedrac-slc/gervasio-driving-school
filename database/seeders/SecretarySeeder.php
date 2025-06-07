<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, Secretary};

class SecretarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'adilson@gmail.com'], [
            'name' => 'Adilson Mateo',
            'email' => 'adilson@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Secretary::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
