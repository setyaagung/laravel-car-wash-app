@extends('layout.main')

@section('title', 'Edit Data Shift')

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
                            <form action="/shift/{{$shift->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group @error('nama_shift') has-error @enderror">
                                    <label><b>Nama Shift</b></label>
                                    <input type="text" class="form-control" name="nama_shift" placeholder="Nama" value="{{$shift->nama_shift}}">
                                    @error('nama_shift')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group @error('mulai') has-error @enderror">
                                    <label><b>Mulai</b></label>
                                    <input type="time" class="form-control" name="mulai" placeholder="" value="{{$shift->mulai}}">
                                    @error('mulai')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <div class="form-group @error('selesai') has-error @enderror">
                                    <label><b>Selesai</b></label>
                                    <input type="time" class="form-control" name="selesai" placeholder="" value="{{$shift->selesai}}">
                                    @error('selesai')
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