<?php
$conn = mysqli_connect("localhost", "root", "", "pharmacy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM medicines";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock List</title>
    <style>
        body { font-family: Arial; }
        h2 { margin-left: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th {
            background-color: black;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>📦 Stock List</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Medicine Name</th>
        <th>Quantity</th>
        <th>Date</th>
    </tr>

<?php
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['expiry_date']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
?>

</table>

</body>
</html>