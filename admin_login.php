<?php
error_reporting(0);

session_start();
include 'connection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
    $check_user = mysqli_num_rows($select);

    if ($check_user == 1) {
        $row = mysqli_fetch_array($select);
        $_SESSION["status"] = $row["status"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["user_id"] = $row["id"];

        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('admin Login Successful')
        window.location.href='admin/admin.php';
        </SCRIPT>");
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid email or password. Please try again.");';
        echo 'window.location.href ="admin_login.php"';
        echo '</script>';
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

.form-container {
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

<div class=" py-5   mt-5 p-5">
  <div class="row justify-content-center">
    <div class="col-md-16 p-5">
      <div class="form-container">
        <h1 class="text-center">ADMIN Login</h1>
        <form action="admin_login.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your user email" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>

          <div class="text-center">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </div>

          <div class="text-center mt-4">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>  

</body>
</html>