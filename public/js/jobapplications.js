let main_MaxSize = document.querySelector('main').offsetHeight;
let inputs = ['title', 'contract', 'name', 'more', 'location', 'salary'];
let empty = false;
let applicationId;

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
    jobId = document.querySelector("main").querySelectorAll("p")[0].getAttribute("data-id");
    await initContent(jobId);
    await eventJobs();
  }
}

async function initJobs() {
  const main = document.querySelector("main");
  main.innerHTML = "";

  let sep = document.createElement("div")
  sep.classList.add("separator");
  main.appendChild(sep);

  const response = await fetch(`http://localhost:8000/api/application/getApplyJob/${userId}`);
  const data = await response.json();

  if (data.length < 1) {
    empty = true;
    let title = document.createElement("p");
    title.classList.add("job");
    title.classList.add("candidates");
    title.innerHTML = "You haven't applied for any jobs.";
    let sep = document.createElement("div")
    sep.classList.add("separator");

    main.appendChild(title);
    main.appendChild(sep);
  }
  else {
    data.forEach(element => {
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
      svg.addEventListener("click", async (e) => { await removeApply(); });
  
      let sep = document.createElement("div")
      sep.classList.add("separator");
  
      title.appendChild(span);
      main.appendChild(title);
      main.appendChild(svg);
      main.appendChild(sep);
    }); 
  }
}

async function initContent(jobId) {
  
  let response = await fetch(`http://localhost:8000/api/index/${jobId}`);
  let data = await response.json();

  for (let input of inputs)
    document.getElementById(input).innerHTML = data[0][input];

  response = await fetch(`http://localhost:8000/api/application/getApplyData/${userId}/${jobId}`);
  data = await response.json();

  document.getElementById("textarea").value = data[0]['message'];
  setResponse(data[0]['is_accepted']);
}

function setResponse(index) {
  let input = ['Waiting for a reply', 'Application rejected', 'Application accepted'];
  let background = ['#b5b2b2', '#f9827c', '#b8e0d2']
  document.getElementById("response").innerHTML = input[index];
  document.getElementById("response").style.backgroundColor = background[index];

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
      alert("Application updated.");
    } catch (e) {
      alert("Cannot update your applications.");
    }
  }
}

async function removeApply() {
  if (confirm("Are you sure to delete this application ?")) {
      try {
        await fetch(`http://localhost:8000/api/application/removeApply/${userId}/${jobId}`);
        for (let input of inputs)
          document.getElementById(input).innerHTML = "";
        document.getElementById("textarea").value = "";
        reset();
        alert("Application deleted.");
      } catch (e) {
        alert("Cannot delete your application.");
      }
  }
}