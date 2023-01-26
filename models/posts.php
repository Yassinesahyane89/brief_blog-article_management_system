<?php
include_once('database.php');

class posts extends Connection
{
    protected function getPostsDB($id){
        $sql = "SELECT posts.id, image,title,content,name,category_id FROM posts,categories where category_id=categories.id and user_id='$id'";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function deletePostsDB($id){
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
    }

    protected function addPostsDB($title,$content,$categorie_id,$user_id,$image){
        $sql = "INSERT INTO posts (image,title,content,category_id,user_id) VALUES (?,?,?,?,?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$image,$title,$content,$categorie_id,$user_id]);
        return 1;
    }


    protected function UpdatWithimageDB($id,$title,$content,$categorie_id,$image){
        $sql = "UPDATE posts SET title = ?,content=?,category_id=?, image=? WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$title,$content,$categorie_id,$image,$id]);
        return 1;
    }

    protected function UpdatWithoutmageDB($id,$title,$content,$categorie_id){
        $sql = "UPDATE posts SET title = ?,content=?,category_id=? WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$title,$content,$categorie_id,$id]);
    }
}
