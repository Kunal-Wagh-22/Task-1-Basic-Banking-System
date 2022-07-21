<?php 
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $link = mysqli_connect("localhost", "root", "", "accounts");
    $sourceacc=$_POST['sourceacc'];
    $destacc=$_POST['destacc'];
    $deposit=$_POST['deposit'];
echo$deposit;
    $select_sql="SELECT depositmoney AS accno FROM accmoney WHERE accno='$sourceacc'";
$selstmt=mysqli_query($link,$select_sql);
if($selstmt)
{
if(mysqli_num_rows($selstmt)>0)
{

 $row=mysqli_fetch_row($selstmt);

 $previous_balance=$row[0];

 if($previous_balance>=$deposit)
 {

$total=$previous_balance-$deposit;
$sql = "UPDATE accmoney SET depositmoney=? WHERE accno=?";
$stmt= mysqli_prepare($link,$sql);
if($stmt)
  {
    mysqli_stmt_bind_param($stmt,"ii",$total,$sourceacc);
    if (mysqli_stmt_execute($stmt))
    {
     
      mysqli_stmt_close($stmt);
      $select_sql2="SELECT depositmoney AS accno FROM accmoney WHERE accno='$sourceacc'";
      $selstmt2=mysqli_query($link,$select_sql);
      if($selstmt2)
      {
        if(mysqli_num_rows($selstmt2)>0)
        {
            $row2=mysqli_fetch_row($selstmt2);

 $previous_balance2=$row[0];
 echo"$previous_balance2";
$total2=$previous_balance2+$deposit;
$sql2 = "UPDATE accmoney SET depositmoney=? WHERE accno=?";
$stmt2= mysqli_prepare($link,$sql2);
if($stmt2)
  {
    mysqli_stmt_bind_param($stmt2,"ii",$total2,$destacc);
    if (mysqli_stmt_execute($stmt2))
    {
        echo"Transaction sucess";
      mysqli_stmt_close($stmt2);
    

  }
        }}}
        else
        {
          echo"Transaction error";
        }
      
    }
}
else{
echo"Insufficent funds";
}

}
else
{
  echo"Problems in sql";
}}
else
{
    echo"Problems in select";
}
mysqli_close($link);
}
}//12
//3

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
     
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/transfer.css">
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