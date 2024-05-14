<?php 
class Post{
    private $db;
    private $sql ='SELECT *,
    u.id as userId,
    p.id as postId,
    u.created_at as userCreated_at,
    p.created_at as postCreated_at 
    FROM posts p INNER JOIN users u 
    ON p.user_id = u.id 
    ORDER BY p.created_at DESC';
    public function __construct()
    {
        $this->db = new Database;

    }
    public function getPosts(){
        $this->db->query($this->sql);
        $posts = $this->db->resultSet();
        return $posts;
    }
    public function addPost($data){
        $this->db->query('INSERT INTO posts(title ,body ,user_id) VALUES(:title,:body,:user_id)');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':user_id',$data['user_id']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function getPostById($id){
        $this->db->query('SELECT * FROM `posts` WHERE id = :id');
        $this->db->bind(':id' , $id);
       $post = $this->db->single();
       return $post;
    }
    public function updatePost($data){
        $this->db->query('UPDATE posts SET title = :title ,body = :body WHERE id = :id');
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function destroyPost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id',$id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}