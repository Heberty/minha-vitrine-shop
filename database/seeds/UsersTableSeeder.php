<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'         => 'Minha Vitrine',
            'email'        => 'contato@minhavitrine.shop',
            'type'         => 'admin',
            'password'     => bcrypt('1q2w3e4r')
        ]);

        DB::table('users')->insert([
            'name'         => 'Usuário Comum',
            'email'        => 'usuario@exemplo.com.br',
            'type'         => 'user',
            'password'     => bcrypt('1q2w3e4r')
        ]);
        
    }
}
