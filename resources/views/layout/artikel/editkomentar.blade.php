@extends('master')

@section('title')
  Halaman Komentar
@endsection

@section('content')
    <div class="container-fluid" id="atas">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">

        <h2 class="text-center">Edit Komentar</h2>


          <form action="{{asset('artikel-comment/' . $comment->id . '/save')}}" method="post">
             <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Isi Komentar</label><br>
              @if ($errors->has('comment'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('comment') }}</strong>
                   </span>
                       @endif
              <textarea name="comment" class="form-control" rows="8" cols="80">{{$comment->comment}}</textarea>
            </div>


            <input type="submit" name="submit" value="Edit Komentar" class="btn btn-default" id="tombol">
          </form>

        </div>
      </div>
    </div>
@endsection
