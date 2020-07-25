@extends('layout/admin/admin')

@section('title')
  Video
@endsection

@section('header')
  Video
@endsection

@section('breadcrumb')
  video
@endsection

@section('content')

  <section class="tables">
    <div class="container-fluid">
      <div class="row">


        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Post Video</h3>
              <a href="{{asset('/admin/video/tambah')}}" class="btn btn-default" id="postbaru">Post Baru</a>
            </div>

            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Deksripsi</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Dilihat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($video as $video)
                    <tr>
                      <th scope="row">{{$video->id}}</th>
                      <td>{{$video->title}}</td>
                      <td>{{$video->deskripsi}}</td>
                      <td>{{$video->mapel->mapel}}</td>
                      <td>{{$video->kelas->nama_kelas}}</td>
                      <td>{{$video->created_at}}</td>
                      <td>{{count($video->videoview). ' Kali'}}</td>
                      <td> <a href="{{asset('video/' . $video->id)}}">
                              <span class="label label-primary"><i class="fa fa-eye"> Lihat </i></span></a>
                        <a href="{{asset('/admin/video/' . $video->id . '/edit')}}">
                              <span class="label label-warning"><i class="fa fa-edit"> Edit </i></span></a>
                                  <a href="{{action('VideoController@destroy' ,[$video->id])}}" title="hapus" >
                              <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span></a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="row">
                <div class="col-md-6">
                  {!! $chart->render() !!}
                </div>

                <div class="col-md-6">
                  {!! $chart1->render() !!}
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  {!! $chart2->render() !!}
                </div>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
  </section>


@endsection
