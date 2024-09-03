<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner {
            background-image: url('image/school.jpg');
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .section {
            padding: 50px 0;
        }
    
    </style>
</head>
<body>
  <?php

include 'nav.php';
?>
<div class="content">

    <!-- Banner Section -->
    <div class="banner">
        <div class="container">
            <h1>Welcome to Our Project</h1>
            <p>Discover the features and functionalities we offer.</p>
            <a href="#about" class="btn btn-primary btn-lg">Learn More</a>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="section">
        <div class="container">
            <h2 class="text-center">About Us</h2>
            <p>Welcome to TutorFinder, your go-to platform for connecting with expert tutors who can help you excel in your academic journey. Whether you're a student looking to master a challenging subject or a parent seeking the best educational support for your child, we are here to simplify the process of finding the perfect tutor.</p>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="section bg-light">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Tutor Search and Matching Service</h5>
                            <p class="card-text">The Tutor Finder application provides an advanced search and matching service that allows students and parents to find suitable tutors based on their specific needs. Users can search for tutors by filtering criteria such as subject, location, availability, price, and rating. This service ensures that users can efficiently locate tutors who meet their requirements and preferences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tutor Profile and Listings Management</h5>
                            <p class="card-text">Tutors can create and manage their profiles and listings on the platform. This service allows them to input detailed information about their qualifications, subjects they teach, rates, availability, and location. Tutors can also upload a profile picture to enhance their visibility. This feature helps tutors present their expertise and availability to potential students effectively.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Session Scheduling and Booking System</h5>
                            <p class="card-text">The application includes a comprehensive scheduling and booking system that facilitates the arrangement of tutoring sessions. Users can view available time slots and schedule sessions with their chosen tutors accordingly. This service integrates with the user's dashboard to manage appointments and session details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Footer Section -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

