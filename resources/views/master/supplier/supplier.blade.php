@extends('layout/main')

@section('title', 'Data Supplier')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Supplier</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahSupplier"><i class="lnr lnr-plus-circle"></i> Tambah Supplier</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>NO HP</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_supplier as $supplier)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$supplier->nama}}</td>
                                        <td>{{$supplier->no_hp}}</td>
                                        <td>{{$supplier->alamat}}</td>
                                        <td>
                                            <a href="/supplier/{{$supplier->id_supplier}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" id="{{$supplier->id_supplier}}">Delete</a>
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
<div class="modal fade" id="TambahSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Supplier</h5>
            </div>
            <div class="modal-body">
                <form action="/supplier/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('nama') has-error @enderror">
                        <label><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{old('nama')}}">
                        @error('nama')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('no_hp') has-error @enderror">
                        <label><b>No HP</b></label>
                        <input type="number" class="form-control" name="no_hp" placeholder="ex : 628xxxxx" value="{{old('no_hp')}}">
                        @error('no_hp')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('alamat') has-error @enderror">
                        <label><b>Alamat</b></label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                        @error('alamat')
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
           var supplier_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data supplier ini dengan id "+supplier_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/supplier/"+supplier_id+"/delete";
                }
            });
        });
    </script>
@endsection
