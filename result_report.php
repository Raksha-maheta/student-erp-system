<?php
include "db.php";

$query = "
SELECT students.name, results.subject, results.marks
FROM results
JOIN students ON results.student_id = students.id
";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Result Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Student Results</h2>

<table class="table table-bordered">

<tr>
<th>Student</th>
<th>Subject</th>
<th>Marks</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['marks']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>