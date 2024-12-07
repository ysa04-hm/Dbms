<?php

$servername = "127.0.0.1";
$username = "Alexa";
$password = "qwe123";
$dbname = "votingsystem";  

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get values from the form directly
    $nominee_id = $_POST['nominee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $status = $_POST['status'];
    $city = $_POST['city'];

   
    if (!empty($first_name)) {
        $sql_update_nominee = "UPDATE Nominee SET FirstName = '$first_name' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_nominee);
    }

    if (!empty($last_name)) {
        $sql_update_nominee = "UPDATE Nominee SET LastName = '$last_name' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_nominee);
    }

  
    if (!empty($age)) {
        $sql_update_biodata = "UPDATE NomineeBioData SET Age = '$age' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($gender)) {
        $sql_update_biodata = "UPDATE NomineeBioData SET Gender = '$gender' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($birthdate)) {
        $sql_update_biodata = "UPDATE NomineeBioData SET Birthdate = '$birthdate' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($status)) {
        $sql_update_biodata = "UPDATE NomineeBioData SET CivilStatus = '$status' WHERE NomineeID = $nominee_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    echo "<p>Nominee information updated successfully!</p>";
}

mysqli_close($conn);
?>
