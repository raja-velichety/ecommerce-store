<?php
session_start();
include('connect.php'); 
if(isset($_POST['submit'])){
$useremail=$_POST['email'];
echo $useremail;
$userpassword=$_POST['password'];
echo $userpassword;
$sql="SELECT  * from users where useremail='$useremail' and userpassword='$userpassword'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
if(isset($row)){
  $_SESSION['user']=$row['userid'];
  if('admin'==$row['userrole']){
    
    echo '<script> window.location.href="addproduct-form.php";</script>';
  }
  else{
    echo '<script> window.location.href="viewproduct.php";</script>';
    }
}
}
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
<!------ Include the above in your HEAD tag ---------->


		
<!-- Mixins-->
<body>
<? include('connect.php'); ?>
<div>
<? include('searchbar.php'); ?>
</div>

<? if(isset($_SESSION['user'])): ?>

  <? include('userprofile.php'); ?>


<? else: ?>
<div class="container form" style="padding-top:150px;padding-bottom:150px;">
  
  
    <h1 class="title">sign in</h1>
    
    <form action="products/signin.php" method="POST">
        <div class="form-group">
      <div class="input-container">
      <label for="email">Username</label>
        <input type="text" class="form-control" id="email" placeholder="enter email id"  name= "email" required="required"/>
        
        <div class="bar"></div>
      </div>
      <div class="input-container">
      <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="enter password"  name= "password"required="required"/>
        
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit" id="submit" class="btn btn-primary" >Signin</button>
      </div>
      <a href="products/signup.php/">new here??? signup now!!!</a>
        </div>
      
    </form>
  </div>
<? endif; ?>
  <div>
<? include('footer.php'); ?>
</div>
</body>

  

