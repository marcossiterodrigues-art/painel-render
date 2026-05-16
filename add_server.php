<?php
require 'config.php';

if(!isset($_SESSION['admin'])){
    exit;
}

$name = $_POST['name'];
$host = $_POST['host'];
$email = $_POST['email'];
$password = $_POST['password'];
$conn_key = $_POST['conn_key'];
$notes = $_POST['notes'];

$stmt = $pdo->prepare("INSERT INTO servers(name,host,email,password,conn_key,notes)
VALUES(?,?,?,?,?,?)");

$stmt->execute([
$name,
$host,
$email,
$password,
$conn_key,
$notes
]);

header('Location: dashboard.php');
?>