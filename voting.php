<?php
$server = "127.0.0.1";
$username = "Alexa";
$password = "qwe123";
$database = "votingsystem";

// Create a new MySQLi connection
$conn = new mysqli($server, $username, $password, $database);

// Check for a connection error
if ($conn->connect_error) {
    die("Error 69: Could not connect to database! " . $conn->connect_error);
}

// SQL query to select candidateID and concatenate FirstName and LastName from nominee table
$sql = "SELECT c.candidateID, CONCAT(IFNULL(n.FirstName, ''), ' ', IFNULL(n.LastName, '')) AS NomineeName
        FROM candidate c
        JOIN nominee n ON c.NomineeID = n.NomineeID";

// Execute the query
$result = $conn->query($sql);

$candidates = [];

// Check if the query returned any results
if ($result && $result->num_rows > 0) {
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $candidates[] = $row;
    }
    // Output the results as a JSON-encoded array
    echo json_encode(['success' => true, 'candidates' => $candidates]);
} else {
    // Output an error message if no candidates were found
    echo json_encode(['success' => false, 'message' => 'No candidates found.']);
}

// Close the database connection
$conn->close();
?>
