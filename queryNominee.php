<?php

$servername = "127.0.0.1";  
$username = "Alexa";  
$password = "qwe123";       
$dbname = "votingsystem";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomineeID = $_POST['nomineeID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $party = $_POST['party'];
    $city = $_POST['city'];

    // Start building the SQL query
    $sql = "SELECT n.NomineeID, n.FirstName, n.LastName, np.City
            FROM Nominee n
            LEFT JOIN NomineePosition np ON n.NomineeID = np.NomineeID
            WHERE 1=1";

    // Append filters based on user input
    if (!empty($nomineeID)) {
        $sql .= " AND n.NomineeID = '" . $conn->real_escape_string($nomineeID) . "'";
    }
    if (!empty($firstName)) {
        $sql .= " AND n.FirstName LIKE '%" . $conn->real_escape_string($firstName) . "%'";
    }
    if (!empty($lastName)) {
        $sql .= " AND n.LastName LIKE '%" . $conn->real_escape_string($lastName) . "%'";
    }
    if (!empty($city)) {
        $sql .= " AND np.City LIKE '%" . $conn->real_escape_string($city) . "%'";
    }

    // Execute the query
    $result = $conn->query($sql);

    // Display the results
    if ($result && $result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nominee ID</th><th>First Name</th><th>Last Name</th><th>City</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['NomineeID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['City']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }
}
?>
