@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Data Keuangan Car Wash TJ88</h3>
							<p class="panel-subtitle">Period: {{ \Carbon\Carbon::now()->format('d F Y')}}</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-dollar"></i></span>
										<p>
											<span class="number">Rp {{ number_format(\DB::table('kas_masuk')->sum('total'),0, ',' , '.')}}</span>
											<span class="title">Pemasukan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-credit-card"></i></span>
										<p>
											<span class="number">Rp {{ number_format(\DB::table('kas_keluar')->sum('jumlah'),0, ',' , '.')}}</span>
											<span class="title">Pengeluaran</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number">Rp {{ number_format(\DB::table('kas_masuk')->sum('total') - \DB::table('kas_keluar')->sum('jumlah'),0, ',' , '.')}}</span>
											<span class="title">Pendapatan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{ \DB::table('penjualan')->count()}}</span>
											<span class="title">Penjualan</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

@endsection