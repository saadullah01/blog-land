<?php
include "conn.php";
?>

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
  $check = $_POST['check'];

  if ($fname == null) {
    $errors['fname'] = "This field is required";
  }
  if ($lname == null) {
    $errors['lname'] = "This field is required";
  }
  if ($email == null) {
    $errors['email'] = "This field is required";
  }
  if ($password == null) {
    $errors['password'] = "This field is required";
  }
  if ($username == null) {
    $errors['username'] = "This field is required";
  }
  if ($contact_no == null) {
    $errors['contact_no'] = "This field is required";
  }
  if ($address == null) {
    $errors['address'] = "This field is required";
  }
  if ($city == null) {
    $errors['city'] = "This field is required";
  }
  if ($country == null) {
    $errors['country'] = "This field is required";
  }
  if ($check == null) {
    $errors['check'] = "This field is required";
  }

  // print_r($contact_no);

  if($errors == null) {
    $sql = mysqli_query($conn, "
      INSERT INTO register 
      (
      fname, 
      lname, 
      email, 
      password, 
      username, 
      contact_no, 
      zip_code, 
      address, 
      city, 
      country
      ) 
      VALUES 
      (
      '$fname', 
      '$lname', 
      '$email', 
      '$password', 
      '$username', 
      '$contact_no', 
      '$zip_code', 
      '$address', 
      '$city', 
      '$country'
      )
      ");

    if ($sql) {
      // print_r($sql);
     ?> <p style="color: white; text-align: center;"> <?php  echo "Data Saved"; ?> </p> <?php 
   }
   else {
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
  <link rel="stylesheet" type="text/css" href="Style.css">

  <title>Blog Land | Rregistry Form</title>
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
  margin-top: 4%;
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
  padding: .5rem 10rem;
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
.checkbox {
  width: 87%;
  margin: 0 auto;
  text-align: left;
  margin-top: 5%;
  font-size: 16px;
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
    <div class="main_custom_2">
     <div class="container">
       <div class="custom_2">
         <div class="row">
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>First Name:</p>
               <input type="text" name="fname" placeholder="First Name Here ...">
               <?php
               if (isset($errors['fname'])) {
                 echo $errors['fname'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Last Name:</p>
               <input type="text" name="lname" placeholder="Last Name Here ...">
               <?php
               if (isset($errors['lname'])) {
                 echo $errors['lname'];
               }
               ?>
             </div>
           </div>
           <div class="col-12">
             <div class="input_space_special">
               <p><span style="color: red; font-size: 25px;">*</span>E-mail:</p>
               <input type="email" name="email" placeholder="Your Email Here ...">
               <?php
               if (isset($errors['email'])) {
                 echo $errors['email'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Password:</p>
               <input type="password" name="password" placeholder="Password Here ...">
               <?php
               if (isset($errors['password'])) {
                 echo $errors['password'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span> Username:</p>
               <input type="text" name="username" placeholder="Username Here ...">
               <?php
               if (isset($errors['username'])) {
                 echo $errors['username'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Contact #:</p>
               <input type="tel" name="contact_no" placeholder="Contact # Here ...">
               <?php
               if (isset($errors['contact_no'])) {
                 echo $errors['contact_no'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p>Zip Code:</p>
               <input type="digit" name="zip_code" placeholder="Zip Code Here ...">
             </div>
           </div>
           <div class="col-12">
             <div class="input_space_special">
               <p><span style="color: red; font-size: 25px;">*</span>Address:</p>
               <input type="text" name="address" placeholder="Your Address Here ...">
               <?php
               if (isset($errors['address'])) {
                 echo $errors['address'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>City:</p>
               <input type="text" name="city" placeholder="City Name Here ...">
               <?php
               if (isset($errors['address'])) {
                 echo $errors['address'];
               }
               ?>
             </div>
           </div>
           <div class="col-sm-12 col-md-6">
             <div class="input_space">
               <p><span style="color: red; font-size: 25px;">*</span>Country:</p>
               <input type="text" name="country" placeholder="Country Name Here ...">
               <?php
               if (isset($errors['country'])) {
                 echo $errors['country'];
               }
               ?>
             </div>
           </div>
           <div class="col-12">
             <div class="checkbox">
              <?php
              if (isset($errors['check'])) {
               echo $errors['check'];
             }
             ?>
             <input type="checkbox" name="check" id="myCheck" onclick="myFunction()"> &nbsp;By checking this checkbox you agree to the <a href="#">Terms & Policies</a> of Blog Land
             
             <?php
             if ($errors == null) {
              ?>
              <p id="text" style="display:none">You have completed the form!</p>
              <?php
            }
            ?>
          </div>
        </div>
        <div class="submit_btn_control">
          <div class="col-12">
            <div class="sub_btn">
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Submit"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
  function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>