@extends('layout.main')

@section('title', 'Tambah Kas Masuk')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Tambah Kas Masuk</h3>
						</div>
						<div class="panel-body">
                            <form action="{{route('kas_masuk.store')}}" method="POST">
                            {{ csrf_field() }}
                                <div class="form-group @error('tanggal') has-error @enderror">
                                    <label><b>Tanggal</b></label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

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

                                <div class="form-group @error('harga') has-error @enderror">
                                    <label><b>Harga</b></label>
                                    <input type="number" step="any" min="0" class="form-control" name="harga" id="harga" placeholder="Harga" value="{{ old('harga') }}">
                                    @error('harga')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group @error('jumlah') has-error @enderror">
                                    <label><b>Jumlah</b></label>
                                    <input type="number" step="any" min="0" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group @error('total') has-error @enderror">
                                    <label><b>Total</b></label>
                                    <input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly value="{{ old('total') }}">
                                    @error('total')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div style="float: right;">
                                    <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>	
						</div>
					</div>
					<!-- END INPUTS -->
                </div>

                <div class="col-md-7">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Layanan</h3>
						</div>
						<div class="panel-body">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>KATEGORI</th>
                                        <th>NAMA</th>
                                        <th>HARGA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($layanan as $item)
                                <tr>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->nama_layanan}}</td>
                                    <td>Rp. {{number_format($item->harga,0, ',' , '.')}}</td>
                                </tr>
                                @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
					<!-- END INPUTS -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $("#jumlah").keyup(function(){
            total = $("#jumlah").val()* $("#harga").val();
        $("#total").val(total);
        });

       $("#harga").keyup(function(){
            total = $("#jumlah").val()* $("#harga").val();
        $("#total").val(total);
        });

    </script>
@endsection