<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index() {
        
        return User::All()->toJson();
    }

    function users(Request $request) {

        return User::paginate(1);
    }

    function store(Request $request) {
        extract($request->all());
        $user = new User();
        $user->nombre = $nombre;
        $user->apellidos = $apellidos;
        $user->email = $email;
        $user->telefono = $telefono;

        if ($password == $passwordRepeat)
            $user->password = Hash::make($password);

        $user->save();
        return redirect()->to('/');
    }

    function delete(Request $request) {

        $id = $request->id;
        $user = User::find($id);
        $user->delete();
       return response()->json(['success' => true]);

    }

    function edit(Request $request) {

        extract($request->all());
        $user = User::find($id);
        $user->nombre = $nombre;
        $user->apellidos = $apellidos;
        $user->email = $email;
        $user->telefono = $telefono;

        // contraseña no vacía cambia la antigua contraseña
        if ($password != "") {
            if ($password == $passwordRepeat)
                $user->password = Hash::make($password);
        }

        $user->save();
        return response()->json(['success' => true]);  

    } 


    function editForm(Request $request) {

        $id = explode('/',$request->getRequestUri())[3];
        $obj = User::find($id);
        $usuario = $obj->getAttributes();
      //  dd($usuario);
        return view('admin.usuario.edit',compact('usuario'));
    }

    function createForm(Request $request) {

        return view('admin.usuario.new');
    }

    function registerForm(Request $request) {

        return view('user.register');
    }
}