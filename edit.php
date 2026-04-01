<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
$name = $_POST['name'];
$course = $_POST['course'];
$email = $_POST['email'];

mysqli_query($conn,"UPDATE students SET 
name='$name',
course='$course',
email='$email'
WHERE id=$id");

header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Edit Student</h2>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
</div>

<div class="mb-3">
<label>Course</label>
<input type="text" name="course" value="<?php echo $row['course']; ?>" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
</div>

<button type="submit" name="update" class="btn btn-warning">Update</button>
<a href="index.php" class="btn btn-secondary">Back</a>

</form>

</div>

</body>
</html>