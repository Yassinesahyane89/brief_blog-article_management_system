<?php

include_once __DIR__.'/../models/categories.php';

class categoriesController extends categories
{


    public function getCategories()
    {
        $result = $this->getCategoriesDB();
        return $result;
    }

    public function deleteCategories()
    {
        if(isset($_POST['DeleteCategories'])){
            $id = $_POST['DeleteCategories'];
            $this->deleteCategoriesDB($id);
        }
    }

    public function addCategories(){
        if (isset($_POST['saveCategorie'])) {
            if (empty($_POST['namecategorie'])) {
                $_SESSION['icon'] = "error";
                $_SESSION['message'] = "Veuillez remplir tous les champs";
                header('Location: categories.php'); 
                die;
            }else{
                $this -> addCategoriesDB($_POST['namecategorie']);
                $_SESSION['icon'] = "success";
                $_SESSION['message'] = "categorie ajouté avec succès";
                header('Location:'. $_SERVER['PHP_SELF']);
                die;
            }
        }
            
    }

    public function updateCategorie(){
        if (isset($_POST['UpdateCategorie'])) {
            if (empty($_POST['namecategorie'])) {
                $_SESSION['icon'] = "error";
                $_SESSION['message'] = "Veuillez remplir tous les champs";
                header('Location: categories.php'); 
                die;
            }else{
                $this -> UpdateCategoriesDB($_POST['categorie_id'],$_POST['namecategorie']);
                $_SESSION['icon'] = "success";
                $_SESSION['message'] = "categorie Update avec succès";
                header('Location:'. $_SERVER['PHP_SELF']);
                die;
            }
        }
    }
}