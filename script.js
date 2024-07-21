// RESPONSIVE UNTUK TAMPILAN MOBILE
const menuMobile = document.querySelector("nav ul");
function showMenu() {
  menuMobile.classList.add("show-nav-ul");
}

function hideMenu() {
  menuMobile.classList.remove("show-nav-ul");
}

const observe = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    } else {
      entry.target.classList.remove('show');
    }
  })
})

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observe.observe(el));