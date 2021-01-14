<?php
class Produkti {
  /**
   * Connection constructor
   */
  public function __construct()
  {
    $this->con = mysqli_connect("localhost","root","","Scandiweb");

    if(!$this->con)
    {
      echo 'Database connection error';
    }
  }
  /**
  *   Inserts data in db
  */
  public function Insertt($data)
  {
    $string = "INSERT INTO produkti (";
    $string .= implode(",", array_keys($data)) . ') VALUES (';
    $string .= "'" . implode("','", array_values($data)). "')";
    if(mysqli_query($this->con, $string))
    {
      return true;
    }
    else {
      echo mysqli_error($this->con);
    }
  }
}

 ?>
