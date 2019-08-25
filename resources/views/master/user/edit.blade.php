@extends('layout.main')

@section('title', 'Edit Data User')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data User</h3>
						</div>
						<div class="panel-body">
                            <form action="/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group @error('name') has-error @enderror">
                                    <label><b>Nama</b></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$user->name}}">
                                    @error('name')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group @error('role') has-error @enderror">
                                    <label><b>Role</b></label>
                                    <select class="form-control" name="role">
                                        <option value="">-- Role --</option>
                                        <option value="admin" @if($user->role == "admin")selected @endif>Admin</option>
                                        <option value="kasir" @if($user->role == "kasir") selected @endif>Kasir</option>
                                    </select>
                                    @error('role')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('email') has-error @enderror">
                                    <label><b>Email</b></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                    @error('email')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div style="float: right;">
                                    <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>	
						</div>
					</div>
					<!-- END INPUTS -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection