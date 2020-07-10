<?php 

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
//initialize our api
include_once('../core/initialize.php');
//instancie post
$post=new Post($db);
$post->id=isset($_GET['id'])? $_GET['id']:die();
$post->read_single();
$post_arr=array(
	'id'=>$post->id,
	'title'=>$post->title,
	'body'=>$post->body,
	'author'=>$post->author,
	'category_id'=>$post->category_id,
	'category_name'=>$post->category_name
);
//make json
print_r(json_encode($post_arr));

?>