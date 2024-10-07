<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "SELECT * FROM invoice
            WHERE date BETWEEN '$start_date' AND '$end_date'";

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <h2>Invoice Report</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php
    if (isset($result) && $result->num_rows > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date</th>
                        <th>Customer</th>
                       
                        <th>Item Count</th>
                        <th>Invoice Amount</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            // Display rows based on query results
            echo "<tr>
                    <td>" . $row["invoice_no"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>" . $row["customer"] . "</td>
                   
                    <td>" . $row["item_count"] . "</td>
                    <td>" . $row["amount"] . "</td>
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