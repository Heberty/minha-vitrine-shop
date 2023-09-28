<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'hipercard' => 0,
            'american' => 0,
            'aura' => 0,
            'hiper' => 0,
            'visa' => 0,
            'diners' => 0,
            'elo' => 0,
            'master' => 0,
            'boleto' => 0,
            'itau' => 0,
            'caixa' => 0,
            'bradesco' => 0,
            'brasil' => 0,
            'santander' => 0,
            'nubank' => 0,
            'inter' => 0,
            'next' => 0,
        ]);
    }
}
