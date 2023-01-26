<?php

include_once('database.php');

class Users extends Connection
{

    protected function getUsersDB(){
        $sql = "SELECT id, username, email FROM users";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function deleteUserDB($id){
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this ->connect() -> prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = :email;');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            header("location: ../view/login.php?error=wronglogin");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, $user["password"])) {
            header("location: ../view/login.php?error=wronglogin");
            exit();
        }

        // create session variables
        $_SESSION["id"] = $user["id"];
        $_SESSION["name"] = $user["username"];
        $_SESSION["email"] = $email;
        $_SESSION["goodLogin"] = "Good";

    }

    protected function setUser($name, $email, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users(username,email,password) values (:name, :email, :password);');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
        $stmt->execute();
    }

    protected function checkEmailSignupBD($email)
    {
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = :email;');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
