<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Simple password encryption
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $user_type = $_POST['user_type'];
    $profile_picture = $_FILES['profile_picture']['name'];

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "This email is already registered.";
    } else {
        // Handle profile picture upload
        if (!empty($profile_picture)) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($profile_picture);
            move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        } else {
            $target_file = null;
        }

        // Insert user into the database
        $sql = "INSERT INTO users (username, email, password, full_name, phone_number, address, profile_picture, user_type)
                VALUES ('$username', '$email', '$password', '$full_name', '$phone_number', '$address', '$target_file', '$user_type')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <h2>User Registration</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="11" pattern="\d{1,11}" title="Please enter up to 11 digits" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <div class="mb-3">
                <label for="user_type" class="form-label">I am a:</label>
                <select class="form-select" id="user_type" name="user_type" required>
                    <option value="student">Student</option>
                    <option value="tutor">Tutor</option>
                </select>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
