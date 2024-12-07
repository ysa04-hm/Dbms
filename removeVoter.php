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
    $VoterID = $_POST['VoterID'];

    $deleteVoter = "DELETE FROM Voters WHERE VoterID = '$VoterID'";

    if ($conn->query($deleteVoter) === TRUE) {
        echo "Voter with ID $VoterID has been successfully deleted!";
    } else {
        echo "Error deleting voter: " . $conn->error;
    }
}

$conn->close();

?>
