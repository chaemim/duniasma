@extends('master')

@section('title')
  Tulis Artikel
@endsection

<style media="screen">
  #artikel{
    margin-top: 100px;
  }
</style>

@section('content')
    <div class="container-fluid" id="artikel">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">

        <h2 class="text-center">Edit Artikel</h2>


          <form action="{{asset('/user/artikel/'.$artikel->id.'/save')}}" method="post" enctype="multipart/form-data">
             <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}

            <div class="form-group">
              <label for="title">Judul</label><br>
              @if ($errors->has('title'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('title') }}</strong>
                   </span>
                       @endif
                <input type="text" name="title" value="{{$artikel->title}}" class="form-control">
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label><br>
              @if ($errors->has('deskripsi'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('deskripsi') }}</strong>
                   </span>
                       @endif
                <textarea name="deskripsi" rows="8" cols="80">{{$artikel->deskripsi}}</textarea>
            </div>

            <div class="form-group">
              <label for="title">Upload Gambar</label><br>
              @if ($errors->has('featured_img'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('featured_img') }}</strong>
                   </span>
                       @endif
                      <p><small>Upload gambar untuk mengganti gambar yang sudah ada</small></p>
                <input type="file" name="featured_img" value="{{old('featured_img')}}" class="form-control">
            </div>

            <div class="form-group">
              <label for="id_kategori">Kategori</label><br>
              @if ($errors->has('id_kategori'))
                   <span class="help-block">
                       <strong id="formerror">{{ $errors->first('id_kategori') }}</strong>
                   </span>
                       @endif
                <select class="form-control" name="id_kategori">
                  @foreach ($kategori as $a)
                    <option @if ($a->id == $artikel->id_kategori) selected @endif value="{{$a->id}}">{{$a->kategori}}</option>
                  @endforeach
                </select>
            </div>

            <input type="hidden" class="form-control" name="id_admin" placeholder="ID User Admin" value="{{Auth::user()->id}}" readonly>

            <input type="submit" name="submit" value="Post Artikel" class="btn btn-default" id="tombol">
          </form>

        </div>
      </div>
    </div>

    <script type="text/javascript">
      tinymce.init({
      selector : "textarea",
       plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
       toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
       image_advtab: true ,
      });
    </script>
@endsection
