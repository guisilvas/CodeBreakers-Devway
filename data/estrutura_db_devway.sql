-- Iniciar o XAMPP e ativar o Apache e MySQL
-- Buscar por localhost no navegador e abrir o phpMyAdmin
-- Clicar em New no canto superior esquerdo
-- Selecionar SQL e colar o código abaixo

-- Selecione o código apenas até o tracejado, após criar insira registros à tabela usuariotrilha

DROP DATABASE IF EXISTS `devway`;

CREATE DATABASE `devway`;
USE `devway`;

CREATE TABLE `users`(
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `trilhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `trilhas` (`nome`) VALUES
('Front-End'),
('Back-End'),
('Git e GitHub'),
('Bancos de Dados');

CREATE TABLE `usuarioTrilha` (
  `user_id` INT NOT NULL,
  `trilha_id` INT NOT NULL,
  `dayStart` INT DEFAULT NULL,
  `progress` varchar(20) DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`trilha_id`) REFERENCES `trilhas`(`id`),
  PRIMARY KEY (`user_id`, `trilha_id`)
);

CREATE TABLE `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `trilha_id` int NOT NULL,
  FOREIGN KEY (`trilha_id`) REFERENCES `trilhas`(`id`),
  PRIMARY KEY (`id`)
);

INSERT INTO `temas` ( `nome`, `trilha_id`) VALUES
('HTML - Fundamentos', 1),
('CSS - Fundamentos', 1),
('JAVASCRIPT - Fundamentos', 1),
('PHP - Fundamentos', 2),
('Python - Fundamentos', 2),
('Git e GitHub - Fundamentos', 3),
('Banco de dados - Fundamentos', 4);

CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `link` varchar(250) NOT NULL ,
  `tema_id` int NOT NULL,
  FOREIGN KEY (`tema_id`) REFERENCES `temas`(`id`),
  PRIMARY KEY (`id`)
);

INSERT INTO `cursos` (`nome`, `link`, `tema_id`) VALUES
('Site: MDN Web Docs: HTML Básico', 'https://developer.mozilla.org/pt-BR/docs/Learn/Getting_started_with_the_web/HTML_basics', 1),
('Youtube: Rafaella Ballerini: 5 MINUTOS DE HTML PARA INICIAR EM PROGRAMAÇÃO!', 'https://www.youtube.com/watch?v=3oSIqIqzN3M', 1),
('Youtube: Rafaella Ballerini: LANDING PAGE COM HTML e CSS!', 'https://www.youtube.com/watch?v=llF6vD-RljE', 1),
('Youtube: Rafaella Ballerini: FORMULÁRIOS COM HTML e CSS!', 'https://www.youtube.com/watch?v=wwqOJ2o84S4', 1),
('Youtube: HTML, CSS e Javascript, quais as diferenças?', 'https://www.youtube.com/watch?v=wwqOJ2o84S4', 1),
('Artigo: O que é o HTML e suas tags? Parte 1: estrutura básica', 'https://www.alura.com.br/artigos/html-css-e-js-definicoes', 1),
('Artigo: O que é o HTML e suas tags? Parte 2: elementos inline', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-1-estrutura-basica', 1),
('Artigo: O que é o HTML e suas tags? Parte 3: elementos block-level', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-2-elementos-inline', 1),
('Artigo: O que é o HTML e suas tags? Parte 4: elementos de um formulário', 'https://www.alura.com.br/artigos/html-tags-elementos-block-level', 1),
('Artigo: O que é o HTML e suas tags? Parte 5: atributos dos elementos', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-5-atributos-elementos', 1),
('Youtube: Alura: Curso de HTML5 e CSS3', 'https://www.youtube.com/watch?v=78AyiuxYceg', 1),
('MDN Web Docs: Iniciando com CSS', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/First_steps/Getting_started', 2),
('MDN Web Docs: Seletores', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Selectors', 2),
('MDN Web Docs: Cascata e herança', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Cascade_and_inheritance', 2),
('MDN Web Docs: Propriedade \'display\'', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/display', 2),
('MDN Web Docs: Conceitos básicos de Flexbox', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox', 2),
('MDN Web Docs: Grid Layout', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Grid_Layout/Basic_Concepts_of_Grid_Layout', 2),
('Entendendo CSS: Display Inline, Block e Inline-Block', 'https://dev.to/sucodelarangela/entendendo-css-display-inline-block-e-inline-block-lic', 2),
('Entendendo CSS: Pseudo-Classes e Pseudo-Elementos', 'https://dev.to/sucodelarangela/entendendo-css-pseudo-classes-e-pseudo-elementos-b83', 2),
('Como aplicar opacidade em background-image sem afetar textos', 'https://dev.to/sucodelarangela/como-aplicar-opacidade-em-background-image-sem-afetar-textos-31fj', 2),
('Rafaella Ballerini: O QUE É CSS?', 'https://www.youtube.com/watch?v=LWU2OR19ZG4', 2),
('Rafaella Ballerini: FLEXBOX CSS! Como posicionar elementos na página web - parte 1', 'https://www.youtube.com/watch?v=KbjLtEgmZ_E', 2),
('Rafaella Ballerini: FLEXBOX CSS! Como posicionar elementos na página web - parte 2', 'https://www.youtube.com/watch?v=hjz6ezV9_uc', 2),
('Matheus Castiglioni: Arquitetura CSS - BEM', 'https://www.youtube.com/watch?v=yKPXW9aSxQI', 2),
('Matheus Castiglioni: CSS Grid Layout', 'https://www.youtube.com/watch?v=HBlBNAtFcdw', 2),
('Mario Souto - Dev Soutinho: Como centralizar no CSS', 'https://www.youtube.com/watch?v=Cu-HP-gvggg', 2),
('Hipster 09 - CSS: Cansei de Ser Simples', 'https://www.hipsters.tech/css-cansei-de-ser-simples-hipsters-09/', 2),
('HTML, CSS e Javascript, quais as diferenças?', 'https://www.alura.com.br/artigos/html-css-e-js-definicoes', 2),
('Guia de unidades no CSS', 'https://www.alura.com.br/artigos/guia-de-unidades-no-css', 2),
('CSS: Guia do Flexbox', 'https://www.alura.com.br/artigos/css-guia-do-flexbox', 2),
('Como fazer Grids e a Responsividade na Web', 'https://www.alura.com.br/artigos/como-fazer-grids-e-a-responsividade-na-web', 2),
('Alura: CSS FlexBox: Dicas para começar', 'https://www.youtube.com/watch?v=326-B1avuYo', 2),
('Alura: Box Model e Sizing no CSS', 'https://www.youtube.com/watch?v=qcNUxyOWXIw', 2),
('MDN Web Docs: Um primeiro mergulho no JavaScript.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/A_first_splash', 3),
('MDN Web Docs: Trabalhando com texto — strings em JavaScript.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/Strings', 3),
('MDN Web Docs: if...else.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/if...else', 3),
('MDN Web Docs: while.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/while', 3),
('MDN Web Docs: for.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/for', 3),
('MDN Web Docs: Arrays.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/Arrays', 3),
('MDN Web Docs: Template strings.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Template_literals', 3),
('Definindo Funções em Javascript.', 'https://blog.matheuscastiglioni.com.br/definindo-funcoes-em-javascript/', 3),
('Mario Souto - Dev Soutinho: Como manipular arrays e objetos em JavaScript.', 'https://www.youtube.com/watch?v=yS7AcF-xRUg', 3),
('Marco Bruno: O que é Json e como criar um objeto.', 'https://www.youtube.com/watch?v=oCY5YEEjlwE', 3),
('Mario Souto - Dev Soutinho: Como usar Async/Await? Promises no JavaScript?', 'https://www.youtube.com/watch?v=q28lfkBd9F4', 3),
('Mario Souto - Dev Soutinho: Como pegar dados de uma API? Como fazer AJAX? | Pegando dados de serviços via JavaScript.', 'https://www.youtube.com/watch?v=85vJXFpXLQw', 3),
('JavaScript: o que é, como aprender e um Guia da linguagem mais popular do mundo.', 'https://www.alura.com.br/artigos/javascript', 3),
('Hipster 38 - O Reino encantado do JavaScript.', 'https://www.hipsters.tech/o-reino-encantado-do-javascript-hipsters-38/', 3),
('Hipster 169 - JavaScript: manual de sobrevivência 2020.', 'https://www.hipsters.tech/javascript-manual-de-sobrevivencia-2020-hipsters-169/', 3),
('Hipster 236 - Evolução do JavaScript.', 'https://www.hipsters.tech/evolucao-do-javascript-hipsters-ponto-tech-236/', 3),
('Strings com JavaScript: o que são e como manipulá-las.', 'https://www.alura.com.br/artigos/strings-com-javascript-o-que-sao-e-como-manipular', 3),
('Como utilizar operadores de comparação em Javascript.', 'https://www.alura.com.br/artigos/operadores-matematicos-em-javascript', 3),
('Para que serve um Array?', 'https://www.alura.com.br/artigos/javascript-para-que-serve-array', 3),
('Quando usar forEach e map?', 'https://www.alura.com.br/artigos/javascript-quando-devo-usar-foreach-e-map', 3),
('Manipulação de array com map, filter e reduce.', 'https://www.alura.com.br/artigos/manipulacao-de-array-com-map-filter-e-reduce', 3),
('O que é JavaScript?', 'https://www.youtube.com/watch?v=NaVSbnnV75Q', 3),
('Destructuring em JavaScript.', 'https://www.youtube.com/watch?v=f8a-qwKC5yk', 3),
('Classes x funções no Javascript.', 'https://www.youtube.com/watch?v=iohhj-k9L6s', 3),
('Documentação PHP', 'https://www.php.net/manual/pt_BR/index.php', 4),
('Introdução ao PHP', 'https://medium.com/café-com-java/introdução-ao-php-91472783da7c', 4),
('Guia prático do Modern PHP: desenvolvimento e ecossistema', 'https://medium.com/walternascimentobarroso-pt/curso-de-php-básico-fa984be7c9b9', 4),
('Curso de PHP Básico', 'https://medium.com/walternascimentobarroso-pt/curso-de-php-básico-fa984be7c9b9', 4),
('O que é PHP ? Saiba tudo sobre esta Linguagem', 'https://www.youtube.com/watch?v=va4WIzo211Y', 4),
('Aprenda Como Rodar o PHP', 'https://www.youtube.com/watch?v=xKkipZ133_s', 4),
('Ecossistema PHP | HipstersPontoTube', 'https://www.youtube.com/watch?v=yD3BqXWHua4', 4),
('PHP - Uma Introdução à Linguagem', 'https://www.alura.com.br/artigos/php-uma-introducao-linguagem', 4),
('Quando usar == ou === em php?', 'https://www.alura.com.br/artigos/quando-usar-ou-em-php', 4),
('PHP: operação com números decimais', 'https://www.alura.com.br/artigos/php-operacoes-com-numeros-decimais', 4),
('Trabalhando com arrays em PHP', 'https://www.alura.com.br/artigos/trabalhando-com-arrays-em-php', 4),
('Documentação Python', 'https://docs.python.org/pt-br/3/tutorial/', 5),
('Programação | Python — Parte 1', 'https://medium.com/turing-talks/turing-talks-4-python-parte-1-29b8d9efd0a5', 5),
('Introdução ao Python', 'https://medium.com/@goularteduarda.a/introdução-ao-python-d30c29eba0d6', 5),
('Curso introdutório de Python', 'https://www.youtube.com/watch?v=yTQDbqmv8Ho', 5),
('O que é Python? História, Sintaxe e um Guia para iniciar na Linguagem', 'https://www.alura.com.br/artigos/python', 5),
('Python – Hipsters 122', 'https://www.hipsters.tech/python-hipsters-122/', 5),
('Python Fluente – Hipsters Ponto Tech 179', 'https://www.hipsters.tech/python-fluente-hipsters-ponto-tech-179/', 5),
('A linguagem Python - Alura Live 94', 'https://www.youtube.com/watch?v=Nbt0eQHChoI', 5),
('O que é Python?', 'https://www.youtube.com/watch?v=-LATVnPcvHI', 5),
('Python - Uma Introdução à Linguagem', 'https://www.alura.com.br/artigos/python-uma-introducao-a-linguagem', 5),
('Python: Trabalhando com precisão em números decimais', 'https://www.alura.com.br/artigos/precisao-numeros-decimais-python', 5),
('Listas em Python: operações básicas', 'https://www.alura.com.br/artigos/listas-no-python', 5),
('Como comparar objetos no Python?', 'https://www.alura.com.br/artigos/como-comparar-objetos-no-python', 5),
('Python datetime: Lidando com datas e horários', 'https://www.alura.com.br/artigos/lidando-com-datas-e-horarios-no-python', 5),
('GitHub Documentação', 'https://docs.github.com/pt', 6),
('GitHub Pages Documentação', 'https://docs.github.com/pt/pages/getting-started-with-github-pages/about-github-pages', 6),
('Git School - Visualizing Git', 'https://git-school.github.io/visualizing-git/', 6),
('Dangit, Git!?!', 'https://dangitgit.com/', 6),
('O que é Git e GitHub? - definição e conceitos importantes 1/2', 'https://www.youtube.com/watch?v=DqTITcMq68k', 6),
('Como usar Git e GitHub na prática! - desde o primeiro commit até o pull request! 2/2', 'https://www.youtube.com/watch?v=UBAX-13g8OM', 6),
('Git: Entendendo de vez como funciona do melhor e mais visual jeito possível', 'https://www.youtube.com/watch?v=4-tfJ-ZyA0Q', 6),
('Como colocar seu projeto no ar DE GRAÇA via GitHub! | Hospedagem com GitHub Pages', 'https://www.youtube.com/watch?v=BU-w2_Aae54', 6),
('Git e Github: O que são, Como Configurar e Primeiros Passos', 'https://www.alura.com.br/artigos/o-que-e-git-github', 6),
('Mais git com o hub: a linha de comando do Github', 'https://www.alura.com.br/artigos/github-na-linha-de-comando', 6),
('Websérie: Git e Github para Sobrevivência', 'https://www.alura.com.br/webseries/git-e-github-para-sobrevivencia', 6),
('Hipsters 109: Git e Github', 'https://www.alura.com.br/podcast/hipsterstech-git-e-github-hipsters-109-a474', 6),
('Git e Github para Sobrevivência 01: Como o Git funciona?', 'https://www.youtube.com/watch?v=BAmvmaKQklQ', 6),
('DB-Engines Ranking', 'https://db-engines.com/en/ranking', 7),
('SQL // Dicionário do Programador', 'https://www.youtube.com/watch?v=kMznyI7r2Tc', 7),
('NoSQL // Dicionário do Programador', 'https://www.youtube.com/watch?v=1B64oqE8PLs', 7),
('SQL — O que é e como funciona na prática? ARTIGOSQL: comandos básicos', 'https://medium.com/pravaler-digital-team/sql-o-que-%C3%A9-e-como-funciona-na-pr%C3%A1tica-6ae7a3225', 7),
('O que é SQL e NoSQL?', 'https://www.youtube.com/watch?v=aure5d3B88g', 7),
('SQL: Comandos básicos', 'https://www.alura.com.br/artigos/sql-comandos-basicos', 7),
('SQL: consultas com SELECT', 'https://www.alura.com.br/artigos/sql-consultas-com-select', 7),
('JOIN e seus tipos', 'https://www.alura.com.br/artigos/sql-comandos-basicos', 7);

CREATE TABLE `usuarioCurso` (
  `user_id` INT NOT NULL,
  `curso_id` INT NOT NULL,
  `finish` INT DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`curso_id`) REFERENCES `cursos`(`id`),
  PRIMARY KEY (`user_id`, `curso_id`)
);

-------------------------------------------------------------------------------

-- Depois de criar o banco de dados

INSERT INTO `usuariotrilha` (`user_id`, `trilha_id`,) VALUES 
(1, 1),
(1, 2),
(1, 3),
(1, 4);