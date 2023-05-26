let title = document.getElementById('titulo_e_comecar');
let contentLogin = document.querySelector('.content-login');

function login(){
  contentLogin.classList.add('open');
  title.style.display = 'none';
  return contentLogin.style.display = 'block';
}



