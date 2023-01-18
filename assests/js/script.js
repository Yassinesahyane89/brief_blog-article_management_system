/* ======================================= SignIn ======================================= */
EmailLogin = document.getElementById("login-email");
passwordLogin = document.getElementById("login-password");

iconenvelope = document.querySelector(".uil-envelope");
iconlock = document.querySelector(".uil-lock");
iconlockRepPsw = document.querySelector(".lockR");
iconuser = document.querySelector(".uil-user");

errorEmailLogin = document.getElementById("login-email-error");
errorpasswordLogin = document.getElementById("login-password-error");

validationInputSignin = document.querySelector(".validation-input-signin");
validationInputSignup = document.querySelector(".validation-input-signup");

buttonSubmitlogin = document.querySelector("#login");

function valideSignin() {
    if (EmailLogin.value === "" || passwordLogin.value === "") {
        if (EmailLogin.value === "") {
        errorEmailLogin.style.display = "flex";
        iconenvelope.style.color = "#d93025";
        EmailLogin.style.borderBottomColor = "#d93025";
        }

        if (passwordLogin.value === "") {
        errorpasswordLogin.style.display = "flex";
        iconlock.style.color = "#d93025";
        passwordLogin.style.borderBottomColor = "#d93025";
        }

        buttonSubmitlogin.setAttribute("type", "button");
        validationInputSignin.style.display = "flex";
    } else {
        buttonSubmitlogin.setAttribute("type", "submit");
        validationInputSignin.style.display = "none";
    }
}

function checkEmailSignin() {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (EmailLogin.value.match(mailformat)) {
        buttonSubmitlogin.setAttribute("type", "submit");
        errorEmailLogin.style.display = "none";
        EmailLogin.style.borderBottomColor = "#265df2";
        iconenvelope.style.color = "#265df2";
    } else {
        buttonSubmitlogin.setAttribute("type", "button");
        errorEmailLogin.style.display = "flex";
        EmailLogin.style.borderBottomColor = "#d93025";
        iconenvelope.style.color = "#d93025";
    }
}

function checkPasswordSignin() {
    if (passwordLogin.value == "" || passwordLogin.value.length < 8) {
        errorpasswordLogin.style.display = "flex";
        iconlock.style.color = "#d93025";
        passwordLogin.style.borderBottomColor = "#d93025";
    } else {
        errorpasswordLogin.style.display = "none";
        iconlock.style.color = "#265df2";
        passwordLogin.style.borderBottomColor = "#265df2";
    }
}


/* ======================================= SignUp ======================================= */

NameSinup = document.getElementById("signup-username");
EmailSinup = document.getElementById("signup-email");
passwordSinup = document.getElementById("signup-password");
PasswordSignuprepeat = document.getElementById("signup-Repasword");

buttonSubmit = document.querySelector("#signup");


errorName = document.getElementById("signup-username-error");
errorEmail = document.getElementById("signup-email-error");
errorpassword = document.getElementById("signup-password-error");
errorpasswordrepaeat = document.getElementById("signup-repeatpassword-error");

function valideSignup() {
    if (
        NameSinup.value == "" ||
        EmailSinup.value == "" ||
        passwordSinup.value == "" ||
        PasswordSignuprepeat.value == ""
    ) {
        if (NameSinup.value === "") {
        errorName.style.display = "flex";
        iconuser.style.color = "#d93025";
        NameSinup.style.borderBottomColor = "#d93025";
        }

        if (EmailSinup.value === "") {
        errorEmail.style.display = "flex";
        iconenvelope.style.color = "#d93025";
        EmailSinup.style.borderBottomColor = "#d93025";
        }

        if (passwordSinup.value === "") {
        errorpassword.style.display = "flex";
        iconlock.style.color = "#d93025";
        passwordSinup.style.borderBottomColor = "#d93025";
        }

        if (PasswordSignuprepeat.value === "") {
        errorpasswordrepaeat.style.display = "flex";
        iconlockRepPsw.style.color = "#d93025";
        PasswordSignuprepeat.style.borderBottomColor = "#d93025";
        }

        buttonSubmit.setAttribute("type", "button");
        validationInputSignup.style.display = "flex";
    } else {
        buttonSubmit.setAttribute("type", "submit");
        validationInputSignup.style.display = "none";
    }
}

function checkName() {
    var NameFormat = /^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/;
    if (NameSinup.value.match(NameFormat)) {
        buttonSubmit.setAttribute("type", "submit");
        errorName.style.display = "none";
        NameSinup.style.borderBottomColor = "#265df2";
        iconuser.style.color = "#265df2";
    } else {
        buttonSubmit.setAttribute("type", "button");
        errorName.style.display = "flex";
        NameSinup.style.borderBottomColor = "#d93025";
        iconuser.style.color = "#d93025";
    }
}

function checkEmailSignup() {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (EmailSinup.value.match(mailformat)) {
        buttonSubmit.setAttribute("type", "submit");
        errorEmail.style.display = "none";
        EmailSinup.style.borderBottomColor = "#265df2";
        iconenvelope.style.color = "#265df2";
    } else {
        buttonSubmit.setAttribute("type", "button");
        errorEmail.style.display = "flex";
        EmailSinup.style.borderBottomColor = "#d93025";
        iconenvelope.style.color = "#d93025";
    }
}

function checkPasswordSignup() {
    if (passwordSinup.value == "" || passwordSinup.value.length < 8) {
        buttonSubmit.setAttribute("type", "button");
        errorpassword.style.display = "flex";
        iconlock.style.color = "#d93025";
        passwordSinup.style.borderBottomColor = "#d93025";
    } else {
        buttonSubmit.setAttribute("type", "submit");
        errorpassword.style.display = "none";
        iconlock.style.color = "#265df2";
        passwordSinup.style.borderBottomColor = "#265df2";
    }
}

function checkMatchPassword() {
    console.log(passwordSinup.value);
    console.log(PasswordSignuprepeat.value);
    if (
        passwordSinup.value !== PasswordSignuprepeat.value ||
        PasswordSignuprepeat.value === ""
    ) {
        console.log("hhhh");
        buttonSubmit.setAttribute("type", "button");
        errorpasswordrepaeat.style.display = "flex";
        iconlockRepPsw.style.color = "#d93025";
        PasswordSignuprepeat.style.borderBottomColor = "#d93025";
    } else {
        buttonSubmit.setAttribute("type", "submit");
        errorpasswordrepaeat.style.display = "none";
        iconlockRepPsw.style.color = "#265df2";
        PasswordSignuprepeat.style.borderBottomColor = "#265df2";
    }
}
