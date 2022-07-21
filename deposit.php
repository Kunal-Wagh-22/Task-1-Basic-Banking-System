<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "accounts");
 
// Check connection
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD']=='POST')
{

$deposit=$_POST['deposit'];
$accname=$_POST['accname'];

$select_sql="SELECT depositmoney AS accno FROM accmoney WHERE accno='$accname'";
$selstmt=mysqli_query($link,$select_sql);
if($selstmt)
{
if(mysqli_num_rows($selstmt)>0)
{

 $row=mysqli_fetch_row($selstmt);

 $previous_balance=$row[0];
$total=$previous_balance+$deposit;



$sql = "UPDATE accmoney SET depositmoney=? WHERE accno=?";
// if(mysqli_query($link, $sql)){
//     echo "Records were updated successfully.";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }




// update 
$stmt= mysqli_prepare($link,$sql);
if($stmt)
  {
    mysqli_stmt_bind_param($stmt,"ii",$total,$accname);
    if (mysqli_stmt_execute($stmt))
    {
      echo"Transaction Successful";
    }
}
else{

}
}
}
else
{
  echo"Problems in select sql";
}
}

// Close connection
mysqli_close($link);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deposit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/deposit.css">
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
        <h1 class="title">Deposit</h1>
      <form method="POST">
      <div class="mb-3">
      <label for="accname" class="form-label">Choose Account</label>
      <select class="form-select" aria-label="Default select example" name="accname" id="accname">
       
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
    <label for="deposit" class="form-label">Amount to be deposited</label>
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