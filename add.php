<?php
include "db.php";

if(isset($_POST['submit'])){
$name = $_POST['name'];
$course = $_POST['course'];
$email = $_POST['email'];

mysqli_query($conn,"INSERT INTO students(name,course,email)
VALUES('$name','$course','$email')");

header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Add Student</h2>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Course</label>
<input type="text" name="course" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-success">Add Student</button>
<a href="index.php" class="btn btn-secondary">Back</a>

</form>

</div>

</body>
</html>