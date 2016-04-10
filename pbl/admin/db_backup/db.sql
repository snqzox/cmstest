CREATE DATABASE IF NOT EXISTS `pbl` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `pageMain` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `pageAbout` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `content` TEXT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `pageServices` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

    CREATE TABLE IF NOT EXISTS `services` (
      `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
      `title` varchar(250) NOT NULL,
      `subtitle` varchar(500) NOT NULL,
      `content` TEXT,
      `subservice` BOOLEAN,
      `page_id` mediumint(9) NOT NULL,
      PRIMARY KEY (`ID`),
      FOREIGN KEY (`page_id`) REFERENCES pageServices(`ID`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
  
        CREATE TABLE IF NOT EXISTS `articles` (
          `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
          `title` varchar(250) NOT NULL,
          `subtitle` varchar(500),
          `content` TEXT,
          `subservice_id` mediumint(9) NOT NULL,
          PRIMARY KEY (`ID`),
          FOREIGN KEY (`subservice_id`) REFERENCES services(`ID`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
        
CREATE TABLE IF NOT EXISTS `pageReferences` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

      CREATE TABLE IF NOT EXISTS `subsidies` (
            `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
            `title` varchar(250) NOT NULL,
            `subject` varchar(1500) NOT NULL,
            `client` varchar(1500) NOT NULL,
            `price` varchar(150) NOT NULL,
            `content` TEXT,
            `page_id` mediumint(9) NOT NULL,
            PRIMARY KEY (`ID`),
            FOREIGN KEY (`page_id`) REFERENCES pageReferences(`ID`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
        
      CREATE TABLE IF NOT EXISTS `studios` (
            `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
            `title` varchar(250) NOT NULL,
            `client` varchar(1500) NOT NULL,
            `costs` varchar(150) NOT NULL,
            `PD` varchar(150) NOT NULL,
            `content` TEXT,
            `page_id` mediumint(9) NOT NULL,
            PRIMARY KEY (`ID`),
            FOREIGN KEY (`page_id`) REFERENCES pageReferences(`ID`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
        

        CREATE TABLE IF NOT EXISTS `activities` (
            `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
            `title` varchar(250) NOT NULL,
            `client` varchar(1500) NOT NULL,
            `investition` varchar(150) NOT NULL,
            `content` TEXT,
            `page_id` mediumint(9) NOT NULL,
            PRIMARY KEY (`ID`),
            FOREIGN KEY (`page_id`) REFERENCES pageReferences(`ID`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
        
        CREATE TABLE IF NOT EXISTS `defaultRefs` (
            `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
            `title` varchar(1000) NOT NULL,
            `subtitle` varchar(1000) NOT NULL,
            `content` TEXT,
            `page_id` mediumint(9) NOT NULL,
            PRIMARY KEY (`ID`),
            FOREIGN KEY (`page_id`) REFERENCES pageReferences(`ID`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;      


CREATE TABLE IF NOT EXISTS `contact` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `company` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `psc_city` varchar(500) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `dic` varchar(100) NOT NULL,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;


        CREATE TABLE IF NOT EXISTS `attachments` (
        `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
        `title` varchar(250) NOT NULL,
        `whole_path` varchar(500) NOT NULL,
        `article_id` mediumint(9) DEFAULT NULL,
        `subsidy_id` mediumint(9) DEFAULT NULL,
        `studio_id` mediumint(9) DEFAULT NULL,
        `activity_id` mediumint(9) DEFAULT NULL,
        `defaultRef_id` mediumint(9)DEFAULT NULL,
         PRIMARY KEY (`ID`),
         FOREIGN KEY (`article_id`) REFERENCES articles(`ID`) on delete cascade,               
         FOREIGN KEY (`subsidy_id`) REFERENCES subsidies(`ID`) on delete cascade,
         FOREIGN KEY (`studio_id`) REFERENCES studios(`ID`) on delete cascade,               
         FOREIGN KEY (`activity_id`) REFERENCES activities(`ID`) on delete cascade,               
         FOREIGN KEY (`defaultRef_id`) REFERENCES defaultRefs(`ID`) on delete cascade
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;


/*INSERT VALUES*/
INSERT INTO pageMain (id, title, subtitle)
VALUES ('5','HLAVNA','HLAVNA STRANKA');

INSERT INTO pageAbout (id, title, subtitle,content)
VALUES ('5','ABOUT','ABOUT STRANKA','OBSAH ABOUT');

INSERT INTO pageServices (id, title)
VALUES ('5','SERVICE');

INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('5','SERVICE1','SERVICE 1 STRANKA','OBSAH SERVICE1',FALSE,5);
INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('6','SUB_SERVICE2','SUB_SERVICE 2 STRANKA','OBSAH SERVICE2',TRUE,5);
INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('7','SUB_SERVICE3','SUB_SERVICE 3 STRANKA','OBSAH SUB_SERVICE3',TRUE,5);
INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('8','SUB_SERVICE4','SUB_SERVICE 4 STRANKA','OBSAH SUB_SERVICE4',TRUE,5);
INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('9','SERVICE2','SERVICE 2 STRANKA','OBSAH SERVICE2',FALSE,5);
INSERT INTO services (id, title, subtitle, content, subservice, page_id)
VALUES ('10','SERVICE3','SERVICE 3 STRANKA','OBSAH SERVICE3',FALSE,5);

INSERT INTO articles (id, title, subtitle, content, subservice_id)
VALUES ('5','CLANOK SUBSERVICE 1','CLANOK','OBSAH',6);
INSERT INTO articles (id, title, subtitle, content, subservice_id)
VALUES ('6','CLANOK SUBSERVICE 2','CLANOK','OBSAH',7);
INSERT INTO articles (id, title, subtitle, content, subservice_id)
VALUES ('7','CLANOK SUBSERVICE 3','CLANOK','OBSAH',8);


INSERT INTO pageReferences (id, title, subtitle)
VALUES ('5','REFERENCIE','REFERENCIE STRANKA');

INSERT INTO subsidies (id, title, subject, client, price, content, page_id)
VALUES ('5','DOTACE1','STAVEBNI DOTACE','ZIGOSTAV','1900 kc','OBSAH DOTACE',5);

INSERT INTO studios (id, title, client, costs, PD, content, page_id)
VALUES ('5','ATELIER 1','PROJEKCNI FIRMA','100 tisic','stupen PD','OBSAH STRANKY PROJEKCNI ATELIER',5);

INSERT INTO activities (id, title, client, investition, content, page_id)
VALUES ('5','REALITNI CINNOST 1','REALITNI KANCELAR','100 tisic euro','OBSAH STRANKY REALITNI CINNOST 1',5);

INSERT INTO defaultRefs (id, title, subtitle, content, page_id)
VALUES ('5','OBECNA REFERENCE 1','PODNAZOV 1','OBSAH STRANKY OBECNA REFERENCE 1',5);

INSERT INTO contact (id, email, mobile, company, address, psc_city, ic, dic)
VALUES ('5','@','1234','SPOLOCNOST','Adresa','1234 ZIG', 'ICO566', 'DICO098');

INSERT INTO attachments (id, title, whole_path, article_id)
VALUES ('5','ARTICLE ATTACH','CESTA',5);
INSERT INTO attachments (id, title, whole_path, subsidy_id)
VALUES ('6','SUBSIDY ATTACH','CESTA',5);
INSERT INTO attachments (id, title, whole_path, studio_id)
VALUES ('7','STUDIO ATTACH','CESTA',5);
INSERT INTO attachments (id, title, whole_path, activity_id)
VALUES ('8','ACTIVITY ATTACH','CESTA',5);
INSERT INTO attachments (id, title, whole_path, defaultRef_id)
VALUES ('9','DEFAULT REF ATTACH','CESTA',5);