CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `projectID` int(11) DEFAULT NULL,
  `stageID` int(11) DEFAULT NULL,
  `questionID` int(11) DEFAULT NULL,
  `url` text,
  `title` text,
  `source` text,
  `query` text,
  `startTimestamp` int(11) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `clientStartTimestamp` bigint(20) DEFAULT NULL,
  `clientStartDate` date DEFAULT NULL,
  `clientStartTime` time DEFAULT NULL,
  `bookmark` tinyint(1) DEFAULT NULL,
  `snippet` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `endTimestamp` int(11) DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `clientEndTimestamp` bigint(20) DEFAULT NULL,
  `clientEndDate` date DEFAULT NULL,
  `clientEndTime` time DEFAULT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;