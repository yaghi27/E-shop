<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discounts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="./shop.css">
    <?php include "header.php";?>
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
    <div class = "container">
        <div class = "promo">
            <h4>Promotions</h4>

        </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script type="text/javascript" src="./promo.js"></script>
</html>