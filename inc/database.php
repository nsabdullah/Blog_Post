<?php 
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "simple_blog";



$conn = mysqli_connect($host, $db_user, $db_password, $db_name);



// Read all post
function get_posts(){

  global $conn;

  $query = "SELECT * FROM posts  ORDER BY id DESC";
  $result = mysqli_query($conn, $query);

  if($result){
    return $result;
  };

  return false;
}



// insert data
function insert_post(){
  global $conn;

  $post_title = $_POST['title'];
  $post_content = $_POST['content'];
  $futuread_image = $_FILES['futuread_image'];

 // upload the file
 $image_destination = "image/" . time() . $futuread_image['name'];
 move_uploaded_file($futuread_image['tmp_name'], $image_destination );


 
  
  $insert_query = "INSERT INTO posts (title, content, futuread_image) VALUES ( '$post_title',   '$post_content',   ' $image_destination ' )";
  $result = mysqli_query($conn, $insert_query);



  if($result){
    return true;
  }
  return false;
}


//read single post

function get_post_by_id($post_id){
  global $conn;
 
  $query = "SELECT * FROM posts WHERE id=$post_id";
  $result = mysqli_query($conn, $query);
   return $result;
}
// delet post

function delet_post($post_id){
  global $conn;
  $query = "DELETE  FROM posts WHERE id=$post_id";
  $result = mysqli_query($conn, $query);
  if($result){
    return true;
  }
  return false;
}

// update post
function update_post($post_id, array $data){
  global $conn;

  $title = $data['title'];
  $content = $data['content'];

  $update_query = "UPDATE posts SET title='$title', content = '$content'  WHERE id=1";
  $query_execution = mysqli_query($conn, $update_query);

  
  if ( ! $query_execution ) {
		die( mysqli_error( $conn ) ); // Outputs the error if the query fails
	}

}
?>