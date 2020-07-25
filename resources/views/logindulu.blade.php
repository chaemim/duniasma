@extends('master')

@section('title')
  Login Dulu
@endsection


@section('content')
  <section class="bg-light" id="portfolio">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center">


          <h2 class="section-heading text-uppercase" id="error">Anda Harus Login terlebih dahulu <br>
            <a href="{{asset('auth/login')}}" id="disini">disini</a>
          </h2>

        </div>
      </div>

      </div>
    </div>
  </section>

@endsection
