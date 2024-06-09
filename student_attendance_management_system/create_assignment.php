<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $due_date = $_POST['due_date'];

    $stmt = $pdo->prepare("INSERT INTO assignments (course, title, details, due_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$course, $title, $details, $due_date]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Assignment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e3f6f5;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: lightskyblue;
        }

        .table td, .table th {
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Create New Assignment</h1>
        <a href="index.php" class="btn btn-custom mt-3">Back to Dashboard</a>
        <form method="post" action="" class="mt-3">
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>
            <button type="submit" class="btn btn-custom">Create Assignment</button>
        </form>
    </div>
</body>
</html>