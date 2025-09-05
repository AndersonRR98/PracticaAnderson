<!DOCTYPE html>
<html>
<head>
    <title>Usuario Único</title>
</head>
<body>
<h1>{{ isset($user) ? 'Editar Usuario' : 'Crear Usuario' }}</h1>

{{-- Mostrar errores --}}
@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulario Crear / Actualizar --}}
<form action="{{ isset($user) ? url('/users/'.$user->id) : url('/users') }}" method="POST">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

    <label>Primer Nombre:</label>
    <input type="text" name="primer_nombre" value="{{ $user->primer_nombre ?? old('primer_nombre') }}" required><br>

    <label>Segundo Nombre:</label>
    <input type="text" name="segundo_nombre" value="{{ $user->segundo_nombre ?? old('segundo_nombre') }}"><br>

    <label>Primer Apellido:</label>
    <input type="text" name="primer_apellido" value="{{ $user->primer_apellido ?? old('primer_apellido') }}" required><br>

    <label>Segundo Apellido:</label>
    <input type="text" name="segundo_apellido" value="{{ $user->segundo_apellido ?? old('segundo_apellido') }}"><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email ?? old('email') }}" required><br>

    <label>Password:</label>
    <input type="password" name="password" {{ isset($user) ? '' : 'required' }}><br>

    <label>Activo:</label>
    <input type="text" name="activo" value="{{ $user->activo ?? old('activo') }}"><br>

    <label>Rol ID:</label>
    <input type="number" name="rol_id" value="{{ $user->rol_id ?? old('rol_id') }}" required><br>

    <button type="submit">{{ isset($user) ? 'Actualizar Usuario' : 'Crear Usuario' }}</button>
</form>

{{-- Botón Borrar --}}
@if(isset($user))
    <form action="{{ url('/users/' . $user->id . '/borrar') }}" method="POST" style="margin-top:10px;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Desea eliminar este usuario?')">Borrar Usuario</button>
    </form>
@endif

</body>
</html>
