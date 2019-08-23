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
										<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name">Samuel Gold</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projects</span>
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
											<li>No HP <span>{{$karyawan->no_hp}}</a></span></li>
                                            <li>Gaji <span>{{$karyawan->gaji}}</span></li>
                                        </ul>
									</div>
									<div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNilai">Input Tanggungan</button>
								<div class="panel-heading">
									<h3 class="panel-title">Tanggungan Karyawan</h3>
								</div>
                                <div class="panel-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>TANGGUNGAN</th>
													<th>JUMLAH</th>
													<th>STATUS</th>
													<th>AKSI</th>
												</tr>
											</thead>
											
										</table>
									</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
@endsection