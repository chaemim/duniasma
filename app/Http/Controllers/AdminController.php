<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Alert;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikel;
use App\User;
use App\Video;
use App\Notification;
use Charts;

class AdminController extends Controller
{
  public function dashboard()
  {

    $user = User::get();
    $video = Video::get();
    $artikel = Artikel::where('accepted' , '0')->get();
    $jumlahartikel = Artikel::where('accepted' , '1')->get();

    $chart = Charts::create('bar', 'chartjs')
    ->title('Total')
    ->labels(['User', 'Video', 'Artikel'])
    ->values([$user->count() ,$video->count(),$jumlahartikel->count()])
    ->dimensions(1000,500)
    ->responsive(false);

    return view('layout/admin/dashboard' , compact('artikel' , 'artikell' , 'user' , 'video' , 'chart' ,'jumlahartikel'));
  }

  public function acceptartikel($id)
  {
    Artikel::where('id' , $id)->where('accepted' , '0')->update(['accepted' => 1]);

    $artikel =  Artikel::findOrFail($id);
    if($artikel->user->id != Auth::user()->id){
    Notification::create([
        'id_user' => $artikel->user->id,
        'id_model' => $id,
        'subject' => "Artikel berjudul " . $artikel->title ." Diterima oleh Admin " .Auth::user()->name,
    ]);
  }
    alert()->success('Artikel Diterima', 'Good!');
    return redirect('/admin/dashboard');
  }


  public function search(Request $request)
  {
    $search = $request->pencarian;
    $artikel = Artikel::where('title', 'like' , "%$search%")->get();

    return view('layout/admin/cariartikel' , compact('artikel' , 'search'));
  }

}
