<?php
// Start the session
session_start();
?>

<?php
include "conn.php";
?>

<?php 
if(!isset($_SESSION["user_id"])){
  header('location: login.php');
}
?>

<?php 
$sql = "SELECT * FROM category WHERE status = '1'";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Saved</title>
</head>

<style>
body{
  background-color: #121212;
}
.custom-nav{
  position: fixed;
  top: 0px;
  left: 0px;
  width: 100%;
  z-index: 3;
  box-shadow: 0px 0px 5px .5px black;
}
.custom-nav .bg-light {
  background-color: #ffffff!important;
  opacity: 0.89;
}
.custom-nav .navbar-brand {
  margin-right: 3rem;
  margin-left: 0rem;
}
.custom-nav .navbar-light .navbar-brand {
  font-size: 2.1rem;
  font-family: Brush Script MT;
}
.custom-nav .navbar-expand-lg .navbar-nav .nav-link {
  padding-right: 0.75rem;
  padding-left: 0.75rem;
}
.custom-part-top{
  margin-top: 10%;
  z-index: 1;
}
.custom-part{
  margin-top: 2.5%;
  z-index: 1;
}
.con-style{
  background-color: white;
  width: 80%;
  margin: 0 auto;
  border-radius: 10px 100px 10px 10px;
  opacity: .89;
  padding-top: 1%;
  padding-bottom: 3%; 
}
.title{
  width: 90%;
  margin: 0 auto;
  text-align: center;
  font-size: 60px;
  font-family: Brush Script MT;
}
.description{
  width: 90%;
  margin: 0 auto;
  font-size: 16px;
  text-align: center;
  margin-top: 1%;
  font-style: italic;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right:  0;
  background-color: #fff;
  opacity: .89;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #000;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: grey;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-right .5s;
}

.h3, h3 {
  font-size: 2.5rem;
  margin: 0 auto;
  font-family: Brush Script MT;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media only screen and (min-width: 480px) and (max-width: 768px){
  .custom-part-top{
    margin-top: 25%;
  }
}
@media only screen and (max-width: 480px){
  .custom-part-top{
    margin-top: 25%;
  }
}
</style>

<body>
  <div class="custom-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="blog.php"><img src="blog.svg" width="50px"> Blog Land </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php 
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>
              <li class="nav-item">
                <a class="nav-link f-i" target="blank" href="blogcategory.php?edit=<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a>
              </li>
              <?php            
            }
          }
          else {
            ?>
            <span class="navbar-text">
              No Category Entered Till Now ...
            </span>
            <?php
          }
          ?> 
        </ul>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div style="margin-top: 10%; font-style: italic;">
            <a href="profile_edit.php">Profile</a>
            <a href="post.php">Add New Post</a>
            <a href="my_posts.php">My Posts</a>
            <a href="saved.php">Saved</a>
            <div style="width: 70%; height: 3px; background-color: black; margin-left: 5%; margin-top: 4%;"></div>
            <a style="font-weight: bold; margin-top: 2%;" href="logout.php">Log Out</a>
          </div>
        </div>
        <div id="main">
          <span style="cursor:pointer;" onclick="openNav()">
            <h3 style="font-size: 35px;">
              <?php 
              $name = $_SESSION["user_id"];
              $profile = "SELECT * FROM register WHERE id = '$name'"; 
              $st_profile = $conn->query($profile);
              $name_profile = $st_profile->fetch_assoc();
              echo $name_profile["fname"]; 
              ?>
              <img src="profile.png" width="50">
            </h3>
          </span>
        </div>
        
      </div>
    </nav>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "225px";
        document.getElementById("main").style.marginRight = "225px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginRight= "0";
      }
    </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>