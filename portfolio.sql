CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    student_id VARCHAR(20) NOT NULL,
    bio TEXT,
    email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO student (name, student_id, bio, email) VALUES
('Raed Abdullah Alshammari', '202208297', 'I am a Software Engineering student interested in web development, database systems, and UI/UX design. I enjoy building simple and useful websites and learning new technologies through hands-on projects.', 'raed.alshammari@example.com');

INSERT INTO skills (skill_name) VALUES
('HTML & CSS'),
('JavaScript'),
('PHP & MySQL'),
('Figma (UI Design)'),
('Database Management');

INSERT INTO projects (title, description, category) VALUES
('DBMS Lab Project', 'A database management system project that covers database schema design, SQL queries, normalization, and sample data operations.', 'Database'),
('Electronic Library', 'A web-based electronic library system that allows users to browse, search, and borrow digital books online.', 'Web App'),
('Car Rental App Design', 'A front-end UI/UX design for a car rental mobile application created using Figma, including wireframes and interactive prototypes.', 'UI/UX');
