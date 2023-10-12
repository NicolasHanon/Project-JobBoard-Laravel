function showNav() {
  document.body.classList.toggle('burger-is-toggled');
}

let jobs = document.querySelectorAll(".job");
for (const job of jobs) {
  job.addEventListener("click", (e) => {
    if (window.innerWidth < 850)
      document.body.classList.toggle('content-is-toggled');
  });
}

document.querySelector(".rightarrow").addEventListener("click", (e) => {
  if (window.innerWidth < 850)
    document.body.classList.toggle('content-is-toggled');
});