# Teacher_Portal
Building a Robust Teacher Portal with PHP, HTML &amp; JavaScript


Download and install XAMPP on your computer.
Put the PHP scripts in the XAMPP/htdocs folder.
Open the XAMPP control panel and start Apache and Mysql.
Open the web browser and access http://localhost/phpmyadmin/index.php
CREATE DATABASE teacher_portal;

USE teacher_portal;

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    marks INT NOT NULL
);

-- Insert a test teacher
INSERT INTO teachers (username, password) VALUES ('teacher1', PASSWORD('password123'));
Open the web browser and access http://localhost/login.php
UserName - teacher1
Password - password123
