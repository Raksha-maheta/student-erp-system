<?php
include "db.php";

$query = "
SELECT students.name, fees.amount, fees.date
FROM fees
JOIN students ON fees.student_id = students.id
ORDER BY fees.date DESC
";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Fees Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Fees Report</h2>

<table class="table table-bordered">

<tr>
<th>Student</th>
<th>Amount</th>
<th>Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><?php echo $row['date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>