<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Video;
use App\Artikel;
use App\Notification;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
      $artikel = Artikel::orderBy('created_at' , 'desc')->where('accepted' , '1')->paginate(3);
      $video = Video::orderBy('created_at', 'desc')->paginate(8);

      return view('welcome' , compact('artikel' , 'video'));
    }

      public function profil($id = null)
      {
          if ($id == null) {
            $user = User::findOrFail(Auth::user()->id);
            $artikel = Artikel::where('id_admin' , Auth::user()->id)->orderby('created_at', 'desc')->get();
          }else {
            $user = User::findOrFail($id);
            $artikel = Artikel::where('id_admin' , $id)->orderby('created_at', 'desc')->get();
          }

          $now = \Carbon\Carbon::now();
          $b_day = \Carbon\Carbon::parse($user->tanggal_lahir);
          $age = $b_day->diffInYears($now);  // Menghitung umur

          return view('profil' , compact('user') , compact('age' , 'artikel'));
      }

      public function edituser($id)
      {
          $user = User::findOrFail($id);
          if ($user->isOwner()) {
            return view('layout.admin.user.edituser' , compact('user'));
          }else {
            abort(404);
          }
      }

      public function updateuser(Request $request, $id)
      {
        $user = User::findOrFail($id);

          $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'sekolah'=> $request['sekolah'],
            'tempatasal' => $request['tempatasal'] ,
            'tanggal_lahir' => $request['tanggal_lahir'],
        ]);
        if ($request->passowrd != '') {
          $user->update([
            'password'           =>  bcrypt($request->password)
          ]);
        }
        Session::flash('success_message','Profil Berhasil Diedit');
        return Redirect::action('HomeController@profil');
      }


      public function get_notif()
      {
          $user = Auth::user();
          $notifikasi = Notification::where('id_user' , $user->id)->orderBy('id', 'desc')->get();
          $notif_model = new Notification;
          return view ('notifikasi' , compact('notifikasi' , 'notif_model' , 'user'));
      }

}
