<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Requests\CardUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;

class CardsController extends Controller
{

    public function edit(Card $card)
    {
        $cards = Card::get();

        return view('admin.cards.edit', compact('cards', 'card'));
    }

    public function update(CardUpdateRequest $request, Card $card)
    {
        try {
            $card->update($request->all());

            $card->save();

            return redirect()->to('admin/cards/edit/1')->with('success', 'Cartões atualizado');

        } catch (\Exception $e) {

            return redirect()->to('admin/cards/edit/1')->with('error', 'Erro ao atualizar os cartões');

        }
    }
}
