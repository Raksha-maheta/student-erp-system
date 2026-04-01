<?php
include "db.php";

$query = "SELECT students.name, attendance.date, attendance.status
FROM attendance
JOIN students ON attendance.student_id = students.id
ORDER BY attendance.date DESC";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Attendance Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Attendance Report</h2>

<table class="table table-bordered table-striped">

<tr>
<th>Student Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</div>

</body>
</html>