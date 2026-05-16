<?php
session_start();

$dbFile = __DIR__ . '/database.sqlite';

$pdo = new PDO('sqlite:' . $dbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("CREATE TABLE IF NOT EXISTS users (
id INTEGER PRIMARY KEY AUTOINCREMENT,
username TEXT,
password TEXT
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS servers (
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT,
host TEXT,
email TEXT,
password TEXT,
conn_key TEXT,
notes TEXT,
created_at TEXT DEFAULT CURRENT_TIMESTAMP
)");

$count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

if($count == 0){
    $pass = password_hash('123456', PASSWORD_DEFAULT);
    $pdo->exec("INSERT INTO users(username,password) VALUES('admin','$pass')");
}
?>