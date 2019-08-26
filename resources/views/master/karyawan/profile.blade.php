@extends('layout.main')

@section('title', 'Profil Karyawan')

@section('content')

<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{asset('template/assets/img/akun.png')}}" class="img-circle" alt="Avatar" width="40%">
										<h3 class="name">{{$karyawan->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$karyawan->tanggungan->count()}} <span>Tanggungan</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Biodata Karyawan</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama <span>{{$karyawan->nama}}</span></li>
											<li>Jenis Kelamin <span>{{$karyawan->jenis_kelamin}}</span></li>
											<li>Job <span>{{$karyawan->job}}</span></li>
                                            <li>Alamat <span>{{$karyawan->alamat}}</span></li>
											<li>No HP <span>{{number_format($karyawan->no_hp,0, ',' , '-')}}</a></span></li>
                                            <li>Gaji <span>Rp. {{number_format($karyawan->gaji,0, ',' , '.')}}</span></li>
                                        </ul>
									</div>
									<div class="text-center"><a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddTanggungan">Input Tanggungan</button>
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Tanggungan Karyawan</h3>
									</div>
									<div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>TANGGAL</th>
													<th>KETERANGAN</th>
													<th>JUMLAH</th>
													<th>STATUS</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody>
											@foreach ($karyawan->tanggungan as $tanggungan)
												<tr>
													<td>{{$tanggungan->created_at->format('d M Y')}}</td>
													<td>{{$tanggungan->pivot->keterangan}}</td>
													<td>Rp. {{number_format($tanggungan->pivot->jumlah,0, ',' , '.')}}</td>
													@if($tanggungan->pivot->status == 'Belum Lunas')
														<td><span class="badge bg-danger">Belum Lunas</span></td>
													@else
														<td><span class="badge bg-success">Lunas</span></td>
													@endif
													<td>
														<a href="#" class="btn btn-danger btn-sm delete" id="{{$tanggungan->id}}">Delete</a>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddAbsen">Input Absen</button>
								<div class="panel">
									<div class="panel-heading">
											<h3 class="panel-title">Absensi Karyawan</h3>
										</div>
										<div class="panel-body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>TANGGAL</th>
														<th>JENIS</th>
														<th>KETERANGAN</th>
														<th>AKSI</th>
													</tr>
												</thead>
												<tbody>
												
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->

			<!-- Modal Tambah -->
<div class="modal fade" id="AddTanggungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title">Tambah Tanggungan</h5>
        </div>
        <div class="modal-body">
            <form action="/karyawan/{{$karyawan->id}}/addtanggungan" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group @error('tanggungan') has-error @enderror">
                    <label><b>Tanggungan</b></label>
                    <select class="form-control" id="tanggungan" name="tanggungan">
                        @foreach ($tanggungankaryawan as $t)
							<option value="{{$t->id}}">{{$t->kategori}}</option>
						@endforeach
                     </select>
                    @error('tanggungan')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
				</div>

				<div class="form-group @error('keterangan') has-error @enderror">
						<label><b>Keterangan</b></label>
						<input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{old('keterangan')}}">
						@error('keterangan')
							<span class="help-block">{{ $message }}</span>
						@enderror
					</div>

				<div class="form-group @error('jumlah') has-error @enderror">
						<label><b>Jumlah</b></label>
						<input type="number" class="form-control" name="jumlah" placeholder="Jumlah" value="{{old('jumlah')}}">
						@error('jumlah')
							<span class="help-block">{{ $message }}</span>
						@enderror
					</div>
				
				<div class="form-group @error('status') has-error @enderror">
                    <label><b>Status</b></label>
                    <select class="form-control" name="status">
                        <option value="">-- Status --</option>
                        <option value="Lunas" {{(old('status') == 'Lunas') ? 'selected' : ''}}>Lunas</option>
                        <option value="Belum Lunas" {{(old('status') == 'Belum Lunas') ? 'selected' : ''}}>Belum Lunas</option>
                     </select>
                    @error('status')
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