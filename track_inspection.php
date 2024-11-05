<?php
// Database connection settings
$host = 'localhost';
$dbname = 'ignis_secure';
$user = 'root';
$pass = '';

try {
    // Establish a new database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $business_name = htmlspecialchars($_GET['business_name']);

        // Fetch the status of the inspection
        $sql = "SELECT * FROM inspections WHERE business_name = :business_name";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':business_name', $business_name);
        $stmt->execute();

        // Fetch and display the inspection details
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "<h3>Inspection Status for " . htmlspecialchars($result['business_name']) . ":</h3>";
            echo "Owner Name: " . htmlspecialchars($result['owner_name']) . "<br>";
            echo "Location: " . htmlspecialchars($result['location']) . "<br>";
            echo "Preferred Inspection Date: " . htmlspecialchars($result['inspection_date']) . "<br>";
            echo "Status: " . htmlspecialchars($result['status']) . "<br>";
        } else {
            echo "No inspection found for this business name.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>
