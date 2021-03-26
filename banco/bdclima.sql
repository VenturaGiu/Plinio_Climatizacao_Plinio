-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Mar-2021 às 20:48
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdclima`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id_ba` int(11) NOT NULL,
  `nome_ba` varchar(200) NOT NULL,
  `url_ba` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id_ba`, `nome_ba`, `url_ba`) VALUES
(33, 'e616ac9ae0fa572a9861989611739858_0_.jpg', ''),
(34, '9e438d43e99eec6a3da3bc298134a892_0_.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_ca` int(11) NOT NULL,
  `nome_ca` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_cont` int(11) NOT NULL,
  `tipo_cont` varchar(15) NOT NULL,
  `valor_cont` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_cont`, `tipo_cont`, `valor_cont`) VALUES
(2, '2', 'moveisuniflex@hotmail.com'),
(3, '1', '(11) 994289-3210');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

CREATE TABLE `conteudo` (
  `id_co` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `tipo_co` varchar(15) NOT NULL,
  `titulo_co` varchar(60) NOT NULL,
  `conteudo_co` mediumtext NOT NULL,
  `data_co` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id_ga` int(11) NOT NULL,
  `nome_ga` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id_ga`, `nome_ga`) VALUES
(16, 'Loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_im` int(11) NOT NULL,
  `id_ga` int(11) NOT NULL,
  `nome_im` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_im`, `id_ga`, `nome_im`) VALUES
(142, 16, '23dfb9ed196054fb9337f9529143fd28_0_.jpg'),
(143, 16, 'a36daf190bf6396d2c3edcbd6d6ab0f2_0_.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pragas`
--

CREATE TABLE `pragas` (
  `id_pr` int(11) NOT NULL,
  `nome_pr` varchar(50) NOT NULL,
  `url_pr` varchar(120) NOT NULL,
  `imagem_pr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pragas`
--

INSERT INTO `pragas` (`id_pr`, `nome_pr`, `url_pr`, `imagem_pr`) VALUES
(20, 'Instalação', '#', '7be52a7b2abe4d3640ee108ff3444e72__.jpg'),
(22, 'Higienização', '#', 'dc0e3e8e2d5ed06565f5b81ada0c1028__.jpg'),
(23, 'Assistência Técnica', '#', '4b187019768e424aa7b8ebdaa4dee920__.jpg'),
(24, 'Manutenção', '#', 'f1609b836150b4cfaac2815f6a3b5070__.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_pr` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL,
  `nome_pr` varchar(120) NOT NULL,
  `descricao_pr` mediumtext NOT NULL,
  `valor_pr` varchar(20) NOT NULL,
  `botaopg_pr` mediumtext NOT NULL,
  `imagem_pr` varchar(50) NOT NULL,
  `destaque_pr` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_se` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL,
  `titulo_se` varchar(120) NOT NULL,
  `subtitulo_se` varchar(120) NOT NULL,
  `imagem_se` varchar(50) NOT NULL,
  `conteudo_se` mediumtext NOT NULL,
  `data_se` timestamp NOT NULL DEFAULT current_timestamp(),
  `destaque_se` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_se`, `id_ca`, `titulo_se`, `subtitulo_se`, `imagem_se`, `conteudo_se`, `data_se`, `destaque_se`) VALUES
(35, 1, 'Manutenção', 'Manutenção', 'd508cc67a26d6280c53e915b6c3d3aa8__.jpg', '<p style=&#34;text-align: justify;&#34;><strong>MANUTEN&Ccedil;&Atilde;O PREVENTIVA:</strong> Mantenha a manuten&ccedil;&atilde;o do seu aparelho em dia para prevenir danos futuros e ter um melhor desempenho do produto.</p>\r\n<p style=&#34;text-align: justify;&#34;><strong> MANUTEN&Ccedil;&Atilde;O CORRETIVA:</strong> Caso o aparelho n&atilde;o esteja funcionando corretamente temos uma equipe t&eacute;cnica preparada para resolver o problema de uma forma efici&ecirc;nte, respons&aacute;vele com qualidade.</p>', '2020-04-27 01:23:48', 0),
(36, 1, 'Higienização', 'Higienização', 'a61ea37f0c319a03cbbc9aae1050eb74__.jpg', '<p style=&#34;text-align: justify;&#34;>Mantenha seu aparelho sempre limpo para evitar poeira e a prolifera&ccedil;&atilde;o de fungos e bact&eacute;rias ou causar um mau funcionamento futuro.</p>', '2020-04-27 01:53:55', 0),
(37, 1, 'Instalação', 'Instalação', '7bbf881101e0ceef21ae8723a4e3aa28__.jpg', '<p style=&#34;text-align: justify;&#34;>Instale seu aparelho com equipe credenciada aumentando a garantia do seu equipamento e garantido um bom funcionamento.</p>', '2020-04-27 01:56:03', 0),
(38, 1, 'Assistência Técnica', 'Assistência Técnica', 'caaa9ac958ad3f6f4b6c9a66af539ee6__.jpg', '<p style=&#34;text-align: justify;&#34;>Se seu equipamento der defeito temos uma equipe qualificada pronta para resolver o problema, trabalhado com efici&ecirc;ncia e rapidez para proporciona o seu conforto e satisfa&ccedil;&atilde;o.</p>', '2020-04-27 01:58:31', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `textos`
--

CREATE TABLE `textos` (
  `pagina` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `conteudo` mediumtext NOT NULL,
  `titulo` varchar(120) NOT NULL DEFAULT 'Sem Titulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `textos`
--

INSERT INTO `textos` (`pagina`, `nome`, `conteudo`, `titulo`) VALUES
('contato', 'textocontato', '', 'Sem Titulo'),
('contato', 'mapa', '<iframe src=&#34;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.5797106333266!2d-46.36271398447677!3d-23.511643265644373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce7b350e7d336b%3A0x62f0e98ca4640a3c!2sR.%20Felipe%20Camar%C3%A3o%2C%20381%20-%20Vila%20Aurea%2C%20Po%C3%A1%20-%20SP%2C%2008555-000!5e0!3m2!1spt-BR!2sbr!4v1587670233207!5m2!1spt-BR!2sbr&#34; width=&#34;600&#34; height=&#34;450&#34; frameborder=&#34;0&#34; style=&#34;border:0;&#34; allowfullscreen=&#34;&#34; aria-hidden=&#34;false&#34; tabindex=&#34;0&#34;></iframe>', 'Sem Titulo'),
('contato', 'endereco', 'Rua Felipe Camarão, 381- CEP 08555-000 - Vila Áurea, Poá/SP', 'Sem Titulo'),
('home', 'textohome1', '<center>A Climatização é uma empresa conceituada no mercado de refrigeração e \nclimatização. \nSomos especializados nas áreas: comercial, industrial e residencial. Nosso \nfoco é atender todas as necessidades de todos os nossos clientes sempre \ncom muita dedicação, honestidade e qualidade de serviço. \n</center>', 'Quem somos'),
('empresa', 'textoempresa', '<p style=&#34;text-align: center;&#34;>A Climatiza&ccedil;&atilde;o &eacute; uma empresa conceituada no mercado de refrigera&ccedil;&atilde;o e climatiza&ccedil;&atilde;o. Somos especializados nas &aacute;reas: comercial, industrial e residencial.</p>\n<p style=&#34;text-align: center;&#34;>Nosso foco &eacute; atender todas as necessidades de todos os nossos clientes sempre com muita dedica&ccedil;&atilde;o, honestidade e qualidade de servi&ccedil;o.</p>', 'Sem Titulo'),
('empresa', 'fraseempresa', '', 'Sem Titulo'),
('empresa', 'missao', 'Fornecer soluções de excelência em serviços de instalações, climatização, manutenção, higienização e assistência técnica de ares condicionados.', 'MISSÃO'),
('empresa', 'visao', 'Ser referência em instalação e manutenção de sistemas de ar condicionado, superando as expectativas dos clientes estando a frente na liderança do mercado.', 'VISÃO'),
('empresa', 'valores', 'Compromisso, credibilidade, ética, eficiência, profissionalismo, rapidez e transparência.', 'VALORES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_us` int(11) NOT NULL,
  `nome_us` varchar(60) NOT NULL,
  `usuario_us` varchar(32) NOT NULL,
  `email_us` varchar(80) NOT NULL,
  `senha_us` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_us`, `nome_us`, `usuario_us`, `email_us`, `senha_us`) VALUES
(1, 'Administrador', 'admin', 'admin@example.com', '7751a23fa55170a57e90374df13a3ab78efe0e99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id_vi` int(11) NOT NULL,
  `nome_vi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_ba`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_ca`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_cont`);

--
-- Índices para tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_co`);

--
-- Índices para tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_ga`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_im`);

--
-- Índices para tabela `pragas`
--
ALTER TABLE `pragas`
  ADD PRIMARY KEY (`id_pr`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_pr`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_se`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_us`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_vi`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id_ba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_ca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_ga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_im` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de tabela `pragas`
--
ALTER TABLE `pragas`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_se` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id_vi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
