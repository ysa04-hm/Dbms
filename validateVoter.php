<?php
session_start();
header('Content-Type: application/json');
error_reporting(0);

$servername = "127.0.0.1";
$username = "Alexa";         
$password = "qwe123";
$dbname = "votingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['voterID'], $_POST['password'])) { // Corrected key names
        $voterID = $_POST['voterID'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM votercredentials WHERE voterID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $voterID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password against the hash stored in the database
            if (password_verify($password, $row['Password'])) {
                // If password matches, return success and the redirect URL
                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => 'http://localhost/CC14-VotingSystem-FINALS-main/Voting.html'
                ]);
            } else {
                // If password does not match, return failure
                echo json_encode(['success' => false, 'message' => 'Invalid voter ID or password!']);
            }
        } else {
            // If voter ID does not exist, return failure
            echo json_encode(['success' => false, 'message' => 'Invalid voter ID or password!']);
        }
    } else {
        // If voter ID or password is missing, return error
        echo json_encode(['success' => false, 'message' => 'Both voter ID and password are required!']);
    }
} else {
    // If the request method is not POST, return an error
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
