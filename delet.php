<?php

include('inc/database.php');

$current_id = $_GET['id'];

$delet =  delet_post($current_id);
if($delet){
  header('location: index.php');

}else{
   echo 'Try again';
}

?>