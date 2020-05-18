<?php

namespace App\Http\Controllers;

use App\Foto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //para guardar los nuevos usuarios en la base de datos
        //User::create($request->all());

        //para guardar las fotos
        $entrada=$request->all();
        if ($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName ();
            $archivo->move('images', $nombre);

            //almacenar la foto en la base de datos
            $foto=Foto::create(['ruta_foto'=>$nombre]);

            //asignar un id a la foto
            $entrada['foto_id']=$foto->id;

        }
        $entrada['password']=bcrypt($request->password);
        User::create($entrada);
        return redirect('/admin/usuarios')->with('status','Usuario creado correctamente');;;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos en la base de datos el usuario con id que aparece en paramentro y cuando lo encuentra lo guardamos en una variable
        $user=User::findOrFail($id);
        //retornamos la vista con el id de usuario buscado anteriormente
        return view('admin.usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //buscamos el usuario a actualizar
        $user=User::findOrFail($id);

        //luego guardamos los nuevos datos introducidos
        $entrada=$request->all();
        if ($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName ();
            $archivo->move('images', $nombre);

            //almacenar la foto en la base de datos
            $foto=Foto::create(['ruta_foto'=>$nombre]);

            //asignar un id a la foto
            $entrada['foto_id']=$foto->id;
        }
        //actualizar el usuario buscado con la info guardada en entrada, que serán los nuevos datos
        $user->update($entrada);
        return redirect('/admin/usuarios')->with('status','Usuario actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id)->delete();

        //para los mensajes, llamamos a with con un mensaje personalizado, luego crear un archivo blade de sesion (estadoSesion) y en el comprobar si hay una sesion abierta y crear un div e incluir la variable status. Además, luego hay que llamar a ese archivo en Layouts.app.blade
        return redirect()->route('usuarios.index')->with('status','Usuario eliminado correctamente');
    }
}
