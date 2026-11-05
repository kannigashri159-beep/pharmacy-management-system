<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>View Sales</title>

<style>
body {
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    font-family: Arial, sans-serif;
}

/* Container center */
.container {
    width: 80%;
    margin: 50px auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    text-align: center;
}

/* Table center */
table {
    margin: 20px auto;
    border-collapse: collapse;
    width: 90%;
}

/* Table style */
th {
    background: #ff6f61;
    color: white;
    padding: 12px;
}

td {
    padding: 10px;
    text-align: center;
}

tr:nth-child(even) {
    background: #f2f2f2;
}

tr:hover {
    background: #ffe0dc;
}
</style>

</head>

<body>

<div class="container">
    <h2>Sales History</h2>

    <table border="1">
        <tr>
            <th>Bill No</th>
            <th>Medicine</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
        </tr>

        <?php
        $res = mysqli_query($conn, "SELECT * FROM sales");

        while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?= $row['bill_no'] ?></td>
            <td><?= $row['medicine_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['total'] ?></td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>