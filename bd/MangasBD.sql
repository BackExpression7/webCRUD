
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(33) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `manga` (
  `manga_id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_title` varchar(50) NOT NULL,
  `manga_author` varchar(50) NOT NULL,
  `manga_genre` varchar(7) NOT NULL,
  `manga_chapter_tally` mediumint(9) NOT NULL,
  PRIMARY KEY (`manga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO `manga` VALUES (1,'Berserk','Kentarou Miura','Seinen',374),(3,'JoJo no Kimyou na Bouken Part 7: Steel Ball Run','Hirohiko Araki','Shounen',96),(4,'Fullmetal Alchemist','Irakawa Himoru','Shounen',116),(5,'Monster','Urasawa Naoki','Seinen',162),(6,'One piece','Oda Eiichiro','Shounen',807),(7,'Vagabond','Inoue Takehiko','Seinen',327),(8,'Oyasumi punpun','Inio Asano','Seinen',147),(9,'Kingdom','Hara Yasuhisa ','Seinen',561),(10,'Grand blue','Inoue Kenji','Comedy',414),(11,'Slam Dunk','Inoue Takehiko ','Shounen',276),(12,'20th Century Boys','Urasawa Naoki','Seinen',249),(13,'Solo Leveling','Chugong','Fantasy',303),(14,'Monogatari Series: First Season','NISIO ISIN ','Mystery',107),(15,'Made in Abyss','Tsukushi Akihito','Sci-Fi',150),(16,'My Youth Romantic Comedy Is Wrong, As I Expected','Watari Wataru','Comedy',550),(17,'GTO','Fujisawa Tohru','Comedy',208),(18,'Spice & Wolf','Hasekura Isuna ','Drama',60),(19,'Kaguya-sama: Love is War','Akasaka Aka','Comedy',216),(20,'Yotsuba&!','Azuma Kiyohiko','Comedy',500),(21,'Vinland Saga','Yukimura Makoto ','Seinen',498);

CREATE TABLE `reading` (
  `user_id` int(11) NOT NULL,
  `manga_id` int(11) NOT NULL,
  `current_chapter` mediumint(9) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `read_status` varchar(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `manga_id` (`manga_id`),
  CONSTRAINT `reading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `reading_ibfk_2` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`manga_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
