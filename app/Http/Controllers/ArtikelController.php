<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Alert;
use DB;
use App\Http\Requests;
use App\Http\Requests\ArtikelRequest;
use App\Http\Controllers\Controller;
use App\Artikel;
use App\CommentArtikel;
use App\Notification;
use Charts;


class ArtikelController extends Controller
{
    public function index()
    {

      $artikel = Artikel::where('accepted' , '1')->orderby('created_at', 'desc')->get();

      return view('layout/artikel/listartikel' , compact('artikel'));
    }



    public function create()
    {
      $kategori = DB::table('kategoriartikel')
                  ->get();
        return view('layout/admin/tambahartikel',  ['kategori' => $kategori]);
    }



    public function store(ArtikelRequest $request)
    {
      $filename = time() . '.' .$request->file('featured_img')->getClientOriginalExtension();
      $request->file('featured_img')->move(
        base_path() . '/public/img/artikel/', $filename
    );

      $slug = str_slug($request->title, '-');

      //mengecek str_slug
      if (Artikel::where('slug', $slug)->first() != null) {
        $slug = $slug . '-' . time();
      }

      $artikel = new Artikel();
      $artikel->title           = $request->title;
      $artikel->deskripsi       = $request->deskripsi;
      $artikel->featured_img    = $filename;
      $artikel->id_kategori     = $request->id_kategori;
      $artikel->id_admin        = $request->id_admin;
      $artikel->accepted        = $request->accepted;
      $artikel->slug            = $slug;
      $artikel->save();

      alert()->success('Artikel Berhasil Ditambah.', 'Good!');
      return Redirect::action('ArtikelController@indexAdmin');
    }



    public function show($slug)
    {
      $artikel = Artikel::where('slug' , $slug)->first();
      return view('layout/artikel/postartikel' , ['artikel' => $artikel]);
    }

    public function materi()
    {
      $artikel = Artikel::where('id_kategori' , '1')->where('accepted' , '1')->get();

      return view('layout/artikel/listmateri' , ['artikel' => $artikel]);
    }
    public function tips()
    {
      $artikel = Artikel::where('id_kategori' , '3')->where('accepted' , '1')->get();

      return view('layout/artikel/listtips' , ['artikel' => $artikel]);
    }



    public function edit($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel)
        abort(404);

        $kategori = DB::table('kategoriartikel')
                    ->get();
        return view('layout/admin/editartikel' , ['artikel' => $artikel , 'kategori' => $kategori]);
    }



    public function update(Request $request, $id)
    {
      if (isset($request->featured_img)) {
        $filename = time() . '.' . $request->file('featured_img')->getClientOriginalExtension();
        $request->file('featured_img')->move(
          base_path() . '/public/img/artikel/', $filename
        );
      }

    Artikel::find($id)->update([
      'title'           => $request->title ,
      'deskripsi'       => $request->deskripsi ,
      'id_kategori'     => $request->id_kategori ,
      'id_admin'        => $request->id_admin ,
    ]);
    if (isset($request->featured_img)) {
      Artikel::find($id)->update([
        'featured_img'    => $filename ,
    ]);
    }

      alert()->success('Artikel Berhasil DiUpdate.', 'Berhasil!');
      return Redirect::action('ArtikelController@indexAdmin');
    }



    public function destroy($id)
    {
      $artikel = Artikel::find($id);

      $artikel->delete();
      alert()->success('Artikel Berhasil Dihapus.', 'Sukses!')->persistent("Done");;
      return Redirect::action('ArtikelController@indexAdmin');
    }



    public function indexAdmin()
    {
      $chart = Charts::database(Artikel::all(), 'pie', 'chartjs')
          ->title('Artikel Berdasarkan Tanggal upload')
          ->elementLabel("Bulan")
          ->groupByMonth('2017', true);

      $chart1 = Charts::database(Artikel::all(), 'donut', 'chartjs')
          ->title('Artikel Berdasarkan  Kategori')
          ->elementLabel("kategori")
           ->groupBy('id_kategori', null, [1 => 'Materi', 2 => 'Artikel', 3 => 'Tips & Trik']);

        $artikel = Artikel::orderby('created_at', 'desc')->get();
      return view('layout/admin/artikel' , compact('artikel' , 'chart' , 'chart1'));
    }


    public function createuser()
    {
      $kategori = DB::table('kategoriartikel')
                  ->get();
        return view('layout/artikel/tambahartikel',  ['kategori' => $kategori]);
    }

    public function storeuser(ArtikelRequest $request)
    {
      $filename = time() . '.' .$request->file('featured_img')->getClientOriginalExtension();
      $request->file('featured_img')->move(
        base_path() . '/public/img/artikel/', $filename
    );

      $slug = str_slug($request->title, '-');

      //mengecek str_slug
      if (Artikel::where('slug', $slug)->first() != null) {
        $slug = $slug . '-' . time();
      }

      $artikel = new Artikel();
      $artikel->title           = $request->title;
      $artikel->deskripsi       = $request->deskripsi;
      $artikel->featured_img    = $filename;
      $artikel->id_kategori     = $request->id_kategori;
      $artikel->id_admin        = $request->id_admin;
      $artikel->accepted        = $request->accepted;
      $artikel->slug            = $slug;
      $artikel->save();

      Session::flash('success_message','Artikel '. $request->title .' Menunggu Konfirmasi dari Admin');
      return Redirect::action('HomeController@profil');
    }

    public function edituser($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel)
        abort(404);

        $kategori = DB::table('kategoriartikel')
                    ->get();
        return view('layout/artikel/editartikel' , ['artikel' => $artikel , 'kategori' => $kategori]);
    }



    public function updateuser(Request $request, $id)
    {
      if (isset($request->featured_img)) {
        $filename = time() . '.' . $request->file('featured_img')->getClientOriginalExtension();
        $request->file('featured_img')->move(
          base_path() . '/public/img/artikel/', $filename
        );
      }

    Artikel::find($id)->update([
      'title'           => $request->title ,
      'deskripsi'       => $request->deskripsi ,
      'id_kategori'     => $request->id_kategori ,
      'id_admin'        => $request->id_admin ,
    ]);
    if (isset($request->featured_img)) {
      Artikel::find($id)->update([
        'featured_img'    => $filename ,
    ]);
    }

    Session::flash('success_message','Artikel '. $request->title .' Berhasil diedit');
      return Redirect::action('HomeController@profil');
    }



    public function destroyuser($id)
    {
      $artikel = Artikel::find($id);

      $artikel->delete();

      Session::flash('danger_message','Artikel Berhasil Dihapus');
      return Redirect::action('HomeController@profil');
    }



}
