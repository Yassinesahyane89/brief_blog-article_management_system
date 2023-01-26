<?php
include_once('database.php');

class categories extends Connection
{
    protected function getCategoriesDB(){
        $sql = "SELECT id, name FROM categories";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function deleteCategoriesDB($id){
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        echo $stmt->execute([$id]);
        die;
    }

    protected function addCategoriesDB($name){
        $sql = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([ $name]);
    }


    protected function UpdateCategoriesDB($id,$name){
        $sql = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$name,$id]);
    }
}
