const passwordField = document.getElementById("password");
const showPassWord = document.getElementById("showPassword");
const passwordText = document.getElementById("passwordText");

showPassWord.addEventListener("click", () => {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordText.textContent = "Hide Password";
    } else {
        passwordField.type = "password";
        passwordText.textContent = "Show Password";
    }
});
