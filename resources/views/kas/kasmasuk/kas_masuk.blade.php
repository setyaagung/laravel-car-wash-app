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
                                    @foreach ($kas_masuk as $index)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d M Y', strtotime($index->tanggal))}}</td>
                                            <td>{{$index->nama_shift}}</td>
                                            <td>{{$index->nama}}</td>
                                            <td>Rp. {{number_format($index->harga,0, ',' , '.')}}</td>
                                            <td>{{$index->jumlah}}</td>
                                            <td>Rp. {{number_format($index->total,0, ',' , '.')}}</td>
                                            <td>#</td>
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
           var layanan_id = $(this).attr('id');
           swal({
              title: "Yakin ?",
              text: "Ingin meenghapus data layanan ini dengan id "+layanan_id+" ??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/layanan/"+layanan_id+"/delete";
                }
            });
        });
    </script>
@endsection
