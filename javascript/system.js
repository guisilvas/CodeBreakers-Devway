document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.getElementsByName('curso');
    
    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
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
