// https://www.npmjs.com/package/is-mobile?activeTab=code
const mobileRE = /(android|bb\d+|meego).+mobile|armv7l|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series[46]0|samsungbrowser.*mobile|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i
const notMobileRE = /CrOS/

const tabletRE = /android|ipad|playbook|silk/i

function isMobile (opts) {
  if (!opts) opts = {}
  let ua = opts.ua
  if (!ua && typeof navigator !== 'undefined') ua = navigator.userAgent
  if (ua && ua.headers && typeof ua.headers['user-agent'] === 'string') {
    ua = ua.headers['user-agent']
  }
  if (typeof ua !== 'string') return false

  let result =
    (mobileRE.test(ua) && !notMobileRE.test(ua)) ||
    (!!opts.tablet && tabletRE.test(ua))

  if (
    !result &&
    opts.tablet &&
    opts.featureDetect &&
    navigator &&
    navigator.maxTouchPoints > 1 &&
    ua.indexOf('Macintosh') !== -1 &&
    ua.indexOf('Safari') !== -1
  ) {
    result = true
  }

  return result
}

if (isMobile()) {
    document.body.classList.add('_mobile');
    const link = document.getElementById('link');
    link.addEventListener('click', (e) => {
        link.parentElement.classList.toggle('_active');
    });
} else {
    document.body.classList.add('_pc')
}



const menuBody = document.querySelector('.menu__body');
const iconMenu = document.querySelector('.menu__icon');
if (iconMenu) {
    menuBody.addEventListener('click', (e) => {
        document.body.classList.toggle('_locked');
        menuBody.classList.toggle('_active');
        iconMenu.classList.toggle('_active');
    });
}

let menuLinks = document.querySelectorAll('.menu__link[data-goto]')
if (menuLinks.length > 0) {
    menuLinks.forEach(menuLink => {
        menuLink.addEventListener('click', (e) => {
            if (e.target.dataset.goto && document.querySelector(e.target.dataset.goto)) {
                const gotoBlock = document.querySelector(e.target.dataset.goto);
                const gotoBlockValue = gotoBlock.getBoundingClientRect().top + screenX - document.querySelector('header').offsetHeight;
                if (iconMenu.classList.contains('_active')) {
                    document.body.classList.remove('_locked');
                    menuBody.classList.toggle('_active');
                    iconMenu.classList.toggle('_active');
                }
                window.scrollTo({
                    top: gotoBlockValue,
                    behavior: 'smooth'
                });
                e.preventDefault();
            }
        });
    });
}