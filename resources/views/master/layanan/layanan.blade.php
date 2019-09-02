@extends('layout/main')

@section('title', 'Data Layanan')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Layanan</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahLayanan"><i class="lnr lnr-plus-circle"></i> Tambah Layanan</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>KATEGORI</th>
                                        <th>NAMA</th>
                                        <th>HARGA</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_layanan as $layanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$layanan->kategori}}</td>
                                        <td>{{$layanan->nama_layanan}}</td>
                                        <td>Rp. {{number_format($layanan->harga,0, ',' , '.')}}</td>
                                        <td>
                                            <a href="layanan/{{$layanan->id_layanan}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" id="{{ $layanan->id_layanan }}">Delete</a>
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
<div class="modal fade" id="TambahLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Layanan</h5>
            </div>
            <div class="modal-body">
                <form action="/layanan/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('kategori') has-error @enderror">
                        <label><b>Kategori</b></label>
                        <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="{{old('kategori')}}">
                        @error('kategori')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('nama_layanan') has-error @enderror">
                        <label><b>Nama Layanan</b></label>
                        <input type="text" class="form-control" name="nama_layanan" placeholder="Nama Layanan" value="{{old('nama_layanan')}}">
                        @error('nama_layanan')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('harga') has-error @enderror">
                        <label><b>Harga</b></label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{old('harga')}}">
                        @error('harga')
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
           var layanan_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin menghapus data layanan ini dengan id "+layanan_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    console.log(willDelete);
                    window.location = "/layanan/"+layanan_id+"/delete";
                }
            });
        });
    </script>
@endsection
