@extends('layout/admin/admin')

@section('title')
  Dashboard Admin
@endsection

@section('header')
  Dashboard
@endsection

@section('content')
  <style media="screen">
    .action{
      position: absolute;
      right: 25%;
    }
    .action a{
      margin-bottom:5px ;
    }

    section{
      padding-top: 100px;
      margin-bottom: 20px;
    }
  </style>

  <!-- Dashboard Counts Section-->

  <section class="dashboard-counts no-padding-bottom" style="margin-bottom:-20px">

    <div class="container-fluid">
      <div class="row bg-white has-shadow">
        <!-- Item -->

        <div class="col-xl-12 col-sm-12 align-item-center">
          <div class="item d-flex align-items-center">
            <div class="title"><span>Selamat Datang<br>Admin {{Auth::user()->name}}</span>
            </div>
          </div>

      </div>
    </div>
  </section>

@if (count($artikel) != 0)
  <section class="dashboard-counts no-padding-bottom" style="margin-bottom:0px">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">
          <div class="col-xl-12 col-sm-12">
              <h4 style="margin-left:20px">Artikel Terbaru (Butuh Persetujuan)</h4><br>
            </div>
      </div>
    </div>
  </section>

<section class="projects no-padding-top" style="margin-top:-30px">
  <div class="container-fluid">
    @foreach ($artikel as $artikel)
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="{{asset('img/artikel/' . $artikel->featured_img)}}" alt="..." class="img-fluid"></div>
              <div class="text">
                <h3 class="h4">{{$artikel->title}}</h3><small>{!! \Illuminate\Support\Str::words($artikel->deskripsi, 7,' ....') !!}</small>
              </div>
            </div>
            <div class="project-date"><span class="hidden-sm-down">{{ $artikel->created_at->diffForHumans() }} at </span></div>
          </div>
          {{-- date('d-m-Y H:i:s', strtotime('-24 hours') --}}
          <div class="right-col col-lg-6 d-flex align-items-center">
            <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
            <div class="comments"><i class="fa fa-comment-o"></i>{{$artikel->comment->count()}}</div>
            <div class="project-progress">
                <a href="{{asset('artikel/' . $artikel->slug)}}" class="btn btn-sm btn-primary">Lihat</a>
                <a href="{{asset('/admin/artikel/'.$artikel->id.'/accept')}}" class="btn btn-sm btn-success">accept</a>
                <a href="href="{{action('ArtikelController@destroy' ,[$artikel->id])}}"" class="btn btn-sm btn-danger">Tolak</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endif
<section class="dashboard-counts no-padding-bottom" style="margin-top : -70px">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-violet"><i class="icon-user"></i></div>
          <div class="title"><span>Total<br>User</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
            </div>
          </div>
          <div class="number"><strong>{{$user->count()}}</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="icon-padnote"></i></div>
          <div class="title"><span>Total<br>Artikel</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
            </div>
          </div>
          <div class="number"><strong>{{$jumlahartikel->count()}}</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="icon-bill"></i></div>
          <div class="title"><span>Total<br>Video</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
            </div>
          </div>
          <div class="number"><strong>{{$video->count()}}</strong></div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Dashboard Header Section    -->

<section class="dashboard-counts no-padding-bottom">

  <div class="container-fluid">
    <div class="row bg-white has-shadow">
      <!-- Item -->

      <div class="col-xl-12 col-sm-12 align-item-center">
        <div class="item d-flex align-items-center">
          {!! $chart->render() !!}
        </div>
      </div>

    </div>
  </div>
</section>


@endsection
