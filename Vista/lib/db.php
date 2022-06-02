<?php
include_once 'config.php';
$servidor="mysql:dbname=".DB.";HOST=".HOST;
try{
    $pdo= new PDO($servidor,USER,PASSWORD,
      array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
      
   // echo "<script>alert('Conectando...')</script>";
}catch(PDOException $e){
  //  echo "<script>alert('Error...')</script>";
}

?>
