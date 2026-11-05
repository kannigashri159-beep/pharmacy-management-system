<?php
session_start();
if($_SESSION['role'] != 'user'){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#667eea,#764ba2);
    color:white;
}
.card{
    border:none;
    border-radius:15px;
    transition:0.3s;
}
.card:hover{
    transform:scale(1.05);
}
.navbar{
    background:#343a40;
}
</style>

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark px-3">
    <span class="navbar-brand mb-0 h1">💊 Pharmacy User Panel</span>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</nav>

<div class="container mt-5">

    <h2 class="text-center mb-4">Welcome User 👤</h2>

    <div class="row g-4">

        <!-- View Medicines -->
        <div class="col-md-4">
            <div class="card bg-light text-dark text-center p-4">
                <h4>💊 Medicines</h4>
                <p>View available medicines</p>
                <a href="view medicine.php" class="btn btn-primary">View</a>
            </div>
        </div>

        <!-- Prescriptions -->
        <div class="col-md-4">
            <div class="card bg-light text-dark text-center p-4">
                <h4>🧾 Prescriptions</h4>
                <p>View doctor slips</p>
                <a href="view doctor slip.php" class="btn btn-success">View</a>
            </div>
        </div>

        <!-- Billing -->
        <div class="col-md-4">
            <div class="card bg-light text-dark text-center p-4">
                <h4>🛒 Billing</h4>
                <p>Generate and view bills</p>
                <a href="bill.php" class="btn btn-warning">Go</a>
            </div>
        </div>

        <!-- Stock -->
        <div class="col-md-4">
            <div class="card bg-light text-dark text-center p-4">
                <h4>📦 Stock</h4>
                <p>Check availability</p>
                <a href="stock.php" class="btn btn-info">Check</a>
            </div>
        </div>

        <!-- Expiry -->
        <div class="col-md-4">
            <div class="card bg-light text-dark text-center p-4">
                <h4>⏰ Expiry</h4>
                <p>View expiring medicines</p>
                <a href="expiry.php" class="btn btn-secondary">View</a>
            </div>
        </div>

    </div>

</div>

</body>
</html>