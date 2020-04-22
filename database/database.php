<?php
require 'config.php';

// setup connect
function db_connect() {

  try {
    $user=DBUSER;
    $pass=DBPASS;
    $host=DBHOST;
    $dname=DBNAME;
    $connString="mysql:host=".$host.";dbname=".$dname;
    $pdo=new PDO($connString,$user,$pass);
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
  return $pdo;
}


// Get all cameras frome database and show on home page
function get_cameras() {
  $pdo = db_connect();
  $cameras = [];

  $sql="SELECT * FROM itemlist ORDER BY ID DESC";
  $result=$pdo->query($sql);
  $i=0;
  while($row = $result->fetch()){
    $cameras[$i] =$row;
    $i++;
  }

  echo '<div class="grid">';
  
  foreach($cameras as $value){  
    echo '<div class="item">';
    echo '<h4>'.$value['name'].'</h4>';
    echo '<p class="onsale">On sale:'.$value['onsale'].'</p>';
    echo '<p class ="price">Price:$'.$value['price'].'</p>';
    echo '<form action="index.php" method="post">';
    echo '<div><input type="checkbox" name="check_order[]" value='.$value['ID'].'>';
    echo '<input type="submit" name="addorder" Value="Add to order"></div>';
    echo '</form>';
    echo '</div>';
  }

  echo '</div>';

}



// Handle form register
function handle_register() {
  global $pdo;
  $pdo = db_connect();

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $sql = "select username from user where username = '$_POST[username]'";
    $result = $pdo->query($sql);
    $i=0;
    while($row = $result->fetch()){
      $i++;
    }
    if($i>0){
      echo "<div class='show-msg'><p>Username has been used</p></div>";
     
    }
    else{
      $p=$_POST['password'];
      $a=$_POST['address'];
      $sql="INSERT INTO user(username,password,creditcard,address) VALUES(?, ?, ?, ?)";
      $statement=$pdo->prepare($sql);
      $statement->bindValue(1,$_POST['username']);
      $statement->bindValue(2,$_POST['password']);
      $statement->bindValue(3,$_POST['creditcard']);
      $statement->bindValue(4,$_POST['address']);
      $statement->execute();
      echo "<div class='show-msg'><p>Register successful!</p></div>";
    }
    
  }
}
//handle for login
function handle_login(){
  global $pdo;
  $pdo = db_connect();
  $name="";
  if(isset($_POST["login"]) && $_POST["login"] == "Login") {
    
    $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'"; 
    $result = $pdo->query($sql);
    $i=0;
    
    while($row = $result->fetch()){
      $i++;
      $name=$row['username'];
    }
    
    if($i==0){
      echo "<div class='show-msg'><p>Username or password are not correct!</p></div>";
    }else{
      $_SESSION['username'] =$name;
      echo '<div class= "show-msg"><p>Welcome, '.$name.'</p></div>';
    }


  }

}

//get orders and show on order page
function get_orders() {
  global $pdo;
  $pdo = db_connect();
  $orders = [];

  $sql="SELECT * FROM orders INNER JOIN itemlist ON orders.ID=itemlist.ID where orders.username = '$_SESSION[username]' ";
  $result=$pdo->query($sql);
  $i=0;
  while($row = $result->fetch()){
    $orders[$i] =$row;
    $i++;
 
  }
  echo '<form action="orders.php" method="post">'; 
  $price=0;
  foreach($orders as $value){
    echo '<div>';
    echo '<input type="checkbox" name="check_list[]" value='.$value['orderID'].'>'
      .'&nbsp Order ID: '.$value['orderID']
      .'&nbsp Camera Type:'.$value['name']
      .'&nbsp Price:'.$value['price']
      .'&nbsp On sale:'.$value['onsale'];
    echo '</div>';
      $price= $price+$value['price'];
  }
  echo '<i style="color:red;">Balance: $'.$price.'</i>';
  echo '<input type="submit" name="delete" Value="Delete Select">';
  echo '</form>';
  
  echo '<form action="orders.php" method="post">'; 
  echo '<input type="submit" name="payment" Value="Pay listed Cameras">';
  echo '</form>';

}

//delete order from a user
function delete_orders(){
  if(isset($_POST['delete'])){
    if(!empty($_POST['check_list'])){
      global $pdo;
      $pdo = db_connect();
      foreach($_POST['check_list'] as $selected){
        $sql="DELETE FROM orders where orders.orderID = '$selected'";
        $result=$pdo->query($sql);
        }
    }
  }
}

//make a payment and clear orders
function payment(){
  global $pdo;
  $pdo = db_connect();
  if(isset($_POST['payment'])){
    $sql="DELETE FROM orders where orders.username = '$_SESSION[username]'";
    $result=$pdo->query($sql);
    echo $_SESSION['username']."::<div class='show-msg'><p>Your order is paid!</p></div>";
  } 
  

}

//display the user name on the page
function display_session(){
  session_start();
  if(isset($_POST["logout"]) && $_POST['logout'] == 'logout'){
    $_SESSION['username']="";
  }
  if(isset($_SESSION['username'])&&$_SESSION['username']!=""){
    $username = $_SESSION['username'];
    echo '<div class="showuser">'.$username.'</div>';
  }
}

//add camera to order
function add_order(){
  if(isset($_POST['addorder'])){
    if(!empty($_POST['check_order'])&& isset($_SESSION['username'])&&$_SESSION['username']!=""){
      global $pdo;
      $pdo = db_connect();
      foreach($_POST['check_order'] as $selected){
        $sql="INSERT INTO orders(ID,username) VALUES(?, ?)";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$selected);
        $statement->bindValue(2,$_SESSION['username']);
        $statement->execute();
        echo "<div class='show-msg'><p>Add order successful</p></div>";
        }

    }
    elseif( isset($_SESSION['username'])&&$_SESSION['username']==""|| !isset($_SESSION['username'])){
        echo '<div class = "show-msg"><p>';
        echo "Please login before you add order !!!";
        echo '</p></div>';
    } else{
      echo '<div class = "show-msg"><p>';
      echo "Please Click check box and then add it to order!!! <br>";
      echo '</p></div>';

    }
  }

}


//ge users frome database and show on maintain page
function get_users(){
  global $pdo;
  $pdo = db_connect();
  $users = [];

  $sql="SELECT * FROM user";
  $result=$pdo->query($sql);
  $i=0;
  while($row = $result->fetch()){
    $users[$i] =$row;
    $i++;
 
  }

  echo '<form action="maintain.php" method="post">'; 
  foreach($users as $value){
    echo '<div><input type="checkbox" name="delete_list[]" value='.$value['username'].'>'
      .'&nbsp Username: '.$value['username'].'<div></br>';
  }
  echo '<input type="submit" name="maintain" Value="Delete users">';
  echo '</form>';
  
}
//delete users only root can do that
function delete_users(){
  if(isset($_POST['maintain'])){
      
    if(!empty($_POST['delete_list'])){
      $pdo = db_connect();
      foreach($_POST['delete_list'] as $selected){
        $sql="DELETE FROM user where username = '$selected'";
        
        $result=$pdo->query($sql);
        }
    }
  }

}