<?php
include "connection.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    $sql = "INSERT INTO medicines (name, price, quantity)
            VALUES ('$name','$price','$qty')";

    mysqli_query($conn, $sql);

    echo "<script>alert('Medicine Added');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>

/* 🌈 Background */
body{
    margin:0;
    font-family:Arial;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(to right, #00c6ff, #0072ff);
}

/* 🧾 Form Box */
form{
    background:white;
    padding:30px;
    border-radius:15px;
    width:300px;
    text-align:center;
    box-shadow:0px 0px 15px rgba(0,0,0,0.3);
}

/* Inputs */
input{
    width:90%;
    padding:8px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

/* Button Center */
button{
    background:#0072ff;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    margin-top:10px;
}

button:hover{
    background:#0051b3;
}

</style>
</head>

<body>

<form method="POST">
    <h2>💊 Add Medicine</h2>

    <input type="text" name="name" placeholder="Medicine Name" required><br>

    <input type="number" name="price" placeholder="Price" required><br>

    <input type="number" name="quantity" placeholder="Quantity" name="quantity" required><br>

    <button type="submit" name="submit">Add Medicine</button>
</form>

</body>
</html>