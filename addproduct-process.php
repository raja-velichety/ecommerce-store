<?php
include("connect.php");
include("imageupload.php");


$check="DESCRIBE products";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productdescription=$_POST['productdescription'];
    $productcount=$_POST['productquantity'];
    
    //storind the data in your database
    $sql="INSERT into products(
        productname,productprice,productdescription,productimage,productcount) 
        values ('$productname','$productprice','$productdescription','$name','$productcount')";
    $query = mysqli_query($conn,$sql);

   
    echo "Your add has been submited, you will be redirected to page in 2 seconds....";
    header( "Refresh:2; url=addproduct-form.php", true, 303);
 
   
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
    }
    else{
    $sql = "CREATE TABLE products(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    productname VARCHAR(30) NOT NULL UNIQUE,
    productprice INT NOT NULL,
    productdescription VARCHAR(120),
    productimage VARCHAR(150)
    )";
    if(mysqli_query($conn, $sql)){
        echo "Table created successfully.";
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

if(isset($_POST['submit'])){ 
    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productdescription=$_POST['productdescription'];
    $productcount=$_POST['productquantity'];
   
    //storind the data in your database
    $sql="INSERT into products(
        productname,productprice,productdescription,productimage,productcount) 
        values ('$productname','$productprice','$productdescription','$name','$productcount')";
    $query = mysqli_query($conn,$sql);

      
    echo "Your add has been submited, you will be redirected to page in 2 seconds....";
    header( "Refresh:2; url=addproduct-form.php", true, 303);
 
    if($productname !=''||$brand !=''){
   
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
    }
}



$conn->close();
?>