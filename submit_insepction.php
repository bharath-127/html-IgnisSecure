<?php
// Database connection settings
$host = 'localhost';    // Database host (e.g., localhost)
$dbname = 'ignis_secure';  // Database name
$user = 'root';          // Database username
$pass = '';              // Database password

try {
    // Establish a new database connection using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and collect form input data
        $business_name = htmlspecialchars($_POST['business_name']);
        $owner_name = htmlspecialchars($_POST['owner_name']);
        $location = htmlspecialchars($_POST['location']);
        $inspection_date = $_POST['inspection_date'];

        // Validate form data
        if (!empty($business_name) && !empty($owner_name) && !empty($location) && !empty($inspection_date)) {
            // Prepare SQL query to insert form data into the inspections table
            $sql = "INSERT INTO inspections (business_name, owner_name, location, inspection_date, status)
                    VALUES (:business_name, :owner_name, :location, :inspection_date, 'Pending')";

            // Prepare and bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':business_name', $business_name);
            $stmt->bindParam(':owner_name', $owner_name);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':inspection_date', $inspection_date);

            // Execute the query and check if it was successful
            if ($stmt->execute()) {
                header("Location: inspection.html");;
            } else {
                echo "Failed to submit the inspection request. Please try again.";
            }
        } else {
            echo "Please fill in all required fields.";
        }
    }
} catch (PDOException $e) {
    // If there is a database connection error, display the message
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
