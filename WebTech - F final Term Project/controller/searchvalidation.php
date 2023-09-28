<?php
require_once('../model/config.php');
session_start();

if (!isset($_COOKIE['status'])) {
    header('location: ../view/login.php?error=bad_request');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchQuery = $_GET['search_query'] ?? '';

    
    function getMatchingCoursesFromDatabase($searchQuery) {
        $con = mysqli_connect('localhost', 'root', '', 'exceptional');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        
        $searchQuery = mysqli_real_escape_string($con, $searchQuery);

        
        $query = "SELECT * FROM admin WHERE name LIKE ('%$searchQuery%' OR admin_mail LIKE '%$searchQuery%' OR type LIKE '%$searchQuery%') ";
        $result = mysqli_query($con, $query);

        $matchingCourses = [];

        if ($result) {
            while ($course = mysqli_fetch_assoc($result)) {
                $matchingCourses[] = $course;
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);

        return $matchingCourses;
    }

    
    $matchingCourses = getMatchingCoursesFromDatabase($searchQuery);
   echo json_encode($matchingCourses);

}