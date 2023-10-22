let companyInputs = ['name', 'headquarter', 'type', 'about'];

document.getElementById("showpassword").addEventListener("click", (e) => {
    document.getElementById("password").type = document.getElementById("password").type == "password" ? "text" : "password";
});
document.getElementById("showpassword2").addEventListener("click", (e) => {
    document.getElementById("password2").type = document.getElementById("password2").type == "password" ? "text" : "password";
});

document.getElementById("isCompany").addEventListener("change", function() {
    document.getElementById("company_form").style.display = this.checked ? "block" : "none";
    for (let input of companyInputs) {
        if (this.checked)
            document.getElementById(input).setAttribute("required", "true");
        else
            document.getElementById(input).removeAttribute("required");
    }
});

document.querySelector("form").addEventListener("submit", async (e) => {
    e.preventDefault();

    if (document.getElementById("password").value !== document.getElementById("password2").value)
        alert("Passwords do not match. Please make sure both passwords are the same.");

    else if (document.getElementById("isCompany").checked) {
        document.getElementById("companyId").value = await createCompany();
        document.getElementById("roleId").value = 2;
        e.target.submit();
    }
    else
        e.target.submit();
});

async function createCompany() {

    let data = {};
    for (let input of companyInputs)
        data[input] = document.getElementById(input).value;
    let jsonData = JSON.stringify(data);

    const response = await fetch(`http://localhost:8000/api/companie/add`, {
        headers: { 'Content-Type': 'application/json', },
        method: "POST",
        body: jsonData
      });
    company_id = await response.json();
    return company_id;
}