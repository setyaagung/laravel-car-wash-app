@extends('layout.main')

@section('title', 'Edit Data Karyawan')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Karyawan</h3>
						</div>
						<div class="panel-body">
                            <form action="/karyawan/{{$karyawan->id_karyawan}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @error('nama') has-error @enderror">
                                    <label><b>Nama Karyawan</b></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" value="{{$karyawan->nama}}">
                                    @error('nama')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('jenis_kelamin') has-error @enderror">
                                    <label><b>Gender</b></label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="">-- Jenis Kelamin --</option>
                                        <option value="Laki-Laki" @if($karyawan->jenis_kelamin == "Laki-Laki")selected @endif>Laki - Laki</option>
                                        <option value="Perempuan" @if($karyawan->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('job') has-error @enderror">
                                    <label><b>Job</b></label>
                                    <select class="form-control" name="job">
                                        <option value="">-- Job --</option>
                                        <option value="Kasir" @if($karyawan->job == "Kasir")selected @endif>Kasir</option>
                                        <option value="Pencuci" @if($karyawan->job == "Pencuci") selected @endif>Pencuci</option>
                                    </select>
                                    @error('job')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><b>Alamat</b></label>
                                    <textarea class="form-control" name="alamat" rows="3">{{$karyawan->alamat}}</textarea>
                                </div>
                                <div class="form-group @error('no_hp') has-error @enderror">
                                    <label><b>No HP</b></label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="No HP" value="{{$karyawan->no_hp}}">
                                    @error('no_hp')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('no_hp') has-error @enderror">
                                    <label><b>Gaji</b></label>
                                    <input type="number" class="form-control" name="gaji" placeholder="Gaji" value="{{$karyawan->gaji}}">
                                    @error('gaji')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('avatar') has-error @enderror">
                                    <label><b>Avatar</b></label>
                                    <input type="file" class="form-control" name="avatar">
                                    @error('avatar')
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