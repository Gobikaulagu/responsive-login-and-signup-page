document.addEventListener("DOMContentLoaded", function () {
  // === FORM SWITCHING (login/create toggle on index.php) ===
  const loginToggle = document.querySelector(".login");
  const createToggle = document.querySelector(".create");
  const container = document.querySelector(".container");

  if (loginToggle && createToggle && container) {
    loginToggle.addEventListener("click", function (e) {
      e.preventDefault();
      container.classList.add("signinForm");
    });

    createToggle.addEventListener("click", function (e) {
      e.preventDefault();
      container.classList.remove("signinForm");
    });
  }

  // === ANIMATED FORM WRAPPER LOGIC (if using form-wrapper style layout) ===
  const formWrapper = document.querySelector(".form-wrapper");
  const loginForm = document.getElementById("login-form");
  const signupForm = document.getElementById("signup-form");
  const signUpLink = document.getElementById("signUpLink");
  const loginLink = document.getElementById("loginLink");

  if (formWrapper && loginForm && signupForm && signUpLink && loginLink) {
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
  }
});
