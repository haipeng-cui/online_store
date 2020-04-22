<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css">
    <link
    href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
    rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="aria-menu.js"></script>
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
          <ul role="menu" aria-labelledby="menu-button" id="main-menu">
            <li role="none presentation">
              <a   href="orders.php" role="menuitem" tabindex="-1">Order</a>
            </li>
            <li role="none presentation">
              <a href="maintain.php" role="menuitem" tabindex="-1">Maintain</a>
            </li>
            <li role="none presentation">
              <a href="login.php" role="menuitem" tabindex="-1">Login</a>
            </li>
            <li role="none presentation">
              <a href="../index.php" role="menuitem" tabindex="-1">Home</a>
            </li>
          </ul>
        </div>
        <?php
          include '../database/database.php';
          display_session();
        ?>
        <form action="../index.php" method="post"> 
          <input type="submit" name="logout" value="logout" /> 
        </form>
        <div class="showuser"><a href="Sources.php">Sources</a></div>
        <div class="showuser"><a href="Documentation.php">Documentation​</a></div>
        <div class="container">
          <h2>Haipeng's Camera Shop</h2>
          <div><img src="img/logo.png" alt="" class="logo" /></div>
        </div>
      </header>
      <!--Header-->
      
     
      <nav class="navbar">
        <ul>
          <li>
            <i class="fa fa-map-marker"></i>
            <a   href="../index.php">Home</a>
          </li>
          <li>
            <i class="fa fa-heart"></i>
            <a   href="orders.php">Order</a>
          </li>
          <li>
            <i class="fa fa-barcode"></i>
            <a   href="maintain.php">Maintain</a>
          </li>
          <li>
            <i class="fa fa-user"></i>
            <a   href="login.php">Login</a>
          </li> 
        </ul>
      </nav>

    <main>
        <h4><i>Part A: Tips</i><h4>
        <div class="grid">
          <div class="item"><p>Tips 1: You need to register as <i style="color:red;">"root"</i> to do user management.</p></div>
          <div class="item"><p>Tips 2: When you login as <i style="color:red;">"root"</i>, you can delete users under <i>"Maintain"</i> page. </p></div>
          <div class="item"><p>Tips 3: Before adding cameras to your order, please login first.</p></div>
          <div class="item"><p>Tips 4: You can delete your orders under <i>"order"</i> page.</p></div>
        </div>
        <h4><i>Part B: User register</i><h4>
        <div class="grid">
          <div class="item"><p>1. Users can register to this website. The website has client side validation and server side validation. </p></div>
          <div class="item"><p>2. The server side validation is integrated into register function;for example, there cannot be two same users </p></div>
          <div class="item"><p>3. The client side validation is based on the CPSC 2030 LAB 7</p></div>
        </div>
        <h4><i>Part C: User Login and Logout</i><h4>
        <div class="grid">
          <div class="item"><p>1. Users can login into the website with corrected username and password. </p></div>
          <div class="item"><p>2. <i style="color:red;">"root"</i> is for management, but you still need to register it. </p></div>
          <div class="item"><p>3. The client side validation is based on the CPSC 2030 LAB 7</p></div>
          <div class="item"><p>4. After you login, your name will be displayed on left corner</p></div>
          <div class="item"><p>4. When you are trying to logout, press <i>logout</i> button on  left corner.</p></div>
        </div>
        <h4><i>Part D: Add orders and Delete orders</i><h4>
        <div class="grid">
          <div class="item"><p>1. You can add camres to your order after you login.</p></div>
          <div class="item"><p>2. Click the checkbox, and then click <i>"Add to order".</i></p></div>
          <div class="item"><p>3. You can delete your orders under order page.</p></div>
        </div>
        <h4><i>Part E: User management for root user</i><h4>
        <div class="grid">
          <div class="item"><p>1. If your are a root user, you can delete users under Maintain page.</p></div>
        </div>
        <h4><i>Part F: Others</i><h4>
        <div class="grid">
          <div class="item"><p>Accessibility menu is on the left corner, which is based on javaScript.</p></div>
          <div class="item"><p>There is an animation around the camera title.</p></div>
          <div class="item"><p>The website uses css grid and flexbox to arrange items.</p></div>
        </div>
        <h4><i>Error Checks</i><h4>
        <div class="grid">
          <div class="item"><p>All pages based on the index page,so I only checked index page</p></div>
          
        </div>
        <img src="img/CSS.PNG" alt="CSS">
        <img src="img/HTML.PNG" alt="CSS">
        
        

    </main>

    <!--Footer-->
    <footer class="navbar">
    <ul>
          <li>
            <i class="fa fa-map-marker"></i>
            <a   href="../index.php">Home</a>
          </li>
          <li>
            <i class="fa fa-heart"></i>
            <a   href="orders.php">Order</a>
          </li>
          <li>
            <i class="fa fa-barcode"></i>
            <a   href="maintain.php">Maintain</a>
          </li>
          <li>
            <i class="fa fa-user"></i>
            <a   href="login.php">Login</a>
          </li>
    </ul>
    </footer>

  </body>
</html>
