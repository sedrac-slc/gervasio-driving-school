<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Classroom, Category};

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ligeiro = Category::where('name', CategorySeeder::LIGEIRO['name'])->first();
        if (isset($ligeiro->id)) {
            $dataOne =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '6h:40m','finished' => '7h:50m',];
            Classroom::updateOrCreate($dataOne, $dataOne);

            $dataTwo =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '8h:00m','finished' => '9h:30m',];
            Classroom::updateOrCreate($dataTwo, $dataTwo);

            $dataThree =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '10h:00m','finished' => '11h:30m',];
            Classroom::updateOrCreate($dataThree, $dataThree);

            $dataFour =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '14h:00m','finished' => '15h:30m',];
            Classroom::updateOrCreate($dataFour, $dataFour);

            $dataFive =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '16h:00m','finished' => '17h:30m',];
            Classroom::updateOrCreate($dataFive, $dataFive);
        }

        $pesado = Category::where('name', CategorySeeder::PESADO['name'])->first();
        if (isset($pesado->id)) {
            $dataOne =  ['category_id' => $pesado->id, 'period' => 'AFTERNOON', 'starter' => '14h:00m','finished' => '15h:30m',];
            Classroom::updateOrCreate($dataOne, $dataOne);

            $dataTwo =  ['category_id' => $pesado->id, 'period' => 'AFTERNOON', 'starter' => '16h:00m','finished' => '17h:30m',];
            Classroom::updateOrCreate($dataTwo, $dataTwo);
        }

    }
}
