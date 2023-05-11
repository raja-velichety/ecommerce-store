<?php
$userid=$_SESSION['user'];
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
<style>



#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	
</style>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
	
		
        
        
       

<div class="panel panel-default">
  <div class="panel-heading"><h4>User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                </div>
              <br>
            </div>
         
            <? if(isset($_POST['editprofile'])){
                  
                  $username=$_POST['username'];
                  $email=$_POST['email'];
                  $address=$_POST['address'];
                  $sql="UPDATE users SET username='$username',useremail='$email',useraddress='$address' where userid='$userid'";
                  $result=mysqli_query($conn,$sql);
                }
               $query="SELECT * from users where userid=$userid";
               $result=mysqli_query($conn,$query);
               while($row = mysqli_fetch_assoc($result)){
               $name=$row['username'];
                ?>
<form method="post" action="products/signin.php">
<div class="col-sm-5 col-xs-6 tital " >Username</div><div class="col-sm-7"><input type="text"  name="username" class="form-control" value="<? echo $name; ?>"/></div>
                     
<div class="clearfix"></div>
<div class="bot-border"></div>
    
              


<div class="col-sm-5 col-xs-6 tital " >Email</div><div class="col-sm-7"><input type="text"  class="form-control" name="email" value="<? echo $row['useremail']; ?>"/></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address</div><div class="col-sm-7"><input type="text"  class="form-control" name="address" value="<? echo $row['useraddress']; ?>"/></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<td class="text-right"><button class="btn btn-sm btn-primary" type="submit" name="editprofile" value="<? printf ("%s",$row['productid']);?>"><i class="fas fa-edit"></i></button></td>

<? } ?>
 
<hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " >your orders</div>
<hr style="margin:5px 0 5px 0;">
<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">purchaseid </th>
                            <th scope="col">date of purchase</th>
                            <th scope="col">order price </th>
                           
                        </tr>
                    </thead>
                    <tbody >
                    <?  
                        $query="SELECT * from purchases where userid=$userid";
                        $cartresult=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_assoc($cartresult)){
                         
                        
                    ?>
                        <tr>
                            <form method="post" action="products/signin.php">
                            <td><button type="submit" name="purchaseid" value="<? echo $row['purchaseid']; ?>"><? echo $row['purchaseid']; ?></button> </td>
                            </form>
      
                            <td><? echo $row['dateandtime']; ?></td>
                            <td><? echo $row['price']; ?></td>
                            <td></td>
                            
                        </tr>
                    <? } ?>
                     
                    </tbody>
</table>


<? if(isset($_POST['purchaseid'])){ 
  
  $purchaseid=  $_POST['purchaseid'];
?>

<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">quantity</th>
                            <th scope="col">product image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                           

                           
                        </tr>
                    </thead>
                    <tbody >
                    <?  
                        $sql="SELECT * from purchaseditems where purchaseid='$purchaseid'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                      
                        <tr>
                        <td><? printf ("%s",$row["quantity"]);
                              $pid=$row["productid"];?></td>
                               <?$sql="SELECT * from products where productid='$pid'";
                              $result=mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_assoc($result)){
                                $imgsrc="products/uploads/".$row["productimage"];
                                ?>
                            <td><img src="<?echo $imgsrc;?>" width="200px" height="200px" style="object-fit: contain;"/> </td>
                            <td><? printf ("%s",$row["productname"]);?></td>
                            <td><? echo $row['productprice']; ?></td>
                            <td></td>
                            
                        </tr>
                    <? }} ?>
                     
                    </tbody>
</table>

<? } ?>

</div>
</div>
             
</div> 
</div>
</div>  