let inputNames = ['email', 'lastname', 'more', 'name', 'phone'];
let currentData;

window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;
  const response = await fetch(`http://localhost:8000/api/user/${userId}`);
  const data = await response.json();
  currentData = data;

for (let input of inputNames)
  document.getElementById(input).value = data[0][input];
});

async function saveChanges() {
  let hasChanged = false;

  for (let input of inputNames) {
    if (currentData[input] !== document.getElementById(input).value) {
      currentData[input] = document.getElementById(input).value;
      hasChanged = true;
    }
  }
  let jsonData = JSON.stringify(currentData);

  if (hasChanged) {
    const response = await fetch(`http://localhost:8000/api/user/update/${jsonData}/${userId}`);
    const data = await response.json();

    console.log(data);
  }
}