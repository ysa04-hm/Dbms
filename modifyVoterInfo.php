<?php

$servername = "127.0.0.1";
$username = "Alexa";  
$password = "qwe123";  
$dbname = "votingsystem";  

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['voter_id'])) {
    $voter_id = $_POST['voter_id'];

  
    $sql = "SELECT * FROM Voters
            LEFT JOIN VoterContacts ON Voters.VoterID = VoterContacts.VoterID
            LEFT JOIN VoterAddress ON Voters.VoterID = VoterAddress.VoterID
            LEFT JOIN VoterBiodata ON Voters.VoterID = VoterBiodata.VoterID
            WHERE Voters.VoterID = $voter_id";
    
    $result = mysqli_query($conn, $sql);
    $voter = mysqli_fetch_assoc($result);

   
    if ($voter) {
        $first_name = $voter['FirstName'];
        $last_name = $voter['LastName'];
        $address = $voter['PermanentAddress'];
        $city = $voter['City'];
        $barangay = $voter['Barangay'];
        $age = $voter['Age'];
        $birthdate = $voter['Birthdate'];
        $gender = $voter['Gender'];
        $status = $voter['CivilStatus'];
        $phone = $voter['PhoneNumber'];
        $email = $voter['EmailAddress'];
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $voter_id = $_POST['voter_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

   
    if (!empty($first_name) && $first_name != $voter['FirstName']) {
        $sql_update_voter = "UPDATE Voters SET FirstName = '$first_name' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_voter);
    }

    if (!empty($last_name) && $last_name != $voter['LastName']) {
        $sql_update_voter = "UPDATE Voters SET LastName = '$last_name' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_voter);
    }

    if (!empty($email) && $email != $voter['EmailAddress']) {
        $sql_update_contact = "UPDATE VoterContacts SET EmailAddress = '$email' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_contact);
    }

    if (!empty($phone) && $phone != $voter['PhoneNumber']) {
        $sql_update_contact = "UPDATE VoterContacts SET PhoneNumber = '$phone' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_contact);
    }

    if (!empty($address) && $address != $voter['PermanentAddress']) {
        $sql_update_address = "UPDATE VoterAddress SET PermanentAddress = '$address' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_address);
    }

    if (!empty($city) && $city != $voter['City']) {
        $sql_update_address = "UPDATE VoterAddress SET City = '$city' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_address);
    }

    if (!empty($barangay) && $barangay != $voter['Barangay']) {
        $sql_update_address = "UPDATE VoterAddress SET Barangay = '$barangay' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_address);
    }

    if (!empty($age) && $age != $voter['Age']) {
        $sql_update_biodata = "UPDATE VoterBiodata SET Age = $age WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($birthdate) && $birthdate != $voter['Birthdate']) {
        $sql_update_biodata = "UPDATE VoterBiodata SET Birthdate = '$birthdate' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($gender) && $gender != $voter['Gender']) {
        $sql_update_biodata = "UPDATE VoterBiodata SET Gender = '$gender' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    if (!empty($status) && $status != $voter['CivilStatus']) {
        $sql_update_biodata = "UPDATE VoterBiodata SET CivilStatus = '$status' WHERE VoterID = $voter_id";
        mysqli_query($conn, $sql_update_biodata);
    }

    echo "<p>Voter information updated successfully!</p>";
}
?>