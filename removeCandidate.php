<?php

$servername = "127.0.0.1";
$username = "Alexa";  
$password = "qwe123";  
$dbname = "votingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candidateID = $_POST['candidateID'];

    $deleteCandidate = "DELETE FROM candidate WHERE CandidateID = '$candidateID'";

    if ($conn->query($deleteCandidate) === TRUE) {
        echo "Candidate with ID $candidateID has been successfully deleted!";
    } else {
        echo "Error deleting nominee: " . $conn->error;
    }
}

$conn->close();

?>
