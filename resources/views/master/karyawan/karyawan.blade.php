@extends('layout.main')

@section('title', 'Data Karyawan')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Karyawan</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahKaryawan"><i class="lnr lnr-plus-circle"></i> Tambah Karyawan</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th>N0</th>
                                        <th>NAMA</th>
                                        <th>JOB</th>
                                        <th>NO HP</th>
                                        <th>GAJI</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_karyawan as $karyawan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$karyawan->nama}}</td>
                                        <td>{{$karyawan->job}}</td>
                                        <td>{{$karyawan->no_hp}}</td>
                                        <td>{{$karyawan->gaji}}</td>
                                        <td>
                                            <a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" id="{{$karyawan->id}}">Delete</a>
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
<div class="modal fade" id="TambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Karyawan</h5>
            </div>
            <div class="modal-body">
                <form action="/karyawan/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('nama') has-error @enderror">
                        <label><b>Nama Karyawan</b></label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" value="{{old('nama')}}">
                        @error('nama')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('jenis_kelamin') has-error @enderror">
                        <label><b>Gender</b></label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">-- Jenis Kelamin --</option>
                            <option value="Laki-Laki" {{(old('jenis_kelamin') == 'Laki-Laki') ? 'selected' : ''}}>Laki - Laki</option>
                            <option value="Perempuan" {{(old('jenis_kelamin') == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('job') has-error @enderror">
                        <label><b>Job</b></label>
                        <select class="form-control" name="job">
                            <option value="">-- Job --</option>
                            <option value="Kasir" {{(old('job') == 'Kasir') ? 'selected' : ''}}>Kasir</option>
                            <option value="Pencuci" {{(old('job') == 'Pencuci') ? 'selected' : ''}}>Pencuci</option>
                        </select>
                        @error('job')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label><b>Alamat</b></label>
                        <textarea class="form-control" name="alamat" rows="3">{{old('alamat')}}</textarea>
                    </div>
                    <div class="form-group @error('no_hp') has-error @enderror">
                        <label><b>No HP</b></label>
                        <input type="text" class="form-control" name="no_hp" placeholder="No HP" value="{{old('no_hp')}}">
                        @error('no_hp')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('no_hp') has-error @enderror">
                        <label><b>Gaji</b></label>
                        <input type="number" class="form-control" name="gaji" placeholder="Gaji" value="{{old('no_hp')}}">
                        @error('gaji')
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
           var karyawan_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data layanan ini dengan id "+karyawan_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/karyawan/"+karyawan_id+"/delete";
                }
            });
        });
    </script>
@endsection
