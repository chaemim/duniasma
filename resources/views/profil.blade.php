@extends('master')

@section('title')
  Halaman Profile
@endsection

  <style media="screen">
    #profil{
      padding-top: 120px;
      padding-bottom: 300px;
      text-align: center;
      color: #1fbba6;
      background-color: #f8f9fa;
    }
    #profil ul{
      list-style-type: none;
    }

    #gambarartikel2{
      width: 250px;
      height: 170px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .btn-default{
      background-color: #1fbba6;
      color: white;
    }
    .btn-default:hover{
      background-color: #1de6ca;
      color: white
    }

    #profil ul{
      margin-right: 50px;
    }
    #p{
      margin-right: 10px;
    }

  </style>

@section('content')

    <div id="profil">

      @if(Session::has('success_message'))
               <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <i class="fa fa-info-circle"></i> {{Session::get('success_message')}}
               </div>
               @endif
     @if(Session::has('danger_message'))
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i> {{Session::get('danger_message')}}
              </div>
              @endif
      <br>
      <p id="p" style="font-size:24px">{{$user->name}}</p>
      <ul style="font-size:18px" class="align-center">
          <li>Email : {{$user->email}}</li>
          <li>Sekolah : {{$user->sekolah}} </li>
          <li>Tempat Asal : {{$user->tempatasal}}</li>
          <li>Umur : {{$age}} Tahun</li>
          Joined at {{ $user->created_at->diffForHumans() }}

      </ul>

    @if(isset(Auth::user()->id))
      @if (Auth::user()->id == $user->id)
      <a href="{{asset('user/'. $user->id .'/edit')}}" class="btn btn-default">Edit Profil</a>
      @endif
    @endif

<br><br>
      <section class="bg-light" id="artikel" style="background-color:#ecf0f1 !important">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h3 class="section-heading text-uppercase">Post Artikel</h3>
              </div>
          </div>
<br>
          <div class="row">
            @foreach ($artikel as $a)
              <div class="col-md-3 col-sm-6 artikel-item">
                <a class="artikel-link" data-toggle="modal" href="{{route('artikel')}}/{{$a->id}}">
                  <div class="artikel-hover">
                    <div class="artikel-hover-content">
                      {{-- <i class="fa fa-plus fa-3x"></i> --}}
                    </div>
                  </div>
                  <img class="img-fluid" src="{{asset('img/artikel/'.$a->featured_img)}}" id="gambarartikel2">
                </a>
                <div class="artikel-caption">
                  <h4><a href="{{route('artikel')}}/{{$a->slug}}">{{$a->title}}</a></h4>
                  <p class="text-muted">{!! \Illuminate\Support\Str::words($a->deskripsi, 10,'...') !!}</p>
                  <p class="author"><a href="/profil/{{$a->user->id}}">{{$a->user->name}}</a></p>
                  <p class="kategori">{{$a->kategori->kategori}}</p>
                </div>
              </div>

                {{-- <div>
                <a href="#" class="btn btn-sm btn-success">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
              </div> --}}

            @endforeach

          </div>
        </div>
      </section>


    </div>

@endsection
