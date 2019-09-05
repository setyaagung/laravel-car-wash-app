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
		
		<p style="margin-bottom: none;font-size: 16;">LAPORAN KAS KELUAR<br/><b>CAR WASH TJ88 CABANG 1</b><br>SOEKARNO-HATTA
		</p>
	</div>
	<hr style="margin-top: 7px;color: black;margin-bottom: none;size: 2px;" />
	<p style="text-align: center; margin-top: none;font-size: 12;">Jalan Soekarno-Hatta 58 Semarang, Telp. (024) 6746473</p>
    <table class="table" border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>TANGGAL</th>
                <th>SHIFT</th>
                <th>TAGIHAN</th>
                <th>JUMLAH</th>
                <th>KETERANGAN</th>
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
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>TOTAL KAS KELUAR : </b></td>
                <td><b><i>Rp. {{number_format($totalkaskeluar,0, ',' , '.')}}</i></b></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>