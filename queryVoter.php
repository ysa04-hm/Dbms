<?php
$servername = "127.0.0.1";  
$username = "Alexa";  
$password = "qwe123";       
$dbname = "votingsystem";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$voterID = isset($_POST['voterID']) ? $_POST['voterID'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

$sql = "SELECT V.VoterID, V.FirstName, V.LastName, V.LastVotedIn, V.Voted, 
        C.EmailAddress, C.PhoneNumber, A.PermanentAddress, A.City, A.Barangay, 
        B.Age, B.Birthdate, B.Gender, B.CivilStatus, Cr.Password 
        FROM Voters V
        LEFT JOIN VoterContacts C ON V.VoterID = C.VoterID
        LEFT JOIN VoterAddress A ON V.VoterID = A.VoterID
        LEFT JOIN VoterBiodata B ON V.VoterID = B.VoterID
        LEFT JOIN VoterCredentials Cr ON V.VoterID = Cr.VoterID
        WHERE 1=1";  

if ($voterID) {
    $sql .= " AND V.VoterID = '$voterID'"; 
}
if ($firstName) {
    $sql .= " AND V.FirstName LIKE '%$firstName%'";  
}
if ($lastName) {
    $sql .= " AND V.LastName LIKE '%$lastName%'";  
}
if ($email) {
    $sql .= " AND C.EmailAddress LIKE '%$email%'";  
}
if ($phone) {
    $sql .= " AND C.PhoneNumber LIKE '%$phone%'";  
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Voter ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Last Voted</th>
                <th>Voted</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Permanent Address</th>
                <th>City</th>
                <th>Barangay</th>
                <th>Age</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>Password</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['VoterID']) . "</td>
                <td>" . htmlspecialchars($row['FirstName']) . "</td>
                <td>" . htmlspecialchars($row['LastName']) . "</td>
                <td>" . htmlspecialchars($row['LastVotedIn']) . "</td>
                <td>" . ($row['Voted'] ? 'Yes' : 'No') . "</td>
                <td>" . htmlspecialchars($row['EmailAddress']) . "</td>
                <td>" . htmlspecialchars($row['PhoneNumber']) . "</td>
                <td>" . htmlspecialchars($row['PermanentAddress']) . "</td>
                <td>" . htmlspecialchars($row['City']) . "</td>
                <td>" . htmlspecialchars($row['Barangay']) . "</td>
                <td>" . htmlspecialchars($row['Age']) . "</td>
                <td>" . htmlspecialchars($row['Birthdate']) . "</td>
                <td>" . htmlspecialchars($row['Gender']) . "</td>
                <td>" . htmlspecialchars($row['CivilStatus']) . "</td>
                <td>" . htmlspecialchars($row['Password']) . "</td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>
