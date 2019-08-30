@extends('layout/main')

@section('title', 'Data User')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data User</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahUser"><i class="lnr lnr-plus-circle"></i> Tambah User</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>ROLE</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_user as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="/user/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" id="{{$user->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="TambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data User</h5>
            </div>
            <div class="modal-body">
                <form action="/user/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('name') has-error @enderror">
                        <label><b>Nama</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Nama" value="{{old('name')}}">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('role') has-error @enderror">
                        <label><b>Role</b></label>
                        <select class="form-control" name="role">
                            <option value="">-- Role --</option>
                            <option value="admin" {{(old('role') == 'admin') ? 'selected' : ''}}>Admin</option>
                            <option value="kasir" {{(old('role') == 'kasir') ? 'selected' : ''}}>Kasir</option>
                         </select>
                        @error('role')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label><b>Email</b></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <label><b>Password</b></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
                        @error('password')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('.delete').click(function() {
           var user_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data user ini dengan id "+user_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/user/"+user_id+"/delete";
                }
            });
        });
    </script>
@endsection
