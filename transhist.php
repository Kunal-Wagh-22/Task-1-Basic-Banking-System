<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Info</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/transhis.css">
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
<div style="margin-top:10%;" class="container mt-4">
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">index</th>
      <th scope="col">Account Number</th>
      <th scope="col">Account Name</th>
      <th scope="col">Deposit</th>
      <th scope="col" style="text-align: center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php     
$link = mysqli_connect("localhost", "root", "", "accounts");

$table_query=mysqli_query($link,"SELECT indexno,accno,accholdername,depositmoney FROM accmoney");

$table_rows=mysqli_num_rows($table_query);

for($i=1;$i<=$table_rows;$i++)
{
    $tablesrow=mysqli_fetch_array($table_query);
    echo"
    <tr>";
    ?>
    <th scope='row'><?php echo($tablesrow["indexno"])?></th>
    <td><?php echo($tablesrow["accno"]) ?></td>
    <td><?php echo($tablesrow["accholdername"])?></td>
    <td><?php echo($tablesrow["depositmoney"])?></td>
    <?php echo"<td>

      <a class='viewer'  href='view.php?viewid=$tablesrow[indexno]'>View info</a>  <a class='deleteb' href='delete.php?deleteid=$tablesrow[indexno]'
      >Delete</a>
  </td>";?>
    </tr>
 
      <tr>
  <?php  
}
?> 
<!-- type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" -->
  </tbody>
</table>
</div>
<footer class="bg-dark text-center text-white" style="margin-top: 50px;">
      <div class="bg-dark text-center text-white p-3 fixed-bottom " id="ff">
        © 2022 Copyright: Kunal Wagh
        <!--  -->
      </div>
      <!-- Copyright -->
    </footer>  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>
</html>