
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

        // Handle form submission with JavaScript to prevent page reload
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent page reload

            // Simulate form submission (you can replace this with your AJAX code)
            const formData = new FormData(form);
            
            // Example of how you might send form data to a server without reloading
            fetch('validateVoter.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Handle successful login (e.g., redirect or show success message)
                    alert('Login successful!');
                } else {
                    // Handle login failure (e.g., show error message)
                    alert('Login failed! Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    } else {
        console.error('Target element not found!');
    }
}

