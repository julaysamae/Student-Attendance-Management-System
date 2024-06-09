<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM assignments WHERE id = :id");
$stmt->execute(['id' => $id]);
$assignment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$assignment) {
    $_SESSION['error_message'] = "Assignment not found!";
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $due_date = $_POST['due_date'];
    
    $stmt = $pdo->prepare("UPDATE assignments SET course = :course, title = :title, details = :details, due_date = :due_date WHERE id = :id");
    if ($stmt->execute(['course' => $course, 'title' => $title, 'details' => $details, 'due_date' => $due_date, 'id' => $id])) {
        $_SESSION['success_message'] = "Assignment updated successfully!";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Failed to update assignment!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Assignment</title>
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
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Assignment</h1>
        <a href="index.php" class="btn btn-custom mt-3">Back to Dashboard</a>
        <form method="post" action="" class="mt-3">
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" class="form-control" value="<?php echo htmlspecialchars($assignment['course']); ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($assignment['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea name="details" id="details" class="form-control" rows="5" required><?php echo htmlspecialchars($assignment['details']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="<?php echo htmlspecialchars($assignment['due_date']); ?>" required>
            </div>
            <button type="submit" class="btn btn-custom">Update Assignment</button>
        </form>
    </div>
</body>
</html>