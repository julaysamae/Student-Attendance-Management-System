<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$assignment_id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM assignments WHERE id = :id");
$stmt->execute(['id' => $assignment_id]);

header("Location: index.php");
?>