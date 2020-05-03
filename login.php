<?php
// Start the session
session_start();
?>

<?php 
include "conn.php";
?>

<?php 
if(isset($_SESSION["user_id"])){
  header('location: blog.php');
}
?>

<?php 

$errors = array();
if (isset($_POST['login'])) {

  $login_username = $_POST['username'];
  $login_password = $_POST['password'];

  if ($login_username == null) {
    $errors['username'] = "This field is required";
  }

  if ($login_password == null) {
    $errors['password'] = "This field is required";
  }

  // $login_username = stripcslashes($login_username);
  // $login_password = stripcslashes($login_password);
  // $login_username = mysqli_real_escape_string($login_username);
  // $login_password = mysqli_real_escape_string($login_password);

  $login_sql = mysqli_query($conn, "SELECT * FROM register WHERE username = '$login_username' AND password = '$login_password'") 
  or die("Failed to query database").mysql_query();
  $num = mysqli_num_rows($login_sql);
  if($num > 0){
    $data = mysqli_fetch_assoc($login_sql);
    // print_r($data['id']);
    $_SESSION["user_id"] = $data['id'];
    header('location: blog.php');
  }
  else
  {
    $errors['incorrect'] = "Incorrect Username or Password!";
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
  <link rel="stylesheet" type="text/css" href="Style.css">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">

  <title>Blog Land | Log In Form</title>
</head>

<style>
body, html {
  width: 100%;
}
body {
  background-color: #121212; 
}
.custom_controllor {
  margin: 0 auto;
  margin-top: 8%;
}
.main_text {
  margin: 0 auto;
  width: 80%;
}
img {
  transition: all .8s ease-in-out;
}
img:hover {
  transition-delay: 0.4ss;
  transform: rotate(360deg);
}
.sub_text {
  width: 100%;
  background-color: white;
  opacity: .89;
  margin-bottom: 3%;
  border-radius: 10px 50px 10px 10px;
  font-family: Brush Script MT;
  font-size: 45px;
  padding: 1% 0 1% 0;
}
.sub.text {
  font-size: 20px;
}
.box {
  width: 94%;
  color: #fff;
  text-align: left;
  font-style: italic;
}
.login_form {
  background-color: white;
  opacity: .89; 
  border-radius: 10px 50px 10px 10px;
  padding-bottom: 3%;
}
.form_controllor {
  padding: 2% 0 1% 0;
}
.user_pass {
  width: 80%;
  margin: 0 auto;
  margin-top: 1%;
}
.username p {
  font-family: Brush Script MT;
  font-size: 35px;
  margin: 0;
}
.username {
  margin-top: 0%;
  margin-bottom: 4%;
}
.password p {
  font-family: Brush Script MT;
  font-size: 35px;
  margin: 0;
}
.password {
  margin-bottom: 9%;
}
input {
  width: 100%;
  border-radius: 10px;
  border: 1px solid black;
  text-align: center;
  height: 40px;
  font-size: 20px;
  font-style: italic;
  background-color: #EBEDEF; 
}
.btn_control {
  padding-top: 4%;
}
.btn_control .btn-primary {
  color: #fff;
  background-color: #000000;
  border-color: #000000;
  font-style: italic;
}
.btn_control .btn-group-lg>.btn, .btn-lg {
  padding: .5rem 0rem;
  font-size: 1.25rem;
  line-height: 1;
  border-radius: .3rem;
  height: 55px;
}
.register {
  margin-top: 6%;
  font-family: Brush Script MT;
  font-size: 25px;
  text-align: center;
}

</style>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<body>
  <div class="custom_controllor">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-7">
          <div class="main_side_text">
            <div class="main_text">
              <div class="row">
                <div class="col-12">
                  <div class="sub_text">
                    &nbsp;<img src="blog.svg" width="70"> Blog Land
                  </div>
                </div>
                <div class="col-12">
                  <div class="box">
                    <span></span>
                    A <b>blog</b> (a truncation of the expression <b>"weblog"</b>) is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries <b>("posts")</b>. Posts are typically displayed in reverse chronological order, so that the most recent post appears first, at the top of the web page. Until 2009, blogs were usually the work of a single individual,[citation needed] occasionally of a small group, and often covered a single subject or topic. In the 2010s, <b>"multi-author blogs" (MABs)</b> have developed, with posts written by large numbers of authors and sometimes professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other "microblogging" systems helps integrate <b>MABs</b> and single-author blogs into the news media. Blog can also be used as a verb, meaning to maintain or add content to a blog.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
        <div class="col-5">
          <div class="login_form">
            <div class="form_controllor">
              <form method="post">
                <div class="row">
                  <div class="col-12">
                    <p style="font-size: 60px; text-align: center; font-family: Brush Script MT;">Login</p>
                  </div>
                  <div class="user_pass">
                    <div class="col-12">
                      <span style="font-style: italic; color: red;"><?php if (isset($errors['incorrect'])) {
                          echo $errors['incorrect'];
                        } ?></span>
                      <div class="username">
                        <p>Username:</p>
                        <input type="text" name="username" placeholder="Enter Username ...">
                        <span style="font-style: italic; color: red;"><?php if (isset($errors['username'])) {
                          echo $errors['username'];
                        } ?></span>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="password">
                        <p>Password:</p>
                        <input type="password" name="password" placeholder="Enter Password ...">
                        <span style="font-style: italic; color: red;"><?php if (isset($errors['password'])) {
                          echo $errors['password'];
                        } ?></span>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="btn_control">
                        <input type="submit" name="login" class="btn btn-primary btn-lg btn-block"></input>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="register">
                        <a href="register.php">Register here</a> for new account 
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>