<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::updateOrCreate(['email' => 'admin@gmail.com' ], [
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
            'email' => 'admin@gmail.com',
        ]);

        $this->call([
            SecretarySeeder::class,
            CategorySeeder::class,
            ClassroomSeeder::class,
            ArticleSeeder::class,
            VehicleSeeder::class,
            InstructorSeeder::class,
            StudentSeeder::class,
            EnrolmentSeeder::class,
        ]);
    }
}
