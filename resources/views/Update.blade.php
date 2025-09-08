<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Usuario</title>
</head>
<body>
    <h1>Actualizar Usuario</h1>

    <!-- Formulario de actualización -->
    <form action="/users/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')

        <label for="primer_nombre">Primer Nombre:</label>
        <input type="text" name="primer_nombre" value="{{ $user->primer_nombre }}" required><br>

        <label for="segundo_nombre">Segundo Nombre:</label>
        <input type="text" name="segundo_nombre" value="{{ $user->segundo_nombre }}"><br>

        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" value="{{ $user->primer_apellido }}" required><br>

        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido" value="{{ $user->segundo_apellido }}"><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Dejar en blanco si no desea cambiar"><br>

        <label for="activo">Activo:</label>
        <input type="text" name="activo" value="{{ $user->activo }}"><br>

        <label for="rol_id">Rol ID:</label>
        <input type="number" name="rol_id" value="{{ $user->rol_id }}" required><br>

        <button type="submit">Actualizar Usuario</button>
    </form>

    <hr>

    <!-- Formulario para eliminar -->
    <form action="/users/{{ $user->id }}" method="POST" style="margin-top:10px;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background-color:red; color:white;">Eliminar Usuario</button>
    </form>

</body>
</html>
