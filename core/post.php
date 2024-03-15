<?php 


class Post{
    private $db;
    private $table='post';
    //post proprties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;
    //controller db function 
public function __construct($conn){
    $this->db=$conn;
}
public function read()
{
    $query='
    SELECT c.name as category_name,
    p.id,
    p.category_id,
    p.title,
    p.body,
    p.author,
    p.created_at FROM 
    '.$this->table.' p LEFT JOIN
    categories c ON p.category_id=c.id
    ORDER BY p.created_at DESC';
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    return $stmt;
} 
public function readone()
{
    
    $query='
    SELECT c.name as category_name,
    p.id,
    p.category_id,
    p.title,
    p.body,
    p.author,
    p.created_at FROM 
    '.$this->table.' p LEFT JOIN
    categories c ON p.category_id=c.id
    where p.id= ? limit 1';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(1,$this->id);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $this->title=$row['title'];
    $this->body=$row['body'];
    $this->author=$row['author'];
    $this->category_id=$row['category_name'];
    $this->category_name=$row['category_name'];
}
public function create()
{
    $sql='INSERT into '.$this->table.' set title=:title,body=:body,author=:author';
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(":title",$this->title);
    $stmt->bindParam(":body",$this->body);
    $stmt->bindParam(":author",$this->author);
    if($stmt->execute()){
        return true;
    }else
    {
        printf("Error %s.\n",$stmt->error);
    }


}
//update function
public function update()
{
    $sql='UPDATE '.$this->table.' set title=:title,body=:body,author=:author WHERE id=:id';
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(":id",$this->id);
    $stmt->bindParam(":title",$this->title);
    $stmt->bindParam(":body",$this->body);
    $stmt->bindParam(":author",$this->author);
    if($stmt->execute()){
        return true;
    }else
    {
        printf("Error %s.\n",$stmt->error);
    }



}
public function delete()
{
    $sql='DELETE FROM '.$this->table.' WHERE id=:id';
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(":id",$this->id);
    if($stmt->execute()){
        return true;
    }else
    {
        printf("Error %s.\n",$stmt->error);
    }




}
}
?> 