<?php 

header("Access-control-Allow-orgin:*");
header("Access-control-Allow-method:post");
header("content-type:Application/json");
require_once("../core/initailize.php");
$post=new Post($conn);
$data=json_decode(file_get_contents("php://input"));
$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;
$post->category_id=$data->category_id;
if($post->create())
{
    echo json_encode(array('messgage'=>'post created'));
}
else
{
    echo json_encode(array("messsage"=>'post not created'));
}

?> 