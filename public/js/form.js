async function initContent(id) {
  const response = await fetch(`http://localhost:8000/api/user/${id}`);
  const data = await response.json();

  document.querySelector(".jobtitle").innerHTML = data[0].title;
  document.querySelector(".jobcontract").innerHTML = data[0].contract;
  document.querySelector(".jobcompany").innerHTML = data[0].name;
  document.querySelector(".jobdescription").innerHTML = data[0].more;
  document.querySelector(".joblocation").innerHTML = data[0].location;
}

function eventJobs() {
  let jobs = document.querySelectorAll(".job");
  for (const job of jobs) {
    console.log
    job.addEventListener("click", async (e) => {
      initContent(e.srcElement.dataset.id);

      document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';
      if (window.innerWidth < 850)
        document.body.classList.toggle('content-is-toggled');
    });
  }
}

window.addEventListener('DOMContentLoaded', async (e) => {

  await initContent(1);
  eventJobs();
});