
<?php
/**
 * Inserts data into Database
 */
require_once $_SERVER['DOCUMENT_ROOT']."/Scandiweb/Produkti.php";
$pr = new Produkti;
if(isset($_POST["submit"]))
{
  if($_POST['Size'] > 0)
  {
  $insert_data = array(
    'SKU' => mysqli_real_escape_string($pr->con, $_POST['SKU']),
    'Name' => mysqli_real_escape_string($pr->con, $_POST['Name']),
    'Price'=> mysqli_real_escape_string($pr->con, $_POST['Price']),
    'Type' => mysqli_real_escape_string($pr->con, $_POST['Switch']),
    'Attribute' => mysqli_real_escape_string($pr->con, $_POST['Size'])
  );
  }
  else if($_POST['Weight'] > 0)
  {
  $insert_data = array(
    'SKU' => mysqli_real_escape_string($pr->con, $_POST['SKU']),
    'Name' => mysqli_real_escape_string($pr->con, $_POST['Name']),
    'Price'=> mysqli_real_escape_string($pr->con, $_POST['Price']),
    'Type' => mysqli_real_escape_string($pr->con, $_POST['Switch']),
    'Attribute' => mysqli_real_escape_string($pr->con, $_POST['Weight'])
  );
  }
  else if ($_POST['Height'] > 0)
  {
    $book= $_POST['Height'].'x'.$_POST['Width'].'x'.$_POST['Lenght'];
      $insert_data = array(
    'SKU' => mysqli_real_escape_string($pr->con, $_POST['SKU']),
    'Name' => mysqli_real_escape_string($pr->con, $_POST['Name']),
    'Price'=> mysqli_real_escape_string($pr->con, $_POST['Price']),
    'Type' => mysqli_real_escape_string($pr->con, $_POST['Switch']),
    'Attribute' => mysqli_real_escape_string($pr->con, $book)
      );
  }
  // Return user to list page
  if($pr->Insertt($insert_data))
  {
    header("Location: http://localhost/Scandiweb/index.php");
  }
}

 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/Scandiweb/styles/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class='container'>
<form method="post" id="itemForm">
  <label class="Text">Product Add</label>
  <div style= "float: right" class="mt-2">
<input type="submit" name="submit" class="btn btn-info" value ="Submit"/>
<a class="btn btn-danger" href="/Scandiweb/index.php">Cancel</a> 
</div>
<hr>
<div class="form-group row">
    <label class="col-sm-1 col-form-label">SKU</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="SKU" name="SKU">
      <div id="EmptySKU">
      <label class="col-form-label" id="FSKU">Enter value in SKU field</label>
      </div>
    </div>
  </div>
<div class="form-group row">
    <label class="col-sm-1 col-form-label">Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Name" name="Name">
      <div id="EmptyName">
      <label class="col-form-label">Enter value in Name field</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Price($)</label>
    <div class="col-sm-6">
      <input type="number" step="0.01" class="form-control" id="Price" name="Price">
      <div id="EmptyPrice">
      <label class="col-form-label">Enter value in Price($) field</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Type Switcher</label>
    <div class="col-sm-6">
    <select class="form-control" id="Switch" onchange="change()" name="Switch">
          <option value="DVD-disc">DVD-disc</option>
          <option value="Furniture">Furniture</option>
          <option value="Book">Book</option>
        </select>
    </div>
  </div>
  <div id="B1">
    <div class="form-group row">
    <label class="col-sm-1 col-form-label">Size(MB)</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Size" name="Size">
      <div id="EmptySize">
      <label class="col-form-label">Enter value in Size(MB) field</label><br>
      </div>
      <label class="col-form-label">Please, provide size</label>
    </div>
  </div>
</div>
<div id="B2">
<div class="form-group row">
    <label class="col-sm-1 col-form-label">Height(CM)</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Height" name="Height">
      <div id="EmptyHeight">
      <label class="col-form-label" id="FHeight">Enter value in Height(CM) field</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Width(CM)</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Width" name="Width">
      <div id="Emptywidth">
      <label class="col-form-label">Enter value in Width(CM) field</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-1 col-form-label">Lenght(CM)</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Lenght" name="Lenght">
      <div id="EmptyLenght">
      <label class="col-form-label">Enter value in Lenght(CM) field</label>
      </div>
      <label class="col-form-label">Please, provide dimensions</label>
    </div>
  </div>
</div>
<div id="B3">
<div class="form-group row">
    <label class="col-sm-1 col-form-label">Weight(KG)</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="Weight" name="Weight">
      <div id="EmptyWeight">
      <label class="col-form-label">Enter value in Weight(KG) field</label>
      </div>
      <label class="col-form-label">Please, provide weight</label>
    </div>
  </div>
</div>
</form>
</div>
<hr>
<script src="scripts/scripts.js"></script>
</body>
<footer>
Scandiweb Test assigment
</footer>

</html>
