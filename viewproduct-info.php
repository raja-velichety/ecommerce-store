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

<? include('searchbar.php'); ?>

<?php
$productid=$_GET['submit'];
if(isset($productid)){
$sql="SELECT * from products where productid='$productid'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	$imgsrc="products/uploads/".$row["productimage"];


?>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
<div *ngFor="let item of product">
<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container" >	
				<div class="col-md-12">
         
         
					<div class="product col-md-6">
                    
              
							<img  src="<?echo $imgsrc;?>" height="200px" width="200px" style="object-fit: contain;" />
						
					</div>
					
				
					
				<div class="col-md-6">
				<form action="products/cart.php" method="get">
					<div class="product-title"><? printf ("%s",$row["productname"]);?></div>
					<div class="product-rating"><i class="fas fa-star"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price"><? printf ("%s",$row["productprice"]);?></div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="product-desc"><? printf ("%s",$row["productdescription"]);?></div>
					<div class="btn-group cart">
						<button type="button" class="btn btn-success">
							Buy Now
						</button>
					</div>
					<div class="btn-group wishlist">
						<button type="submit" name="cart" id="cart" value="<?= $row["productid"] ?>" class="btn btn-danger">
							Add to cart
						</button>
						
					</div>

				</form>
				</div>
				</div>
			</div> 
		</div>
		
</div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<? }}
include('footer.php'); 
?>