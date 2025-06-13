<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('12345678'),
        ]);
        Secretary::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
