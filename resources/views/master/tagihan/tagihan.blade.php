@extends('layout/main')

@section('title', 'Data Tagihan')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Tagihan</h3>
                            <div class="right">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#TambahTagihan"><i class="lnr lnr-plus-circle"></i> Tambah Tagihan</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>KATEGORI</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($data_tagihan as $tagihan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$tagihan->kategori}}</td>
                                        <td>
                                            <a href="/tagihan/{{$tagihan->id_tagihan}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" id="{{$tagihan->id_tagihan}}">Delete</a>
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
<div class="modal fade" id="TambahTagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Tambah Data Tagihan</h5>
            </div>
            <div class="modal-body">
                <form action="/tagihan/create" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('kategori') has-error @enderror">
                        <label><b>Kategori</b></label>
                        <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="{{old('kategori')}}">
                        @error('kategori')
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
           var tagihan_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data tagihan ini dengan id "+tagihan_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/tagihan/"+tagihan_id+"/delete";
                }
            });
        });
    </script>
@endsection
