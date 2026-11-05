<?php
session_start();

// 🔐 USER CHECK
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit();
}

include("connection.php");

$result = mysqli_query($conn, "SELECT * FROM medicines");

$today = date("Y-m-d");
$warning = date("Y-m-d", strtotime("+30 days"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Expiry Medicines</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* Center box */
.box{
    width:80%;
    margin:60px auto;
    background:white;
    padding:25px;
    border-radius:15px;
}

/* Table style */
.table td, .table th{
    text-align:center;
}
</style>

</head>

<body>

<!-- 🔝 Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">💊 Pharmacy</span>
    <div>
        <a href="user_dashboard.php" class="btn btn-light">🏠 Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="box">

<h3 class="text-center mb-4">⏰ Expiry Medicines</h3>

<table class="table table-bordered">

<tr class="table-dark">
    <th>Name</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Expiry</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) {

$exp = $row['expiry_date'];

if($exp < $today){
    $bg = "table-danger"; // 🔴 expired
}
elseif($exp <= $warning){
    $bg = "table-warning"; // 🟡 near expiry
}
else{
    $bg = "table-success"; // 🟢 safe
}
?>

<tr class="<?php echo $bg; ?>">
    <td><?php echo $row['name']; ?></td>
    <td>₹ <?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['expiry_date']; ?></td>
</tr>

<?php } ?>

</table>

<div class="text-center">
    <a href="user_dashboard.php" class="btn btn-secondary">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>