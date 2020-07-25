@extends('master')

@section('title')
  List Artikel
@endsection


  @section('content')

    <section class="bg-light" id="artikel">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Daftar Materi</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>

        <div class="row">

          @foreach ($artikel as $a)
            <div class="col-md-4 col-sm-6 artikel-item">
              <a class="artikel-link" data-toggle="modal" href="#">
                <div class="artikel-hover">
                  <div class="artikel-hover-content">

                  </div>
                </div>
                <img class="img-fluid" src="{{asset('img/artikel/'.$a->featured_img)}}" id="gambarartikel">
              </a>
              <div class="artikel-caption">
                <h4><a href="{{route('artikel')}}/{{$a->slug}}">{{$a->title}}</a></h4>
                <p class="text-muted">{!! \Illuminate\Support\Str::words($a->deskripsi, 10,'...') !!}</p>
                <p class="author"><a href="{{$a->user->id}}">{{$a->user->name}}</a></p>
                <p class="kategori">{{$a->kategori->kategori}}</p>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

  @endsection
