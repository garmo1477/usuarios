@extends('layouts.app')
@section('cabecera')
@endsection
@section('content')
	<div class="container">
		<h1 class="text-primary text-center py-4">Página principal del administrador</h1>
			@if($users)
				<table width="700" class="table table-responsive table-striped table-hover">
					<tr>
						<th>Id</th>
						<th>Foto de Perfil</th>
						<th>Nombre</th>
						<th>Id Role</th>
						<th>Email</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th>Ir a</th>

					</tr>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							@if($user->foto)
								<td>
									<img src="/images/{{ $user->foto->ruta_foto }} " width="160" alt="">
								</td>
							@else
								<td><img src="/images/fotoBase.svg" alt="base" width="180"></td>
							@endif
							<td>{{ $user->name }}</td>
							<td>{{ $user->role_id }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->updated_at }}</td>
							<td>
								<a class="btn btn-primary mt-4 ml-4" href=" {{ route('usuarios.edit', $user->id) }}">Editar</a>
								<form action="{{ route('usuarios.destroy', $user->id) }}" enctype="multipart/form-data" method="POST" class="px-4 py-4">
									@csrf
									@method('DELETE')
									<input class="btn btn-danger" type="submit" value="Eliminar" />
								</form>
							</td>
						</tr>
					@endforeach
				</table>
			@endif
			<a href="{{ route('usuarios.create') }}" class="btn btn-success">Crear nuevo usuario</a>
	</div>
@endsection

@section('pie')
@endsection