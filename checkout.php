<?
session_start();
$user=$_SESSION['user'];
include('connect.php');

if(isset($_POST['price'])){
  $finalprice=$_POST['price'];
  $sql="INSERT INTO purchases(userid,price) VALUES('$user','$finalprice')";
  $result=mysqli_query($conn,$sql);
   
 
  $sql2 ="SELECT * from purchases where userid = '$user'ORDER BY purchaseid DESC limit 1";
  $result=mysqli_query($conn,$sql2);
  while($row = mysqli_fetch_assoc($result)){
    $purchaseid= $row['purchaseid'];
  }
  
  $query="SELECT * from cart where userid = '$user'";
  $result=mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result)){
    $productid=$row['productid'];
    $quantity=$row['quantity'];
    $sql="INSERT INTO purchaseditems(purchaseid,productid,quantity) VALUES('$purchaseid','$productid','$quantity')";
    $result=mysqli_query($conn,$sql);
  }

  $query="DELETE FROM cart WHERE userid='$user'";
  $result=mysqli_query($conn,$query);

  $sql2 ="SELECT * from purchaseditems  ORDER BY purchaseid DESC";
  $result=mysqli_query($conn,$sql2);
  while($row = mysqli_fetch_assoc($result)){
    $quantity=$row['quantity'];
    $productid=$row['productid'];

    $sql="SELECT * from products where productid='$productid'";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $remaining=$row['productcount'];
    }
   
        $currentquantity=$remaining-$quantity;
        $sql="UPDATE products SET productcount='$currentquantity' where productid='$productid'";
        $result=mysqli_query($conn,$sql);

  }

}

?>
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

<style>
#expiry
			{
			
				height: 30px;
				width: 400px;
				
				
			}
			#month
			{
				
				color: #000;
				height: 30px;
				width: 48%;
				float: left;
			}
			#year
			{
			
				color: #000;
				height: 30px;
				width: 48%;
				float: right;
			}		

      #main
			{
			
		
				
				
			}
			#creditcard-info
			{
        padding:10px;
				color: #000;
				width: 48%;
				float: left;
			}
			#shipping-info
			{
        padding:10px;
				color: #000;
				width: 48%;
				float: right;
			}		



</style>
<div id="main">

<div class="card" id="creditcard-info">
<center>
    <h1>Credit card information </h1></center>
    <hr>
<form action="/products/addproduct-process.php" method="post" enctype="multipart/form-data">
      <div class="form-group">

   
        <label for="name">Name on card :</label>
        <input type="text" class="form-control"  id="productname" name= "productname">
    
        <label for="Price">Card number :</label>
        <input type="text" class="form-control"   id="productprice" name= "productprice">
 
        <label for="quantity">Security code :</label>
        <input type="text" class="form-control"   id="productquantity" name= "productquantity">
       
     
        <div id="expiry">
          <div id="month" >
          Expiry Month :<input type="text" name="month"/>
          </div>
         <div id="year">
         Expiry Year: <input type="text" name="year"/>
        </div>

        </div>
        <br>
        <br>
        
      

      </div>
      <section>
        <button  class="btn btn-success"  name="submit" type="submit" >buy</button>
      </section>
    </form>
</div>

<? $sql="SELECT * from users where userid='$user'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $name=$row['username'];?>
<div class="card" id="shipping-info">
<center>
    <h1>Shipping Information</h1></center>
    <hr>

<div class="col-sm-5 col-xs-6 tital " >customer name :</div>
<div class="col-sm-7"><? echo $name; ?></div>          

<div class="clearfix"></div>
<hr style="margin:5px 0 5px 0;">


<div class="col-sm-5 col-xs-6 tital " >customer id :</div>
<div class="col-sm-7"><? echo $row['userid']; ?></h4></div>          

<div class="clearfix"></div>
<hr style="margin:5px 0 5px 0;">

<div class="col-sm-5 col-xs-6 tital " >Email</div><div class="col-sm-7"><? echo $row['useremail']; ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="clearfix"></div>
<hr style="margin:5px 0 5px 0;">

<div class="col-sm-5 col-xs-6 tital " >Shipping Address : </div><div class="col-sm-7"><? echo $row['useraddress']; ?></div>
</div>
 <div class="clearfix"></div>
<div class="bot-border"></div>
<br>
<br>
<br>
<br>

<? } ?>
</div>
</div>


<div>
<? include('footer.php'); ?>
</div>
</body>