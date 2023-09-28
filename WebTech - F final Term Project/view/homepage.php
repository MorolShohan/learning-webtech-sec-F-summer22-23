<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Online Courses</title>
<style>
  
  body, h1, p {
    margin: 0;
    padding: 0;
  }
  
 
  body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
  }

  
  header {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
  }

 
  nav {
    display: flex;
    justify-content: center;
    background-color: #444;
    padding: 10px 0;
  }

  nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
  }

  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }

 
  .hero {
    text-align: center;
    padding: 100px 0;
  }

  .hero h1 {
    font-size: 36px;
    margin-bottom: 20px;
  }

  .hero p {
    font-size: 18px;
    color: #666;
  }

 
  .course {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 40px 0;
  }

  .course-item {
    flex: 1;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .course-item h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .course-item p {
    font-size: 16px;
    color: #666;
  }


  .login-section {
    text-align: center;
    padding: 40px 0;
  }

  .login-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #333;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }

  .login-link:hover {
    background-color: #555;
  }

  footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
  }
</style>
</head>
<body>
<?php
include("../model/config.php");

if((!isset($_SESSION['userId']) && empty($_SESSION['userId'])) && (!isset($_SESSION['userName']) && empty($_SESSION['userName']))) {

    header('Location: index.php');
}else{

    $loginName = $_SESSION['userName'];
    $loginId = $_SESSION['userId'];
}
  ?>

<section>

<div>
    <h1>Welcome <strong><?php if(isset($loginName)) echo $loginName; ?></strong></h1>
</div>
</section>
  <header>
    <h1>Your Online Courses</h1>
    <p>Welcome to your learning journey!</p>
  </header>
  
  <nav>
    <a href="#">Home</a>
    <a href="course.php">Courses</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
  </nav>
  
  <div class="container">
    <div class="hero">
      <h1>Upgrade Your Skills with Our Courses</h1>
      <p>Explore a wide range of courses to enhance your knowledge and expertise.</p>
    </div>
    
    <div class="course">
      <div class="course-item">
        <h2>Web Development</h2>
        <p>Learn the art of building modern and responsive websites.</p>
      </div>
      <div class="course-item">
        <h2>Digital Marketing</h2>
        <p>Master the strategies and techniques to promote businesses online.</p>
      </div>
      <div class="course-item">
        <h2>Data Science</h2>
        <p>Unlock the power of data and gain insights through analysis.</p>
      </div>
    </div>

    <div class="login-section">
      <a class="login-link" href="../controller/logout.php">Logout</a>
    </div>
  </div>
  
 
  <?php include('footer.php'); 
?>
</body>
</html>
