<?php
session_start();

/* 🔐 LOGIN CHECK */
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include("connection.php");

$result = mysqli_query($conn,
"SELECT * FROM doctor_slip");

/* Role */
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
<title>View Doctor Slip</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
}

.box{
    width:90%;
    margin:50px auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

</style>

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">

<span class="navbar-brand">💊 Pharmacy</span>

<div>

<?php if($role == "admin"){ ?>

<a href="admin_dashboard.php"
class="btn btn-light">

🏠 Admin Dashboard

</a>

<?php } else { ?>

<a href="user_dashboard.php"
class="btn btn-light">

🏠 User Dashboard

</a>

<?php } ?>

<a href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</nav>

<!-- Main Box -->
<div class="box">

<h3 class="text-center mb-4">
📋 Doctor Slip List
</h3>

<table class="table table-bordered text-center">

<tr class="table-dark">

<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Medicine</th>
<th>Dosage</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['doctor_name']; ?></td>

<td><?php echo $row['medicine']; ?></td>

<td><?php echo $row['dosage']; ?></td>

<td><?php echo $row['date']; ?></td>

</tr>

<?php } ?>

</table>

<!-- Back Button -->
<div class="text-center">

<?php if($role == "admin"){ ?>

<a href="admin_dashboard.php"
class="btn btn-secondary">

⬅ Back to Admin Dashboard

</a>

<?php } else { ?>

<a href="user_dashboard.php"
class="btn btn-secondary">

⬅ Back to User Dashboard

</a>

<?php } ?>

</div>

</div>

</body>
</html>