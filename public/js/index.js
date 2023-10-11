window.onscroll = function() {
    StickNavbar();
};

let navbar = document.querySelector("nav");
var sticky = navbar.offsetTop;

function StickNavbar() {
  if (window.scrollY >= sticky)
    navbar.classList.add("sticky")
  else
    navbar.classList.remove("sticky");
}