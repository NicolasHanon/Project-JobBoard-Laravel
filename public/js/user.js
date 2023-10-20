let inputNames = ['email', 'lastname', 'more', 'name', 'phone'];
let currentData;

window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;
  const response = await fetch(`http://localhost:8000/api/user/${userId}`);
  currentData = await response.json();

for (let input of inputNames)
  document.getElementById(input).value = currentData[0][input];
});

async function saveChanges() {
  let hasChanged = false;

  for (let input of inputNames) {
    if (document.getElementById(input).value == "") {
      alert("Please fill all your personnal informations.")
      return;
    }
    if (currentData[0][input] !== document.getElementById(input).value) {
      currentData[0][input] = document.getElementById(input).value;
      hasChanged = true;
    }
  }
  let jsonData = JSON.stringify(currentData);

  if (confirm("Are you sure to changes your info ?") && hasChanged) {
    try {
      await fetch(`http://localhost:8000/api/user/update/${userId}`, {
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