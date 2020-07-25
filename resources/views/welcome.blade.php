@extends('master')

@section('title')
DUNIA SMA
@endsection

@section('content')

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text" id="intro-text">
                  <div class="intro-lead-in" id="duniasma">DUNIA SMA</div>
        <div class="intro-lead-in" id="belajar">- Belajar Dimanapun dan Kapanpun -</div>
        {{-- <div class="intro-heading text-uppercase">It's Nice To Meet You</div> --}}
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services" id="button">Mulai Belajar</a>
      </div>
    </div>
  </header>

  <!-- Team -->
  <section class="bg-light" id="tentang" style="background-color:#1fbba6 !important">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Tentang Kami</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large">Belajar online materi SMA kelas 10 - 12 untuk pelajaran Matematika, IPA, IPS, Bahasa Indonesia dan Bahasa Inggris..</p>
          <p class="quote">~ Tidak ada kata terlambat untuk belajar ~</p>

        </div>
      </div>
    </div>
  </section>


  <!-- Services -->
  <section id="services" style="background-color:#f8f9fa !important">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Konten</h2>
          <h3 class="section-subheading text-muted">Konten yang ada di dunia SMA</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <a href="{{route('video')}}"> <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-video-camera fa-stack-1x fa-inverse"></i></a>
          </span>
          <h4 class="service-heading"><a href="{{route('video')}}">Video</a></h4>
          <p class="text-muted">Berisi Tutorial pembelajaran berbasis Video.</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <a href="{{route('materi')}}">  <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i></a>
          </span>
          <h4 class="service-heading"><a href="{{route('materi')}}">Materi</a></h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <a href="{{route('artikel')}}">  <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i></a>
          </span>
          <h4 class="service-heading"><a href="{{route('artikel')}}">Artikel</a></h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-3">
          <span class="fa-stack fa-4x">
            <a href="{{route('tips')}}"> <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-lock fa-stack-1x fa-inverse"></i></a>
          </span>
          <h4 class="service-heading"><a href="{{route('tips')}}">Tips dan Trik</a></h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- work section -->
<section id="works" class="works section no-padding">
  <h2 class="section-heading text-uppercase text-center">Daftar Video</h2>
  <h3 class="section-subheading text-muted text-center">Lorem ipsum dolor sit amet consectetur.</h3>
  <div class="container-fluid">
    <div class="row no-gutter">

      @foreach ($video as $v)
        <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="{{route('video')}}/{{$v->id}}" class="work-box"> <img src="http://img.youtube.com/vi/{{$v->file_video}}/hqdefault.jpg" alt="">
          <div class="overlay">
            <div class="overlay-caption">
              <h5>{{$v->title}}</h5>
              <p>{{$v->deskripsi}}</p>
            </div>
          </div>
          <!-- overlay -->
          </a> </div>
      @endforeach

    </div>
  </div>
</section>
<!-- work section -->


  <section class="bg-light" id="artikel" style="background-color:#ecf0f1 !important">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Post Terbaru</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>

      <div class="row">
        @foreach ($artikel as $a)
          <div class="col-md-4 col-sm-6 artikel-item">
            <a class="artikel-link" data-toggle="modal" href="{{route('artikel')}}/{{$a->id}}">
              <div class="artikel-hover">
                <div class="artikel-hover-content">
                  {{-- <i class="fa fa-plus fa-3x"></i> --}}
                </div>
              </div>
              <img class="img-fluid" src="{{asset('img/artikel/'.$a->featured_img)}}" id="gambarartikel">
            </a>
            <div class="artikel-caption">
              <h4><a href="{{route('artikel')}}/{{$a->slug}}">{{$a->title}}</a></h4>
              <p class="text-muted">{!! \Illuminate\Support\Str::words($a->deskripsi, 10,'...') !!}</p>
              <p class="author"><a href="/profil/{{$a->user->id}}">{{$a->user->name}}</a></p>
              <p class="kategori">{{$a->kategori->kategori}}</p>
            </div>
          </div>

        @endforeach

      </div>
    </div>
  </section>

  <!-- Portfolio Modals -->

  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fa fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
