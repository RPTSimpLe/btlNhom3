
function showPW(eye) {
  var passwordShow = document.querySelector(".password");
  if (passwordShow.type === "password") {
    passwordShow.type = "text";
    eye.innerHTML = '<i class="fa fa-eye"></i>';
  } else {
    passwordShow.type = "password";
    eye.innerHTML = '<i class="fa fa-eye-slash"></i>';
  }
}
