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
    <!-- jQuery validtion using plugin from http://www.formvalidator.net/ -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      //WILL PREVENT FORM FROM SENDING IF THERE ARE ERRORS (comment this out to test PHP validation.)
      $.validate();
      });
      </script>
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
        <form action="register.php" method="post"> 
          <lable>Username:<input type="text" name="username" data-validation-length="min4" data-validation="length"></br></lable></br> 
          <lable>Password:<input type="password" name="password" data-validation-length="min6" data-validation="length"></br></lable></br>
          <lable>Confirm:&nbsp&nbsp&nbsp&nbsp<input type="password" name="confirm"></lable></br>
          <lable>CreditCard:<input type="text" name="creditcard" data-validation-length="min6" data-validation="length"></br></lable></br>
          <lable>Address:&nbsp&nbsp&nbsp&nbsp<input type="text" name="address" data-validation-length="min6" data-validation="length"></br></lable></br>
          <input type="Submit" name="Submit" value="Register"> 
        </form>
        <?php      
          handle_register(); 
        ?> 
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
    </footer>

  </body>
</html>
