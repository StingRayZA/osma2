
--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `client` varchar(50) NOT NULL,
  `rhEmail` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(20) DEFAULT NULL,
  `lob` varchar(100) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `question11` int(2) DEFAULT NULL,
  `question12` int(2) DEFAULT NULL,
  `question13` int(2) DEFAULT NULL,
  `question14` int(2) DEFAULT NULL,
  `question15` int(2) DEFAULT NULL,
  `question21` int(2) DEFAULT NULL,
  `question22` int(2) DEFAULT NULL,
  `question23` int(2) DEFAULT NULL,
  `question24` int(2) DEFAULT NULL,
  `question25` int(2) DEFAULT NULL,
  `question26` int(2) DEFAULT NULL,
  `question31` int(2) DEFAULT NULL,
  `question32` int(2) DEFAULT NULL,
  `question33` int(2) DEFAULT NULL,
  `question41` int(2) DEFAULT NULL,
  `question42` int(2) DEFAULT NULL,
  `question43` int(2) DEFAULT NULL,
  `question44` int(2) DEFAULT NULL,
  `question51` int(2) DEFAULT NULL,
  `question52` int(2) DEFAULT NULL,
  `question53` int(2) DEFAULT NULL,
  `area1_comments` text DEFAULT NULL,
  `area2_comments` text DEFAULT NULL,
  `area3_comments` text DEFAULT NULL,
  `area4_comments` text DEFAULT NULL,
  `area5_comments` text DEFAULT NULL,
  `area6_comments` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

