# Lets Discuss

Lets Discuss is a simple PHP and MySQL discussion forum application inspired by Q&A platforms like Stack Overflow. Users can sign up, log in, ask questions, browse categories, search for questions, answer questions, and view their own questions.

## Features

- User registration and login
- Logout support
- Ask new questions with a title, description, and category
- Browse all questions or filter by category
- View the latest questions
- Search questions by title
- Read answers for each question
- Submit answers after login
- View and delete your own questions
- Clean Bootstrap-based responsive interface

## Tech Stack

- PHP
- MySQL
- HTML/CSS/Bootstrap
- JavaScript (Bootstrap bundle)

## Project Structure

```text
Lets-Discuss/
├── index.php
├── README.md
├── client/
│   ├── answers.php
│   ├── ask.php
│   ├── category.php
│   ├── commonFiles.php
│   ├── header.php
│   ├── login.php
│   ├── questionAnswers.php
│   ├── questions.php
│   └── signup.php
├── common/
│   └── database.php
├── public/
│   └── style.css
└── server/
    └── requests.php
```

## How the App Works

The app loads through `index.php`, which decides which page section to display based on query parameters:

- `?signup=true` → signup form
- `?login=true` → login form
- `?ask=true` → ask question form
- `?q-id=ID` → question detail page with answers
- `?c-id=ID` → category-based question list
- `?search=term` → search by title
- `?latest=true` → latest questions
- `?u-id=ID` → user-specific question list

The backend logic for signup, login, posting questions, submitting answers, and deleting questions is handled in `server/requests.php`.

## Database Configuration

The application connects to MySQL using the following default settings in `common/database.php`:

- Host: `localhost`
- Username: `root`
- Password: empty
- Database name: `Lets_Discuss`

If your local MySQL setup uses a different username/password, update the connection details in `common/database.php` before running the project.

## Database Setup

Create the database and table structure in MySQL:

```sql
CREATE DATABASE Lets_Discuss;
USE Lets_Discuss;

CREATE TABLE USERS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    USERNAME VARCHAR(255) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL UNIQUE,
    PASSWORD VARCHAR(255) NOT NULL,
    ADDRESS VARCHAR(255)
);

CREATE TABLE CATEGORY (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    CATEGORY VARCHAR(255) NOT NULL
);

CREATE TABLE QUESTIONS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    TITLE VARCHAR(255) NOT NULL,
    DESCRIPTION TEXT NOT NULL,
    CATEGORY INT NOT NULL,
    USER_ID INT NOT NULL,
    FOREIGN KEY (CATEGORY) REFERENCES CATEGORY(ID),
    FOREIGN KEY (USER_ID) REFERENCES USERS(ID)
);

CREATE TABLE ANSWERS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ANSWERS TEXT NOT NULL,
    USER_ID INT NOT NULL,
    QUESTION_ID INT NOT NULL,
    FOREIGN KEY (USER_ID) REFERENCES USERS(ID),
    FOREIGN KEY (QUESTION_ID) REFERENCES QUESTIONS(ID)
);
```

Optional sample categories:

```sql
INSERT INTO CATEGORY (CATEGORY) VALUES
('PHP'),
('javascript'),
('HTML'),
('database'),
('mobile'),
('sports'),
('entertainment'),
('technology'),
('general');
```

## Running the Project

### Using XAMPP

1. Place the project folder inside `htdocs`.
2. Start Apache and MySQL from XAMPP.
3. Create the `Lets_Discuss` database and required tables.
4. Open the browser and visit:

```text
http://localhost/Lets-Discuss/
```

## Notes

- The app is a beginner-friendly PHP project and is designed for local development.
- Some values and navigation rely on query parameters in the URL, which is typical for this project structure.
- The UI uses Bootstrap for styling and layout.

## License

This project does not currently include a license file. If you are publishing it publicly, consider adding an open-source license appropriate for your use case.
