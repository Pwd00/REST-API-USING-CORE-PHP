<?php 
header('Acess-control-allow-origin:0',);
header('Content-Type:Application/json');
include_once('../core/initailize.php');
//instantiate Post
$post=new Post($conn);
//request blog query
$post->id=isset($_GET['id'])? ($_GET['id']):die();
$post->readone();
$post_arr=array(
    'id'=> $post->id,
    'title'=>$post->title,
    'body'=>$post->body,
    'author'=>$post->author,
    'category_id'=> $post->category_id,
    'category_name'=> $post->category_name
);
print_r(json_encode($post_arr));
?>