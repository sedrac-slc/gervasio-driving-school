<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::updateOrCreate(['name' => 'Licença de apredizagem'], [
            'name' => 'Licença de apredizagem', 'price' => 6198
        ]);

        Article::updateOrCreate(['name' => 'Atestado médico'], [
            'name' => 'Atestado médico', 'price' => 3500
        ]);

        Article::updateOrCreate(['name' => 'Taxa exame motociclo'], [
            'name' => 'Taxa exame motociclo', 'price' => 16833
        ]);

        Article::updateOrCreate(['name' => 'Taxa exame ligeiro'], [
            'name' => 'Taxa exame ligeiro', 'price' => 22341
        ]);

        Article::updateOrCreate(['name' => 'Taxa exame pesado'], [
            'name' => 'Taxa exame pesado', 'price' => 25918
        ]);

        Article::updateOrCreate(['name' => 'Antecedente'], [
            'name' => 'Antecedente', 'price' => 1000
        ]);

        Article::updateOrCreate(['name' => 'Formulário'], [
            'name' => 'Formulário', 'price' => 1000
        ]);

        Article::updateOrCreate(['name' => 'Ficha técnica'], [
            'name' => 'Ficha técnica', 'price' => 1000
        ]);
    }
}
