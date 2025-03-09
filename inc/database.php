<?php 
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "simple_blog";



$conn = mysqli_connect($host, $db_user, $db_password, $db_name);



// Read all post
function get_post(){

  global $conn;

  $query = "SELECT * FROM posts";
  $result = mysqli_query($conn, $query);

  if($result){
    return $result;
  }

  return false;



}

















?>