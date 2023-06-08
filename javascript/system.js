function abrir_cursos(id,seta) {
  var div = document.getElementById(id);
  var seta_tema = document.getElementById(seta);
  if (div.style.display === "none") {
    div.style.display = "block";
    seta_tema.style.transform = "rotate(180deg)";
  } else {
    div.style.display = "none";
    seta_tema.style.transform = "none";
  }
}
document.addEventListener('DOMContentLoaded', function() {
  var checkboxes = document.getElementsByName('curso'); //lista de caixas de seleção com o nome "curso" e adiciona um ouvinte de evento para cada uma
  
  checkboxes.forEach(function(checkbox) {//usa o método forEach que percorre todos os elementos da variavel checkboxes e atribui a função checkbox a eles
    checkbox.addEventListener('change', function() {//ouvinte de eventos ao elemento HTML do tipo checkbox, Quando o estado do checkbox é alterado, a função anônima é executada
      var valor = this.checked ? 1 : 0; // Obtém o valor da caixa de seleção (1 se marcada, 0 se desmarcada)
      var cursoId = this.dataset.cursoId; // Obtém o ID do curso do atributo data-curso-id
      
      // Cria uma requisição AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'atualizar.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText); // Exibe a resposta do servidor no console
          } else {
            console.log('Erro na requisição AJAX:', xhr.statusText);
          }
        }
      };
      // Envia o valor e o ID do curso para o arquivo PHP
      xhr.send('campo=' + valor + '&id_curso=' + cursoId);
    });
  });
  
});

