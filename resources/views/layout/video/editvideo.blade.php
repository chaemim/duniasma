@extends('layout/admin/admin')

@section('title')
  Edit Video
@endsection

@section('header')
  Edit Video
@endsection

@section('breadcrumb')
  video
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
              <h3 class="h4">Edit Video</h3>
            </div>
            <div class="card-body">

              <form class="form-horizontal" action="{{asset('/admin/video/'.$video->id.'/save')}}" method="post">
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
                      <input type="text" class="form-control" name="title" value="{{ $video->title }}">
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
                      <textarea name="deskripsi" class="form-control" rows="8" cols="80">{{ $video->deskripsi }}</textarea>
                    </div>
                  </div>
                @endif

                <div class="line"></div>

                @if ($errors->has('file_video'))
                  <div class="form-group row has-danger">
                    <label class="col-sm-3 form-control-label">File Video</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="{{$errors->first('file_video')}}" class="form-control" name="file_video" value="{{old('file_video')}}">
                    </div>
                  </div>
                @else
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">File Video</label>
                    <div class="col-sm-9">
                      <input type="text" placeholder="Key dari Youtube" class="form-control" name="file_video" value="{{$video->file_video}}">
                    </div>
                  </div>
                @endif

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Mapel</label>
                  <div class="col-sm-9 select">
                    <select name="id_mapel" class="form-control">
                      @foreach ($mapel as $a)
                        <option @if ($a->id == $video->id_mapel) selected @endif value="{{$a->id}}">{{$a->mapel}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Kelas</label>
                  <div class="col-sm-9 select">
                    <select name="id_kelas" class="form-control">
                      @foreach ($kelas as $a)
                        <option @if ($a->id == $video->id_kelas) selected @endif value="{{$a->id}}">{{$a->nama_kelas}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="line"></div>


                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">ID Admin</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="id_admin" placeholder="ID User Admin" value="{{$video->id_admin}}" readonly>
                    </div>
                  </div>


                <div class="line"></div>
                <div class="form-group row">
                  <div class="col-sm-4 offset-sm-3">
                    <a href="{{asset('/admin/video')}}"class="btn btn-secondary">Cancel</a>
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

@endsection
