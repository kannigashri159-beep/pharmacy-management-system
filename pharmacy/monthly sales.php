<?php
include("connection.php");

// Monthly sales list
$list = mysqli_query($conn, "
    SELECT * 
    FROM sales
    WHERE MONTH(sale_date) = MONTH(CURDATE())
    AND YEAR(sale_date) = YEAR(CURDATE())
    ORDER BY sale_date DESC
");
?>

<h2>📊 Monthly Sales Report</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Bill No</th>
        <th>Medicine</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Date</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($list)) { ?>
    <tr>
        <td><?php echo $row['bill_no']; ?></td>
        <td><?php echo $row['medicine_name']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['total']; ?></td>
        <td><?php echo $row['sale_date']; ?></td>
    </tr>
    <?php } ?>
</table>