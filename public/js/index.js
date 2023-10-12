function showNav() {
  document.body.classList.toggle('burger-is-toggled');
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

let jobss = document.querySelectorAll(".job");
for (const job of jobss) {
  job.addEventListener("click", (e) => {
    if (window.innerWidth < 850)
      document.body.classList.toggle('content-is-toggled');
  });
}

document.querySelector(".rightarrow").addEventListener("click", (e) => {
  if (window.innerWidth < 850)
    document.body.classList.toggle('content-is-toggled');
});
