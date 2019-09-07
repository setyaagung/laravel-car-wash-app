@extends('layout.main')

@section('title', 'Ganti Password')

@section('content')
    <!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Ganti Password</h3>
						</div>
						<div class="panel-body">
                            <form action="{{route('ganti-password.update')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group @error('old_password') has-error @enderror">
                                    <label><b>Password Lama</b></label>
                                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password Lama">
                                    @error('old_password')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group @error('password') has-error @enderror">
                                    <label><b>Password Baru</b></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">
                                    @error('password')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label><b>Konfirmasi Password</b></label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                                </div>

                                <div style="float :right">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </form>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

@endsection