@extends('layout.main')

@section('title', 'Edit Data Layanan')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Layanan</h3>
						</div>
						<div class="panel-body">
                            <form action="/layanan/{{$layanan->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group @error('kategori') has-error @enderror">
                                    <label><b>Kategori</b></label>
                                    <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="{{$layanan->kategori}}">
                                    @error('kategori')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('nama') has-error @enderror">
                                    <label><b>Nama Layanan</b></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Layanan" value="{{$layanan->nama}}">
                                    @error('nama')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group @error('harga') has-error @enderror">
                                    <label><b>Harga</b></label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" value="{{$layanan->harga}}">
                                    @error('harga')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div style="float: right;">
                                    <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>	
						</div>
					</div>
					<!-- END INPUTS -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection