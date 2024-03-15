<?php 

header("Access-control-Allow-orgin:*");
header("Access-control-Allow-method:put");
header("content-type:Application/json");
require_once("../core/initailize.php");
$post=new Post($conn);
$data=json_decode(file_get_contents("php://input"));
$post->id=$data->id;
$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;
$post->category_id=$data->category_id;
if($post->update())
{
    echo json_encode(array('messgage'=>'post updated'));
}
else
{
    echo json_encode(array("messsage"=>'post not created'));
}

?> 