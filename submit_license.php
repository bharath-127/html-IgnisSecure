<?php
// Database connection settings
$host = 'localhost';    // Database host (e.g., localhost)
$dbname = 'ignis_secure2';  // Database name
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

        // File upload handling
        $fire_certificate = $_FILES['fire_certificate'];
        $noc_document = $_FILES['noc_document'];

        // File upload directory
        $uploadDir = 'uploads/';

        // Ensure the upload directory exists, if not, create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move uploaded files to the target directory
        $fire_certificate_path = $uploadDir . basename($fire_certificate['name']);
        $noc_document_path = $uploadDir . basename($noc_document['name']);

        if (move_uploaded_file($fire_certificate['tmp_name'], $fire_certificate_path) &&
            move_uploaded_file($noc_document['tmp_name'], $noc_document_path)) {
            
            // Prepare SQL query to insert form data into the licenses table
            $sql = "INSERT INTO licenses (business_name, owner_name, location, fire_certificate_path, noc_document_path, status)
                    VALUES (:business_name, :owner_name, :location, :fire_certificate_path, :noc_document_path, 'Pending')";

            // Prepare and bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':business_name', $business_name);
            $stmt->bindParam(':owner_name', $owner_name);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':fire_certificate_path', $fire_certificate_path);
            $stmt->bindParam(':noc_document_path', $noc_document_path);

            // Execute the query and check if it was successful
            if ($stmt->execute()) {
                header("Location: diwali.html");;
            } else {
                echo "Failed to submit the license application. Please try again.";
            }
        } else {
            echo "Failed to upload files. Please try again.";
        }
    }
} catch (PDOException $e) {
    // If there is a database connection error, display the message
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
