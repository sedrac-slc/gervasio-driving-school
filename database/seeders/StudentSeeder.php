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

    const MARIA = ['name' => 'Maria Lopez', 'email' => 'maria.lopez@gmail.com',];
    const TELMO = ['name' => 'Telmo Hugo', 'email' => 'telmo.hugo@gmail.com',];
    const ALBETO = ['name' => 'Albero Rigor', 'email' => 'alberto.rigor@gmail.com',];

    const JOAO = ['name' => 'João Pedro', 'email' => 'joao.pedro@gmail.com',];
    const EVANDRO = ['name' => 'Evandro Calulo', 'email' => 'evandro.calulo@gmail.com',];
    const YOLANDA = ['name' => 'Yolanda Rigor', 'email' => 'yoland.rigora@gmail.com',];

    const BEATRIZ = ['name' => 'Beatriz Ferreira', 'email' => 'beatriz.ferreira@gmail.com',];
    const SONIA = ['name' => 'Sonia Yola', 'email' => 'sonia.yola@gmail.com',];
    const MARTINEZ = ['name' => 'Martinez Hugo', 'email' => 'martizer.hugo@gmail.com',];

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


        $user = User::updateOrCreate([ 'email' => static::MARIA['email'] ], [
             ...static::MARIA, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::TELMO['email'] ], [
             ...static::TELMO, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::ALBETO['email'] ], [
             ...static::ALBETO, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);


        $user = User::updateOrCreate([ 'email' => static::JOAO['email'] ], [
             ...static::JOAO, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::EVANDRO['email'] ], [
             ...static::EVANDRO, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::YOLANDA['email'] ], [
             ...static::YOLANDA, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);


        $user = User::updateOrCreate([ 'email' => static::BEATRIZ['email'] ], [
             ...static::BEATRIZ, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::SONIA['email'] ], [
             ...static::SONIA, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);

        $user = User::updateOrCreate([ 'email' => static::MARTINEZ['email'] ], [
             ...static::MARTINEZ, 'password' => Hash::make('12345678'),
        ]);
        Student::updateOrCreate(['user_id' => $user->id], ['user_id' => $user->id]);
    }
}
