<?php 
ini_set('memory_limit', '-1');
session_start();
include '../../connection.php';
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

} else {
  header("Location: ../../index.html");
  exit();
}?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Super Admin  page</title>
  <link rel = "icon" href = "../../ideal_logo.jpg" type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
</head>
<style>
  *,
  *::after,
  *::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    font-size: 62.5%;
  }

  body {
    --background-color: hsl(180, 20%, 90%);

    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

    min-height: 100vh;
    padding: 2rem;

    color: hsla(0, 0%, 0%, .6);
    background: var(--background-color);
    text-align: center;
  }

  h1 {
    font-size: 3.2rem;
    padding-top: 2rem;
  }

  h1+p {
    font-size:;font-size: 1.8rem;
    padding: 2rem 0 3rem;
  }

  .main {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }

  .wrap {
    margin: 2rem;

    transform-style: preserve-3d;
    transform: perspective(100rem);

    cursor: pointer;
  }

  .container {
    --rX: 0;
    --rY: 0;
    --bX: 50%;
    --bY: 80%;

    width: 30rem;
    height: 36rem;
    border: 1px solid var(--background-color);
    border-radius: 1.6rem;
    padding: 4rem;

    display: flex;
    align-items: flex-end;

    position: relative;
    transform: rotateX(calc(var(--rX) * 1deg)) rotateY(calc(var(--rY) * 1deg));

    background: linear-gradient(hsla(0, 0%, 100%, .1), hsla(0, 0%, 100%, .1)), url("https://images.unsplash.com/photo-1559113513-d5e09c78b9dd?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9");
    background-position: var(--bX) var(--bY);
    background-size: 40rem auto;
    box-shadow: 0 0 3rem .5rem hsla(0, 0%, 0%, .2);

    transition: transform .6s 1s;
  }

  .container::before,
  .container::after {
    content: "";

    width: 2rem;
    height: 2rem;
    border: 1px solid #fff;

   position: absolute;
   z-index: 2;

   opacity: .3;
   transition: .3s;
 }

 .container::before {
   top: 2rem;
   right: 2rem;

   border-bottom-width: 0;
   border-left-width: 0;
 }

 .container::after {
   bottom: 2rem;
   left: 2rem;

   border-top-width: 0;
   border-right-width: 0;
 }

 .container--active {
   transition: none;
 }

 .container--2 {
   filter: hue-rotate(80deg) saturate(140%);
 }

 .container--3 {
   filter: hue-rotate(160deg) saturate(140%);
 }

 .container--4 {
   filter: hue-rotate(240deg) saturate(140%);
 }

 .container p {
   color: hsla(0, 0%, 100%, .6);
   font-size: 2.2rem;
 }

 .wrap:hover .container::before,
 .wrap:hover .container::after {
   width: calc(100% - 4rem);
   height: calc(100% - 4rem);
 }

 .abs-site-link {
   position: fixed;
   bottom: 20px;
   left: 20px;
   color: hsla(0, 0%, 0%, .6);
   font-size: 1.6rem;
 }
.logout-button {
  position: absolute;
  top: 10px;
  right: 10px;
  display: inline-block;
  padding: 5px;
  border-radius: 5px;
  background-color: #ccc;
}

.logout-button img {
  height: 16px;
  width: 16px;
}
</style>
</head>
<body>
<a href="logout.php">
  <div class="logout-button">
      <img src="logout-icon.png" alt="Logout">
    </div>
</a>
<?php if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];

}?>

<!-- partial:index.partial.html -->
<h1>IDEAL RESULTS PORTAL</h1>
<p><?php echo "Welcome " . strtoupper($username); ?></p>
<section class="main">
 <?php
if (empty($role) || $role == 1) {?>
  <a href="student_registration/index.php">
          <div class="wrap wrap--1">
            <div class="container container--1">
              <p>01. Registration</p>
            </div>
          </div>
        </a>
<?php } ?>
<?php if (empty($role) || $role == 2) {?>
  <a href="student_results_upload/index.php">
   <div class="wrap wrap--2">
     <div class="container container--2">
       <p>02. Upload</p>
     </div>
   </div>
  </a>
  <?php } ?>
  <?php if (empty($role) || $role == 1) {?>
  <a href="student_results_download/index.php">
   <div class="wrap wrap--3">
     <div class="container container--3">
       <p>03. Download</p>
     </div>
   </div>
  </a>
  <?php } ?>
  <?php if (empty($role) || $role == 2) {?>
  <a href="student_results_delete/dele.php">
   <div class="wrap wrap--4">
     <div class="container container--4">
       <p>04. Delete</p>
     </div>
   </div>
  </a>
<?php } ?>
</section>
<!-- partial -->
  <script  src="./Admin login after.js"></script>
  

</body>
</html>
