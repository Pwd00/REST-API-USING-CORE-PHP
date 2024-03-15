<?php 

header("Access-control-Allow-orgin:*");
header("Access-control-Allow-method:delete");
header("content-type:Application/json");
require_once("../core/initailize.php");
$post=new Post($conn);
$data=json_decode(file_get_contents("php://input"));
$post->id=$data->id;
if($post->delete())
{
    echo json_encode(array('messgage'=>'post deleted'));
}
else
{
    echo json_encode(array("messsage"=>'post not deleted'));
}

?> 