<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Scandiweb/Produkti.php";
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<form action="" method="post">
<label class="Text">Product List</label>
<div style= "float: right" class="mt-2">
<input type="submit" name="AddPage" class="btn btn-info" value="Add Page"/>
<input type="submit" class="btn btn-danger"name="delete"value="Mass Delete">
</div>
<hr>
<div class="row">

<?php
/**
 * Prints out table data
 */
$con = mysqli_connect("localhost","root","","scandiweb");
$dbname = "produkti";
$query = "select * from $dbname";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
foreach($result as $row)
{
  if($row['Type'] == 'Book')
  {
    $row['Attribute'] = "Weight: ".$row['Attribute'];
  }
  else if ($row['Type'] == 'Furniture')
  {
    $row['Attribute'] = "Dimension: ".$row['Attribute'];
  }
  else $row['Attribute'] = "Size: ".$row['Attribute'];
  echo "
  <div class='col-3 mb-3'>
  <div class='card text-center'>
  <div class='card-body'>
        <div class='row'>
        <div class='col-1'>
        <input type='checkbox' name ='checkbox[]' value='".$row['id']."'>
        </div>
              <div class='col-11'>".$row['SKU']."<br>".$row['Name']."<br>  ".$row['Price']."$<br>  ".$row['Attribute']."</div>
        </div>
    </div>
    </div>
  </div> ";
}
/**
 * Removes data from the table using checked checkboxes and refreshes list page
 */
if(isset($_POST['delete']))
{

  if (isset($_POST['checkbox']))
  {
  $chkarr = count($_POST['checkbox']);
  $i = 0;
  if($chkarr > 0 )
  {  while($i<$chkarr)
     {
        $keytoDelete = $_POST['checkbox'][$i];
        mysqli_query($con,"DELETE from produkti where id = '$keytoDelete'");
        $i++;
     }
     header("Refresh:0");
  }
  }
}
/**
 * Move user to Add.php page
 */
if(isset($_POST['AddPage']))
{
  header("Location: http://localhost/Scandiweb/add.php");
  die();
}
ob_end_flush()
?>

</div>
</div>
<hr>
</form>
</body>
<footer>
Scandiweb Test assigment
</footer>
</html>
