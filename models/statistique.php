<?php
include_once('database.php');

class statistique extends Connection
{
    protected function getAllcategories(){
        $sql = "SELECT COUNT(*) AS Nbr FROM categories";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

     protected function getAllusers(){
        $sql = "SELECT COUNT(*) AS Nbr FROM users";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getAllposts(){
        $sql = "SELECT COUNT(*) AS Nbr FROM posts";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
