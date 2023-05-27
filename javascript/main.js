let index_start = document.querySelector('.index-start');
let contentLogin = document.querySelector('.content-login');
let contentFormRegister = document.querySelector('.content-form-register');
let contentFormLogin = document.querySelector('.content-form-login');
let linkRegister = document.getElementById('register');

function login() {
  contentLogin.classList.add('open-login');
  index_start.style.display = 'none';
  contentLogin.style.display = 'block';
}

function register(event) {
  event.preventDefault();
  contentLogin.classList.remove('open-login');
  contentFormLogin.style.display = 'none';
  setTimeout(() => {
    contentFormRegister.style.display = 'flex';
    contentLogin.classList.add('open-login');

  },1000)
  console.log('Opa deu certo')
};

linkRegister.addEventListener('click', register) 





