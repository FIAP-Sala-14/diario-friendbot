-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2021 às 02:27
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sala14`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(190) NOT NULL,
  `tags` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL,
  `date_created` date DEFAULT NULL,
  `author` varchar(40) DEFAULT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `tags`, `content`, `photo`, `status`, `date_created`, `author`, `category`) VALUES
(1, 'Newest Blog and content management', 'blog,php,bootstrap', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div><div>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div><div>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div><div>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div><div>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div><div>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>', 'exemplo.jpg', 'draft', NULL, NULL, '5'),
(2, 'Benefits of livig in this world', 'life,life tips', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div><div>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</div><div>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</div><div>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</div><div>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</div><div>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>', 'exemplo.jpg', 'publish', '2018-04-27', 'admin', '2'),
(3, 'The future of web developement on earth', 'web,development,earth', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<span style=\"font-size: 0.857em;\">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><span style=\"font-size: 0.857em;\">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</span><span style=\"font-size: 0.857em;\">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</span><span style=\"font-size: 0.857em;\">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</span><span style=\"font-size: 0.857em;\">proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>', 'exemplo.jpg', 'publish', '2018-04-27', 'admin', '5'),
(5, 'The challanges of being a writter', 'witting,blogging', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<span style=\"font-size: 0.857em;\">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><span style=\"font-size: 0.857em;\">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</span><span style=\"font-size: 0.857em;\">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</span><span style=\"font-size: 0.857em;\">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</span><span style=\"font-size: 0.857em;\">proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>', 'exemplo.jpg', 'publish', '2018-04-27', 'etemesi', '6'),
(6, 'Why i ventured into writting as a proffesion', 'witting,blogging', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<span style=\"font-size: 0.857em;\">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><span style=\"font-size: 0.857em;\">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</span><span style=\"font-size: 0.857em;\">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</span><span style=\"font-size: 0.857em;\">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</span><span style=\"font-size: 0.857em;\">proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style=\"font-size: 11.0167px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span><span style=\"font-size: 11.0167px;\">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><span style=\"font-size: 11.0167px;\">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</span><span style=\"font-size: 11.0167px;\">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</span><span style=\"font-size: 11.0167px;\">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</span><span style=\"font-size: 11.0167px;\">proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></div>', '30278600_1524856225.jpg', 'draft', '2018-04-27', 'etemesi', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`) VALUES
(1, 'Saúde'),
(2, 'Curiosidades'),
(3, 'Ofertas'),
(4, 'Promoções'),
(5, 'Tecnologia'),
(6, 'Entretenimento');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Índices para tabela `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
