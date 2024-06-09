<?php
  session_start();
  
  if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  {
    header('Location: register.php');
  }
  include "includes/dbconnect.php";
?>

<!DOCTYPE html>
<html>
  <?php include "includes/css_header.php";
        if(($_SESSION['email']=="admin@mangola.com"))
        {
          include "includes/header_admin.php";
        }
        else
        {
        include "includes/header_postlogin.php";
        }
   ?>
<body style="background-image: url('images/bg.jepg'); !important">
  

  <div class="container ">
    <h5 class="text-center font-80px margin-bottom50"> <b>Welcome <?php echo $_SESSION['name']; ?> to the best brand of the world</h5>

    <!--All products with 3/12 parts each-->
    <div class="row">
      <?php 
        $query="SELECT * FROM `products`";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<div class="col-md-3">
                  <div class="product-tab">
                    <img src="images/'.$row['product_image'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['product_name'].'</b></h3>
                    <p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp '.$row['product_description'].'</i></b></p>
                    <a href="product_description.php?product_id='.$row['product_id'].'" class="btn btn-block btn-success"> View Details </a>
                  </div>
                </div>';
        }
      ?>
             
    </div> <!--Products dispaly Ends-->

    <div class="row">
      
      <!--Bio-Section in 10/12 parts-->
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-12 bio-tab">
            <div class="row">
              <div class="col-md-4">
                <img src="images/mangola2.jpg" class="img-size img-circle">
              </div>

              <div class="col-md-8">
                <h1 class="text-center"> <b>About Our Store</b> </h1>
                <p>&nbsp&nbsp&nbsp&nbsp<b><i>International Brand Cara ensures you to provide best prorducts in lower price. It also ensures you to better quality and best after sales service in the market.<br> Soon we are focusing on various markets and country in the world.You can also get our products from our authorized local dealer </i></b></p>  
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <img src="images/wallpaper1.jpg" class="img-size-lg">
          </div>

        </div>
      </div>

      <!--List of items in 2/12 parts-->
      <div class="col-md-2">
        <h2 class="text-center"><b>Also Buy</b></h2>
        <div class="row">
        <?php 
          $query1="SELECT * FROM `products`";
          $result1=mysqli_query($connection,$query);
          while($row1=mysqli_fetch_assoc($result1))
          {
            echo '<div class="col-md-12">
                    <div class="row list hover-pink">
                      
                      <div class="col-md-6">
                        <a href="product_description.php?product_id='.$row1['product_id'].'">
                        <img src="images/'.$row1['product_image'].'" class="img-size-xs">
                        </a>
                      </div>

                      <div class="col-md-6">
                        <b>'.$row1['product_name'].'</br><br>
                        <small>$.'.$row1['product_price'].'</small>
                      </div>

                    </div>            
                  </div>';
          }         
        ?>
        </div>
      </div>     
    </div>

    <?php include "includes/footer.php"; ?>
   
  </div>
</body>
</html>