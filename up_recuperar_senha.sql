-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Ago-2024 às 18:34
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `up_recuperar_senha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

DROP TABLE IF EXISTS `recuperar_senha`;
CREATE TABLE IF NOT EXISTS `recuperar_senha` (
  `email` varchar(255) NOT NULL,
  `token` char(100) NOT NULL,
  `usado` tinyint(1) NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`email`, `token`, `usado`, `data_criacao`) VALUES
('arthur.2022311833@aluno.iffar.edu.br', 'e16f7591a410e7e84e8bb2daeb64bc1aac8ecb80bd66051a9fb4623c43d796d4dd8a57ace1ab91a0fe30398f3428b65fe72f', 0, '2024-08-01 15:18:04'),
('arthur.2022311833@aluno.iffar.edu.br', '9b674d71bef932180a10a1ec425e49b824b8c0088bec9da5aae154c91807e142fb7cd371e31eaaf53d7e378c9817a24a2240', 0, '2024-08-01 15:20:10'),
('arthur.2022311833@aluno.iffar.edu.br', 'e7cf54f2b4e1a79d262a1784e55c2825c10a748e736e994daad7312eab852786a3701eccb2468110c07574edf886950b56d4', 0, '2024-08-01 15:24:57'),
('arthur.2022311833@aluno.iffar.edu.br', '12d188c7e0b4001db04c2903723fae76c8bbbd938f42e5708cbfb559fbb28073b258b7ac98cb16044f39ed5980776075b534', 0, '2024-08-01 15:30:05'),
('arthur.2022311833@aluno.iffar.edu.br', 'c5b32e80e0ba1655fadb744614c46becb8d7df29ae3458858ce219f28843bbea35b71d9a0c5996428dce51340a29d097f102', 0, '2024-08-01 15:36:47'),
('arthur.2022311833@aluno.iffar.edu.br', '7b49a0417c3348f3be17283059e36054768835c1a002c43c6888ba20efb9b557c6c3f465c35a7440ed9fa3b1977b1153d830', 0, '2024-08-01 15:38:00'),
('arthur.2022311833@aluno.iffar.edu.br', '6c2f931f8c729715fd329468eabedff24aad513aa7c5e5857ff5b7c667285598efd6e1488dd593bb7cea38f59934a3aefe11', 1, '2024-08-01 15:41:54'),
('arthur.2022311833@aluno.iffar.edu.br', 'f1654488738155dc8bec5b7fe63446b81aa2d9a389a580a2d89dae064cbed406a7300edb26837b9cfff3059774d413c944d5', 1, '2024-08-01 15:55:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `arquivo`) VALUES
(24, 'arthur santos', 'arthur.2022311833@aluno.iffar.edu.br', '12', '66abd9facbeb3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
