<?php
// Database connection (make sure to replace with actual connection details)
$conn = new mysqli("localhost", "root", "yes", "billing");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchResults = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchVendor = $_POST['searchVendor'];
    $searchMonth = $_POST['searchMonth'];
    $searchCab = $_POST['searchCab'];

    $query = "SELECT * FROM billing_data WHERE 1=1";

    if (!empty($searchVendor)) {
        $query .= " AND vendor_name LIKE '%$searchVendor%'";
    }
    if (!empty($searchMonth)) {
        $query .= " AND month = '$searchMonth'";
    }
    if (!empty($searchCab)) {
        $query .= " AND cab_no = '$

         // Prepare and execute the query
    if ($stmt = $conn->prepare($query)) {
        // Dynamically bind parameters
        if (!empty($params)) {
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();

        // Display search results (moved to search_results.php)
        include 'search_results.php';

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the SQL statement.";
    }
}
?>
