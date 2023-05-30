let index_start = document.querySelector('.index-start');
let contentLogin = document.querySelector('.content-login');
let contentFormRegister = document.querySelector('.content-form-register');
let contentFormLogin = document.querySelector('.content-form-login');
let indexText = document.querySelector('.index-texts');
let linkRegister = document.getElementById('register');
let linkBack = document.getElementById('back');

function login() {
  indexText.classList.add('effect');
  setTimeout(()=> {
    contentLogin.classList.add('open-login');
    index_start.style.display = 'none';
    contentLogin.style.display = 'flex';
    contentFormLogin.style.display = 'flex';
  },2000)
};

function register(event) {
  event.preventDefault();
  contentLogin.classList.remove('open-login');
  contentFormLogin.style.display = 'none';
  setTimeout(() => {
    contentFormRegister.style.display = 'flex';
    contentLogin.classList.add('open-login');
  },1000)
};

function back(event) {
  event.preventDefault();
  contentLogin.classList.remove('open-login');
  contentFormRegister.style.display = 'none';
  indexText.classList.remove('effect');
  setTimeout(() => {
    index_start.style.display = 'flex';
  },1000)
};

linkBack.addEventListener('click', back)
linkRegister.addEventListener('click', register) 





