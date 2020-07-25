@extends('master')

@section('title')
  Halaman Profile
@endsection

  <style media="screen">
    #test{
      background-color: #f5f5f5;
      padding-bottom: 500px;
    }

  </style>

@section('content')

  <!--Test section-->
  <section id="test" class="test bg-grey">
      <div class="container">
          <div class="row">
              <div class="main_test fix">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="head_title text-center fix">
                          <h2 class="text-uppercase">Notifikasi</h2>
                      </div>
                  </div>

                  @foreach ($notifikasi as $notif)

                  <div class="col-md-6 offset-3">
                      <div class="test_item fix">
                          <div class="item_text">
                                  <p class="text-center"><a href="{{asset('artikel/'.$notif->artikel->slug)}}">{{$notif->subject}}</p>
                          </div>
                      </div>
                  </div><br>
                @endforeach
                  <?php
                    $notif_model::where('id_user' , $user->id)->where('seen' , 0)->update(['seen' => 1]);
                  ?>
            </div>
          </div>
      </div>
  </section><!-- End off test section -->
@endsection
