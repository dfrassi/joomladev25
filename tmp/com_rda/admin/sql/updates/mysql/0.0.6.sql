DROP TABLE IF EXISTS `#__rda`;

CREATE TABLE `#__rda` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__rda` (`greeting`) VALUES
	('rda!'),
	('Good bye World!');

