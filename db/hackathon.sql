#Creates the database
CREATE DATABASE IF NOT EXISTS hackathon;
USE hackathon;

#Avoids redundancy
DROP TABLE users;

#Creates the users table
CREATE TABLE IF NOT EXISTS users
(
	num INT AUTO_INCREMENT PRIMARY Key,
	name TEXT NOT NULL,
	email VARCHAR(60) NOT NULL UNIQUE,
	accessLevel set("Moderator", "Admin", "Super User") NOT NULL
);

explain users;

INSERT INTO users(name, email, accessLevel)
VALUES
("James Crowley", "james.crowley1@marist.edu", "Super User"),
("John Randis", "john.randis1@marist.edu", "Admin"),
("Scott Hansen", "scott.hansen1@marist.edu", "Moderator")

#Testing the table
SELECT * FROM users;
