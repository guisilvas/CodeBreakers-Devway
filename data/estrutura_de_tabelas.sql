CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `trilhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `usuarioTrilha` (
  `user_id` INT,
  `trilha_id` INT,
  `dayStart` INT,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`trilha_id`) REFERENCES `trilhas`(`id`),
  PRIMARY KEY (`user_id`, `trilha_id`)
);

CREATE TABLE `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `trilha_id` int DEFAULT NULL,
  FOREIGN KEY (`trilha_id`) REFERENCES `trilhas`(`id`),
  PRIMARY KEY (`id`)
);
CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(250) DEFAULT NULL,
  `tema_id` int DEFAULT NULL,
  `finish` int DEFAULT NULL,
  FOREIGN KEY (`tema_id`) REFERENCES `temas`(`id`),
  PRIMARY KEY (`id`)
);







