-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Ago-2019 às 11:34
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

CREATE TABLE `convidado` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `instituicao` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `img_convidado` varchar(55) NOT NULL,
  `desc_convidado` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `convidado`
--

INSERT INTO `convidado` (`id`, `nome`, `instituicao`, `email`, `area`, `img_convidado`, `desc_convidado`) VALUES
(1, 'Arnaldo MontAlvão', 'ifms', 'arnaldo.montalvao@ifms.edu.br', 'Letras', 'arnaldo.jpg', 'Professor do Instituto Federal de Educação, Ciência e Tecnologia de Mato Grosso do Sul (IFMS) campus Campo Grande, docente no programa de Mestrado Profissional em Educação Profissional e Tecnológica (ProfEPT). '),
(2, 'Fernando Dessoti', 'ifms', 'fernando.dessoti@ifms.edu.br', 'Fisica', 'dessoti.jpg', 'professor substituto de Física do IFMS campus de Campo Grande/MS. Possui doutorado sanduíche pelo Programa de Pós-Graduação em Ciência dos Materiais - Física da Matéria Condensada e Institut für Theoretische Physik, Universität Düsseldorf, sendo bolsista CAPES/CNPq.'),
(3, 'Jiyan Yari', 'ifms', 'jiyan.yari@ifms.edu.br', 'informatica', 'jiyan.jpg', 'Gestor de Projetos Tecnológicos no Governo do Estado de Mato Grosso do Sul na Superintendência de Ciência e Tecnologia - SUCT-MS (2000-2004) Professor/pesquisador parceiro no Centro Tecnológico de Eletrônica e Informática de MS no projeto de Supercomputação Multicomputadores Beowulf. '),
(4, 'Aislan Melo', 'ifms', 'aislan.melo@ifms.edu.br', 'Sociologia', 'aislan.png', 'Possui graduação (2001) e Mestrado (2004) em Ciências Sociais, ambos, pela Universidade Estadual Paulista \"Júlio de Mesquita Filho\" - UNESP e, atualmente, cursa Doutorado em Saúde e Desenvolvimento na Região Centro Oeste (UFMS).'),
(5, 'Rafael', 'ifms', '', 'Historia', '', 'Pesquisador na area de Hisotoria'),
(6, 'Luis Lomba', 'ifms', 'Luis.Lomba@ifms.edu.br', 'Informatica', 'lomba.jpg', 'Possui graduação em Sistemas de Informação (Bacharelado e Licenciatura) pela UENP - Universidade Estadual do Norte do Paraná (2007). Especialização em Gestão de Negócios pela UNOPAR - Universidade do Norte do Paraná (2008), Especialização em Gestão Educacional pela UEPG - Universidade Estadual de Ponta Grossa (2010) e Mestrado em Computação Aplicada pela Universidade Federal de Mato Grosso do Sul (2015).'),
(7, 'João Okumoto', 'ifms', 'joao.cesar@ifms.edu.br', 'Eletrotecnica', '', 'Possui graduação, especialização e mestrado em Engenharia Elétrica pela Universidade Federal de Mato Grosso do Sul. Atuou como técnico de nível superior - engenheiro eletricista - no Tribunal de Justiça de Mato Grosso do Sul e professor da Universidade Católica Dom Bosco. '),
(8, 'Cláudia Santos Fernandes', 'ifms', 'claudia.fernandes@ifms.edu.br', 'informatica', 'claudia.jpg', 'Possui graduação em Licenciatura em Letras 1o Grau pela Universidade do Oeste Paulista (1991), graduação em Bacharelado Em Ciência da Computação pela Universidade do Oeste Paulista (1994), mestrado em Educação pela Universidade do Oeste Paulista (1999) e mestrado em Ciência da Computação pela Universidade Federal do Rio Grande do Sul (2001).'),
(9, 'Marta Luzzi', 'ifms', 'marta.luzzi@ifms.edu.br', 'Letras', 'Marta.png', 'Mestre em letras pelo programa de pós-graduação \"Strito sensu\" em Letras da Universidade Estadual do Mato Grosso do Sul - UEMS /Campo Grande que tem como linha de pesquisa o Ensino de Linguagem. Pós-graduada em letras \"Latu Sensu \" Metodologia do Ensino de Língua Portuguesa e suas Literaturas pela Faculdade Integrada de Ponta Porã - FAP em 2004. Graduada em Letras - Faculdades Integradas de Ponta Porã (UNIDERP) 2002. ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `podcast`
--

CREATE TABLE `podcast` (
  `id` int(11) NOT NULL,
  `youtube` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `link_img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `podcast`
--

INSERT INTO `podcast` (`id`, `youtube`, `descricao`, `titulo`, `data`, `link_img`) VALUES
(1, 'QakhPNQV0ik', 'Primeiro podcast do Science Talk. Vamos começar falando de como funciona a vida de quem quer se aventurar na carreira das ciências. Prepara um lanche, coisa leve pra não engordar e vem com a gente!', 'Vida de pesquisador', '2019-03-23', 'v.png'),
(2, '3YHAh3QTXbQ', 'Olá! Seja bem vindo ao Science Talk, hoje falaremos sobre como as fake news estão presentes no nosso dia a dia e no meio acadêmico. Prepara um lanche, coisa leve pra não engordar e vem com a gente!', 'Fake News', '2019-03-19', 'n.png'),
(3, '4SEKHf7_EAE', 'Olá! Seja bem vindo ao Science Talk, hoje falaremos sobre NUAR (Núcleo de animação e roteiro) realizado no IFMS, juntamente falaremos de como funciona o mundo da animação e roteiro. Prepara um lanche, coisa leve pra não engordar e vem com a gente!', 'NUAR', '2019-03-28', 'k.png'),
(4, 'R9n3_aMpobM', 'Olá! Seja bem vindo ao Science Talk, hoje falaremos sobre IF MAKER juntamente também sobre Tecnologia no Brasil. Prepara um lanche, coisa leve pra não engordar e vem com a gente!', 'IF Maker', '2019-03-05', 'f.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `podcast_convidado`
--

CREATE TABLE `podcast_convidado` (
  `id_podcast_conv` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `convidado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `podcast_convidado`
--

INSERT INTO `podcast_convidado` (`id_podcast_conv`, `podcast_id`, `convidado_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 3, 7),
(8, 4, 8),
(9, 4, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `podcast_tema`
--

CREATE TABLE `podcast_tema` (
  `id_podcast_tema` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `podcast_tema`
--

INSERT INTO `podcast_tema` (`id_podcast_tema`, `podcast_id`, `tema_id`) VALUES
(1, 1, 2),
(2, 1, 7),
(3, 1, 8),
(4, 1, 9),
(5, 1, 10),
(6, 1, 12),
(7, 2, 1),
(8, 2, 2),
(9, 2, 7),
(10, 2, 8),
(11, 2, 11),
(12, 2, 12),
(13, 3, 2),
(14, 3, 7),
(15, 4, 2),
(16, 4, 5),
(17, 4, 7),
(18, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`id`, `descricao`) VALUES
(1, 'Politica '),
(2, 'Educação'),
(5, 'Eletrotécnica'),
(6, 'Mecânica'),
(7, 'Tecnologia'),
(8, 'Brasil'),
(9, 'Ciências Exatas '),
(10, 'Ciências Humanas'),
(11, 'Economia '),
(12, 'Internacional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convidado`
--
ALTER TABLE `convidado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast_convidado`
--
ALTER TABLE `podcast_convidado`
  ADD PRIMARY KEY (`id_podcast_conv`,`podcast_id`,`convidado_id`);

--
-- Indexes for table `podcast_tema`
--
ALTER TABLE `podcast_tema`
  ADD PRIMARY KEY (`id_podcast_tema`,`podcast_id`,`tema_id`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `convidado`
--
ALTER TABLE `convidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `podcast_convidado`
--
ALTER TABLE `podcast_convidado`
  MODIFY `id_podcast_conv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `podcast_tema`
--
ALTER TABLE `podcast_tema`
  MODIFY `id_podcast_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
