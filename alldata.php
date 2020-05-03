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

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>ALL DATA</title>
</head>

<style>
  table, td, th, tr{
    border: 1px solid black;
    text-align: center;
    font-size: 20px;
  }
</style>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<body>

  <div class="container-fluid">
    <table>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Category</th>
        <th>User ID</th>
        <th>Action</th>
      </tr>
      <?php
      $sql = "SELECT * FROM post";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["textarea"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td><?php echo $row["category_id"]; ?></td>
            <td><?php echo $row["person_id"]; ?></td>
            <td><a target="blank" href="post-edit.php?edit=<?php echo $row["id"] ?>">Edit</a></td>
          </tr>
          <?php

        }
      }
      ?>
    </table>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>