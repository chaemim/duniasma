@extends('master')

@section('title')
  Halaman Login
@endsection

@section('content')
    <div class="container-fluid" id="atas">
      <div class="row">
        <div class="col-sm-4 offset-sm-4">

        <h2 class="text-center">Halaman Login</h2>


          <form action="/auth/login" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Email</label><br>
              @if ($errors->has('email'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('email') }}</strong>
                   </span>
                       @endif
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
            </div>

            <div class="form-group">
              <label for="password">Password</label><br>
              @if ($errors->has('password'))
                       <span class="help-block">
                             <strong id="formerror">{{ $errors->first('password') }}</strong>
                       </span>
              @endif
              <input type="password" class="form-control" id="password" name="password">
            </div>

            <input type="submit" name="submit" value="Login" class="btn btn-default" id="tombol">
          </form>

            <h6 id="daftardisini">Belum Punya Akun ? Daftar <a href="{{asset('/auth/register')}}" id="disini">Disini</a></h6>

        </div>
      </div>
    </div>
@endsection
