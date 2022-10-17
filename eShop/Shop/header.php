<!-- <div class = "container"> -->
  <nav class="navbar navbar-expand-lg">
    <div class = "container">
        <div class="container-fluid" style="display: flex;">
            <a class="navbar-brand" href="#">Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars" style = "color:white"></i>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="shop.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Login/login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Shop/promo.php">Promotions</a>
              </li>
              <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){ ?>
                <li class = "nav-item">
                  <a class = "nav-link" id="Carts">Cart</a>
                </li>
                <li class = "nav-item">
                  <a class = "nav-link" href = "edit.php">Admin</a>
                </li>
                <li class = "nav-item">
                  <a class = "nav-link" id = "logout"  href = "">logout</a>
                </li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
  </nav>