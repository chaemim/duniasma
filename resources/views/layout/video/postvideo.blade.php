@extends('master')

@section('title')
  {{$video->title}}
@endsection



@section('content')
  <section class="bg-light" id="portfolio">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center">


          <h2 class="section-heading text-uppercase">{{$video->title}}</h2>
          <h3 class="section-subheading text-muted">{{$video->deskripsi}}</h3>
          <h5 class="text-muted">Mapel : {{$video->mapel->mapel}}</h5>
          <h5 class="text-muted">Kelas : {{$video->kelas->nama_kelas}}</h5>
          {{-- <h3 class="section-subheading text-muted">Dibuat : {{ date('d M, Y', strtotime($video->created_at)) }}</h3> --}}
          <h5 class="text-muted">Posted By : {{$video->user->name}}</h5>

            <iframe width="800" height="500" src="http://www.youtube.com/embed/{{$video->file_video}}" frameborder="0" allowfullscreen></iframe>

        </div>
      </div>



      </div>
    </div>
  </section>


@endsection
