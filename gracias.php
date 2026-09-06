<?php

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Inscripción recibida</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container">

    <div
        class="card shadow text-center p-5"
        style="max-width:700px; margin:100px auto;"
    >

        <h1 class="text-success">
            ¡Gracias!
        </h1>

        <p class="lead mt-4">
            Gracias por su postulación a
            <strong>
                Territorios que Transforman:
                Formación Empresarial para la Circularidad
            </strong>.
        </p>

        <p>
            Próximamente nos comunicaremos con ustedes para informarles
            los resultados del proceso de selección de las empresas
            postuladas.
        </p>

        <?php if ($id > 0): ?>

            <div class="alert alert-info mt-4">
                Número de inscripción:
                <strong>#<?php echo $id; ?></strong>
            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>
```
