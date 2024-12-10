function createForm1() {
    const loginButton = document.getElementById('loginButton');
    const div = document.querySelector('.formShifter');

    if (loginButton && div) {
        div.innerHTML = `
        <div class="loginForm">
            <form method="POST" action="validateVoter.php" id="loginForm">
                <label><strong>LOGIN PANEL</strong></label>
                <div class="form-group">
                    <input type="number" name="voterID" placeholder="Voter's ID" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" id="buttonCursor" class="btn-login">Login</button>
            </form>
        </div>
        `;

        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent page reload

            const formData = new FormData(form);
            
            fetch('validateVoter.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Ensure that you parse the response as JSON
            .then(data => {
                if (data.success) {
                    // Redirect to the URL received in the JSON response
                    window.location.href = data.redirect; // This will handle the redirection
                } else {
                    // Handle failure - show error message
                    alert(data.message); // Display the message from the response
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    }
}
