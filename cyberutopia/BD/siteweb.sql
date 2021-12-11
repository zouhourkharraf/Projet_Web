-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 déc. 2021 à 23:20
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `code_categ` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`code_categ`) VALUES
('tech'),
('vetement');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `url_image` varchar(50) NOT NULL,
  `code_categ` varchar(100) NOT NULL,
  `id_scateg` varchar(100) NOT NULL,
  `pu_achat` int(11) NOT NULL,
  `pu_vente` int(11) NOT NULL,
  `qte_stock` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `descr`, `url_image`, `code_categ`, `id_scateg`, `pu_achat`, `pu_vente`, `qte_stock`, `date`) VALUES
(1, 'iphone 13 ', 'L\'iPhone 13, annoncé le 14 septembre 2021, est le modèle central de la 15e itération du smartphone d\'Apple. Il est équipé d\'un écran OLED de 6,1 pouces 60 Hz, d\'un SoC Apple A15 Bionic compatible 5G (NR & Sub-6) et d\'un double capteur photo de 12+12 mégapixels (grand-angle et ultra grand-angle) avec OIS', 'iphone13(3).png', 'tech', 'APPLE', 1500, 2500, 15, '2021-12-04'),
(2, 'oppo reno 5', '2020, December 31 Status	Available. Released 2021, January 09 BODY	Dimensions	159.1 x 73.3 x 7.7 mm (6.26 x 2.89 x 0.30 in) Weight	171 g (6.03 oz) SIM	Dual SIM (Nano-SIM, dual stand-by) DISPLAY	Type	AMOLED, 90Hz, 430 nits (typ), 600 nits (peak) Size	6.4 inches, 98.9 cm2 (~84.8% screen-to-body ratio) Resolution	1080 x 2400 pixels, 20:9 ratio (~411 ppi density) Protection	Corning Gorilla Glass 3 PLATFORM	OS	Android 11, ColorOS 11.1 Chipset	Qualcomm SM7125 Snapd', 'oppo-reno-5-4g-1-800x800.png', 'tech', 'oppo', 700, 1150, 50, '2021-09-01'),
(3, 'samsung s20 ', 'Le Samsung Galaxy S20 est un smartphone haut de gamme de Samsung annoncé en février 2020 et disponible début mars 2020 qui succède au Galaxy S10. Il est équipé d\'un écran AMOLED de 6,2 pouces certifié HDR10+, d\'un triple capteur photo polyvalent entre ultra grand-angle et zoom 3X (30X en hybride) et d\'un processeur Exynos 990 gravé en 7 nm épaulé par 8 Go de RAM (12 Go en version 5G). Il est disponible en version 4G ou 4G+5G et avec 128 Go de stockage UFS 3.0.', 's20.jpg', 'tech', 'samsung', 1800, 2900, 17, '2021-01-23'),
(4, 'samsung s10', 'Le Samsung Galaxy S20 est un smartphone haut de gamme de Samsung annoncé en février 2020 et disponible début mars 2020 qui succède au Galaxy S10. Il est équipé d\'un écran AMOLED de 6,2 pouces certifié HDR10+, d\'un triple capteur photo polyvalent entre ultra grand-angle et zoom 3X (30X en hybride) et d\'un processeur Exynos 990 gravé en 7 nm épaulé par 8 Go de RAM (12 Go en version 5G). Il est disponible en version 4G ou 4G+5G et avec 128 Go de stockage UFS 3.0.', 's10.jpg', 'tech', 'samsung', 1000, 1250, 10, '2020-12-04'),
(5, 'oppo reno 4', 'Le oppo reno 4 est un smartphone haut de gamme annoncé le 26 mars 2020. Il s\'agit du premier smartphone de la gamme P, avec le P40, à être compatible avec les réseaux 5G. Il est équipé d\'un écran OLED de 6,58 pouces, d\'un SoC Kirin 990 et d\'un quadruple capteur photo arrière polyvalent. Il est disponible en France sous Android 10 avec l\'interface Emotion UI 10.1 sans les services Google, dont le Google Play Store.', 'reno_4-5.png', 'tech', 'oppo ', 1000, 1250, 14, '2020-12-04'),
(6, 'xiaomi mi 9', 'Le Xiaomi Mi 9 est un smartphone haut de gamme annoncé par Xiaomi le 24 février 2019. Il est équipé d\'un SoC Snapdragon 855, d\'un triple capteur photo, d\'un écran AMOLED de 6,39 pouces et d\'une batterie de 3500 mAh compatible Qi.', 'xiaomi9.jpg', 'tech', 'xiaomi', 500, 650, 77, '2020-12-04'),
(7, 'Huawei P30 Pro', 'Le Huawei P30 Pro est un smartphone haut de gamme annoncé par Huawei en mars 2019. Équipé d\'une puce Kirin 980, il dispose d\'un quadruple capteur photo compatible zoom 10x, d\'un SoC Kirin 980 et d\'un écran de 6,47 pouces borderless avec une petite encoche.', 'huawei-p30-pro-ram-8-go.jpg', 'tech', 'Huawei ', 999, 1080, 20, '2020-12-04'),
(8, 'HP pavilion', 'Processeur Intel Core i7-8565U (Quad-Core 1.8 GHz / 4.6 GHz Turbo - cache 8 Mo) 8 Go de mémoire DDR4-2400 (2 x 4 Go) Ecran SVA de 15.6\" anti-reflets avec résolution Full HD (1920 x 1080) Sortie HDMI, pour le branchement à un téléviseur.', 'hppavi.jpg', 'tech', 'hp', 1900, 2239, 9, '2021-12-04'),
(9, ' MSI GAMING GL63 8RCS ', 'Ecran 15.6\" Full HD - Processeur Intel Core i7-8750H, up to 4.1 Ghz, 9 Mo de cache - Mémoire 8 Go - Disque 1 To + 128 Go SSD - Carte graphique Nvidia GeForce GTX 1050, 4 Go de mémoire DDR5 dédiée - Clavier rétroéclairé - Wifi - Bluetooth - 1x USB 3.0 Type-C - 3x USB 3.1 - HDMI - RJ45 - Webcam HD - Garantie 2 ans + SIM Orange Offerte 30 Go', 'download.jpg', 'tech', 'msi', 2790, 3059, 2, '2020-09-01'),
(10, 'PC PORTABLE ASUS X543MA CELERON N4020 ', 'Écran 15.6\" HD - Processeur: Intel Celeron N4020 (1,10 GHz up to 2,80 GHz, 4Mo Mémoire cache, Dual-Core) - Système d\'exploitation: Windows 10 Famille - Mémoire RAM: 4Go - Disque Dur: 1 To - Carte Graphique: Intel HD Graphics, avec WiFi, Bluetooth, 1x USB 3.1, 2x USB 2.0, 1x HDMI - Couleur: Gris - Garantie: 1 an', 'asus.jpg', 'tech', 'asus', 819, 700, 200, '2020-12-27'),
(11, 'MacBook Air 13 pouces', 'Puce Apple M1 avec CPU 8 cœurs et GPU 7 cœurs 256 Go de stockage Puce Apple M1 avec CPU 8 cœurs, GPU 7 cœurs et Neural Engine 16 cœurs 8 Go de mémoire unifiée SSD de 256 Go¹ Écran Retina avec affichage True Tone Magic Keyboard Touch ID Trackpad Force Touch Deux ports Thunderbolt/USB 4', 'mac.jpg', 'tech', 'mac', 5000, 6700, 2, '2021-01-15'),
(12, 'airpods pro', 'Réduction active du bruit Mode Transparence Égalisation adaptative Système d’évents pour égaliser la pression auriculaire Haut-parleur longue excursion exclusif Apple Amplificateur à gamme dynamique élevée conçu sur mesure Audio spatial avec suivi dynamique des mouvements de la tête1', 'airp.jpg', 'tech', 'accessoires smartphone', 750, 999, 80, '2021-05-01'),
(13, 'DISQUE DUR EXTERNE SILICON POWER 512 GO SSD', 'Disque Dur Externe SILICON POWER - Capacité: 512 Go SSD - Type de disque dur: SSD - Format de Disque: 2.5\\\" -  Interface: USB 3.1 Type C - Matériau: Aluminium - Vitesse en lecture: 440 Mo/s - Vitesse en écriture: 430 Mo/s - Design iconique résistant aux chocs et aux rayures - Coque en aluminium renforcée et ondulée - Indicateur lumineux en forme de \\\"L\\\" - Dimensions: 124.4 x 82 x 12.2 mm - Couleur: Argent - Garantie: 3 ans', 'disq.jpg', 'tech', 'accessoires pc ', 280, 319, 124, '2021-12-04');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUtilisateur` int(11) NOT NULL,
  `NomUtilisateur` varchar(25) NOT NULL,
  `PrenomUtilisateur` varchar(25) NOT NULL,
  `PseudoUtilisateur` varchar(30) NOT NULL,
  `AdresseUtilisateur` varchar(50) NOT NULL,
  `Tel1Utilisateur` varchar(8) NOT NULL,
  `Tel2Utilisateur` varchar(8) NOT NULL,
  `GenreUtilisateur` varchar(10) NOT NULL,
  `DatenaissUtilisateur` date NOT NULL,
  `EmailUtilisateur` varchar(40) NOT NULL,
  `MpUtilisateur` varchar(25) NOT NULL,
  `RoleUtilisateur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisateur`, `NomUtilisateur`, `PrenomUtilisateur`, `PseudoUtilisateur`, `AdresseUtilisateur`, `Tel1Utilisateur`, `Tel2Utilisateur`, `GenreUtilisateur`, `DatenaissUtilisateur`, `EmailUtilisateur`, `MpUtilisateur`, `RoleUtilisateur`) VALUES
(2, 'malek', 'abbes', 'malek abbes', 'ariana 2002', '12345678', '88888888', 'homme', '2008-02-02', 'aaaaa@aaaa.aaa', '123456', 'client'),
(5, 'zahra', 'ben malek', 'zahra ben malek', 'sousse rue abc', '28222222', '11122233', 'femme', '0000-00-00', 'ffffffffiiii@yahoo.com', '888999', 'client'),
(7, 'faten', 'malki', 'faten malki', 'sousse 45  rue les roses ', '20444999', '', 'femme', '2006-03-03', 'fatenfaten@yahoo.fr', '444444', 'client'),
(8, 'admin', 'admin0', 'admin admin0', 'tunis', '00000000', '', 'femme', '0000-00-00', 'zouhour.kharraf1@esprit.tn', '111000', 'administrateur'),
(10, 'kaouther', 'aaaaaaaa', 'kaouther aaaaaaaa', 'monastir ', '20666666', '21444777', 'femme', '1990-02-02', 'kaouther.khaouther@gmail.com', '123456', 'administrateur'),
(12, 'fatma', 'fffff', 'fatma fffff', 'jendouba', '66666666', '', 'femme', '0000-00-00', 'fatma.fatma@yahoo.com', '777888', 'client'),
(13, 'imen', 'yyyyy', 'imen yyyyy', 'tunis rue les roses', '99999900', '77885544', 'femme', '0000-00-00', 'imenyyyy@yahoo.com', '112233445566', 'client'),
(14, 'farah', 'hhhh', 'farah hhhh', 'tataouine', '12345678', '', 'femme', '0000-00-00', 'farahfarah@yahoo.fr', '777777', 'client'),
(15, 'admin', 'admin3', 'admin admin3', 'ariana', '77777777', '', 'homme', '0000-00-00', 'adminadmin3@yahoo.com', '777999', 'client'),
(16, 'mohamed', 'uuuuu', 'mohamed uuuuu', 'tunis', '11111111', '22222222', 'homme', '0000-00-00', 'mohamedmohamed@yahoo.fr', '666666', 'administrateur'),
(17, 'samia', 'loumi', 'samia loumi', 'tunis rue de la liberté', '12345678', '', 'femme', '0000-00-00', 'samia_samia@yahoo.fr', '000000', 'client'),
(18, 'kharraf', 'malek', 'kharraf malek', 'tunis avenue de liberté', '12345678', '', 'femme', '0000-00-00', 'aaaaa@aaaa.aaa', '123456', 'client'),
(19, 'jamila', 'dammak', 'jamila dammak', 'mahdia', '99999900', '', 'femme', '0000-00-00', 'jamila444@yahoo.com', '123123', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`code_categ`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `code_categ` (`code_categ`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`code_categ`) REFERENCES `categorie` (`code_categ`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
