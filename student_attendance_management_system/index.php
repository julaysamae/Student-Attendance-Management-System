<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM assignments");
$stmt->execute();
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e3f6f5;
        }
        .btn-secondary {
            background-color: #aa96da;
        }
        .btn-secondary:hover {
            background-color: violet;
        }
        .header {
            background-color: #bae8e8;
            padding: 10px 125px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header a {
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Student Attendance Management System</h1>
        <a href="logout.php" class="btn btn-secondary">Log Out</a>
    </div>
    <div class="container mt-5">
        <a href="create_assignment.php" class="btn btn-primary mt-3">Create New Assignment</a>
        <h2 class="mt-5">Assignments</h2>
        <table class="table table-bordered mt-3">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignments as $assignment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($assignment['id']); ?></td>
                        <td><?php echo htmlspecialchars($assignment['course']); ?></td>
                        <td><?php echo htmlspecialchars($assignment['title']); ?></td>
                        <td><?php echo htmlspecialchars($assignment['due_date']); ?></td>
                        <td>
                            <a href="read_assignment.php?id=<?php echo $assignment['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="update_assignment.php?id=<?php echo $assignment['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_assignment.php?id=<?php echo $assignment['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this assignment?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>