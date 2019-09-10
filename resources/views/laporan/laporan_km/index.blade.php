@extends('layout.main')

@section('title', 'Laporan Kas Masuk')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Kas Masuk</h3>
						</div>
						<div class="panel-body">
                            <form action="{{url('cari-laporan-km')}}" method="GET">
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
                    @if (isset($kasmasuk))
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="right">
                                    <a href="{{url('pdf-km/'.$dari.'/'.$sampai.'/'.$shift_id)}}" class="btn btn-sm btn-danger">Print</a>
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
                                            <td>{{$km->jumlah}}</td>
                                            <td>Rp. {{number_format($km->total,0, ',' , '.')}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>TOTAL JUMLAH UNIT : </b></td>
                                            <td colspan="3"><b><i>{{$totaljumlah}}</i></b></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>TOTAL KAS MASUK : </b></td>
                                            <td colspan="3"><b><i>Rp. {{number_format($totalkasmasuk,0, ',' , '.')}}</i></b></td>
                                        </tr>
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