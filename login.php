<?php
session_start();

if(isset($_POST['login'])){
$user = $_POST['username'];
$pass = $_POST['password'];

if($user=="admin" && $pass=="1234"){
$_SESSION['admin']="true";
header("Location: dashboard.php");
}else{
$error = "Invalid Login";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="col-md-4 mx-auto">

<h3 class="text-center">Admin Login</h3>

<?php if(isset($error)){ echo "<div class='alert alert-danger'>$error</div>"; } ?>

<form method="POST">

<div class="mb-3">
<input type="text" name="username" class="form-control" placeholder="Username">
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password">
</div>

<button type="submit" name="login" class="btn btn-primary w-100">Login</button>

</form>

</div>

</div>

</body>
</html>