<?php
session_start();
?>

<?php
include "conn.php";
?>

<?php
$activated_user = $_SESSION["user_id"];
?>

<?php 
$category = "SELECT * FROM category WHERE status = '1'";
$st_cat = $conn->query($category);
?>

<?php
$id = $_GET["edit"];
$sql = "SELECT * FROM post WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cat_id = $row["category_id"];
?>

<?php
$title = "SELECT * FROM category WHERE id = '$cat_id'";
$st_title = $conn->query($title);
$col = $st_title->fetch_assoc();
?>

<?php
if (isset($_POST['comment_submit'])) {
  $post_id = $id;
  $comment = $_POST['comment'];

  $com_upd = mysqli_query($conn, "INSERT INTO comment (user_id, post_id, comment) VALUES('$activated_user', '$post_id', '$comment')");

  if ($com_upd) {
    echo "Comment Recorded";
  }
  else {
    $conn->error;
  }
}
?>

<?php
if (isset($_POST['like'])) {
  $post_id = $id;
  $type = "Liked";

  $sql_likes = "SELECT * FROM like_save WHERE user_id = '$activated_user' AND post_id = '$id' AND type = 'Liked'";
  $sql_likes_st = $conn->query($sql_likes);
  $sql_likes_f = $sql_likes_st->fetch_assoc();
  if ($sql_likes_f == null) {
    $like_upd = mysqli_query($conn, "INSERT INTO like_save (post_id, user_id, type) VALUES('$post_id', '$activated_user', '$type')");

    if ($like_upd) {
      echo "Like Recorded";
    }
    else {
      $conn->error;
    }
  }
}
?>

<?php
if (isset($_POST['save'])) {
  $post_id = $id;
  $type = "Saved";

  $sql_saves = "SELECT * FROM like_save WHERE user_id = '$activated_user' AND post_id = '$id' AND type = 'Saved'";
  $sql_saves_st = $conn->query($sql_saves);
  $sql_saves_f = $sql_saves_st->fetch_assoc();

  if ( $sql_saves_f == null ) {
    $save_upd = mysqli_query($conn, "INSERT INTO like_save (post_id, user_id, type) VALUES('$post_id', '$activated_user', '$type')");

    if ($save_upd) {
      echo "Save Recorded";
    }
    else {
      $conn->error;
    }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="Style.css">

  <title><?php echo $col['title']. " | " .$row['title'] ; ?></title>
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
  box-shadow: 0px 0px 10px 1px black;
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
  margin-top: 7.7%;
  z-index: 1;
}
.category {
  width: 80%;
  margin: 0 auto;
  margin-bottom: 2%;
}
.specific_category_title {
  width: 30%;
  background-color: white;
  opacity: 0.89;
  padding: 2% 0 2% 0;
  font-family: Brush Script MT;
  font-size: 50px;
  text-align: center;
  border-radius: 10px 50px 10px 10px;
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
.specific_text {
  font-size: 25px;
  color: black;
  margin-right: 18px;
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
  margin-top: 2%;
  font-size: 16px;
  text-align: center;
  font-style: italic; 
}
.user_post {
  margin: 0 auto;
  text-align: right;
  color: black;
  font-family: arial;
  font-size: 17px;
  font-weight: bold;
  font-style: italic;
  margin-top: 2.5%; 
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
.post_edit {
  margin-top: 4.5%; 
}
.post_edit a{
  background-color: black;
  color: white;
  font-size: 30px;
  font-style: italic;
  font-family: Brush Script MT;
  padding: 10px 30px;
  border-radius: 10px;
}
.media_section {
  background-color: white;
  opacity: .89;
  width: 80%;
  margin: 0 auto;
  margin-top: 2%;
  border-radius: 10px 10px 60px 10px;
  padding-bottom: 2%;
}
.sub_section {
  width: 100%;
}
.like {
  width: 60%;
  margin: 0 auto;
  margin-top: 5%;
  text-align: center;
  font-weight: bold;
  font-style: italic;
}
.like input {
  width: 100%;
  margin: 0 auto;
  background-color: black;
  color: white;
  border: 1px solid black;
  border-radius: 10px;
  height: 35px;
  opacity: .92;
}
.save {
  width: 60%;
  margin: 0 auto;
  margin-top: 5%;
  text-align: center;
  font-weight: bold;
  font-style: italic;
}
.save input {
  width: 100%;
  margin: 0 auto;
  background-color: black;
  color: white;
  border: 1px solid black;
  border-radius: 10px;
  height: 35px;
  opacity: .92;
}
.comment {
  width: 81%;
  margin: 0 auto;
  margin-top: 3%;
}
.comment input {
  width: 100%;
  margin: 0 auto;
  background-color: #EBEDEF;
  color: black;
  border: 1px solid grey;
  border-radius: 10px;
  height: 35px;
  text-align: center;
}
.comment_submit {
  width: 81%;
  margin: 0 auto;
  margin-top: 2%;
}
.comment_submit input {
  width: 100%;
  margin: 0 auto;
  background-color: black;
  color: white;
  border: 1px solid black;
  border-radius: 10px;
  height: 35px;
  opacity: .92;
}

</style>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<body>
  <div class="custom-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="blog.php"><img src="blog.svg" width="50px"> Blog Land</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php 
          if ($st_cat->num_rows > 0) {
            while ($cat = $st_cat->fetch_assoc()) {
              ?>
              <li class="nav-item">
                <a class="nav-link f-i" target="blank" href="blogcategory.php?edit=<?php echo $cat["id"]; ?>" value="<?php echo $cat["id"]; ?>"><?php echo $cat["title"]; ?></a>
              </li>
              <?php            
            }
          }?> 

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

  <div class="custom-part-top">
    <div class="container">
      <div class="category">
        <div class="row">
          <div class="col-12">
            <div class="specific_category_title">
              <?php echo $col["title"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="con-style">
        <div class="row">
          <div class="col-12">
            <div class="title" value="<?php echo $col["id"]; ?>">
              <?php
              echo $row["title"];
              ?>
            </div>
          </div>
          <div class="col-12">
            <div class="description" value="<?php echo $col["id"]; ?>">
              <?php
              echo $row["textarea"];
              ?>
              <div class="col-12">
                <?php
                $name_ref = $row["person_id"];
                $ref = "SELECT * FROM register WHERE id = '$name_ref'";
                $st_ref = $conn->query($ref);
                $use_ref = $st_ref->fetch_assoc();
                ?>
                <div class="user_post">
                  <?php
                  echo "--- ".$use_ref["fname"]." ".$use_ref["lname"];
                  ?>
                </div>
              </div>
              <?php
              if ($_SESSION["user_id"] == $row["person_id"]) {
                ?>
                <div class="post_edit">
                  <a href="post-edit.php?edit=<?php echo $row["id"]; ?>">Edit</a>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="container">
      <form method="post">
        <div class="media_section">
          <div class="sub_section">
            <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <div class="like">
                      <input type="submit" name="like" value="Like">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="like">
                      <?php
                      $display_count_likes = "SELECT * FROM like_save WHERE post_id = '$id' AND type = 'Liked'";
                      $display_likes_st = $conn->query($display_count_likes);
                      $display_likes_f = $display_likes_st->fetch_assoc();
                      if ($display_likes_f['type'] == null) {
                        echo "0";
                      }
                      else {
                        $likes_count = count($display_likes_f['type']);
                        echo $likes_count;
                      }
                      ?>
                      Likes
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <div class="save">
                      <input type="submit" name="save" value="Save">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="save">
                      <?php
                      $display_count_saves = "SELECT * FROM like_save WHERE post_id = '$id' AND type = 'Saved'";
                      $display_saves_st = $conn->query($display_count_saves);
                      $display_saves_f = $display_saves_st->fetch_assoc();
                      if ($display_saves_f['type'] == null) {
                        echo "0";
                      }
                      else {
                        $saves_count = count($display_saves_f['type']);
                        echo $saves_count;
                      }
                      ?>
                      Saves
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="comment">
                  <input type="text" name="comment" placeholder="Comment Here ...">
                </div>
              </div>
              <div class="col-12">
                <div class="comment_submit">
                  <input type="submit" name="comment_submit" value="Save Comment">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div style="height: 30px;"></div>



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