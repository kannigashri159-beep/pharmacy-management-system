<?php
include("connection.php");
session_start();

if(isset($_POST['login'])){

    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = mysqli_query($conn,"
        SELECT * FROM users 
        WHERE username='$u' AND password='$p'
    ");

    if(mysqli_num_rows($sql)==1){

        $row = mysqli_fetch_assoc($sql);

        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Role based dashboard
        if($row['role']=="admin"){

            header("Location: admin_dashboard.php");

        } 
        else if($row['role']=="user"){

            header("Location: user_dashboard.php");

        }

    } else {

        echo "<script>alert('Invalid Login');</script>";

    }
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
    background: linear-gradient(135deg,#4facfe,#00f2fe,#43e97b);
}

.box{
    background:white;
    padding:30px;
    border-radius:15px;
    width:320px;
    text-align:center;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

input{
    width:90%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    width:100%;
    padding:10px;
    background:#0d6efd;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
</style>
</head>

<body>

<div class="box">

<h2>💊pharmacy Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br>

<input type="password" name="password" placeholder="Password" required><br>

<button name="login">Login</button>

</form>

<p>👤 New User? <a href="register.php">Register</a></p>

</div>

</body>
</html>