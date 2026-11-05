<?php
include("connection.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pass = $_POST['password'];

    // check email already exists
    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($check) > 0){
        $error = "Email already registered!";
    } else {
        mysqli_query($conn,"INSERT INTO users(name,email,phone,address,password)
        VALUES('$name','$email','$phone','$address','$pass')");

        $success = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
body{
  margin:0;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  font-family:'Segoe UI';
  background:linear-gradient(135deg,#667eea,#764ba2);
}

.box{
  background:white;
  padding:35px;
  width:350px;
  border-radius:15px;
  box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h2{
  text-align:center;
  margin-bottom:20px;
}

.input-box{
  position:relative;
  margin-bottom:15px;
}

.input-box input{
  width:100%;
  padding:12px 40px;
  border-radius:25px;
  border:1px solid #ccc;
}

.input-box i{
  position:absolute;
  left:12px;
  top:12px;
  color:#888;
}

button{
  width:100%;
  padding:12px;
  border:none;
  border-radius:25px;
  background:linear-gradient(45deg,#36d1dc,#5b86e5);
  color:white;
  font-size:16px;
  cursor:pointer;
}

.msg{
  text-align:center;
  margin-bottom:10px;
}

.error{color:red;}
.success{color:green;}

</style>
</head>

<body>

<div class="box">

<h2>Register</h2>

<?php 
if(isset($error)) echo "<div class='msg error'>$error</div>";
if(isset($success)) echo "<div class='msg success'>$success</div>";
?>

<form method="post">

<div class="input-box">
  <i class="fa fa-user"></i>
  <input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="input-box">
  <i class="fa fa-envelope"></i>
  <input type="email" name="email" placeholder="Email" required>
</div>

<div class="input-box">
  <i class="fa fa-phone"></i>
  <input type="text" name="phone" placeholder="Phone Number" required>
</div>

<div class="input-box">
  <i class="fa fa-map-marker"></i>
  <input type="text" name="address" placeholder="Address" required>
</div>

<div class="input-box">
  <i class="fa fa-lock"></i>
  <input type="password" name="password" placeholder="Password" required>
</div>

<button name="register">Register</button>

</form>

</div>

</body>
</html>