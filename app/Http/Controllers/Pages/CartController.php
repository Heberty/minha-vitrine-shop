<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Type;
use App\Models\Setting;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function session(Request $request)
    {
        $cart = Session::get('cart');
        echo '<pre>';
        var_dump($cart);
    }

    public function put(Request $request)
    {
        Session::pull('cart');
    }

    public function cart()
    {
        $products = Product::get();
        $sum = '';
        $sum = intval($sum);
        if(Session::has('cart')) {
            $carts = Session::get('cart');
            foreach($carts as $cart) {
                foreach($cart as $value) {
                    $sum += $value->price;
                }
            }
        } else {
            $carts = null;
        }
        $types = Type::get();
        $sum = 'R$' . formatPrice($sum);
        
        return view('pages.cart', compact('carts', 'types', 'products', 'sum'));
    }

    public function addCart($product)
    {   
        try {
            $item = Product::where('id', '=', $product)->first();

            Session::put('cart.' . $product, [$item]);

            return redirect()->route('cart')->with('success', 'Produto adicionado ao carrinho!');
        } catch(\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao adicionar o produto ao carrinho');
        }
    }

    public function deleteCart($product)
    {
        try {
            Session::forget('cart.' . $product);

            return redirect()->route('cart')->with('success', 'Produto adicionado ao carrinho!');
        } catch(\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao adicionar o produto ao carrinho');
        }
    }

    public function sendCart(CartRequest $request)
    {   
        try {
            // dd($request->all());
            if(Session::has('cart') && !empty(Session::get('cart'))) {

                $whatsapp = '';
                $settings = Setting::get();
                foreach($settings as $setting) {
                    $whatsapp = $setting->whatsapp;
                }
                $message = '';
                $total = '';
                $total = intval($total);
                $enter = '%0D';
                $carts = Session::get('cart');

                $message .= '🛒*OLÁ, ESTE É MEU CARRINHO DE COMPRAS:*' . $enter . $enter;
                $message .= '*Nome:* ' . '_' . $request->name . '_' . $enter;
                $message .= '*Endereço:* ' . '_' . $request->adress . '_' . $enter;
                $message .= '*Entrega ou retirada:* ' . '_' . $request->entrega . '_' . $enter;
                $amount = $request->all();
                foreach($carts as $cart) {
                    foreach($cart as $value) {
                        $message .= $enter;
                        $message .= '📦 ' . '_' . $value->title . ' - ' . $value->brand . '_' . $enter;
                        $message .= '*Link:* ' . route('offer', $value->slug) . $enter;
                        $message .= '*Obs.:* ' . '_' . $value->text_legal . '_' . $enter;
                        $message .= '*Quant.:* ' . '_' . $request->amount . '-' . $enter;
                        $message .= '*Preço unitário:* ' . '_' . 'R$' . formatPrice($value->price) . '_' . $enter;
                        $message .= $enter;

                        $total += $value->price;

                    }
                }
                
                $message .= '💰' . '*Valor Total:* ' . '_' . 'R$' . formatPrice($total) . '_' . $enter;

                $link = 'https://api.whatsapp.com/send?phone=550' . formatNumber($whatsapp) . '&text=' . $message;

                return redirect()->to($link)->with('success', 'Carrinho enviado!');

            }

        } catch(\Exception $e) {
            logger()->error($e->getMessage());

            return redirect()->back()->with('error', 'Erro ao enviar o carrinho!');
        }
    }

    public function deleteAllCart()
    {
        Session::put('cart');

        return redirect()->back()->with('success', 'Carrinho esvaziado!');
    }
}
