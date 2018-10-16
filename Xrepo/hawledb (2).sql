-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ITEMCODE` varchar(40) DEFAULT NULL,
  `REGIONALWAREHOUSECODE` varchar(40) DEFAULT NULL,
  `realStock` int(10) DEFAULT NULL,
  `spareStock` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `inventory` (`ID`, `ITEMCODE`, `REGIONALWAREHOUSECODE`, `realStock`, `spareStock`) VALUES
(1,	'.GITTERBOX DUŻY',	'THAN',	26,	41),
(2,	'.GITTERBOX MAŁY',	'THAN',	26,	30),
(3,	'.LUZEM',	'THAN',	53,	36),
(4,	'.NADMALA',	'THAN',	39,	27),
(5,	'.PACZKA',	'THAN',	41,	25),
(6,	'.PALETA',	'THAN',	20,	48),
(7,	'.PALETA + PALETA',	'THAN',	40,	35),
(8,	'.PALETA Z 1D NADSTAW',	'THAN',	38,	22),
(9,	'.PALETA Z 1D+1M NADS',	'THAN',	20,	53),
(10,	'.PALETA Z 1M. NADSTA',	'THAN',	27,	38),
(11,	'.PALETA Z 2D NADSTAW',	'THAN',	46,	57),
(12,	'.PALETA Z 2M. NADSTA',	'THAN',	46,	42),
(13,	'.PALETA Z 3M. NADSTA',	'THAN',	50,	28),
(14,	'.PALETA Z 4M. NADSTA',	'THAN',	47,	52),
(15,	'.PALETA Z KART S-200',	'THAN',	22,	54),
(16,	'.PALETA Z KARTONEM D',	'THAN',	22,	50),
(17,	'.PALETA Z KARTONEM M',	'THAN',	44,	51),
(18,	'.PALETA Z RAM I POPR',	'THAN',	23,	22),
(19,	'.PALETA Z RAM MET',	'THAN',	22,	23),
(20,	'.POPRZECZKA',	'THAN',	32,	29),
(21,	'.SKRZYNIA',	'THAN',	32,	51),
(22,	'AU9920SA051XXXX',	'THAN',	21,	54),
(23,	'AU9920SA071X08X',	'THAN',	25,	23),
(24,	'AU9920SA072XX8X',	'THAN',	21,	56),
(25,	'AU9920SA075X16M',	'THAN',	38,	42),
(26,	'AU9920SA075X16X',	'THAN',	37,	41),
(27,	'AU9920SA075X22M',	'THAN',	33,	22),
(28,	'AU9920SA076CZ06',	'THAN',	33,	38),
(29,	'AU9920SA076CZ08',	'THAN',	31,	20),
(30,	'AU9920SA076CZ10',	'THAN',	31,	32),
(31,	'AU9920SA076CZ12',	'THAN',	50,	56),
(32,	'AU9920SA076CZ16',	'THAN',	28,	31),
(33,	'AU9920SA076M16M',	'THAN',	55,	40),
(34,	'AU9920SA076NI16',	'THAN',	55,	56),
(35,	'AU9920SA076X08M',	'THAN',	56,	54),
(36,	'AU9920SA076X16A',	'THAN',	41,	24),
(37,	'AU9920SA076X16M',	'THAN',	56,	30),
(38,	'AU9920SA076X16P',	'THAN',	42,	59),
(39,	'AU9920SA076X16X',	'THAN',	32,	42),
(40,	'AU9920SA076X22X',	'THAN',	53,	40),
(41,	'AU9920SA076X45M',	'THAN',	23,	54),
(42,	'AU9920SA076X45S',	'THAN',	24,	58),
(43,	'AU9920SA101X16P',	'THAN',	36,	27),
(44,	'AU9920SA101X16X',	'THAN',	50,	27),
(45,	'AU9920SA101X22X',	'THAN',	47,	52),
(46,	'AU9920SA10222AM',	'THAN',	22,	53),
(47,	'AU9920SA102C63X',	'THAN',	21,	44),
(48,	'AU9920SA102X16A',	'THAN',	58,	20),
(49,	'AU9920SA102X16M',	'THAN',	24,	42),
(50,	'AU9920SA102X16X',	'THAN',	40,	52),
(51,	'AU9920SA102X22M',	'THAN',	44,	41),
(52,	'AU9920SA102X22X',	'THAN',	54,	46),
(53,	'AU9920SA102X45M',	'THAN',	51,	55),
(54,	'AU9920SA102X45S',	'THAN',	24,	57),
(55,	'AU9920SA102X45X',	'THAN',	33,	56),
(56,	'AU9920SA141X16X',	'THAN',	40,	52),
(57,	'AU9920SA141X22X',	'THAN',	42,	35),
(58,	'AU9920SA141X45X',	'THAN',	28,	56),
(59,	'AU9920SA14222AM',	'THAN',	55,	50),
(60,	'AU9920SA142CZ16',	'THAN',	26,	40),
(61,	'AU9920SA142X16X',	'THAN',	23,	53),
(62,	'AU9920SA142X22M',	'THAN',	58,	30),
(63,	'AU9920SA142X22X',	'THAN',	37,	34),
(64,	'AU9920SA145X16X',	'THAN',	40,	38),
(65,	'AU9920SA146X16X',	'THAN',	51,	40),
(66,	'AU9920SAR07616M',	'THAN',	29,	46),
(67,	'AU9920SAR10216M',	'THAN',	44,	23),
(68,	'AUKOLNDYSTANSXX',	'THAN',	41,	39),
(69,	'AUKOLUMNAXSF142',	'THAN',	49,	32),
(70,	'AUPRZEKŁSLIMAXX',	'THAN',	33,	51),
(71,	'CD3993MO150170G',	'THAN',	55,	24),
(72,	'CD3996MO200222G',	'THAN',	55,	22),
(73,	'CD3999MO250274G',	'THAN',	47,	29),
(74,	'CD4002MO300326G',	'THAN',	26,	22),
(75,	'CD4005MO080098G',	'THAN',	52,	53),
(76,	'CD4006MO100118G',	'THAN',	53,	44),
(77,	'CD4007MO125144G',	'THAN',	41,	53),
(78,	'CD4008MO050066G',	'THAN',	45,	44),
(79,	'CD4009MO060077G',	'THAN',	25,	55),
(80,	'CD4010MO065082G',	'THAN',	22,	44),
(81,	'CD6850MO050060S',	'THAN',	54,	40),
(82,	'CD6852MO080088S',	'THAN',	20,	38),
(83,	'CD6853MO100108S',	'THAN',	32,	28),
(84,	'CD6854MO100114S',	'THAN',	23,	50),
(85,	'CD6855MO125133S',	'THAN',	42,	40),
(86,	'CD6856MO150159S',	'THAN',	56,	59),
(87,	'CD6857MO150168S',	'THAN',	27,	59),
(88,	'CD6858MO200219S',	'THAN',	35,	56),
(89,	'CDS4009MO060077',	'THAN',	38,	43),
(90,	'CDS6850MO050060',	'THAN',	41,	56),
(91,	'CDS6852MO080088',	'THAN',	57,	20),
(92,	'CDS6853MO100108',	'THAN',	28,	20),
(93,	'CDS6854MO100114',	'THAN',	35,	56),
(94,	'CDS6855MO125133',	'THAN',	36,	31),
(95,	'CDS6856MO150159',	'THAN',	30,	36),
(96,	'CDS6857MO150168',	'THAN',	33,	36),
(97,	'CDS6858MO200219',	'THAN',	20,	55),
(98,	'CMOZNAB100XXXX10',	'THAN',	37,	37),
(99,	'CMOZNAB300XXXX06',	'THAN',	56,	30),
(100,	'CO4340050050W16',	'THAN',	44,	28);

DROP TABLE IF EXISTS `invoice_header`;
CREATE TABLE `invoice_header` (
  `INVOICENO` varchar(40) NOT NULL,
  `ORDERNO` varchar(40) DEFAULT NULL,
  `DOCUMENTDATE` datetime DEFAULT NULL,
  `PAYMENTDATE` datetime DEFAULT NULL,
  `AMOUNT` decimal(10,1) DEFAULT NULL,
  `POSTINGDESCRIPTION` varchar(40) DEFAULT NULL,
  `EXTERNALDOCNO` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`INVOICENO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `invoice_header` (`INVOICENO`, `ORDERNO`, `DOCUMENTDATE`, `PAYMENTDATE`, `AMOUNT`, `POSTINGDESCRIPTION`, `EXTERNALDOCNO`) VALUES
('F118/10/265',	NULL,	'2018-10-15 00:00:00',	'2019-01-13 00:00:00',	2310.0,	'TA: mail p.Młodziński',	'J23/32/12');

DROP TABLE IF EXISTS `invoice_lines`;
CREATE TABLE `invoice_lines` (
  `ID` int(10) NOT NULL,
  `INVOICENO` varchar(40) DEFAULT NULL,
  `LINENO` int(10) DEFAULT NULL,
  `ITEMCODE` varchar(40) DEFAULT NULL,
  `ITEMCATALOGNO` int(10) DEFAULT NULL,
  `QUANTITY` int(10) DEFAULT NULL,
  `AMOUNT` decimal(10,1) DEFAULT NULL,
  `NETAMOUNT` decimal(10,1) DEFAULT NULL,
  `VAT` decimal(10,1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `invoice_status`;
CREATE TABLE `invoice_status` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `CODE` varchar(40) NOT NULL,
  `CATALOGNO` int(10) DEFAULT NULL,
  `DESCRIPTION` text,
  `ATTRIBUTE` varchar(40) DEFAULT NULL,
  `UNITPRICE` decimal(10,2) DEFAULT NULL,
  `PKWIU` varchar(50) DEFAULT NULL,
  `Unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `item` (`CODE`, `CATALOGNO`, `DESCRIPTION`, `ATTRIBUTE`, `UNITPRICE`, `PKWIU`, `Unit`) VALUES
('.GITTERBOX DUŻY',	0,	'',	'120x80x81',	NULL,	'',	'SZT'),
('.GITTERBOX MAŁY',	73262000,	'Kosz metalowy mały',	'120x80x58',	NULL,	'',	'SZT'),
('.LUZEM',	0,	'Luzem',	'',	NULL,	'',	'SZT'),
('.NADMALA',	0,	'Nadstawka mała',	'120x80x19',	NULL,	'',	'SZT'),
('.PACZKA',	0,	'Paczka',	'',	NULL,	'',	'SZT'),
('.PALETA',	0,	'Paleta',	'120x80x14',	NULL,	'',	'SZT'),
('.PALETA + PALETA',	0,	'Paleta+paleta',	'120x80x14',	NULL,	'',	'SZT'),
('.PALETA Z 1D NADSTAW',	0,	'Paleta z 1 dużą nadstawką',	'120x80x55',	NULL,	'',	'SZT'),
('.PALETA Z 1D+1M NADS',	0,	'Paleta z 1 dużą i 1 małą nadst',	'120x80x75',	NULL,	'',	'SZT'),
('.PALETA Z 1M. NADSTA',	0,	'Paleta z 1 małą nadstawką',	'120x80x33',	NULL,	'',	'SZT'),
('.PALETA Z 2D NADSTAW',	0,	'Paleta z 2 dużymi nadstawkami',	'120x80x93',	NULL,	'',	'SZT'),
('.PALETA Z 2M. NADSTA',	0,	'Paleta z 2 małymi nadstawkami',	'120x80x53',	NULL,	'',	'SZT'),
('.PALETA Z 3M. NADSTA',	0,	'Paleta z 3 małymi nadstawkami',	'120x80x73',	NULL,	'',	'SZT'),
('.PALETA Z 4M. NADSTA',	0,	'Paleta z 4 małymi nadstawkami',	'120x80x93',	NULL,	'',	'SZT'),
('.PALETA Z KART S-200',	0,	'Paleta z Karto. do kołn S-2000',	'123x81x66',	NULL,	'',	'SZT'),
('.PALETA Z KARTONEM D',	0,	'Paleta z Kartonem dużym',	'120x80x98',	NULL,	'',	'SZT'),
('.PALETA Z KARTONEM M',	0,	'Paleta z Kartonem małym 1/2',	'120x80x58',	NULL,	'',	'SZT'),
('.PALETA Z RAM I POPR',	0,	'Paleta z ramką met. i 2 poprze',	'120x80x68',	NULL,	'',	'SZT'),
('.PALETA Z RAM MET',	0,	'Paleta z ramką metalową',	'120x80x60',	NULL,	'',	'SZT'),
('.POPRZECZKA',	0,	'Poprzeczka na ramkę metalową',	'85x2x10',	NULL,	'',	'SZT'),
('.SKRZYNIA',	0,	'Skrzynia drewniana',	'120x107x120',	NULL,	'',	''),
('AU9920SA051XXXX',	85015290,	'Napęd niepełnoobrotowy Auma',	'SGR 05.1 F05-SQ14-22',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA071X08X',	85015290,	'Napęd nastawnika',	'SA07.1  8 [1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA072XX8X',	85015290,	'Napęd nastawnika Auma',	'SA07.2  8 (1/min) IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA075X16M',	85158090,	'Napęd nastawnika ze sterowni-',	'SA07.5 16 obr + ster. AM 01.1',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA075X16X',	85015290,	'Napęd nastawnika',	'SA07.5  16[1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA075X22M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.5 22 obr + ster. AM 01.1',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076CZ06',	84818059,	'Napęd(czerwony)ze ster.AC 01.2',	'SA07.6,22(1/min),400V,IP68,6 m',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076CZ08',	84818059,	'Napęd(czerwony)ze ster.AC 01.2',	'SA07.6,22(1/min),400V,IP68,8 m',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076CZ10',	84818059,	'Napęd(czerwony)ze ster.AC 01.2',	'SA07.6,22(1/min),400V,IP68,10m',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076CZ12',	84818059,	'Napęd(czerwony)ze ster.AC 01.2',	'SA07.6 22(1/min) IP68,400V,12m',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076CZ16',	84818059,	'Napęd nastawnika (czerwony)',	'SA07.6  16 (1/min) IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076M16M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.6,16 obr+ AC 01.2,Mod.RTU',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076NI16',	84818059,	'Napęd nastawnika (niebieski)',	'SA07.6  16 (1/min) IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X08M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.6, 8 obr + ster. AC 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X16A',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.6 16 obr + ster. AM 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X16M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.6 16 obr + ster. AC 01.1',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X16P',	85015290,	'Napęd nastawnika przeciwwybuch',	'SAEX07.6 16[1/min],F10,B3,IP68',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X16X',	85015290,	'Napęd nastawnika Auma',	'SA07.6  16 (1/min) IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X22X',	84818059,	'Napęd nastawnika Auma',	'SA07.6  22 (1/min) IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X45M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA07.6 45 obr + ster. AC 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA076X45S',	84818059,	'Napęd nastawnika regulacyjny',	'SA07.6  45/min  SAR !!!',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA101X16P',	85015290,	'Napęd nastawnika przeciwwybuch',	'SAEXC 10.1  16[1/min]',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA101X16X',	85015290,	'Napęd nastawnika',	'SA10.2  16[1/min] IP67 400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA101X22X',	85015290,	'Napęd nastawnika',	'SA10.1  22[1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA10222AM',	85015290,	'Napęd nastawnika ze sterowni-',	'SA010.2 22 obr + ster. AM 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102C63X',	85015290,	'Napęd nastawnika Auma RAL3000',	'SA10.2  63 (1/min) IP68 400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X16A',	85015290,	'Napęd nastawnika ze sterowni-',	'SA010.2 16 obr + ster. AM 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X16M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA010.2 16 obr + ster. AC 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X16X',	84818059,	'Napęd nastawnika Auma',	'SA10.2  16 (1/min) IP68 400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X22M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA010.2 22 obr + ster. AM 01.1',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X22X',	85015290,	'Napęd nastawnika Auma',	'SA10.2  22 (1/min) IP68 400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X45M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA010.2 45 obr + ster. AC 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X45S',	85015290,	'Napęd nastawnika regulacyjny',	'SA10.2  45/min  SAR !!!',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA102X45X',	85015290,	'Napęd nastawnika Auma',	'SA10.2  45 (1/min) IP68 400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA141X16X',	85015290,	'Napęd nastawnika',	'SA14.1  16[1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA141X22X',	85015290,	'Napęd nastawnika',	'SA14.1  22[1/min]  400V IP67',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA141X45X',	85015290,	'Napęd nastawnika',	'SA14.1  45[1/min]  400V  IP67',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA14222AM',	85015290,	'Napęd nastawnika',	'SA14.2  22[1/min] 400V AM02.1',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA142CZ16',	85015290,	'Napęd nastawnika (czerwony)',	'SA14.2  16[1/min] IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA142X16X',	85015290,	'Napęd nastawnika',	'SA14.2  16[1/min] IP68  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA142X22M',	85015290,	'Napęd nastawnika ze sterowni-',	'SA014.2 22 obr + ster. AC 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA142X22X',	85015290,	'Napęd nastawnika',	'SA14.2  22[1/min]  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA145X16X',	85015290,	'Napęd nastawnika',	'SA14.5  16[1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SA146X16X',	85015290,	'Napęd nastawnika',	'SA14.6  16[1/min] IP67  400V',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SAR07616M',	84818059,	'Napęd nastawn.regul. ze sterow',	'SAR07.6  16/min  AM 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AU9920SAR10216M',	84818059,	'Napęd nastawn.regul. ze sterow',	'SAR10.2  16/min  AM 01.2',	NULL,	'27.90.11.0',	'SZT'),
('AUKOLNDYSTANSXX',	0,	'Kołnierz dystansowy pod  Aumę',	'SA 07.5 / 10.1  HWK.001.03.001',	NULL,	'28.14.20.0',	'SZT'),
('AUKOLUMNAXSF142',	84819000,	'Kolumna napędu AUMA -',	'SF 14.2',	NULL,	'28.14.20.0',	'SZT'),
('AUPRZEKŁSLIMAXX',	0,	'Przekładnia ślimakowa do Aumy',	'GS63.3-F10-BZ-DG ( 25,2x19)-KX',	NULL,	'28.14.20.0',	'SZT'),
('CD3993MO150170G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 150, D170',	NULL,	'',	'SZT'),
('CD3996MO200222G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 200, D222',	NULL,	'',	'SZT'),
('CD3999MO250274G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 250, D274',	NULL,	'',	'SZT'),
('CD4002MO300326G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 300, D326',	NULL,	'',	'SZT'),
('CD4005MO080098G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 80, D98',	NULL,	'',	'SZT'),
('CD4006MO100118G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 100, D118',	NULL,	'',	'SZT'),
('CD4007MO125144G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 125, D144',	NULL,	'',	'SZT'),
('CD4008MO050066G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 50, D66',	NULL,	'',	'SZT'),
('CD4009MO060077G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 60, D77',	NULL,	'',	'SZT'),
('CD4010MO065082G',	73071990,	'Pierścień dociskowy-kompletny',	'DN 65, D82',	NULL,	'',	'SZT'),
('CD6850MO050060S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 50, D59-61',	NULL,	'',	'SZT'),
('CD6852MO080088S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 80, D89',	NULL,	'',	'SZT'),
('CD6853MO100108S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 100, D108',	NULL,	'',	'SZT'),
('CD6854MO100114S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 100, D114',	NULL,	'',	'SZT'),
('CD6855MO125133S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 125, D133',	NULL,	'',	'SZT'),
('CD6856MO150159S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 150, D159',	NULL,	'',	'SZT'),
('CD6857MO150168S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 150, D168',	NULL,	'',	'SZT'),
('CD6858MO200219S',	73071990,	'Pierścień dociskowy-kompletny',	'DN 200, D219',	NULL,	'',	'SZT'),
('CDS4009MO060077',	73071990,	'Pierścień dociskowy-kompletny',	'DN 60, D77',	NULL,	'',	'SZT'),
('CDS6850MO050060',	73071990,	'Pierścień dociskowy-kompletny',	'DN 50, D59-61',	NULL,	'',	'SZT'),
('CDS6852MO080088',	73071990,	'Pierścień dociskowy-kompletny',	'DN 80, D89',	NULL,	'',	'SZT'),
('CDS6853MO100108',	73071990,	'Pierścień dociskowy-kompletny',	'DN 100, D108',	NULL,	'',	'SZT'),
('CDS6854MO100114',	73071990,	'Pierścień dociskowy-kompletny',	'DN 100, D114',	NULL,	'',	'SZT'),
('CDS6855MO125133',	73071990,	'Pierścień dociskowy-kompletny',	'DN 125, D133',	NULL,	'',	'SZT'),
('CDS6856MO150159',	73071990,	'Pierścień dociskowy-kompletny',	'DN 150, D159',	NULL,	'',	'SZT'),
('CDS6857MO150168',	73071990,	'Pierścień dociskowy-kompletny',	'DN 150, D168',	NULL,	'',	'SZT'),
('CDS6858MO200219',	73071990,	'Pierścień dociskowy-kompletny',	'DN 200, D219',	NULL,	'',	'SZT'),
('CMOZNAB100XXXX10',	0,	'Zasuwa nożowa CMO z kółkiem',	'DN100, AB, PN10, CF8M, AISI316',	NULL,	'28.14.11.0',	'SZT'),
('CMOZNAB300XXXX06',	0,	'Zasuwa nożowa CMO',	'DN300,EPDM, PN6, CF8M, AISI316',	NULL,	'28.14.11.0',	'SZT'),
('CO4340050050W16',	84818061,	'Combi T,W',	'DN 50-50 PN 16',	NULL,	'28.14.13.0',	'SZT');

DROP TABLE IF EXISTS `order_header`;
CREATE TABLE `order_header` (
  `NO` varchar(50) NOT NULL,
  `CUSTOMERDOCNO` varchar(40) DEFAULT NULL,
  `TYPE` int(10) DEFAULT NULL,
  `STATUSID` int(10) DEFAULT NULL,
  `STATUS2ID` int(10) DEFAULT NULL,
  `DATE_ADD` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DocumentDate` datetime NOT NULL,
  `ACCEPTDATE` datetime DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `SELLTO` varchar(40) DEFAULT NULL,
  `BUYFROM` varchar(40) DEFAULT NULL,
  `SALESMAN` varchar(40) DEFAULT NULL,
  `PAYMENTTERMS` varchar(40) DEFAULT NULL,
  `AMOUNT` decimal(10,1) DEFAULT NULL,
  `NETAMOUNT` decimal(10,1) DEFAULT NULL,
  PRIMARY KEY (`NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `order_header` (`NO`, `CUSTOMERDOCNO`, `TYPE`, `STATUSID`, `STATUS2ID`, `DATE_ADD`, `DocumentDate`, `ACCEPTDATE`, `DESCRIPTION`, `SELLTO`, `BUYFROM`, `SALESMAN`, `PAYMENTTERMS`, `AMOUNT`, `NETAMOUNT`) VALUES
('wz/21/123/001',	'WZ_10/20/20',	1,	1,	NULL,	'2018-10-16 13:22:17',	'2018-10-16 13:22:17',	'2018-10-16 13:22:17',	'Komentarz do wz\'tki',	'1',	'2',	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `order_lines`;
CREATE TABLE `order_lines` (
  `ID` int(10) NOT NULL,
  `DOCUMENTNO` varchar(50) DEFAULT NULL,
  `LINENO` int(10) DEFAULT NULL,
  `QUANTITY` int(10) DEFAULT NULL,
  `DESCRIPTION` varchar(40) DEFAULT NULL,
  `ITEMCODE` varchar(40) DEFAULT NULL,
  `AMOUNT` decimal(10,2) DEFAULT NULL,
  `WEIGHT` decimal(10,1) DEFAULT NULL,
  `NETAMOUNT` decimal(10,1) DEFAULT NULL,
  `DISCOUNT` decimal(10,1) DEFAULT NULL,
  `DELIVERYDATE` datetime DEFAULT NULL,
  `QTYAVAILABLE` int(10) DEFAULT NULL,
  `QTYDUE` int(10) DEFAULT NULL,
  `QTYDELIVERED` int(10) DEFAULT NULL,
  `REGIONALWAREHOUSECODE` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `order_status`;
CREATE TABLE `order_status` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `order_type`;
CREATE TABLE `order_type` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `payment_terms`;
CREATE TABLE `payment_terms` (
  `code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `regional_warehouse`;
CREATE TABLE `regional_warehouse` (
  `CODE` varchar(40) NOT NULL,
  `USERID` int(10) DEFAULT NULL,
  PRIMARY KEY (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `regional_warehouse` (`CODE`, `USERID`) VALUES
('THAN',	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `LOGIN` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `NAME2` varchar(50) DEFAULT NULL,
  `ADRESS` varchar(50) DEFAULT NULL,
  `ADRESS2` varchar(50) DEFAULT NULL,
  `POSTCODE` varchar(20) DEFAULT NULL,
  `CITY` varchar(40) DEFAULT NULL,
  `TYPEID` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP VIEW IF EXISTS `view_inventory`;
CREATE TABLE `view_inventory` (`itemCode` varchar(40), `catalogNo` int(10), `attribute` varchar(40), `description` text, `regionalWarehouseCode` varchar(40), `spareStock` int(10), `realStock` int(10));


DROP VIEW IF EXISTS `view_invheader`;
CREATE TABLE `view_invheader` (`invoiceno` varchar(40), `documentdate` datetime, `paymentdate` datetime, `amount` decimal(10,1), `postingdescription` varchar(40), `externaldocno` varchar(40));


DROP VIEW IF EXISTS `view_invlines`;
CREATE TABLE `view_invlines` (`itemcode` varchar(40), `description` text, `attribute` varchar(40), `catalogno` int(10), `quantity` int(10), `netamount` decimal(10,1));


DROP VIEW IF EXISTS `view_mmheader`;
CREATE TABLE `view_mmheader` (`NO` varchar(50), `CUSTOMERDOCNO` varchar(40), `TYPE` int(10), `STATUSID` int(10), `STATUS2ID` int(10), `DATE_ADD` datetime, `ACCEPTDATE` datetime, `DESCRIPTION` varchar(200), `SELLTO` varchar(40), `BUYFROM` varchar(40), `SALESMAN` varchar(40), `PAYMENTTERMS` varchar(40), `AMOUNT` decimal(10,1), `NETAMOUNT` decimal(10,1));


DROP VIEW IF EXISTS `view_mmlines`;
CREATE TABLE `view_mmlines` (`ID` int(10), `DOCUMENTNO` varchar(50), `LINENO` int(10), `QUANTITY` int(10), `DESCRIPTION` varchar(40), `ITEMCODE` varchar(40), `AMOUNT` decimal(10,2), `WEIGHT` decimal(10,1), `NETAMOUNT` decimal(10,1), `DISCOUNT` decimal(10,1), `DELIVERYDATE` datetime, `QTYAVAILABLE` int(10), `QTYDUE` int(10), `QTYDELIVERED` int(10), `REGIONALWAREHOUSECODE` varchar(40));


DROP VIEW IF EXISTS `view_mmlist`;
CREATE TABLE `view_mmlist` (`NO` varchar(50), `CUSTOMERDOCNO` varchar(40), `TYPE` int(10), `STATUSID` int(10), `STATUS2ID` int(10), `DATE_ADD` datetime, `ACCEPTDATE` datetime, `DESCRIPTION` varchar(200), `SELLTO` varchar(40), `BUYFROM` varchar(40), `SALESMAN` varchar(40), `PAYMENTTERMS` varchar(40), `AMOUNT` decimal(10,1), `NETAMOUNT` decimal(10,1));


DROP VIEW IF EXISTS `view_wzheader`;
CREATE TABLE `view_wzheader` (`no` varchar(50), `acceptDate` datetime, `statusName` varchar(40), `description` varchar(200), `cname` varchar(40), `cname2` varchar(50), `cadress` varchar(50), `cadress2` varchar(50), `cpostcode` varchar(20), `ccity` varchar(40), `vname` varchar(40), `vname2` varchar(50), `vadress` varchar(50), `vadress2` varchar(50), `vpostcode` varchar(20), `vcity` varchar(40));


DROP VIEW IF EXISTS `view_wzlines`;
CREATE TABLE `view_wzlines` (`documentNo` varchar(50), `itemcode` varchar(40), `itemDescription` text, `attribute` varchar(40), `quantity` int(10), `regionalwarehousecode` varchar(40), `description` varchar(40));


DROP VIEW IF EXISTS `view_wzlist`;
CREATE TABLE `view_wzlist` (`no` varchar(50), `acceptDate` datetime, `description` varchar(200), `statusName` varchar(40));


DROP TABLE IF EXISTS `view_inventory`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_inventory` AS select `inv`.`ITEMCODE` AS `itemCode`,`it`.`CATALOGNO` AS `catalogNo`,`it`.`ATTRIBUTE` AS `attribute`,`it`.`DESCRIPTION` AS `description`,`inv`.`REGIONALWAREHOUSECODE` AS `regionalWarehouseCode`,`inv`.`spareStock` AS `spareStock`,`inv`.`realStock` AS `realStock` from (`inventory` `inv` left join `item` `it` on((`it`.`CODE` = `inv`.`ITEMCODE`)));

DROP TABLE IF EXISTS `view_invheader`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_invheader` AS select `ih`.`INVOICENO` AS `invoiceno`,`ih`.`DOCUMENTDATE` AS `documentdate`,`ih`.`PAYMENTDATE` AS `paymentdate`,`ih`.`AMOUNT` AS `amount`,`ih`.`POSTINGDESCRIPTION` AS `postingdescription`,`ih`.`EXTERNALDOCNO` AS `externaldocno` from `invoice_header` `ih`;

DROP TABLE IF EXISTS `view_invlines`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_invlines` AS select `il`.`ITEMCODE` AS `itemcode`,`it`.`DESCRIPTION` AS `description`,`it`.`ATTRIBUTE` AS `attribute`,`it`.`CATALOGNO` AS `catalogno`,`il`.`QUANTITY` AS `quantity`,`il`.`NETAMOUNT` AS `netamount` from (`item` `it` left join `invoice_lines` `il` on((`it`.`CODE` = `il`.`ITEMCODE`)));

DROP TABLE IF EXISTS `view_mmheader`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_mmheader` AS select `order_header`.`NO` AS `NO`,`order_header`.`CUSTOMERDOCNO` AS `CUSTOMERDOCNO`,`order_header`.`TYPE` AS `TYPE`,`order_header`.`STATUSID` AS `STATUSID`,`order_header`.`STATUS2ID` AS `STATUS2ID`,`order_header`.`DATE_ADD` AS `DATE_ADD`,`order_header`.`ACCEPTDATE` AS `ACCEPTDATE`,`order_header`.`DESCRIPTION` AS `DESCRIPTION`,`order_header`.`SELLTO` AS `SELLTO`,`order_header`.`BUYFROM` AS `BUYFROM`,`order_header`.`SALESMAN` AS `SALESMAN`,`order_header`.`PAYMENTTERMS` AS `PAYMENTTERMS`,`order_header`.`AMOUNT` AS `AMOUNT`,`order_header`.`NETAMOUNT` AS `NETAMOUNT` from `order_header`;

DROP TABLE IF EXISTS `view_mmlines`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_mmlines` AS select `order_lines`.`ID` AS `ID`,`order_lines`.`DOCUMENTNO` AS `DOCUMENTNO`,`order_lines`.`LINENO` AS `LINENO`,`order_lines`.`QUANTITY` AS `QUANTITY`,`order_lines`.`DESCRIPTION` AS `DESCRIPTION`,`order_lines`.`ITEMCODE` AS `ITEMCODE`,`order_lines`.`AMOUNT` AS `AMOUNT`,`order_lines`.`WEIGHT` AS `WEIGHT`,`order_lines`.`NETAMOUNT` AS `NETAMOUNT`,`order_lines`.`DISCOUNT` AS `DISCOUNT`,`order_lines`.`DELIVERYDATE` AS `DELIVERYDATE`,`order_lines`.`QTYAVAILABLE` AS `QTYAVAILABLE`,`order_lines`.`QTYDUE` AS `QTYDUE`,`order_lines`.`QTYDELIVERED` AS `QTYDELIVERED`,`order_lines`.`REGIONALWAREHOUSECODE` AS `REGIONALWAREHOUSECODE` from `order_lines`;

DROP TABLE IF EXISTS `view_mmlist`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_mmlist` AS select `order_header`.`NO` AS `NO`,`order_header`.`CUSTOMERDOCNO` AS `CUSTOMERDOCNO`,`order_header`.`TYPE` AS `TYPE`,`order_header`.`STATUSID` AS `STATUSID`,`order_header`.`STATUS2ID` AS `STATUS2ID`,`order_header`.`DATE_ADD` AS `DATE_ADD`,`order_header`.`ACCEPTDATE` AS `ACCEPTDATE`,`order_header`.`DESCRIPTION` AS `DESCRIPTION`,`order_header`.`SELLTO` AS `SELLTO`,`order_header`.`BUYFROM` AS `BUYFROM`,`order_header`.`SALESMAN` AS `SALESMAN`,`order_header`.`PAYMENTTERMS` AS `PAYMENTTERMS`,`order_header`.`AMOUNT` AS `AMOUNT`,`order_header`.`NETAMOUNT` AS `NETAMOUNT` from `order_header`;

DROP TABLE IF EXISTS `view_wzheader`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzheader` AS select `oh`.`NO` AS `no`,`oh`.`ACCEPTDATE` AS `acceptDate`,`os`.`NAME` AS `statusName`,`oh`.`DESCRIPTION` AS `description`,`c`.`NAME` AS `cname`,`c`.`NAME2` AS `cname2`,`c`.`ADRESS` AS `cadress`,`c`.`ADRESS2` AS `cadress2`,`c`.`POSTCODE` AS `cpostcode`,`c`.`CITY` AS `ccity`,`v`.`NAME` AS `vname`,`v`.`NAME2` AS `vname2`,`v`.`ADRESS` AS `vadress`,`v`.`ADRESS2` AS `vadress2`,`v`.`POSTCODE` AS `vpostcode`,`v`.`CITY` AS `vcity` from (`user` `v` left join (`user` `c` left join (`order_status` `os` left join `order_header` `oh` on((`oh`.`STATUSID` = `os`.`ID`))) on((`c`.`ID` = `oh`.`SELLTO`))) on((`v`.`ID` = `oh`.`BUYFROM`)));

DROP TABLE IF EXISTS `view_wzlines`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzlines` AS select `ol`.`DOCUMENTNO` AS `documentNo`,`ol`.`ITEMCODE` AS `itemcode`,`it`.`DESCRIPTION` AS `itemDescription`,`it`.`ATTRIBUTE` AS `attribute`,`ol`.`QUANTITY` AS `quantity`,`ol`.`REGIONALWAREHOUSECODE` AS `regionalwarehousecode`,`ol`.`DESCRIPTION` AS `description` from (`item` `it` left join `order_lines` `ol` on((`ol`.`ITEMCODE` = `it`.`CODE`)));

DROP TABLE IF EXISTS `view_wzlist`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzlist` AS select `oh`.`NO` AS `no`,`oh`.`ACCEPTDATE` AS `acceptDate`,`oh`.`DESCRIPTION` AS `description`,`os`.`NAME` AS `statusName` from (`order_header` `oh` left join `order_status` `os` on((`oh`.`STATUSID` = `os`.`ID`)));

-- 2018-10-16 11:50:26
