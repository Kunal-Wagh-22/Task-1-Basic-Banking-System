
<?php 
require_once"config.php";
extract($_POST);
if(isset($_POST['records']))
{
    $data='<table class="table table-hover">
    <tr>
      <th scope="col">id no</th>
      <th scope="col">Account Number</th>
      <th scope="col">Account Name</th>
      <th scope="col">Deposit</th>
      <th scope="col">Action</th>
    </tr>
  </table>';
  $table_query=mysqli_query($conn,"SELECT indexno,accno,accholdername,depositmoney FROM accmoney");
  
  if(mysqli_num_rows($table_query)>0)
  {
    $number=1;
    while($row=mysqli_fetch_array($table_query))
    {
        $data .='
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
        <tr>
        <td>'.$number.'</td>
        <td>'.$row['accno'].'</td>
        <td>'.$row['accholdername'].'</td>
        <td>'.$row['depositmoney'].'</td>

        </tr>
        
        
        
        
        ';
        $number++;
    }
    
  }
  $data.='</table>';
echo $data;
}
else{
    $data='<table class="table table-hover">
    <tr>
      <th scope="col">id no</th>
      <th scope="col">Account Number</th>
      <th scope="col">Account Name</th>
      <th scope="col">Deposit</th>
      <th scope="col">Action</th>
    </tr>
  </table>';
  $table_query=mysqli_query($conn,"SELECT indexno,accno,accholdername,depositmoney FROM accmoney");
  
  if(mysqli_num_rows($table_query)>0)
  {
    $number=1;
    while($row=mysqli_fetch_array($table_query))
    {
        $data .='
        <tr>
        <td>'.$number.'</td>
        <td>'.$row['accno'].'</td>
        <td>'.$row['accholdername'].'</td>
        <td>'.$row['depositmoney'].'</td>

        </tr>
        
        
        
        
        ';
        $number++;
    }
    
  }
  $data.='</table>';
echo $data;
}
?>