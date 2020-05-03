<?php
session_start();
?>

<?php
include "conn.php";
?>

<?php

if ($_SESSION["user_id"] != 1) {
  header('location: login.php');
}

?>

<?php
$errors = array();
if(isset($_POST['save'])){
  $title = $_POST['title'];
  $status = $_POST['status'];

  if ($title == null) {
    $errors['title'] = "* This field is required";
  }

  if ($errors == null) {
    $sql = mysqli_query($conn, "INSERT INTO category (title, status) VALUES ('$title', '$status')");

    if($sql){
      echo 'data saved';
    }
    else
    {
      echo $conn->error;
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

  <title>Category</title>
</head>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<body>

  <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <br>
      <input type="text" name="title" placeholder="Title">
      <?php 
      if (isset($errors['title'])) {
        echo $errors['title'];
      }

      ?>
      <br><br>
      <input type="radio" name="status" value="1" checked="">Active
      <input type="radio" name="status" value="0">Inactive<br><br>
      <input type="submit" name="save" value="Save">
    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>