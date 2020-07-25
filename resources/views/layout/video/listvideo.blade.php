@extends('master')


@section('title')
  Turorial Video
@endsection

@section('content')



      <section id="works" class="works section no-padding">
        <h2 class="section-heading text-uppercase text-center">List Video</h2>
        <h3 class="section-subheading text-muted text-center">ini adalah list video</h3>
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




@endsection
