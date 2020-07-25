@extends('master')

@section('title')
  Halaman Register
@endsection

@section('content')
    <div class="container-fluid" id="atas">
      <div class="row">
        <div class="col-sm-4 offset-sm-4">

        <h2 class="text-center">Halaman Register</h2>


          <form action="{{asset('/auth/register')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Email</label><br>
              @if ($errors->has('email'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('email') }}</strong>
                   </span>
                       @endif
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
              <label for="name">Name</label><br>
              @if ($errors->has('name'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('name') }}</strong>
                   </span>
                       @endif
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
              <label for="tempatasal">Asal Daerah</label><br>
              @if ($errors->has('tempatasal'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('tempatasal') }}</strong>
                   </span>
                       @endif
              <input type="text" class="form-control" id="name" name="tempatasal" value="{{ old('tempatasal') }}">
            </div>

            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label><br>
              @if ($errors->has('tanggal_lahir'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('tanggal_lahir') }}</strong>
                   </span>
                       @endif
              <input type="date" class="form-control" id="name" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>

            <div class="form-group">
              <label for="sekolah">Sekolah</label><br>
              @if ($errors->has('sekolah'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('sekolah') }}</strong>
                   </span>
                       @endif
              <input type="text" class="form-control" id="name" name="sekolah" value="{{ old('sekolah') }}">
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

            <div class="form-group">
              <label for="password">Password Confirm</label><br>
              @if ($errors->has('password_confirmation'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('password_confirmation') }}</strong>
                   </span>
                       @endif
              <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>

            <input type="submit" name="submit" value="SignUp" class="btn btn-default" id="tombol">
          </form>

        </div>
      </div>
    </div>
@endsection
