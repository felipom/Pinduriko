<?php
use Illuminate\Database\Seeder;
use App\Produtos;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produtos::create([
            'client' => 'Felipe',
            'product' => 'Pastel',
            'price' => '20',
            'scheduledto' => '2018-09-01',
            'user_id' => 1
        ]);
    }
}