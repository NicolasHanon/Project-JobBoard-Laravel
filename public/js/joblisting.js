let main_MaxSize = document.querySelector('main').offsetHeight;
let inputs = ['title', 'contract', 'more', 'location', 'salary'];
let companyId;
let currentData;
let job_id;
let empty = false;

window.addEventListener('DOMContentLoaded', async (e) => {

  await reset();

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

async function reset() {
  await initJobs();
  if (!empty) {
    job_id = document.querySelector("main").querySelectorAll("p")[0].getAttribute("data-id");
    setUrl(job_id);
    await initContent(job_id);
    await eventJobs();
  }
}

async function initJobs() {
  const main = document.querySelector("main");
  main.innerHTML = "";

  let sep = document.createElement("div")
  sep.classList.add("separator");
  main.appendChild(sep);

  let response = await fetch(`http://localhost:8000/api/user/getCompanyId/${userId}`);
  const data = await response.json();
  companyId = data[0]['id'];

  response = await fetch(`http://localhost:8000/api/job/getJobListing/${companyId}`);
  currentData = await response.json();

  if (currentData.length < 1) {
    empty = true;
    let title = document.createElement("p");
    title.classList.add("job");
    title.classList.add("candidates");
    title.innerHTML = "You haven't posted any job ads.";
    let sep = document.createElement("div")
    sep.classList.add("separator");

    main.appendChild(title);
    main.appendChild(sep);
  }
  else {
    currentData.forEach(element => {
      let title = document.createElement("p");
      title.classList.add("job");
      title.innerHTML = element.title;
      title.setAttribute('data-id' , `${element.id}`);
  
      let span = document.createElement("span");
      span.innerHTML = " - " + element.name;
      title.setAttribute('data-id' , `${element.id}`);

      let svg = document.createElement("img");
      svg.src = "../svg/trash.svg";
      svg.classList.add("trash");
      svg.addEventListener("click", async (e) => { await removeJobs(); });
  
      let sep = document.createElement("div")
      sep.classList.add("separator");
  
      title.appendChild(span);
      main.appendChild(title);
      main.appendChild(svg);
      main.appendChild(sep);
    });
  }
}

async function initContent(job_id) {
    const response = await fetch(`http://localhost:8000/api/index/${job_id}`);
    let data = await response.json();
    currentData = data[0];

    for (let input of inputs)
      document.getElementById(input).value = currentData[input];

    addInputEvent();
}

function addInputEvent() {
    let inputs = document.querySelectorAll("input");
    for (let input of inputs) {
        input.addEventListener("input", (e) => {
            document.getElementById("updateBtn").classList.add('tosave');
        })
    }
}

async function eventJobs() {
  let jobs = document.querySelectorAll(".job");
  for (const job of jobs) {
    job.addEventListener("click", async (e) => {
      job_id = job.getAttribute('data-id')
      setUrl(job_id);
      await initContent(job_id);

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

async function updateJobs(){
    document.getElementById("updateBtn").classList.remove('tosave');
    let hasChanged = false;
    let data = {};

    for (let input of inputs) {
        let tmp = document.getElementById(input).value;
        if (tmp == "") {
            alert("Please fill all the informations.")
            return;
        }
        if (currentData[input] != document.getElementById(input).value) {
            data[input] = tmp;
            hasChanged = true;
        }
    }
    let jsonData = JSON.stringify(data);

    if (confirm("Are you sure to update your job ad ?") && hasChanged) {
        try {
          const response = await fetch(`http://localhost:8000/api/job/updateJob/${job_id}`, {
              headers: { 'Content-Type': 'application/json', },
              method: "POST",
              body: jsonData
          });
          alert("Job updated.");
        } catch (e) {
          alert("Cannot update your job.");
        }
    }
}

async function removeJobs() {
    if (confirm("Are you sure to delete this job ad ?")) {
        try {
          await fetch(`http://localhost:8000/api/job/remove/${job_id}`);
          for (let input of inputs)
            document.getElementById(input).value = "";
          reset();
          alert("Job deleted.");
        } catch (e) {
          alert("Cannot delete your job ad.");
        }
    }
}

function setUrl(job_id) { 
  var baseUrl = document.getElementById('candidatesLink').getAttribute('data-base-url');
  document.getElementById('candidatesLink').href = baseUrl + '/' + job_id;
}
