console.log("connected");

function collectFormData() {
  //   alert("Clicked on submit button...");
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  console.log("Printing given values...");
  console.log(email);
  console.log(password);

  if (!email) {
    document.getElementById("emailErr").innerHTML = "Email is required";
  }
  return false;
}
