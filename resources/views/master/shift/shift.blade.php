@extends('layout/main')

@section('title', 'Data Shift')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Shift</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahShift"><i class="lnr lnr-plus-circle"></i> Tambah Shift</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
                                        <th>N0</th>
                                        <th>NAMA</th>
                                        <th>MULAI</th>
                                        <th>SELESAI</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_shift as $shift)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$shift->nama}}</td>
                                        <td>{{$shift->mulai}}</td>
                                        <td>{{$shift->selesai}}</td>
                                        <td>
                                            <a href="/shift/{{$user->id}}/shift" class="btn btn-warning btn-sm">Edit</a>
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
<div class="modal fade" id="TambahShift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Shift</h5>
            </div>
            <div class="modal-body">
                <form action="/shift/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('nama') has-error @enderror">
                        <label><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
                        @error('nama')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('mulai') has-error @enderror">
                        <label><b>Mulai</b></label>
                        <input type="time" class="form-control" name="mulai" placeholder="" value="{{old('mulai')}}">
                        @error('mulai')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('selesai') has-error @enderror">
                        <label><b>Selesai</b></label>
                        <input type="time" class="form-control" name="selesai" placeholder="" value="{{old('selesai')}}">
                        @error('selesai')
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
           var shift_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data shift ini dengan id "+shift_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/shift/"+shift_id+"/delete";
                }
            });
        });
    </script>
@endsection
