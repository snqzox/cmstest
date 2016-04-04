CREATE TABLE IF NOT EXISTS `main` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `about` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `content` TEXT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `services` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `content` TEXT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `references` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` TEXT,
  `img_path` varchar(200),
  `service` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `company` varchar(500) NOT NULL,
  `addres` varchar(500) NOT NULL,
  `psc_city` varchar(500) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `dic` varchar(100) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
