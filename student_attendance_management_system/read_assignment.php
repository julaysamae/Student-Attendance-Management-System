<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$assignment_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM assignments WHERE id = :id");
$stmt->execute(['id' => $assignment_id]);
$assignment = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Assignment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e3f6f5;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: lightskyblue;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-subtitle {
            font-size: 1.2rem;
        }
        .card-text {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Assignment Details</h1>
        <a href="index.php" class="btn btn-custom mt-3">Back to Dashboard</a>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($assignment['title']); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($assignment['course']); ?></h6>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($assignment['details'])); ?></p>
            </div>
        </div>
    </div>
</body>
</html>