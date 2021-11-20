-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19-Nov-2021 às 20:24
-- Versão do servidor: 5.7.35-0ubuntu0.18.04.1
-- versão do PHP: 7.4.22

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
(11, 'Back End'),
(30, 'Front End'),
(31, 'Databases');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `post_author_id` int(11) DEFAULT NULL,
  `post_date` date NOT NULL,
  `post_image` text CHARACTER SET utf8 NOT NULL,
  `post_content` text CHARACTER SET utf8 NOT NULL,
  `post_tags` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) CHARACTER SET utf8 DEFAULT 'Draft',
  `post_views_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_author_id`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(591, 11, 'Lorem Ipsum', '', 66, '2021-10-31', 'php.svg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dui eros, lobortis vel varius quis, posuere at ante. Etiam justo ex, rutrum nec turpis id, consequat tristique orci. Praesent commodo at arcu a sodales. Aliquam sit amet fringilla tellus. Sed nec auctor augue. Vivamus id ligula sollicitudin, viverra lectus sed, interdum turpis. Praesent elementum justo orci. Proin eu enim tincidunt, convallis nunc efficitur, sollicitudin mauris. Nam et euismod magna. Duis congue urna turpis, nec ullamcorper leo mollis nec. Integer blandit odio vitae ex cursus aliquet.</p><p>Nullam sed velit ac quam semper pretium sit amet non mi. Fusce quis lacinia neque. Mauris quam ex, sagittis vitae nisi in, pellentesque hendrerit ipsum. Maecenas ut fringilla nulla. Nullam maximus, purus ut imperdiet consectetur, nisl risus rhoncus metus, vitae rutrum odio justo id odio. Nulla semper mi sit amet arcu dictum dignissim. Ut lobortis ante purus, non vestibulum ligula faucibus in. Morbi pharetra pharetra diam et iaculis. Vivamus pellentesque sit amet tortor nec tincidunt. Curabitur sed ipsum purus. Phasellus id rutrum est, et finibus tortor. Morbi nec leo gravida, tincidunt eros consequat, facilisis erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p><p>Sed varius eu lacus tempus mattis. Fusce sed metus velit. Donec ut lobortis augue. Integer egestas porta eleifend. Pellentesque vitae risus sit amet elit finibus pharetra. Etiam metus ante, hendrerit et tincidunt cursus, varius vitae ante. Nullam sed dapibus sapien, eget molestie ex. Maecenas id eros at augue cursus interdum a eu nibh. Etiam gravida rutrum orci id ullamcorper. Sed sit amet magna est. Suspendisse ac neque tempor, vulputate dolor nec, sollicitudin lacus. Suspendisse pharetra justo sit amet erat sodales, vel mollis felis ultrices. Vivamus malesuada molestie molestie. Pellentesque porta convallis justo ac porta. Nulla malesuada massa in odio hendrerit, vel pretium leo pretium. Etiam pretium nisl ut dolor facilisis, sed suscipit libero fringilla.</p>', 'lorem, ipsum, dolor, sit, amet', 4, 'Published', 1),
(592, 11, 'Python', NULL, 66, '2021-11-02', 'python.jpg', '<p>Nullam sed velit ac quam semper pretium sit amet non mi. Fusce quis lacinia neque. Mauris quam ex, sagittis vitae nisi in, pellentesque hendrerit ipsum. Maecenas ut fringilla nulla. Nullam maximus, purus ut imperdiet consectetur, nisl risus rhoncus metus, vitae rutrum odio justo id odio. Nulla semper mi sit amet arcu dictum dignissim. Ut lobortis ante purus, non vestibulum ligula faucibus in. Morbi pharetra pharetra diam et iaculis. Vivamus pellentesque sit amet tortor nec tincidunt. Curabitur sed ipsum purus. Phasellus id rutrum est, et finibus tortor. Morbi nec leo gravida, tincidunt eros consequat, facilisis erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p><p>Sed varius eu lacus tempus mattis. Fusce sed metus velit. Donec ut lobortis augue. Integer egestas porta eleifend. Pellentesque vitae risus sit amet elit finibus pharetra. Etiam metus ante, hendrerit et tincidunt cursus, varius vitae ante. Nullam sed dapibus sapien, eget molestie ex. Maecenas id eros at augue cursus interdum a eu nibh. Etiam gravida rutrum orci id ullamcorper. Sed sit amet magna est. Suspendisse ac neque tempor, vulputate dolor nec, sollicitudin lacus. Suspendisse pharetra justo sit amet erat sodales, vel mollis felis ultrices. Vivamus malesuada molestie molestie. Pellentesque porta convallis justo ac porta. Nulla malesuada massa in odio hendrerit, vel pretium leo pretium. Etiam pretium nisl ut dolor facilisis, sed suscipit libero fringilla.</p><p>Nullam rutrum luctus nibh ac pulvinar. In hac habitasse platea dictumst. Nulla risus lorem, consequat tincidunt viverra imperdiet, gravida in est. Ut a dui eget purus sollicitudin porta. Maecenas interdum purus id ante efficitur, id placerat ex blandit. Morbi ac aliquet sapien. Nullam sit amet commodo ipsum. Aenean tortor urna, vulputate eget mauris eu, scelerisque eleifend lorem. In quis interdum est. Nulla a maximus sem, scelerisque faucibus ligula.</p>', 'python', 4, 'Published', 0),
(593, 30, 'JavaScript', NULL, 72, '2021-11-02', 'javascript.png', '<p>Nullam rutrum luctus nibh ac pulvinar. In hac habitasse platea dictumst. Nulla risus lorem, consequat tincidunt viverra imperdiet, gravida in est. Ut a dui eget purus sollicitudin porta. Maecenas interdum purus id ante efficitur, id placerat ex blandit. Morbi ac aliquet sapien. Nullam sit amet commodo ipsum. Aenean tortor urna, vulputate eget mauris eu, scelerisque eleifend lorem. In quis interdum est. Nulla a maximus sem, scelerisque faucibus ligula.</p><p>Phasellus bibendum erat et enim malesuada, at ullamcorper nisl scelerisque. Pellentesque tortor quam, varius malesuada felis sit amet, egestas lacinia sem. Aenean porta faucibus risus, non ullamcorper nisi molestie vitae. Suspendisse in elit ac ex interdum interdum a ut dolor. Donec condimentum nulla ut metus pulvinar tristique at quis felis. Sed quis erat luctus purus fermentum fringilla vitae id felis. Nulla nec justo leo. Proin ac velit felis. Quisque accumsan quam sapien, sit amet suscipit justo semper nec. In dui leo, sagittis in tortor vitae, facilisis facilisis neque. Cras bibendum sollicitudin elit quis finibus. Maecenas imperdiet condimentum vestibulum.</p>', 'javascript, frontend, web', 4, 'Draft', 0),
(594, 30, 'CSS', NULL, 72, '2021-11-02', 'css.png', '<p>Phasellus bibendum erat et enim malesuada, at ullamcorper nisl scelerisque. Pellentesque tortor quam, varius malesuada felis sit amet, egestas lacinia sem. Aenean porta faucibus risus, non ullamcorper nisi molestie vitae. Suspendisse in elit ac ex interdum interdum a ut dolor. Donec condimentum nulla ut metus pulvinar tristique at quis felis. Sed quis erat luctus purus fermentum fringilla vitae id felis. Nulla nec justo leo. Proin ac velit felis. Quisque accumsan quam sapien, sit amet suscipit justo semper nec. In dui leo, sagittis in tortor vitae, facilisis facilisis neque. Cras bibendum sollicitudin elit quis finibus. Maecenas imperdiet condimentum vestibulum.</p><p>Nullam rutrum luctus nibh ac pulvinar. In hac habitasse platea dictumst. Nulla risus lorem, consequat tincidunt viverra imperdiet, gravida in est. Ut a dui eget purus sollicitudin porta. Maecenas interdum purus id ante efficitur, id placerat ex blandit. Morbi ac aliquet sapien. Nullam sit amet commodo ipsum. Aenean tortor urna, vulputate eget mauris eu, scelerisque eleifend lorem. In quis interdum est. Nulla a maximus sem, scelerisque faucibus ligula.</p>', 'css, frontend, web, development', 4, 'Published', 0),
(595, 31, 'SQL', NULL, 72, '2021-11-02', 'sql.png', '<p>Nullam sed velit ac quam semper pretium sit amet non mi. Fusce quis lacinia neque. Mauris quam ex, sagittis vitae nisi in, pellentesque hendrerit ipsum. Maecenas ut fringilla nulla. Nullam maximus, purus ut imperdiet consectetur, nisl risus rhoncus metus, vitae rutrum odio justo id odio. Nulla semper mi sit amet arcu dictum dignissim. Ut lobortis ante purus, non vestibulum ligula faucibus in. Morbi pharetra pharetra diam et iaculis. Vivamus pellentesque sit amet tortor nec tincidunt. Curabitur sed ipsum purus. Phasellus id rutrum est, et finibus tortor. Morbi nec leo gravida, tincidunt eros consequat, facilisis erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p><p>Nullam rutrum luctus nibh ac pulvinar. In hac habitasse platea dictumst. Nulla risus lorem, consequat tincidunt viverra imperdiet, gravida in est. Ut a dui eget purus sollicitudin porta. Maecenas interdum purus id ante efficitur, id placerat ex blandit. Morbi ac aliquet sapien. Nullam sit amet commodo ipsum. Aenean tortor urna, vulputate eget mauris eu, scelerisque eleifend lorem. In quis interdum est. Nulla a maximus sem, scelerisque faucibus ligula.</p>', 'sql, backend, databases', 4, 'Published', 0);

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
(66, 'tiago', '$2y$10$njfngjTfJ30p/8lb4pg3J.pzdtyz2ALe8Eqh29pLYChe2su/Ux1pe', 'Tiago', 'Bordin', 'tiago@tiago', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(67, 'Natalia', '$2y$10$H155b2Tn3gez1cGcuworN.Ah739NfIoH4ZwnS4qx0pxV2R3Ww8dxa', '123', '123', 'natalia@email.com', NULL, 'subscriber', '$2y$10$iusesomecrazystrings22'),
(68, 'maria', '$2y$10$cU5cEnJieKG/NteQNiikjeUEnySqitbAiWySKc9Yxyiyw1z2I.m3.', 'Maria', 'Silva', 'maria@email.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(70, 'carla', '$2y$10$ie5fGVi0oH2MQBjiBplvLu1YidR/E2k3OZivzPwO8nT8M3vvJmr0K', NULL, NULL, 'carla@carla.com', NULL, 'admin', '$2y$10$iusesomecrazystrings22'),
(71, 'ana', '$2y$10$h3ayIwKtlAnw95qu.O0m3utfNlqh0vta2q7QJqN.lto3sk3bvnsYS', 'ana', 'ana', 'ana@ana', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(72, 'fernanda', '$2y$10$fpoj6qtZuZ96qfC94aKcM..z34IcgFPkppt6jLwnDmwsOoKufgKoS', 'Fernanda', 'Lima', 'fernanda@email.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(73, 'Joana', '$2y$10$LNYK38vIGJz7kIOJRKKt6eQDDg7Ou0jBpSZ7ZOatCd0os.7/IAnMa', 'Joana', 'Dark', 'joana@email.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(74, 'Tico', '$2y$10$m6046Qpt4nHzyn/76j9QwuE7Mvz/DTXrDJVrKxyj1qhQnlfwhVkqW', 'tico', 'grande', 'toco@email.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(75, 'joe', '$2y$10$ssBTXs.pWZHm9jSrnGc2R.5YUJaSjj0kj/p0iFzS3WV5Rn91.iGzG', 'joe', 'jordison', 'joe@joe.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(76, 'ana', '$2y$10$2kG3ZPL/de3ootGlr3BP7.2Lf5ItqeA5GOJ/tFaXrV.BDREGd6kse', 'ana', 'quadros', 'ana@ana.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(13, 'kbmuik80m1s0uhn2g6n9tl42hj', 1635795455),
(14, '27t1aogsrbijdg70hbmve1hpbs', 1635795610),
(15, 'r0qgbsji8026uaob9ipep01pb1', 1635795442),
(16, 'pbcf0226qpmaomqu0cpmsrso8b', 1635879273),
(17, 'pnk9k7kmodl7u8mj195cotcupi', 1636075868),
(18, 'fqg79bn6atekftusq98q8ucetv', 1636776965);

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
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post_id` (`comment_post_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category_id` (`post_category_id`),
  ADD KEY `post_author_id` (`post_author_id`);

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
-- Índices para tabela `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

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
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_post_id` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_author_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
