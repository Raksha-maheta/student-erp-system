<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
}

include "db.php";

// Total students
$total_students = mysqli_query($conn,"SELECT COUNT(*) as total FROM students");
$total_row = mysqli_fetch_assoc($total_students);

// Today's date
$today = date("Y-m-d");

// Present count
$present = mysqli_query($conn,"SELECT COUNT(*) as present FROM attendance WHERE date='$today' AND status='Present'");
$present_row = mysqli_fetch_assoc($present);

// Absent count
$absent = mysqli_query($conn,"SELECT COUNT(*) as absent FROM attendance WHERE date='$today' AND status='Absent'");
$absent_row = mysqli_fetch_assoc($absent);

//fees total
$fees_total = mysqli_query($conn,"SELECT SUM(amount) as total_fees FROM fees");
$fees_row = mysqli_fetch_assoc($fees_total);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="mb-4">Admin Dashboard</h2>

<!--cards-->
<div class="row">

<div class="col-md-4">
<div class="card text-center p-3">
<h5>Total Students</h5>
<h3><?php echo $total_row['total']; ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card text-center p-3">
<h5>Present Today</h5>
<h3><?php echo $present_row['present']; ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card text-center p-3">
<h5>Absent Today</h5>
<h3><?php echo $absent_row['absent']; ?></h3>
</div>
</div>

</div>

<!--chart-->
<div class="card p-4 mt-4">
<h4>System Overview</h4>
<canvas id="erpChart"></canvas>
</div>


<!--buttons-->
<hr>
<a href="fees.php" class="btn btn-warning">Record Fees</a>
<a href="fees_report.php" class="btn btn-dark">Fees Report</a>
<a href="index.php" class="btn btn-primary">Manage Students</a>
<a href="attendance.php" class="btn btn-success">Mark Attendance</a>
<a href="attendance_report.php" class="btn btn-info">Attendance Report</a>
<a href="add_result.php" class="btn btn-primary">Add Result</a>
<a href="result_report.php" class="btn btn-secondary">Result Report</a>
<a href="logout.php" class="btn btn-danger">Logout</a>

</div>

<!--chart script -->
<script>

const ctx = document.getElementById('erpChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: ['Students','Present Today','Absent Today','Total Fees'],

datasets: [{

label: 'ERP Statistics',

data: [

<?php echo $total_row['total']; ?>,
<?php echo $present_row['present']; ?>,
<?php echo $absent_row['absent']; ?>,
<?php echo $fees_row['total_fees']; ?>

]

}]

}

});

</script>
</body>
</html>