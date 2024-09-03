<?php
include 'connection.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Simple password encryption

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        // Redirect based on user type
        if ($user['user_type'] == 'tutor') {
            header("Location: tutor/tutor.php");
        } elseif ($user['user_type'] == 'student') {
            header("Location: student/student.php");
        }
        exit();
    } else {
        echo "Invalid email or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
  
  body {
  background-image: url('image/school.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  margin: 0;
  font-family: 'Arial', sans-serif;
}

.container {
  background-color: rgba(255, 255, 255, 0.8); /* White background with some transparency for the form */
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

 
  </style>
</head>
<body>
	<div class="content">
    <?php
include 'nav.php';
    ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Login</h2>
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
