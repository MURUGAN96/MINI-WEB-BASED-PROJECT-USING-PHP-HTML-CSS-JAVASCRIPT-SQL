CREATE TABLE `collegue` (
`id` int(11) NOT NULL auto_increment,
`firstname` varchar(32) NOT NULL,
`lastname` varchar(32) NOT NULL,
`stationary_item` varchar(50),
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;


INSERT INTO `collegue` VALUES(1, 'Bob', 'Baker','Notebooks');
INSERT INTO `collegue` VALUES(2, 'Tim', 'Thomas','pen');
INSERT INTO `collegue` VALUES(3, 'Rachel', 'Roberts','Notebooks');
INSERT INTO `collegue` VALUES(4, 'Sam', 'Smith','pen');