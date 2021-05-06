-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Maio-2021 às 23:07
-- Versão do servidor: 5.7.33-0ubuntu0.18.04.1
-- versão do PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(11, 'Lindos e Sensuais'),
(24, 'Skateboarders'),
(25, 'Football / Soccer'),
(26, 'Sexy Girls'),
(27, 'Games');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_content` text CHARACTER SET utf8 NOT NULL,
  `comment_status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(17, 12, 'Rodrigão BR', 'rod@mail.com', 'Messi é melhor que CR7.', 'unapproved', '2021-01-01'),
(18, 12, 'Tiago Lemes Palhano Bordin', 'tiago@mail.com', 'Olá, tenho uma dúvida. Por que os instrutores não respondem às perguntas feitas pelos alunos?', 'approved', '2021-01-01'),
(19, 12, 'Joanne', 'joa345@email.com', 'This is a piece of comment by Joanne...', 'approved', '2021-01-01'),
(20, 11, 'Mariana', 'mary@lindinha.com', 'Olá, seu lindo! Estou doidinha para te conhecer! Me liga!', 'approved', '2021-01-01'),
(21, 13, 'Tony Hawk', 'tony@skate.com', 'Hi Rod! You are awesome!', 'approved', '2021-01-01'),
(22, 18, 'Kamilla', 'kamillinh@hotmail.com', 'Nossa, genti! Eu amo Zelda! Continuem com o bom trabalho! S2', 'unapproved', '2021-01-01'),
(23, 21, 'Lars Ulrich', 'lars@metallica.rock', 'Eu diria que cinco são melhores que duas!', 'approved', '2021-01-02'),
(24, 23, 'Drogba', 'drogba@chelsea.com', 'Esta foto do Lionel é muito legal!', 'approved', '2021-01-03'),
(25, 23, 'Maradona', 'diego@boca.com', 'Me gusta est chico!', 'approved', '2021-01-04'),
(26, 36, 'Lars Ulrich', 'lars@metallica.rock', 'Que loira hein meu guri!', 'approved', '2021-01-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text CHARACTER SET utf8 NOT NULL,
  `post_content` text CHARACTER SET utf8 NOT NULL,
  `post_tags` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) CHARACTER SET utf8 DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(12, 25, 'CR7', 'CR7', '2020-12-30', 'cr7.jpeg', 'CR7 is better than Messi.			\r\n					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'soccer, football, sports, portugal', 0, 'Published'),
(13, 24, 'Rodney Mullen, The Legend, The Mith', 'Tiago Bordin', '2020-12-30', 'rod.jpeg', 'Rodney is one the the best skaters of all time.			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'skate, fun', 0, 'Published'),
(14, 26, 'Sexy', 'James', '2020-12-30', 'sexy.gif', 'This girl is really sexy.			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n		', 'sexy, blonde, girl', 0, 'Published'),
(15, 26, 'Happy Blonde Girl', 'Potter', '2020-12-30', 'girl on beach.gif', 'This beach is awesome!			\r\n					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n					\r\n					\r\n					\r\n					\r\n		', 'photo, girl, beach', 0, 'Published'),
(16, 26, 'Boobs', 'Mario Mario', '2020-12-31', 'sexy-2.gif', '<p>Boobs are really awesome! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'boobs, tits, sexy, girl', 0, 'Published'),
(17, 27, 'Mario', 'Mario Mario', '2020-12-31', 'mario.jpeg', 'Mario is amazing!			\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n		', 'mario, nintendo, games', 0, 'Published'),
(18, 27, 'Zelda Story', 'Link', '2020-12-31', 'zelda-2.jpeg', 'I really love Princess Zelda!!!			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'zelda, link, ganon, nintendo', 0, 'Published'),
(20, 26, 'Carolina, a Menina Linda', 'Kirk Wammet', '2020-12-31', 'brunette.gif', 'Carolina, a menina mais linda do Brasil, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.			\r\n					\r\n		', 'girl, linda, brunette', 0, 'Published'),
(21, 26, 'Two is Better Than One', 'Lemmy Kilmister', '2020-12-31', 'girls-2.gif', 'Duas sÃ£o melhores do que sÃ³ uma, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.			\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n		', 'girls, brunette, two, pair', 0, 'Published'),
(22, 24, 'Tony Hawk, a Living Legend', 'Steve Berra', '2021-01-02', 'tony.jpg', '<h2>Tony Hawk in more than a Skateboarder, he is a Mith, a living legend&nbsp;</h2><h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>', 'tony, hawk, skate, legend, vertical, sports', 4, 'Published'),
(23, 25, 'Messi, a Football God', 'Neymar Jr.', '2021-01-02', 'messi.gif', '<h4>Messi Ã© o melhor que jÃ¡ houve,&nbsp;</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'messi, soccer, football, sports', 4, 'Published'),
(27, 11, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-01-05', 'girls.gif', '<p>tretretertretert</p><p>&nbsp;</p>', 'tony, hawk, skate, legend, vertical, sports', 4, 'Published'),
(28, 11, 'Atividade de Ã‰tica - Primeira Semana', 'Neymar Jr.', '2021-01-05', 'messi.jpg', '<p>treter</p>', 'messi, soccer, football, sports', 4, 'Published'),
(29, 26, 'Carta para si mesmo, Tiago Lemes P. Bordin', 'Steve Berra', '2021-01-05', 'mario.jpeg', '<p>tretre</p>', 'tony, hawk, skate, legend, vertical, sports', 4, 'Published'),
(32, 24, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-01-05', 'skate.jpeg', '<h2><strong>Skate</strong></h2><h3><strong>Legal</strong></h3><p><i>Yeah!</i></p><p>&nbsp;</p>', 'messi, soccer, football, sports', 4, 'Published'),
(40, 11, 'Loira Linda', 'Tiago GatÃ£o', '2021-05-05', 'sexy.gif', '<p>Yeah, a loira sabe o que faz!!!</p>', 'linda, loira, gostosa', 0, 'Draft'),
(42, 24, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-05-05', 'skate.jpeg', '<h2><strong>Skate</strong></h2><h3><strong>Legal</strong></h3><p><i>Yeah!</i></p><p>&nbsp;</p>', 'messi, soccer, football, sports', 0, 'Draft'),
(43, 24, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-05-05', 'skate.jpeg', '<h2><strong>Skate</strong></h2><h3><strong>Legal</strong></h3><p><i>Yeah!</i></p><p>&nbsp;</p>', 'messi, soccer, football, sports', 0, 'Draft'),
(44, 11, 'Loira Linda', 'Tiago GatÃ£o', '2021-05-05', 'sexy.gif', '<p>Yeah, a loira sabe o que faz!!!</p>', 'linda, loira, gostosa', 0, 'Draft'),
(45, 24, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-05-05', 'skate.jpeg', '<h2><strong>Skate</strong></h2><h3><strong>Legal</strong></h3><p><i>Yeah!</i></p><p>&nbsp;</p>', 'messi, soccer, football, sports', 0, 'Draft'),
(46, 26, 'Carta para si mesmo, Tiago Lemes P. Bordin', 'Steve Berra', '2021-05-05', 'mario.jpeg', '<p>tretre</p>', 'tony, hawk, skate, legend, vertical, sports', 0, 'Draft'),
(47, 11, 'Atividade de Ã‰tica - Primeira Semana', 'Neymar Jr.', '2021-05-05', 'messi.jpg', '<p>treter</p>', 'messi, soccer, football, sports', 0, 'Draft'),
(48, 11, 'Atividade de Ã‰tica - Primeira Semana', 'Steve Berra', '2021-05-05', 'girls.gif', '<p>tretretertretert</p><p>&nbsp;</p>', 'tony, hawk, skate, legend, vertical, sports', 0, 'Draft'),
(49, 25, 'Messi, a Football God', 'Neymar Jr.', '2021-05-05', 'messi.gif', '<h4>Messi Ã© o melhor que jÃ¡ houve,&nbsp;</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'messi, soccer, football, sports', 0, 'Draft'),
(50, 24, 'Tony Hawk, a Living Legend', 'Steve Berra', '2021-05-05', 'tony.jpg', '<h2>Tony Hawk in more than a Skateboarder, he is a Mith, a living legend&nbsp;</h2><h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>', 'tony, hawk, skate, legend, vertical, sports', 0, 'Draft'),
(51, 26, 'Two is Better Than One', 'Lemmy Kilmister', '2021-05-05', 'girls-2.gif', 'Duas sÃ£o melhores do que sÃ³ uma, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.			\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n					\r\n		', 'girls, brunette, two, pair', 0, 'Draft'),
(52, 26, 'Carolina, a Menina Linda', 'Kirk Wammet', '2021-05-05', 'brunette.gif', 'Carolina, a menina mais linda do Brasil, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.			\r\n					\r\n		', 'girl, linda, brunette', 0, 'Draft'),
(53, 27, 'Zelda Story', 'Link', '2021-05-05', 'zelda-2.jpeg', 'I really love Princess Zelda!!!			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'zelda, link, ganon, nintendo', 0, 'Draft'),
(54, 27, 'Mario', 'Mario Mario', '2021-05-05', 'mario.jpeg', 'Mario is amazing!			\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n		', 'mario, nintendo, games', 0, 'Draft'),
(55, 26, 'Boobs', 'Mario Mario', '2021-05-05', 'sexy-2.gif', '<p>Boobs are really awesome! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'boobs, tits, sexy, girl', 0, 'Draft'),
(56, 26, 'Happy Blonde Girl', 'Potter', '2021-05-05', 'girl on beach.gif', 'This beach is awesome!			\r\n					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n					\r\n					\r\n					\r\n					\r\n		', 'photo, girl, beach', 0, 'Draft'),
(57, 26, 'Sexy', 'James', '2021-05-05', 'sexy.gif', 'This girl is really sexy.			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n		', 'sexy, blonde, girl', 0, 'Draft'),
(58, 24, 'Rodney Mullen, The Legend, The Mith', 'Tiago Bordin', '2021-05-05', 'rod.jpeg', 'Rodney is one the the best skaters of all time.			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'skate, fun', 0, 'Draft'),
(59, 25, 'CR7', 'CR7', '2021-05-05', 'cr7.jpeg', 'CR7 is better than Messi.			\r\n					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n					\r\n					\r\n					\r\n		', 'soccer, football, sports, portugal', 0, 'Draft');

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_category_id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `service_content` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`service_id`, `service_category_id`, `service_title`, `service_image`, `service_content`) VALUES
(2, 2, 'Skate', 'girls.gif', '<p>skateboard forever</p>'),
(3, 1, 'Limpeza sensual', 'limpeza.jpeg', '<p>Gatinhas limpando carros de maneira muito sexy!</p>'),
(4, 3, 'strip', 'brunette.gif', '<p>Digite seu texto aqui...</p>'),
(5, 2, 'tertrert', 'tiago4.jpg', '<p>Digite seu texto aqui...</p>'),
(6, 1, 'opoppoopopoppo', 'carro.jpg', '<p>opopopopopopopopop</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `service_categories`
--

CREATE TABLE `service_categories` (
  `service_cat_id` int(11) NOT NULL,
  `service_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `service_categories`
--

INSERT INTO `service_categories` (`service_cat_id`, `service_cat_name`) VALUES
(1, 'limpeza'),
(2, 'strip tease');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` text NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `rand_salt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `first_name`, `last_name`, `user_email`, `user_image`, `user_role`, `rand_salt`) VALUES
(1, 'rico', '123', 'Rico', 'Suave', 'ricosuave@email.com', '', 'admin', ''),
(3, 'mary', '123', 'Marianne', 'Silva Santos', 'marianne@email.com', '', 'subscriber', ''),
(5, 'samus_aran123', '123456', 'Samus12', 'Aran12', 'samus@metroid.com1', '', 'admin', ''),
(7, 'Princess Peach456', '123456', 'Peach456', 'Toadstool456', 'peach@mario.com456', '', 'admin', ''),
(11, 'Messi', '123', 'Lionel', 'Messi', 'messi@barcelona.com', '', 'subscriber', ''),
(12, 'james', '123', 'james', 'hunt', 'james@f1.com', '', 'admin', ''),
(13, 'niki', '123', 'Nicolas', 'Lauda', 'niki@ferrari.com', '', 'admin', ''),
(14, 'senna', '123', 'Ayrton', 'Silva', 'senna@f1.com', '', 'admin', ''),
(15, 'joey', '123', 'Joey', 'Ramone', 'joey@ramones.com', '', 'admin', ''),
(16, 'axl', '123', 'Axl', 'Rose', 'axl@guns.com', '', 'admin', ''),
(17, 'kurt', '123', 'Kurt', 'Cobain', 'kurt@nirvana.com', '', 'admin', ''),
(18, 'whatever', 'whatever', 'whatever', 'whatever', 'whatever@whatever.com', '', 'admin', ''),
(23, 'fefe', 'fefe', 'fefe', 'fefe', 'fefe@fefe', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(31, 'tiagogostoso', 'tiagogostoso', 'tiago', 'tiago', 'tiago@gostoso.com', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(34, 'natasha_santos', '123456', NULL, NULL, 'natasha_gostosinha@gmail.com', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(35, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(36, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(37, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(38, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(39, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(40, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(41, 'cxar', 'iioujoi', NULL, NULL, 'hihui@Uihhuihui', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(42, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(43, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(44, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(45, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(46, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(47, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(48, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(49, 'huihhiuj', 'tyuuyt', NULL, NULL, 'yuyut@tyutyutyu', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(50, 'ttyutyutyu', 'khjkhjkhkjh', NULL, NULL, 'tytyutyu@bbnbnmbnm', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(51, 'karla', 'kakskjfgiohsjiofubgoinoiuwef86d54g564sdf564g&*&B7869', NULL, NULL, 'kaka@kakakakak', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Índices para tabela `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`service_cat_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `service_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
