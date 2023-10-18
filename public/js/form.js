window.addEventListener('DOMContentLoaded', async (e) => {
  const response = await fetch(`http://localhost:8000/api/user/${id}`);
  const data = await response.json();
  document.querySelector(".userlastname").innerHTML = data[0].lastname;
  document.querySelector(".username").innerHTML = data[0].name;
  document.querySelector(".useremail").innerHTML = data[0].email;
  document.querySelector(".userpassword").innerHTML = data[0].password;
  document.querySelector(".userroleId").innerHTML = data[0].roleId;
});