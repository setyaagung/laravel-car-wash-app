<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li><a href="/dashboard"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
				@if (auth()->user()->role == 'admin')
				<li>
					<a href="#subMaster" data-toggle="collapse" class="collapsed"><i class="lnr lnr-screen"></i> <span>Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subMaster" class="collapse ">
							<ul class="nav">
								<li><a href="/layanan" class="">Layanan</a></li>
								<li><a href="/karyawan" class="">Karyawan</a></li>
								<li><a href="/supplier" class="">Supplier</a></li>
								<li><a href="/shift" class="">Shift</a></li>
								<li><a href="/tagihan" class="">Tagihan</a></li>
							</ul>
						</div>
				</li>
				@endif
				@if (auth()->user()->role == 'kasir')
				<li>
					<a href="#subTransaksi" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cart"></i> <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subTransaksi" class="collapse ">
							<ul class="nav">
								<li><a href="/penjualan" class="">Penjualan</a></li>
							</ul>
						</div>
				</li>
				<li>
					<a href="#subKas" data-toggle="collapse" class="collapsed"><i class="lnr lnr-briefcase"></i> <span>Kas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subKas" class="collapse ">
							<ul class="nav">
								<li><a href="/kas_masuk" class="">Kas Masuk</a></li>
								<li><a href="/kas_keluar" class="">Kas Keluar</a></li>
							</ul>
						</div>
				</li>
				@endif
				@if (auth()->user()->role == 'admin')
				<li>
					<a href="#subLaporan" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subLaporan" class="collapse ">
							<ul class="nav">
								<li><a href="/laporan_kas_masuk" class="">Kas Masuk</a></li>
								<li><a href="/laporan_kas_keluar" class="">Kas Keluar</a></li>
							</ul>
						</div>
				</li>
				<li><a href="/user"><i class="lnr lnr-user"></i> <span>Users</span></a></li>
				@endif
			</ul>
		</nav>
	</div>
</div>