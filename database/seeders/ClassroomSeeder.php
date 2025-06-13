<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Classroom, Category};

class ClassroomSeeder extends Seeder
{
    const LIGEIRO_MORNING_06H40_07H50 = [
        'period' => 'MORNING', 'starter' => '06:40','finished' => '07:50',
    ];

    const LIGEIRO_MORNING_08H00_09H30 = [
        'period' => 'MORNING', 'starter' => '08:00','finished' => '09:30',
    ];

    const LIGEIRO_MORNING_10H00_11H30 = [
        'period' => 'MORNING', 'starter' => '10:00','finished' => '11:30',
    ];

    const PESADO_AFTERNOON_14H00_15H30 = [
        'period' => 'AFTERNOON', 'starter' => '14:00','finished' => '15:30'
    ];

    const PESADO_AFTERNOON_16H00_17H30 = [
        'period' => 'AFTERNOON', 'starter' => '16:00','finished' => '17:30'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ligeiro = Category::where('name', CategorySeeder::LIGEIRO['name'])->first();
        if (isset($ligeiro->id)) {
            $data = ['category_id' => $ligeiro->id, ...static::LIGEIRO_MORNING_06H40_07H50];
            Classroom::updateOrCreate($data, $data);

            $data = ['category_id' => $ligeiro->id, ...static::LIGEIRO_MORNING_08H00_09H30];
            Classroom::updateOrCreate($data, $data);

            $data = ['category_id' => $ligeiro->id, ...static::LIGEIRO_MORNING_10H00_11H30];
            Classroom::updateOrCreate($data, $data);

            $dataFour =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '14:00','finished' => '15:30',];
            Classroom::updateOrCreate($dataFour, $dataFour);

            $dataFive =  ['category_id' => $ligeiro->id, 'period' => 'AFTERNOON', 'starter' => '16:00','finished' => '17:30',];
            Classroom::updateOrCreate($dataFive, $dataFive);
        }

        $pesado = Category::where('name', CategorySeeder::PESADO['name'])->first();
        if (isset($pesado->id)) {
            $data =  ['category_id' => $pesado->id, ...static::PESADO_AFTERNOON_14H00_15H30];
            Classroom::updateOrCreate($data, $data);

            $data =  ['category_id' => $pesado->id, ...static::PESADO_AFTERNOON_16H00_17H30];
            Classroom::updateOrCreate($data, $data);
        }

    }
}
