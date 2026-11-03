console.log("connected");

function collectData() {
  alert("Login form submitted");
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  console.log("Collected data from form");
  console.log(email);
  console.log(password);

  if (!email) {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }

  if (!password) {
    document.getElementById("passwordErr").innerHTML = "Password is required";
  } else {
    document.getElementById("passwordErr").innerHTML = "";
  }

  return false;
}
