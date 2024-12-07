<?php
$server = "127.0.0.1";
$username = "Alexa";  
$password = "qwe123";  
$database = "votingsystem";
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Error 69: Could not connect to database! " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['LastName'];
    $voterAddress = $_POST['voterAddress'];
    $voterCity = $_POST['voterCity'];
    $voterBarangay = $_POST['voterBarangay'];
    $voterAge = $_POST['voterAge']; 
    $voterBirthday = $_POST['voterBirthday'];
    $voterGender = $_POST['voterGender'];
    $voterStatus = $_POST['voterStatus'];
    $voterPhoneNumber = $_POST['voterPhoneNumber'];
    $voterEmail = $_POST['voterEmail'];
    $voterPassword = password_hash($_POST['voterPassword'], PASSWORD_BCRYPT); 

   
    $insertVoterQuery = "INSERT INTO Voters (FirstName, LastName) VALUES ('$firstName', '$lastName')";
    if (!$conn->query($insertVoterQuery)) {
        die("Error inserting into Voters table: " . $conn->error);
    }
    $voterID = $conn->insert_id; 

 
    $insertContactQuery = "INSERT INTO VoterContacts (VoterID, EmailAddress, PhoneNumber) 
                           VALUES ('$voterID', '$voterEmail', '$voterPhoneNumber')";
    if (!$conn->query($insertContactQuery)) {
        die("Error inserting into VoterContacts table: " . $conn->error);
    }

  
    $insertAddressQuery = "INSERT INTO VoterAddress (VoterID, PermanentAddress, City, Barangay) 
                           VALUES ('$voterID', '$voterAddress', '$voterCity', '$voterBarangay')";
    if (!$conn->query($insertAddressQuery)) {
        die("Error inserting into VoterAddress table: " . $conn->error);
    }

    
    $insertBiodataQuery = "INSERT INTO VoterBiodata (VoterID, Age, Birthdate, Gender, CivilStatus) 
                           VALUES ('$voterID', '$voterAge', '$voterBirthday', '$voterGender', '$voterStatus')";
    if (!$conn->query($insertBiodataQuery)) {
        die("Error inserting into VoterBiodata table: " . $conn->error);
    }

    
    $insertCredentialsQuery = "INSERT INTO VoterCredentials (VoterID, Password) 
                               VALUES ('$voterID', '$voterPassword')";
    if (!$conn->query($insertCredentialsQuery)) {
        die("Error inserting into VoterCredentials table: " . $conn->error);
    }

    echo "Voter information has been successfully uploaded!";
}

$conn->close();
?>
