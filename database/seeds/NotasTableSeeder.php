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
            'title' => 'estagio',
            'day' => 'segunda',
            'description' => 'Naaaa',
            'scheduledto' => '2018-09-01',
            'hour' => '23:00',
            'user_id' => 1
        ]);
    }
}