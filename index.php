<?php
include 'config.php';

$success_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $success_message = "Your message has been sent successfully!";
    }
}

$student_result = $conn->query("SELECT * FROM student LIMIT 1");
$student = $student_result->fetch_assoc();

$skills_result = $conn->query("SELECT * FROM skills");

$projects_result = $conn->query("SELECT * FROM projects");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="#home" class="logo">My Portfolio</a>
            <button class="menu-toggle" onclick="toggleMenu()">Menu</button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <button class="theme-toggle" onclick="toggleTheme()">Dark</button>
        </div>
    </nav>

    <section id="home" class="home-section">
        <div class="home-content">
            <div class="avatar"><?php echo strtoupper(substr($student['name'], 0, 1)); ?></div>
            <h1>Hi, I'm <?php echo $student['name']; ?></h1>
            <p class="subtitle">Software Engineering Student</p>
            <p class="student-id">Student ID: <?php echo $student['student_id']; ?></p>
            <a href="#projects" class="btn">View My Work</a>
        </div>
    </section>

    <section id="about" class="section">
        <h2 class="section-title">About Me</h2>
        <div class="about-content">
            <p><?php echo $student['bio']; ?></p>
        </div>
    </section>

  
   <section id="skills" class="section">
        <h2 class="section-title">Skills</h2>
        <div class="projects-container">
            <?php
            if ($skills_result->num_rows > 0) {
              while ($skill = $skills_result->fetch_assoc()) {
                  echo '<div class="project-card">';
                  echo '<div class="project-icon">' . strtoupper(substr($skill['skill_name'], 0, 1)) . '</div>';
                  echo '<h3>' . $skill['skill_name'] . '</h3>';
    
                  echo '</div>';
              }
            }
            ?>
        </div>
    </section>

    <section id="projects" class="section">
        <h2 class="section-title">Projects</h2>
        <div class="projects-container">
            <?php
            if ($projects_result->num_rows > 0) {
              while ($project = $projects_result->fetch_assoc()) {
                  echo '<div class="project-card">';
                  echo '<div class="project-icon">' . strtoupper(substr($project['title'], 0, 1)) . '</div>';
                  echo '<h3>' . $project['title'] . '</h3>';
                  echo '<span class="project-category">' . $project['category'] . '</span>';
                  echo '<p>' . $project['description'] . '</p>';
                  echo '</div>';
              }
            }
            ?>
        </div>
    </section>

    <section id="contact" class="section alt-bg">
        <h2 class="section-title">Contact Me</h2>
        <div class="contact-content">
            <?php if ($success_message != "") { ?>
                <p class="success-msg"><?php echo $success_message; ?></p>
            <?php } ?>
            <form method="POST" action="index.php" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message"></textarea>
                </div>
                <input type="submit" name="submit" value="Send Message" class="btn">
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> <?php echo $student['name']; ?> | Student ID: <?php echo $student['student_id']; ?></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
