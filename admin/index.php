<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}

require_once '../config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        $error = 'Por favor complete todos los campos.';
    } else {

        $sql = "SELECT * FROM usuarios_admin WHERE usuario = ? LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$usuario]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_usuario'] = $admin['usuario'];

            header('Location: dashboard.php');
            exit;

        } else {
            $error = 'Usuario o contraseña incorrectos.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administración | Territorios que Transforman</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #f5f6f4;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,.10);
            border-top: 6px solid #285d4a;
        }

        h1 {
            margin: 0 0 8px;
            color: #285d4a;
            font-size: 28px;
        }

        .subtitulo {
            color: #666;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #d5d5d5;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #285d4a;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #285d4a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        .error {
            background: #fde8e8;
            color: #a12626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h1>Administración</h1>

    <p class="subtitulo">
        Territorios que Transforman
    </p>

    <?php if ($error !== ''): ?>
        <div class="error">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label for="usuario">Usuario</label>

        <input
            type="text"
            id="usuario"
            name="usuario"
            required
            autocomplete="username"
        >

        <label for="password">Contraseña</label>

        <input
            type="password"
            id="password"
            name="password"
            required
            autocomplete="current-password"
        >

        <button type="submit">
            Ingresar
        </button>

    </form>

</div>

</body>
</html>