<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../config/database.php';

$sql = "SELECT
            id,
            nombres,
            documento_participante,
            correo,
            razon_social,
            nit,
            municipio,
            nodo,
            estado,
            fecha_inscripcion
        FROM inscripciones
        ORDER BY fecha_inscripcion DESC";

$stmt = $conexion->query($sql);
$inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Territorios que Transforman</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f4;
            color: #333;
        }

        header {
            background: #285d4a;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 22px;
        }

        header p {
            margin: 5px 0 0;
            opacity: .8;
            font-size: 14px;
        }

        .logout {
            color: white;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.5);
            padding: 10px 15px;
            border-radius: 7px;
        }

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 40px 20px;
        }

        .titulo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .titulo h2 {
            margin: 0;
            color: #285d4a;
        }

        .contador {
            background: #c7e96b;
            color: #285d4a;
            padding: 10px 16px;
            border-radius: 20px;
            font-weight: bold;
        }

        .tabla-contenedor {
            overflow-x: auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: #edf3ef;
            color: #285d4a;
            text-align: left;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover td {
            background: #fafcfb;
        }

        .ver {
            display: inline-block;
            background: #285d4a;
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            font-size: 14px;
        }

        .vacio {
            padding: 50px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

<header>

    <div>
        <h1>Territorios que Transforman</h1>
        <p>Panel de administración</p>
    </div>

    <a href="logout.php" class="logout">
        Cerrar sesión
    </a>

</header>

<div class="container">

    <div class="titulo">

        <h2>Inscripciones recibidas</h2>

        <div class="contador">
            <?php echo count($inscripciones); ?> registros
        </div>

    </div>

    <div class="tabla-contenedor">

        <?php if (count($inscripciones) > 0): ?>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Empresa</th>
                        <th>Correo</th>
                        <th>Municipio</th>
                        <th>Nodo</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($inscripciones as $inscripcion): ?>

                        <tr>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['id']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['nombres']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['documento_participante']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['razon_social']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['correo']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['municipio']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['nodo']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['estado']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($inscripcion['fecha_inscripcion']); ?>
                            </td>

                            <td>
                                <a
                                    href="detalle.php?id=<?php echo $inscripcion['id']; ?>"
                                    class="ver"
                                >
                                    Ver información
                                </a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <div class="vacio">
                Aún no hay inscripciones registradas.
            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>