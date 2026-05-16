<?php
require 'config.php';

session_start();

if(isset($_SESSION['Administração'])){
    header('Location: dashboard.php');
    exit;
}

$Erro = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $Usuario = $_POST['Nome de usuário'];
    $Passe = $_POST['senha'];

    $STMT = $PDO->prepare("SELECT * FROM users WHERE username=?");
    $STMT->execute([$Usuario]);

    $Dados = $STMT->fetch(PDO::FETCH_ASSOC);

    if($Dados && password_verify($Passe, $Dados['senha'])){
        $_SESSION['Administração'] = true;
        header('Location: dashboard.php');
        exit;
    }

    $Erro = 'Login inválido';
}
?>
