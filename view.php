<?php
$conn=mysqli_connect("localhost", "root", "", "accounts");
// $sql="SELECT * FROM accmoney WHERE ";

if(isset($_GET['viewid']))
{
    $vid=( int ) $_GET['viewid'];
  echo"$vid";
    $sql="SELECT * FROM accountholdersinfo WHERE indexno='$vid'";
   
    $stmt=mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark cusnav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transfer.php">Transfer</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="register.php" >Add Account</a></li>
                  <li><a class="dropdown-item" href="deposit.php">Deposit Money</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="transhist.php">Transactions History</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<div class="container mt-4" id="info">
   <h1 style="text-align: center;">Customer Information</h1> 
   <br>
   <?php 

  
   if(mysqli_num_rows($stmt)>0)
{

 $row=mysqli_fetch_assoc($stmt);
if($row['acc_type']==1)
{
    $acc="Personal";
}
echo"
<p>Name: ".$row['firstname']." ".$row['lastname']."</p>";
echo"<p>Email: $row[email]</p>
<p>Account type: $acc</p>
<p>Address: $row[address]</p>
<p>Phone Number: $row[phoneno]</p>
<div class='places'>
<p >City: $row[city]</p>
<p>State: $row[state]</p>

<p>Zipcode: $row[zipcode]</p>
";
}
mysqli_close($conn);}
   ?>

</div>
</div>
<footer class="bg-dark text-center text-white" style="margin-top: 50px;">
      <div class="bg-dark text-center text-white p-3 fixed-bottom " id="ff">
        © 2022 Copyright: Kunal Wagh
        <!--  -->
      </div>
      <!-- Copyright -->
    </footer>  
  </body>
</html>