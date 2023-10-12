function showNav() {
  document.body.classList.toggle('nav-is-toggled');
}

//data.id, data.companies_id, data.title, data.contract, data.more, data.location, data.name

let jobs = document.querySelectorAll(".job")
let desc = document.querySelector(".content")
jobs.forEach(
  job => job.addEventListener("click", (e) => {
  fetch(`http://localhost:8000/api/index/${e.srcElement.dataset.id}`)
  .then(response => { return response.json();})
  .then(data => {
    desc.innerHTML = data[0].name;
  })
}));