<?php
session_start();

$servername = "127.0.0.1";
$username = "Alexa";         
$password = "qwe123";
$dbname = "votingsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['voterID'], $_POST['password'])) {
        $voterID = $_POST['voterID'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM votercredentials WHERE voterID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $voterID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

                echo "You have successfully logged in!
                Please wait while we redirect you to the homepage.... ";
                echo '
                    <script>
                        setTimeout(function() {
                            window.location.href = "http://localhost/CC14-VotingSystem-FINALS-main/Voting.html";
                        }, 3000); // Redirect after 3 seconds
                    </script>
                ';
                exit();
            } else {
                echo "Invalid voter ID or password!";
            }
        } else {
            echo "Invalid voter ID or password!";
        }
    } else {
        echo "Both voter ID and password are required!";
    }
?>
