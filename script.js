const formWrapper = document.querySelector(".form-wrapper");
const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const signUpLink = document.getElementById("signUpLink");
const loginLink = document.getElementById("loginLink");

signUpLink.addEventListener("click", (e) => {
  e.preventDefault();
  formWrapper.style.transform = "translateX(-50%)";
  signupForm.classList.add("active");
  loginForm.classList.remove("active");
});

loginLink.addEventListener("click", (e) => {
  e.preventDefault();
  formWrapper.style.transform = "translateX(0)";
  loginForm.classList.add("active");
  signupForm.classList.remove("active");
});
