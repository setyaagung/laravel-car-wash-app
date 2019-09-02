@extends('layout/main')

@section('title', 'Data Kas Keluar')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
						<div class="panel-heading">
						    <h3 class="panel-title">Data Kas Keluar</h3>
                            <div class="right">
                                <a href="/kas_keluar/create" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Tambah Kas Keluar</a>  
                            </div>
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="myTable">
								<thead>
									<tr>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>SHIFT</th>
                                        <th>TAGIHAN</th>
                                        <th>JUMLAH</th>
                                        <th>KETERANGAN</th>
                                        <th>AKSI</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($kaskeluar as $kk)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d M Y', strtotime($kk->tanggal))}}</td>
                                            <td>{{$kk->nama_shift}}</td>
                                            <td>{{$kk->kategori}}</td>
                                            <td>Rp. {{number_format($kk->jumlah,0, ',' , '.')}}</td>
                                            <td>{{$kk->ket}}</td>
                                            <td>
                                               <a href="#" class="btn btn-danger btn-sm delete" id="{{$kk->id_kk}}">Delete</a>
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
           var kaskeluar_id = $(this).attr('id');
           csrf_token = $('meta[name="csrf-token"]').attr('content');
           swal({
              title: "Yakin ?",
              text: "Ingin menghapus data kas keluar ini dengan id "+kaskeluar_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "/kas_keluar/"+kaskeluar_id,
                        type : "POST",
                        data : {
                            '_method' : 'DELETE',
                            '_token' : csrf_token,
                        },
                        success: function(response){
                            toastr.error(
                                'Data Kas Keluar Berhasil Dihapus!',
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
