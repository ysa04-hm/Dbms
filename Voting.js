f// Function to create the voting form
function createForm1() {
    const div = document.querySelector('.formShifter');
    fetchCandidates();

    // Fetch candidates and populate the dropdown
    function fetchCandidates() {
        fetch('voting.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let formHTML = `
                    <div class="votingForm">
                        <h3 class="form-title">Voting Panel</h3>
                        <form method="POST" action="submitVote.php" class="form-container">
                            <div class="form-group">
                                <label for="voterID" class="form-label">Voter's ID:</label>
                                <input type="text" name="voterID" id="voterID" placeholder="Enter Voter's ID" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="candidate" class="form-label">Select Candidate:</label>
                                <select name="candidateID" id="candidate" class="form-input" required>
                                    <option value="" disabled selected>--Select Candidate--</option>`;

                    // Iterate over the candidates and add them to the dropdown
                    data.candidates.forEach(candidate => {
                        const nomineeName = candidate.NomineeName; // Use NomineeName here
                        formHTML += `<option value="${candidate.candidateID}">${candidate.candidateID}: ${nomineeName}</option>`;
                    });

                    // Closing the select tag and adding the submit button
                    formHTML += `
                                </select>
                            </div>
                            <button type="submit" class="btn-submit">Submit Vote</button>
                        </form>
                    </div>`;
                    div.innerHTML = formHTML;
                } else {
                    div.innerHTML = `<p class="error-message">No candidates found!</p>`;
                }
            })
            .catch(error => {
                console.error("Error fetching candidates:", error);
                div.innerHTML = `<p class="error-message">Failed to load candidates.</p>`;
            });
    }
}

// Function to create the results form
function createForm3() {
    const div = document.querySelector('.formShifter');
    fetch('getResults.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let formHTML = `
                <div class="resultsForm">
                    <h3 class="form-title">Election Results</h3>
                    <div class="form-container">
                        <div class="form-group">
                            <label class="form-label">Current Rankings:</label>
                            <ul class="resultsList">`;

                data.data.forEach(candidate => {
                    formHTML += `<li class="results-item">
                        (${candidate.candidateID}): ${candidate.nomineeName} : ${candidate.votes} votes
                    </li>`;
                });

                formHTML += `
                            </ul>
                        </div>
                        <button type="button" class="btn-close" onclick="closeForm()">Close</button>
                    </div>
                </div>`;
                div.innerHTML = formHTML;
            } else {
                div.innerHTML = `<p class="error-message">Failed to fetch results.</p>`;
            }
        })
        .catch(error => {
            console.error("Error fetching results:", error);
            div.innerHTML = `<p class="error-message">Failed to load results.</p>`;
        });
}

// Function to close the form and clear the content
function closeForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = '';
}

