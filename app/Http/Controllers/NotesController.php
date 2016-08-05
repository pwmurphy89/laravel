<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Note;

use App\Http\Requests;
// use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    public function store(Request $request, Card $card){
    	//option one
    	// $note = new Note;
    	// $note->body = $request->body;
    	// $card->notes()->save($note);

    	//option two
    	// $card->notes()->save(
    	// 	new Note(['body'=> $request->body])
    	// );

    	//option three
    	// $card->notes()->create([
    	// 	'body' => $request->body
    	// ]);

    	//option four
    	// $card->notes()->create($request->all());

    	//option five
    	// $card->addNote(
    	// 	new Note($request->all())
    	// );
    	$this->validate($request, [
    		'body' => 'required|min:10'
    	]);

    	$note = new Note($request->all());
   
    	$card->addNote($note, 1);
    	return back();
    }

    public function edit(Note $note){
    	return view('notes.edit', compact('note'));

    }

    public function update(Request $request, Note $note){
    	$note->update($request->all());
    	return back();
    }
}
