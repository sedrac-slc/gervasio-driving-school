<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Vehicle, Category};

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ligeiro = Category::where('name', CategorySeeder::LIGEIRO['name'])->first();
        if(isset($ligeiro->id)){
            $dataOne = ["category_id" => $ligeiro->id, "license_plate" => "0078-MA-923"];
            Vehicle::updateOrCreate($dataOne, $dataOne);

            $dataTwo = ["category_id" => $ligeiro->id, "license_plate" => "0023-LA-122"];
            Vehicle::updateOrCreate($dataTwo, $dataTwo);
        }
    }
}
