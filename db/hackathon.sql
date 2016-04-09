#Creates the database
CREATE DATABASE IF NOT EXISTS hackathon;
USE hackathon;

#Avoids redundancy
DROP TABLE users;

#Creates the users table
CREATE TABLE IF NOT EXISTS users
(
	userID INT AUTO_INCREMENT PRIMARY Key,
	name TEXT NOT NULL,
	email VARCHAR(60) NOT NULL UNIQUE,
	accessLevel set("Moderator", "Admin", "Super User") NOT NULL
);

explain users;

INSERT INTO users(name, email, accessLevel)
VALUES
("James Crowley", "james.crowley1@marist.edu", "Super User"),
("John Randis", "john.randis1@marist.edu", "Admin"),
("Scott Hansen", "scott.hansen1@marist.edu", "Moderator");

#Avoids redundancy
DROP TABLE tickets;

#Creates the users table
CREATE TABLE IF NOT EXISTS tickets
(
	ticketID INT AUTO_INCREMENT PRIMARY Key,
	create_date TEXT NOT NULL,
	subject TEXT NOT NULL,
	problem TEXT NOT NULL,
	solution TEXT NOT NULL
);

#Avoids redundancy
DROP TABLE updates;


#Creates the users table
CREATE TABLE IF NOT EXISTS updates
(
	updateID INT AUTO_INCREMENT,
	update_date DATETIME NOT NULL,
	ticketID INT Not Null,
	updateProblem TEXT NOT NULL,
	userID INT NOT NULL,
	PRIMARY KEY(updateID, ticketID, userID),
	FOREIGN KEY (ticketID) REFERENCES tickets(ticketID),
	FOREIGN KEY (userID) REFERENCES users(userID)
);