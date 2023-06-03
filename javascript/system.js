
// pega a classe de lista dos cursos
const cursos = document.querySelector('.cursos_conteiner');

function comecar_tema(){
    cursos.classList.add('open');
    if(cursos.classList.contains('open')){
        cursos.classList.remove('open');
    }
}