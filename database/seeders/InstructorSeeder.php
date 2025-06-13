<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\{User, Instructor};

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'lucas@gmail.com'], [
            'name' => 'Lucas Mateo',
            'email' => 'lucas@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        Instructor::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate(['email' => 'maria@gmail.com'], [
            'name' => 'Maria Mateo',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        Instructor::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
