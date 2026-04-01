<?php
include "db.php";

$students = mysqli_query($conn,"SELECT * FROM students");

if(isset($_POST['submit'])){

$student_id = $_POST['student_id'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

mysqli_query($conn,"INSERT INTO results(student_id,subject,marks)
VALUES('$student_id','$subject','$marks')");

echo "<div class='alert alert-success'>Result saved</div>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Add Student Result</h2>

<form method="POST">

<div class="mb-3">

<label>Student</label>

<select name="student_id" class="form-control">

<?php
while($row = mysqli_fetch_assoc($students)){
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['name']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Subject</label>
<input type="text" name="subject" class="form-control">

</div>

<div class="mb-3">

<label>Marks</label>
<input type="number" name="marks" class="form-control">

</div>

<button type="submit" name="submit" class="btn btn-success">
Save Result
</button>

</form>

</div>

</body>
</html>