<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $district = $_POST['district'];

    $sql = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district)
            VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$contact_number', '$district')";

    if ($conn->query($sql) === TRUE) {
        echo "Customer data inserted successfully";
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
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <h2>Customer Registration</h2>
    <form id="customerForm" method="post" action="">
        <div class="form-group">
            <label for="title">Title</label>
            <select class="form-control" id="title" name="title" required>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" id="district" name="district" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        // Basic form validation using JavaScript
        document.getElementById("customerForm").addEventListener("submit", function(event) {
            var phoneNumberRegex = /^\d{10}$/;
            var contactNumber = document.getElementById("contact_number").value;

            if (!phoneNumberRegex.test(contactNumber)) {
                alert("Please enter a valid 10-digit contact number");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>