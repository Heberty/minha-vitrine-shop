<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
    		'title_site' 		=> 'Minha Vitrine',
            'description_site'  => 'Minha Vitrine',
            'keywords_site' 	=> 'vitrine',
            'email' 			=> 'exemple@minhavitrine.shop',
            'whatsapp' 			=> '(84) 9999-9999',
            'title_whatsapp'    => 'Whatsapp Matriz',
            'whatsapp_message'  => 'Oi',
            'instagram'			=> 'minhavitrine',
            'predominant_color' => '#B6298F',
            'secondary_color'   => '#8c206e',
            'button_color'      => '#74AA46',
            'text_legal' 		=> '*Todos os produtos listados neste site estão sujeitos a disponibilidade em estoque e alteração de preço sem aviso prévio. **A entrega grátis está sujeita a avaliação de acordo com a localidade. ***O pagamento só é realizado no ato da entrega. ****Consulte condições comerciais entrando em contato pelo formulário de contato ou ligando no',
            'active_trial' 	    => '0',
            'active_linkme'     => '1',
            'active_vitrine' 	=> '1'
        ]);
    }
}
