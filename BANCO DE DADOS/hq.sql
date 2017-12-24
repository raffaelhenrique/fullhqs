-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Ago-2017 às 08:26
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hq`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`, `descricao`, `foto`) VALUES
(14, 'Stan lee', 'Stanley Martin Lieber (Nova Iorque, 28 de dezembro de 1922), mais conhecido como Stan Lee, é um escritor, editor, publicitário, produtor, diretor, empresário norte-americano e ator que, em parceria com outros importantes nomes dos quadrinhos — especialmente os desenhistas Jack Kirby, Steve Ditko e John Romita — criou, a partir do início dos anos 1960, super-heróis complexos e problemáticos, dando ao gênero um tom mais "humano", "verídico", na contramão da principal editora de HQs de super-heróis da época, DC Comics, detentora dos direitos de personagens famosos como Superman, e Batman, que seguiam no tom de super-heróis "invencíveis", "insuperáveis", revolucionando o gênero. Seu sucesso foi fundamental para transformar a Marvel Comics, de uma pequena editora de HQs, para uma das maiores corporações multimídia de entretenimento do mundo.', '14979326745948a3827271e.jpg'),
(15, 'Alan Moore', 'conhecido por seus trabalhos revolucionários como Watchmen,V de vingança,liga extraordinária,do inferno entre outros,Alan Moore foi responsável por trazer muitos escritores de HQs como Neil gaiman', '14980137455949e03168392.jpg'),
(16, 'Jack Kirby', 'criador dos novos deuses,capitão America, Kirby teve participação na criação de praticamente todos os personagens da Marvel nos anos seguintes,no inicio teve que encher o saco de stan Lee para considerar criar a cidade perdida de "Attilan" dos inumanos, "Black Panther" (Pantera Negra) e a nação africana de "Wakanda",ele também criou Etrigan,os eternos,os celestiais e quase todo universo cósmico da Marvel incluindo os asgardianos,Kirby é uma referencia stan Lee dizia que normalmente falava uma ideia de uma historia e ai Kirby fazia todo o resto da revista', '14980138045949e06c807c6.jpg'),
(17, 'Frank Miller', 'Em 1986, a DC Comics lançou Batman: The Dark Knight Returns, uma minissérie de quatro edições escrita e desenhada por Miller em um formato chamado "formato de prestígio". Assim, a HQ foi lançada com lombada quadrada (ao invés de grampeados no formato canoa), em papel resistente (em vez de papel de jornal) e com cartolina (em vez de capas em papel brilhante). Ela foi arte-finalizada por Klaus Janson e colorida por Lynn Varley.\r\n\r\nA história conta como Batman, após ter se aposentado depois da morte do segundo Robin, (Jason Todd), retorna aos 55 anos para combater o crime em um futuro sombrio e violento. Miller criou um Batman resistente e corajoso, referindo-se a ele como "O Cavaleiro das Trevas", com base em gibis dos anos 70, que o chamavam de Darknight Detective. Contudo, o apelido de "Cavaleiro das Trevas" para o personagem remonta a 1940.', '14987226265954b142078a9.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `titulo`, `texto`, `foto`) VALUES
(10, 'coringa', 'coringa', '14979331245948a544322b2.jpg'),
(12, 'Batman', 'batman', '14980139425949e0f616fc3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Suspense'),
(2, 'Terror'),
(3, 'Ação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id`, `nome`) VALUES
(2, 'DC'),
(5, 'Marvel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personagens` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_galeria_personagens1_idx` (`id_personagens`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `id_personagens`, `nome`, `foto`, `link`) VALUES
(1, 42, 'Devianart', '1498622387595329b312386.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1d3hJOGFqbzNOSjg'),
(2, 42, 'New #52', '14986243965953318c2d0e0.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1TkZxTUJjSWRlVFE'),
(8, 39, 'Devianart', '1498634195595357d3f0bcd.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1Vm5XTWdQZWU2czg'),
(9, 39, 'New #52', '14986342535953580d05b1b.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1eEN6VHYya0RVdkE'),
(10, 41, 'New #52', '14986363145953601ad3f9e.jpg', 'https://drive.google.com/drive/folders/0B0mji950XSt1NnhFR0p5ZXFRSHM?usp=sharing'),
(11, 41, 'Devianart', '149863638959536065a9906.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1MjBDZUVibS1nTVk'),
(12, 44, 'New #52', '1498636466595360b288752.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1SGx2eTNfbU8zSDQ'),
(13, 44, 'Devianart', '1498636500595360d44491b.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1aXFaam9jbU1ac3c'),
(14, 43, 'Devianart', '1498636545595361012c89b.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1eVMzZGl2aFp6cXc'),
(15, 43, 'New #52', '14986365905953612eb5291.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1ZlgyQTVGNDRzU2c'),
(18, 36, 'New #52', '149863683259536220166be.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1MENEMHJsUDZ2cTg'),
(19, 36, 'Devianart', '14986368685953624425d14.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1NHRtWmp1ZWY3bnc'),
(20, 48, 'Universo 616', '1498638764595369ac22820.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1SFdRR1pWR0duZnM'),
(21, 48, 'Devianart', '1498638816595369e0c3e35.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1NnM0akhNdm00ZG8'),
(22, 37, 'Universo 616', '149863887659536a1c8c91f.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1RnJmR1lvU0FwZ2c'),
(23, 37, 'Devianart', '149863891659536a444558f.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1bzZOTkM0bDl0TVk'),
(24, 47, 'Universo 616', '149863896059536a7078037.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1WjN2cXFzY3QwWWs'),
(25, 47, 'Devianart', '149863900659536a9eeb689.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1STgyUWc5LUJzS0k'),
(26, 46, 'Universo 616', '149863909959536afb0b5a4.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1M203a1JvLVpJWmc'),
(27, 46, 'Devianart', '149863915059536b2eb4c69.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1MFlTa182T1FyYmM'),
(28, 50, 'Universo 616', '149863920959536b69788f9.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1ME5RUHNOdFc4cGM'),
(29, 50, 'Devianart', '149863923959536b8797be4.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1NVM0S3N4TVpxcFU'),
(30, 45, 'Universo 616', '149863940359536c2b8ecd7.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1T0RJazlOX3dpWWc'),
(31, 45, 'Devianart', '149863943459536c4ab9f66.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1aVJMUl9aSGpZaG8'),
(32, 49, 'Universo 616', '149863948259536c7a22c4c.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1cnVjQUV3aFhUSEU'),
(33, 49, 'Devianart', '149863951059536c96766a9.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1ZEdSQTA4TFRTTmc'),
(34, 51, 'Universo 616', '149863956859536cd095035.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1S3JSdkt1WGVmaXM'),
(35, 51, 'Devianart', '149863959959536cef17765.jpg', 'https://drive.google.com/open?id=0B0mji950XSt1S3JSdkt1WGVmaXM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hqs`
--

CREATE TABLE IF NOT EXISTS `hqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `edicao` varchar(45) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_personagens` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `link` varchar(99) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hqs_editora1_idx` (`id_editora`),
  KEY `fk_hqs_autor1_idx` (`id_autor`),
  KEY `fk_hqs_categoria1_idx` (`id_categoria`),
  KEY `fk_hqs_usuario1_idx` (`id_usuario`),
  KEY `fk_hqs_personagens1_idx` (`id_personagens`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `hqs`
--

INSERT INTO `hqs` (`id`, `titulo`, `edicao`, `id_editora`, `id_autor`, `id_categoria`, `id_usuario`, `id_personagens`, `foto`, `link`) VALUES
(6, 'DC Rebirth', '#1-#24', 2, 15, 3, 77, 41, '149862800359533fa32a334.jpg', 'https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs'),
(13, 'DC Rebirth', '#1', 2, 15, 3, 77, 44, '14986290075953438f2a8c6.jpg', 'https://drive.google.com/file/d/0B-ZWbNluP6bIR253NXEtSmNabXc/view'),
(14, 'DC Rebirth', '#2', 2, 15, 3, 77, 44, '1498629074595343d2dac97.jpg', 'https://drive.google.com/file/d/0B6TOttXQ3smAVGFuVlVqai1fSDQ/view?usp=drive_web'),
(15, 'DC Rebirth', '#3', 2, 16, 3, 77, 44, '1498629158595344262ce6b.jpg', 'https://drive.google.com/file/d/0B6TOttXQ3smAU1dvUzNFUHMyaEk/view'),
(16, 'DC Rebirth', '#4', 2, 16, 3, 77, 44, '14986292205953446428654.jpg', 'https://drive.google.com/file/d/0B5gwhV75l41OeU5aUkJfTmdJUTg/view?usp=drive_web'),
(18, 'DC Rebirth', '#1', 2, 16, 3, 77, 36, '149862947759534565098f1.jpg', 'https://drive.google.com/file/d/0B8WcALxM7qSmS3NzWS1KQUNiSkE/view'),
(19, 'DC Rebirth', '#2', 2, 15, 3, 77, 36, '14986295165953458c4dbbf.jpg', 'https://drive.google.com/open?id=0B5gwhV75l41OQVB0ZGo4djNSZmM'),
(20, 'DC Rebirth', '#3', 2, 15, 3, 77, 36, '1498629609595345e952b20.jpg', 'https://drive.google.com/file/d/0B6TOttXQ3smAbmplN1pyQTRPWGM/view?usp=drive_web'),
(21, 'DC Rebirth', '#4', 2, 16, 3, 77, 36, '14986297395953466bef4e0.jpg', 'https://drive.google.com/file/d/0B5gwhV75l41OLUFLTkVvbXBYVDQ/view?usp=drive_web'),
(22, 'DC Rebirth', '#1', 2, 16, 3, 77, 40, '1498630075595347bbeceaa.jpg', 'https://drive.google.com/file/d/0B1Y6-1KXxg2VbWotZEFsenk5eG8/view'),
(23, 'DC Rebirth', '#2', 2, 15, 3, 77, 40, '1498630125595347ed82acc.jpg', 'https://drive.google.com/file/d/0B1Y6-1KXxg2VZFVlMWJrSmwyems/view'),
(24, 'DC Rebirth', '#4', 2, 15, 3, 77, 40, '149863019359534831b4361.jpg', 'https://drive.google.com/open?id=0B1Y6-1KXxg2VQ29UNWI0c0dhQU0'),
(25, 'DC Rebirth', '#3', 2, 15, 3, 77, 40, '14986302375953485de00a8.jpg', 'https://drive.google.com/file/d/0B1Y6-1KXxg2VSFJ1U2pwNm5lQmc/view?usp=drive_web'),
(26, 'DC Renascimento', '#1', 2, 15, 1, 77, 40, '149863040059534900c7b46.jpg', 'https://drive.google.com/file/d/0B1Y6-1KXxg2VSFJ1U2pwNm5lQmc/view?usp=drive_web'),
(28, 'DC Rebirth', '#1', 2, 15, 3, 77, 39, '149863093159534b133e949.jpg', 'https://drive.google.com/drive/folders/0B9ySyeOapDLOVVRfV0ZUSHZDSHc'),
(29, 'DC Rebirth', '#2', 2, 16, 3, 77, 39, '149863107659534ba49b2fc.jpg', 'https://drive.google.com/drive/u/1/folders/0B9ySyeOapDLOeGgyV1Vzel84cEU'),
(30, 'DC Rebirth', '#3', 2, 15, 3, 77, 39, '149863124859534c50d408f.jpg', 'https://drive.google.com/drive/u/1/folders/0B9ySyeOapDLOZjNMZS1CcU1nS28'),
(31, 'DC Rebirth', '#1-#12', 2, 16, 3, 77, 42, '149863141959534cfb37b8f.jpg', 'https://drive.google.com/drive/u/1/folders/0B9ySyeOapDLOc3Uta1R6UldaMWc'),
(32, 'DC Rebirth', 'Liga da justiça #1', 2, 16, 3, 77, 43, '149863180459534e7c7502b.jpg', 'https://drive.google.com/file/d/0B5gwhV75l41OMXFrblNaazltWkE/view?usp=drive_web'),
(33, 'DC Rebirth', 'Liga da justiça #2', 2, 16, 3, 77, 43, '149863185159534eabf03b8.jpg', 'https://drive.google.com/open?id=0B5gwhV75l41OU043YTQ3dEN0QTA'),
(34, 'Homem aranha - Deadpool', 'V#01', 5, 14, 3, 77, 50, '149863205559534f77d0e64.jpg', 'https://drive.google.com/file/d/0B0n7M68eOEX6OWZFZ1dJQktiTEE/view'),
(35, 'Deadpool a Guerra de wade wilson', 'V#01', 5, 14, 3, 77, 50, '149863217659534ff06ad2d.jpg', 'https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view'),
(36, 'Deadpool a Guerra de wade wilson', 'V#02', 5, 14, 3, 77, 50, '14986322375953502dc96e5.jpg', 'https://drive.google.com/file/d/0B42vE_NdhWtReUdyOTNhdzRVRDA/view'),
(39, 'Doutor Estranho V4', 'V#02', 5, 14, 3, 77, 46, '14986325525953516845977.jpg', 'https://drive.google.com/file/d/0BwKfIdxaLNbXVktfUURvOW11bU0/view'),
(40, 'Guerra Civil', 'Vol.1', 5, 14, 3, 77, 37, '14986327335953521dc32c5.jpg', 'https://drive.google.com/file/d/0B8Ap9EHcqvn_LXA1aFRRXzJvQ3M/view?usp=drive_web'),
(41, 'Guerra Civil', 'Vol.2', 5, 14, 3, 77, 37, '14986327905953525680951.jpg', 'https://drive.google.com/file/d/0B8Ap9EHcqvn_RUwyVzk0eHBMQnc/view'),
(42, 'Guerra Civil', 'Vol.3', 5, 14, 3, 77, 37, '14986328435953528b409f2.jpg', 'https://drive.google.com/file/d/0B8Ap9EHcqvn_elFnbjFRSERtc00/view?usp=drive_web'),
(43, 'Guerra Civil', 'Vol.4', 5, 14, 3, 77, 37, '1498632878595352ae2f880.jpg', 'https://drive.google.com/file/d/0B8Ap9EHcqvn_Mk82TlNFSVZPZEk/view?usp=drive_web'),
(44, 'Ultimate Homem Aranha', 'vol.1-12', 5, 14, 3, 77, 51, '149863301059535332bad56.jpg', 'https://drive.google.com/drive/folders/0B0qOQYpm_X4ATVZzMHFMVFFvUmM'),
(45, 'Surfista Prateado', 'Vol.1 - 5', 5, 14, 3, 77, 45, '1498633124595353a41e752.jpg', 'https://drive.google.com/drive/folders/0B9ySyeOapDLOczhNUHVub2hHd1U'),
(46, 'Thanos vs Vingadores', 'Vol.1 - 45', 5, 14, 3, 77, 47, '1498633458595354f202e4b.jpg', 'https://drive.google.com/drive/folders/0B_QWUyZ-zucaWmV5MUlQVGVFRjA'),
(47, 'O poderoso Thor', 'Vol.1 - 93', 5, 14, 3, 77, 48, '14986335945953557a76531.jpg', 'https://drive.google.com/drive/folders/0B-KYL0zvgqh0enpXMXVPSUhJQm8'),
(48, 'Velho Logan', 'Vol.01 - 06', 5, 14, 3, 77, 49, '14986337335953560568a3c.jpg', 'https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg'),
(50, 'DC Rebirth', 'V#01', 2, 16, 3, 77, 53, '1502249475598a82035979b.jpg', 'https://drive.google.com/file/d/0B5gwhV75l41ORXhQTDRrM1laZjg/view'),
(51, 'DC Rebirth', 'V#02', 2, 17, 3, 77, 53, '1502249529598a82396769f.jpg', 'https://drive.google.com/file/d/0B5gwhV75l41OR3JYOW51S3ZYOTQ/view');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `resumo` text NOT NULL,
  `noticia` text NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noticia_usuario_sistema1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `id_usuario`, `titulo`, `resumo`, `noticia`, `data`, `foto`) VALUES
(15, 7, 'Thanos Retornara em breve!', 'Thanos é um supervilão fictício que aparece nas histórias em quadrinhos publicadas pela Marvel Comics. O personagem é descrito geralmente como um Titan mutante, já que apesar de ser poderoso, ele era rejeitado pelos outros por causa de sua aparência. O personagem apareceu pela primeira vez em "Iron Man" #55 (fevereiro de 1973) e foi criado pelo escritor-artista Jim Starlin. Estreando ainda na Era de Prata, o personagem tem sido destaque em mais de quatro décadas de continuidade do Universo Marve', 'Thanos é um supervilão fictício que aparece nas histórias em quadrinhos publicadas pela Marvel Comics. O personagem é descrito geralmente como um Titan mutante, já que apesar de ser poderoso, ele era rejeitado pelos outros por causa de sua aparência. O personagem apareceu pela primeira vez em "Iron Man" #55 (fevereiro de 1973) e foi criado pelo escritor-artista Jim Starlin. Estreando ainda na Era de Prata, o personagem tem sido destaque em mais de quatro décadas de continuidade do Universo Marvel e em uma série de histórias em quadrinhos auto-intitulada.\r\n\r\nThanos aparece em vários filmes do Universo Cinematográfico Marvel; com uma participação especial durante as cenas pós-créditos de Os Vingadores (2012); Josh Brolin interpreta o personagem em Guardiões da Galaxia (2014) e em Vingadores: Era de Ultron (2015); e vai reprisar o papel como antagonista em Vingadores: Guerra Infinta (2018) e sua sequência sem título (2019).', '2017-06-20', '14979317765948a0003f158.png'),
(16, 7, 'Curiosidades Flash Reverso', 'No ano de 2466, Eobard Thawne herdou uma fortuna quase inesgotável, algo que o ajudou a cumprir o seu sonho de infância: tornar-se o novo Flash! Um dia Thawne viu a Esteira Cósmica na vitrine de uma loja de antiguidades. Não perdeu tempo e comprou para tentar replicar o acidente que tornou Barry Allen o Flash.\r\nMas o acidente não correu como planejado e Thawne ficou mentalmente instável e completamente desfigurado. No hospital ele pediu que a sua face fosse reconstruída à imagem de Barry Allen. ', 'No ano de 2466, Eobard Thawne herdou uma fortuna quase inesgotável, algo que o ajudou a cumprir o seu sonho de infância: tornar-se o novo Flash! Um dia Thawne viu a Esteira Cósmica na vitrine de uma loja de antiguidades. Não perdeu tempo e comprou para tentar replicar o acidente que tornou Barry Allen o Flash.\r\nMas o acidente não correu como planejado e Thawne ficou mentalmente instável e completamente desfigurado. No hospital ele pediu que a sua face fosse reconstruída à imagem de Barry Allen. Os gastos da cirurgia consumiram com a sua fortuna. \r\nThawne ficou sem grana, mas tinha os poderes de Flash. Assim ele viajou no tempo para conhecer o seu ídolo, até que um erro fez com que ele viajasse para uma era onde Barry tinha falecido recentemente. Lá Thawne viu várias fotos do Flash tentando matar um cara chamado Professor Zoom. Thawne percebeu que esse tal de Professor Zoom era nada mais nada menos que ele próprio. Este choque acabou fazendo com que ele ficasse psicótico e malvado. Assim nasceu o Flash Reverso!\r\nFlash Reverso voltou atrás no tempo e matou a Mãe de Barry Allen, Nora Allen. Este foi o momento em que a rivalidade entre este dois personagens começou.', '2017-06-20', '14979325395948a2fbc77a9.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginasmovimento`
--

CREATE TABLE IF NOT EXISTS `paginasmovimento` (
  `idmovimento` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idhq` int(11) NOT NULL DEFAULT '0',
  `idpersonagem` int(11) NOT NULL DEFAULT '0',
  `iddownload` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `idmovimento` (`idmovimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=390 ;

--
-- Extraindo dados da tabela `paginasmovimento`
--

INSERT INTO `paginasmovimento` (`idmovimento`, `url`, `idhq`, `idpersonagem`, `iddownload`) VALUES
(79, '/fullhqs/index.php?pg=personagens&id=42', 0, 42, 0),
(80, '/fullhqs/index.php?pg=personagens&id=41', 0, 41, 0),
(81, '/fullhqs/index.php?pg=personagens&id=44', 0, 44, 0),
(82, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(84, '/fullhqs/index.php?pg=personagens&id=36', 0, 36, 0),
(85, '/fullhqs/index.php?pg=personagens&id=40', 0, 40, 0),
(86, '/fullhqs/index.php?pg=personagens&id=39', 0, 39, 0),
(87, '/fullhqs/index.php?pg=hqs&id=41', 41, 0, 0),
(88, '/fullhqs/index.php?pg=hqs&id=44', 44, 0, 0),
(89, '/fullhqs/index.php?pg=hqs&id=42', 42, 0, 0),
(90, '/fullhqs/index.php?pg=hqs&id=43', 43, 0, 0),
(92, '/fullhqs/index.php?pg=hqs&id=36', 36, 0, 0),
(93, '/fullhqs/index.php?pg=hqs&id=40', 40, 0, 0),
(94, '/fullhqs/index.php?pg=hqs&id=39', 39, 0, 0),
(95, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(96, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(97, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(98, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(99, '/fullhqs/index.php?pg=personagens&id=43', 0, 43, 0),
(100, '/fullhqs/index.php?pg=personagens&id=50', 0, 50, 0),
(101, '/fullhqs/index.php?pg=personagens&id=46', 0, 46, 0),
(102, '/fullhqs/index.php?pg=hqs&id=44', 44, 0, 0),
(103, '/fullhqs/index.php?pg=hqs&id=43', 43, 0, 0),
(104, '/fullhqs/index.php?pg=hqs&id=42', 42, 0, 0),
(105, '/fullhqs/index.php?pg=hqs&id=42', 42, 0, 0),
(106, '/fullhqs/index.php?pg=hqs&id=42', 42, 0, 0),
(107, '/fullhqs/index.php?pg=hqs&id=44', 44, 0, 0),
(108, '/fullhqs/index.php?pg=hqs&id=39', 39, 0, 0),
(109, '/fullhqs/index.php?pg=hqs&id=44', 44, 0, 0),
(110, '/fullhqs/index.php?pg=hqs&id=43', 43, 0, 0),
(111, '/fullhqs/index.php?pg=personagens&id=40', 0, 40, 0),
(112, '/fullhqs/index.php?pg=personagens&id=40', 0, 40, 0),
(113, '/fullhqs/index.php?pg=personagens&id=40', 0, 40, 0),
(114, '/fullhqs/index.php?pg=personagens&id=44', 0, 44, 0),
(115, '/fullhqs/index.php?pg=personagens&id=36', 0, 36, 0),
(116, '/fullhqs/index.php?pg=personagens&id=36', 0, 36, 0),
(117, '/fullhqs/index.php?pg=personagens&id=36', 0, 36, 0),
(118, '/fullhqs/index.php?pg=personagens&id=36', 0, 36, 0),
(119, '/fullhqs/index.php?pg=personagens&id=42', 0, 42, 0),
(120, '/fullhqs/index.php?pg=personagens&id=40', 0, 40, 0),
(121, '/fullhqs/index.php?pg=personagens&id=41', 0, 41, 0),
(122, '/fullhqs/index.php?pg=personagens&id=46', 0, 46, 0),
(123, '/fullhqs/index.php?pg=personagens&id=41', 0, 41, 0),
(124, '/fullhqs/?pg=hqs&id=41', 41, 0, 0),
(125, '/fullhqs/?pg=hqs&id=50', 50, 0, 0),
(126, '/fullhqs/index.php?pg=hqs&id=50', 50, 0, 0),
(127, '/fullhqs/index.php?pg=hqs&id=50', 50, 0, 0),
(128, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(129, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(130, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(131, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(132, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(133, '/fullhqs/index.php?pg=hqs&id=50', 50, 0, 0),
(134, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(135, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(136, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(137, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(138, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(139, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(140, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(141, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(142, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(143, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(144, '/fullhqs/index.php?pg=hqs&id=50', 50, 0, 0),
(145, '/fullhqs/download.php?iddown=35&arq=https://drive.google.com/file/d/0B42vE_NdhWtRdmdiX2ZvWDBMa1U/view', 0, 0, 35),
(146, '/fullhqs/download.php?iddown=36&arq=https://drive.google.com/file/d/0B42vE_NdhWtReUdyOTNhdzRVRDA/view', 0, 0, 36),
(147, '/fullhqs/download.php?iddown=34&arq=https://drive.google.com/file/d/0B0n7M68eOEX6OWZFZ1dJQktiTEE/view', 0, 0, 34),
(148, '/fullhqs/index.php?pg=hqs&id=47', 47, 0, 0),
(149, '/fullhqs/download.php?iddown=46&arq=https://drive.google.com/drive/folders/0B_QWUyZ-zucaWmV5MUlQVGVFRjA', 0, 0, 46),
(150, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(151, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(152, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(153, '/hq/index.php?pg=hqs&id=51', 51, 0, 0),
(154, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(155, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(156, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(157, '/hq/index.php?pg=hqs&id=39', 39, 0, 0),
(159, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(161, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(162, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(163, '/hq/index.php?pg=personagens&id=39', 0, 39, 0),
(164, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(166, '/hq/index.php?pg=hqs&id=51', 51, 0, 0),
(167, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(168, '/hq/index.php?pg=hqs&id=44', 44, 0, 0),
(169, '/hq/download.php?iddown=14&arq=https://drive.google.com/file/d/0B6TOttXQ3smAVGFuVlVqai1fSDQ/view?usp=drive_web', 0, 0, 14),
(170, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(171, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(172, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(173, '/hq/download.php?iddown=34&arq=https://drive.google.com/file/d/0B0n7M68eOEX6OWZFZ1dJQktiTEE/view', 0, 0, 34),
(174, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(175, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(176, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(177, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(178, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(179, '/hq/index.php?pg=hqs&id=47', 47, 0, 0),
(180, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(181, '/hq/index.php?pg=personagens&id=51', 0, 51, 0),
(182, '/hq/index.php?pg=hqs&id=51', 51, 0, 0),
(183, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(184, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(185, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(186, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(187, '/hq/index.php?pg=personagens&id=49', 0, 49, 0),
(188, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(189, '/hq/index.php?pg=hqs&id=44', 44, 0, 0),
(190, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(191, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(192, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(193, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(194, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(195, '/hq/index.php?pg=hqs&id=47', 47, 0, 0),
(196, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(197, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(198, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(199, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(200, '/hq/index.php?pg=hqs&id=42', 42, 0, 0),
(201, '/hq/index.php?pg=hqs&id=43', 43, 0, 0),
(202, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(203, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(204, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(205, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(206, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(207, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(208, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(209, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(210, '/hq/download.php?iddown=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(211, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(212, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(213, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(214, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(215, '/hq/index.php?pg=personagens&id=42', 0, 42, 0),
(216, '/hq/index.php?pg=hqs&id=44', 44, 0, 0),
(217, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(218, '/hq/index.php?pg=hqs&id=51', 51, 0, 0),
(219, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(220, '/hq/?pg=hqs&id=41', 41, 0, 0),
(221, '/hq/?pg=hqs&id=49', 49, 0, 0),
(222, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(223, '/hq/download.php?iddown=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(224, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(225, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(226, '/hq/download.php?iddown=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(227, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(228, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(229, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(230, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(231, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(232, '/hq/index.php?pg=hqs&id=40', 40, 0, 0),
(233, '/hq/download.php?iddown=22&arq=https://drive.google.com/file/d/0B1Y6-1KXxg2VbWotZEFsenk5eG8/view', 0, 0, 22),
(234, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(235, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(236, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(237, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(243, '/hq/index.php?pg=personagens&id=51', 0, 51, 0),
(244, '/hq/index.php?pg=hqs&id=39', 39, 0, 0),
(245, '/hq/index.php?pg=personagens&id=46', 0, 46, 0),
(246, '/hq/index.php?pg=personagens&id=50', 0, 50, 0),
(247, '/hq/index.php?pg=personagens&id=49', 0, 49, 0),
(248, '/hq/index.php?pg=hqs&id=44', 44, 0, 0),
(249, '/hq/index.php?pg=personagens&id=44', 0, 44, 0),
(250, '/hq/index.php?pg=personagens&id=51', 0, 51, 0),
(255, '/hq/index.php?pg=personagens&id=50', 0, 50, 0),
(256, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(257, '/hq3/index.php?pg=hqs&id=50', 50, 0, 0),
(258, '/hq3/index.php?pg=hqs&id=49', 49, 0, 0),
(259, '/hq3/index.php?pg=hqs&id=41', 41, 0, 0),
(260, '/hq3/download.php?iddown=6&arq=https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs', 0, 0, 6),
(261, '/hq/?pg=hqs&id=36', 36, 0, 0),
(262, '/hq/?pg=personagens&id=36', 0, 36, 0),
(263, '/hq/?pg=hqs&id=49', 49, 0, 0),
(264, '/hq/index.php?pg=personagens&id=46', 0, 46, 0),
(265, '/hq/?pg=personagens&id=50', 0, 50, 0),
(266, '/hq/?pg=hqs&id=50', 50, 0, 0),
(267, '/hq/?pg=personagens&id=43', 0, 43, 0),
(268, '/hq/index.php?pg=personagens&id=47', 0, 47, 0),
(269, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(270, '/hq/?pg=hqs&id=41', 41, 0, 0),
(271, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(272, '/hq/download.php?iddownload=6&arq=https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs', 0, 0, 6),
(273, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(274, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(275, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(276, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(277, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(278, '/hq/download.php?iddownload=34&arq=https://drive.google.com/file/d/0B0n7M68eOEX6OWZFZ1dJQktiTEE/view', 0, 0, 34),
(279, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(280, '/hq/index.php?pg=personagens&id=46', 0, 46, 0),
(281, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(282, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(283, '/hq/download.php?iddownload=6&arq=https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs', 0, 0, 6),
(284, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(285, '/hq/index.php?pg=hqs&id=47', 47, 0, 0),
(286, '/hq/index.php?pg=personagens&id=49', 0, 49, 0),
(287, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(288, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(289, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(290, '/hq/index.php?pg=personagens&id=49', 0, 49, 0),
(291, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(292, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(293, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(294, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(295, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(296, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(297, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(298, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(299, '/hq/index.php?pg=personagens&id=47', 0, 47, 0),
(300, '/hq/index.php?pg=hqs&id=47', 47, 0, 0),
(301, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(302, '/hq/index.php?pg=personagens&id=47', 0, 47, 0),
(303, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(304, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(305, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(306, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(307, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(308, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(309, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(310, '/hq/index.php?pg=personagens&id=43', 0, 43, 0),
(311, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(312, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(313, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(314, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(315, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(316, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(317, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(318, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(319, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(320, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(321, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(322, '/hq/?pg=personagens&id=36', 0, 36, 0),
(323, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(324, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(325, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(326, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(327, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(328, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(329, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(330, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(331, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(332, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(333, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(334, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(335, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(336, '/hq/index.php?pg=personagens&id=41', 0, 41, 0),
(337, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(338, '/hq/index.php?pg=hqs&id=46', 46, 0, 0),
(339, '/hq/download.php?iddownload=39&arq=https://drive.google.com/file/d/0BwKfIdxaLNbXVktfUURvOW11bU0/view', 0, 0, 39),
(340, '/hq/download.php?iddownload=39&arq=https://drive.google.com/file/d/0BwKfIdxaLNbXVktfUURvOW11bU0/view', 0, 0, 39),
(341, '/hq/download.php?iddownload=39&arq=https://drive.google.com/file/d/0BwKfIdxaLNbXVktfUURvOW11bU0/view', 0, 0, 39),
(342, '/hq/download.php?iddownload=39&arq=https://drive.google.com/file/d/0BwKfIdxaLNbXVktfUURvOW11bU0/view', 0, 0, 39),
(343, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(344, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(345, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(346, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(347, '/hq/download.php?iddownload=48&arq=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(348, '/hq/index.php?pg=hqs&id=50', 50, 0, 0),
(349, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(350, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(351, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(352, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(353, '/hq/download.php?iddownload=', 0, 0, 0),
(354, '/hq/download.php?iddownload=', 0, 0, 0),
(355, '/hq/download.php?iddownload=', 0, 0, 0),
(356, '/hq/download.php?iddownload=', 0, 0, 0),
(357, '/hq/?pg=hqs&id=50', 50, 0, 0),
(358, '/hq/?pg=hqs&id=50', 50, 0, 0),
(359, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(360, '/hq/index.php?pg=hqs&id=36', 36, 0, 0),
(362, '/hq/index.php?pg=personagens&id=53', 0, 53, 0),
(363, '/hq/index.php?pg=hqs&id=53', 53, 0, 0),
(364, '/hq/index.php?pg=hqs&id=53', 53, 0, 0),
(365, '/hq/download.php?iddownload=50&arq=https://drive.google.com/file/d/0B5gwhV75l41ORXhQTDRrM1laZjg/view', 0, 0, 50),
(366, '/hq/download.php?iddownload=51&arq=https://drive.google.com/file/d/0B5gwhV75l41OR3JYOW51S3ZYOTQ/view', 0, 0, 51),
(367, '/hq/index.php?pg=personagens&id=53', 0, 53, 0),
(369, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(370, '/hq/index.php?pg=hqs&id=41', 41, 0, 0),
(371, '/hq/download.php?iddownload=6&arq=https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs', 0, 0, 6),
(372, '/hq/download.php?iddownload=6&link=https://drive.google.com/drive/folders/0B9ySyeOapDLONTc4UUlMQnVXNWs', 0, 0, 6),
(373, '/hq/download.php?iddownload=49&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 49),
(374, '/hq/download.php?iddownload=49&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 49),
(375, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(376, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(377, '/hq/download.php?iddownload=48&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(378, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(379, '/hq/download.php?iddownload=48&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(380, '/hq/download.php?iddownload=48&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(381, '/hq/download.php?iddownload=48&link=https://drive.google.com/drive/folders/0B8WcALxM7qSmVjdvNjhPVFA5eDg', 0, 0, 48),
(382, '/hq/index.php?pg=hqs&id=49', 49, 0, 0),
(383, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(384, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(385, '/hq/index.php?pg=hqs&id=46', 46, 0, 0),
(386, '/hq/index.php?pg=hqs&id=46', 46, 0, 0),
(387, '/hq/index.php?pg=personagens&id=36', 0, 36, 0),
(388, '/hq/?pg=hqs&id=53', 53, 0, 0),
(389, '/hq/index.php?pg=personagens&id=36', 0, 36, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagens`
--

CREATE TABLE IF NOT EXISTS `personagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_editora` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_personagens_categoria1_idx` (`id_editora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `id_editora`, `nome`, `descricao`, `foto`) VALUES
(36, 2, 'Lanterna Verde', 'Cada Lanterna Verde detém um anel de poder que pode gerar uma variedade de efeitos, sustentando-se apenas pela imaginação do portador do anel e pela sua força de vontade. Quanto maior a força de vontade do usuário, mais eficaz é o anel. Os limites superiores das habilidades do anel de poder permanecem indefinidos, e tem sido referida como "a arma mais poderosa do universo" em mais de uma ocasião. Também foi afirmado que cada arma tem um ponto fraco, e a fraqueza de um anel do Lanterna Verde é o seu portador (embora alguns argumentem que este é o seu forte). Ao longo dos anos, os anéis foram mostrados capazes de realizar quase qualquer coisa dentro da imaginação do portador do anel. Em 2006, histórias em continuidade retroativa estabeleceram há muito tempo a ineficácia do anel sobre objetos amarelos, informando que o portador do Anel só precisa sentir medo, compreendê-lo e superá-lo, a fim de afetar objetos amarelos (no entanto, é uma habilidade aprendida e praticada, tornando-se uma fraqueza para alguns Lanternas Verdes), dando o crédito retroativo para a explicação da fraqueza real, mas superável do anel para o amarelo.', '149793039559489a9b60c7b.jpg'),
(37, 5, 'Homem de Ferro', 'Na versão original, durante a guerra do Vietnã, o inventor e empresário Tony Stark foi vítima de uma explosão de granada. Stark sobreviveu à explosão mas estilhaços do explosivo se alojaram próximo ao seu coração, ameaçando sua vida. Ele foi capturado e levado até o líder Wong Chu. Restavam apenas alguns dias de vida para o americano, e Wong Chu o forçou a criar uma poderosa arma.Tony não criou uma arma e sim algo que o mantivesse vivo e permitisse derrotar os captores. Preso com ele estava outro gênio, o professor Ho Yinsen. Stark revelou seu plano ao professor e Yinsen o ajudou.\r\n\r\nQuando os homens de Wong Chu se aproximaram, o velho professor pegou uma metralhadora, mas acabou sendo fuzilado, mas garantiu tempo suficiente para que Stark se recuperasse e se acostumasse a usar a armadura criada.\r\n\r\nO Homem de Ferro enfrentou os soldados e os derrotou. Sua armadura resistia aos disparos contra ele. Wong Chu tentou fugir e o Homem de Ferro incendiou o galpão de munições fazendo com que a explosão o matasse. Os prisioneiros foram libertados.\r\n\r\nDesde então Stark desenvolveu novas versões de sua armadura e adotou as cores vermelho e dourado como as padrões da armadura, com algumas pequenas alterações esporádicas como preto, prateado e, mais recentemente, branco.\r\n\r\nNo começo de suas atuações, e para que ninguém desconfiasse, Stark espalhou o boato de que o Homem de Ferro era seu guarda-costas. Nas aventuras dos anos 70 e 80, era comum heróis, vilões e coadjuvantes do Universo Marvel se referirem ao Homem de Ferro como "o lacaio de armadura". Apenas seu motorista, Harold "Happy" Hogan, e sua secretária, Virginia "Pepper" Potts, sabiam da identidade secreta de Stark.', '149793057059489b4a6ef18.jpg'),
(39, 2, 'Superman', 'A primeira aparição do Superman foi em Action Comics #1, em 1938. Já naquele momento, as histórias do personagem se mostraram um sucesso, com a tiragem de 200 mil exemplares da revista esgotando-se rapidamente. A partir de sua quarta edição, Action já começaria a apresentar um significativo aumento em suas vendas, em comparação com os demais títulos da editora: entre 1938 e 1939, já possuía uma tiragem de mais de 500 mil exemplares. O sucesso levou, em 1939, a criação de uma segunda revista dedicada às histórias do personagem, a homônima Superman. A primeira edição consistiu principalmente de aventuras já publicadas em Action Comics, mas apesar disso a revista atingiu grande vendagem. 1939 também foi publicado na especial New York World''s Fair Comics, que no verão de 1942 virou World''s Finest Comics. Com a edição de All Star Comics, Superman fez sua primeira de um número infrequente de aparições, nesta ocasião aparecendo brevemente para estabelecer-se como membro honorário da Sociedade de Justiça da América.', '149845111459508caaa2539.jpg'),
(40, 2, 'Mulher-Maravilha', 'A Ilha Paraíso era habitada pelas antigas amazonas da mitologia, e não havia homens na ilha. Supostamente a Mulher-Maravilha veio ao mundo na Ilha Paraíso como uma estátua de menina criada por Hipólita (rainha das amazonas). Tão apaixonada por sua escultura, a rainha pediu aos deuses que dessem vida a figura, e foi atendida (semelhante ao mito grego de Pigmaleão). Mas em publicações recentes foi revelado que na verdade ela é filha biológica de Hipólita com Zeus, deus do Céu.\r\n\r\nRecebeu o nome de Diana. Junto com a vida, ela foi presenteada pela maioria dos Deuses do Olímpo, como Atena, que lhe deu a sabedoria; Hermes, lhe deu a velocidade; de Deméter ganhou a força e poder; de Afrodite, enorme beleza e coração amoroso; dos gêmeos Ártemis e Apolo, ganhou os olhos de caçadora, a compreensão das feras e a capacidade de cura acelerada; de Héstia, recebeu a afinidade com o fogo para que os corações se abrissem para ela; de Hefesto, ganhou a imunidade ao fogo, seus braceletes e seu laço mágico; do seu tio Poseidon, ganhou a destreza no nado e de seu pai Zeus,(apesar de que haja discordância sobre que seja realmente seu pai) ela recebeu a herança de semi-deusa e a capacidade de voo.', '149845120059508d00058f4.jpg'),
(41, 2, 'Aquaman', 'Em suas primeiras aparições na Era de Ouro, Aquaman podia respirar debaixo d''água com brânquias, tinha força sobre-humana que lhe permitiam nadar em altas velocidades e podia se comunicar com vida do mar e mandá-los fazer o que quisesse. Inicialmente, ele foi descrito com a capacidade de falar com as criaturas do mar "na sua própria língua" ao invés de telepatia, e só quando estavam perto o bastante para ouvi-lo. Embora ele fosse muitas vezes descrito como o "soberano do mar", com as águas do mundo inteiro em seu "domínio" e quase todas as criaturas do mar com seus "súditos leais", o título nunca foi oficial. As aventuras de Aquaman aconteceram em todo o mundo, e sua base era "um antigo templo na Atlântida perdida, mantido dentro d''água", onde ele mantinha um trono solitário.\r\n\r\nDurante suas aventuras de guerra, a maioria dos inimigos do Aquaman eram comandantes nazistas de U-boot e vários vilões do Eixo. O resto de suas aventuras nos anos 1940 e 1950 tinham ele lidando com vários vilões aquáticos, incluindo os piratas dos tempos modernos, como o seu longo arqui-inimigo Jack Black, bem como com as diferentes ameaças à vida aquática, às rotas marítimas e aos marinheiros.', '149845126759508d4344c13.jpg'),
(42, 2, 'Asa Noturna', 'Os trapezistas Os Graysons Voadores já eram a maior atração do circo Haly antes mesmo de seu filho Richard nascer. Aos 9 anos de idade, o pequeno Dick (apelido para Richard) já era um acrobata perfeito. Foi mais ou menos com essa idade, quando o Haly se apresentava em Gotham City, que o menino presenciou o mafioso Anthony Zucco tentando extorquir dinheiro do dono do circo. Com a recusa, Zucco preparou uma armadilha que resultaria na morte dos pais de Richard no trapézio. Batman apareceu no local, mas não conseguiu provas para prender Zucco de imediato. O criminoso só iria para trás das grades anos depois, condenado por outros crimes. Adotado por Bruce Wayne pouco depois da morte de seus pais, Dick se tornou parceiro do Homem-Morcego no combate ao crime, após um exaustivo período de treinamento. Nascia assim o primeiro Robin. Com o tempo, o rapaz se tornou uma lenda tão importante quanto o próprio Cavaleiro das Trevas. Seu espírito de liderança levou-o a formar a Turma Titã, juntamente com Kid Flash e Aqualad. Essa equipe, depois de muitas reviravoltas com a saída e a entrada de muitos heróis, transformou-se na super equipe Os Novos Titãs.', '149845133559508d873e22a.jpeg'),
(43, 2, 'Cyborgue', 'Filho único dos cientistas Silas e Elionore Stone, Victor Stone cresceu cercado pela ciência, sendo induzido a seguir a carreira dos pais, pois eles descobriram que Vic possuía um Q.I. de 170. Entretanto o garoto não teve uma infância normal, justamente por seus pais se dedicarem totalmente à ciência. Quando jovem, Vic começou a se relacionar com o encrenqueiro Ron Evers, metendo-se em problemas diversas vezes. Mas Vic continuou amigo de Ron, pois se sentia muito só e sem a atenção de seus pais.\r\n\r\nPor insistência de Elionore, Silas permitiu que Victor frequentasse uma escola pública. Assim, o garoto fez muitos amigos e começou a desenvolver seu potencial atlético. Neste tempo, Vic conheceu sua primeira namorada, Marcy Reynolds. Victor treinava arduamente na esperança de se ingressar nos Jogos Olímpicos. Seu pai se irritou, pois seus planos para Victor eram outros. Queria que seu filho fosse um cientista, o que acarretou num relacionamento conturbado entre os dois. Um dia, Vic decidiu visitar seus pais nos Laboratórios S.T.A.R (ou STAR Labs.) Silas e Elionore trabalhavam em dois projetos: Estudo e observação de outras dimensões e desenvolvimento de peças cibernéticas para serem usadas em soldados deficientes. Ao observar outra dimensão, Silas permitiu acidentalmente que uma criatura surgisse de uma barreira interdimensional. A entidade matou Elionore e deixou Victor gravemente ferido.', '149845137759508db19cb8b.jpg'),
(44, 2, 'Arqueiro Verde', 'Embora os jornais chamassem Oliver Queen de milionário industrial, "mauricinho entediado" provavelmente seria mais preciso. Nascido em berço de ouro, Queen nunca precisou trabalhar, até pagar caro por isso. Certa noite, bêbado, ele caiu de um iate no mar e se viu preso numa ilha deserta próximo a Costa da Califórnia.\r\n\r\nOliver conseguiu se alimentar após fazer um conjunto rústico de arco e flechas. Saber usar o arco se tornou uma questão de sobrevivência durante os três meses seguintes, e ele finalmente descobriu o que era viver sem os confortos da riqueza. A salvação veio quando um grupo de plantadores de maconha desembarcou na ilha para fazer a colheita. Queen os pegou de surpresa, tomou o barco dos traficantes e os entregou à Guarda Costeira. Embora tenha se mantido anônimo, a imprensa local publicou a história e o chamou de Robin Hood moderno.\r\n\r\nPor ironia, assim que Queen anunciou que estava são e salvo, sua reapresentação à alta sociedade foi num baile de máscaras beneficente, aonde ele compareceu disfarçado de Robin Hood. Mas, após os meses na ilha, Oliver havia passado a enxergar a vida de forma diferente. Ele não tinha mais paciência para as futilidades e fofocas dos ricos ociosos. Assim, quando um assaltante apareceu na festa, o mascarado Queen assumiu o controle da situação e, armado apenas com suas flechas falsas e a habilidade que desenvolveu na ilha, deteve o ladrão.\r\n\r\nEsse ato heroico foi perigoso, porém estimulante. Mais divertido do que qualquer coisa que ele tivesse feito em anos. Sem querer, Queen havia encontrado uma maneira de praticar e defender a ética em que acreditava. Já possuía até mesmo um alter ego pronto: o assaltante preso na festa repetira incansavelmente para a imprensa que um "arqueiro verde grandalhão" o havia dominado, levando os jornais locais a cunhar o nome "Arqueiro Verde".', '14984536285950967c4ade6.jpg'),
(45, 5, 'Surfista Prateado', 'A história de sua origem remonta a Galactus, o devorador de mundos, uma das maiores Forças do Universo Marvel.\r\n\r\nNa primeira série da revista própria com o herói (18 edições) foi contada a saga do Surfista, que antes de encontrar Galactus era conhecido como Norrin Radd, um nobre que vivia no planeta Zenn-La, Sistema Deneb, Via Láctea. Quando o Devorador de mundos chegou a seu planeta, em uma atitude desesperada para salvar sua amada Shalla Bal, Norrin se ofereceu para servir eternamente a Galactus. A barganha funcionou, e então o vilão concedeu-lhe uma pequena fração de seus poderes e poupou Zenn-La e todos os seus habitantes. Norrin Radd foi condenado a vagar pelo Universo a buscar planetas para satisfazer a fome de Galactus.\r\n\r\nRebatizado agora de Surfista Prateado, com sua memória anterior ao evento apagada, ele serviu durante eras como arauto de Galactus, surfando pelo cosmos em sua prancha de prata, encontrando para o gigante mundos desabitados para serem devorados.\r\n\r\nAssim foi sua vida até chegar a Terra, um planeta que ele percebeu ser habitado mas que não conseguiu livrar de Galactus que não queria mais esperar para se alimentar. Na Terra, ele conheceu o Quarteto Fantástico e, comovido pela nobreza dos seres humanos que insistiram em continuar numa luta que o Surfista considerava perdida, aliou-se a eles contra Galactus. E conseguiu expulsar o vilão do planeta, ao lado do Quarteto e com a ajuda do Vigia.', '149845174059508f1cce789.jpg'),
(46, 5, 'Doutor Estranho', 'Stephen é um grande estrategista (sendo por essa razão o líder dos Defensores), e como parte do seu treinamento místico, se tornou um brilhante artista marcial (quase tão bom quanto o Punho de Ferro). Ao completar seus estudos, Stephen virou um dos seres mais poderosos da Marvel Comics. Seus poderes são todos de natureza mística, mas são separadas em categorias diferentes, e elas são:\r\n\r\nPoderes pessoais: É um dos mais poderosos telepatas do planeta, sendo capaz de projetar seu corpo astral através da existência; possui também uma forma de mesmerismo, criando ilusões realistas e comunicando-se mentalmente com outros. Ele não precisa de magia para as suas habilidades telepáticas, no entanto, pode aumentá-las com fontes de energias mágicas, como o Olho de Agamotto, por exemplo.\r\n\r\nForças Universais: É capaz de manipular as energias mágicas da realidade, para uma quantidade quase infinita de efeitos. Com essas energias ele tem habilidades telecinéticas, projeta escudos de energia, magia elemental, desintegração orgânica, magia divlnas, teleporta a si e a outros, e pode destruir e transmutar um planeta inteiro. Utilizando magia negra no ápice do seus poderno, pode retirar energia de qualquer entidade com apenas movimentação do seu dedo, usado também em outros seres. Usando esse tipo de magia consegue absorver a energia de qualquer ser ou dimensão para conjuração de seus feiteços extramentes poderosos.', '149845183759508f7d4e2df.jpg'),
(47, 5, 'Thanos', 'A lua Titã era governada por Mentor (A''Lars), quando então reinava paz e tecnologia. Mentor tinha dois filhos: Eros e Thanos. O primeiro tinha o poder de estimular os centros de prazer de seres vivos sencientes. O outro, entretanto, era bem mais poderoso e almejava ainda mais.\r\n\r\nAssim, Thanos se voltou contra seu pai e contra o reino, forçando Mentor a procurar seu pai, Kronos. Kronos criou Drax, o Destruidor, para que ele eliminasse Thanos. Mas o Destruidor falhou e se rendeu a Thanos de modo que este conseguiu conquistar o trono de Titã. Em seguida, partiu pela Via Láctea, com o intuito de apoderar-se do Cubo Cósmico, um objeto que satisfaz quaisquer desejos de seu possuidor. Amando a Senhora Morte mais do que todas as coisas, o vilão planejava destruir o Universo (genocídio estelar).', '149845205059509052116e0.jpg'),
(48, 5, 'Thor', 'Filho de Odin, o deus supremo de Asgard (lar dos deuses nórdicos) e de Jord, a deusa da Terra (também chamada de Midgard ou Gaia), Thor Odinson é o príncipe de um outro mundo existente numa dimensão acima de Midgard, a Terra. Nesse mundo existem outros diversos reinos, como por exemplo, a terra dos gigantes de gelo (Jotunheim e Valhala, o lugar para onde vão os espíritos dos guerreiros que morrem em combate). Trata-se justamente de uma adaptação da mitologia nórdica, traduzida no Universo Marvel como apenas mais uma dimensão paralela.\r\n\r\nOs nove mundos de Asgard são ligados pela Ponte do Arco-Íris (Bifrost), que é guardada por Heimdall, o eterno guardião da ponte. Thor possui um irmão adotivo chamado Loki, o traiçoeiro deus das trapaças e mentiras. Devido à sua má índole e à inveja que sente por Thor, por ser este o filho mais querido de Odin, Loki está sempre a tramar a morte do irmão e a posse de Asgard.', '1498452201595090e95c4be.jpg'),
(49, 5, 'Wolverine', 'O passado de Wolverine sempre foi coberto de mistério. Cobaia de uma experiência governamental (o Programa Arma X) Logan pouco sabe sobre sua vida anterior, pois teve memórias falsas implantadas pelos militares.\r\n\r\nPrograma do governo do qual Logan participou com o codinome Wolverine, no qual inseriram adamantium em seu esqueleto. Após o programa ele perdeu a memória e uma série de eventos o leva a lutar para recuperá-la.\r\n\r\nSó recentemente se descobriu seu verdadeiro nome: James Howlett. Nascido em Alberta, no Canadá, filho de Elisabeth e John Howlett. É irmão mais novo de John Howlett Jr., que "morreu" logo cedo.\r\n\r\nDevido ao seu “Fator de Cura Mutante”, o envelhecimento de Logan é lento. Sabemos que ele lutou na Primeira Guerra Mundial e Segunda Guerra Mundial (ao lado do Capitão América). No livro do autor Hugh Matthews, intitulado "Lifeblood", Wolverine está preso em um campo de concentração na Polônia chamado "Höllenfeuer" (algo como ''Fogo do Inferno''), durante parte da Segunda Guerra Mundial.\r\n\r\nJá tendo atuado como agente secreto da C.I.A. e do Serviço Secreto Canadense, ao cair em desgraça junto a seus superiores, ele foi caçado como uma ameaça, capturado e enviado a custódia de cientistas canadenses, participantes do "Programa Arma X", quando se descobriu que ele era um mutante com fator de regeneração e com garras ósseas retráteis saindo de cada punho. Esse programa, (parte do programa Arma Extra, que pretendia criar máquinas de guerra perfeitas), precisava de "voluntários" para sua técnica de implantes de Adamantium, (um metal fictício, sendo o mais resistente da Terra), no esqueleto humano. Graças ao seu fator de cura, Logan conseguiu sobreviver aos experimentos: o resultado foi que todo o seu esqueleto foi mesclado com o metal experimental.', '149845280659509346b35ce.jpg'),
(50, 5, 'Deadpool', 'Wade Wilson encontrou novas esperanças na forma do Departamento H, uma organização para desenvolvimento de armas especiais do governo canadense. Ele se tornou cobaia de um programa de desenvolvimento super-humano administrado em parceria pelo governo americano e canadense: o Programa Arma X. Seu câncer foi temporariamente detido graças a implantação de um fator de cura derivado de outro agente do Departamento H, o mutante conhecido como Wolverine. A experiência não funcionou conforme o esperado e o tornou mentalmente instável. Wilson passou a fazer parte de uma unidade secreta de combate ao lado do quase invulnerável Sluggo e dos ciborgues Kane e Slayback. Vanessa afiliou-se ao grupo mais tarde, sob o codinome Mímica, pouco depois de descobrir suas habilidades mutantes de metamorfose.\r\n\r\nDurante uma das missões, Wade matou seu companheiro de equipe Slayback. Por causa disso ele foi rejeitado pelo Programa Arma X e enviado a um hospício sob a alegação de que sua condição mental instável era uma ameaça. Entretanto, os pacientes do hospício serviam de cobaias para as excêntricas experiências do doutor Killbrew e seu sádico assistente Francis, que efetuavam torturas indescritíveis. Os pacientes do lugar participavam de um jogo chamado "Deadpool", que consistia em uma aposta para tentar adivinhar quem morreria primeiro devido aos testes.', '1498452873595093896aced.jpg'),
(51, 5, 'Homem-Aranha', 'Em Forest Hills, Queens, Nova York, o estudante de ensino médio, Peter Parker, é um cientista orfão que vive com seu tio Ben e tia May. Conforme ilustrado em Amazing Fantasy #15, ele é mordido por uma aranha radioativa (erroneamente classificado como um inseto no painel) em uma exposição científica e "adquire a agilidade e a força proporcional de um aracnídeo".[45] Junto com a super força, Parker ganha a capacidade de andar nas paredes e tetos. Através de sua habilidade nativa para a ciência, ele desenvolve um aparelho que o permitir lançar teias artificiais. Inicialmente buscando capitalizar suas novas habilidades, Parker cria um traje e, como "Homem-Aranha", torna-se uma estrela de televisão. No entanto, "ele alegremente ignora a chance de parar um ladrão em fuga, e sua indiferença ironicamente o afeta, quando o mesmo criminoso mais tarde rouba e mata seu tio Ben". Homem-Aranha rastreia e prende o assassino; no painel seguinte da história está escrito: "Com grande poderes vêm grandes responsabilidades!".', '14984535395950962330f75.jpg'),
(53, 2, 'Batman', 'A identidade secreta de Batman é Bruce Wayne, um bilionário americano, playboy, magnata de negócios, filantropo e dono da corporação Wayne Enterprises. Depois de testemunhar o assassinato dos seus pais enquanto criança, Wayne jurou vingança contra os criminosos, um juramento moderado por um sentido de justiça. Wayne treina então a si próprio, tanto física como intelectualmente, e cria uma persona inspirada no morcego para combater o crime: Batman.', '1502249229598a810d17895.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `resumo` text NOT NULL,
  `noticia` text NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_usuario_sistema1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_usuario`, `titulo`, `resumo`, `noticia`, `data`, `foto`) VALUES
(46, 7, 'Mulher-Maravilha Conquista o Publico!', 'O Brasil ultrapassou a Inglaterra e agora é a terceira maior bilheteria mundial de Mulher-Maravilha. O primeiro lugar da lista é dos EUA, com US$ 275 milhões, seguido de China, com US$ 83 milhões e Brasil, que soma US$ 23,3 milhões.\r\n\r\nO Reino Unido aparece agora na quarta colocação, com US$ 20,6 milhões, seguido de México (US$ 18,9) e Austrália (US$ 15,2). No total, o longa já faturou US$ 572 milhões em todo o mundo.', 'O Brasil ultrapassou a Inglaterra e agora é a terceira maior bilheteria mundial de Mulher-Maravilha. O primeiro lugar da lista é dos EUA, com US$ 275 milhões, seguido de China, com US$ 83 milhões e Brasil, que soma US$ 23,3 milhões.\r\n\r\nO Reino Unido aparece agora na quarta colocação, com US$ 20,6 milhões, seguido de México (US$ 18,9) e Austrália (US$ 15,2). No total, o longa já faturou US$ 572 milhões em todo o mundo.', '2017-06-20', '149793169959489fb3f36a6.jpg'),
(47, 7, 'Homem aranha - De Volta ao lar', 'Depois de atuar ao lado dos Vingadores, chegou a hora do pequeno Peter Parker (Tom Holland) voltar para casa e para a sua vida, já não mais tão normal. Lutando diariamente contra pequenos crimes nas redondezas, ele pensa ter encontrado a missão de sua vida quando o terrível vilão Abutre (Michael Keaton) surge amedrontando a cidade. O problema é que a tarefa não será tão fácil como ele imaginava.', 'Depois de atuar ao lado dos Vingadores, chegou a hora do pequeno Peter Parker (Tom Holland) voltar para casa e para a sua vida, já não mais tão normal. Lutando diariamente contra pequenos crimes nas redondezas, ele pensa ter encontrado a missão de sua vida quando o terrível vilão Abutre (Michael Keaton) surge amedrontando a cidade. O problema é que a tarefa não será tão fácil como ele imaginava.', '2017-06-20', '14979322645948a1e862b58.jpg'),
(48, 7, 'Thor Ragnarok em Breve!', 'Após os eventos de Vingadores: Era de Ultron, o mundo de Thor está para explodir. Seu maligno irmão, Loki, tomou posse de Asgard e a poderosa Hela surgiu para tomar o trono pra si própria e Thor se tornou prisioneiro do outro lado do universo. Para escapar de seu cativeiro e salvar seu lar da iminente destruição, Thor deve vencer um torneio alienígena mortífero e derrotar seu antigo companheiro e aliado vingador – o Incrível Hulk. [1][2] mais em meio a tudo isso Thor encontra um novo amor Brunnhilde / Valquíria.', 'Após os eventos de Vingadores: Era de Ultron, o mundo de Thor está para explodir. Seu maligno irmão, Loki, tomou posse de Asgard e a poderosa Hela surgiu para tomar o trono pra si própria e Thor se tornou prisioneiro do outro lado do universo. Para escapar de seu cativeiro e salvar seu lar da iminente destruição, Thor deve vencer um torneio alienígena mortífero e derrotar seu antigo companheiro e aliado vingador – o Incrível Hulk. [1][2] mais em meio a tudo isso Thor encontra um novo amor Brunnhilde / Valquíria.', '2017-06-20', '14979337735948a7cdaeb78.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `email`) VALUES
(77, 'raffael', '$2y$10$W7nJWviq4F7UAdrZqb6mlu9ilSx4uXTZjA5LTUfoPOFHOQfMYsTli', 'raffael@gmail.com'),
(80, 'henrique', '$2y$10$EkIRaLV01zY7GhoQyTetTOqPpkJLQAlOcX.pSXaxKjxBev2QHlOMO', 'henrique@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_sistema`
--

CREATE TABLE IF NOT EXISTS `usuario_sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuario_sistema`
--

INSERT INTO `usuario_sistema` (`id`, `nome`, `login`, `senha`) VALUES
(7, 'Raffael', 'raffael', '$2y$10$wAJKHWlLlHzI3GgtQX79SeYlSMuFHltlS5aeWTNmlF5kMzCK45STS'),
(9, 'henrique', 'henrique', '$2y$10$qKRxAnLIWaJFNDJi3mw1TOF4lvKWIiUCGEUE/3f4vmErftWr6lXKC');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_personagens1` FOREIGN KEY (`id_personagens`) REFERENCES `personagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_noticia_usuario_sistema1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario_sistema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `personagens`
--
ALTER TABLE `personagens`
  ADD CONSTRAINT `fk_personagens_categoria1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_usuario_sistema1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario_sistema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
