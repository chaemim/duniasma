@extends('layout/admin/admin')

@section('title')
  Artikel
@endsection

@section('header')
  Artikel
@endsection

@section('breadcrumb')
  artikel
@endsection

@section('content')
<style media="screen">
  #pencarian{
    margin-bottom: 20px;
    margin-top: -20px;
  }
</style>

  <section class="tables">
    <div class="container-fluid">
      <div class="row">


        <form class="form-inline offset-md-7" id="pencarian" action="{{asset('/admin/artikel/search')}}" method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" placeholder="Cari" name="pencarian" class="mx-sm-3 form-control">
                </div>
                    <button type="submit" name="Submit" class="btn btn-primary">Search</button>
              </form>


        <div class="col-lg-12">

          <div class="alert alert-info">
          <p>Pencarian Untuk "{{$search}}"</p>
          </div>

          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Post Artikel</h3>
                <a href="{{asset('/admin/artikel/tambah')}}" class="btn btn-default" id="postbaru">Post Baru</a>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Deksripsi</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($artikel as $artikel)
                    <tr>
                      <th scope="row">{{$artikel->id}}</th>
                      <td>{{$artikel->title}}</td>
                      <td>{!! \Illuminate\Support\Str::words($artikel->deskripsi, 7,' ....') !!}</td>
                      @if ($artikel->id_kategori==1)
                        <td>Materi</td>
                      @elseif ($artikel->id_kategori==2)
                        <td>Artikel</td>
                      @elseif ($artikel->id_kategori==3)
                        <td>Tips</td>
                      @endif
                      <td><img class="img-fluid" src="{{asset('img/artikel/'.$artikel->featured_img)}}" id="adminartikel"></td>
                      <td>{{$artikel->user->name}}</td>
                      <td>{{$artikel->created_at}}</td>
                      <td> <a href="{{asset('artikel/' . $artikel->slug)}}">
                              <span class="label label-primary"><i class="fa fa-eye"> Lihat </i></span></a>
                        <a href="{{asset('/admin/artikel/'.$artikel->id.'/edit')}}">
                              <span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
                            <a href="{{action('ArtikelController@destroy' ,[$artikel->id])}}">
                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                            </a>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>


      </div>
    </div>
  </section>


@endsection
