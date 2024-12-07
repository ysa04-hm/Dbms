CREATE DATABASE VotingSystem;

USE VotingSystem;

CREATE TABLE Voters(
    VoterID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(150),
    LastName VARCHAR(150),
    LastVotedIn DATE,
    Voted BOOLEAN
);

CREATE TABLE VoterContacts(
    VoterID INT,
    EmailAddress VARCHAR(255),
    PhoneNumber VARCHAR(20),
    FOREIGN KEY (VoterID) REFERENCES Voters(VoterID) ON DELETE CASCADE
);

CREATE TABLE VoterAddress(
    VoterID INT,
    PermanentAddress VARCHAR(255),
    City VARCHAR(50),
    Barangay VARCHAR(50),
    FOREIGN KEY (VoterID) REFERENCES Voters(VoterID) ON DELETE CASCADE
);

CREATE TABLE VoterBiodata(
    VoterID INT,
    Age INT,
    Birthdate DATE,
    Gender VARCHAR(10),
    CivilStatus VARCHAR(50),
    FOREIGN KEY (VoterID) REFERENCES Voters(VoterID) ON DELETE CASCADE
);

CREATE TABLE VoterCredentials(
    VoterID INT,
    Password varchar(255),
    FOREIGN KEY (VoterID) REFERENCES Voters(VoterID) ON DELETE CASCADE
);














CREATE TABLE Nominee(
    NomineeID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(100),
    LastName varchar(100)
);

CREATE TABLE NomineeBioData(
    NomineeID INT,
    Age INT,
    Gender varchar(100),
    Birthdate DATE,
    CivilStatus varchar(100),
    FOREIGN KEY (NomineeID) REFERENCES Nominee(NomineeID) ON DELETE CASCADE
);

CREATE TABLE NomineePosition(
    NomineeID INT,
    Position varchar(100),
    Party varchar(100),
    City varchar(100),
    FOREIGN KEY (NomineeID) REFERENCES Nominee(NomineeID) ON DELETE CASCADE
);
















CREATE TABLE Candidate(
    CandidateID INT AUTO_INCREMENT PRIMARY KEY,
    NomineeID INT,
    Votes INT,
    Elected BOOLEAN,
    FOREIGN KEY (NomineeID) REFERENCES Nominee(NomineeID) 
);



