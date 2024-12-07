<?php
$servername = "127.0.0.1";  
$username = "Alexa";  
$password = "qwe123";          
$dbname = "votingsystem";    

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['candidate_id'])) {
    $candidate_id = $_POST['candidate_id'];

    $sql = "SELECT n.FirstName, n.LastName, b.Age, b.Gender, b.Birthdate, b.CivilStatus, p.City, c.Votes, c.Elected
            FROM Candidate c
            JOIN Nominee n ON c.NomineeID = n.NomineeID
            JOIN NomineeBioData b ON n.NomineeID = b.NomineeID
            WHERE c.CandidateID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $candidate_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Civil Status</th>
                    <th>City</th>
                    <th>Votes</th>
                    <th>Elected</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['FirstName']) . "</td>
                    <td>" . htmlspecialchars($row['LastName']) . "</td>
                    <td>" . htmlspecialchars($row['Age']) . "</td>
                    <td>" . htmlspecialchars($row['Gender']) . "</td>
                    <td>" . htmlspecialchars($row['Birthdate']) . "</td>
                    <td>" . htmlspecialchars($row['CivilStatus']) . "</td>
                    <td>" . htmlspecialchars($row['City']) . "</td>
                    <td>" . htmlspecialchars($row['Votes']) . "</td>
                    <td>" . ($row['Elected'] ? 'Yes' : 'No') . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No candidate found with that ID.";
    }

    $stmt->close();
}

$conn->close();
?>
