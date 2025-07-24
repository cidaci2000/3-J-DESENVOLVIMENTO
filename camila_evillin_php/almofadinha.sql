-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/07/2025 às 13:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `almofadinha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` char(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` char(60) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `data_nascimento`, `cpf`, `telefone`, `senha`, `data_cadastro`) VALUES
(1, 'APARECIDA DA SILVA FERREIRA', 'aparecida.ferreira@gmail.com', '0000-00-00', '3333333333333', '222222222222222', '$2y$10$0FBekTBgd9gU70lcRvlc5Oah7/Tx.fTcGx4gA1RLH9YP/SUt7TRCq', '2025-07-08 20:49:25'),
(2, 'bruno alves', 'bruno@gmail.com', '1111-11-11', '1111111111111', '45555', '$2y$10$pzTCVP4sNkHPGZiMPSF7g.0Lvie7Er7TFn3EiaCiYY1XGz7eulaTy', '2025-07-08 20:49:59'),
(9, 'clara', 'clara@gmail.com', '1111-11-11', '5555555555', '45555', '$2y$10$xBJdc7wZZm09BPkXil0vG.4T0oPCJoCNKKQr6IiiWRk34wubkIJvW', '2025-07-08 21:05:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
