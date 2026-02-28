<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Aulas práticas de condução (DRIVER) - 25 tópicos
        $driverTopics = [
            'Arranque e paragem do veículo',
            'Estacionamento paralelo',
            'Estacionamento perpendicular',
            'Estacionamento em diagonal',
            'Manobra de inversão de marcha',
            'Condução em marcha-atrás',
            'Mudanças de velocidade',
            'Travagem de emergência',
            'Ultrapassagem',
            'Cedência de passagem',
            'Rotundas e cruzamentos',
            'Condução em autoestrada',
            'Condução em estrada nacional',
            'Condução em zona urbana',
            'Viragem à esquerda e à direita',
            'Uso de espelhos retrovisores',
            'Condução noturna',
            'Condução em condições adversas (chuva)',
            'Condução em subida e descida',
            'Arranque em subida',
            'Distância de segurança',
            'Uso correto dos faróis',
            'Manobra de garagem',
            'Técnica de volante',
            'Condução económica e defensiva',
        ];

        foreach ($driverTopics as $topic) {
            Lesson::updateOrCreate(['topic' => $topic], ['topic' => $topic, 'type' => Lesson::DRIVER]);
        }

        // Aulas teóricas (TEORIC) - 25 tópicos
        $teoricTopics = [
            'Código da estrada - Introdução',
            'Sinais de perigo',
            'Sinais de proibição',
            'Sinais de obrigação',
            'Sinais de informação',
            'Marcas rodoviárias',
            'Regras de prioridade',
            'Limites de velocidade',
            'Álcool e condução',
            'Drogas e condução',
            'Fadiga ao volante',
            'Uso do cinto de segurança',
            'Sistemas de retenção para crianças',
            'Documentos obrigatórios do condutor',
            'Documentos obrigatórios do veículo',
            'Primeiros socorros em acidentes',
            'Procedimentos em caso de acidente',
            'Seguro automóvel obrigatório',
            'Inspeção técnica do veículo (ITV)',
            'Funcionamento do motor',
            'Manutenção básica do veículo',
            'Pneus: pressão e desgaste',
            'Sistema de travagem',
            'Iluminação e visibilidade',
            'Ecologia e condução sustentável',
        ];

        foreach ($teoricTopics as $topic) {
            Lesson::updateOrCreate(['topic' => $topic], ['topic' => $topic, 'type' => Lesson::TEORIC]);
        }

    }
}
