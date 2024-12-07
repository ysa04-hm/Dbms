//NO PHP ACTION YET

//EMPLOYEE FORMS
function queryForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class=idQuery>
        <form method="POST" action="queryVoter.php">
            <label> VOTER QUERYING SYSTEM </label>
            <input type="text" name="voterID" placeholder="Query By ID: ">
            <input type="text" name="firstName" placeholder="First Name...">
            <input type="text" name="lastName" placeholder="Last Name...">
            <input type="text" name="email" placeholder="Email Address...">
            <input type="text" name="phone" placeholder="Phone Number...">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Query a voter here...
    `;
}


function createForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="createNew">
        <form id="registerData" method="POST" action="registerVoterInfo.php">
            <label> REGISTER A VOTER </label>
            <input type="text" name="firstName" placeholder="First Name: ">
            <input type="text" name="LastName" placeholder="Last Name: ">
            <input type="text" name="voterAddress" placeholder="Address: ">
            <input type="text" name="voterCity" placeholder="City: ">
            <input type="text" name="voterBarangay" placeholder="Barangay: ">
            <input type="text" name="voterAge" placeholder="Age: ">
            <input type="text" name="voterBirthday" placeholder="Birthday: ">
            <input type="text" name="voterGender" placeholder="Gender: ">
            <input type="text" name="voterStatus" placeholder="Status: ">
            <input type="text" name="voterPhoneNumber" placeholder="Phone Number: ">
            <input type="text" name="voterEmail" placeholder="Email: ">
            <input type="password" name="voterPassword" placeholder="Password: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Register a new voter here...
    `;
}

function modifyForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="modifyEmployee">
        <form method="POST" action="modifyVoterInfo.php">
            <label> MODIFY VOTER RECORDS </label>
            <input type="text" name="voter_id" placeholder="VOTER ID: ">
            <input type="text" name="first_name" placeholder="First Name: ">
            <input type="text" name="last_name" placeholder="Last Name: ">
            <input type="text" name="address" placeholder="Address: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="text" name="barangay" placeholder="Barangay: ">
            <input type="text" name="age" placeholder="Age: ">
            <input type="text" name="birthdate" placeholder="Birthday: ">
            <input type="text" name="gender" placeholder="Gender: ">
            <input type="text" name="status" placeholder="Status: ">
            <input type="text" name="phone" placeholder="Phone Number: ">
            <input type="text" name="email" placeholder="Email: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Modify existing voter's information here...
    `;
}

function terminateForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="terminateEmployee">
        <form method="POST" action="removeVoter.php">
            <label> TERMINATE EXISTING VOTER </label>
            <input type="text" name="VoterID" placeholder="VOTER ID:">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Purge an existing voter here...
    `;
}

//WRITE THE ONCLICKS HERE FOR THE MUTATED FORMS


















































































//---------------------------------------------------------------------//

//mutateToEmployees

function mutateToVoters(){
    const sideBar = document.querySelector('.external-sidebar');

    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> VOTERS <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="queryForm()"> Query </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="createForm()"> Register </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="modifyForm()"> Modify </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="terminateForm()"> Purge </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for voters...
    `;
}























//mutateToDepartments

function mutateToCandidates(){
    const sideBar = document.querySelector('.external-sidebar');
    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> CANDIDATES <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="exploreForm()"> View </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="buildForm()"> Confirm </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="reworkForm()"> Update </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="dissolveForm()"> Disqualify </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for candidates...
    `;
}



// DEPARTMENT FORMS - findme

function exploreForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="exploreDepartment">
        <form method="POST" action="queryCandidate.php">
            <label> SEARCH A CANDIDATE </label>
            <input type="text" name="candidate_id" placeholder="CANDIDATE ID: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Query a candidate here...
    `;
}

function buildForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="buildDepartment">
        <form method="POST" action="confirmCandidate.php" >
            <label> CONFIRM CANDIDATE FROM NOMINEES </label>
            <input type="text" name="NomineeID" placeholder="Nominee ID: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Confirm a new candidate here...
    `;
}

function reworkForm(){
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="reviseProject">
        <form method="POST" action="modifyCandidateInfo.php">
            <label> UPDATE CANDIDATE DATA </label>
            <input type="text" name="candidateID" placeholder="CANDIDATE ID: ">
            <input type="text" name="firstName" placeholder="First Name: ">
            <input type="text" name="lastName" placeholder="Last Name: ">
            <input type="text" name="age" placeholder="Age: ">
            <input type="text" name="gender" placeholder="Gender: ">
            <input type="text" name="birthdate" placeholder="Birthdate: ">
            <input type="text" name="civilStatus" placeholder="Status: ">
            <input type="text" name="position" placeholder="Position: ">
            <input type="text" name="party" placeholder="Party: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Modify existing candidate here...
    `;

}

function dissolveForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="dissolveDepartment">
        <form method="POST" action="removeCandidate.php">
            <label> DISQUALIFY A CANDIDATE </label>
            <input type="text" name="candidateID" placeholder="CANDIDATE ID:">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Disqualify a candidate here...
    `;
}



































































function mutateToNominees(){
    const sideBar = document.querySelector('.external-sidebar');
    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> NOMINEES <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="showForm()"> View </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="createProjectForm()"> Add </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="reviseForm()"> Update </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="abandonForm()"> Disqualify </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for nominees...
    `;
}

function showForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="showProject">
        <form method="POST" action="queryNominee.php">
            <label> VIEW NOMINEES </label>
            <input type="text" name="nomineeID" placeholder="Nominee ID: ">
            <input type="text" name="firstName" placeholder="First Name: ">
            <input type="text" name="lastName" placeholder="Last Name: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Query a nominee here...
    `;
}

function createProjectForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="createProject">
        <form method="POST" action="registerNominee.php">
            <label> INSERT NOMINEE DATA </label>
            <input type="text" name="FirstName" placeholder="First Name: ">
            <input type="text" name="LastName" placeholder="Last Name: ">
            <input type="text" name="Age" placeholder="Age: ">
            <input type="text" name="Gender" placeholder="Gender: ">
            <input type="text" name="Birthdate" placeholder="Birthdate: ">
            <input type="text" name="CivilStatus" placeholder="Status: ">
            <input type="text" name="City" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Insert a new nominee here...
    `;
}

function reviseForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="reviseProject">
        <form method="POST" action="modifyNominee.php">
            <label> UPDATE NOMINEE DATA </label>
            <input type="text" name="nominee_id" placeholder="NOMINEE ID: ">
            <input type="text" name="first_name" placeholder="First Name: ">
            <input type="text" name="last_name" placeholder="Last Name: ">
            <input type="text" name="age" placeholder="Age: ">
            <input type="text" name="gender" placeholder="Gender: ">
            <input type="text" name="birthdate" placeholder="Birthdate: ">
            <input type="text" name="status" placeholder="Status: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Modify existing nominee details here...
    `;
}

function abandonForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="abandonProject">
        <form method="POST" action="removeNominee.php">
            <label> DISQUALIFY EXISTING NOMINEE </label>
            <input type="text" name="nomineeID" placeholder="NOMINEE ID:">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Disqualify a nominee here...
    `;
}























































































//---------------------------------------------------------------------//

//mutateToEmployees

function mutateToVoters(){
    const sideBar = document.querySelector('.external-sidebar');

    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> VOTERS <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="queryForm()"> Query </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="createForm()"> Register </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="modifyForm()"> Modify </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="terminateForm()"> Purge </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for voters...
    `;
}























//mutateToDepartments

function mutateToCandidates(){
    const sideBar = document.querySelector('.external-sidebar');
    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> CANDIDATES <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="exploreForm()"> View </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="buildForm()"> Confirm </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="reworkForm()"> Update </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="dissolveForm()"> Disqualify </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for candidates...
    `;
}



// DEPARTMENT FORMS - findme

function exploreForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="exploreDepartment">
        <form method="POST" action="queryCandidate.php">
            <label> SEARCH A CANDIDATE </label>
            <input type="text" name="candidate_id" placeholder="CANDIDATE ID: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Query a candidate here...
    `;
}

function buildForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="buildDepartment">
        <form method="POST" action="confirmCandidate.php" >
            <label> CONFIRM CANDIDATE FROM NOMINEES </label>
            <input type="text" name="NomineeID" placeholder="Nominee ID: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Confirm a new candidate here...
    `;
}

function reworkForm(){
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="reviseProject">
        <form method="POST" action="modifyCandidateInfo.php">
            <label> UPDATE CANDIDATE DATA </label>
            <input type="text" name="candidateID" placeholder="CANDIDATE ID: ">
            <input type="text" name="firstName" placeholder="First Name: ">
            <input type="text" name="lastName" placeholder="Last Name: ">
            <input type="text" name="age" placeholder="Age: ">
            <input type="text" name="gender" placeholder="Gender: ">
            <input type="text" name="birthdate" placeholder="Birthdate: ">
            <input type="text" name="civilStatus" placeholder="Status: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Modify existing candidate here...
    `;

}

function dissolveForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="dissolveDepartment">
        <form method="POST" action="removeCandidate.php">
            <label> DISQUALIFY A CANDIDATE </label>
            <input type="text" name="candidateID" placeholder="CANDIDATE ID:">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Disqualify a candidate here...
    `;
}



































































function mutateToNominees(){
    const sideBar = document.querySelector('.external-sidebar');
    sideBar.innerHTML = `
        <div class="external-sidebar-projname">
            <h2> NOMINEES <h2>
        </div>

        <div class="external-sidebar-button">
            <button onclick="showForm()"> View </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="createProjectForm()"> Add </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="reviseForm()"> Update </button>
        </div>

        <div class="external-sidebar-button">
            <button onclick="abandonForm()"> Disqualify </button>
        </div>
    `;

    const welcome = document.querySelector('.formShifter');

    welcome.innerHTML = `
        Welcome Administrator!
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Select any available fields for nominees...
    `;
}

function showForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="showProject">
        <form method="POST" action="queryNominee.php">
            <label> VIEW NOMINEES </label>
            <input type="text" name="nomineeID" placeholder="Nominee ID: ">
            <input type="text" name="firstName" placeholder="First Name: ">
            <input type="text" name="lastName" placeholder="Last Name: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Query a nominee here...
    `;
}

function createProjectForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="createProject">
        <form method="POST" action="registerNominee.php">
            <label> INSERT NOMINEE DATA </label>
            <input type="text" name="FirstName" placeholder="First Name: ">
            <input type="text" name="LastName" placeholder="Last Name: ">
            <input type="text" name="Age" placeholder="Age: ">
            <input type="text" name="Gender" placeholder="Gender: ">
            <input type="text" name="Birthdate" placeholder="Birthdate: ">
            <input type="text" name="CivilStatus" placeholder="Status: ">
            <input type="text" name="City" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Insert a new nominee here...
    `;
}

function reviseForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="reviseProject">
        <form method="POST" action="modifyNominee.php">
            <label> UPDATE NOMINEE DATA </label>
            <input type="text" name="nominee_id" placeholder="NOMINEE ID: ">
            <input type="text" name="first_name" placeholder="First Name: ">
            <input type="text" name="last_name" placeholder="Last Name: ">
            <input type="text" name="age" placeholder="Age: ">
            <input type="text" name="gender" placeholder="Gender: ">
            <input type="text" name="birthdate" placeholder="Birthdate: ">
            <input type="text" name="status" placeholder="Status: ">
            <input type="text" name="city" placeholder="City: ">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Modify existing nominee details here...
    `;
}

function abandonForm() {
    const div = document.querySelector('.formShifter');
    div.innerHTML = `
    <div class="abandonProject">
        <form method="POST" action="removeNominee.php">
            <label> DISQUALIFY EXISTING NOMINEE </label>
            <input type="text" name="nomineeID" placeholder="NOMINEE ID:">
            <input type="submit" id="buttonCursor">
        </form>
    </div>
    `;

    const results = document.querySelector('.inner-grid-two');
    results.innerHTML = `
        Disqualify a nominee here...
    `;
}





