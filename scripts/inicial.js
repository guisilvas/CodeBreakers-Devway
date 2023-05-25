function clicarb(){
    var imagemElemento = document.getElementById("avatar1");
    if (imagemElemento.classList.contains("avatar")) {
        imagemElemento.classList.remove("avatar");
        imagemElemento.classList.add("run");
      } else {
        imagemElemento.classList.remove("run");
        imagemElemento.classList.add("avatar");
      }
     
}
    var botao = document.getElementById("biniciar");
        botao.addEventListener("click", clicarb);


