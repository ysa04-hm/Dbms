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
    $nomineeID = $_POST['nomineeID'];

    $deleteNominee = "DELETE FROM nominee WHERE NomineeID = '$nomineeID'";

    if ($conn->query($deleteNominee) === TRUE) {
        echo "Nominee with ID $nomineeID has been successfully deleted!";
    } else {
        echo "Error deleting nominee: " . $conn->error;
    }
}

$conn->close();

?>
