<?php
include "connection.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM medicines WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    $sql = "UPDATE medicine SET 
            name='$name', price='$price', quantity='$qty'
            WHERE id=$id";

    mysqli_query($conn, $sql);

    header("Location: view_medicine.php");
}
?>

<form method="POST">
    <h2>Edit Medicine</h2>

    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    <input type="number" name="price" value="<?php echo $row['price']; ?>"><br><br>
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br><br>

    <button name="update">Update</button>
</form>