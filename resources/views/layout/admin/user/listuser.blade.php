@extends('layout/admin/admin')


@section('title')
  Halaman User
@endsection

@section('header')
  Halaman User
@endsection

@section('breadcrumb')
  User
@endsection

@section('content')
  <section class="tables">
    <div class="container-fluid">
      <div class="row">


        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">List User</h3>

            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tempat Asal</th>
                    <th>Role</th>
                    <th>Tanggal daftar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($user as $user)
                    <tr>
                      <th scope="row">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->tempatasal}}</td>
                      @if ($user->role==1)
                        <td>User</td>
                      @elseif ($user->role==2)
                        <td>Admin</td>
                      @endif
                      <td>{{$user->created_at}}</td>
                      <td>
                            <a href="{{action('UserController@destroy' ,[$user->id])}}">
                            <span class="label label-danger"><i class="fa fa-trash"> Delete </i></span>
                            </a>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="row">
                <div class="col-md-6">
                  {!! $chart->render() !!}
                </div>

                <div class="col-md-6">
                  {!! $chart1->render() !!}
                </div>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

@endsection
