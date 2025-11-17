<?php
session_start();
if(!isset($_SESSION['admin_logged'])) exit;
require __DIR__ . '/../db/db.php';

$id = (int)$_GET['id'];

$pdo->prepare("DELETE FROM appointments WHERE id = ?")->execute([$id]);

header("Location: dashboard.php");
exit;
