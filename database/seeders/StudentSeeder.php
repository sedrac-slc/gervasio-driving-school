<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\{User, Student};

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'ana@gmail.com'], [
            'name' => 'Ana Mateo',
            'email' => 'ana@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
