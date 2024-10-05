-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/09/2024 às 13:12
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sigetutoria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `teste_numero` int(11) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `data_realizacao` date NOT NULL,
  `data_registo` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `local` varchar(100) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `tipo_avaliacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `id_faculdade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `id_faculdade`) VALUES
(1, 'Informatica', 1),
(2, 'ED.Visual', 1),
(3, 'Psicologia', 2),
(5, 'Agropecuaria', 1),
(6, 'Electronica', 1),
(7, 'Design', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome_disiplina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `id_curso`, `nome_disiplina`) VALUES
(1, 1, 'PTPIII'),
(2, 1, 'Matematica Discreta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `id_faculdade` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `nome_docente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `docente`
--

INSERT INTO `docente` (`id_docente`, `id_faculdade`, `id_curso`, `id_disciplina`, `nome_docente`) VALUES
(3, 1, 1, 1, 'Armando Maxa'),
(4, 1, 1, 1, 'lirio'),
(7, 1, 1, 1, 'Antonio Marcos'),
(10, 1, 1, 1, 'Gojo'),
(11, 1, 1, 1, 'Itachi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faculdade`
--

CREATE TABLE `faculdade` (
  `id_faculdade` int(11) NOT NULL,
  `nome_facul` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `faculdade`
--

INSERT INTO `faculdade` (`id_faculdade`, `nome_facul`, `endereco`) VALUES
(1, 'fet', 'Up-MAPUTO'),
(2, 'fep', 'av industria'),
(4, 'FEG', 'Pousada'),
(5, 'Ciências da Terra e Ambiente', 'UP-campus');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id_relatorio` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `criado_em:` date NOT NULL,
  `tipo_relatorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tutoria`
--

CREATE TABLE `tutoria` (
  `id_tutoria` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` datetime NOT NULL,
  `data_registo` date NOT NULL,
  `data_realizacao` date NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tutoria`
--

INSERT INTO `tutoria` (`id_tutoria`, `id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`) VALUES
(11, 1, 3, '25:00:44', '2024-09-11 14:00:43', '2024-09-18', '2024-09-03', 'Essa tutoria designa-se a dispensar'),
(0, 1, 1, '13:09:00', '0000-00-00 00:00:00', '2024-09-08', '2024-09-08', 'tutoria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tutoria1`
--

CREATE TABLE `tutoria1` (
  `id_tutoria` int(10) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `hora_inicio` varchar(100) NOT NULL,
  `hora_termino` varchar(100) NOT NULL,
  `data_registo` varchar(100) NOT NULL,
  `data_realizacao` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `id_disciplina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tutoria1`
--

INSERT INTO `tutoria1` (`id_tutoria`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `data_realizacao`, `descricao`, `id_disciplina`) VALUES
(1, 1, '13:09', '15:09', '2024-09-08', '2024-09-08', 'tutoria', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_docente_avaliacao` (`id_docente`),
  ADD KEY `fk_disciplina_avaliacao` (`id_disciplina`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `FK_faculdade_curso` (`id_faculdade`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_curso_disciplina` (`id_curso`);

--
-- Índices de tabela `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `fk_docente_curso` (`id_curso`),
  ADD KEY `fk_faculdade_docente` (`id_faculdade`),
  ADD KEY `fk_disciplina_docente` (`id_disciplina`);

--
-- Índices de tabela `faculdade`
--
ALTER TABLE `faculdade`
  ADD PRIMARY KEY (`id_faculdade`);

--
-- Índices de tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id_relatorio`),
  ADD KEY `fk_relatorio_docente` (`id_docente`);

--
-- Índices de tabela `tutoria1`
--
ALTER TABLE `tutoria1`
  ADD PRIMARY KEY (`id_tutoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `faculdade`
--
ALTER TABLE `faculdade`
  MODIFY `id_faculdade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tutoria1`
--
ALTER TABLE `tutoria1`
  MODIFY `id_tutoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_disciplina_avaliacao` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_docente_avaliacao` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `FK_faculdade_curso` FOREIGN KEY (`id_faculdade`) REFERENCES `faculdade` (`id_faculdade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE;

--
-- Restrições para tabelas `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_disciplina_docente` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_docente_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_faculdade_docente` FOREIGN KEY (`id_faculdade`) REFERENCES `faculdade` (`id_faculdade`) ON DELETE CASCADE;

--
-- Restrições para tabelas `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `fk_relatorio_docente` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tutoria`
--
ALTER TABLE `tutoria`
  ADD CONSTRAINT `fk_disciplina_tutoria` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_docente_tutoria` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
