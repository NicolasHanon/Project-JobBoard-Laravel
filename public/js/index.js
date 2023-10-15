let main_MaxSize = document.querySelector('main').offsetHeight;

window.addEventListener('DOMContentLoaded', (event) => {

  function adjustMargin() {
    document.querySelector('main').style.margin = (window.innerHeight - document.querySelector('.nav').offsetHeight > main_MaxSize) ? 'auto' : '20px';
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
  job.addEventListener("click", async (e) => {

    const response = await fetch(`http://localhost:8000/api/index/${e.srcElement.dataset.id}`);
    const data = await response.json();
    
    document.querySelector(".jobtitle").innerHTML = data[0].title;
    document.querySelector(".jobcontract").innerHTML = data[0].contract;
    document.querySelector(".jobcompany").innerHTML = data[0].name;
    document.querySelector(".jobdescription").innerHTML = data[0].more;
    document.querySelector(".joblocation").innerHTML = data[0].location;

    if (window.innerWidth < 850) {
      document.querySelector('.content').style.margin = (window.innerHeight - 80 < document.querySelector('.content').offsetHeight) ? '80px 0 20px 0' : 'auto';
      document.body.classList.toggle('content-is-toggled');
    }
  });
}

document.querySelector(".rightarrow").addEventListener("click", (e) => {
  if (window.innerWidth < 850) {
    document.body.classList.toggle('content-is-toggled');
    setTimeout(() => {
      document.querySelector('.content').style.margin = "20px";
    }, 300);
  }
});

function showNav() {
  document.body.classList.toggle('burger-is-toggled');
}