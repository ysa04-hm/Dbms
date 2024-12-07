<?php
$server = "127.0.0.1";
$username = "Alexa";         
$password = "qwe123";
$database = "votingsystem";
$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Error: Could not connect to database! " . $conn->connect_error);
}

$voterID = isset($_POST['voterID']) ? $_POST['voterID'] : null;
$candidateID = isset($_POST['candidateID']) ? $_POST['candidateID'] : null;

if (isset($voterID) && isset($candidateID) && !empty($voterID) && !empty($candidateID)) {
    $checkVoterQuery = "SELECT Voted FROM voters WHERE VoterID = '$voterID'";
    $result = $conn->query($checkVoterQuery);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Voted'] == 1) {
            echo "You have already voted!";
            ?>
            <script>
                setTimeout(function() {
                    // Redirect after 3 seconds
                    window.location.href = "http://localhost/CC14-VotingSystem-FINALS-main/Voting.html";
                }, 3000);
            </script>
            <?php
            exit();
        } else {
            $updateVoteQuery = "UPDATE candidate SET Votes = Votes + 1 WHERE candidateID = '$candidateID'";
            if ($conn->query($updateVoteQuery) === TRUE) {
                $updateVoterQuery = "UPDATE voters SET LastVotedIn = NOW(), Voted = 1 WHERE VoterID = '$voterID'";
                $conn->query($updateVoterQuery);
                
                echo "Vote submitted successfully! Redirecting you to the homepage...";
                ?>
                <script>
                    setTimeout(function() {
                        // Redirect after 3 seconds
                        window.location.href = "http://localhost/CC14-VotingSystem-FINALS-main/Voting.html";
                    }, 3000);
                </script>
                <?php
                exit();  // Make sure no further code is executed after this
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Voter not found! Redirecting you to the homepage...";
        ?>
        <script>
            setTimeout(function() {
                // Redirect after 3 seconds
                window.location.href = "http://localhost/CC14-VotingSystem-FINALS-main/Voting.html";
            }, 3000);
        </script>
        <?php
        exit();
    }
} else {
    echo "Invalid input. Please make sure both the voter and candidate are selected. Redirecting you to the homepage...";
    ?>
    <script>
        setTimeout(function() {
            // Redirect after 3 seconds
            window.location.href = "http://localhost/CC14-VotingSystem-FINALS-main/Voting.html";
        }, 3000);
    </script>
    <?php
    exit();
}

$conn->close();
?>
