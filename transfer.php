<?php 
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $link = mysqli_connect("localhost", "root", "", "accounts");
    $sourceacc=$_POST['sourceacc'];
    $destacc=$_POST['destacc'];
    $deposit=$_POST['deposit'];

    $select_sql="SELECT depositmoney AS accno FROM accmoney WHERE accno='$sourceacc'";
    $selstmt=mysqli_query($link,$select_sql);
    if ($selstmt)
    {
      $row= mysqli_fetch_row($selstmt);
      $bal1=$row[0];
      
   // check 
 if($sourceacc!=$destacc)
 {
  if($bal1>=$deposit)
  {
      //update 
      $ded=$bal1-$deposit;
     
      $fsql="UPDATE accmoney SET depositmoney='$ded' WHERE accno='$sourceacc'";
      $fstmt=mysqli_query($link,$fsql);
      //check fstmt
      if ($fstmt)
      {
         $secsel="SELECT depositmoney AS accno FROM accmoney WHERE accno='$destacc'";
         $sel2stmt=mysqli_query($link,$secsel);
         $row2= mysqli_fetch_row($sel2stmt);
     $bal2=$row2[0];
         $add=$bal2+$deposit;
         $ssql="UPDATE accmoney SET depositmoney='$add' WHERE accno='$destacc'";
         $secstmt=mysqli_query($link,$ssql);
         if($secstmt)
         {
          $timestamp = date("Y-m-d H:i:s");
          $scn="SELECT accholdername FROM accmoney WHERE accno='$sourceacc'";
          $scsmt=mysqli_query($link,$scn);
          $rowscn=mysqli_fetch_row($scsmt);
          $sourcename=$rowscn[0];
          $dsn="SELECT accholdername FROM accmoney WHERE accno='$destacc'";
          $dssmt=mysqli_query($link,$dsn);
          $rowdsn=mysqli_fetch_row($dssmt);
          $destname=$rowdsn[0];
          echo"$destname";
          $tsql="INSERT INTO transaction_history VALUES(0,'$sourcename','$sourceacc','$destname','$destacc','$deposit','$timestamp')";
          $tsqsmt=mysqli_query($link,$tsql);
          if(!$tsql)
          {
              echo"Error in inserting logs";
          }
           echo"Transaction Successful";
         }
         else{
           echo"ERROR in second phase";
         }
      }
  }
 }
 else{
  echo"Self Transfer is not valid!";
 }
    }
    else
    {
      echo"Problem is selsql";
    }
} 12
//3

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     
<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/transfer.css">
    </head>
  <body>
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


      <!-- body -->
      <div class="container ">
      <form method="POST">
        <h2 class="title">Funds Transfer</h2>
      <div class="mb-3">
      <label for="accname" class="form-label">Choose Source Account</label>
      <select class="form-select" aria-label="Default select example" name="sourceacc" id="sourceacc">
       
  <option selected>Open this select menu</option>
  <?php  
$conn = mysqli_connect("localhost", "root", "", "accounts");
        $customer_query=mysqli_query($conn,"SELECT * FROM accmoney");
        $customer_query_row_count=mysqli_num_rows($customer_query);
        for($i=1;$i<=$customer_query_row_count;$i++)
        {
            $customer_row=mysqli_fetch_array($customer_query);
        
        ?>
 
  <option value="<?php echo $customer_row["accno"] ?>"><?php echo $customer_row["accholdername"] ?></option>
  <?php 
        } 
  ?>
 
</select>
      </div>
      <div class="mb-3">
      <label for="accname" class="form-label">Choose Destination Account</label>
      <select class="form-select" aria-label="Default select example" name="destacc" id="destacc">
       
  <option selected>Open this select menu</option>
  <?php  
$conn = mysqli_connect("localhost", "root", "", "accounts");
        $customer_query=mysqli_query($conn,"SELECT * FROM accmoney");
        $customer_query_row_count=mysqli_num_rows($customer_query);
        for($i=1;$i<=$customer_query_row_count;$i++)
        {
            $customer_row=mysqli_fetch_array($customer_query);
        
        ?>
 
  <option value="<?php echo $customer_row["accno"] ?>"><?php echo $customer_row["accholdername"] ?></option>
  <?php 
        } 
  ?>
 
</select>
      </div>
  <div class="mb-3">
    <label for="deposit" class="form-label">Amount to be transferred</label>
    <input type="number" name="deposit" class="form-control" id="deposit">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="res">
  <h3></h3>
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
    <script src="script.js"></script>
  </body>
</html>