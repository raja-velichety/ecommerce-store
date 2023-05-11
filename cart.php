<?php
session_start();
if(isset($_SESSION['user'])){
    $userid=$_SESSION['user'];
    $currentquantity=0;
    $quantity=0;
?>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<? include('connect.php'); ?>
<div>
<? include('searchbar.php'); ?>
</div>
<?php
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
    $sql="DELETE from cart where productid='$productid'";
    $result=mysqli_query($conn,$sql);
}
if(isset($_GET['cart'])){ 
$productid=$_GET['cart'];


$sql="SELECT * from cart where userid='$userid' and productid ='$productid'";
$quantityresult=mysqli_query($conn,$sql);
if(mysqli_num_rows($quantityresult)>0){
    
    while($row = mysqli_fetch_assoc($quantityresult)){                               
        $currentquantity=$row["quantity"];
    }
    $quantity=$currentquantity+1;
$query="UPDATE cart SET 
    productid = '$productid',userid= '$userid',quantity= '$quantity'
    where userid='$userid' and productid ='$productid' ";
}else{
    $quantity=1;
    $query="INSERT into cart(
        productid,userid,quantity) 
        values ('$productid','$userid','$quantity')"; 
}


$addresult=mysqli_query($conn,$query);
$query="SELECT * from cart where userid=$userid";
$cartresult=mysqli_query($conn,$query);

?>
<div class="container mb-4" >
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody >
                    <? $totalprice=0;
                       $shipping=5;
                        while($row = mysqli_fetch_assoc($cartresult)){
                         $productid=$row['productid'];
                        $sql="SELECT * from products where productid='$productid'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $imgsrc="products/uploads/".$row["productimage"];
                    ?>
                        <tr>
                
                            <td><img src="<?echo $imgsrc;?>" width="200px" height="200px" style="object-fit: contain;"/> </td>
                            <td><? printf ("%s",$row["productname"]);?></td>
                            <td>In stock</td>
                           <? $sql1="SELECT quantity from cart where productid='$productid' and userid ='$userid' ";
                           
                           $result1=mysqli_query($conn,$sql1);
                           while($row1 = mysqli_fetch_assoc($result1)){
                           ?>

                            <td><? $quantity=$row1['quantity'];printf ("%s",$row1['quantity']);
                            }
                            ?></td>
                            <td class="text-right"><? $totalprice+= $row["productprice"]*$quantity;
                            printf ("%s",$row["productprice"]);?></td>
                            
                            <form method="post" action="products/cart.php">
                            <td class="text-right"><button class="btn btn-sm btn-danger" type="submit" name="delete" value="<? printf ("%s",$row['productid']);?>"><i class="fa fa-trash"></i> </button> </td>
                            </form>
                        </tr>
                    
                        <? } }?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><? echo $totalprice; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right"><? echo $shipping; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?$price= $totalprice+$shipping; echo $price ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="products/viewproduct.php" class="btn btn-block btn-light">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <form action="products/checkout.php" method="post">
                <button type="submit" name="price" class="btn btn-lg btn-block btn-success text-uppercase" value="<? echo $price ?>">Checkout</button>
                </form> 
                </div>
            </div>
        </div>
</div>
<div>

<?}
else{
        $query="SELECT * from cart where userid=$userid";
        $cartresult=mysqli_query($conn,$query);
        
?>
<div class="container mb-4" >
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody >
                    <? $totalprice=0;
                       $shipping=5;
                        while($row = mysqli_fetch_assoc($cartresult)){
                         $productid=$row['productid'];
                        $sql="SELECT * from products where productid='$productid'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $imgsrc="products/uploads/".$row["productimage"];
                    ?>
                        <tr>
                
                            <td><img src="<?echo $imgsrc;?>" width="200px" height="200px" style="object-fit: contain;"/> </td>
                            <td><? printf ("%s",$row["productname"]);?></td>
                            <td>In stock</td>
                            <? $sql1="SELECT quantity from cart where productid='$productid' and userid ='$userid' ";
                           
                           $result1=mysqli_query($conn,$sql1);
                           while($row1 = mysqli_fetch_assoc($result1)){
                           ?>
                            <td><?  $quantity=$row1['quantity'];printf ("%s",$row1['quantity']);
                            }
                            ?></td>

                            <td class="text-right"><?$totalprice+= $row["productprice"]*$quantity;
                            printf ("%s",$row["productprice"]);?></td>
                            
                            <form method="post" action="products/cart.php">
                            <td class="text-right"><button class="btn btn-sm btn-danger" type="submit" name="delete" value="<? printf ("%s",$row['productid']);?>"><i class="fa fa-trash"></i> </button> </td>
                            </form>                            
                        </tr>
                    <? } }?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"><? echo $totalprice; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right"><? echo $shipping; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><? $price= $totalprice+$shipping; echo $price ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="products/viewproduct.php" class="btn btn-block btn-light">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <form action="products/checkout.php" method="post">
                <button type="submit" name="price" class="btn btn-lg btn-block btn-success text-uppercase" value="<? echo $price ?>">Checkout</button>
                </form>
                </div>
            </div>
        </div>
    
</div>
<div>
<?}?>
<? include('footer.php'); ?>
</div>
</body> 
<? }else{
    header( "Refresh:1; url=signin.php", false, 303);
} ?>