<?php

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="VotingSystem.css">
    </head>

    <body>
        <script src="VotingSystem.js"> </script>
        <div class="external-containers">
            <div class="external-sidebar">
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
            </div>
            <div class="external-topbar">
                <div class="external-topbar-intro">
                    <div class="external-topbar-contents">
                        <h3> ELECTION ADMINISTRATIVE SYSTEM </h3>
                        <button onclick="mutateToVoters()"> Voters </button>
                        <button onclick="mutateToNominees()"> Nominees </button>
                        <button onclick="mutateToCandidates()"> Candidates </button>
                    </div>
                </div>
                
                <div class="inner-content">
                    <div class="inner-grid-one">
                        <!-- MUTATING FORM DO NOT TOUCH >:( -->
                        <div class="mutatingForm-BoxModel">                
                            <div class="formShifter">
                               Welcome Administrator!
                            </div>
                        </div>
                    </div>

                    <div class="inner-grid-two">
                        <?php include 'analytics.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>