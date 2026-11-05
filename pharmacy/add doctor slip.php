<?php
include("connection.php");

$msg="";

if(isset($_POST['submit'])){
    $patient=$_POST['patient'];
    $doctor=$_POST['doctor'];
    $medicine=$_POST['medicine'];
    $dosage=$_POST['dosage'];
    $date=$_POST['date'];

    mysqli_query($conn,"INSERT INTO doctor_slip
    (patient_name,doctor_name,medicine,dosage,date)
    VALUES('$patient','$doctor','$medicine','$dosage','$date')");

    $msg="✅ Slip Added Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Doctor Slip</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{background:linear-gradient(135deg,#00c6ff,#0072ff);}
.box{width:400px;margin:100px auto;background:white;padding:25px;border-radius:15px;}
</style>

</head>

<body>

<div class="box">
<h3 class="text-center">📝 Add Doctor Slip</h3>

<?php if($msg!=""){ ?>
<div class="alert alert-success"><?php echo $msg; ?></div>
<?php } ?>

<form method="POST">

<input type="text" name="patient" class="form-control mb-2" placeholder="Patient Name" required>

<input type="text" name="doctor" class="form-control mb-2" placeholder="Doctor Name" required>

<input type="text" name="medicine" class="form-control mb-2" placeholder="Medicine" required>

<input type="text" name="dosage" class="form-control mb-2" placeholder="Dosage" required>

<input type="date" name="date" class="form-control mb-2" required>

<button name="submit" class="btn btn-primary w-100">Add Slip</button>

</form>

<br>

<a href="view_doctor_slip.php" class="btn btn-success w-100">📋 View Slip</a>

</div>

</body>
</html>