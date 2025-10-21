<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_colegio2");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM personas";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Personas - Dark Mode</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #1e1e1e;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            color: #bb86fc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #bb86fc;
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }
        tr:hover {
            background-color: #2a2a2a;
            cursor: default;
        }
        p {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Listado de Personas</h2>

        <?php if ($resultado->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Ciudad</th>
                        <th>Promedio</th>
                        <th>Creado En</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila["id"]) ?></td>
                            <td><?= htmlspecialchars($fila["nombre"]) ?></td>
                            <td><?= htmlspecialchars($fila["apellido"]) ?></td>
                            <td><?= htmlspecialchars($fila["correo"]) ?></td>
                            <td><?= htmlspecialchars($fila["telefono"]) ?></td>
                            <td><?= htmlspecialchars($fila["fecha_nacimiento"]) ?></td>
                            <td><?= htmlspecialchars($fila["ciudad"]) ?></td>
                            <td><?= htmlspecialchars($fila["promedio"]) ?></td>
                            <td><?= htmlspecialchars($fila["creado_en"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay registros para mostrar.</p>
        <?php endif; ?>

        <?php $conexion->close(); ?>
    </div>
</body>
</html>
