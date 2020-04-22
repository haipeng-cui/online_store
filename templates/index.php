<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="templates/style.css">
    <link
    href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
    rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="templates/aria-menu.js"></script>
    <title>Haipeng Camera shop</title>
  </head>
  <body>

      <!--Header-->
      <header class="app-header">
        <div class="menu_aria"> 
          <a
            role="button"
            aria-haspopup="true"
            aria-controls="main-menu"
            href="#"
            >Menu</a
          >
          <ul role="menu" aria-labelledby="main-menu" id="main-menu">
            <li role="none presentation">
              <a   href="templates/orders.php" role="menuitem" tabindex="-1">Order</a>
            </li>

            <li role="none presentation">
              <a href="templates/maintain.php" role="menuitem" tabindex="-1">Maintain</a>
            </li>

            <li role="none presentation">
              <a href="templates/login.php" role="menuitem" tabindex="-1">Login</a>
            </li>

            <li role="none presentation">
              <a href="index.php" role="menuitem" tabindex="-1">Home</a>
            </li>
          </ul>
        </div>
        <?php include 'database/database.php';
              display_session();
        ?>   
        <form action="index.php" method="post"> 
          <input type="submit" name="logout" value="logout" /> 
        </form>
        <div class="showuser"><a href="templates/Sources.php">Sources</a></div>
        <div class="showuser"><a href="templates/Documentation.php">Documentation​</a></div>

        <div class="container">
          <h2> Haipeng's Camera Shop</h2>
          <div><img src="templates/img/logo.png" alt="" class="logo" /></div>
        </div>
      </header>
      <!--Header-->
      
     
      <nav class="navbar">
        <ul>
          <li>
            <i class="fa fa-map-marker"></i>
            <a   href="index.php">Home</a>
          </li>
          <li>
            <i class="fa fa-heart"></i>
            <a   href="templates/orders.php">Order</a>
          </li>
          <li>
            <i class="fa fa-barcode"></i>
            <a   href="templates/maintain.php">Maintain</a>
          </li>
          <li>
            <i class="fa fa-user"></i>
            <a   href="templates/login.php">Login</a>
          </li>
        </ul>
      </nav>

    <main>
      <!--Grid Container-->
      <?php  
      get_cameras();
      add_order();
      ?>
      <!--Grid Container End-->
    </main>

    <!--Footer-->
    <footer class="navbar">
    <ul>
          <li>
            <i class="fa fa-map-marker"></i>
            <a   href="index.php">Home</a>
          </li>
          <li>
            <i class="fa fa-heart"></i>
            <a   href="templates/orders.php">Order</a>
          </li>
          <li>
            <i class="fa fa-barcode"></i>
            <a   href="templates/maintain.php">Maintain</a>
          </li>
          <li>
            <i class="fa fa-user"></i>
            <a   href="templates/login.php">Login</a>
          </li>
        </ul>
      
    </footer>
  </body>
</html>
