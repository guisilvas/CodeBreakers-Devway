-- Iniciar o XAMPP e ativar o Apache e MySQL
-- Buscar por localhost no navegador e abrir o phpMyAdmin
-- Clicar em New no canto superior esquerdo
-- Selecionar SQL e colar o código abaixo

CREATE DATABASE `devway`;

USE `devway`;

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
