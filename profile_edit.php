<?php 
session_start();
?>

<?php
include "conn.php";
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

  <title>Profile Edit</title>
</head>

<style>
body, html {
  width: 100%;
}
body {
  background-color: #121212; 
}
.main_custom {
  margin-top: 3%;
}
.custom {
  background-color: white;
  opacity: .89;
  border-radius: 10px 50px 10px 10px;
  padding: 1.5% 0;
}
.main_custom_2 {
  margin-top: 2%;
  margin-bottom: 3%;
}
.custom_2 {
  background-color: white;
  opacity: .89;
  border-radius: 10px 10px 50px 10px;
  padding: 2% 0 3% 0;
}
.input_space {
  width: 75%;
  margin: 0 auto;
  margin-top: 3%;
}
.input_space_special {
  width: 88%;
  margin: 0 auto;
  margin-top: 2%;
}
p {
  margin: 0 auto;
  font-family: Brush Script MT;
  font-size: 35px;
}
.input_space input {
  width: 100%;
  border: 1px solid black;
  border-radius: 10px;
  text-align: center;
  height: 42.5px;
  background-color: #EBEDEF;
  font-size: 18px;
  font-style: italic;
}
.input_space_special input {
  width: 100%;
  border: 1px solid black;
  border-radius: 10px;
  text-align: center;
  height: 42.5px;
  background-color: #EBEDEF;
  font-size: 18px;
  font-style: italic;
}
.submit_btn_control {
  margin: 0 auto;
  margin-top: 5%;
  text-align: center;
  width: 35%;
  text-align: center;
}
.submit_btn_control .btn-primary {
  color: #fff;
  background-color: #000000;
  border-color: #000000;
}
.submit_btn_control .btn_control .btn-group-lg>.btn, .btn-lg {
  padding: .5rem 8rem;
  font-size: 1.25rem;
  line-height: 1;
  border-radius: .3rem;
  height: 55px;
}
.sub_btn {
  margin: 0 auto;
  text-align: center;
  width: 100%;
}

@media only screen and (max-width: 767px) {
  .input_space_special {
    width: 75%;
  }
}

</style>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<body>
  <div class="main_custom">
    <div class="container">
      <div class="custom">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="f-45" style="font-family: Brush Script MT;">
              &nbsp;<img src="blog.svg" width="70"> Blog Land
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="d-flex justify-content-end align-items-center pr-30 f-45">
              <span style="font-family: Brush Script MT;">Registeration Form</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form method="post">
    <?php

  // print_r($contact_no);
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM register WHERE id = '$user_id'";
    $store = $conn->query($sql);
    $row = $store->fetch_assoc();


    ?>
    <div class="main_custom_2">
     <div class="container">
       <div class="custom_2">
         <div class="row">
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>First Name:</p>
               <input type="text" name="fname" placeholder="First Name Here ..." value="<?php echo $row['fname']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Last Name:</p>
               <input type="text" name="lname" placeholder="Last Name Here ..." value="<?php echo $row['lname']; ?>">
             </div>
           </div>
           <div class="col-12">
             <div class="input_space_special">
               <p><span style="color: red; font-size: 25px;">*</span>E-mail:</p>
               <input type="email" name="email" placeholder="Your Email Here ..." value="<?php echo $row['email']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Password:</p>
               <input type="password" name="password" placeholder="Password Here ..." value="<?php echo $row['password']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span> Username:</p>
               <input type="text" name="username" placeholder="Username Here ..." value="<?php echo $row['username']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Contact #:</p>
               <input type="tel" name="contact_no" placeholder="Contact # Here ..." value="<?php echo $row['contact_no']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p>Zip Code:</p>
               <input type="digit" name="zip_code" placeholder="Zip Code Here ..." value="<?php echo $row['zip_code']; ?>">
             </div>
           </div>
           <div class="col-12">
             <div class="input_space_special">
               <p><span style="color: red; font-size: 25px;">*</span>Address:</p>
               <input type="text" name="address" placeholder="Your Address Here ..." value="<?php echo $row['address']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>City:</p>
               <input type="text" name="city" placeholder="City Name Here ..." value="<?php echo $row['city']; ?>">
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Country:</p>
               <input type="text" name="country" placeholder="Country Name Here ..." value="<?php echo $row['country']; ?>">
             </div>
           </div>
           <div class="submit_btn_control">
             <div class="col-12">
               <div class="sub_btn">
                 <input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Save Changes"></input>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </form>

 <?php 
 $errors = array();
 if (isset($_POST['save'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $contact_no = $_POST['contact_no'];
  $zip_code = $_POST['zip_code'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];

  if($errors == null) {
    $update_sql = mysqli_query($conn, "
      UPDATE register SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', username = '$username', contact_no = '$contact_no', zip_code = '$zip_code', address = '$address', city = '$city', country = '$country' WHERE id = '$user_id'");

    if ($update_sql) {
      // print_r($sql);
     ?> <p style="color: white; text-align: center;"> <?php echo "Data Saved"; ?> </p> <?php
     echo "<meta http-equiv='refresh' content='0'>";
   }
   else {
    echo $conn->error;
  }
}

}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>