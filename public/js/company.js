let inputCompany = ['name', 'type', 'headquarter', 'about'];
let companyId;
let currentData;

window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;

let response = await fetch(`http://localhost:8000/api/user/getCompanyId/${userId}`);
let data = await response.json();
companyId = data[0]['id'];

if (companyId == 1) {
    alert("You're not affiliated with any company")
    return;
}

response = await fetch(`http://localhost:8000/api/companie/getCompany/${companyId}`);
data = await response.json();
currentData = data[0];

for (let input of inputCompany)
  document.getElementById(input).value = currentData[input];
});

async function saveChanges() {
  let hasChanged = false;

  for (let input of inputCompany) {
    if (document.getElementById(input).value == "") {
      alert("Please fill all your company informations.")
      return;
    }
    if (currentData[input] !== document.getElementById(input).value) {
      currentData[input] = document.getElementById(input).value;
      hasChanged = true;
    }
  }
  let jsonData = JSON.stringify(currentData);

  if (confirm("Are you sure to changes your company info ?") && hasChanged) {
    try {
      await fetch(`http://localhost:8000/api/companie/updateCompany/${companyId}`, {
        headers: { 'Content-Type': 'application/json', },
        method: "POST",
        body: jsonData
      });
      alert("Changes saved");

    } catch (e) {
      alert("Cannot save changes.");
    }
  }
}