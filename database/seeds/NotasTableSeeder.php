<?php
use Illuminate\Database\Seeder;
use App\Notas;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notas::create([
            'title' => 'Prova ',
            'description' => 'Prova sobre números imaginários',
            'scheduledto' => '2018-09-01 13:15:00',
            'user_id' => 1
        ]);
        Notas::create([
            'title' => 'Desenvolver o trabalho ',
            'description' => 'Implementar o trabalho final da disciplina',
            'scheduledto' => '2018-10-01 13:15:00',
            'user_id' => 2
        ]);
        Notas::create([
            'title' => 'Teste 3',
            'description' => 'Implementar o trabalho',
            'scheduledto' => '2018-10-01 13:15:00',
            'user_id' => 3
        ]);
    }
}