<?php
include "db.php";

$students = mysqli_query($conn,"SELECT * FROM students");

if(isset($_POST['submit'])){

$student_id = $_POST['student_id'];
$amount = $_POST['amount'];
$date = $_POST['date'];

mysqli_query($conn,"INSERT INTO fees(student_id,amount,date)
VALUES('$student_id','$amount','$date')");

echo "<div class='alert alert-success'>Fee recorded</div>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Fees Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2>Record Student Fee</h2>

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
<label>Amount</label>
<input type="number" name="amount" class="form-control">
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control">
</div>

<button type="submit" name="submit" class="btn btn-success">
Save Fee
</button>

</form>

</div>

</body>
</html>