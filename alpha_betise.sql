-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 fév. 2021 à 21:02
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alpha_betise`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin_comment`
--

CREATE TABLE `admin_comment` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_name_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `age_group`
--

CREATE TABLE `age_group` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_age` int(11) NOT NULL,
  `max_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `age_group`
--

INSERT INTO `age_group` (`id`, `category`, `min_age`, `max_age`) VALUES
(17, 'Enfants 0 - 3 ans', 0, 3),
(18, 'Enfants 4 - 7 ans', 4, 7),
(19, 'Enfants 8 - 15 ans', 8, 15),
(20, 'Jeunes adultes', 15, 18);

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `lastname`, `firstname`) VALUES
(29, 'Pérez', 'Sébastien'),
(30, 'Lacombe', 'Benjamin'),
(31, 'Lang', 'Suzanne'),
(32, 'Lang', 'Max'),
(33, 'Jouannigot', 'Loic'),
(34, 'Jalbert', 'Philippe'),
(35, 'Higgins', 'Ryan T.'),
(36, 'Séchan', 'Lolita'),
(37, 'Jourdy', 'Camille'),
(38, 'Nob', NULL),
(39, 'Béziat', 'Julien'),
(40, 'Dunand-Pallaz', 'Stéphanie'),
(41, 'Turrel', 'Sophie'),
(42, 'Simard', 'Rémy'),
(43, 'Jolibois', 'Christian'),
(44, 'Heinrich', 'Christian'),
(45, 'Cathon', NULL),
(46, 'Bonniol', 'Magali'),
(47, 'Bertrand', 'Pierre'),
(48, 'Bocquet', 'Olivier'),
(49, 'Cy', NULL),
(50, 'Pedrosa', 'Cyril'),
(51, 'Moreil', 'Roxanne'),
(52, 'Lambda', 'Sophie'),
(53, 'Deveney', 'J.C.'),
(54, 'Tamarit', 'Nùria'),
(55, 'Gaiman', 'Neil'),
(56, 'Rowling', 'J.K.'),
(57, 'Diana', 'Wynne Jones'),
(58, 'Sfar', 'Joann');

-- --------------------------------------------------------

--
-- Structure de la table `author_book`
--

CREATE TABLE `author_book` (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `author_book`
--

INSERT INTO `author_book` (`author_id`, `book_id`) VALUES
(29, 1),
(30, 1),
(31, 2),
(32, 2),
(33, 3),
(34, 4),
(35, 5),
(36, 6),
(37, 6),
(38, 7),
(39, 8),
(40, 9),
(41, 9),
(42, 11),
(43, 10),
(44, 10),
(45, 12),
(46, 13),
(47, 13),
(48, 21),
(49, 23),
(50, 19),
(51, 19),
(52, 20),
(53, 22),
(54, 22),
(55, 14),
(56, 15),
(57, 16),
(57, 17),
(58, 18);

-- --------------------------------------------------------

--
-- Structure de la table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `availability`
--

INSERT INTO `availability` (`id`, `name`) VALUES
(1, 'momentanément indisponible'),
(2, 'en stock'),
(3, 'en commande'),
(4, 'épuisé');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `availability_id` int(11) DEFAULT NULL,
  `age_group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extract` longtext COLLATE utf8mb4_unicode_ci,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publishing_house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ean_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_pages` int(11) NOT NULL,
  `dimension_h` int(11) NOT NULL,
  `dimension_w` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `admin_notation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `availability_id`, `age_group_id`, `title`, `extract`, `editor`, `cover_photo`, `photo_1`, `photo_2`, `publishing_house`, `publication_date`, `collection`, `ean_code`, `isbn_code`, `number_pages`, `dimension_h`, `dimension_w`, `weight`, `language`, `original_language`, `stock`, `price`, `admin_notation`) VALUES
(1, 2, 17, 'L\'Etonnante Famille Appenzel', '<div>Ma grand-mère se nommait Eugénie. Eugénie Appenzell. D\'elle, je tiens mes longs cheveux bouclés et, dit-on, mon caractère bien trempé. Peu de jours avant ma naissance, grand-mère Eugénie quitta les siens. En héritage, elle me laissa une boîte remplie de photographies et de lettres. \'Pour que tu connaisses ta famille\', m\'avait-elle écrit. Durant des années, j\'ai démêlé les liens et les intrigues qui unissent ces personnes extraordinaires. J\'ai pleuré et j\'ai ri... Aujourd\'hui, je vous livre leur histoire. Mon histoire. Celle de l\'étonnante famille Appenzell.</div>', 'Margot', 'etonnanteFamilleAppenzel.jpg', NULL, NULL, 'Actes Sud Junior', '2017-07-09', 'Famille', '9791095184249', '2872467312', 143, 46, 39, 300, 'Français', 'français', 15, 1990, NULL),
(2, 2, 17, 'Gaston Grognon', '<div>N\'avez-vous jamais été un peu inquiet en allant à une fête ? c\'est le cas de Gaston. Son ami Porc-Epic organise une fiesta de folie, et tous les animaux n\'ont qu\'une hâte... danser jusqu\'au bout de la nuit ! Il est HORS DE QUESTION pour Gaston de mettre un pied sur la piste de danse. D\'abord, il ne sait même pas comment bouger son corps. Et puis, qu\'est-ce qu\'ils ont tous à vouloir lui apprendre ? Pourquoi n\'aurait-il pas droit de ne pas aimer ça ?</div>', 'Casterman', 'GastonGrognon.jpg', NULL, NULL, 'Amaterra', '2017-07-09', 'Fiction', '9782203211506', '6708354214', 114, 35, 36, 467, 'Français', 'anglais', 22, 1390, NULL),
(3, 3, 17, 'La Famille Passiflore', '<div>Au pays multicolore des nymphéas, vit la famille Blanche. La maman est une artiste peintre très connue. Ses deux enfants Ajonc et Genet veulent construire une cabane parmi les nymphéas, aidés par leurs jeunes invités : les Passiflore. 1987, premier livre pour enfants aux éditions Milan : Le Premier Bal d\'Agaric Passiflore, texte de Geneviève Huriet. C\'est le succès. Succès couronné par des prix littéraires et des récompenses diverses (prix Saint-Exupéry). S\'ensuivra une longue série (24 titres parus), pour le plus grand plaisir des enfants (à partir de quatre ans). Aujourd\'hui, les petits lapins Passiflore sont traduits en 28 langues et font l\'objet d\'une série télé, 52 épisodes de 26 minutes (production Euro Visual TF1) et diffusée depuis 2004 (TF1, Disney Chanel, etc.). En 2012, chez Dargaud, Loïc Jouannigot reprend seul les personnages des Passiflore en bande dessinée avec deux albums : L\'Anniversaire de Dendelion et La Chorale. Suivent deux autres titres avec les textes de Michel Plessix, Mélodie potagère et La Chasse au trésor. Depuis l\'arrêt en 2007 de l\'édition, la sympathique et néanmoins célèbre Famille Passiflore est rééditée aux éditions Maghen. Ce nouvel album, Pirouette &amp; Nymphéas, contient une histoire inédite de la famille Passiflore écrite et dessinée par Loïc Jouannigot.</div>', 'Milan', 'LaFamillePassiflore.jpg', NULL, NULL, 'Autrement', '2017-07-09', 'Famille', '9782356740878', '8826472010', 110, 27, 25, 432, 'Français', 'espagnol', 0, 1300, NULL),
(4, 4, 17, 'Les Gestes Barrières', '<div>Un petit ouvrage documentaire à destination des enfants de l\'école maternelle pour leur expliquer simplement les gestes barrières pour qu\'ils puissent se protéger et protéger les autres du coronavirus et des virus en général. Un dessin animé conçu par l\'auteur et adapté de ce livre est également disponible sur YouTube et a dépassé les 100 000 vues en à peine quelques jours.</div>', 'Deux Coqs d\'Or', 'LesGestesBarrieres.jpg', NULL, NULL, 'Auzou', '2017-07-09', 'Education', '9782017866763', '6193352215', 114, 43, 31, 522, 'Français', 'français', 0, 2950, NULL),
(5, 2, 17, 'Maman Ours A La Rescousse', '<div>Michel, l\'ours grincheux, ne supporte pas ses voisins. Ils sont bruyants, envahissants, collants, et ils sont partout, tout le temps. Heureusement, son sale caractère lui assure une paix relative... jusqu\'au jour où une énorme tempête se déclare. Tout le monde se réfugie alors chez Michel, qui doit même participer à une chaîne humaine géante pour sauver un petit lapin des bourrasques ! L\'ours ronchon, horripilé par cette invasion, risque pourtant bien de changer d\'avis : parfois, l\'entraide appelle... l\'entraide. A partir de 5 ans</div>', 'Albin Michel', 'MamanOursALaRescousse.jpg', NULL, NULL, 'Balivernes', '2017-07-09', 'Fiction', '9782226454140', '7655508333', 111, 35, 29, 495, 'Français', 'français', 30, 1200, NULL),
(6, 3, 18, 'Cachée ou pas, j\'arrive', '<div>Une partie de cache-cache écrite et dessinée à quatre mains. Lolita Séchan et Camille Jourdy s\'amusent à faire jouer leur personnages respectifs dans l\'univers de la famille Biloba. à partir de 4 ans.</div>', 'Actes Sud', 'cacheeOuPasJarrive.jpg', NULL, NULL, 'Bayard', '2015-12-19', 'Famille', '9782330130152', '9582493825', 171, 26, 20, 365, 'Français', 'français', 0, 1350, NULL),
(7, 2, 18, 'La Cantoche', '<div>La cloche a sonné, c\'est l\'heure du repas, direction... la cantoche ! Tous les enfants se retrouvent dans ce lieu mythique, qu\'on connaît forcément de près ou de loin. Entre les batailles de nourriture, les disputes, les chutes et les réclamations auprès du cuisiner fan de légumes, la pause déjeuner peut rapidement se transformer... en catastrophe ! Toujours pas de héros récurrent mais les gags s\'enchaînent autour de cet univers délicieux.</div>', 'BD Kids', 'la-cantoche.jpg', NULL, NULL, 'Belin', '2015-12-19', 'Fiction', '9791036314919', '3216335467', 121, 37, 27, 309, 'Français', 'anglais', 12, 995, NULL),
(8, 4, 18, 'La Nuit de Berk', '<div>L\'autre jour, un truc terrible est arrivé dans mon école. C\'est Berk mon canard qui me l\'a raconté. J\'avais oublié Berk dans la caisse à doudous et un croco-sac-à-dos était resté là aussi. « Allez viens, on va aller se balader dans la classe », a proposé Berk. Ils ont pris la lampe de la maîtresse car il faisait tout noir. Berk et Croco ont ensuite commencé à avoir la trouille avec ce Sprouitch Sprouitch qui les suivait partout.</div>', 'Pastel', 'LaNuitDeBerk.jpg', NULL, NULL, 'Casterman', '2015-12-19', 'Famille', '9782211236935', '2785464889', 112, 45, 30, 571, 'Français', 'espagnol', 0, 1350, NULL),
(9, 2, 18, 'Le Chat Ritable', '<div>Il était une fois un petit chat bienveillant, qui toujours secourait les pauvres et les mendiants. Le coeur sur la patte, généreux et fort aimable, ce chat exceptionnel, c\'était le chat Ritable.</div>', 'Balivernes Editions', 'LeChatRitable.jpg', NULL, NULL, 'Creapassions', '2015-12-19', 'Education', '9782350670744', '3168465095', 109, 23, 38, 511, 'Français', 'français', 20, 850, NULL),
(10, 2, 18, 'Les P\'tites Poules', '<div>Cette fois-ci, Boris et son ami vont au centre de la Terre!</div>', 'Casterman', 'LesPierresAFeu.jpg', NULL, NULL, 'Desclee De Brouwer', '2015-12-19', 'Fiction', '9782266177054', '9917800971', 105, 49, 26, 563, 'Français', 'français', 30, 1510, NULL),
(11, 2, 18, 'Les Pierre A Feu', '<div>Connaissez-vous Carmen, la petite poulette qui en a sous la crête ? Son frère Carmélito, le téméraire petit poulet rose ? Leurs copains Coquenpâte, Coqsix, Molédecoq, Hucocotte et les autres agités du poulailler ? Voyages, humour, émotion, frisson et fantaisie... Voilà ce que vous trouverez dans le collector des quatre premières aventures des P\'tites Poules.</div>', 'PKJ', 'LesPtitesPoules.jpg', NULL, NULL, 'Editions Du Rocher', '2015-12-19', 'Education', '9782897770952', '1367480026', 224, 45, 21, 367, 'Français', 'français', 15, 950, NULL),
(12, 2, 18, 'Mimose et Sam', '<div>\'Où étiez-vous la nuit dernière ?\' Mimose et Sam ont lancé leur enquête. Ils veulent découvrir qui a grignoté les feuilles de leur ami Basile. Aucun des insectes interrogés n\'admet être le coupable. Les deux amis doivent trouver des moyens pour le démasquer. Mais cela est plus facile à dire qu\'à faire ! Il faudra user de beaucoup d\'ingéniosité.</div>', 'Mini BD Kids', 'MimoseEtSam.jpg', NULL, NULL, 'Editions Mango', '2015-12-19', 'Famille', '9791036310119', '9190496485', 167, 32, 27, 441, 'Français', 'français', 10, 795, NULL),
(13, 2, 18, 'Veangeance de Cornebidouille', '<div>Ses parents l’ont envoyé au lit pour avoir renâclé devant sa soupe de légumes. Mais Pierre est décidé à ruser et à trouver un moyen imparable pour éliminer non seulement Cornebidouille, la sorcière coincée dans les cabinets, mais aussi l’horrible potage de sa propre mère!</div>', 'Casterman', 'VengeanceCornebidouille.jpg', NULL, NULL, 'Flammarion', '2015-12-19', 'Fiction', '9782211203166', '7634679336', 185, 30, 19, 393, 'Français', 'anglais', 34, 1270, NULL),
(14, 2, 19, 'Coraline', '<div>Coraline vient d\'emménager dans une étrange maison et, comme ses parents n\'ont pas le temps de s\'occuper d\'elle, elle décide de jouer les exploratrices. Ouvrant une porte condamnée, elle pénètre dans un appartement identique au sien. Identique, et pourtant... Dans la droite ligne d\'Alice au pays des merveilles, ce roman à l\'atmosphère inoubliable a déjà conquis des millions de lecteurs. A partir de 13 ans</div>', 'Albin Michel', 'Coraline.jpg', NULL, NULL, 'Albin Michel', '2015-02-10', 'Famille', '9782226453587', '1140823848', 231, 45, 31, 507, 'Français', 'français', 45, 1990, NULL),
(15, 2, 19, 'Ickabog', '<div>Haut comme deux chevaux. Des boules de feu étincelantes à la place des yeux. De longues griffes acérées telles des lames. L\'Ickabog arrive...La Cornucopia était un petit royaume heureux. On n\'y manquait de rien, le roi portait la plus élégante des moustaches, et le pays était célèbre pour ses mets délicieux : Délice-des-Ducs ou Nacelles-de-Fées, nul ne pouvait goûter ses gâteaux divins sans pleurer de joie ! Mais dans tout le royaume, un monstre rôde : selon la légende, l\'Ickabog habitait les Marécages brumeux et froids du nord du pays. On disait de cette créature qu\'elle avait de formidables pouvoirs et sortait la nuit pour dévorer les moutons comme les enfants. Des histoires pour les petits et les naïfs ? Parfois, les mythes prennent vie de façon étonnante...Alors, si vous êtes courageux et voulez connaître la vérité, ouvrez ce livre, suivez deux jeunes héros déterminés et perspicaces dans une folle aventure qui changera pour toujours le sort de la Cornucopia.</div>', 'Gallimard Jeunesse', 'Ickabog.jpg', NULL, NULL, 'Flammarion', '2015-02-10', 'Fiction', '9782075150552', '7998970007', 183, 44, 38, 301, 'Français', 'anglais', 40, 2000, NULL),
(16, 3, 19, 'Le Château de Hurle', '<div>La trilogie arrive enfin dans son intégralité en France ! Découvrez le roman qui a inspiré le chef d\'oeuvre acclamé de Miyazaki, Le Château ambulant ? ! Au coeur de la contrée magique d\'Ingarie, la jeune Sophie s\'est résignée à un avenir morne dans sa petite chapellerie de quartier. Mais lorsqu\'elle a le malheur d\'offusquer la sorcière des Steppes, celle-ci lui dérobe 60 ans de sa vie, la laissant vieille et démunie. Cherchant désespérément un moyen de briser le sortilège, Sophie rejoindra alors l\'équipe haute en couleur du grand mage Hurle. C\'est au sein de son mystérieux château ambulant qu\'elle se retrouvera à pactiser avec le malicieux démon de feu Calcifer. C\'est une aventure extraordinaire à la recherche de sa jeunesse volée qui commence alors pour Sophie, prête à reprendre en main son destin... Autrice acclamée de littérature fantastique, Diana Wynne Jones (1934-2011) a remporté de nombreux prix, dont le Guardian Award for Children\'s Fiction et deux Mythopoeic Fantasy Awards. Elle est plus connue pour ses séries Chrestomanci, L\'Odyssée DaleMark et, bien entendu, pour sa trilogie du Château.</div>', 'Romans Ynnis', 'leChateauDesNuages.jpg', NULL, NULL, 'Fleurus', '2015-02-10', 'Education', '9782376971290', '2796549057', 179, 32, 25, 461, 'Français', 'français', 0, 1495, NULL),
(17, 2, 19, 'Le Château des Nuages', '<div>La suite tant attendue du Château de Hurle vous emmène cette fois au sud d\'Ingarie, dans les mondes imaginaires des Mille et une nuits ! Loin du pays d\'Ingarie, dans le sultanat du Rajpout, un jeune marchand se plaît à rêver à une vie différente. Il s\'imagine ainsi fils de roi, promis depuis sa naissance à une belle princesse, bien loin de sa vie miséreuse et de son père Ingrat, bien loin de son petit étal de tapis. Lorsqu\'un beau jour, un étranger lui vend un tapis volant, la vie d\'Abdallah prend un tournant pour le moins inattendu. Les péripéties s\'enchaînent et le destin de notre héros semble soudain lié à celui de la superbe princesse Fleur-dans-la-Nuit. Pour la retrouver, il part pour une incroyable odyssée, semée de djinns légendaires, de sorciers, de prophéties anciennes... et d\'un mystérieux château dans les nuages.</div>', 'Romans Ynnis', 'leChateauDeHurle.jpg', NULL, NULL, 'Formulette', '2015-02-10', 'Famille', '9782376971757', '4255429506', 211, 20, 22, 494, 'Français', 'anglais', 28, 1495, NULL),
(18, 2, 19, 'Petit Vampire', '<div>Tout a commencé par un film d\'horreur. « Ce n\'est pas de ton âge, Michel », m\'avait pourtant prévenu Petit Vampire. Mais on est quand même allés voir Le Commando des morts vivants. Les zombies nazis étaient effrayants, mais comme c\'était du cinéma, ça allait. Le problème, c\'est que ces affreux sont revenus le soir, dans mon rêve. J\'ai inventé une porte et ils sont partis, ouf ! Sauf que je ne savais pas où menait cette porte. Et puis Marguerite est arrivé pour me dire de venir vite, parce que d\'horribles zombies avaient débarqué chez Petit Vampire...</div>', 'Casterman', 'PetitVampire.jpg', NULL, NULL, 'Casterman', '2015-02-10', 'Fiction', '9782211311021', '9649241295', 154, 42, 18, 406, 'Français', 'français', 34, 950, NULL),
(19, 2, 20, 'L\'âge d\'Or', '<div>Avec l\'hiver, la guerre a commencé. Tandis que les insurgés rassemblent leurs troupes et remontent depuis la Péninsule, la princesse Tilda assiège le château de son frère pour reconquérir son trône. En haut des remparts, en première ligne, les \'gueux\' se préparent à l\'assaut.Ce deuxième tome conclut en majesté l\'épopée flamboyante de \'L\'Age d\'or\', ce livre assez puissant pour déchaîner la tempête et la révolution, la force d\'une utopie qui donne envie de croire en l\'avenir.</div>', 'Aire Libre', 'AgeDor.jpg', NULL, NULL, 'Actes Sud Junior', '2019-02-19', 'Fiction', '9791034732647', '8800855540', 205, 41, 15, 545, 'Français', 'français', 40, 3200, NULL),
(20, 2, 20, 'Le Monde au Balcon', '<div>J\'ai commencé ce carnet en janvier 2020, je voulais dessiner mon quotidien avec légèreté, sans objectif précis... Qui aurait pu prévoir que ce petit projet insouciant allait se changer en journal de bord de l\'événement mondial le plus inédit du 21e siècle ? Dessinatrice vedette d\'instagram, Sophie Lambda est l\'autrice de la remarquable bd tant pis pour l\'amour, parue en 2019. Dans le monde au balcon, elle donne aux petites histoires personnelles et grandes réalités collectives un coup de crayon libérateur.</div>', 'Albin Michel', 'leMondeAuBalcon.jpg', NULL, NULL, 'Albin Michel', '2019-02-19', 'Fiction', '9782226455789', '1582607562', 247, 27, 26, 481, 'Français', 'anglais', 32, 1890, NULL),
(21, 2, 20, 'Ailefroide', '<div>De Grenoble à la Bérarde en mobylette. Des rappels tirés sur la façade du Lycée Champollion. Avec l\'exaltation pure qui tape aux tempes, quand on bivouaque suspendu sous le ciel criblé d\'étoiles, où qu\'à seize ans à peine on se lance dans des grandes voies. La Dibona, le pilier Frendo, le Coup de Sabre, la Pierre Alain à la Meije, la Rébuffat au Pavé : le Massif des Ecrins tout entier offert comme une terre d\'aventure, un royaume, un champ de bataille parfois. Car la montagne réclame aussi son dû et la mort rôde dans les couloirs glacés.</div>', 'Rochette', 'ailefroide.jpg', NULL, NULL, 'Amaterra', '2019-02-19', 'Education', '9782203121935', '6059256374', 185, 31, 33, 569, 'Français', 'anglais', 0, 2800, NULL),
(22, 2, 20, 'Géante', '<div>Elle était une fois Céleste, géante véritable, orpheline recueillie au coeur de la montagne, petite dernière d\'une famille de six frères. Et quand vient le temps où chacun s\'envole du cocon familial, Céleste veut elle aussi arpenter de nouveaux horizons. De la Vallée aux Marais en passant par Dorsodoro, elle découvrira l\'hostilité créée par la différence, les injustices de la guerre ou de la religion mais aussi l\'amour et pourquoi pas, au bout du chemin, la liberté d\'être elle-même ?</div>', 'Editions Delcourt', 'Geante.jpg', NULL, NULL, 'Autrement', '2019-02-19', 'Famille', '9782413000167', '1537674056', 238, 45, 32, 456, 'Français', 'anglais', 29, 2795, NULL),
(23, 2, 20, 'Radium Girls', '<div>New Jersey, 1918. Edna Bolz entre comme ouvrière à l’United State Radium Corporation, une usine qui fournit l’armée en montres. Aux côtés de Katherine, Mollie, Albina, Quinta et les autres, elle va apprendre le métier qui consiste à peindre des cadrans à l’aide de la peinture Undark (une substance luminescente très précieuse et très chère) à un rythme constant. Mais bien que la charge de travail soit soutenue, l’ambiance à l’usine est assez bonne. Les filles s’entendent bien et sortent même ensemble le soir. Elles se surnomment les « Ghost Girls » : par jeu, elles se peignent les ongles, les dents ou le visage afin d’éblouir (littéralement) les autres une fois la nuit tombée. Mais elles ignorent que, derrière ses propriétés étonnantes, le Radium, cette substance qu’elles manipulent toute la journée et avec laquelle elles jouent, est en réalité mortelle. Et alors que certaines d’entre elles commencent à souffrir d’anémie, de fractures voire de tumeur, des voix s’élèvent pour comprendre. D’autres, pour étouffer l’affaire...&nbsp;</div>', 'Glénat', 'radiumGirls.jpg', NULL, NULL, 'Auzou', '2018-03-07', 'Biographie', '9782344033449', '1720836245', 172, 20, 32, 328, 'Français', 'français', 28, 2200, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `number_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `lastname`, `firstname`, `email`, `password`, `address`, `postal_code`, `city`, `age`, `photo`, `newsletter`) VALUES
(1, 'Aubert', 'Charles', 'DaSilva.Therese@hotmail.fr', '$2y$13$BFKD0VWZfazat/unh/TOvO6JonbK6Nj7.ZMJ0YZJxVpAVjEkhjCsa', '20, place Marcelle Leblanc', '8944', 'MunozVille', '7', NULL, 0),
(2, 'Masson', 'Daniel', 'Paul03@Michel.com', '$2y$13$sIKiXOnYFtFAqFnejBI8FOZYxVf1uI/z8sXFdVTARkWOrbIlIS39i', '719, impasse Julie Guillaume', '4159', 'Nicolasnec', '5', NULL, 1),
(3, 'Hubert', 'Adèle', 'eCohen@club-internet.fr', '$2y$13$kz9DFTFFZdx1GfvL6u5bFeVJIyzMByEpazIBpGKk0JWyorWwzq/GG', '770, impasse Théodore Boutin', '24761', 'Garciadan', '15', NULL, 1),
(4, 'Regnier', 'Michèle', 'cColin@club-internet.fr', '$2y$13$sGIWYIHA4nL8coyVDKiNkuLlTkORLpk45jN0MK3.NfOLZolSBjsgu', '70, impasse Valette', '60277', 'Petitjean-sur-Hamel', '2', NULL, 1),
(5, 'Ramos', 'Élodie', 'Dorothee97@orange.fr', '$2y$13$b6zpQMpOZBESN7cVBszzk.C5ya6n1UlN5yr05jShcg3YESd9qDfUi', '42, avenue Matthieu Lombard', '51793', 'Colin-sur-Renard', '8', NULL, 1),
(6, 'Alexandre', 'Valérie', 'Dorothee.Delattre@Courtois.com', '$2y$13$3ND8wNP3XR/PBBaHEHVlHecIPimFItGOn6lUgBIOz.TE8jwa2imfS', '81, boulevard de Regnier', '41225', 'Leveque-sur-Lebon', '14', NULL, 0),
(7, 'Lenoir', 'Rémy', 'Carre.Louise@Dupuis.com', '$2y$13$jY7DfOwAkXiN/xBlSsJCdeaYSaf.IqtKhR7.euKadL.yrlNBmTsgK', 'chemin de Blondel', '69102', 'Charpentier', '14', NULL, 0),
(8, 'De Sousa', 'Alexandrie', 'Denis50@Launay.fr', '$2y$13$ViljjzFs1OKZ2oIl.4E6yOgGC1jp2vKd620sH0gEIYVfxDjvZh9bK', '95, chemin Picard', '74426', 'Teixeira', '7', NULL, 1),
(9, 'Lefebvre', 'Nath', 'tMorel@tiscali.fr', '$2y$13$pfkhHNDL4JHnCL33tGCRaeg4oDlT9SSfShg8dDog/tVpwn5M8AJ.y', '943, rue Huet', '74772', 'Brunetboeuf', '16', NULL, 0),
(10, 'Delattre', 'Océane', 'Raynaud.Laurent@Launay.com', '$2y$13$4NNHjWSLxheCmg9en4hvv.EN07gEHHiJenh.iFL7TfGR7oHJA2a7K', 'avenue de Lacroix', '24387', 'Morin', '11', NULL, 1),
(11, 'Jacob', 'Aimé', 'Ledoux.Susan@Meunier.fr', '$2y$13$q7WQtQCzzqVlJQ9iU4okrOIP1gGPwy.TIhI.KKdWqueS462bwwz/G', '552, chemin Charles Martel', '53282', 'Masse-les-Bains', '11', NULL, 1),
(12, 'Monnier', 'Jules', 'Arthur.Martinez@live.com', '$2y$13$jdL4aMFJTeRrJHZUeVq4buqD6aXMvViXLV1a/9w/jxRBatwmlr7OG', 'place Zoé Grenier', '5013', 'Benard', '11', NULL, 1),
(13, 'Paul', 'Aimé', 'zMarty@ifrance.com', '$2y$13$hNZeOQYJJjkhwk2bMdfkVOgt0qw7aIqGHRXpgLIT2p7hTo/gVafye', '5, avenue de Guillaume', '34898', 'GautierBourg', '17', NULL, 1),
(14, 'Perrin', 'Marguerite', 'Danielle.Peltier@wanadoo.fr', '$2y$13$xzijZFeDFsbGDKQwieq4qOwOgJvw6Z228a3SG.5jAvNcK457iEgGq', '16, rue de Lemonnier', '79974', 'Seguinnec', '9', NULL, 0),
(15, 'Teixeira', 'Tristan', 'Sebastien43@Alves.com', '$2y$13$.eY/N7WwLPh9QhTnDT0f0ez1Pu6SgrggQylh4l5j9DH7ROUMAmXhG', '12, rue de Richard', '43811', 'Munoz-la-Forêt', '8', NULL, 1),
(16, 'Michel', 'Pénélope', 'bDubois@Pichon.fr', '$2y$13$KahwmYAPOXOXuH3LiPpYbOdVWGEOv0Ksy23PixBnMCMESgyrrFrKy', 'rue Alexandre Martins', '55586', 'Fouchernec', '13', NULL, 0),
(17, 'Riou', 'Denis', 'Victoire.Tanguy@laposte.net', '$2y$13$2LkJQZxV1xP9//80Z7/TMO9Pl6.rZpV6hdAEgBKsiJQSar21/i0mC', '95, boulevard de Traore', '73644', 'Munozboeuf', '9', NULL, 1),
(18, 'Thomas', 'Thibault', 'Danielle90@Didier.com', '$2y$13$Ix5cCivzNDVGJH8iae9vwehoIVVLm2cCz8TdbEm2F6RMNXvJn/Kme', '341, chemin Jean Marchal', '20055', 'Albert', '12', NULL, 0),
(19, 'Courtois', 'Célina', 'Gaudin.Luce@ifrance.com', '$2y$13$OwQ5Qbu5zKrx/vvkkYNqJuEulLAVme8Jv4mnPdsYm14Q5EN/GrlNq', 'place Antoine Vasseur', '25489', 'Loiseau', '9', NULL, 1),
(20, 'Langlois', 'Sabine', 'Peron.Leon@Leduc.net', '$2y$13$rEXY.YS85b9djs002QiuH.no.mUIJ0oLcPTDsmPBAqHaDDntaosHa', '835, rue Aurélie Vincent', '4217', 'Lemoine-les-Bains', '16', NULL, 0),
(21, 'Brunel', 'Julien', 'tTanguy@bouygtel.fr', '$2y$13$jcdxbuEuk0RcnqRb0svoLutc8/4x/TAdRP1gNc2bOnoGLq8ksXdVa', '44, impasse de Chretien', '55274', 'Klein', '16', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `customer_comment`
--

CREATE TABLE `customer_comment` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customer_notation`
--

CREATE TABLE `customer_notation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `notation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210211211307', '2021-02-11 22:13:20', 3181);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `age_group_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `duration` datetime NOT NULL,
  `presentation` longtext COLLATE utf8mb4_unicode_ci,
  `booking_required` tinyint(1) NOT NULL,
  `free` tinyint(1) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `max_participants` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_book`
--

CREATE TABLE `order_book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `orderid_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `venue`
--

INSERT INTO `venue` (`id`, `name`, `address`, `postal_code`, `city`) VALUES
(1, 'Libriarie Alpha-Bêtise', 'place Guyon', '14187', 'Lambert'),
(2, 'Salle Jean Garnier', '20, rue de Royer', '14021', 'Laporte'),
(3, 'Librairie de quartier', '54, rue Étienne Andre', '14162', 'Morvan-sur-Mer'),
(4, 'Salle de la Mairie', '6, boulevard de Faure', '14118', 'Brunel-sur-Gaillard'),
(5, 'Salle Jean Cocteau', '73, avenue de Thierry', '14089', 'Perrier-sur-Le Goff');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin_comment`
--
ALTER TABLE `admin_comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5048D0E516A2B381` (`book_id`),
  ADD KEY `IDX_5048D0E5E237B440` (`book_name_id`);

--
-- Index pour la table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`author_id`,`book_id`),
  ADD KEY `IDX_2F0A2BEEF675F31B` (`author_id`),
  ADD KEY `IDX_2F0A2BEE16A2B381` (`book_id`);

--
-- Index pour la table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBE5A33161778466` (`availability_id`),
  ADD KEY `IDX_CBE5A331B09E220E` (`age_group_id`);

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E00CEDDE9395C3F3` (`customer_id`),
  ADD KEY `IDX_E00CEDDE71F7E88B` (`event_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer_comment`
--
ALTER TABLE `customer_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_88A9F6D216A2B381` (`book_id`),
  ADD KEY `IDX_88A9F6D29395C3F3` (`customer_id`);

--
-- Index pour la table `customer_notation`
--
ALTER TABLE `customer_notation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2EADFFBA9395C3F3` (`customer_id`),
  ADD KEY `IDX_2EADFFBA16A2B381` (`book_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BAE0AA7B09E220E` (`age_group_id`),
  ADD KEY `IDX_3BAE0AA740A73EBA` (`venue_id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F52993989395C3F3` (`customer_id`);

--
-- Index pour la table `order_book`
--
ALTER TABLE `order_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8614992616A2B381` (`book_id`),
  ADD KEY `IDX_861499266F90D45B` (`orderid_id`);

--
-- Index pour la table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admin_comment`
--
ALTER TABLE `admin_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `customer_comment`
--
ALTER TABLE `customer_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customer_notation`
--
ALTER TABLE `customer_notation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_book`
--
ALTER TABLE `order_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin_comment`
--
ALTER TABLE `admin_comment`
  ADD CONSTRAINT `FK_5048D0E516A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_5048D0E5E237B440` FOREIGN KEY (`book_name_id`) REFERENCES `book` (`id`);

--
-- Contraintes pour la table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `FK_2F0A2BEE16A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2F0A2BEEF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A33161778466` FOREIGN KEY (`availability_id`) REFERENCES `availability` (`id`),
  ADD CONSTRAINT `FK_CBE5A331B09E220E` FOREIGN KEY (`age_group_id`) REFERENCES `age_group` (`id`);

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDE71F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `FK_E00CEDDE9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `customer_comment`
--
ALTER TABLE `customer_comment`
  ADD CONSTRAINT `FK_88A9F6D216A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_88A9F6D29395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `customer_notation`
--
ALTER TABLE `customer_notation`
  ADD CONSTRAINT `FK_2EADFFBA16A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_2EADFFBA9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA740A73EBA` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7B09E220E` FOREIGN KEY (`age_group_id`) REFERENCES `age_group` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F52993989395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `order_book`
--
ALTER TABLE `order_book`
  ADD CONSTRAINT `FK_8614992616A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_861499266F90D45B` FOREIGN KEY (`orderid_id`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
