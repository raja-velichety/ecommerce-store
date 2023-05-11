<?php
session_start();
include("connect.php");
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
<?
if(isset($_POST['quantity'])){
    $quantity=$_POST['quantity'];
    $productid=$_POST['id'];
    $productname=$_POST['productname'];
    $productprice=$_POST['productprice'];
    $sql="UPDATE products SET productcount='$quantity',productname='$productname',productprice='$productprice' where productid='$productid'";
    $result=mysqli_query($conn,$sql);
}

if(isset($_POST['delete'])){
    $productid=$_POST['delete'];
    // $sql="SELECT * from products where productid='$productid'";
    // $result=mysqli_query($conn,$sql);
    // while($row = mysqli_fetch_assoc($result)){
    //     $remaining=$row['productcount'];
    // }
    // if($remaining>1){
    //     $currentquantity=$remaining-1;
    //     $sql="UPDATE products SET productcount='$currentquantity' where productid='$productid'";
    // }
    // else{}
    $sql="DELETE from products where productid='$productid'";
    $result=mysqli_query($conn,$sql);
}

$query="SELECT * from products";
$result=mysqli_query($conn,$query);

?>
<div class="container mb-4" >
<center>
    <h1>Edit Product</h1></center>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product Image </th>
                            <th scope="col">Product Name</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody >
                    <? 
                        while($row = mysqli_fetch_assoc($result)){
                         $imgsrc="products/uploads/".$row["productimage"];
                    ?>
                        <tr>
                            <form method="post" action="products/editproduct.php">
                            <td><img src="<?echo $imgsrc;?>" width="200px" height="200px"/> </td>
                            <td><input type="text"  name="productname" value="<? printf ("%s",$row["productname"]);?>"/></td>
                            
                            <td><input type="text"  name="quantity" value="<? printf ("%s",$row['productcount']);?>"/></td>
                            <td class="text-right"><input type="text"  name="productprice" value="<? printf ("%s",$row["productprice"]);?>"/></td>
                            <td class="text-right"><button class="btn btn-sm btn-primary" type="submit" name="id" value="<? printf ("%s",$row['productid']);?>"><i class="fas fa-edit"></i></button></td>
                            </form>

                            <form method="post" action="products/editproduct.php">
                            <td class="text-right"><button class="btn btn-sm btn-danger" type="submit" name="delete" value="<? printf ("%s",$row['productid']);?>"><i class="fa fa-trash"></i> </button> </td>
                            </form>
                        </tr>
                        <? } ?>    
                        </tbody>
                        </table>
                        </div>
                        </div>
                        </div>
                        </div>



<div>

<? include('footer.php'); ?>

</div>