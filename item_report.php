<?php
include 'db.php';

$sql = "SELECT DISTINCT item_name, item_category, item_subcategory, SUM(quantity) as item_quantity
        FROM item
        GROUP BY item_name, item_category, item_subcategory";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <h2>Item Report</h2>

    <?php
    if (isset($result) && $result->num_rows > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Sub Category</th>
                        <th>Item Quantity</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            // Display rows based on query results
            echo "<tr>
                    <td>" . $row["item_name"] . "</td>
                    <td>" . $row["item_category"] . "</td>
                    <td>" . $row["item_subcategory"] . "</td>
                    <td>" . $row["item_quantity"] . "</td>
                 </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No records found</p>";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>