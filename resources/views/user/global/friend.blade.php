@extends('user.app')

@section('content')

	<div class="profile friend" style="background-image: url('{{ $user->cover }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<figure class="profile-pict text-center">
						<img class="img-circle" src="{{ $user->picture_md }}">
					</figure>				
					<h1 class="profile-name text-center">{{ $user->fullname }}</h1>
					<p class="text-center">{{ $user->bio }}</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">			
				<div class="panel panel-default">
					<ul class="list-group">
						<li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $user->fullname }}</li>
						<li class="list-group-item"><strong>NISN:</strong> {{ $user->nisn }}</li>
						<li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $user->tempatlahir }}</li>
						<li class="list-group-item"><strong>Tgl Lahir:</strong> {{ formatDate($user->tanggallahir) }}</li>
						<li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
						<li class="list-group-item"><strong>Telp:</strong> {{ $user->telp }}</li>
						<li class="list-group-item"><strong>Alamat:</strong> {{ $user->alamat }}</li>
						<li class="list-group-item"><strong>Agama:</strong> {{ $user->agama }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection