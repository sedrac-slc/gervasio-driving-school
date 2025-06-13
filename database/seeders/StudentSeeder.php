<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\{User, Student};

class StudentSeeder extends Seeder
{
    const ANA = ['name' => 'Ana Mateo', 'email' => 'ana@gmail.com',];
    const PAULA = ['name' => 'Paula Yola', 'email' => 'paula@gmail.com',];
    const MIGUEL = ['name' => 'Miguel Rigor', 'email' => 'miguel@gmail.com',];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([ 'email' => static::ANA['email'] ], [
             ...static::ANA, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::PAULA['email'] ], [
             ...static::PAULA, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::MIGUEL['email'] ], [
             ...static::MIGUEL, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
