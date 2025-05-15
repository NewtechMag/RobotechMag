// inject-layout.js
function injectLayout() {
  // Injecter le header
  fetch('header.html')
    .then(response => response.text())
    .then(data => {
      document.getElementById('header-placeholder').innerHTML = data;
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.4/lottie.min.js"></script>
  <script>
  fetch('header.html')
    .then(response => response.text())
    .then(data => {
      document.getElementById('header-placeholder').innerHTML = data;

      // Charger l'animation Lottie
      requestAnimationFrame(() => {
        const container = document.getElementById('lottie-animation');
        if (container) {
          lottie.loadAnimation({
            container: container,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://dl.dropboxusercontent.com/scl/fi/7h7n7ve3xjlchks0lm375/Animation-1746211827088.json?rlkey=ysvzenol7e3vhqnyj1vtthm9x&raw=1'
          });
        } else {
          console.warn('❌ Élément #lottie-animation non trouvé dans le header.html');
        }
      });

      // ✅ Menu burger : le code est exécuté une fois que le DOM du header est injecté
      const burgerButton = document.querySelector('.burger-circle button');
      const mobileMenu = document.querySelector('.mobile-menu');
      const closeButton = document.querySelector('.mobile-menu .close-btn');

      if (burgerButton && mobileMenu && closeButton) {
        burgerButton.addEventListener('click', () => {
          mobileMenu.classList.add('show');
        });

        closeButton.addEventListener('click', () => {
          mobileMenu.classList.remove('show');
        });

        window.addEventListener('click', (e) => {
          if (!mobileMenu.contains(e.target) && !burgerButton.contains(e.target)) {
            mobileMenu.classList.remove('show');
          }
        });

        window.addEventListener('resize', function () {
          if (window.innerWidth > 1024) {
            mobileMenu.classList.remove('show');
          }
        });
      } else {
        console.warn('❌ Élément du menu burger introuvable.');
      }
    });


  // Injecter le footer
  fetch('footer.html')
    .then(response => response.text())
    .then(data => {
      document.getElementById('footer-placeholder').innerHTML = data;
    })
    .catch(() => console.warn('❌ Erreur lors du chargement du footer.'));
}

document.addEventListener('DOMContentLoaded', injectLayout);
