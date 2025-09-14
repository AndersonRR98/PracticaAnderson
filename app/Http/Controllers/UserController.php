<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
public function index()
    {
        $user = User:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($user);
        
    }

    public function store(Request $request)
    {
               $request->validate([
             'primer_nombre' => 'required|string|max:255',
             'segundo_nombre' => 'nullable|string|max:255',
             'primer_apellido' => 'required|string|max:255',
             'segundo_apellido' => 'nullable|string|max:255',
             'email' => 'required|email|unique:users,email,',
             'password' => 'required|string|min:6',
             'activo' => 'nullable|integer|max:255',
             'rol_id' => 'required|exists:roles,id'
         ]);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }

   public function show($id)
    {
        $user = User::with(['user','publications','images'])->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
          $request->validate([
            'primer_nombre' => 'required|string|max:255',
             'segundo_nombre' => 'nullable|string|max:255',
             'primer_apellido' => 'required|string|max:255',
             'segundo_apellido' => 'nullable|string|max:255',
             'email' => 'required|email|unique:users,email,' . $user->id,
             'password' => 'required|string|min:6',
             'activo' => 'nullable|integer|max:255',
             'rol_id' => 'required|exists:roles,id'   
        ]);

        $user->update($request->all());
        return response()->json($user);
        
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }


    // // LISTAR todos los egresados (JSON)
    // public function index()
    // {
    //     return response()->json(User::all());
    // }

    // // FORMULARIO para crear un nuevo user
    // public function create()
    // {
    //     return view('Store'); // resources/views/Store.blade.php
    // }

    // // GUARDAR nuevo user
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'primer_nombre' => 'required|string|max:255',
    //         'segundo_nombre' => 'nullable|string|max:255',
    //         'primer_apellido' => 'required|string|max:255',
    //         'segundo_apellido' => 'nullable|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:6',
    //         'activo' => 'nullable|string|max:255',
    //         'rol_id' => 'required|exists:roles,id'
    //     ]);

    //     $user = User::create($validated);

    //     return response()->json(['message' => 'Usuario creado correctamente', 'user' => $user]);
    // }

    // // MOSTRAR un user específico
    // public function show(User $user)
    // {
    //     return response()->json($user);
    // }

    // // FORMULARIO para editar un usuario
    // public function edit(User $user)
    // {
    //     return view('Update', compact('user')); // resources/views/Update.blade.php
    // }

    // // ACTUALIZAR usuario 
    // public function update(Request $request, User $user)
    // {
    //     $validated = $request->validate([
    //           'primer_nombre' => 'required|string|max:255',
    //         'segundo_nombre' => 'nullable|string|max:255',
    //         'primer_apellido' => 'required|string|max:255',
    //         'segundo_apellido' => 'nullable|string|max:255',
    //          'email' => 'required|email|unique:users,email,' . $user->id,
    //         'password' => 'required|string|min:6',
    //         'activo' => 'nullable|string|max:255',
    //         'rol_id' => 'required|exists:roles,id'
    //     ]);

    //     $user->update($validated);

    //     return response()->json(['message' => 'User actualizado correctamente', 'user' => $user]);
    // }

    // // ELIMINAR usuario
    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return response()->json(['message' => 'Usuario eliminado correctamente']);
    // }
}
