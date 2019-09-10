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
		
		<p style="margin-bottom: none;font-size: 16;">LAPORAN KAS MASUK<br/><b>CAR WASH TJ88 CABANG 1</b><br>SOEKARNO-HATTA
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
                <th>HARGA</th>
                <th>UNIT</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasmasuk as $km)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{date('d M Y', strtotime($km->tanggal))}}</td>
                <td>{{$km->nama_shift}}</td>
                <td>{{$km->nama_layanan}}</td>
                <td>Rp. {{number_format($km->harga,0, ',' , '.')}}</td>
                <td style="text-align : center;">{{$km->jumlah}}</td>
                <td>Rp. {{number_format($km->total,0, ',' , '.')}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align:center"><b>TOTAL JUMLAH UNIT : </b></td>
                <td><b><i>{{$totaljumlah}}</i></b></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:center"><b>TOTAL KAS MASUK : </b></td>
                <td><b><i>Rp. {{number_format($totalkasmasuk,0, ',' , '.')}}</i></b></td>
            </tr>
        </tbody>
    </table>
</body>
</html>