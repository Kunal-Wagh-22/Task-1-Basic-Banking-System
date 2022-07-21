
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
<body>
    <h1 style="font-family: 'Inter';"><?php
    require_once"config.php";
    $stdc=158200*1000000;
    $accgen=$stdc+rand(100000,999999);

$sql="SELECT accno FROM accmoney WHERE accno='$accgen'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)== 0)
{
    $insql="INSERT INTO accmoney VALUES('$accgen',)";
    echo"
    <link rel='stylesheet' href='style.css'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
 <link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap' rel='stylesheet'>

<style>
    .cnfrbtn
    {
        background-color: green;
        color: white;
      
    }
</style>
<div class='container'>
    <h2>Account has been created successfuly</h2>
    <h1>Your account number is </h1>
    
</div>
    ";

sleep(2);
    header(("location:transhist.php"));

}
else
{
    echo("This number already exists");
}
?></h1>

</body>
</html>