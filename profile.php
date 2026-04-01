<?php
include "db.php";

$id = $_GET['id'];

// Student info
$student = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$student_data = mysqli_fetch_assoc($student);

// Attendance records
$attendance = mysqli_query($conn,"
SELECT date,status 
FROM attendance 
WHERE student_id=$id
ORDER BY date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Student Profile</h2>

<div class="card p-3 mb-4">

<h4><?php echo $student_data['name']; ?></h4>

<p><b>Course:</b> <?php echo $student_data['course']; ?></p>
<p><b>Email:</b> <?php echo $student_data['email']; ?></p>

</div>

<h4>Attendance History</h4>

<table class="table table-bordered">

<tr>
<th>Date</th>
<th>Status</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($attendance)){
?>

<tr>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>

<?php } ?>

</table>

<a href="index.php" class="btn btn-secondary">Back</a>

</div>

</body>
</html>