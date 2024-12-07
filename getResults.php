<?php
session_start();

header('Content-Type: application/json');

$servername = "127.0.0.1";
$username = "Alexa";         
$password = "qwe123";
$dbname = "votingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "
    SELECT c.candidateID, CONCAT(n.FirstName, ' ', n.LastName) AS NomineeName, c.Votes
    FROM candidate c
    JOIN nominee n ON c.NomineeID = n.NomineeID
    ORDER BY c.Votes DESC
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = [
            "candidateID" => $row['candidateID'],
            "nomineeName" => $row['NomineeName'],
            "votes" => (int)$row['Votes'] 
        ];
    }
    echo json_encode(["success" => true, "data" => $results], JSON_PRETTY_PRINT);
} else {
    echo json_encode(["success" => false, "message" => "No candidates found."]);
}

$conn->close();
?>
