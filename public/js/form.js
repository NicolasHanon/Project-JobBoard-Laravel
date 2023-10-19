window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;
  const response = await fetch(`http://localhost:8000/api/user/${userId}`);
  const data = await response.json();

  document.getElementById("name").value = data[0].name;
  document.getElementById("lastname").value = data[0].lastname;
  document.getElementById("email").value = data[0].email;
  // document.getElementsByName("phone").value = data[0].phone;
  // document.getElementsByName("about").value = data[0].more;

  document.getElementById("password").value = "";
});