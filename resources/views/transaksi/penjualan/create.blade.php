@extends('layout.main')

@section('title', 'Tambah Transaksi Penjualan')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-body">
                            <form action="{{route('penjualan.store')}}" method="POST">
                            {{ csrf_field() }}

                                <div class="form-group @error('tanggal') has-error @enderror">
                                    <label><b>Tanggal</b></label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <div class="form-group @error('layanan_id') has-error @enderror">
                                    <label><b>Layanan</b></label>
                                    <select class="form-control" name="layanan_id" id="layanan_id">
                                        <option value="">-- Pilih Layanan --</option>
                                        @foreach($layanan as $l)
                                            <option value="{{$l->id_layanan}}">{{$l->nama_layanan}}</option>
                                        @endforeach
                                    </select>
                                    @error('layanan_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

    
                                <div class="form-group @error('jumlah') has-error @enderror">
                                    <label><b>Jumlah</b></label>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                
						</div>
					</div>
					<!-- END INPUTS -->
                </div>

                <div class="col-md-6">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-body">
                            <div class="form-group @error('user_id') has-error @enderror">
                                <label><b>User</b></label>
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach($user as $u)
                                        <option value="{{$u->id_user}}">{{$u->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group @error('shift_id') has-error @enderror">
                                <label><b>Shift</b></label>
                                <select class="form-control" name="shift_id" id="shift_id">
                                    @foreach($shift as $s)
                                        <option value="{{$s->id_shift}}">{{$s->nama_shift}}</option>
                                    @endforeach
                                </select>
                                @error('shift_id')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><b>Plat Nomor</b></label>
                                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor" value="{{ old('plat_nomor') }}">
                            </div>

                            <div style="float: right;">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('penjualan.save')}}" class="btn btn-success">Selesai</a>
                            </div>
                        </form>	
                        </div>
                    </div>
					<!-- END INPUTS -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detail Penjualan</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>HARGA</th>
                                        <th>JUMLAH</th>
                                        <th>SUBTOTAL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                @foreach ($penjualan as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama_layanan}}</td>
                                        <td>Rp. {{number_format($item->harga,0,',','.')}}</td>
                                        <td>{{$item->jumlah}}</td>
                                        <td>Rp. {{number_format($item->harga * $item->jumlah,0,',','.')}}</td>
                                        {!! Form::open(['route' =>['penjualan.destroy', $item->id_penjualan], 'method' => 'DELETE']) !!}
                                            <td><button type="submit" class="btn btn-danger">Cancel</button></td>
                                        {!! Form::close() !!}
                                    </tr>
                                    <?php $total = $total+($item->harga * $item->jumlah); ?>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>TOTAL</b></td>
                                        <td><b><i>Rp. {{number_format($total,0, ',' , '.')}}</i></b></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
