-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jan-2024 às 16:13
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `Nome` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Numero_Funcionario` int(11) NOT NULL,
  `Inicio_Contrato` date NOT NULL,
  `Final_Contrato` date NOT NULL,
  `Especialidade` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`Nome`, `Numero_Funcionario`, `Inicio_Contrato`, `Final_Contrato`, `Especialidade`) VALUES
('Rodrigo Ronaldo', 1, '2023-10-04', '2024-01-31', 'Ortodontista'),
('Sara Soares', 2, '2023-09-07', '2024-02-15', 'Clinica Geral'),
('Pedro Magalhaes', 3, '2024-01-01', '2025-03-05', 'Periodontista'),
('Maria Eduarda', 4, '2024-01-02', '2026-01-15', 'Clinica Geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes`
--

CREATE TABLE `marcacoes` (
  `Id_Marcacao` int(11) NOT NULL,
  `Nome` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Numero_Funcionario` int(11) NOT NULL,
  `Numero_Servico` int(11) NOT NULL,
  `Horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `Numero_Serviço` int(11) NOT NULL,
  `Tipo` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Custo` decimal(10,0) NOT NULL,
  `Duracao` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`Numero_Serviço`, `Tipo`, `Custo`, `Duracao`) VALUES
(1, 'Limpeza', '15', '01:00:00'),
(2, 'Raspagem', '20', '02:30:00'),
(3, 'Aparelhos', '5000', '17:00:00'),
(4, 'Branquamento', '1200', '00:15:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`Numero_Funcionario`);

--
-- Índices para tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD PRIMARY KEY (`Id_Marcacao`),
  ADD KEY `Numero_Funcionario` (`Numero_Funcionario`,`Numero_Servico`),
  ADD KEY `Numero_Servico` (`Numero_Servico`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`Numero_Serviço`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  MODIFY `Id_Marcacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `marcacoes`
--
ALTER TABLE `marcacoes`
  ADD CONSTRAINT `marcacoes_ibfk_1` FOREIGN KEY (`Numero_Funcionario`) REFERENCES `funcionarios` (`Numero_Funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marcacoes_ibfk_2` FOREIGN KEY (`Numero_Servico`) REFERENCES `servicos` (`Numero_Serviço`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
