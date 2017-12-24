-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Mar-2017 às 19:28
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullhqs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`, `descricao`, `foto`) VALUES
(1, 'John Ridgway', 'Autor que Faz HQ da DC', 'johnridgway'),
(2, 'Roy Thomas', 'Autor que Faz HQ da Marvel', 'roythomas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `titulo`, `texto`, `foto`) VALUES
(1, 'Batman', 'Batman', 'batman'),
(2, 'Coringa', 'Coringa', 'coringa'),
(3, 'Doutor Estranho', 'Doutor Estranho', 'doutor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Marvel'),
(2, 'DC Comics');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`) VALUES
(1, 'Dark Horse Comics');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hqs`
--

CREATE TABLE `hqs` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `edicao` varchar(45) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_personagens` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hqs`
--

INSERT INTO `hqs` (`id`, `titulo`, `edicao`, `id_editora`, `id_autor`, `id_categoria`, `id_usuario`, `id_personagens`, `foto`) VALUES
(1, 'Coringa Luta Contra Batman', 'Coringa Luta Contra Batman', 1, 1, 2, 20, 1, 'coringa'),
(2, 'Novo Poder de Lanterna Verde', 'Novo Poder de Lanterna Verde', 1, 1, 2, 20, 2, 'lanternaverde'),
(3, 'Mulher Gato Reencontra seu Inimigo', 'Mulher Gato Reencontra seu Inimigo', 1, 1, 2, 20, 3, 'mulhergato'),
(4, 'Nova Luta Da Mulher Maravilha', 'Nova Luta Da Mulher Maravilha', 1, 1, 2, 20, 4, 'mulhermaravilha'),
(5, 'Super Man X Batman', 'Super Man X Batman', 1, 1, 2, 20, 5, 'superman'),
(6, 'Homem Aranha Junta-se aos Vingadores', 'Homem Aranha Junta-se aos Vingadores', 1, 2, 1, 20, 6, 'homemaranha'),
(7, 'Hulk Destroi a Cidade de Nova York', 'Hulk Destroi a Cidade de Nova York', 1, 2, 1, 20, 7, 'hulk'),
(8, 'O final Emocionante de Logan', 'O final Emocionante de Logan', 1, 2, 1, 20, 8, 'logan'),
(9, 'A Luta de Thor Com seu Irmão', 'A Luta de Thor Com seu Irmão', 1, 2, 1, 20, 9, 'thor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `id_hqs` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `resumo` varchar(500) NOT NULL,
  `noticia` varchar(300) NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `id_categoria`, `nome`, `descricao`, `foto`) VALUES
(1, 2, 'Coringa', 'Coringa', 'coringa'),
(2, 2, 'Lanterna Verde', 'Lanterna Verde', 'lanternaverde'),
(3, 2, 'Mulher Gato', 'Mulher Gato', 'mulhergato'),
(4, 2, 'Mulher Maravilha', 'Mulher Maravilha', 'mulhermaravilha'),
(5, 2, 'Super Man', 'Super Man', 'superman'),
(6, 1, 'Homen Aranha', 'Homen Aranha', 'homemaranha'),
(7, 1, 'Hulk', 'Hulk', 'hulk'),
(8, 1, 'Logan ', 'Logan ', 'logan'),
(9, 1, 'Thor', 'Thor', 'thor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens_hqs`
--

CREATE TABLE `personagens_hqs` (
  `id` int(11) NOT NULL,
  `id_personagens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `qtd_ranking` varchar(45) NOT NULL,
  `id_hqs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(20, 'Raffael Henrique', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_sistema`
--

CREATE TABLE `usuario_sistema` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_sistema`
--

INSERT INTO `usuario_sistema` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'raffael', 'raffael', '3a0609c1cb397e8d210b61132adbb2df'),
(2, 'eduardo', 'eduardo', '6d6354ece40846bf7fca65dfabd5d9d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hqs`
--
ALTER TABLE `hqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hqs_editora1_idx` (`id_editora`),
  ADD KEY `fk_hqs_autor1_idx` (`id_autor`),
  ADD KEY `fk_hqs_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_hqs_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_hqs_personagens1_idx` (`id_personagens`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perfil_hqs1_idx` (`id_hqs`),
  ADD KEY `fk_descricao_usuario1_idx` (`id_usuario`);

--
-- Indexes for table `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personagens_categoria1_idx` (`id_categoria`);

--
-- Indexes for table `personagens_hqs`
--
ALTER TABLE `personagens_hqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personagens_hqs_personagens_idx` (`id_personagens`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ranking_hqs1_idx` (`id_hqs`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `hqs`
--
ALTER TABLE `hqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `personagens_hqs`
--
ALTER TABLE `personagens_hqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuario_sistema`
--
ALTER TABLE `usuario_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `hqs`
--
ALTER TABLE `hqs`
  ADD CONSTRAINT `fk_hqs_autor1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hqs_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hqs_editora1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hqs_personagens1` FOREIGN KEY (`id_personagens`) REFERENCES `personagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hqs_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_descricao_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_hqs1` FOREIGN KEY (`id_hqs`) REFERENCES `hqs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `personagens`
--
ALTER TABLE `personagens`
  ADD CONSTRAINT `fk_personagens_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `personagens_hqs`
--
ALTER TABLE `personagens_hqs`
  ADD CONSTRAINT `fk_personagens_hqs_personagens` FOREIGN KEY (`id_personagens`) REFERENCES `personagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `fk_ranking_hqs1` FOREIGN KEY (`id_hqs`) REFERENCES `hqs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
