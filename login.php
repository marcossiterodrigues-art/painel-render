<?php
require 'config.php';

if(isset($_SESSION['admin'])){
    header('Location: dashboard.php');
    exit;
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$user]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data && password_verify($pass, $data['password'])){
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Login inválido';
}
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
<h2>Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Usuário">
<input type="password" name="password" placeholder="Senha">
<button>Entrar</button>
</form>

<p><?= $error ?></p>
</div>

</body>
</html>