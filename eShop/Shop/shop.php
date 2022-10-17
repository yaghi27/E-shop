<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="./shop.css">
    <title>Shop</title>
    <?php     include "header.php";?>
</head>
<body>
<div class="modal" id = "cart" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-shopping-cart"></i>
        <h5 class="modal-title">Cart</h5>
        <i class="far fa-times-circle closeIcon"></i>
      </div>
      <div class="modal-body">
        <div id = "cartBody">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary no2" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary buy">Proceed to step 2/3</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal" id="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div id = "header">

          </div>
          <i class="far fa-times-circle close"></i>
        </div>
        <div class="modal-body">
          <div id="body">

          </div>
          <div id="price">

          </div>
          <div id = "size">
            
          </div>
          <div>
              <p>Quantity: <input type= "number" id="qty" name = "qty" placeholder="1" style = "width:10%"></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary no" data-bs-dismiss="modal">Close <i class="far fa-times-circle"></i></button>
          <button type="button" class="btn btn-primary atc">Add to cart <i class="fas fa-cart-plus"></i></button>
        </div>
      </div>
    </div>
  </div>
    <div class = "container" style="text-align: center;">
      <?php
       if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){
      ?>
      <h5> Welcome back <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']?></h5>
      <?php } ?>
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart" style="text-align: center; margin-top:20px;margin-bottom:20px">Cart</button> -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../items/mcdo169.jpg" class="d-block w-100 imgc" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../items/shoes169.jpg" class="d-block w-100 imgc" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../items/fishing169.png" class="d-block w-100 imgc" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      
      <div class = "items">
          <div class = "category1">
            <h4>Food</h4>
            
          </div>
          <div class = "ruban">
            <p id = "ruban1"><i class="fas fa-plane"></i>
              Delivery to all over the world
            <i class="fas fa-globe-americas"></i></p>
          </div>
          <div class = "category2">
            <h4>Clothes</h4>
            
          </div>
          <div class="parallax"></div>
          
          <div class = "row" style="margin-top: 35px;">
            <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12">
              <div class="card" style="width: 18rem;">
                <img src="../items/PP+.png" class="card-img-top cartImg" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Login</h5>
                  <p class="card-text">Explore our wide range of premium products.</p>
                  <a href="../Login/login.php" class="btn btn-primary">Create an account</a>
                </div>
              </div>
            </div>
            <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12">
              <div class="card" style="width: 18rem;">
                <img src="../items/percentage.png" class="card-img-top cartImg" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Promotions</h5>
                  <p class="card-text">Sales on top selling products up to 30% .</p>
                  <a href="./promo.php" class="btn btn-primary">See our promotions</a>
                </div>
              </div>
            </div>
            <div class = "col-xl-4 col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 40px;">
              <div class="card" style="width: 18rem;">
                <img src="../items/sc.png" class="card-img-top cartImg" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Check your cart</h5>
                  <p class="card-text">The cart is where all your products are saved after step 1.</p>
                  <a id="Carts" class="btn btn-primary">Cart</a>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="./shop.js"></script>  
</html>