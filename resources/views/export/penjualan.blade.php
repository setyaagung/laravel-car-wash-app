<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kas Masuk</title>
</head>
<style>
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
		
		<p style="margin-bottom: none;font-size: 16;">LAPORAN PENJUALAN<br/><b>CAR WASH TJ88 CABANG 1</b><br>SOEKARNO-HATTA
		</p>
	</div>
	<hr style="margin-top: 7px;color: black;margin-bottom: none;size: 2px;" />
	<p style="text-align: center; margin-top: none;font-size: 12;">Jalan Soekarno-Hatta 49-50 Semarang, Telp. (024) 6746473</p>
    <table class="table" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>TANGGAL</th>
                <th>SHIFT</th>
                <th>LAYANAN</th>
                <th>PLAT NOMOR</th>
                <th>HARGA</th>
                <th>JUMLAH</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{date('d M Y', strtotime($p->tanggal))}}</td>
                <td>{{$p->nama_shift}}</td>
                <td>{{$p->nama_layanan}}</td>
                <td>{{$p->plat_nomor}}</td>
                <td>Rp. {{number_format($p->harga,0, ',' , '.')}}</td>
                <td>{{$p->jumlah}}</td>
                <td>Rp. {{ number_format(($p->harga * $p->jumlah),0, ',' , '.')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>