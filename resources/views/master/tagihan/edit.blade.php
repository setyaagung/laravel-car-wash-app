@extends('layout.main')

@section('title', 'Edit Data Tagihan')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Tagihan</h3>
						</div>
						<div class="panel-body">
                            <form action="/tagihan/{{$tagihan->id_tagihan}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group @error('kategori') has-error @enderror">
                                    <label><b>Kategori</b></label>
                                    <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="{{$tagihan->kategori}}">
                                    @error('kategori')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <div class="form-group @error('keterangan') has-error @enderror">
                                    <label><b>Keterangan</b></label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{$tagihan->keterangan}}</textarea>
                                    @error('keterangan')
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