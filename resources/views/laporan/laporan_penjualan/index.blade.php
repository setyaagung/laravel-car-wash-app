@extends('layout.main')

@section('title', 'Laporan Penjualan')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Penjualan</h3>
						</div>
						<div class="panel-body">
                            <form action="{{url('cari-laporan-penjualan')}}" method="GET">
                            {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-md-12 @error('dari') has-error @enderror">
                                        <label><b>Dari</b></label>
                                        <input type="date" class="form-control" name="dari" id="dari" value="{{old('dari')}}">
                                        @error('dari')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group col-md-3 col-md-12 @error('dari') has-error @enderror">
                                        <label><b>Sampai</b></label>
                                        <input type="date" class="form-control" name="sampai" id="sampai" value="{{old('sampai')}}">
                                        @error('dari')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2 @error('shift_id') has-error @enderror">
                                        <label><b>Shift</b></label>
                                        <select class="form-control" name="shift_id" id="shift_id">
                                            <option value="null">All</option>
                                            @foreach($shift as $s)
                                                <option value="{{$s->id_shift}}">{{$s->nama_shift}}</option>
                                            @endforeach
                                        </select>
                                        @error('shift_id')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" style="margin-top : 19%;">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
					</div>
                    <!-- END INPUTS -->
                    @if (isset($penjualan))
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                    <a href="{{url('pdf-penjualan/'.$dari.'/'.$sampai.'/'.$shift_id)}}" class="btn btn-sm btn-danger">Print</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
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
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection