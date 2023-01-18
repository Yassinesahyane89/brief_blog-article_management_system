<?php
    session_start();
    require_once '../../controlers/user.php';

    $signupController = new UsersController();
    $signupController->signupUser();

    $error="Veuillez remplir les champs ci-dessous.";


    if(isset($_GET["error"])){

        $nameSignup = $_SESSION["name"];
        $emailSignup = $_SESSION["email"];
        $passwordSignup = $_SESSION["password"];
        $Repeatpassword = $_SESSION["Rpassword"];

        if ($_GET["error"]=="emptyinput"){

            $error="Veuillez remplir les champs ci-dessous.";
        }

        if ($_GET["error"]=="emailtaken"){
            $error="Cette adresse e-mail est déjà utilisée.";
        }
        if ($_GET["error"]=="Matchpassword"){
            $error="les mots de passe ne correspondent pas.";
        }
    }

    $title = "Sign_Up";
    include_once "includes/header.php"
?>
<body>
    <div class="container active">
        <div class="formtitle">
            <span class="title">Registration</span>
        </div>
        <div class="validation-input-signup" <?php if(isset($_GET["error"])){ ?> style="display: flex;" <?php }?>>
            <div>
                <i class="bx bx-error-circle error-icon"></i>
            </div>
            <div class="message-content">
                <h4>Nous n'avons pas pu vous connecter</h4>
                <p><?php $error ?></p>
            </div>
        </div>
        <form method="POST" id="signup-form">
            <div class="input-field">
                <input type="text" placeholder="Enter your name" name="nameSignup" id="signup-username" oninput="checkName()">
                <i class="uil uil-user"></i>
            </div>
            <span class="error name-error" id="signup-username-error">
                <i class="bx bx-error-circle error-icon"></i>
                <p class="error-text" id="login-username-error">Please enter a valid email</p>
            </span>

            <div class="input-field">
                <input type="text" placeholder="Enter your email" name="emailSignup" id="signup-email" oninput="checkEmailSignup()">
                <i class="uil uil-envelope icon"></i>
            </div>
            <span class="error email-error" id="signup-email-error">
                <i class="bx bx-error-circle error-icon"></i>
                <p class="error-text">Please enter a valid email</p>
            </span>

            <div class="input-field">
                <input type="password" class="password" placeholder="Create a password" id="signup-password" name="passwordSignup" oninput="checkPasswordSignup()">
                <i class="uil uil-lock icon"></i>
            </div>
            <span class="error password-error" id="signup-password-error">
                <i class="bx bx-error-circle error-icon"></i>
                <p class="error-text">Please enter atleast 8 charatcer with number, symbol, small and capital letter.</p>
            </span>

            <div class="input-field">
                <input type="password" class="password" placeholder="Confirm a password" id="signup-Repasword" name="Repeatpassword" oninput="checkMatchPassword()">
                <i class="uil uil-lock lockR icon"></i>
            </div>
            <span class="error cPassword-error" id="signup-repeatpassword-error">
                <i class="bx bx-error-circle error-icon"></i>
                <p class="error-text">Password don't match</p>
            </span>

            <div class="input-field button">
                <button type="button" name="signup" id="signup" onclick="valideSignup()">Login</button>
            </div>
        </form>

        <div class="login-signup">
            <span class="text">Already a member?
                <a href="login.php" class="text login-link">Login Now</a>
            </span>
        </div>
    </div>

<?php
    include_once "includes/footer.php"
?>
