<?php
include "db.php";

$students = mysqli_query($conn,"SELECT * FROM students");

if(isset($_POST['submit'])){

$date = $_POST['date'];

foreach($_POST['status'] as $student_id => $status){

mysqli_query($conn,"INSERT INTO attendance(student_id,date,status)
VALUES('$student_id','$date','$status')");

}

echo "<div class='alert alert-success'>Attendance Saved</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Mark Attendance</h2>

<form method="POST">

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<table class="table table-bordered">

<tr>
<th>Name</th>
<th>Status</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($students)){
?>

<tr>

<td><?php echo $row['name']; ?></td>

<td>

<select name="status[<?php echo $row['id']; ?>]" class="form-control">

<option value="Present">Present</option>
<option value="Absent">Absent</option>

</select>

</td>

</tr>

<?php } ?>

</table>

<button type="submit" name="submit" class="btn btn-success">
Save Attendance
</button>

</form>

</div>

</body>
</html>