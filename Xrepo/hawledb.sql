-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Paź 2018, 08:22
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hawledb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Item` int(11) NOT NULL,
  `RegionalWarehouse` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ItemCode` varchar(100) NOT NULL,
  `CatalogNo` varchar(50) NOT NULL,
  `Attribute` text NOT NULL,
  `Description` text NOT NULL,
  `WarehouseCode` varchar(50) NOT NULL,
  `RealStock` int(11) NOT NULL,
  `SpareStock` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `inventory`
--

INSERT INTO `inventory` (`Id`, `Item`, `RegionalWarehouse`, `Quantity`, `ItemCode`, `CatalogNo`, `Attribute`, `Description`, `WarehouseCode`, `RealStock`, `SpareStock`) VALUES
(1, 1, 'Magazyn Testowy', 20, '', '', '', '', '', 0, 0),
(2, 657, 'In faucibus.', 18, 'nisl', '1000', 'massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit', 'dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque', 'quis', 11, 38),
(3, 587, 'natoque penatibus', 17, 'pharetra', '999', 'arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus.', 'egestas. Fusce aliquet magna a neque. Nullam ut nisi a', 'enim.', 92, 29),
(4, 57, 'feugiat non,', 22, 'facilisis', '998', 'mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec,', 'augue. Sed molestie. Sed id risus quis diam luctus lobortis.', 'vel', 62, 14),
(5, 607, 'Donec at', 40, 'nulla.', '997', 'faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt.', 'consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales', 'quis', 57, 49),
(6, 306, 'sem. Pellentesque', 26, 'ultrices', '996', 'Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel', 'mauris', 15, 76),
(7, 934, 'laoreet ipsum.', 32, 'augue', '995', 'convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula', 'at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum', 'mus.', 45, 81),
(8, 530, 'Etiam gravida', 5, 'urna', '994', 'metus. Aenean sed pede nec ante blandit viverra. Donec tempus,', 'bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum,', 'tempus,', 95, 51),
(9, 550, 'nulla vulputate', 11, 'Mauris', '993', 'Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis', 'ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius', 'rhoncus.', 5, 45),
(10, 148, 'ante dictum', 50, 'ligula.', '992', 'Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla', 'felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum.', 'odio,', 77, 57),
(11, 446, 'eu eros.', 29, 'porttitor', '991', 'velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque', 'ante lectus convallis est, vitae sodales nisi magna sed dui.', 'felis', 48, 39),
(12, 561, 'consectetuer adipiscing', 1, 'nibh.', '990', 'nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet.', 'orci, in consequat enim diam vel arcu. Curabitur ut odio', 'Cum', 10, 83),
(13, 134, 'facilisi. Sed', 30, 'a', '989', 'egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie', 'mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,', 'quis,', 60, 95),
(14, 535, 'Nulla interdum.', 35, 'egestas', '988', 'vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh', 'eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed', 'tempus', 46, 56),
(15, 797, 'dui nec', 25, 'sed', '987', 'metus urna convallis erat, eget tincidunt dui augue eu tellus.', 'aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a,', 'Donec', 47, 5),
(16, 44, 'penatibus et', 12, 'at', '986', 'dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit', 'amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus.', 'iaculis', 91, 23),
(17, 95, 'vitae aliquam', 30, 'auctor', '985', 'magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna.', 'Donec est mauris, rhoncus id, mollis nec, cursus a, enim.', 'tellus', 51, 20),
(18, 381, 'auctor quis,', 35, 'lacinia', '984', 'augue porttitor interdum. Sed auctor odio a purus. Duis elementum,', 'vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean', 'Cras', 41, 5),
(19, 979, 'Integer vitae', 19, 'per', '983', 'dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et', 'lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse', 'penatibus', 16, 53),
(20, 403, 'neque. In', 4, 'dolor.', '982', 'Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam', 'dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a', 'magnis', 28, 90),
(21, 319, 'pede. Suspendisse', 39, 'tellus,', '981', 'Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae,', 'elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum.', 'Aliquam', 25, 65),
(22, 199, 'tristique ac,', 22, 'lectus', '980', 'pede et risus. Quisque libero lacus, varius et, euismod et,', 'mollis lectus pede et risus. Quisque libero lacus, varius et,', 'sem.', 73, 44),
(23, 854, 'erat volutpat.', 7, 'venenatis', '979', 'facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus', 'tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante', 'laoreet', 51, 8),
(24, 723, 'Donec est.', 25, 'bibendum.', '978', 'id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut', 'enim non nisi. Aenean eget metus. In nec orci. Donec', 'aliquam', 17, 81),
(25, 899, 'fermentum arcu.', 44, 'neque.', '977', 'nisl arcu iaculis enim, sit amet ornare lectus justo eu', 'eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam', 'mauris', 67, 16),
(26, 678, 'et, euismod', 25, 'Aenean', '976', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem', 'arcu ac orci. Ut semper pretium neque. Morbi quis urna.', 'odio.', 7, 64),
(27, 893, 'mauris eu', 10, 'dis', '975', 'Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue', 'Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien.', 'odio', 61, 6),
(28, 70, 'Sed nunc', 8, 'vitae', '974', 'malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis.', 'tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing,', 'pede,', 40, 51),
(29, 818, 'ornare lectus', 35, 'iaculis', '973', 'Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh', 'lacus vestibulum lorem, sit amet ultricies sem magna nec quam.', 'mollis', 46, 3),
(30, 33, 'Nullam lobortis', 20, 'Integer', '972', 'eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum', 'arcu. Vestibulum ante ipsum primis in faucibus orci luctus et', 'vitae,', 61, 72),
(31, 848, 'volutpat ornare,', 9, 'Sed', '971', 'ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna.', 'nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque,', 'consectetuer,', 14, 100),
(32, 176, 'ipsum dolor', 33, 'vehicula', '970', 'nunc ac mattis ornare, lectus ante dictum mi, ac mattis', 'lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam', 'semper,', 45, 92),
(33, 9, 'non, sollicitudin', 20, 'orci,', '969', 'Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra', 'Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh.', 'diam.', 59, 35),
(34, 952, 'arcu iaculis', 5, 'faucibus', '968', 'mus. Proin vel arcu eu odio tristique pharetra. Quisque ac', 'at, nisi. Cum sociis natoque penatibus et magnis dis parturient', 'luctus', 67, 42),
(35, 615, 'scelerisque sed,', 48, 'lectus', '967', 'Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra.', 'tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at', 'eleifend', 3, 61),
(36, 386, 'mi eleifend', 48, 'nunc.', '966', 'In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas.', 'eu tellus eu augue porttitor interdum. Sed auctor odio a', 'eu', 52, 47),
(37, 395, 'lacus. Cras', 8, 'tempor', '965', 'urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis', 'vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor', 'mauris', 74, 43),
(38, 711, 'tempor bibendum.', 14, 'ac', '964', 'dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et', 'at pretium aliquet, metus urna convallis erat, eget tincidunt dui', 'tristique', 2, 99),
(39, 337, 'fermentum arcu.', 8, 'arcu.', '963', 'sit amet ultricies sem magna nec quam. Curabitur vel lectus.', 'odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa.', 'dui', 41, 30),
(40, 31, 'nulla. Integer', 40, 'pharetra', '962', 'tellus lorem eu metus. In lorem. Donec elementum, lorem ut', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames', 'tincidunt', 90, 39),
(41, 920, 'nec ante', 34, 'pellentesque,', '961', 'tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis,', 'habitant morbi tristique senectus et netus et malesuada fames ac', 'amet', 98, 60),
(42, 205, 'posuere cubilia', 25, 'eu,', '960', 'ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque.', 'tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing,', 'ut', 36, 41),
(43, 351, 'dignissim magna', 8, 'enim', '959', 'sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie', 'parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla', 'vel', 43, 59),
(44, 710, 'magna, malesuada', 46, 'fames', '958', 'in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum', 'semper egestas, urna justo faucibus lectus, a sollicitudin orci sem', 'morbi', 14, 55),
(45, 976, 'fermentum convallis', 19, 'ante', '957', 'Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum.', 'scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia.', 'tellus', 17, 86),
(46, 804, 'nec urna', 21, 'lectus', '956', 'sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris', 'Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc', 'feugiat', 82, 56),
(47, 543, 'Vestibulum accumsan', 9, 'tellus.', '955', 'semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices', 'fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed', 'sed', 77, 74),
(48, 165, 'nibh lacinia', 16, 'commodo', '954', 'vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non', 'Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam', 'scelerisque', 33, 75),
(49, 44, 'erat neque', 46, 'feugiat', '953', 'eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec', 'mattis ornare, lectus ante dictum mi, ac mattis velit justo', 'vulputate,', 54, 28),
(50, 698, 'mi lorem,', 16, 'Vivamus', '952', 'fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin', 'non justo. Proin non massa non ante bibendum ullamcorper. Duis', 'ultricies', 35, 52),
(51, 737, 'Cras vulputate', 36, 'Vestibulum', '951', 'Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.', 'Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris.', 'interdum.', 74, 24),
(52, 154, 'molestie pharetra', 21, 'massa.', '950', 'vitae aliquam eros turpis non enim. Mauris quis turpis vitae', 'et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum.', 'Donec', 48, 55),
(53, 116, 'nulla vulputate', 25, 'placerat,', '949', 'nec enim. Nunc ut erat. Sed nunc est, mollis non,', 'elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec', 'risus', 99, 79),
(54, 165, 'a felis', 7, 'magnis', '948', 'eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed', 'nisi sem semper erat, in consectetuer ipsum nunc id enim.', 'elit.', 66, 19),
(55, 696, 'imperdiet, erat', 31, 'venenatis', '947', 'sodales nisi magna sed dui. Fusce aliquam, enim nec tempus', 'lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor', 'velit.', 40, 72),
(56, 51, 'Proin mi.', 28, 'mauris', '946', 'ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet', 'In ornare sagittis felis. Donec tempor, est ac mattis semper,', 'feugiat', 72, 75),
(57, 594, 'et magnis', 15, 'Curae;', '945', 'sed pede. Cum sociis natoque penatibus et magnis dis parturient', 'dictum placerat, augue. Sed molestie. Sed id risus quis diam', 'amet,', 13, 55),
(58, 412, 'libero. Morbi', 23, 'sed', '944', 'vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non', 'semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae', 'pharetra,', 86, 86),
(59, 524, 'sodales elit', 46, 'vitae', '943', 'Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus,', 'massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at', 'sapien', 50, 78),
(60, 949, 'vel est', 17, 'Integer', '942', 'facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus', 'nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras', 'pretium', 83, 63),
(61, 741, 'mauris elit,', 30, 'risus.', '941', 'dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et', 'lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor', 'sapien.', 69, 24),
(62, 775, 'odio a', 28, 'enim.', '940', 'vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit', 'id, blandit at, nisi. Cum sociis natoque penatibus et magnis', 'eu', 98, 68),
(63, 221, 'hendrerit a,', 29, 'ac', '939', 'dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor', 'ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper', 'urna', 1, 95),
(64, 175, 'ipsum non', 49, 'egestas.', '938', 'sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et', 'sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris', 'blandit', 28, 38),
(65, 822, 'amet, consectetuer', 16, 'in,', '937', 'eu tellus eu augue porttitor interdum. Sed auctor odio a', 'eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut', 'arcu.', 35, 38),
(66, 375, 'facilisis vitae,', 6, 'Nulla', '936', 'Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim,', 'lobortis risus. In mi pede, nonummy ut, molestie in, tempus', 'ullamcorper', 1, 61),
(67, 497, 'nonummy. Fusce', 13, 'risus.', '935', 'diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus', 'tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat.', 'aliquet,', 70, 31),
(68, 275, 'nulla. In', 48, 'egestas', '934', 'Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum', 'adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl', 'tristique', 71, 75),
(69, 301, 'sagittis. Duis', 43, 'commodo', '933', 'non nisi. Aenean eget metus. In nec orci. Donec nibh.', 'mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,', 'Nam', 77, 39),
(70, 579, 'nibh dolor,', 12, 'bibendum.', '932', 'molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl', 'ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,', 'ultrices', 8, 53),
(71, 730, 'lobortis augue', 39, 'tellus,', '931', 'nunc. In at pede. Cras vulputate velit eu sem. Pellentesque', 'ut nisi a odio semper cursus. Integer mollis. Integer tincidunt', 'ut', 78, 54),
(72, 363, 'neque. Nullam', 25, 'ac', '930', 'sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy', 'quam. Pellentesque habitant morbi tristique senectus et netus et malesuada', 'dapibus', 79, 8),
(73, 313, 'eget, ipsum.', 26, 'id', '929', 'leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in,', 'velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque', 'et', 38, 19),
(74, 210, 'molestie tellus.', 6, 'porttitor', '928', 'hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer,', 'faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt.', 'Sed', 96, 43),
(75, 311, 'lorem, eget', 38, 'Cras', '927', 'nisi nibh lacinia orci, consectetuer euismod est arcu ac orci.', 'fames ac turpis egestas. Fusce aliquet magna a neque. Nullam', 'adipiscing', 59, 70),
(76, 902, 'elementum at,', 32, 'nunc.', '926', 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus.', 'vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat', 'ut', 10, 85),
(77, 802, 'nunc est,', 13, 'nulla', '925', 'luctus, ipsum leo elementum sem, vitae aliquam eros turpis non', 'nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit', 'Nunc', 60, 99),
(78, 634, 'arcu. Curabitur', 12, 'eu,', '924', 'varius orci, in consequat enim diam vel arcu. Curabitur ut', 'magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac', 'vel', 32, 44),
(79, 746, 'augue id', 9, 'sed', '923', 'Quisque libero lacus, varius et, euismod et, commodo at, libero.', 'nibh. Donec est mauris, rhoncus id, mollis nec, cursus a,', 'vel', 32, 11),
(80, 548, 'luctus sit', 21, 'et,', '922', 'aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames', 'magna.', 74, 91),
(81, 723, 'vitae, aliquet', 38, 'convallis', '921', 'Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est.', 'laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi', 'Fusce', 74, 15),
(82, 337, 'sagittis lobortis', 10, 'massa.', '920', 'eget metus eu erat semper rutrum. Fusce dolor quam, elementum', 'Praesent eu dui. Cum sociis natoque penatibus et magnis dis', 'sapien.', 46, 95),
(83, 236, 'est ac', 49, 'amet', '919', 'est tempor bibendum. Donec felis orci, adipiscing non, luctus sit', 'fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed', 'nec,', 28, 31),
(84, 230, 'mauris sagittis', 10, 'malesuada', '918', 'ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper', 'dui quis accumsan convallis, ante lectus convallis est, vitae sodales', 'pede', 68, 54),
(85, 708, 'Praesent luctus.', 1, 'ultricies', '917', 'Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a,', 'mollis dui, in sodales elit erat vitae risus. Duis a', 'In', 43, 14),
(86, 142, 'semper et,', 13, 'ut', '916', 'ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo', 'quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu', 'purus.', 12, 50),
(87, 186, 'ligula. Aenean', 22, 'suscipit', '915', 'quam quis diam. Pellentesque habitant morbi tristique senectus et netus', 'Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque.', 'velit.', 93, 40),
(88, 836, 'sapien. Aenean', 11, 'magna', '914', 'Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus.', 'egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est', 'nulla.', 100, 33),
(89, 794, 'Fusce mollis.', 15, 'bibendum', '913', 'rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin', 'diam vel arcu. Curabitur ut odio vel est tempor bibendum.', 'lacus.', 29, 61),
(90, 890, 'at, velit.', 31, 'libero.', '912', 'nisi nibh lacinia orci, consectetuer euismod est arcu ac orci.', 'ornare. Fusce mollis. Duis sit amet diam eu dolor egestas', 'Lorem', 58, 86),
(91, 550, 'risus odio,', 20, 'mi.', '911', 'sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis', 'Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci,', 'euismod', 58, 77),
(92, 24, 'Donec nibh', 28, 'ornare,', '910', 'rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at,', 'metus vitae velit egestas lacinia. Sed congue, elit sed consequat', 'felis,', 62, 99),
(93, 765, 'ac risus.', 22, 'magna.', '909', 'ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget', 'bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna', 'Nunc', 37, 3),
(94, 462, 'lobortis. Class', 13, 'condimentum', '908', 'Donec feugiat metus sit amet ante. Vivamus non lorem vitae', 'magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam', 'volutpat', 95, 36),
(95, 764, 'lobortis mauris.', 18, 'pharetra', '907', 'Sed et libero. Proin mi. Aliquam gravida mauris ut mi.', 'Nam nulla magna, malesuada vel, convallis in, cursus et, eros.', 'ipsum', 29, 50),
(96, 584, 'consectetuer adipiscing', 50, 'ligula.', '906', 'et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim', 'lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor', 'Nunc', 1, 57),
(97, 912, 'iaculis nec,', 16, 'ac', '905', 'In at pede. Cras vulputate velit eu sem. Pellentesque ut', 'nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse', 'sit', 71, 84),
(98, 968, 'gravida sit', 39, 'sodales', '904', 'Sed neque. Sed eget lacus. Mauris non dui nec urna', 'libero. Proin sed turpis nec mauris blandit mattis. Cras eget', 'Cras', 50, 70),
(99, 269, 'dolor dapibus', 23, 'sociis', '903', 'enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare', 'eleifend, nunc risus varius orci, in consequat enim diam vel', 'Integer', 57, 39),
(100, 945, 'dictum ultricies', 1, 'sed', '902', 'tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat.', 'luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec', 'iaculis', 18, 82),
(101, 154, 'Mauris ut', 45, 'Phasellus', '901', 'amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat', 'fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh', 'ac', 24, 24);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `SerialNumber` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `item`
--

INSERT INTO `item` (`Id`, `Name`, `SerialNumber`) VALUES
(1, 'Item testowy', '123456789');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderheader`
--

DROP TABLE IF EXISTS `orderheader`;
CREATE TABLE IF NOT EXISTS `orderheader` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Number` varchar(40) NOT NULL,
  `Type` int(11) NOT NULL,
  `Descritpion` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderlines`
--

DROP TABLE IF EXISTS `orderlines`;
CREATE TABLE IF NOT EXISTS `orderlines` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNumber` varchar(40) NOT NULL,
  `LineNumber` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `RegionalWarehouse` varchar(40) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `regionalwarehouse`
--

DROP TABLE IF EXISTS `regionalwarehouse`;
CREATE TABLE IF NOT EXISTS `regionalwarehouse` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `UserLogin` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `regionalwarehouse`
--

INSERT INTO `regionalwarehouse` (`Id`, `Name`, `UserLogin`) VALUES
(1, 'Magazyn Testowy', 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`Id`, `Login`, `Password`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
