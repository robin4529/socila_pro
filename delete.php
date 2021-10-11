<?php 

 include_once "autoload.php"; 

  $delet=$_GET['delete_id'];
    
    connect()-> query("DELETE FROM students WHERE id='$delet'");




   header ("location:index.php");

?>