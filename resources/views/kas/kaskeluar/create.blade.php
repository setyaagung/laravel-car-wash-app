@extends('layout.main')

@section('title', 'Tambah Kas Keluar')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Tambah Kas Keluar</h3>
						</div>
						<div class="panel-body">
                            <form action="{{route('kas_keluar.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group @error('tanggal') has-error @enderror">
                                <label><b>Tanggal</b></label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
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
                                    @error('user_id'))
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
                                    @error('shift_id'))
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                                <div class="form-group @error('tagihan_id') has-error @enderror">
                                    <label><b>Tagihan</b></label>
                                    <select class="form-control" name="tagihan_id" id="tagihan_id">
                                        <option value="">-- Pilih Tagihan --</option>
                                        @foreach($tagihan as $t)
                                            <option value="{{$t->id_tagihan}}">{{$t->kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('tagihan_id'))
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

                                <div class="form-group @error('ket') has-error @enderror">
                                    <label><b>Keterangan</b></label>
                                    <textarea class="form-control" name="ket" id="ket" rows="3">{{old('ket')}}</textarea>
                                    @error('ket')
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

                <div class="col-md-6">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Tagihan</h3>
						</div>
						<div class="panel-body">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>KATEGORI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tagihan as $item)
                                <tr>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->keterangan}}</td>
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