<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    const LIGEIRO = [
        'name' => 'Ligeiro',
        'price' => 75000,
        'installment' => 2,
        'completed_installment' => 70000,
    ];

    const PESADO = [
        'name' => 'Pesado',
        'price' => 85000,
        'installment' => 2,
        'completed_installment' => 80000,
    ];

    const MOTOCICLO = [
        'name' => 'Motociclo',
        'price' => 25000,
        'installment' => 2,
        'completed_installment' => 20000,
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::updateOrCreate(['name' => static::LIGEIRO['name']], static::LIGEIRO);
        Category::updateOrCreate(['name' => static::PESADO['name']], static::PESADO);
        Category::updateOrCreate(['name' => static::MOTOCICLO['name']], static::MOTOCICLO);
    }
}
