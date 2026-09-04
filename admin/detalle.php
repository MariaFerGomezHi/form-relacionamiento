<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../config/database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: dashboard.php');
    exit;
}

$sql = "SELECT * FROM inscripciones WHERE id = ? LIMIT 1";

$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

$inscripcion = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$inscripcion) {
    header('Location: dashboard.php');
    exit;
}

function mostrar($valor) {
    return htmlspecialchars($valor ?? '');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle de inscripción</title>

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
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 40px 20px;
        }

        .volver {
            display: inline-block;
            color: #285d4a;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h1 {
            color: #285d4a;
            margin-top: 0;
        }

        .seccion {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        .seccion h2 {
            margin-top: 0;
            color: #285d4a;
            border-bottom: 2px solid #c7e96b;
            padding-bottom: 12px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .campo {
            background: #f8faf8;
            padding: 15px;
            border-radius: 8px;
        }

        .campo strong {
            display: block;
            color: #285d4a;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .documentos {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .documento {
            background: #285d4a;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .documento:hover {
            opacity: .9;
        }

        .estado {
            display: inline-block;
            background: #c7e96b;
            color: #285d4a;
            padding: 7px 14px;
            border-radius: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<header>
    <strong>Territorios que Transforman</strong>
    — Panel de administración
</header>

<div class="container">

    <a href="dashboard.php" class="volver">
        ← Volver a las inscripciones
    </a>

    <h1>
        Detalle de inscripción #<?php echo mostrar($inscripcion['id']); ?>
    </h1>

    <div class="seccion">

        <h2>Datos del participante</h2>

        <div class="grid">

            <div class="campo">
                <strong>Nombres y apellidos</strong>
                <?php echo mostrar($inscripcion['nombres']); ?>
            </div>

            <div class="campo">
                <strong>Documento</strong>
                <?php echo mostrar($inscripcion['documento_participante']); ?>
            </div>

            <div class="campo">
                <strong>Teléfono</strong>
                <?php echo mostrar($inscripcion['telefono_participante']); ?>
            </div>

            <div class="campo">
                <strong>Correo electrónico</strong>
                <?php echo mostrar($inscripcion['correo']); ?>
            </div>

            <div class="campo">
                <strong>Cargo</strong>
                <?php echo mostrar($inscripcion['cargo']); ?>
            </div>

        </div>

    </div>


    <div class="seccion">

        <h2>Datos de la empresa</h2>

        <div class="grid">

            <div class="campo">
                <strong>Razón social</strong>
                <?php echo mostrar($inscripcion['razon_social']); ?>
            </div>

            <div class="campo">
                <strong>NIT</strong>
                <?php echo mostrar($inscripcion['nit']); ?>
            </div>

            <div class="campo">
                <strong>Representante legal</strong>
                <?php echo mostrar($inscripcion['representante_legal']); ?>
            </div>

            <div class="campo">
                <strong>Documento representante</strong>
                <?php echo mostrar($inscripcion['documento_representante']); ?>
            </div>

            <div class="campo">
                <strong>Teléfono empresa</strong>
                <?php echo mostrar($inscripcion['telefono_empresa']); ?>
            </div>

            <div class="campo">
                <strong>Municipio</strong>
                <?php echo mostrar($inscripcion['municipio']); ?>
            </div>

            <div class="campo">
                <strong>Dirección</strong>
                <?php echo mostrar($inscripcion['direccion']); ?>
            </div>

            <div class="campo">
                <strong>Nodo</strong>
                <?php echo mostrar($inscripcion['nodo']); ?>
            </div>

            <div class="campo">
                <strong>Tamaño de empresa</strong>
                <?php echo mostrar($inscripcion['tamano_empresa']); ?>
            </div>

            <div class="campo">
                <strong>Número de empleados</strong>
                <?php echo mostrar($inscripcion['numero_empleados']); ?>
            </div>

        </div>

    </div>


    <div class="seccion">

        <h2>Estado de la postulación</h2>

        <div class="grid">

            <div class="campo">
                <strong>Estado</strong>

                <span class="estado">
                    <?php echo mostrar($inscripcion['estado']); ?>
                </span>
            </div>

            <div class="campo">
                <strong>Fecha de inscripción</strong>
                <?php echo mostrar($inscripcion['fecha_inscripcion']); ?>
            </div>

            <div class="campo">
                <strong>Acepta tratamiento de datos</strong>
                <?php echo $inscripcion['acepta_datos'] ? 'Sí' : 'No'; ?>
            </div>

            <div class="campo">
                <strong>Acepta compromiso</strong>
                <?php echo $inscripcion['acepta_compromiso'] ? 'Sí' : 'No'; ?>
            </div>

        </div>

    </div>


    <div class="seccion">

        <h2>Documentos cargados</h2>

        <div class="documentos">

            <?php if (!empty($inscripcion['certificado_matricula'])): ?>

                <a
                    href="../<?php echo rawurlencode($inscripcion['certificado_matricula']); ?>"
                    target="_blank"
                    class="documento"
                >
                    Ver certificado de matrícula
                </a>

            <?php endif; ?>


            <?php if (!empty($inscripcion['cedula_participante'])): ?>

                <a
                    href="../<?php echo rawurlencode($inscripcion['cedula_participante']); ?>"
                    target="_blank"
                    class="documento"
                >
                    Ver documento del participante
                </a>

            <?php endif; ?>

        </div>

    </div>


    <?php if (!empty($inscripcion['observaciones'])): ?>

        <div class="seccion">

            <h2>Observaciones</h2>

            <?php echo nl2br(mostrar($inscripcion['observaciones'])); ?>

        </div>

    <?php endif; ?>

</div>

</body>
</html>