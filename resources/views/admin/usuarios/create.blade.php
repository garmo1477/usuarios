@extends('layouts.app')

@section('cabecera')
@endsection

@section('content')
	<div class="container">

		<!--Se usa enctype para que se suban los archivos/fotos del input file a la base de datos y carpeta images-->
		<form action="{{ route('usuarios.store') }}" enctype="multipart/form-data" method="POST" files="true" class="shadow px-4 py-4">
			@csrf
			<h2>Formulario de Alta de Usuarios</h2>
			<div class="form-group">
				<label for="">Nombre:</label>
				<input class="form-control" name="name" type="text" required />
			</div>
			<div class="form-group">
				<label for="">Role de usuario</label>
				<input class="form-control" name="role_id" type="text" required />
			</div>
			<div class="form-group">
				<label for="">Email:</label>
				<input class="form-control" name="email" type="email" required />
			</div>
			<div class="form-group">
				<label for="">Repetir email:</label>
				<input class="form-control" name="email_verified_at" type="email" required />
			</div>
			<div class="form-group">
				<label for="">Contraseña:</label>
				<input class="form-control" name="password" type="password" required />
			</div>

			<div class="form-group">
				<label for="foto_id">Foto de perfil: </label>
				<input type="file" name="foto_id" accept="image/*"  />
			</div>

			<input class="btn btn-success" type="submit" value="Crear usuario" />
			<input class="btn btn-danger" type="reset" value="borrar campos" />
		</form>
	</div>



@endsection