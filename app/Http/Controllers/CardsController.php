<?php

namespace App\Http\Controllers;

use App\Card;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CardsController extends Controller
{
    public function index(){
    	// $cards = \DB::table('cards')->get();
    	$cards = Card::all();
    	return view('cards.index', compact('cards'));
    }

    public function show(Card $card){

    	// $card = Card::with('notes.user')->find(1);
     //    dd($card);
        $card->load('notes.user');

    	// return view('cards.show', compact('card'));
    	return view('cards.show', compact('card'));
    }
}
