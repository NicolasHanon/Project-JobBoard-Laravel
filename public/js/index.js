let maxSize = document.querySelector('main').offsetHeight;

window.addEventListener('DOMContentLoaded', (event) => {

  function adjustMargin() {
    document.querySelector('main').style.margin = (window.innerHeight - document.querySelector('.nav').offsetHeight > maxSize) ? 'auto' : '20px';
  }

  adjustMargin();
  window.addEventListener('resize', adjustMargin);

  fetch(`http://localhost:8000/api/index/${1}`)
    .then(response => { return response.json();})
    .then(data => {
      document.querySelector(".jobtitle").innerHTML = data[0].title; 
      document.querySelector(".jobcontract").innerHTML = data[0].contract;
      document.querySelector(".jobcompany").innerHTML = data[0].name;
      document.querySelector(".jobdescription").innerHTML = data[0].more;
      document.querySelector(".joblocation").innerHTML = data[0].location;
    });
});

let jobs = document.querySelectorAll(".job");
for (const job of jobs) {
  job.addEventListener("click", (e) => {
    fetch(`http://localhost:8000/api/index/${e.srcElement.dataset.id}`)
    .then(response => { return response.json();})
    .then(data => {
      document.querySelector(".jobtitle").innerHTML = data[0].title; 
      document.querySelector(".jobcontract").innerHTML = data[0].contract;
      document.querySelector(".jobcompany").innerHTML = data[0].name;
      document.querySelector(".jobdescription").innerHTML = data[0].more;
      document.querySelector(".joblocation").innerHTML = data[0].location;
    });

    if (window.innerWidth < 850)
      document.body.classList.toggle('content-is-toggled');
  });
}

document.querySelector(".rightarrow").addEventListener("click", (e) => {
  if (window.innerWidth < 850)
    document.body.classList.toggle('content-is-toggled');
});

function showNav() {
  document.body.classList.toggle('burger-is-toggled');
}