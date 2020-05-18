@extends('layouts.app')

@section('cabecera')
@endsection

@section('content')
	<div class="container">
		<h1>Página para editar</h1>
		<form action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data" method="POST" files="true" class="shadow px-4 py-4">
				@csrf
				@method('PATCH')
				<!--Para acortar lineas de codigo lo hacemos de manera ternaria-->
				<img src="/images/{{ $user->foto ? $user->foto->ruta_foto : 'fotoBase.svg'}}" width="180" alt="foto perfil">

				<div class="form-group mt-4">
					<label for="">Nombre:</label>
					<input class="form-control" name="name" type="text" value="{{ old('name', $user->name) }}" />
				</div>
				<div class="form-group">
					<label for="">Role de usuario</label>
					<input class="form-control" name="role_id" type="text" value="{{ old('role_id', $user->role_id) }}" />
				</div>
				<div class="form-group">
					<label for="">Email:</label>
					<input class="form-control" name="email" type="email" value="{{ old('email', $user->email) }}" />
				</div>

				<div class="form-group">
					<label for="foto_id">Cambiar foto: </label>
					<input type="file" name="foto_id" accept="image/*"  />
				</div>

				<input class="btn btn-primary" type="submit" value="Modificar datos" />
				<input class="btn btn-danger ml-4" type="reset" value="borrar campos" />

			</form>
			<a href="{{ route('usuarios.index') }}" class="btn btn-success mt-4">volver al listado</a>

</div>
@endsection
@section('pie')
@endsection