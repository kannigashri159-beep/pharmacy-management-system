<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include("connection.php");

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Dashboard</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>

body{
    margin:0;
    background:#f4f6f9;
    font-family:Arial;
}

/* Sidebar */
.sidebar{
    width:230px;
    height:100vh;
    background:#0d6efd;
    position:fixed;
    top:0;
    left:0;
    overflow:auto;
    color:white;
}

.sidebar h4{
    text-align:center;
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:12px 18px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#084298;
}

/* Main */
.main{
    margin-left:230px;
    padding:30px;
}

/* Cards */
.card-box{
    border-radius:12px;
    padding:25px;
    text-align:center;
    color:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.green{ background:#198754; }
.blue{ background:#0d6efd; }
.orange{ background:#fd7e14; }
.red{ background:#dc3545; }
.purple{ background:#6f42c1; }
.cyan{ background:#20c997; }

.btn-download{
    background:#ffc107;
    color:black !important;
    padding:8px;
    border-radius:6px;
    text-decoration:none;
    display:block;
    margin-top:5px;
}

</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

<h4>💊 Pharmacy</h4>

<a href="dashboard.php">🏠 Dashboard</a>

<?php if($role=="admin"){ ?>

<a href="add medicine.php">➕ Add Medicine</a>

<a href="view medicine.php">👁 View Medicine</a>

<a href="stock.php">📦 Stock</a>

<a href="view sales.php">📊 View Sales</a>

<a href="bill.php" target="_blank" class="btn-download">
🧾 Download Bill
</a>

<a href="add doctor slip.php">📝 Add Doctor Slip</a>

<a href="view doctor slip.php">📋 View Doctor Slip</a>

<?php } ?>


<?php if($role=="staff"){ ?>

<a href="view medicine.php">👁 View Medicine</a>

<a href="stock.php">📦 Stock</a>

<a href="view sales.php">📊 View Sales</a>

<a href="bill.php" target="_blank" class="btn-download">
🧾 Download Bill
</a>

<?php } ?>


<?php if($role=="user"){ ?>

<a href="view medicine.php">💊 View Medicines</a>

<a href="expiry.php">⏰ Expiry Alert</a>

<?php } ?>

<a href="logout.php">🚪 Logout</a>

</div>
<!-- Sidebar Close -->



<!-- Main Content -->
<div class="main">

<?php if($role=="admin"){ ?>

<h2>👨‍💼 Admin Dashboard</h2>

<?php } elseif($role=="staff"){ ?>

<h2>💊 Staff Dashboard</h2>

<?php } else { ?>

<h2>👤 User Dashboard</h2>

<?php } ?>


<div class="container-fluid">

<div class="row g-4 mt-2">

<!-- Total Medicines -->
<div class="col-md-4">
<div class="card-box green">

<h5>Total Medicines</h5>

<?php
$med = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM medicines"));
?>

<h3><?= $med['total']; ?></h3>

</div>
</div>


<!-- Stock -->
<div class="col-md-4">
<div class="card-box blue">

<h5>Total Stock</h5>

<?php
$stock = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT IFNULL(SUM(quantity),0) as total FROM medicines"));
?>

<h3><?= $stock['total']; ?></h3>

</div>
</div>


<!-- Sales -->
<div class="col-md-4">
<div class="card-box orange">

<h5>Total Sales</h5>

<?php
$sales = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT IFNULL(SUM(total),0) as total_sales FROM sales"));
?>

<h3>₹ <?= $sales['total_sales']; ?></h3>

</div>
</div>


<!-- Highest Price -->
<div class="col-md-4">
<div class="card-box red">

<h5>Highest Price</h5>

<?php
$max = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT MAX(price) as max_price FROM medicines"));
?>

<h3>₹ <?= $max['max_price']; ?></h3>

</div>
</div>


<!-- Lowest Price -->
<div class="col-md-4">
<div class="card-box purple">

<h5>Lowest Price</h5>

<?php
$min = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT MIN(price) as min_price FROM medicines"));
?>

<h3>₹ <?= $min['min_price']; ?></h3>

</div>
</div>


<!-- Expiry -->
<div class="col-md-4">
<div class="card-box cyan">

<h5>Expiry Alert</h5>

<h3>
<a href="expiry.php"
style="color:white;text-decoration:none;">
Check
</a>
</h3>

</div>
</div>

</div>
</div>

</div>

</body>
</html>