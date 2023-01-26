<?php 

include_once __DIR__.'/../models/user.php';

class UsersController extends Users
{


    public function getUsers(){
        $result = $this->getUsersDB();
        return $result;
    }

    public function deleteUser(){
        if(isset($_POST['DeleteUser'])){
            $id = $_POST['DeleteUser'];
            $this->deleteUserDB($id);
        }
    }
    /* ============================== Login ============================== */

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION["email"]=$_POST['emailSignin'];
            $_SESSION["password"]= $_POST['passwordSignin'];
            if (isset($_POST['login'])) {
                $this->validateLogin($_POST['emailSignin'], $_POST['passwordSignin']);
            }
        } 
    }

    public function validateLogin($email, $password)
    {
        if (!$this->emptyInputLogin($email, $password)) {
            header("location: ../view/login.php?error=emptyinput");
            exit();
        } elseif (!$this->invalidEmail($email)) {
            header("location: ../view/login.php?error=Erroremail");
            exit();
        } else {
            $this->getUser($email, $password);
            header('location: statistique.php');
        }
    }

    /* ============================== Signup ============================== */

    public function signupUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['signup'])) {
                $_SESSION["name"]=$_POST['nameSignup'];
                $_SESSION["email"]=$_POST['emailSignup'];
                $_SESSION["password"]= $_POST['passwordSignup'];
                $_SESSION["Rpassword"]=$_POST['Repeatpassword'];
                $this->validateSignup($_POST['nameSignup'], $_POST['emailSignup'], $_POST['passwordSignup'], $_POST['Repeatpassword']);
            }
        }
    }

    public function validateSignup($name, $email, $password, $RepeatPassword)
    {
        if (!$this->emptyInputSignup($name, $email, $password, $RepeatPassword)) {
            header("location: ../view/signup.php?error=emptyinput");
            exit();
        } elseif (!$this->invalidName($name)) {
            header("location: ../view/signup.php?error=Errorusername");
            exit();
        } elseif (!$this->invalidEmail($email)) {
            header("location: ../view/signup.php?error=Erroremail");
            exit();
        } elseif (!$this->passwordMatch($password, $RepeatPassword)) {
            header("location: ../view/signup.php?error=Matchpassword");
            exit();
        } elseif (!$this->checkEmailSignup($email)) {
            header("location: ../view/signup.php?error=emailtaken");
            exit();
        } else {
            $this->setUser($name, $email, $password);
            header('location: ../view/login.php');
        }
    }

    /* ============================== Validation ============================== */

    public function emptyInputLogin($email, $password): bool
    {
        return !empty($email) && !empty($password);
    }

    public function emptyInputSignup($name, $email, $password, $RepeatPassword): bool
    {
        return !empty($name) && !empty($email) && !empty($password) && !empty($RepeatPassword);
    }

    public function emptyInputUpdate($name, $email): bool
    {
        return !empty($name) && !empty($email);
    } 

    public function invalidEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function invalidName($name): bool
    {
         if(!preg_match("/^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/",$name )){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    public function passwordMatch($password, $RepeatPassword): bool
    {
        if($password !== $RepeatPassword){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    public function checkEmailSignup($email): bool
    {
        if($this->checkEmailSignupBD($email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}
