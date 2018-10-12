-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `ID` int(10) NOT NULL,
  `ITEMCODE` varchar(40) DEFAULT NULL,
  `REGIONALWAREHOUSECODE` varchar(40) DEFAULT NULL,
  `realStock` int(10) DEFAULT NULL,
  `spareStock` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  PRIMARY KEY (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `order_header`;
CREATE TABLE `order_header` (
  `NO` varchar(50) NOT NULL,
  `CUSTOMERDOCNO` varchar(40) DEFAULT NULL,
  `TYPE` int(10) DEFAULT NULL,
  `STATUSID` int(10) DEFAULT NULL,
  `STATUS2ID` int(10) DEFAULT NULL,
  `DATE_ADD` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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


DROP TABLE IF EXISTS `regional_warehouse`;
CREATE TABLE `regional_warehouse` (
  `CODE` varchar(40) NOT NULL,
  `USERID` int(10) DEFAULT NULL,
  PRIMARY KEY (`CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


DROP VIEW IF EXISTS `view_wzheader`;
CREATE TABLE `view_wzheader` (`no` varchar(50), `acceptDate` datetime, `statusName` varchar(40), `description` varchar(200), `cname` varchar(40), `cname2` varchar(50), `cadress` varchar(50), `cadress2` varchar(50), `cpostcode` varchar(20), `ccity` varchar(40), `vname` varchar(40), `vname2` varchar(50), `vadress` varchar(50), `vadress2` varchar(50), `vpostcode` varchar(20), `vcity` varchar(40));


DROP VIEW IF EXISTS `view_wzlines`;
CREATE TABLE `view_wzlines` (`itemcode` varchar(40), `itemDescription` text, `attribute` varchar(40), `quantity` int(10), `regionalwarehousecode` varchar(40), `description` varchar(40));


DROP VIEW IF EXISTS `view_wzlist`;
CREATE TABLE `view_wzlist` (`no` varchar(50), `acceptDate` datetime, `description` varchar(200), `statusName` varchar(40));


DROP TABLE IF EXISTS `view_inventory`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_inventory` AS select `inv`.`ITEMCODE` AS `itemCode`,`it`.`CATALOGNO` AS `catalogNo`,`it`.`ATTRIBUTE` AS `attribute`,`it`.`DESCRIPTION` AS `description`,`inv`.`REGIONALWAREHOUSECODE` AS `regionalWarehouseCode`,`inv`.`spareStock` AS `spareStock`,`inv`.`realStock` AS `realStock` from (`inventory` `inv` left join `item` `it` on((`it`.`CODE` = `inv`.`ITEMCODE`)));

DROP TABLE IF EXISTS `view_invheader`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_invheader` AS select `ih`.`INVOICENO` AS `invoiceno`,`ih`.`DOCUMENTDATE` AS `documentdate`,`ih`.`PAYMENTDATE` AS `paymentdate`,`ih`.`AMOUNT` AS `amount`,`ih`.`POSTINGDESCRIPTION` AS `postingdescription`,`ih`.`EXTERNALDOCNO` AS `externaldocno` from `invoice_header` `ih`;

DROP TABLE IF EXISTS `view_invlines`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_invlines` AS select `il`.`ITEMCODE` AS `itemcode`,`it`.`DESCRIPTION` AS `description`,`it`.`ATTRIBUTE` AS `attribute`,`it`.`CATALOGNO` AS `catalogno`,`il`.`QUANTITY` AS `quantity`,`il`.`NETAMOUNT` AS `netamount` from (`item` `it` left join `invoice_lines` `il` on((`it`.`CODE` = `il`.`ITEMCODE`)));

DROP TABLE IF EXISTS `view_wzheader`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzheader` AS select `oh`.`NO` AS `no`,`oh`.`ACCEPTDATE` AS `acceptDate`,`os`.`NAME` AS `statusName`,`oh`.`DESCRIPTION` AS `description`,`c`.`NAME` AS `cname`,`c`.`NAME2` AS `cname2`,`c`.`ADRESS` AS `cadress`,`c`.`ADRESS2` AS `cadress2`,`c`.`POSTCODE` AS `cpostcode`,`c`.`CITY` AS `ccity`,`v`.`NAME` AS `vname`,`v`.`NAME2` AS `vname2`,`v`.`ADRESS` AS `vadress`,`v`.`ADRESS2` AS `vadress2`,`v`.`POSTCODE` AS `vpostcode`,`v`.`CITY` AS `vcity` from (`user` `v` left join (`user` `c` left join (`order_status` `os` left join `order_header` `oh` on((`oh`.`STATUSID` = `os`.`ID`))) on((`c`.`ID` = `oh`.`SELLTO`))) on((`v`.`ID` = `oh`.`BUYFROM`)));

DROP TABLE IF EXISTS `view_wzlines`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzlines` AS select `ol`.`ITEMCODE` AS `itemcode`,`it`.`DESCRIPTION` AS `itemDescription`,`it`.`ATTRIBUTE` AS `attribute`,`ol`.`QUANTITY` AS `quantity`,`ol`.`REGIONALWAREHOUSECODE` AS `regionalwarehousecode`,`ol`.`DESCRIPTION` AS `description` from (`item` `it` left join `order_lines` `ol` on((`ol`.`ITEMCODE` = `it`.`CODE`)));

DROP TABLE IF EXISTS `view_wzlist`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_wzlist` AS select `oh`.`NO` AS `no`,`oh`.`ACCEPTDATE` AS `acceptDate`,`oh`.`DESCRIPTION` AS `description`,`os`.`NAME` AS `statusName` from (`order_header` `oh` left join `order_status` `os` on((`oh`.`STATUSID` = `os`.`ID`)));

-- 2018-10-12 11:50:23
