<?php
// Start the session
session_start();
?>

<?php 
if (!isset($_SESSION["user_id"])) {
  header('location: login.php');
}
?>

<?php
include "conn.php";
?>

<?php 
$sql = "SELECT * FROM category WHERE status = '1'";
$result = $conn->query($sql);
?>

<?php 
$errors = array();
if (isset($_POST['save'])) {
    // print_r($_POST['save']);

  $user_id = $_SESSION["user_id"];
  // print_r($user_id);

  $category_id = $_POST['category_id'];
  $title = $_POST['title'];
  $textarea = $_POST['textarea'];
  $status = $_POST['status'];

  if($title == null){
    $errors['title'] = '* This field is required!';
  }
  if($textarea == null){
    $errors['textarea'] = '* This field is required!';
  }

  if($errors == null){    
    $sql = mysqli_query($conn, "INSERT INTO post (category_id, person_id, title, textarea, status) VALUES ('$category_id', '$user_id', '$title', '$textarea', '$status')");

    if ($sql) {?>
      <p style="font-size: 30px; color: white; font-family: Brush Script MT; text-align: center;"><?php echo 'Data Saved';?></p>
    <?php }
    else {
      echo $conn->error;
    }
  }
}

?>




<!Doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Posts</title>
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
.custom_body {
  width: 67.5%;
  margin: 0 auto;
  margin-top: 110px;
  margin-bottom: 5%;
}
.sub_custom_body {
  background: white;
  opacity: .89;
  border-radius: 10px 70px 10px 10px;
  width: 100%;
  padding-bottom: 3%;
}
.row {
  width: 100%;
  margin: 0 auto;
}
.width_control {
  width: 90%;
  margin: 0 auto;
}
.title1 {
  margin-top: 5%;
}
.title1 input {
  width: 100%;
  border: 1px solid grey;
  background-color: #EBEDEF;
  border-radius: 10px;
  text-align: center;
  font-size: 20px;
  font-style: italic;
  padding: 1%;
}
.dropdown {
  width: 100%;
  margin-top: 2%;
}
.dropdown select {
  width: 100%;
  border: 1px solid grey;
  background-color: #EBEDEF;
  border-radius: 10px;
  text-align: center;
  font-size: 18px;
  font-style: italic;
  padding: 1.4%;
}
textarea {
  width: 100%;
  border: 1px solid grey;
  background-color: #EBEDEF;
  border-radius: 10px;
  text-align: center;
  font-size: 20px;
  font-style: italic;
  margin: 0 auto;
  margin-top: 2%;
}
.radio {
  width: 80%;
  color: black;
  font-size: 20px;
  margin: 0 auto;
  text-align: center;
  font-style: italic;
  margin-top: 3.5%;
}
.radio input {
  background-color: grey;
}
.btn_contro {

}
.save {
  width: 80%;
  margin: 0 auto;
  margin-top: 7.5%;
}
.save .btn-secondary {
  color: #fff;
  background-color: #000000;
  border-color: #000000;
}
.save input {

}
.back {
  width: 80%;
  margin: 0 auto;
  margin-top: 7.5%;
}
.back input {

}
@media only screen and (max-width: 767px) {
  .save {
    margin-top: 4%;
  }
  .custom_body {
    width: 85%;
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
            <?php
            if ($_SESSION["user_id"] == 1) {
              ?>
              <a href="category.php">New Category</a>
              <?php
            } 
            ?>
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
  
  <div class="custom_body">
    <div class="container">
      <div class="sub_custom_body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="row">
            <div class="width_control">
              <div class="col-12">
                <div class="title1">
                  <input type="text" name="title" placeholder="Title">
                </div>
              </div>
              <?php
              if(isset($errors['title'])){
                echo $errors['title'];
              }
              ?>
              <div class="col-12">
                <div class="dropdown">
                  <select name="category_id">
                    <?php 
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        if ($row["status"] == 1) {
                          ?>
                          <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
                          <?php
                        }
                      }
                    }
                    else{
                      echo "0 result";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-12">
                <textarea rows="17" cols="140" placeholder="Enter Text Here ..." name="textarea"></textarea>
              </div>
              <?php
              if(isset($errors['title'])){
                echo $errors['title'];
              }
              ?>
              <div class="col-12">
                <div class="radio">
                  <input type="radio" name="status" value="1" checked="">Active
                  <input type="radio" name="status" value="0" style="margin-left: 7.5%;">Inactive
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-sm-12 col-md-6">
              <div class="back">
                <a style="background-color: black; padding: 10px; border-radius: 8px; color: white; font-size: 20px;" href="blog.php" class="btn btn-secondary btn-lg btn-block">Back</a>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="save">
                <input type="submit" name="save" value="Save" class="btn btn-secondary btn-lg btn-block">
              </div>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php 
  $errors = array();
  if (isset($_POST['save'])) {
    // print_r($_POST['save']);

    $user_id = $_SESSION["user_id"];
  // print_r($user_id);

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $textarea = $_POST['textarea'];
    $status = $_POST['status'];

    if($title == null){
      $errors['title'] = '* This field is required!';
    }
    if($textarea == null){
      $errors['textarea'] = '* This field is required!';
    }

    if($errors == null){    
      $sql = mysqli_query($conn, "INSERT INTO post (category_id, person_id, title, textarea, status) VALUES ('$category_id', '$user_id', '$title', '$textarea', '$status')");

      if ($sql) {?>
        <p style="font-size: 30px; color: white; font-family: Brush Script MT; text-align: center;"><?php echo 'Data Saved';?></p>
      <?php }
      else {
        echo $conn->error;
      }
    }
  }

  ?>



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