<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Artikel;
use App\CommentArtikel;
use App\Notification;

class CommentController extends Controller
{

    public function store(Request $request , $id)
    {
      $this->validate($request, [
          'comment' => 'required',
      ]);

      $comment = CommentArtikel::create([
          'comment' => $request['comment'],
          'id_artikel' => $id,
          'id_user' => Auth::user()->id,
      ]);

      // if($artikel->user->id != Auth::user()->id){
      // Notification::create([
      //     'id_user' => $artikel->user->id,
      //     'id_model' => $id,
      //     'subject' => "Ada Komentar dari " . Auth::user()->name,
      // ]);

      $artikel = Artikel::findOrFail($id);
      if($artikel->user->id != Auth::user()->id){
      Notification::create([
          'id_user' => $artikel->user->id,
          'id_model' => $id,
          'subject' => "Ada Komentar dari " . Auth::user()->name ." di " . $artikel->title,
      ]);
    }

      return redirect('/artikel/'.$artikel->slug);
}

    public function edit($id)
    {

        $comment = CommentArtikel::findOrFail($id);
        return view('layout.artikel.editkomentar' , compact('comment'));
    }


    public function update(Request $request, $id)
    {
      $comment = CommentArtikel::findOrFail($id);
      if ($comment->isOwner()) {
        $comment->update([
          'comment'        => $request->comment ,
        ]);
      }else {
        abort(404);
      }
      return redirect('/artikel/'.$comment->artikel->slug);
    }

    public function destroy($id)
    {
      $comment = CommentArtikel::findOrFail($id);
      if ($comment->isOwner()) {
        $comment->delete();
      }else {
        abort(404);
      }
      return redirect('/artikel/'.$comment->artikel->slug);
    }
}
