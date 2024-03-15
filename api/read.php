<?php 
header('Acess-control-allow-origin:0',);
header('Content-Type:Application/json');
include_once('../core/initailize.php');
//instantiate Post
$post=new Post($conn);
//request blog query
$result=$post->read();
$num=$result->rowCount();
if($num>0)
{
    $post_arr=array();
    $post_arr['data']=array();
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        extract( $row );
        $post_item=array(
            'id'=>$id,
            'title'=>$title,
            'body'=>$body,
            'author'=>$author,
            'category_id'=>$category_id,
            'category_name'=>$category_name
           
        );
        array_push($post_arr['data'],$post_item);
    }
    //convert to json and output
    echo json_encode( $post_arr );
}else
{
    echo json_encode(array('message'=>'No Post Found'));
}

?> 