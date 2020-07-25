@extends('layout/admin/admin')

@section('title')
  Edit Artikel
@endsection

@section('header')
  Edit Artikel
@endsection

@section('breadcrumb')
  artikel
@endsection



@section('content')

  <section class="forms">
    <div class="container-fluid">
      <div class="row">

        <!-- Form Elements -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Edit Artikel</h3>
            </div>
            <div class="card-body">

              <form class="form-horizontal" action="{{asset('/admin/artikel/'.$artikel->id.'/save')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_method" value="PUT">
                   {{ csrf_field() }}

                  @if ($errors->has('title'))
                   <div class="form-group row has-danger">
                    <label class="col-sm-3 form-control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="{{$errors->first('title')}}">
                    </div>
                  @else
                    <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="title" value="{{$artikel->title}}">
                    </div>
                  @endif

                </div>
                <div class="line"></div>

                @if ($errors->has('deskripsi'))
                  <div class="form-group row has-danger">
                    <label class="col-sm-3 form-control-label">Deksripsi</label>
                    <div class="col-sm-9">
                      <textarea name="deskripsi" class="form-control" rows="8" cols="80" placeholder="{{$errors->first('deskripsi')}}"></textarea>
                    </div>
                  </div>
                @else
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Deksripsi</label>
                    <div class="col-sm-9">
                      <textarea name="deskripsi" class="form-control" rows="8" cols="80">{{$artikel->deskripsi}}</textarea>
                    </div>
                  </div>
                @endif


                <div class="line"></div>

                @if ($errors->has('featured_img'))
                  <div class="col-sm-9 offset-3">
                    <p>{{$errors->first('featured_img')}}</p>
                  </div>

                @endif
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Featured Image</label>
                    <div class="col-sm-9">
                      <p>Upload gambar untuk mengganti gambar yang sudah ada</p>
                      <input type="file" placeholder="Key dari Youtube" class="form-control" name="featured_img">
                    </div>
                  </div>


                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Kategori</label>
                  <div class="col-sm-9 select">
                    <select name="id_kategori" class="form-control">
                      @foreach ($kategori as $a)
                        <option @if ($a->id == $artikel->id_kategori) selected @endif value="{{$a->id}}">{{$a->kategori}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                  <div class="line"></div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">ID Admin</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="id_admin" placeholder="ID User Admin" value="{{Auth::user()->id}}" readonly>
                    </div>
                  </div>


                <div class="line"></div>
                <div class="form-group row">
                  <div class="col-sm-4 offset-sm-3">
                    <a href="{{asset('/admin/artikel')}}"class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    tinymce.init({
    selector : "textarea",
     plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
     toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
     image_advtab: true ,
    });
  </script>
@endsection
