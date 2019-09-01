@extends('layout/main')

@section('title', 'Data Kas Masuk')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Kas Masuk</h3>
                            <div class="right">
                                <a href="/kas_masuk/create" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Tambah Kas Masuk</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>SHIFT</th>
                                        <th>LAYANAN</th>
                                        <th>HARGA</th>
                                        <th>JUMLAH</th>
                                        <th>TOTAL</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($kasmasuk as $km)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d M Y', strtotime($km->tanggal))}}</td>
                                            <td>{{$km->nama_shift}}</td>
                                            <td>{{$km->nama}}</td>
                                            <td>Rp. {{number_format($km->harga,0, ',' , '.')}}</td>
                                            <td>{{$km->jumlah}}</td>
                                            <td>Rp. {{number_format($km->total,0, ',' , '.')}}</td>
                                            <td>
                                               <a href="#" class="btn btn-danger btn-sm delete" id="{{$km->id_km}}">Delete</a>
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
@endsection

@section('footer')
    <script>
        $('.delete').click(function() {
           var kasmasuk_id = $(this).attr('id');
           csrf_token = $('meta[name="csrf-token"]').attr('content');
           swal({
              title: "Yakin ?",
              text: "Ingin menghapus data kas masuk ini dengan id "+kasmasuk_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "/kas_masuk/"+kasmasuk_id,
                        type : "POST",
                        data : {
                            '_method' : 'DELETE',
                            '_token' : csrf_token,
                        },
                        success: function(response){
                            toastr.error(
                                'Data Kas Masuk Berhasil Dihapus!',
                                'Terhapus',
                                {
                                    timeOut: 3000,
                                    fadeOut: 3000,
                                    onHidden: function () {
                                        window.location.reload();
                                    }
                                }
                                );
                           
                        }
                    })
                }
            });
        });
    </script>
@endsection
