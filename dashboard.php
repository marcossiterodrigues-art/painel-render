<?php
require 'config.php';

if(!isset($_SESSION['admin'])){
    header('Location: login.php');
    exit;
}

$list = $pdo->query("SELECT * FROM servers ORDER BY id DESC")
->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
<head>
<title>Painel Servidores</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
<h2>Add Server</h2>

<form method="POST" action="add_server.php">

<input type="text" name="name" placeholder="Display Name">
<input type="text" name="host" placeholder="IP / Host">
<input type="email" name="email" placeholder="User Email">
<input type="text" name="password" placeholder="Password">
<input type="text" name="conn_key" placeholder="Connection Key">
<input type="text" name="notes" placeholder="Notes">

<button>Save</button>

</form>
</div>

<div class="box">

<h2>Servidores</h2>

<table>

<tr>
<th>ID</th>
<th>Nome</th>
<th>Host</th>
<th>Email</th>
<th>Key</th>
</tr>

<?php foreach($list as $s): ?>

<tr>
<td><?= $s['id'] ?></td>
<td><?= htmlspecialchars($s['name']) ?></td>
<td><?= htmlspecialchars($s['host']) ?></td>
<td><?= htmlspecialchars($s['email']) ?></td>
<td><?= htmlspecialchars($s['conn_key']) ?></td>
</tr>

<?php endforeach; ?>

</table>

</div>

</body>
</html>