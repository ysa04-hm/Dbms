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
    $NomineeID = $_POST['NomineeID']; 
    
    $confirmCandidate = "INSERT INTO Candidate(NomineeID) VALUES ('$NomineeID')";
    $conn->query($confirmCandidate);

    echo "Candidate Successfully Inserted!";
}

?>