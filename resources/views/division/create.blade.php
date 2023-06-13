@extends('layouts.template')
@section('content')
<section class="container mt-4">
<h1>Create Division</h1>
	@if(session('failed'))
		<div class="alert alert-danger">{{ session('failed') }}</div>
	@endif
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<form action="{{ route('division.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="name_division">Name Division</label>
				<input type="text" id="name_division" name="name_division" class="form-control" placeholder="e.g John Doe" maxlength="20" value="">
				@error('name_division')
		        	<small class="text-danger">
		        		{{ $message }}
		        	</small>
		        @enderror
			</div>
			<div class="form-group mt-4">
				<label for="gaji_pokok">Total gaji</label>
				<input type="integer" name="gaji_pokok" placeholder="e.g 4000000 - 10000000" class="form-control">
				@error('gaji_pokok')
		        	<small class="text-danger">
		        		{{ $message }}
		        	</small>
		        @enderror
			</div>
            <div class="mt-4">
			<button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/division" class="btn btn-danger">Back</a>
            </div>
	 	</form>
	</div>
</section>
@endsection