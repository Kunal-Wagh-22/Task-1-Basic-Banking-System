<?php
$conn=mysqli_connect("localhost", "root", "", "accounts");
// $sql="SELECT * FROM accmoney WHERE ";

if(isset($_GET['deleteid']))
{
    $vid=( int ) $_GET['deleteid'];
    
if ($_SERVER['REQUEST_METHOD']=='POST')
{

    $sql="DELETE FROM accountholdersinfo WHERE indexno='$vid'";
    $ssql="DELETE FROM accmoney WHERE indexno='$vid'";
    $ttsql="DELETE FROM transaction_history WHERE indexno='$vid'";
    $stmt=mysqli_query($conn,$sql);
    $sstmt=mysqli_query($conn,$ssql);
    $tssmt=mysqli_query($conn,$ttsql);
    
    if($stmt)
    {
        echo"<script>
        alert('Delete Successful');
    </script>;";
    header("location:transhist.php");
    }
    
}
}
?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/c1733da22b.js" crossorigin="anonymous"></script>
</head>
  <body>
    <style>
        #icon
        {
            width: 30px;
            margin-left: 50%;
           
        }
        .db
        {
            background-color: red;
            color: white;
            padding: 2%;
            border: solid transparent;
            border-radius: 10px;
        }
        .container-delete
        {
           display: flex;
           justify-content: center;
           align-items: center;
          
            height: 90vh;
                background-color: #f1f2f3;
        }
    </style>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <a href="index.html" class="navbar-brand">
              <img src="Logo.png" height="28">
          </a>
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav">
                  <a href="#" class="nav-item nav-link active" style="font-size: 20px;"></a>
                  
                  
              </div>
              <div class="navbar-nav ms-auto" style="font-size: 20px;">
                <a href="register.php" class="nav-item nav-link">Add Account</a>
                  <a href="deposit.php" class="nav-item nav-link">Deposit</a>
                  <a href="transfer.php" class="nav-item nav-link">Transaction</a>
                  <a href="transhist.php" class="nav-item nav-link">Customer info</a>
                  <a href="hist.php" class="nav-item nav-link">Transaction History</a>
              </div>
          </div>
      </div>
  </nav>
     <div class="container-delete">
<img src="img/caution.svg" >
        <form method="post">
        
<h1>Are you sure?</h1>
<p>Your record cannot be recovered </p>
<p>Are you sure to delete?</p>
<div class="buttonscntr">
    <button class="db">Delete</button>
    <a href="transhist.php">Click to go back</a>
</div>
        </form>
        <div >
      
      </div>
     </div>
 <footer class="bg-dark text-center text-white" style="margin-top: 50px;">
      <div class="bg-dark text-center text-white p-3 fixed-bottom " id="ff">
        © 2022 Copyright: Kunal Wagh
        <!--  -->
      </div>
      <!-- Copyright -->
    </footer>       
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</div>
  </body>
</html>