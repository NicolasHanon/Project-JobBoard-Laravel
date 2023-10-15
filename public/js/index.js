let main_MaxSize = document.querySelector('main').offsetHeight;

window.addEventListener('DOMContentLoaded', async (e) => {

  const response = await fetch(`http://localhost:8000/api/index/${1}`);
  const data = await response.json();
  
  document.querySelector(".jobtitle").innerHTML = data[0].title;
  document.querySelector(".jobcontract").innerHTML = data[0].contract;
  document.querySelector(".jobcompany").innerHTML = data[0].name;
  document.querySelector(".jobdescription").innerHTML = data[0].more;
  document.querySelector(".joblocation").innerHTML = data[0].location;
  
  function adjustMargin() {
    if (main_MaxSize < document.querySelector('main').offsetHeight && window.innerWidth < 850 || main_MaxSize < document.querySelector('main').offsetHeight && window.innerWidth > 850) {
      main_MaxSize = document.querySelector('main').offsetHeight;
    }

    document.querySelector('main').style.margin = (window.innerHeight - document.querySelector('.nav').offsetHeight > main_MaxSize) ? 'auto' : '20px';
    document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';
    document.querySelector('.nav').style.height = window.innerWidth > window.innerHeight && window.innerWidth < 850 ? "12%" : "8%";
  }
  
  adjustMargin();
  window.addEventListener('resize', adjustMargin);
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

    document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';

    if (window.innerWidth < 850)
      document.body.classList.toggle('content-is-toggled');
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