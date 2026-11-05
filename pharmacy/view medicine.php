<?php
session_start();

/* 🔐 LOGIN CHECK */
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include("connection.php");

$result = mysqli_query($conn,
"SELECT * FROM medicines");

/* Role */
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Medicines List</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
}

.table{
    background:white;
    color:black;
    border-radius:10px;
    overflow:hidden;
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

<!-- Main -->
<div class="container mt-5">

<h2 class="text-center mb-4">
💊 Medicines List
</h2>

<table class="table table-bordered text-center">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Expiry Date</th>

</tr>

</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>₹ <?php echo $row['price']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo $row['expiry_date']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<!-- Back Button -->
<div class="text-center mt-3">

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