/* ============= Show Menu =============== */
const navMenu = document.getElementById('nav-menu'),
  navToggle = document.getElementById('nav-toggle'),
  navClose = document.getElementById('nav-close')

/* ===== Menu Show ===== */
/* Validate if constante exist */
if (navToggle) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.add('show-menu')
  })
}

/* ===== Menu Hidder ===== */
/* Validate if constant exist */
if (navClose) {
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show-menu')
  })
}
/* ============= Remove Menu Mobile =============== */
const navLink = document.querySelectorAll('.nav__link')

function linkAction() {
  const navMenu = document.getElementById('nav-menu')
  // When we click on each nav__link, we remove the show-menu click
  navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))
/* ============= Scroll Reveal Animation =============== */
const sr = ScrollReveal({
  distance: '90px',
  duration: 3000
})

sr.reveal(`.home__data`, { origin: 'top', delay: 400 })
sr.reveal(`.home__img`, { origin: 'bottom', delay: 600 })
sr.reveal(`.home__footer`, { origin: 'bottom', delay: 800 })
