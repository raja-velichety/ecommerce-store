<?php
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <title>neophile Ecommerce site</title>
  <base href="/">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>


<div>
<? include('searchbar.php'); ?>
</div>
       
        <div class="container form">
         
        <div class="row">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "satya1997";
        $dbname = "retailstore";
        
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        if(!isset($_GET['search'])){
         $query = "SELECT * FROM products";
         $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            $imgsrc="products/uploads/".$row["productimage"];
        ?>
        <div class="col-md-3">
                        
        <div class="card mb-3 shadow-sm">
          <form action="products/viewproduct-info.php" method="get">
            <img src="<?echo $imgsrc;?>" width="200px" height="200px" style="object-fit: contain;">
          <figcaption class="info-wrap">      
              <h4 class="title"><? printf ("%s",$row["productname"]);?></h4>

          </figcaption>
          <div class="bottom-wrap">
            <div class="price-wrap h5">
              <span class="price-new"><? printf ("%s",$row["productprice"]);?></span>
            </div>
            
            <div class="btn-group wishlist">
						<button type="submit" name="submit" id="submit"  class="btn btn-success" value="<?= $row["productid"] ?>">
							order now
						</button>
					</div>
          </div> 
        </form>
        </div>
         <br>
         <br>
        </div>
         <?}?>
         <?}else{
           $search=$_GET['search'];
           $query = "SELECT * FROM products where productname like '%$search%' or productdescription like '%$search%'";
           $result = mysqli_query($conn,$query);
          while($row = mysqli_fetch_assoc($result)){
            $imgsrc="products/uploads/".$row["productimage"];
           
         ?>
         <div class="col-md-3">
                        
                        <div class="card mb-3 shadow-sm">
                          <form action="products/viewproduct-info.php" method="get">
                            <img src="<?echo $imgsrc;?>" style="width: 100%;height: 220px;object-fit: contain;">
                          <figcaption class="info-wrap">      
                              <h4 class="title"><? printf ("%s",$row["productname"]);?></h4>
                
                          </figcaption>
                          <div class="bottom-wrap">
                            <div class="price-wrap h5">
                              <span class="price-new"><? printf ("%s",$row["productprice"]);?></span>
                            </div>
                            
                            <div class="btn-group wishlist">
                            <button type="submit" name="submit" id="submit"  class="btn btn-success" value="<?= $row["productid"] ?>">
                              order now
                            </button>
                          </div>
                          </div> 
                        </form>
                        </div>
                         <br>
                         <br>
                         <br>
                         <br> <br>
                         <br> <br>
                         <br>
                        </div>
                        <?}?>
            <?}?>
          
       
        
  
  </div>
</div>

<div>
<? include('footer.php'); ?>
</div>


</body>
</html>