function checkEmail() {
  let username = document.getElementById("username").value;
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("usernameError").innerHTML = this.responseText;
    } else {
      document.getElementById("usernameError").innerHTML = this.status;
    }
  };

  xhttp.open("POST", "../Controller/checkEmail.php", true);
  xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  xhttp.send("username=" + username);
}
