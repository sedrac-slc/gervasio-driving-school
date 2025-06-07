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
            $dataOne =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '06:40','finished' => '07:50',];
            Classroom::updateOrCreate($dataOne, $dataOne);

            $dataTwo =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '08:00','finished' => '09:30',];
            Classroom::updateOrCreate($dataTwo, $dataTwo);

            $dataThree =  ['category_id' => $ligeiro->id, 'period' => 'MORNING', 'starter' => '10:00','finished' => '11:30',];
            Classroom::updateOrCreate($dataThree, $dataThree);

            $dataFour =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '14:00','finished' => '15:30',];
            Classroom::updateOrCreate($dataFour, $dataFour);

            $dataFive =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '16:00','finished' => '17:30',];
            Classroom::updateOrCreate($dataFive, $dataFive);
        }

        $pesado = Category::where('name', CategorySeeder::PESADO['name'])->first();
        if (isset($pesado->id)) {
            $dataOne =  ['category_id' => $pesado->id, 'period' => 'AFTERNOON', 'starter' => '14:00','finished' => '15:30',];
            Classroom::updateOrCreate($dataOne, $dataOne);

            $dataTwo =  ['category_id' => $pesado->id, 'period' => 'AFTERNOON', 'starter' => '16:00','finished' => '17:30',];
            Classroom::updateOrCreate($dataTwo, $dataTwo);
        }

    }
}
