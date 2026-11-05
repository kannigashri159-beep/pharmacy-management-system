<?php
include("connection.php");

if(isset($_POST['register'])){

    $u = $_POST['username'];
    $p = $_POST['password'];

    mysqli_query($conn,"
        INSERT INTO users (username, password, role)
        VALUES ('$u','$p','user')
    ");

    echo "<script>alert('User Registered Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial;
    background: linear-gradient(to right,#56ab2f,#a8e063);
}

.box{
    background:white;
    padding:30px;
    border-radius:15px;
    width:300px;
    text-align:center;
    box-shadow:0px 0px 15px rgba(0,0,0,0.3);
}

input{
    width:90%;
    padding:10px;
    margin:10px 0;
}

button{
    background:green;
    color:white;
    padding:10px;
    border:none;
    border-radius:8px;
    width:100%;
}
</style>
</head>

<body>

<div class="box">

<h2>👤 User Register</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button name="register">Register</button>

</form>

<p>Already user? <a href="login.php">Login</a></p>

</div>

</body>
</html>