-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql212.infinityfree.com
-- Généré le :  lun. 10 juil. 2023 à 15:52
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_34587349_libraryFilms`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `nom_film` varchar(255) NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `id_genre` int(11) NOT NULL,
  `id_prix` int(11) NOT NULL,
  `id_images` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `nom_film`, `date_sortie`, `id_genre`, `id_prix`, `id_images`) VALUES
(30, 'Extraction 2', '2023-06-16', 39, 23, 45),
(29, 'The Flash', '2023-06-16', 39, 23, 44),
(32, 'John Wick Chapter 4', '2023-03-24', 39, 23, 47),
(26, 'Avatar : la voie de l\'eau', '2022-12-16', 39, 23, 41),
(27, 'Black Adam', '2022-10-21', 39, 23, 42),
(36, 'Le Royaume des Ã©toiles', '2022-12-07', 40, 24, 51),
(35, 'Les Chevaliers du Zodiaque ', '2023-05-12', 40, 24, 50),
(34, 'Blueback', '2023-01-01', 42, 26, 49),
(33, 'Fast & Furious X', '2023-05-19', 39, 23, 48),
(37, 'Indiana Jones et le cadran de la destinÃ©e', '2023-06-27', 40, 24, 52),
(38, 'Les Gardiens de la Galaxie 3', '2023-05-05', 40, 24, 53),
(39, 'Cash', '2023-07-06', 41, 25, 54),
(40, 'Fire Island', '2023-06-01', 46, 30, 55),
(41, 'Harry Pattern and the Magic Pen', '2023-04-29', 41, 25, 56),
(42, 'Joy Ride', '2023-07-05', 41, 25, 57);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom_genre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
(39, 'Action'),
(40, 'Aventure'),
(41, 'Comedie'),
(42, 'Drame'),
(43, 'Famille'),
(44, 'Espionnage'),
(45, 'Fantastique'),
(46, 'Horreur'),
(47, 'Policier'),
(48, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_images` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lien_image` varchar(255) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_images`, `titre`, `lien_image`, `id_genre`, `description`) VALUES
(41, 'Avatar : la voie de l\'eau', 'https://zimage.cc/uploads/image/f5bb4150442c211c463d86a36cd8a86d3503255c.jpg', 39, 'Se dÃ©roulant plus dâ€™une dÃ©cennie aprÃ¨s les Ã©vÃ©nements relatÃ©s dans le premier film, AVATAR : LA VOIE DE Lâ€™EAU raconte l\'histoire des membres de la famille Sully (Jake, Neytiri et leurs enfants), les Ã©preuves auxquelles ils sont confrontÃ©s, les chemins quâ€™ils doivent emprunter pour se protÃ©ger les uns les autres, les batailles quâ€™ils doivent mener pour rester en vie et les tragÃ©dies qu\'ils endurent.'),
(42, 'Black Adam', 'https://zimage.cc/uploads/image/9a69b43f9e5233008fd016ba3cc1da2d1af09207.jpg', 39, 'Dans lâ€™antique Kahndaq, lâ€™esclave Teth Adam avait reÃ§u les super-pouvoirs des dieux. Mais il en a fait usage pour se venger et a fini en prison. Cinq millÃ©naires plus tard, alors quâ€™il a Ã©tÃ© libÃ©rÃ©, il fait rÃ©gner sa conception trÃ¨s sombre de la justice dans le monde. Refusant de se rendre, Teth Adam doit affronter une bande de hÃ©ros dâ€™aujourdâ€™hui qui composent la Justice Society â€“ Hawkman, le Dr Fate, Atom Smasher et Cyclone â€“ qui comptent bien le renvoyer en prison pour lâ€™Ã©ternitÃ©.'),
(47, 'John Wick Chapter 4', 'https://zimage.cc/uploads/image/d8acd55cfb12dec9e30ef063df5472d6ab1003a3.webp', 39, 'John.Wick.Chapter.4.2023.CUSTOM.FRENCH.BRRip.x264-ONLYMOViE\r\nJohn Wick dÃ©couvre un moyen de vaincre lâ€™organisation criminelle connue sous le nom de la Grande Table. Mais avant de gagner sa libertÃ©, Il doit affronter un nouvel ennemi qui a tissÃ© de puissantes alliances Ã  travers le monde et qui transforme les vieux amis de John en ennemis.'),
(44, 'The Flash', 'https://zimage.cc/uploads/image/46d325caf0458e37aac17b5441b6ba6c51b4b7cc.webp', 39, 'Les rÃ©alitÃ©s sâ€™affrontent dans THE FLASH lorsque Barry se sert de ses super-pouvoirs pour remonter le temps et modifier son passÃ©. Mais ses efforts pour sauver sa famille ne sont pas sans consÃ©quences sur lâ€™avenir, et Barry se retrouve pris au piÃ¨ge dâ€™une rÃ©alitÃ© oÃ¹ le gÃ©nÃ©ral Zod est de retour, menaÃ§ant dâ€™anÃ©antir la planÃ¨te, et oÃ¹ les super-hÃ©ros ont disparu. Ã€ moins que Barry ne rÃ©ussisse Ã  tirer de sa retraite un Batman bien changÃ© et Ã  venir en aide Ã  un Kryptonien incarcÃ©rÃ©, qui nâ€™est pas forcÃ©ment celui quâ€™il recherche. Barry sâ€™engage alors dans une terrible course contre la montre pour protÃ©ger le monde dans lequel il est et retrouver le futur quâ€™il connaÃ®t. Mais son sacrifice ultime suffira-t-il Ã  sauver lâ€™univers ?'),
(45, 'Extraction 2', 'https://zimage.cc/uploads/image/f0bac5d015e882bde4c5e8ef474c14554f47c8c8.webp', 39, 'AprÃ¨s avoir miraculeusement survÃ©cu aux Ã©vÃ©nements du premier volet, le mercenaire australien des forces spÃ©ciales Tyler Rake est de retour pour une nouvelle mission pÃ©rilleuse : extraire de prison la famille martyrisÃ©e d\'un impitoyable gangster gÃ©orgien.'),
(48, 'Fast & Furious X', 'https://zimage.cc/uploads/image/b8b9ff04c40b230bf28e8ad54961f79a0a6f71ba.webp', 39, 'AprÃ¨s bien des missions et contre toute attente, Dom Toretto et sa famille ont su dÃ©jouer, devancer, surpasser et distancer tous les adversaires qui ont croisÃ© leur route. Ils sont aujourdâ€™hui face Ã  leur ennemi le plus terrifiant et le plus intime : Ã©mergeant des brumes du passÃ©, ce revenant assoiffÃ© de vengeance est bien dÃ©terminÃ© Ã  dÃ©cimer la famille en rÃ©duisant Ã  nÃ©ant tout ce Ã  quoi, et surtout Ã  qui Dom ait jamais tenu.\r\n\r\nDans FAST & FURIOUS 5 en 2011, Dom et son Ã©quipe avaient fait tomber lâ€™infÃ¢me ponte de la drogue brÃ©silienne, Hernan Reyes, en prÃ©cipitant son empire du haut dâ€™un pont de Rio De Janeiro. Ils Ã©taient loin de se douter que son fils Dante, avait assistÃ© impuissant Ã  la scÃ¨ne et quâ€™il avait passÃ© ces douze derniÃ¨res annÃ©es Ã  Ã©chafauder le plan infernal qui exigerait de Dom un prix ultime.\r\n\r\nDante va dÃ©busquer et traquer Dom et sa famille aux quatre coins du monde, de Los Angeles aux catacombes de Rome, du BrÃ©sil Ã  Londres et de lâ€™Antarctique au Portugal. De nouvelles alliances vont se forger et de vieux ennemis rÃ©apparaitre. Mais tout va basculer quand Dom va comprendre que la cible principale de Dante nâ€™est autre que son fils Ã  peine Ã¢gÃ© de 8 ans.'),
(49, 'Blueback', 'https://zimage.cc/uploads/image/af56233c594ddb14cbdd6f420cd784ae00f11c09.webp', 42, 'Dans la baie de Bremer, en Australie, Abby partage sa passion pour lâ€™ocÃ©an avec sa mÃ¨re qui lâ€™Ã©lÃ¨ve modestement en harmonie avec la nature. Lors dâ€™une plongÃ©e sous-marine, Abby se lie dâ€™amitiÃ© avec un poisson bleu gÃ©ant quâ€™elle surnomme Â« Blueback Â». Mais un vaste projet immobilier compromet bientÃ´t le fragile Ã©cosystÃ¨me de la baie et la survie de Blueback, Abby et sa maman sâ€™engagent alors dans une lutte farouche pour la protection de lâ€™environnement.'),
(50, 'Les Chevaliers du Zodiaque ', 'https://zimage.cc/uploads/image/d62d7c8d78ac76b16c388d4fec39bfbbfe1b6b69.webp', 40, 'Seiya, un adolescent au caractÃ¨re bien trempÃ©, a l\'habitude de participer Ã  des combats pour gagner de quoi survivre dans la rue, tout en recherchant sa soeur qui a Ã©tÃ© enlevÃ©e. Durant un combat, il puise involontairement dans des pouvoirs mystiques insoupÃ§onnÃ©s et se retrouve propulsÃ© dans un monde oÃ¹ il rencontrera des chevaliers en armure, tirant leur puissance d\'un entraÃ®nement magique ancestral et AthÃ©na, une dÃ©esse rÃ©incarnÃ©e qui a besoin de sa protection. S\'il veut survivre, il devra affronter son destin et tout sacrifier pour prendre la place qui lui revient parmi les Chevaliers du Zodiaque.'),
(51, 'Le Royaume des Ã©toiles', 'https://zimage.cc/uploads/image/d0d2cb807b759b6763adb0296afd681acac28f39.jpg', 40, 'Et si votre petite sÅ“ur disparaissait soudainement au beau milieu de la nuit ? Et si vous deviez partir sur la lune et la rechercher dans le royaume des Ã©toiles ? Câ€™est ce qui arrive Ã  Peter, et le temps est comptÃ© pour la retrouver avant le lever du jourâ€¦ Ã€ bord du traÃ®neau magique du Marchand de sable, que la grande course commence !'),
(52, 'Indiana Jones et le cadran de la destinÃ©e', 'https://zimage.cc/uploads/image/ace3509eaa4ca218cabc6ff8297d0dfaf88ae254.jpg', 40, '1969. AprÃ¨s avoir passÃ© plus de dix ans Ã  enseigner au Hunter College de New York, l\'estimÃ© docteur Jones, professeur d\'archÃ©ologie, est sur le point de prendre sa retraite et de couler des jours paisibles.\r\n\r\nTout bascule aprÃ¨s la visite surprise de sa filleule Helena Shaw, qui est Ã  la recherche d\'un artefact rare que son pÃ¨re a confiÃ© Ã  Indy des annÃ©es auparavant : le fameux cadran d\'ArchimÃ¨de, une relique qui aurait le pouvoir de localiser les fissures temporelles. En arnaqueuse accomplie, Helena vole lâ€™objet et quitte prÃ©cipitamment le pays afin de le vendre au plus offrant. Indy n\'a d\'autre choix que de se lancer Ã  sa poursuite. Il ressort son fedora et son blouson de cuir pour une derniÃ¨re virÃ©e...'),
(53, 'Les Gardiens de la Galaxie 3', 'https://zimage.cc/uploads/image/c51c5f6886857b50a28363c8a97d214cd5e5ce5d.webp', 40, 'Notre bande de marginaux favorite a quelque peu changÃ©. Peter Quill, qui pleure toujours la perte de Gamora, doit rassembler son Ã©quipe pour dÃ©fendre lâ€™univers et protÃ©ger lâ€™un des siens. En cas dâ€™Ã©chec, cette mission pourrait bien marquer la fin des Gardiens tels que nous les connaissons.'),
(54, 'Cash', 'https://zimage.cc/uploads/image/9df36fcc823613870e81966180a81b362ec19863.webp', 41, 'Ã€ Chartres, les Breuil, Ã  la tÃªte dâ€™un important groupe de parfums, rÃ¨gnent sur la ville de pÃ¨re en fils. Toujours Ã  Chartres, mais Ã  des annÃ©es-lumiÃ¨re de ce monde de luxe, Daniel Sauveur ne supporte plus la richesse insolente des Breuil et vit de petites combines. Quand le projet quâ€™il a montÃ© avec son copain dâ€™enfance est sabordÃ© par le groupe, il nâ€™a plus quâ€™une idÃ©e en tÃªte : se venger. Il se dÃ©brouille alors pour Ãªtre embauchÃ© dans lâ€™usine familiale et convainc ses collÃ¨gues de dÃ©rober une partie du stock. Avec toujours le mÃªme objectif : faire tomber la plus puissante dynastie de la villeâ€¦'),
(55, 'Fire Island', 'https://zimage.cc/uploads/image/6e9eee4b306e8da473c7d850fcd1602b30118b4c.jpg', 46, 'Les vacances d\'Ã©tÃ© parfaites deviennent rapidement incontrÃ´lables pour un groupe d\'amis sur la tristement cÃ©lÃ¨bre et pittoresque escapade de Fire Island alors qu\'ils se retrouvent pris dans un rÃ©seau de sexe, de mensonges et de meurtres de sang-froid.'),
(56, 'Harry Pattern and the Magic Pen', 'https://zimage.cc/uploads/image/51200775ee04b782ee15dc3f4c012d5c5a17af8a.jpg', 41, 'Harry Pattern est sur le point de crÃ©er une histoire par lui-mÃªme Ã  l\'aide d\'un stylo magique.'),
(57, 'Joy Ride', 'https://zimage.cc/uploads/image/518572bab95e52887249f1b4358b71cd0f6379e4.webp', 41, 'Audrey demande Ã  son amie dâ€™enfance Lolo, Ã  son ancienne coloc Kat devenue star de feuilletons chinois et Ã  Deux de Tensâ€™ lâ€™excentrique cousine de Lolo de lâ€™accompagner en Chine Ã  la recherche de sa mÃ¨re biologique. Mais leur voyage se transforme en la plus dingue des expÃ©riences durant laquelle les jeunes femmes vont enchaÃ®ner les galÃ¨res !');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `solde` bigint(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `solde`, `email`) VALUES
(22, 'Rakoto', '$2y$10$7xLz/ymKK/g04oMXCdtSmu4bwSF/rLOPPXzjHX9lrujXc3iqNs2Fu', 0, 'rakotodass@gmail.com'),
(21, 'Hasix', '$2y$10$NjZ03nuF3JT79UpI71tk4uer7RTM/E9XkSua3UpL7pva/H/PNip2S', 10000, 'rafidyhasina@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE `prix` (
  `id_prix` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `prix` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id_prix`, `id_genre`, `prix`) VALUES
(24, 40, 1000),
(23, 39, 1000),
(25, 41, 900),
(26, 42, 800),
(27, 43, 800),
(28, 44, 700),
(29, 45, 800),
(30, 46, 800),
(31, 47, 900),
(32, 48, 1000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_prix` (`id_prix`),
  ADD KEY `id_images` (`id_images`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Index pour la table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id_prix`),
  ADD KEY `id_genre` (`id_genre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `prix`
--
ALTER TABLE `prix`
  MODIFY `id_prix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
