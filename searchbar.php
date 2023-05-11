<head>
  <meta charset="utf-8">
  <title>Retail site</title>
  <base href="/">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<style>
          .header{
            width:available;
            padding-top:10px;
            
           
          }
          .start{
            float:left;
          }
          .middle{
          
          }
        .end{
          float:right;
        }
        li{
          display: inline-block;
        }
</style>
<? include('connect.php'); ?>
<div class="header bg-primary" style="color:white;" >
          <ul>
          <li class="start col-md-3">
          <section>
          <ul> 
          <li>   
          <a style="color:white;" href="products/viewproduct.php"><h3>retailstore.com</h3></a>
          </li>
          </ul>
          </section>
          </li>

          <li class="middle col-md-6">
          <form action="products/viewproduct.php" method="get">
          <section>
              <ul>
              <li style="width:80%;">
              <input type="text"   class="form-control" placeholder="Search by product name" id="search"  name= "search">
              </li>
              <li>
              <button type="submit"  class="btn btn-primary btn-lg"><span class="fas fa-search"></span></button>
              </li> 
              </ul>
          </section>
          </form>
          </li>
      
          <li class="end col-md-3">
          <section>
            
                <a href="products/cart.php" class="btn btn-lg"><span class="fas fa-shopping-cart"></span></a>
                <a href="products/signin.php" class="btn btn-lg"><span class="fas fa-user lg" ></span></a>
                <a href="products/logout.php" class="btn btn-lg"><span class="fas fa-power-off" ></span></a>

          </section>
        </li>
      </ul>
      </div>
      

