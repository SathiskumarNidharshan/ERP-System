<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    $sql = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price)
            VALUES ('$item_code', '$item_category', '$item_subcategory', '$item_name',  '$quantity', '$unit_price')";

    if ($conn->query($sql) === TRUE) {
        echo "Item details inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <h2>Item Registration</h2>
    <form id="itemForm" method="post" action="">
        <div class="form-group">
            <label for="item_code">Item Code</label>
            <input type="text" class="form-control" id="item_code" name="item_code" required>
        </div>
        <div class="form-group">
            <label for="item_category">Item Category</label>
            <select class="form-control" id="item_category" name="item_category" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="item_subcategory">Item Sub Category</label>
            <select class="form-control" id="item_subcategory" name="item_subcategory" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="unit_price">Unit Price</label>
            <input type="text" class="form-control" id="unit_price" name="unit_price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        // Basic form validation using JavaScript
        document.getElementById("itemForm").addEventListener("submit", function(event) {
            // Add more specific validation as needed
            var quantity = document.getElementById("quantity").value;
            if (quantity <= 0) {
                alert("Quantity must be greater than 0");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>