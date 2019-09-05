@extends('layout/main')

@section('title', 'Data Penjualan')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Penjualan</h3>
                            <div class="right">
                                <a href="/penjualan/create" class="btn btn-primary btn-sm"> Tambah</a>  
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
                                        <th>PLAT</th>
                                        <th>JUMLAH</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($penjualan as $pj)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d M Y', strtotime($pj->tanggal))}}</td>
                                            <td>{{$pj->nama_shift}}</td>
                                            <td>{{$pj->nama_layanan}}</td>
                                            <td>{{$pj->plat_nomor}}</td>
                                            <td>{{$pj->jumlah}}</td>
                                            <td>
                                               <a href="#" class="btn btn-danger btn-sm delete" id="{{$pj->id_penjualan}}">Delete</a>
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
           var penjualan_id = $(this).attr('id');
           csrf_token = $('meta[name="csrf-token"]').attr('content');
           swal({
              title: "Yakin ?",
              text: "Ingin menghapus data penjualan ini dengan id "+penjualan_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "/penjualan/"+penjualan_id,
                        type : "POST",
                        data : {
                            '_method' : 'DELETE',
                            '_token' : csrf_token,
                        },
                        success: function(response){
                            toastr.error(
                                'Data Penjualan Berhasil Dihapus!',
                                'Terhapus',
                                {
                                    timeOut: 1500,
                                    fadeOut: 1500,
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
