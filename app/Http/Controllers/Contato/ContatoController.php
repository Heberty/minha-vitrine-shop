<?php

namespace App\Http\Controllers\Contato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;
use App\Mail\ContatoEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

class ContatoController extends Controller
{
    public function sendContact(ContatoRequest $request)
    {

		$settings = Setting::get();

		foreach($settings as $setting) {
    		Mail::to($setting->email)->send(new ContatoEmail($request));
    		// Email que vai receber a mensagem
		}

    	return redirect()->to('/#fale-conosco')->with('success', 'Mensagem enviado com sucesso, aguarde o contato.');
    } 
}
