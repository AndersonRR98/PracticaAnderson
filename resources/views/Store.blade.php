<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Formulario de Usuario</h1>

    <form action="/users" method="POST">
        @csrf

        <label for="primer_nombre">Primer Nombre:</label>
        <input type="text" name="primer_nombre" required><br>

        <label for="segundo_nombre">Segundo Nombre:</label>
        <input type="text" name="segundo_nombre"><br>

        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" required><br>

        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido"><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="activo">Activo:</label>
        <input type="text" name="activo"><br>

        <label for="rol_id">Rol ID:</label>
        <input type="number" name="rol_id" required><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
