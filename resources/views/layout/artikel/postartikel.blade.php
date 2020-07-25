@extends('master')



@section('title')
  {{$artikel->title}}
@endsection

<style media="screen">
.img-thumbnail{
  max-width: 600px;
  max-height: 400px;
}
</style>

  @section('content')
    <section class="bg-light" id="atas">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">


    <h2 class="text-center">{{$artikel->title}}</h2>
    <p class="text-center">Post By : {{$artikel->user->name}}</p>

    <div class="text-center">
      <img src="{{asset('img/artikel/'.$artikel->featured_img)}}" alt="" class="text img-thumbnail">
    </div>

    <br><br>
    {!!$artikel->deskripsi!!}
    <br><br>
    @if ($artikel->isOwner())
      <div class="offset-10">

      <a href="{{asset('/user/artikel/'. $artikel->id.'/edit')}}" class="btn btn-sm btn-default">Edit</a>
      <a href="{{action('ArtikelController@destroyuser' ,[$artikel->id])}}" class="btn btn-sm btn-danger">Hapus</a>
            </div>
    @endif
    <hr>
    <div class="col-md-8">


      @foreach ($artikel->comment as $comment)
        {{ $comment->comment }} <br>
        <p>Ditulis Oleh : <a href="/profil/{{$comment->user->id}}">{{$comment->user->name}}</a></p>

        @if ($comment->isOwner())
          <a href="{{asset('artikel-comment/'.$comment->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
          <a  href="{{action('CommentController@destroy' ,[$comment->id])}}" class="btn btn-sm btn-danger">Delete</a>
        @endif
        <hr>
      @endforeach


    <form action="{{asset('artikel-comment/'.$artikel->id)}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="comment">Komentar</label><br>
        @if ($errors->has('comment'))
             <span class="help-block">
                 <strong id="formerror">{{ $errors->first('comment') }}</strong>
             </span>
                 @endif
        <textarea type="text" class="form-control" id="email" name="comment"></textarea>
      </div>

      <input type="submit" name="submit" value="Komentar" class="btn btn-default" id="tombol">
    </form>
      </div>


      </div>
    </div>
  </div>
</section>

  @endsection
