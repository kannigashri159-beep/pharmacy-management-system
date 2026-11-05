<?php
session_start();

/* 🔐 LOGIN CHECK */
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include("connection.php");

/* Role */
$role = $_SESSION['role'];

/* 👉 Generate PDF */
if(isset($_POST['generate'])){

    require('fpdf.php');

    $pdf = new FPDF();

    $pdf->AddPage();

    // Title
    $pdf->SetFont('Arial','B',16);

    $pdf->Cell(0,10,'ABC PHARMACY',0,1,'C');

    $pdf->SetFont('Arial','',12);

    $pdf->Cell(0,10,
    'Bill No: BILL'.rand(100,999),
    0,1);

    $pdf->Cell(0,10,
    'Date: '.date('d-m-Y'),
    0,1);

    $pdf->Ln(5);

    // Table Header
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(40,10,'Medicine',1);
    $pdf->Cell(30,10,'Dose',1);
    $pdf->Cell(30,10,'Qty',1);
    $pdf->Cell(40,10,'Price',1);
    $pdf->Cell(40,10,'Total',1);

    $pdf->Ln();

    $total_amount = 0;

    $pdf->SetFont('Arial','',12);

    // Database Data
    $result = mysqli_query($conn,
    "SELECT * FROM medicines LIMIT 5");

    while($row = mysqli_fetch_assoc($result)){

        $name  = $row['name'];
        $dose  = "500mg";
        $qty   = 1;
        $price = $row['price'];

        $total = $qty * $price;

        $total_amount += $total;

        $pdf->Cell(40,10,$name,1);
        $pdf->Cell(30,10,$dose,1);
        $pdf->Cell(30,10,$qty,1);
        $pdf->Cell(40,10,'Rs. '.$price,1);
        $pdf->Cell(40,10,'Rs. '.$total,1);

        $pdf->Ln();
    }

    // Grand Total
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',14);

    $pdf->Cell(0,10,
    'Grand Total: Rs. '.$total_amount,
    0,1,'R');

    $pdf->Output();

    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Generate Bill</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#667eea,#764ba2);
}

.box{
    width:400px;
    margin:120px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    text-align:center;
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

<!-- Bill Box -->
<div class="box">

<h3>🧾 Generate Bill</h3>

<p>Click below to generate PDF bill</p>

<form method="POST">

<button name="generate"
class="btn btn-warning w-100">

📄 Generate PDF Bill

</button>

</form>

<br>

<?php if($role == "admin"){ ?>

<a href="admin_dashboard.php"
class="btn btn-secondary w-100">

⬅ Back to Admin Dashboard

</a>

<?php } else { ?>

<a href="user_dashboard.php"
class="btn btn-secondary w-100">

⬅ Back to User Dashboard

</a>

<?php } ?>

</div>

</body>
</html>