<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_name = $_SESSION['user_name'] ?? 'Misafir';
$k_rol     = $_SESSION['k_rol']     ?? 0;
$fade      = [1 => ''];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
body { background: #0f172a; color: #e2e8f0; }
.card { background: #1e293b; border: 1px solid #334155; }
.form-control { background: #0f172a; color: #e2e8f0; border: 1px solid #334155; }
.form-control:focus { background: #0f172a; color: #e2e8f0; border-color: #06b6d4; }
.table { color: #e2e8f0; }
</style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="index.php">Panel</a>
    <span class="text-light">
        <?= htmlspecialchars($user_name) ?> | 
        <a href="logout.php" class="text-light">Cikis</a>
    </span>
</nav>
<div class="container-fluid">
