# Host: localhost:4000  (Version 5.5.45)
# Date: 2020-10-31 09:16:47
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "bakimdayiz_access_alltime"
#

CREATE TABLE `bakimdayiz_access_alltime` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) DEFAULT '127.0.0.1',
  `User_Agent` varchar(255) DEFAULT 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41',
  `Last_Time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "bakimdayiz_access_alltime"
#


#
# Structure for table "bakimdayiz_access_firsttime"
#

CREATE TABLE `bakimdayiz_access_firsttime` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) DEFAULT '127.0.0.1',
  `User_Agent` varchar(255) DEFAULT 'User-Agent Bulunamadi!',
  `DTime` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "bakimdayiz_access_firsttime"
#


#
# Structure for table "bakimdayiz_photos"
#

CREATE TABLE `bakimdayiz_photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Min_Quantity` int(11) NOT NULL DEFAULT '0',
  `PhotoURL` varchar(500) NOT NULL DEFAULT 'https://www.vippng.com/png/full/375-3750100_404-404-png.png',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "bakimdayiz_photos"
#

INSERT INTO `bakimdayiz_photos` VALUES (1,25,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(2,50,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(3,75,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(4,100,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(5,125,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(6,150,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(7,200,'https://www.vippng.com/png/full/375-3750100_404-404-png.png'),(8,250,'https://www.vippng.com/png/full/375-3750100_404-404-png.png');
