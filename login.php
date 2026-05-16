<?php
session_start();

require 'config.php';

if(isset($_SESSION['Administracao'])){
    header('Location: dashboard.php');
    exit;
}

$Erro = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Usuario = $_POST['usuario'];
    $Passe = $_POST['senha'];

    $STMT = $PDO->prepare("SELECT * FROM users WHERE username=?");
    $STMT->execute([$Usuario]);
    $Dados = $STMT->fetch(PDO::FETCH_ASSOC);

    if($Dados && password_verify($Passe, $Dados['senha'])){
        $_SESSION['Administracao'] = true;
        header('Location: dashboard.php');
        exit;
    }

    $Erro = 'Login inválido';
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
<input type="text" name="usuario" placeholder="Usuário">
<input type="password" name="senha" placeholder="Senha">
<button>Entrar</button>
</form>

<p><?= $Erro ?></p>
</div>
</body>
</html>
