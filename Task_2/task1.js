let wrongCount = 0;

document.getElementById("loginForm").addEventListener("submit", function(event) {

    event.preventDefault(); // Prevent form submission

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let errorMessage = "";

    // Email validation
    if (!email.includes("@")) {
        errorMessage += "Email must contain '@'. <br>";
    }

    // Password length validation
    if (password.length < 6) {
        errorMessage += "Password must be at least 6 characters long. <br>";
    }

    // Password must contain #
    if (!password.includes("#")) {
        errorMessage += "Password must contain '#'. <br>";
    }

    if (errorMessage !== "") {
        wrongCount++;
        document.getElementById("error").innerHTML = errorMessage;
        document.getElementById("count").innerHTML = wrongCount;
    } else {
        document.getElementById("error").innerHTML = "Login Successful!";
    }

});













9