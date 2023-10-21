let main_MaxSize = document.querySelector('main').offsetHeight;
let job_id = document.getElementById("job_id").value;
let user_id;
let inputs = ['name', 'lastname', 'email', 'phone', 'more'];
let response = ['waiting', 'rejected', 'accepted'];
let empty = false;

window.addEventListener('DOMContentLoaded', async (e) => {

  await initJobs();
  if (!empty) {
    user_id = document.querySelector("main").querySelectorAll("p")[0].getAttribute("data-id");
    await initContent(user_id);
    await eventJobs();
  }

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

  const response = await fetch(`http://localhost:8000/api/application/getApplicants/${job_id}`);
  const data = await response.json();

  if (data.length < 1) {
    empty = true;
    let title = document.createElement("p");
    title.classList.add("job");
    title.classList.add("candidates");
    title.innerHTML = "No applications were received for this job.";
    let sep = document.createElement("div")
    sep.classList.add("separator");

    main.appendChild(title);
    main.appendChild(sep);
  }
  else {
    data.forEach(element => {
    let title = document.createElement("p");
    title.classList.add("job");
    title.classList.add("candidates");
    title.innerHTML = element.name + " " + element.lastname;
    title.setAttribute('data-id' , `${element.id}`);

    let sep = document.createElement("div")
    sep.classList.add("separator");

    main.appendChild(title);
    main.appendChild(sep);
    });
  }
}

async function initContent(user_id) {
    let response = await fetch(`http://localhost:8000/api/user/${user_id}`);
    let data = await response.json();

    for (let input of inputs)
        document.getElementById(input).innerHTML = data[0][input];

    response = await fetch(`http://localhost:8000/api/application/getApplyData/${user_id}/${job_id}`);
    data = await response.json();

    document.getElementById('message').innerHTML = data[0]['message'];
    setAccepted(data[0]['is_accepted']);
}

async function eventJobs() {
  let candidates = document.querySelectorAll(".job");
  for (const candidate of candidates) {
    candidate.addEventListener("click", async (e) => {
      user_id = candidate.getAttribute('data-id')
      await initContent(user_id);

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

function setAccepted(index) {
    for (let res of response)
        document.getElementById(res).classList.add("disabled");
    document.getElementById(response[index]).classList.remove("disabled");
}

async function updateAccepted(index) {
    let data = {};
    data['is_accepted'] = index;
    let jsonData = JSON.stringify(data);

    if (confirm("Are you sure about your response ? You can still change your mind after that !")) {
        try {
            const response = await fetch(`http://localhost:8000/api/application/updateResponse/${user_id}/${job_id}`, {
                headers: { 'Content-Type': 'application/json', },
                method: "POST",
                body: jsonData
            });
            alert("Response sent !");
            setAccepted(index);
        } catch (e) {
            alert("Cannot sent response.");
        }
    }
}