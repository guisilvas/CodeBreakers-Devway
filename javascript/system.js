// pega a classe do tema onde o menu suspenço vai abrir
const tema = document.querySelector('.tema_conteiner');
// pega a classe de lista dos cursos
const cursos = document.querySelector('.cursos_conteiner');

tema.addEventListener('Click', () => {
    cursos.classList.toggle('open');
})