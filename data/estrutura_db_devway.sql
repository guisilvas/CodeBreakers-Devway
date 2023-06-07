-- Iniciar o XAMPP e ativar o Apache e MySQL
-- Buscar por localhost no navegador e abrir o phpMyAdmin
-- Clicar em New no canto superior esquerdo
-- Selecionar SQL e colar o código abaixo

DROP DATABASE IF EXISTS `devway`;
CREATE DATABASE `devway`;

USE `devway`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `trilhas`;
CREATE TABLE IF NOT EXISTS `trilhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `trilhas` (`id`, `nome`) VALUES
(1, 'Front-End'),
(2, 'Back-End'),
(3, 'Git e GitHub'),
(4, 'Bancos de Dados');

DROP TABLE IF EXISTS `temas`;
CREATE TABLE IF NOT EXISTS `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `trilha_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trilha_id` (`trilha_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `temas` (`id`, `nome`, `trilha_id`) VALUES
(1, 'HTML - Fundamentos', 1),
(2, 'CSS - Fundamentos', 1),
(3, 'JAVASCRIPT - Fundamentos', 1);

DROP TABLE IF EXISTS `usuariotrilha`;
CREATE TABLE IF NOT EXISTS `usuariotrilha` (
  `user_id` int NOT NULL,
  `trilha_id` int NOT NULL,
  `dayStart` int DEFAULT NULL,
  PRIMARY KEY (`user_id`,`trilha_id`),
  KEY `trilha_id` (`trilha_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `tema_id` int DEFAULT NULL,
  `finish` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tema_id` (`tema_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cursos` (`nome`, `link`, `tema_id`, `finish`) VALUES
('HTML Básico', 'https://developer.mozilla.org/pt-BR/docs/Learn/Getting_started_with_the_web/HTML_basics', 1, 0),
('HTML Básico', 'https://developer.mozilla.org/pt-BR/docs/Learn/Getting_started_with_the_web/HTML_basics', 1, 0),
('Youtube:Rafaella Ballerini: 5 MINUTOS DE HTML PARA INICIAR EM PROGRAMAÇÃO', 'https://www.youtube.com/watch?v=3oSIqIqzN3M', 1, 0),
('Youtube: Rafaella Ballerini: LANDING PAGE COM HTML e CSS!', 'https://www.youtube.com/watch?v=llF6vD-RljE', 1, 0),
('Youtube: Rafaella Ballerini: FORMULÁRIOS COM HTML e CSS!', 'https://www.youtube.com/watch?v=wwqOJ2o84S4', 1, 0),
('Youtube: HTML, CSS e Javascript, quais as diferenças?', 'https://www.youtube.com/watch?v=wwqOJ2o84S4', 1, 0),
('Artigo: O que é o HTML e suas tags? Parte 1: estrutura básica', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-1-estrutura-basica', 1, 0),
('Artigo: O que é o HTML e suas tags? Parte 2: elementos inlin', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-1-estrutura-basica', 1, 0),
('Artigo: O que é o HTML e suas tags? Parte 3: elementos block-leve', 'hhttps://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-2-elementos-inline', 1, 0),
('Artigo: O que é o HTML e suas tags? Parte 4: elementos de um formulário', 'https://www.alura.com.br/artigos/html-tags-elementos-block-level', 1, 0),
('Artigo: O que é o HTML e suas tags? Parte 5: atributos dos elementos', 'https://www.alura.com.br/artigos/o-que-e-html-suas-tags-parte-5-atributos-elementos', 1, 0),
('Youtube: Alura: Curso de HTML5 e CSS3', 'https://www.youtube.com/watch?v=78AyiuxYceg', 1, 0),
('Site:MDN Web Docs: Iniciando com CSS\r\n', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/First_steps/Getting_started', 2, 0),
('Site: MDN Web Docs: Seletores', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Selectors', 2, 0),
('Site: MDN Web Docs: Cascata e herança', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Cascade_and_inheritance', 2, 0),
('Site: MDN Web Docs: Propriedade \'display\'', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/display', 2, 0),
('Site: MDN Web Docs: Conceitos básicos de Flexbox', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox', 2, 0),
('Site: MDN Web Docs: Grid Layout', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Grid_Layout/Basic_Concepts_of_Grid_Layout', 2, 0),
('Artigo: Entendendo CSS: Display Inline, Block e Inline-Block', 'https://dev.to/sucodelarangela/entendendo-css-display-inline-block-e-inline-block-lic', 2, 0),
('Artigo: Entendendo CSS: Pseudo-Classes e Pseudo-Elementos\r\n', 'https://dev.to/sucodelarangela/entendendo-css-pseudo-classes-e-pseudo-elementos-b83', 2, 0),
('Artigo: Como aplicar opacidade em background-image sem afetar textos', 'https://dev.to/sucodelarangela/como-aplicar-opacidade-em-background-image-sem-afetar-textos-31fj', 2, 0),
('Artigo: Como fazer Grids e a Responsividade na Web\r\n', 'https://www.alura.com.br/artigos/como-fazer-grids-e-a-responsividade-na-web', 2, 0),
('Site:MDN Web Docs: Iniciando com CSS\r\n', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/First_steps/Getting_started', 2, 0),
('Site: MDN Web Docs: Seletores', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Selectors', 2, 0),
('Site: MDN Web Docs: Cascata e herança', 'https://developer.mozilla.org/pt-BR/docs/Learn/CSS/Building_blocks/Cascade_and_inheritance', 2, 0),
('Site: MDN Web Docs: Propriedade \'display\'', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/display', 2, 0),
('Site: MDN Web Docs: Conceitos básicos de Flexbox', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox', 2, 0),
('Site: MDN Web Docs: Grid Layout', 'https://developer.mozilla.org/pt-BR/docs/Web/CSS/CSS_Grid_Layout/Basic_Concepts_of_Grid_Layout', 2, 0),
('Artigo: Entendendo CSS: Display Inline, Block e Inline-Block', 'https://dev.to/sucodelarangela/entendendo-css-display-inline-block-e-inline-block-lic', 2, 0),
('Artigo: Entendendo CSS: Pseudo-Classes e Pseudo-Elementos\r\n', 'https://dev.to/sucodelarangela/entendendo-css-pseudo-classes-e-pseudo-elementos-b83', 2, 0),
('Artigo: Como aplicar opacidade em background-image sem afetar textos', 'https://dev.to/sucodelarangela/como-aplicar-opacidade-em-background-image-sem-afetar-textos-31fj', 2, 0),
('Artigo: Como fazer Grids e a Responsividade na Web\r\n', 'https://www.alura.com.br/artigos/como-fazer-grids-e-a-responsividade-na-web', 2, 0),
('Classes x funções no Javascript.', 'https://www.youtube.com/watch?v=iohhj-k9L6s', 3, 0),
('Destructuring em JavaScript.', 'https://www.youtube.com/watch?v=f8a-qwKC5yk', 3, 0),
('O que é JavaScript?', 'https://www.youtube.com/watch?v=NaVSbnnV75Q', 3, 0),
('Manipulação de array com map, filter e reduce.', 'https://www.alura.com.br/artigos/manipulacao-de-array-com-map-filter-e-reduce', 3, 0),
('Quando usar forEach e map?', 'https://www.alura.com.br/artigos/javascript-quando-devo-usar-foreach-e-map', 3, 0),
('Para que serve um Array?', 'https://www.alura.com.br/artigos/javascript-para-que-serve-array', 3, 0),
('Como utilizar operadores de comparação em Javascript.', 'https://www.alura.com.br/artigos/operadores-matematicos-em-javascript', 3, 0),
('Strings com JavaScript: o que são e como manipulá-las.', 'https://www.alura.com.br/artigos/strings-com-javascript-o-que-sao-e-como-manipular', 3, 0),
('Hipster 236 - Evolução do JavaScript.', 'https://www.hipsters.tech/evolucao-do-javascript-hipsters-ponto-tech-236/', 3, 0),
('Hipster 169 - JavaScript: manual de sobrevivência 2020.', 'https://www.hipsters.tech/javascript-manual-de-sobrevivencia-2020-hipsters-169/', 3, 0),
('Hipster 38 - O Reino encantado do JavaScript.', 'https://www.hipsters.tech/o-reino-encantado-do-javascript-hipsters-38/', 3, 0),
('JavaScript: o que é, como aprender e um Guia da linguagem mais popular do mundo.', 'https://www.alura.com.br/artigos/javascript', 3, 0),
('Como pegar dados de uma API? Como fazer AJAX? | Pegando dados de serviços via JavaScript.', 'https://www.youtube.com/watch?v=85vJXFpXLQw', 3, 0),
('Como usar Async/Await? Promises no JavaScript?', 'https://www.youtube.com/watch?v=q28lfkBd9F4', 3, 0),
('O que é Json e como criar um objeto.', 'https://www.youtube.com/watch?v=oCY5YEEjlwE', 3, 0),
('Como manipular arrays e objetos em JavaScript.', 'https://www.youtube.com/watch?v=yS7AcF-xRUg', 3, 0),
('Definindo Funções em Javascript.', 'https://blog.matheuscastiglioni.com.br/definindo-funcoes-em-javascript/', 3, 0),
('MDN Web Docs: Template strings.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Template_literals', 3, 0),
('MDN Web Docs: Arrays.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/Arrays', 3, 0),
('MDN Web Docs: for.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/for', 3, 0),
('MDN Web Docs: while.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/while', 3, 0),
('MDN Web Docs: if...else.', 'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Statements/if...else', 3, 0),
('MDN Web Docs: Trabalhando com texto — strings em JavaScript.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/Strings', 3, 0),
('MDN Web Docs: Um primeiro mergulho no JavaScript.', 'https://developer.mozilla.org/pt-BR/docs/Learn/JavaScript/First_steps/A_first_splash', 3, 0);
