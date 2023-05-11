<?php
include('connect.php'); 
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
  $username = $_POST['username'];
  $useremail = $_POST['useremail'];
  $userpassword=$_POST['userpassword'];
  $confirmpassword=$_POST['confirmpassword'];
  $address=$_POST['address'];
  $userrole="user";
  
  //storind the data in your database
  $sql="INSERT into users(
      username,useremail,useraddress,userpassword,userrole) 
      values ('$username','$useremail','$address','$userpassword','$userrole')";
  $query = mysqli_query($conn,$sql);
  header( "Refresh:1; url=signin.php", true, 303);
  }
  else{
  echo "<p>Registration failed</p>";
  }
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
 
 <body>

 <div>
<? include('searchbar.php'); ?>
</div>
<div class="container form">
  <article class="card-body mx-auto" style="width: 1200px;">
    <h4 class="card-title mt-3 text-center">Create Account</h4>
    <p class="text-center">Get started with your free account</p>
    
    <form action="products/signup.php" method="post">
    <div class="form-group input-group">
      <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
       </div>
          <input class="form-control" type="text" placeholder="Full name"  id="username" name= "username">
      </div> <!-- form-group// -->
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
       </div>
          <input class="form-control" type="email" placeholder="Email address"  id="useremail" name= "useremail">
      </div> <!-- form-group// -->
     
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
      </div>
          <input class="form-control" type="password" placeholder="Create password"  id="userpassword" name= "userpassword">
      </div> <!-- form-group// -->
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
      </div>
          <input class="form-control" type="password"   id="confirmpassword" name= "confirmpassword" placeholder="Reenter password">
      </div> <!-- form-group// -->   

      <div class="form-group input-group">
      <div class="input-group-prepend">
          <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
       </div>
          <input class="form-control" type="text" placeholder="address"  id="address" name= "address">
      </div> 
        <br>                                  
      <div class="form-group">
          <button class="btn btn-primary btn-block" name="submit" type="submit"> Create Account  </button>
      </div> <!-- form-group// -->      
      <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
  </form>
  </article>
  </div> <!-- card.// -->
  <div>
<? include('footer.php'); ?>
</div>
</body>