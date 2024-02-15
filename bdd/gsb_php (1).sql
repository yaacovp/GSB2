-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 mars 2020 à 15:24
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

DROP TABLE IF EXISTS `attribuer`;
CREATE TABLE IF NOT EXISTS `attribuer` (
  `RefVisiteur` varchar(20) NOT NULL,
  `RefMateriel` varchar(20) NOT NULL,
  `DateAttribution` date NOT NULL DEFAULT '0000-00-00',
  `DateRestitution` date DEFAULT NULL,
  PRIMARY KEY (`RefVisiteur`,`RefMateriel`,`DateAttribution`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `secteur` varchar(15) NOT NULL,
  `login` varchar(15) NOT NULL,
  `motdepasse` varchar(15) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`nom`, `prenom`, `secteur`, `login`, `motdepasse`) VALUES
('bensimon', 'eliahou', 'rue de meaux', 'eli', '123');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `Reference` varchar(10) NOT NULL,
  `IdModele` int(11) NOT NULL,
  `Marque` varchar(50) DEFAULT NULL,
  `Prix` float DEFAULT NULL,
  `Panne` int(1) DEFAULT NULL,
  PRIMARY KEY (`Reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`Reference`, `IdModele`, `Marque`, `Prix`, `Panne`) VALUES
('bdbvbjdbjb', 1, 'fvrf', 8, NULL),
('X01', 1, NULL, NULL, NULL),
('X02', 1, NULL, NULL, NULL),
('X03', 2, NULL, NULL, NULL),
('X04', 1, NULL, NULL, NULL),
('X05', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `Identifiant` int(11) NOT NULL,
  `Libelle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`Identifiant`, `Libelle`) VALUES
(1, 'Tablette Archos 10B G2'),
(2, 'Ordinateur portable Inspiron Mini 10');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `VIS_MATRICULE` char(10) NOT NULL,
  `VIS_NOM` char(25) DEFAULT NULL,
  `VIS_PRENOM` char(50) DEFAULT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(5) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` datetime DEFAULT NULL,
  `SEC_CODE` char(1) DEFAULT NULL,
  `LAB_CODE` char(2) DEFAULT NULL,
  PRIMARY KEY (`VIS_MATRICULE`),
  KEY `DEPENDRE_FK` (`LAB_CODE`),
  KEY `SEC_CODE` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`) VALUES
('a17', 'Andre', 'David', '1 r Aimon de Chiss', '38100', 'GRENOBLE', '0000-00-00 00:00:00', '', 'GY'),
('a55', 'Bedos', 'Christian', '1 r B', '65000', 'TARBES', '0000-00-00 00:00:00', '', 'GY'),
('a93', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '0000-00-00 00:00:00', '', 'SW'),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', '0000-00-00 00:00:00', '', 'GY'),
('b16', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', '0000-00-00 00:00:00', '', 'SW'),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '0000-00-00 00:00:00', '', 'GY'),
('b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '0000-00-00 00:00:00', '', 'SW'),
('b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', '0000-00-00 00:00:00', '', 'GY'),
('b34', 'Cadic', 'Eric', '123 r Caponi', '41000', 'BLOIS', '0000-00-00 00:00:00', 'P', 'SW'),
('b4', 'Charoze', 'Catherine', '100 pl G', '33000', 'BORDEAUX', '0000-00-00 00:00:00', '', 'SW'),
('b50', 'Clepkens', 'Christophe', '12 r F', '13000', 'MARSEILLE', '0000-00-00 00:00:00', '', 'SW'),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', '0000-00-00 00:00:00', '', 'GY'),
('c14', 'Daburon', 'Fran', '13 r Champs Elys', '6000', 'NICE', '0000-00-00 00:00:00', 'S', 'SW'),
('c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '0000-00-00 00:00:00', '', 'SW'),
('c54', 'Debelle', 'Michel', '181 r Caponi', '88000', 'EPINAL', '0000-00-00 00:00:00', '', 'SW'),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '0000-00-00 00:00:00', '', 'SW'),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '0000-00-00 00:00:00', 'E', 'GY'),
('e22', 'Desmarquest', 'Nathalie', '14 r F', '54000', 'NANCY', '0000-00-00 00:00:00', '', 'GY'),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '0000-00-00 00:00:00', 'E', 'SW'),
('e39', 'Dudouit', 'Fr', '18 quai Xavier Jouvin', '75000', 'PARIS', '0000-00-00 00:00:00', '', 'GY'),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '0000-00-00 00:00:00', '', 'GY'),
('e5', 'Enault-Pascreau', 'C', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '0000-00-00 00:00:00', 'S', 'GY'),
('e52', 'Eynde', 'Val', '3 r Henri Moissan', '76000', 'ROUEN', '0000-00-00 00:00:00', '', 'GY'),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '0000-00-00 00:00:00', '', 'SW'),
('f39', 'Fr', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '0000-00-00 00:00:00', '', 'GY'),
('f4', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '0000-00-00 00:00:00', '', 'GY'),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '0000-00-00 00:00:00', '', 'SW'),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', '0000-00-00 00:00:00', 'N', 'GY'),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', '0000-00-00 00:00:00', '', 'GY'),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '0000-00-00 00:00:00', '', 'GY'),
('h13', 'Guindon', 'Fran', '44 r Picoti', '19000', 'TULLE', '0000-00-00 00:00:00', '', 'SW'),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '0000-00-00 00:00:00', '', 'SW'),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '0000-00-00 00:00:00', '', 'GY'),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaur', '8000', 'SEDAN', '0000-00-00 00:00:00', '', 'GY'),
('j45', 'Labour', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '0000-00-00 00:00:00', 'N', 'SW'),
('j50', 'Landr', 'Philippe', '4 av G', '59000', 'LILLE', '0000-00-00 00:00:00', '', 'GY'),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '0000-00-00 00:00:00', 'P', 'GY'),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '0000-00-00 00:00:00', '', 'SW'),
('k53', 'Le', 'No', '4 av Beauvert', '68000', 'MULHOUSE', '0000-00-00 00:00:00', '', 'SW'),
('l14', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '0000-00-00 00:00:00', '', 'SW'),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '0000-00-00 00:00:00', '', 'SW'),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '0000-00-00 00:00:00', '', 'GY'),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', '0000-00-00 00:00:00', '', 'SW'),
('m35', 'Lejard', 'Agn', '4 r Anthoard', '82000', 'MONTAUBAN', '0000-00-00 00:00:00', '', 'SW'),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', '0000-00-00 00:00:00', '', 'SW'),
('n42', 'Letessier', 'St', '5 chem Capuche', '27000', 'EVREUX', '0000-00-00 00:00:00', '', 'GY'),
('n58', 'Loirat', 'Didier', 'Les P', '45000', 'ORLEANS', '0000-00-00 00:00:00', '', 'GY'),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', '0000-00-00 00:00:00', '', 'SW'),
('o26', 'Mancini', 'Anne', '5 r D\'Agier', '48000', 'MENDE', '0000-00-00 00:00:00', '', 'GY'),
('p32', 'Marcouiller', 'G', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '0000-00-00 00:00:00', '', 'GY'),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel P', '61000', 'FLERS', '0000-00-00 00:00:00', 'O', 'SW'),
('p41', 'Montecot', 'Fran', '6 r Paul Val', '17000', 'SAINTES', '0000-00-00 00:00:00', '', 'GY'),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '0000-00-00 00:00:00', '', 'SW'),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', '0000-00-00 00:00:00', '', 'GY'),
('p6', 'Pascreau', 'Charles', '57 bd Mar Foch', '64000', 'PAU', '0000-00-00 00:00:00', '', 'SW'),
('p7', 'Pernot', 'Claude-No', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '0000-00-00 00:00:00', '', 'SW'),
('p8', 'Perrier', 'Ma', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '0000-00-00 00:00:00', '', 'GY'),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', '0000-00-00 00:00:00', '', 'GY'),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', '0000-00-00 00:00:00', 'O', 'GY'),
('r58', 'Quiquandon', 'Jo', '7 r Ernest Renan', '29000', 'QUIMPER', '0000-00-00 00:00:00', '', 'GY'),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', '0000-00-00 00:00:00', '', 'SW'),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', '0000-00-00 00:00:00', '', 'SW'),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', '0000-00-00 00:00:00', '', 'SW'),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', '0000-00-00 00:00:00', '', 'SW'),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', '0000-00-00 00:00:00', '', 'GY');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
