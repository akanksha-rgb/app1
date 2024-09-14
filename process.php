<?php
// Database connection (make sure to replace with actual connection details)
$conn = new mysqli("localhost", "root", "yes", "billing");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRecord'])) {
    $sr_no = $_POST['srno'];
    $month = $_POST['month'];
    $vendor_name = $_POST['vendorName'];
    $cab_no = $_POST['cabNo'];
    $vehicle_type = $_POST['vehicleType'];
    $working_days = $_POST['workingDays'];
    $app_reg_trips = $_POST['appRegTrips'];
    $total_amount = $_POST['totalAmount'];
    $fine = $_POST['fine'];
    $diesel = $_POST['diesel'];
    $tds = $_POST['tds'];
    $net_pay_amount = $_POST['netPayAmount'];

    $stmt = $conn->prepare("INSERT INTO billing_data (sr_no, month, vendor_name, cab_no, vehicle_type, working_days, app_reg_trips, total_amount, fine, diesel, tds, net_pay_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssdddd', $sr_no, $month, $vendor_name, $cab_no, $vehicle_type, $working_days, $app_reg_trips, $total_amount, $fine, $diesel, $tds, $net_pay_amount);

    if ($stmt->execute()) {
        echo "<p>Record added successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
