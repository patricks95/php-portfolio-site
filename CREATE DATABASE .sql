CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', MD5('admin123'));

CREATE TABLE experience (
  id INT AUTO_INCREMENT PRIMARY KEY,
  position VARCHAR(255),
  company VARCHAR(255),
  duration VARCHAR(100),
  description TEXT
);

CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  image VARCHAR(255)
);

CREATE TABLE skills (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  level VARCHAR(50)
);

CREATE TABLE about (
  id INT AUTO_INCREMENT PRIMARY KEY,
  content TEXT
);

INSERT INTO experience (position, company, duration, description)
VALUES ('Frontend Developer', 'Tech Co', '2022 - Present', 'UI/UX and React development.');

INSERT INTO skills (name, level)
VALUES ('HTML', 'Advanced'), ('CSS', 'Advanced'), ('JavaScript', 'Intermediate');

INSERT INTO about (content)
VALUES ('I am a passionate web developer with experience in modern web technologies.');

INSERT INTO projects (title, description, image)
VALUES ('Portfolio Website', 'A responsive portfolio built in PHP.', 'portfolio.png');

CREATE TABLE profile (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255)
);

INSERT INTO profile (image) VALUES ('default_profile.png');