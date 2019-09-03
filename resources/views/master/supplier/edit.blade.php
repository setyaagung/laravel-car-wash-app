@extends('layout.main')

@section('title', 'Edit Data Supplier')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Data Shift</h3>
						</div>
						<div class="panel-body">
                            <form action="/supplier/{{$supplier->id_supplier}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group @error('nama') has-error @enderror">
                                    <label><b>Nama Supplier</b></label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$supplier->nama}}">
                                    @error('nama')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group @error('no_hp') has-error @enderror">
                                    <label><b>No HP</b></label>
                                    <input type="number" class="form-control" name="no_hp" placeholder="" value="{{$supplier->no_hp}}">
                                    @error('no_hp')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group @error('alamat') has-error @enderror">
                                    <label><b>Alamat</b></label>
                                    <textarea name="alamat" class="form-control" rows="3">{{$supplier->alamat}}</textarea>
                                    @error('alamat')
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