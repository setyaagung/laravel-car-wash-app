<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gaji</title>
</head>
<style>
    .box {
		width: 100%;
		position: relative;
		min-height: 100px;
	}
	.box .left {
		width: 50%;
		min-height: 10px;
		float: left;
	}
	.box .right {
		width: 50%;
		min-height: 10px;
		float: right;
	}
	.box .leftDown {
		width: 25%;
		min-height: 10px;
		float: left;
	}
	.box .rightDown {
		width: 70%;
		min-height: 10px;
		float: right;
	}
	table.table {
		width: 100%;
		border-collapse: collapse;
	}
	table.table thead tr th,
	table.table tbody tr td {
		padding: 5px;
	}
</style>
<body>
    <div style="text-align: center;">
		
		<p style="margin-bottom: none;font-size: 16;">SLIP GAJI<br/><b>CAR WASH TJ88 CABANG 1</b><br>SOEKARNO-HATTA
		</p>
	</div>
	<hr style="margin-top: 7px;color: black;margin-bottom: none;size: 2px;" />
    <p style="text-align: center; margin-top: none;font-size: 12;">Jalan Soekarno-Hatta 49-50 Semarang, Telp. (024) 6746473</p>
    <div class="box">
        <div class="left">
            <table class="table">
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{\Carbon\Carbon::now()->format('d F Y')}}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $karyawan->nama}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $karyawan->job}}</td>
                </tr>
            </table>
        </div>
        <div class="right">
            <table class="table">
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $karyawan->alamat }}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>{{ $karyawan->no_hp }}</td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br><br><br>
    <hr style="color: black;margin-bottom: none;size: 2px;" />
    <br>
    <div class="box">
        <div class="right">
            <table class="table">
                <tr>
                    <td>Gaji Pokok</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($karyawan->gaji,0, ',' , '.')}}</td>
                </tr>
                <tr>
                    <td>Tanggungan</td>
                    <td>:</td>
                    <td>Rp. {{number_format($karyawan->tanggungan->sum('jumlah'),0, ',' , '.')}}</td>
                </tr>
                <tr>
                    <td>Denda Absensi</td>
                    <td>:</td>
                    <td>Rp. {{number_format($karyawan->absensi->sum('denda'),0, ',' , '.')}}</td>
                </tr>
            </table>
            <hr style="color: black;margin-bottom: none;size: 2px;" />
            <table class="table">
                <tr>
                    <td><b>TOTAL DITERIMA</b></td>
                    <td><b>:</b></td>
                    <td><b>Rp. {{number_format($karyawan->gaji - $karyawan->tanggungan->sum('jumlah') - $karyawan->absensi->sum('denda'),0, ',' , '.')}}</b></td>
                </tr>
            </table>
        </div>
    </div>
    <br>

    <div class="box" style="margin-top:240px">
        <div class="left">
            <table class="table" style="text-align:center">
                <tr>
                    <td>Penerima,</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $karyawan->nama}}</td>
                </tr>
            </table>
        </div>
    </div>
    
</body>
</html>