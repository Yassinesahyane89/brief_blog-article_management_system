<?php

include_once __DIR__.'/../models/posts.php';

class postsController extends posts
{


    public function getPosts($id)
    {
        $result = $this->getPostsDB($id);
        return $result;
    }

    public function deletePosts()
    {
        if(isset($_POST['Deletepost'])){
            $id = $_POST['Deletepost'];
            $this->deletePostsDB($id);
            header('Location: '. $_SERVER['PHP_SELF']); //refresh page
            die;
        }
    }

    public function addPosts(){
        if (isset($_POST['savePost'])) {
            $i=0;
            for($i=0;$i<count($_FILES["picture"]["name"]);$i++){
                if( empty($_POST['postTitle'][$i]) || empty($_POST['postContent'][$i]) || empty($_POST['categorie'][$i]) || empty($_POST['User_id'])){
                    $_SESSION['icon'] = "error";
                    $_SESSION['message'] = "Veuillez remplir tous les champs";
                    header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                    die;
                }else{
                    $fileDestination=$this->checkImage($i);
                    if($fileDestination=="vide"){
                        $_SESSION['icon'] = "error";
                        $_SESSION['message'] = "Veuillez remplir tous les champs";
                        header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                        die;
                    }else{
                        $this -> addPostsDB($_POST['postTitle'][$i], $_POST['postContent'][$i], $_POST['categorie'][$i],$_POST['User_id'], $fileDestination);
                    }
                }
            }
            if($i==count($_FILES["picture"]["name"])){
                    $_SESSION['icon'] = "success";
                    $_SESSION['message'] = "post ajouté avec succès";
                    header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                    die;
            }
        }
    }

    public function updatePosts(){
        if (isset($_POST['UpdatePost'])) {
            if( empty($_POST['postTitle'][0]) || empty($_POST['postContent'][0]) || empty($_POST['categorie'][0])){
                $_SESSION['icon'] = "error";
                $_SESSION['message'] = "Veuillez remplir tous les champs";
                header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                die;
            }else{
                $fileDestination=$this->checkImage(0);
                if ($fileDestination!="vide") {
                    $this -> UpdatWithimageDB($_POST['post_id'][0],$_POST['postTitle'][0], $_POST['postContent'][0], $_POST['categorie'][0], $fileDestination);
                }else{
                    $this -> UpdatWithoutmageDB($_POST['post_id'][0],$_POST['postTitle'][0], $_POST['postContent'][0], $_POST['categorie'][0]);
                }
                $_SESSION['icon'] = "success";
                $_SESSION['message'] = "post Update avec succès";
                header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                die;
            }                
        }
    }

    function checkImage($i){
        if (!empty($_FILES["picture"]["name"][$i])) {
            $fileName = $_FILES['picture']['name'][$i];
            $fileTmpName = $_FILES['picture']['tmp_name'][$i];
            $fileSize = $_FILES['picture']['size'][$i];
            $fileError = $_FILES['picture']['error'][$i];
            $fileType = $_FILES['picture']['type'][$i];
        
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png' , 'jfif');
    
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1728640) {  // 10MB max file size
                        $fileNameNew = uniqid("IMG-", true).'.'. $fileActualExt;
                        $fileDestination = "../assets/image/" . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        return $fileDestination;
                    } else {
                        $_SESSION['icon'] = "erreur";
                        $_SESSION['message'] = "La taille de fichier est trop grand!!";
                        header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                        die;
                    }
                } else {
                    $_SESSION['icon'] = "erreur";
                    $_SESSION['message'] = "Erreur de téléchargement de fichier!!";
                    header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                    die;
                }
            } else {
                $_SESSION['icon'] = "erreur";
                $_SESSION['message'] = "Erreur de type de fichier!!";
                header('Location: '. $_SERVER['PHP_SELF']); //refresh page
                die;
            }
        }else{
            return "vide";
        }
    }
}