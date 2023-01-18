<?php
    session_start();
    require_once '../../controlers/user.php';

    $signupController = new UsersController();
    $signupController->loginUser();

    $error="Veuillez remplir les champs ci-dessous.";

    if(isset($_GET["error"])=="wronglogin"){
        $email = $_SESSION["email"];
        $password =  $_SESSION["password"];
        $error="l'adresse courriel ou le mot de passe que vous avez saisis sont incorrects. Veuillez réessayer.";
    }
    $title = "Login";
    include_once "includes/header.php"
?>
    <body>
        <div class="container">
            <div class="formtitle">
                <span class="title">Login</span>
            </div>
            <div class="validation-input-signin" <?php if(isset($_GET["error"])=="wronglogin"){ ?> style="display: flex;" <?php }?>>
                <div>
                    <i class="bx bx-error-circle error-icon"></i>
                </div>
                <div class="message-content">
                    <h4>Nous n'avons pas pu vous connecter</h4>
                    <p>l'adresse courriel ou le mot de passe que vous avez saisis sont incorrects. Veuillez réessayer.</p>
                </div>
            </div>
            <form method="POST" id="login-form">
                <div class="input-field">
                    <input type="text" placeholder="Enter your email" id="login-email" name="emailSignin" oninput="checkEmailSignin()">
                    <i class="uil uil-envelope icon"></i>
                </div>
                
                <span class="error email-error" id="login-email-error">
                    <i class="bx bx-error-circle error-icon"></i>
                    <p class="error-text">Please enter a valid email</p>
                </span>

                <div class="input-field">
                    <input type="password" class="password" placeholder="Enter your password" id="login-password" name="passwordSignin" oninput="checkPasswordSignin()">
                    <i class="uil uil-lock icon"></i>
                </div>
                <span class="error password-error" id="login-password-error">
                    <i class="bx bx-error-circle error-icon"></i>
                    <p class="error-text">Please enter a valid password.</p>
                </span>

                <div class="input-field button">
                    <button type="button" name="login" id="login" onclick="valideSignin()">Login</button>
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Not a member?
                    <a href="register.php" class="text signup-link">Signup Now</a>
                </span>
            </div>
        </div>
<?php
    include_once "includes/footer.php"
?>
