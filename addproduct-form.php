<?php 
session_start();
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>neophile Ecommerce site</title>
  <base href="/">
  <!-- JQuery -->
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
</head>
<body>
         <div>
        <? include('searchbar.php'); ?>
        </div>
  <div class="container form">
    <center>
    <h1>Add product</h1></center>
    <hr>
    <form action="/products/addproduct-process.php" method="post" enctype="multipart/form-data">
      <div class="form-group">

   
        <label for="name">Name</label>
        <input type="text" class="form-control"  id="productname" name= "productname">
    
        <label for="Price">Price</label>
        <input type="text" class="form-control"   id="productprice" name= "productprice">
      
        <label for="image">Image</label>
        <input type='file' class="form-control-file" name='file' />
            
        <label for="description">Description</label>
        <textarea row="20" cols="50" class="form-control"   id="productdescription" name= "productdescription"></textarea>
      
        <label for="quantity">quantity</label>
        <input type="text" class="form-control"   id="productquantity" name= "productquantity">
      

      </div>
      <section>
        <button  class="btn btn-primary"  name="submit" type="submit" >add product</button>
        </section>
      <a href="products/editproduct.php">CLICK HERE TO EDIT OR DELETE</a>
    </form>

      

      <section>
      
      </section>
</div>
<div>
<? include('footer.php'); ?>
</div>
</body>
</html>

