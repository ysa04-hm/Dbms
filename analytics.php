<?php
$servername = "127.0.0.1";  
$username = "Alexa";         
$password = "qwe123";         
$dbname = "votingsystem";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$votersQuery = "SELECT COUNT(*) AS total_voters FROM Voters";
$votersResult = $conn->query($votersQuery);

$nomineesQuery = "SELECT COUNT(*) AS total_nominees FROM Nominee";
$nomineesResult = $conn->query($nomineesQuery);

$candidatesQuery = "SELECT COUNT(*) AS total_candidates FROM Candidate";
$candidatesResult = $conn->query($candidatesQuery);

echo "<style>
        table {
            width: 300vh;
            height: 70vh; 
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #003366;
            color: white;
        }
        td {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>";

echo "<table>
        <tr>
            <th>Category</th>
            <th>Total</th>
        </tr>";

if ($votersResult->num_rows > 0) {
    $votersRow = $votersResult->fetch_assoc();
    echo "<tr>
            <td>Total Voters</td>
            <td>" . htmlspecialchars($votersRow['total_voters']) . "</td>
          </tr>";
} else {
    echo "No data found for voters.";
}

if ($nomineesResult->num_rows > 0) {
    $nomineesRow = $nomineesResult->fetch_assoc();
    echo "<tr>
            <td>Total Nominees</td>
            <td>" . htmlspecialchars($nomineesRow['total_nominees']) . "</td>
          </tr>";
} else {
    echo "No data found for nominees.";
}

if ($candidatesResult->num_rows > 0) {
    $candidatesRow = $candidatesResult->fetch_assoc();
    echo "<tr>
            <td>Total Candidates</td>
            <td>" . htmlspecialchars($candidatesRow['total_candidates']) . "</td>
          </tr>";
} else {
    echo "No data found for candidates.";
}

echo "</table>";

$conn->close();
?>  
