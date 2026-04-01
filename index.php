<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4 text-center">Student Management System</h2>

<div class="d-flex justify-content-between mb-3">
<a href="add.php" class="btn btn-primary">Add Student</a>
<a href="dashboard.php" class="btn btn-secondary">Dashboard</a>
</div>

<form method="GET" class="mb-3">
<input type="text" name="search" class="form-control" placeholder="Search by name">
</form>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Course</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

if(isset($_GET['search'])){
$search = $_GET['search'];
$result = mysqli_query($conn,"SELECT * FROM students WHERE name LIKE '%$search%'");
}else{
$result = mysqli_query($conn,"SELECT * FROM students");
}

while($row = mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>
<a href='profile.php?id=".$row['id']."' class='btn btn-info btn-sm'>Profile</a>
<a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>
<a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete?\")'>Delete</a>
</td>";
echo "</tr>";

}
?>

</table>

</div>

</body>
</html>