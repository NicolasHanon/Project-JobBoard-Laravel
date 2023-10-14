document.getElementById("showpassword").addEventListener("click", (e) => {
    document.getElementById("password").type = document.getElementById("password").type == "password" ? "text" : "password";
})