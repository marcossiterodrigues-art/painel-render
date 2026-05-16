<?php
$server = "pitbull.up.railway.app";
$key = strtoupper(bin2hex(random_bytes(8)));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gerar Acesso</title>
<style>
body{
    background:#0f172a;
    color:white;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}
.card{
    background:#111827;
    padding:30px;
    border-radius:15px;
    width:420px;
}
button{
    width:100%;
    padding:15px;
    background:#22c55e;
    border:none;
    border-radius:10px;
    color:white;
    font-size:18px;
    cursor:pointer;
}
.info{
    margin-top:20px;
    background:#020617;
    padding:15px;
    border-radius:10px;
}
</style>
</head>
<body>

<div class="card">
    <h2>Gerar Acesso do Servidor</h2>

    <form method="post">
        <button name="gerar" value="1">Criar Servidor</button>
    </form>

    <?php if(isset($_POST["gerar"])): ?>
    <div class="info">
        <p><b>Status:</b> ONLINE</p>
        <p><b>Display Name:</b> Pitbull Server</p>
        <p><b>IP / Host:</b> <?= $server ?></p>
        <p><b>User:</b> admin</p>
        <p><b>Password:</b> 123456</p>
        <p><b>Connection Key:</b> <?= $key ?></p>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
