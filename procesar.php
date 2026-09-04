<?php

require_once "config/database.php";

/*
|--------------------------------------------------------------------------
| VALIDAR QUE EL FORMULARIO FUE ENVIADO POR POST
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: formulario.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| RECIBIR Y LIMPIAR DATOS
|--------------------------------------------------------------------------
*/

$nombres = trim($_POST["nombres"] ?? "");
$documento_participante = trim($_POST["documento_participante"] ?? "");
$telefono_participante = trim($_POST["telefono_participante"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$cargo = trim($_POST["cargo"] ?? "");

$razon_social = trim($_POST["razon_social"] ?? "");
$nit = trim($_POST["nit"] ?? "");
$representante_legal = trim($_POST["representante_legal"] ?? "");
$documento_representante = trim($_POST["documento_representante"] ?? "");
$telefono_empresa = trim($_POST["telefono_empresa"] ?? "");
$municipio = trim($_POST["municipio"] ?? "");
$direccion = trim($_POST["direccion"] ?? "");

$nodo = trim($_POST["nodo"] ?? "");
$tamano_empresa = trim($_POST["tamano_empresa"] ?? "");
$numero_empleados = trim($_POST["numero_empleados"] ?? "");

$acepta_datos = isset($_POST["acepta_datos"]) ? 1 : 0;
$acepta_compromiso = isset($_POST["acepta_compromiso"]) ? 1 : 0;


/*
|--------------------------------------------------------------------------
| VALIDACIONES BÁSICAS
|--------------------------------------------------------------------------
*/

if (
    empty($nombres) ||
    empty($documento_participante) ||
    empty($telefono_participante) ||
    empty($correo) ||
    empty($cargo) ||
    empty($razon_social) ||
    empty($nit) ||
    empty($representante_legal) ||
    empty($documento_representante) ||
    empty($telefono_empresa) ||
    empty($municipio) ||
    empty($direccion) ||
    empty($nodo) ||
    empty($tamano_empresa) ||
    empty($numero_empleados)
) {
    die("Error: Todos los campos obligatorios deben ser completados.");
}


if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Error: El correo electrónico no es válido.");
}


if ($acepta_datos !== 1 || $acepta_compromiso !== 1) {
    die("Error: Debes aceptar los términos y autorizaciones para continuar.");
}


/*
|--------------------------------------------------------------------------
| VALIDAR NÚMERO DE EMPLEADOS
|--------------------------------------------------------------------------
*/

if (!is_numeric($numero_empleados) || (int)$numero_empleados < 1) {
    die("Error: El número de empleados debe ser válido.");
}

$numero_empleados = (int)$numero_empleados;


/*
|--------------------------------------------------------------------------
| VALIDAR VALORES DE LOS ENUM DE MYSQL
|--------------------------------------------------------------------------
*/

$nodos_permitidos = [
    "Minero",
    "Lácteo",
    "Turístico",
    "Curtiembre"
];

if (!in_array($nodo, $nodos_permitidos)) {
    die("Error: El nodo seleccionado no es válido.");
}


$tamanos_permitidos = [
    "Microempresa",
    "Pequeña empresa",
    "Mediana empresa",
    "Gran empresa"
];

if (!in_array($tamano_empresa, $tamanos_permitidos)) {
    die("Error: El tamaño de empresa seleccionado no es válido.");
}


/*
|--------------------------------------------------------------------------
| CONFIGURACIÓN DE ARCHIVOS
|--------------------------------------------------------------------------
*/

$carpeta_uploads = "uploads/";

if (!is_dir($carpeta_uploads)) {
    mkdir($carpeta_uploads, 0755, true);
}


/*
|--------------------------------------------------------------------------
| FUNCIÓN PARA SUBIR ARCHIVOS PDF
|--------------------------------------------------------------------------
*/

function subirArchivo($campo, $carpeta)
{
    if (
        !isset($_FILES[$campo]) ||
        $_FILES[$campo]["error"] !== UPLOAD_ERR_OK
    ) {
        die("Error: Debes cargar el archivo requerido: " . $campo);
    }

    $archivo = $_FILES[$campo];

    /*
    | Tamaño máximo: 5 MB
    */

    if ($archivo["size"] > 5 * 1024 * 1024) {
        die("Error: El archivo " . $campo . " supera el tamaño máximo de 5 MB.");
    }


    /*
    | Validar extensión
    */

    $extension = strtolower(
        pathinfo($archivo["name"], PATHINFO_EXTENSION)
    );

    $extensiones_permitidas = ["pdf"];

    if (!in_array($extension, $extensiones_permitidas)) {
        die("Error: El archivo " . $campo . " debe estar en formato PDF.");
    }


    /*
    | Crear nombre único para evitar reemplazar archivos
    */

    $nombre_nuevo =
        $campo . "_" .
        uniqid() . "_" .
        time() . "." .
        $extension;

    $ruta_destino = $carpeta . $nombre_nuevo;


    /*
    | Mover archivo
    */

    if (!move_uploaded_file($archivo["tmp_name"], $ruta_destino)) {
        die("Error: No fue posible guardar el archivo " . $campo);
    }

    return $ruta_destino;
}


/*
|--------------------------------------------------------------------------
| SUBIR DOCUMENTOS
|--------------------------------------------------------------------------
*/

$certificado_matricula = subirArchivo(
    "certificado_matricula",
    $carpeta_uploads
);

$cedula_participante = subirArchivo(
    "cedula_participante",
    $carpeta_uploads
);


/*
|--------------------------------------------------------------------------
| GUARDAR INSCRIPCIÓN EN LA BASE DE DATOS
|--------------------------------------------------------------------------
*/

try {

    $sql = "
        INSERT INTO inscripciones (
            nombres,
            documento_participante,
            telefono_participante,
            correo,
            cargo,
            razon_social,
            nit,
            representante_legal,
            documento_representante,
            telefono_empresa,
            municipio,
            direccion,
            nodo,
            tamano_empresa,
            numero_empleados,
            acepta_datos,
            acepta_compromiso,
            certificado_matricula,
            cedula_participante
        )
        VALUES (
            :nombres,
            :documento_participante,
            :telefono_participante,
            :correo,
            :cargo,
            :razon_social,
            :nit,
            :representante_legal,
            :documento_representante,
            :telefono_empresa,
            :municipio,
            :direccion,
            :nodo,
            :tamano_empresa,
            :numero_empleados,
            :acepta_datos,
            :acepta_compromiso,
            :certificado_matricula,
            :cedula_participante
        )
    ";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ":nombres" => $nombres,
        ":documento_participante" => $documento_participante,
        ":telefono_participante" => $telefono_participante,
        ":correo" => $correo,
        ":cargo" => $cargo,
        ":razon_social" => $razon_social,
        ":nit" => $nit,
        ":representante_legal" => $representante_legal,
        ":documento_representante" => $documento_representante,
        ":telefono_empresa" => $telefono_empresa,
        ":municipio" => $municipio,
        ":direccion" => $direccion,
        ":nodo" => $nodo,
        ":tamano_empresa" => $tamano_empresa,
        ":numero_empleados" => $numero_empleados,
        ":acepta_datos" => $acepta_datos,
        ":acepta_compromiso" => $acepta_compromiso,
        ":certificado_matricula" => $certificado_matricula,
        ":cedula_participante" => $cedula_participante
    ]);


    /*
    | Redirigir cuando todo fue exitoso
    */

    header("Location: gracias.php");
    exit;

} catch (PDOException $e) {

    /*
    | Si ocurre un error, eliminar los archivos que acabamos de subir
    */

    if (isset($certificado_matricula) && file_exists($certificado_matricula)) {
        unlink($certificado_matricula);
    }

    if (isset($cedula_participante) && file_exists($cedula_participante)) {
        unlink($cedula_participante);
    }

    die(
        "Error al guardar la inscripción: " .
        $e->getMessage()
    );
}