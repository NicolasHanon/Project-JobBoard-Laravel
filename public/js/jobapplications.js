let main_MaxSize = document.querySelector('main').offsetHeight;

window.addEventListener('DOMContentLoaded', async (e) => {

  await initJobs();
  jobId = document.querySelector("main").querySelectorAll("p")[0].getAttribute("data-id");
  await initContent(jobId);
  await eventJobs();

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

async function initJobs() {
  const main = document.querySelector("main");

  const response = await fetch(`http://localhost:8000/api/application/getApplyJob/${userId}`);
  const data = await response.json();

  data.forEach(element => {
    let title = document.createElement("p");
    title.classList.add("job");
    title.innerHTML = element.title;
    title.setAttribute('data-id' , `${element.id}`);

    let span = document.createElement("span");
    span.innerHTML = " - " + element.name;
    title.setAttribute('data-id' , `${element.id}`);

    let sep = document.createElement("div")
    sep.classList.add("separator");

    title.appendChild(span);
    main.appendChild(title);
    main.appendChild(sep);
  }); 
}

async function initContent(jobId) {
    const response = await fetch(`http://localhost:8000/api/index/${jobId}`);
    const data = await response.json();

  document.querySelector(".jobtitle").innerHTML = data[0].title;
  document.querySelector(".jobcontract").innerHTML = data[0].contract;
  document.querySelector(".jobcompany").innerHTML = data[0].name;
  document.querySelector(".jobdescription").innerHTML = data[0].more;
  document.querySelector(".joblocation").innerHTML = data[0].location;

  const response2 = await fetch(`http://localhost:8000/api/application/getMessage/${userId}/${jobId}`);
  const message = await response2.json();
  document.getElementById("textarea").value = message[0]['message'];
}

async function eventJobs() {
  let jobs = document.querySelectorAll(".job");
  for (const job of jobs) {
    job.addEventListener("click", async (e) => {
      jobId = job.getAttribute('data-id')
      await initContent(jobId);

      document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';
      if (window.innerWidth < 850)
        document.body.classList.toggle('content-is-toggled');
    });
  }
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

async function updateApply(){

  let data = {};
  data['message'] = document.getElementById("textarea").value;

  let jsonData = JSON.stringify(data);

  if (confirm("Are you sure to update your applications ?")) {
    try {
      const response = await fetch(`http://localhost:8000/api/application/updateMessage/${userId}/${jobId}`, {
        headers: { 'Content-Type': 'application/json', },
        method: "POST",
        body: jsonData
      });
    //   const data = await response.json();
      alert("Application updated.");
    } catch (e) {
      alert("Cannot update your applications.");
    }
  }
}