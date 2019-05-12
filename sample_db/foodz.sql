-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: foodz
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `ingredient_id` int(5) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(50) NOT NULL DEFAULT 'Inget namn',
  `ingredient_name_plural` varchar(50) NOT NULL DEFAULT ' ',
  PRIMARY KEY (`ingredient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Gurka','Gurkor'),(2,'quornbitar','quornbitar'),(3,'Vitlöksklyfta','Vitlöksklyftor'),(4,'gröna ärter','gröna ärter'),(5,'vatten','vatten'),(6,'grönsaksbuljong','grönsaksbuljong'),(7,'vetemjöl','vetemjöl'),(11,'Tomat','tomater'),(12,'Parmesan','Parmesan'),(13,'salt','salt'),(14,'Havregryn','Havregryn'),(15,'Röd Paprika','röda paprikor'),(16,'Gul Paprika','gula Paprikor'),(17,'Grön Paprika','Gröna Paprikor'),(18,'Isbergssallad','Isbergssallad'),(19,'Riven ost','Riven ost'),(20,'svartpeppar','svartpeppar'),(21,'vitpeppar','vitpeppar'),(22,'matlagningsgrädde','matlagningsgrädde'),(23,'Champinjoner','Champinjoner'),(24,'Smör eller margarin','Smör eller margarin'),(25,'lätt crème fraiche (franska örter)','lätt crème fraiche (franska örter)'),(26,'tagliatelle','tagliatelle'),(27,'Zucchini','Zucchinier'),(28,'Olivolja','Olivolja'),(29,'Tofu','Tofu'),(30,'Gul Lök','Gula Lökar'),(31,'Potatis','potatisar'),(32,'Morot','morötter'),(33,'Squash','Squasher'),(34,'persilja','persilja'),(35,'soja','soja'),(36,'kapris','kapris'),(37,'Kikärtor','Kikärtor'),(38,'ägg','ägg'),(39,'koriander','koriander'),(40,'spiskummin','spiskummin'),(41,'chiliflakes','chiliflakes'),(42,'Vegetarisk kebab','Vegetarisk kebab'),(43,'rapsolja','rapsolja'),(44,'Rödlök','Rödlökar'),(45,'Medelstort Tortillabröd','Medelstora Tortillabröd'),(46,'salladsblad','salladsblad'),(47,'matlagningsyoghurt','matlagningsyoghurt'),(48,'mynta','mynta'),(49,'Bakpotatis','Bakpotatisar'),(50,'timjan','timjan'),(51,'peppar','peppar'),(52,'ströbröd','ströbröd'),(53,'quornfärs','quornfärs'),(54,'ajvar relish','ajvar relish'),(55,'margarin','margarin'),(56,'soltorkade tomater','soltorkade tomater'),(57,'balsamvinäger','balsamvinäger'),(58,'russin','russin'),(59,'Socker','Socker'),(60,'Chilifrukt','Chilifrukter'),(61,'krossade tomater','krossade tomater'),(62,'Fiberpasta','Fiberpasta'),(63,'Halloumi','Halloumi'),(64,'Pesto','Pesto'),(65,'lätt crème fraiche','lätt crème fraiche'),(66,'Ruccola','Ruccola'),(67,'Mjölk','Mjölk'),(68,'Pulled oumph','Pulled oumph'),(69,'Oumph the filet','Oumph the filet'),(70,'salt och peppar','salt och peppar'),(71,'frysta bär','frysta bär'),(72,'sylt','sylt'),(73,'naturell färskost','naturell färskost'),(74,'potatismjöl','potatismjöl'),(75,'sambal oelek','sambal oelek'),(76,'matolja','matolja'),(77,'couscous','couscous'),(78,'sallad','sallad'),(79,'maizena','maizena'),(80,'färsk persilja','färsk persilja'),(81,'ris','ris'),(82,'majsstärkelse','majsstärkelse'),(83,'curry','curry'),(84,'mango chutney','mango chutney'),(85,'Pizzakrydda','pizzakrydda'),(86,'Citron','Citroner'),(87,'Babyspenat','Babyspenat'),(88,'Bakpulver','Bakpulver'),(89,'Salladslök','Salladslökar'),(90,'kallt vatten','kallt vatten'),(91,'Mozzarella (125 g)','Mozzarella (125 g)'),(92,'Paprikapulver','paprikapulver'),(93,'körsbärstomat','körsbärstomater'),(94,'färsk basilika','färsk basilika'),(95,'Avorioris','Avorioris'),(96,'kokta gröna linser','kokta gröna linser'),(97,'passerade tomater','passerade tomater'),(98,'tapenad soltorkade tomater','tapenad soltorkade tomater'),(99,'majs','majs'),(100,'Lasagneplatta','Lasagneplattor'),(101,'pastasås fyra ostar','pastasås fyra ostar'),(102,'vitvinsvinäger','vitvinsvinäger'),(103,'krossade tomater med basilika','krossade tomater med basilika'),(104,'rotselleri','rotselleri'),(105,'vegetarisk pytt','vegetarisk pytt'),(106,'sojabönor','sojabönor'),(107,'kruka Oregano','krukor Oregano'),(108,'fetaost','fetaost'),(109,'palsternacka','palsternacka'),(110,'torkad timjan','torkad timjan'),(111,'blandad svamp','blandad svamp'),(112,'haricots verts','haricots verts'),(113,'bröd till servering','bröd till servering'),(114,'Purjolök','Purjolök'),(115,'Äpple','Äpplen'),(116,'Tomatpuré','Tomatpuré'),(117,'dijonsenap','dijonsenap'),(118,'ananasring','ananasringar'),(119,'äggnudlar','äggnudlar'),(120,'naturell tofu','naturell tofu'),(121,'sesamolja','sesamolja');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL DEFAULT 'Ny meny',
  `menu_createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menu_duration` int(4) NOT NULL DEFAULT '0',
  `menu_start_date` date NOT NULL DEFAULT '2017-01-01',
  `menu_recipes` varchar(600) NOT NULL DEFAULT '{}',
  `menu_owner_id` int(5) NOT NULL DEFAULT '1',
  `menu_comments` varchar(300) NOT NULL DEFAULT '',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'V39','2017-09-23 13:49:49',7,'2017-09-26','{\"0\":{\"id\":\"19\", \"serves\":\"4\"},\"1\":{\"id\":\"7\", \"serves\":\"4\"},\"2\":{\"id\":\"3\", \"serves\":\"4\"},\"3\":{\"id\":\"5\", \"serves\":\"4\"},\"4\":{\"id\":\"23\", \"serves\":\"4\"},\"5\":{\"id\":\"28\", \"serves\":\"4\"},\"6\":{\"id\":\"12\", \"serves\":\"4\"}}',1,''),(2,'V40','2017-09-23 17:23:45',7,'2017-09-26','{\"0\":{\"id\":\"3\", \"serves\":\"4\"},\"1\":{\"id\":\"3\", \"serves\":\"4\"},\"2\":{\"id\":\"3\", \"serves\":\"4\"},\"3\":{\"id\":\"3\", \"serves\":\"4\"},\"4\":{\"id\":\"3\", \"serves\":\"4\"},\"5\":{\"id\":\"3\", \"serves\":\"4\"},\"6\":{\"id\":\"3\", \"serves\":\"4\"}}',1,''),(3,'V41','2017-09-23 17:24:01',7,'2017-09-26','{\"0\":{\"id\":\"3\", \"serves\":\"4\"},\"1\":{\"id\":\"3\", \"serves\":\"4\"},\"2\":{\"id\":\"3\", \"serves\":\"4\"},\"3\":{\"id\":\"3\", \"serves\":\"4\"},\"4\":{\"id\":\"3\", \"serves\":\"4\"},\"5\":{\"id\":\"3\", \"serves\":\"4\"},\"6\":{\"id\":\"3\", \"serves\":\"4\"}}',1,'');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `recipe_id` int(5) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(100) NOT NULL DEFAULT 'Nytt recept',
  `recipe_createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recipe_cooktime` int(4) NOT NULL DEFAULT '0',
  `recipe_ingredients` varchar(2000) NOT NULL DEFAULT '{"0":{"title":"default","items":{}}}',
  `recipe_rating` int(2) NOT NULL DEFAULT '-1',
  `recipe_serves` int(2) NOT NULL DEFAULT '4',
  `recipe_imageformat` varchar(5) NOT NULL DEFAULT 'jpg',
  `recipe_description` varchar(2000) NOT NULL DEFAULT 'Ingen beskrivning',
  `recipe_tags` varchar(500) NOT NULL DEFAULT 'no tags',
  `recipe_owner_id` int(5) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (3,'Tagliatelle med champinjoner, vitlök, ärter och parmesan','2017-06-26 11:11:28',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"3\",\"amount\":\"2\"},\"1\":{\"id\":\"23\",\"amount\":\"250 g\"},\"2\":{\"id\":\"24\",\"amount\":\"3 msk\"},\"3\":{\"id\":\"25\",\"amount\":\"2 dl\"},\"4\":{\"id\":\"4\",\"amount\":\"2 dl\"},\"5\":{\"id\":\"70\",\"amount\":\"\"},\"6\":{\"id\":\"26\",\"amount\":\"4 port.\"},\"7\":{\"id\":\"12\",\"amount\":\"1 dl riven\"}}}}',4,4,'jpg','<b>1.</b> Skala och finhacka vitlöken. Skiva champinjonerna.<br>\r\n<b>2.</b> Stek champinjonerna i matfettet tillsammans med vitlöken. Rör ner crème fraiche och koka upp tillsammans med ärter. Smaksätt med salt och svartpeppar.<br>\r\n<b>3.</b> Koka tagliatelle enligt anvisningen på förpackningen.<br>\r\n<b>4.</b> Späd champinjonsåsen med 1-2 dl av pastakokvattnet (för 4 port), häll av pastan och blanda med såsen, smaksätt med salt och peppar.<br>\r\n<b>5.</b> Servera pastan med riven parmesanost.','no tags',-1),(4,'Pytt i panna','2017-06-27 08:09:01',30,'{\"0\":{\"title\":\"Vegetarisk pyttipanna\",\"items\":{\"0\":{\"id\":\"3\", \"amount\":\"2\"},\"1\":{\"id\":\"15\", \"amount\":\"2\"},\"2\":{\"id\":\"20\", \"amount\":\"1 krm\"},\"3\":{\"id\":\"23\", \"amount\":\"200 g\"},\"4\":{\"id\":\"29\", \"amount\":\"250 g\"},\"5\":{\"id\":\"30\", \"amount\":\"2\"},\"6\":{\"id\":\"31\", \"amount\":\"6\"},\"7\":{\"id\":\"32\", \"amount\":\"2\"},\"8\":{\"id\":\"33\", \"amount\":\"1\"}}},\"1\":{\"title\":\"Servera med\",\"items\":{\"0\":{\"id\":\"34\", \"amount\":\"1 dl\"},\"1\":{\"id\":\"35\", \"amount\":\"\"},\"2\":{\"id\":\"36\", \"amount\":\"\"},\"3\":{\"id\":\"38\", \"amount\":\"4\"}}}}',2,4,'jpg','<ol><li>Hacka lök och vitlök i små bitar. Fräs i olja i en stekpanna. Skär potatis, morötter och tofu i bitar och blanda ner med löken. Stek i ca 10-15 minuter.\r\n</li><li>Skär under tiden squash och paprika i små bitar och blanda ner med resten och stek ytterligare 10 minuter eller tills potatisen är mjuk. Smaka av med salt och peppar\r\n</li><li>Skiva champinjonerna i fjärdedelar och fräs i smör i en stekpanna. Blanda med övriga ingredienser. Stek ägg i lite smör.\r\n</li></ol>\r\nServera med kapris, soja och ev. stekta ägg','no tags',-1),(5,'Vegetarisk kebab med myntayoghurt','2017-06-27 13:21:41',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"3\",\"amount\":\"1 riven\"},\"1\":{\"id\":\"11\",\"amount\":\"2 hackade\"},\"2\":{\"id\":\"15\",\"amount\":\"1 strimlad\"},\"3\":{\"id\":\"32\",\"amount\":\"2 rivna\"},\"4\":{\"id\":\"42\",\"amount\":\"1 påse\"},\"5\":{\"id\":\"43\",\"amount\":\"1 msk\"},\"6\":{\"id\":\"44\",\"amount\":\"1 skivad\"},\"7\":{\"id\":\"45\",\"amount\":\"4\"},\"8\":{\"id\":\"46\",\"amount\":\"2 nävar\"},\"9\":{\"id\":\"47\",\"amount\":\"8 msk\"},\"10\":{\"id\":\"48\",\"amount\":\"4 msk hackad\"},\"11\":{\"id\":\"70\",\"amount\":\"\"}}}}',3,4,'jpg','<ol><li>Fräs kebabbitarna tillsammans med lök och paprika. </li><li>Placera tortillabröden i varsin skål och fyll dem med sallad, kebabfräs, morot och tomat. </li><li>Blanda yoghurten med vitlök, mynta, salt och peppar och klicka över.</li></ol>','no tags',-1),(6,'Quornbullar med tomatsalsa och potatishalvor','2017-06-27 13:29:29',60,'{\"0\":{\"title\":\"Potatishalvor\",\"items\":{\"0\":{\"id\":\"13\",\"amount\":\"½ tsk\"},\"1\":{\"id\":\"49\",\"amount\":\"2 stora\"},\"2\":{\"id\":\"50\",\"amount\":\"½ tsk\"},\"3\":{\"id\":\"51\",\"amount\":\"½ tsk\"}}},\"1\":{\"title\":\"Quornbullar\",\"items\":{\"0\":{\"id\":\"5\",\"amount\":\"2 dl\"},\"1\":{\"id\":\"13\",\"amount\":\"½ tsk\"},\"2\":{\"id\":\"24\",\"amount\":\"1 msk\"},\"3\":{\"id\":\"30\",\"amount\":\"1 st\"},\"4\":{\"id\":\"38\",\"amount\":\"1 st\"},\"5\":{\"id\":\"51\",\"amount\":\"½ tsk\"},\"6\":{\"id\":\"52\",\"amount\":\"3 dl\"},\"7\":{\"id\":\"53\",\"amount\":\"300 g\"},\"8\":{\"id\":\"54\",\"amount\":\"2 msk\"}}},\"2\":{\"title\":\"Tomatsalsa\",\"items\":{\"0\":{\"id\":\"13\",\"amount\":\"2 krm\"},\"1\":{\"id\":\"44\",\"amount\":\"1 st\"},\"2\":{\"id\":\"56\",\"amount\":\"1 dl\"},\"3\":{\"id\":\"57\",\"amount\":\"2 msk\"},\"4\":{\"id\":\"58\",\"amount\":\"½ dl\"},\"5\":{\"id\":\"59\",\"amount\":\"1 tsk\"},\"6\":{\"id\":\"60\",\"amount\":\"1 färsk\"},\"7\":{\"id\":\"61\",\"amount\":\"½ burk\"}}}}\n',4,4,'jpg','<b>1.</b> Sätt ugnen på 200ºC.<br>\r\n<b>2.</b> Potatis: Tvätta och dela potatisen på längden, skär bort en liten bit i botten så halvorna står stadigt på ugnsplåten med den stora snittytan uppåt. Krydda med salt, peppar och timjan. Baka potatisen 40 min.<br>\r\n<b>3.</b> Quornbullar: Häll vattnet på hälften av ströbrödet i en bunke och låt den svälla några minuter. Blanda i quorn, ägg, ajvar, hackad gul lök och krydda med salt och peppar.<br>\r\n<b>4.</b> Forma bullarna med hjälp av en blöt matsked och vänd dem i det resterande ströbrödet.<br>\r\n<b>5.</b> Häll kokande vatten över de soltorkade tomaterna och låt dra i 10 min. Slå bort vattnet.<br>\r\n<b>6.</b> Tomatsalsa: Hacka tomaterna. Blanda fint skivad rödlök, balsamvinäger, russin, socker, finhackad chilli, krossade tomater och soltorkade tomater i en kastrull och koka på medelhög värme i 10 min. Smaka av med salt.<br>\r\n<b>7.</b> Stek bullarna i matfettet tills de är genomvarma, 3-4 min. Servera quornbullarna med tomatsalsa och potatishalvor.','no tags',-1),(11,'Pasta pesto med halloumi','2017-07-03 15:57:10',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"62\",\"amount\":\"4 portioner\"},\"1\":{\"id\":\"11\",\"amount\":\"3 st\"},\"2\":{\"id\":\"63\",\"amount\":\"400 g\"},\"3\":{\"id\":\"28\",\"amount\":\"2 tsk\"},\"4\":{\"id\":\"65\",\"amount\":\"1/2 dl\"},\"5\":{\"id\":\"67\",\"amount\":\"1/2 dl\"},\"6\":{\"id\":\"64\",\"amount\":\"3 msk\"},\"7\":{\"id\":\"66\",\"amount\":\"65 g\"}}}}',4,4,'jpg','1. Koka pastan enligt anvisningen på förpackningen.<br>\r\n2. Skölj och tärna tomaterna.  <br>\r\n3. Bryt eller skär halloumin i bitar och stek den i olivoljan.<br>\r\n4. Blanda pastan med crème fraiche, mjölk, pesto, halloumi och tomater. Toppa med ruccolan och servera.','no tags',-1),(12,'Pannkakor - grundsmet','2017-07-04 10:31:25',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"7\",\"amount\":\"2.5 dl\"},\"1\":{\"id\":\"13\",\"amount\":\"0.5 tsk\"},\"2\":{\"id\":\"24\",\"amount\":\"3 msk\"},\"3\":{\"id\":\"38\",\"amount\":\"3\"},\"4\":{\"id\":\"67\",\"amount\":\"6 dl\"}}}}',5,4,'jpg','<ol><li>Blanda mjöl och salt i en bunke. Vispa i hälften av mjölken och vispa till en slät smet. Vispa i resten av mjölken och äggen.</li><li>Smält smöret i stekpannan och vispa ner i smeten. Stek tunna pannkakor av smeten i en stek- eller pannkakspanna.</li><li>Servera med sylt, bär eller frukt.</li></ol>','no tags',-1),(13,'Grillade quornbiffar med hetta','2017-07-04 11:50:21',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"13\",\"amount\":\"1 tsk\"},\"1\":{\"id\":\"38\",\"amount\":\"1\"},\"2\":{\"id\":\"53\",\"amount\":\"1\"},\"3\":{\"id\":\"73\",\"amount\":\"100 g\"},\"4\":{\"id\":\"74\",\"amount\":\"3 msk\"},\"5\":{\"id\":\"75\",\"amount\":\"1.5 tsk\"},\"6\":{\"id\":\"76\",\"amount\":\"2 msk\"}}},\"1\":{\"title\":\"Eventuellt till servering\",\"items\":{\"0\":{\"id\":\"77\",\"amount\":\"\"},\"1\":{\"id\":\"47\",\"amount\":\"\"},\"2\":{\"id\":\"78\",\"amount\":\"\"}}}}',-1,4,'jpg','<ol><li>Halvtina färsen.</li><li>Blanda färsen med ägg, färskost, potatismjöl, sambal oelek och salt. Forma färsen till små biffar. Pensla dem med olja. Grilla biffarna ca 4 min per sida.</li><li>Servera de nygrillade quornbiffarna med couscous eller ris, sallad och en klick matyoghurt eller i pitabröd med strimlad sallad, tomater, rödlök och feferoni.</li></ol>','no tags',-1),(14,'Lättgjorda kikärtsbiffar','2017-07-04 15:48:55',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"3\",\"amount\":\"1\"},\"1\":{\"id\":\"13\",\"amount\":\"0.5 tsk\"},\"2\":{\"id\":\"24\",\"amount\":\"\"},\"3\":{\"id\":\"30\",\"amount\":\"1\"},\"4\":{\"id\":\"37\",\"amount\":\"2 burkar\"},\"5\":{\"id\":\"38\",\"amount\":\"1\"},\"6\":{\"id\":\"51\",\"amount\":\"1 krm\"},\"7\":{\"id\":\"79\",\"amount\":\"1 msk\"},\"8\":{\"id\":\"80\",\"amount\":\"2 msk hackad\"}}}}',-1,4,'jpg','<ol><li>Skölj kikärterna väl och låt rinna av. Skala och hacka lök och vitlök fint.\r\n</li><li>Mosa kikärter, lök, vitlök och persilja i matberedare.\r\n</li><li>Blanda med salt, peppar, majsstärkelse och ägg till en smet. Forma bollar och platta ut till biffar, 1 cm tjocka.\r\n</li><li>Stek i smör 2–3 minuter per sida på medelvärme. Servera med klyftpotatis och tzatziki.\r\n</li></ol>','no tags',-1),(16,'Klassisk pajdeg- grundrecept','2017-07-05 16:27:08',10,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"5\",\"amount\":\"3 msk\"},\"1\":{\"id\":\"7\",\"amount\":\"3 dl\"},\"2\":{\"id\":\"24\",\"amount\":\"125 g\"}}}}',-1,4,'jpg','<ol><li>Skär smöret i små bitar. </li><li>Nyp ihop mjöl och smör för hand eller mixa i matberedare till en smulig massa. </li><li>Tillsätt vattnet och blanda snabbt ihop till en deg. Tryck ut degen i formen. Nagga bottnen med en gaffel. Låt vila ca 30 minuter i kylen. </li><li>Sätt ugnen på 225°C. Förgrädda pajskalet i mitten av ugnen 10 minuter.</li><li>Pajskalet passar bra som grund till bland annat Lyxig kycklingpaj, Texmexpajer och Grön ostpaj.</li></ol>','no tags',-1),(17,'Tomat- och lökpaj','2017-07-05 17:02:05',60,'',-1,4,'jpg','<ol><li>Sätt ugnen på 200 grader. Blanda havregryn, vetemjöl och salt. Tillsätt smöret och smula allt till en grynig massa. Blanda ner kesellan och arbeta snabbt ihop till en deg.\r\n</li><li>Tryck ut degen jämnt i en pajform och ställ svalt minst 20 minuter. Grädda mitt i ugnen ca 10 minuter.\r\n</li><li>Fräs löken mjuk i olja utan att den tar färg. Fördela löken över pajskalet. Skiva eller riv mozzarellan i mindre bitar och lägg över löken. Täck med tomater och stick ner basilikablad.\r\n</li><li>Vispa ihop ägg, mjölk, salt, peppar och riven ost. Häll blandningen i formen och baka mitt i ugnen ca 25 minuter tills äggstanningen stelnat. Låt svalna lite före servering.\r\n</li><ol>','no tags',-1),(18,'löksoppa','2017-07-10 19:47:53',40,'',-1,4,'jpg','bryn löken gyllengul\r\nåt fort som fan','no tags',-1),(19,'Klassisk löksoppa','2017-07-10 19:49:58',60,'',-1,4,'jpg','<ol><li>Skala, halvera och skiva löken. Fräs all lök tillsammans med sockret i olja i en stor kastrull ca 15 minuter. Löken ska inte få någon färg.</li><li>Tillsätt övriga ingredienser och låt koka under lock ca 15 minuter. Smaka av med salt och peppar. Servera och garnera ev med timjan.</li></ol>','no tags',-1),(20,'Hallonsockerkaka','2017-07-11 08:21:28',1,'',-1,0,'jpg','<ol><li>Sätt ugnen på 175°C.</li><li>Till formen: Smörj och bröa en bakform, ca 2 liter eller 24 cm i diameter (för 15 bitar).</li><li>Sockerkaka: Vispa ägg och socker pösigt. Blanda mjöl och bakpulver och vänd ner i äggsmeten.</li><li>Koka upp mjölken med smöret och rör ner i äggsmeten. Blanda hallon och vaniljsocker. Häll hälften av smeten i formen. Blanda resten av smeten med hallonen och häll i formen.</li><li>Grädda kakan genast i nedre delen av ugnen 40-45 minuter. Låt kakan stå ca 5 minuter innan den stjälps upp på ett bakplåtspapper på galler.</li></ol>','no tags',-1),(21,'Köttbullar','2017-07-12 16:42:45',60,'',-1,15,'jpg','<ol><li>Blanda mjölk, grädde och ströbröd. Låt svälla ca 10 minuter. </li><li>Blanda färsen med salt, vitpeppar och socker tills färsen blir fast. Tillsätt äggen och blanda tills färsen blir fast igen. Rör i ströbrödsblandningen och löken.</li><li>Skölj händerna med kallt vatten och forma små fina köttbullar. Stek några i taget i matfettet. Skaka pannan då och då så att köttbullarna rullar runt och håller sig runda.</li></ol>','no tags',-1),(22,'Vegobiffar med halloumi och rostad potatis','2017-07-15 20:41:25',35,'{\"0\":{\"title\":\"Rostad\",\"items\":{\"0\":{\"id\":\"31\",\"amount\":\"1 kg\"},\"1\":{\"id\":\"28\",\"amount\":\"1 msk\"},\"2\":{\"id\":\"13\",\"amount\":\"1 tsk\"}}},\"1\":{\"title\":\"Biffar\",\"items\":{\"0\":{\"id\":\"37\",\"amount\":\"1 förpackning\"},\"1\":{\"id\":\"32\",\"amount\":\"2\"},\"2\":{\"id\":\"27\",\"amount\":\"½\"},\"3\":{\"id\":\"89\",\"amount\":\"2\"},\"4\":{\"id\":\"63\",\"amount\":\"150 g\"},\"5\":{\"id\":\"7\",\"amount\":\"0.5 dl\"},\"6\":{\"id\":\"38\",\"amount\":\"1\"},\"7\":{\"id\":\"88\",\"amount\":\"2 tsk\"},\"8\":{\"id\":\"13\",\"amount\":\"1 tsk\"},\"9\":{\"id\":\"28\",\"amount\":\"2 msk\"},\"10\":{\"id\":\"87\",\"amount\":\"40 g\"},\"11\":{\"id\":\"86\",\"amount\":\"0.5\"}}}}',5,4,'jpg','<ol><li>Sätt ugnen på 225°. Fördela potatis på en ugnsplåt och vänd runt i olja och salt. Rosta mitt i ugnen ca 25 min.\r\n</li><li>\r\nSkölj av kikärtorna i kallt vatten och mosa grovt i en bunke. Riv ner morötter, zucchini, lök och halloumi. Blanda runt med mjöl, ägg, bakpulver och salt.\r\n</li><li>\r\nHetta upp olja i en stekpanna och stek små biffar av smeten på medelvärme, ca 3 min per sida. Vänd ihop spenaten med den varma potatisen och pressa över lite citron vid servering.\r\n</li><ol>','no tags',-1),(26,'Kikärtsbiffar med curry, morot, mango och ris','2017-07-22 22:56:41',45,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"81\",\"amount\":\"4 portioner\"},\"1\":{\"id\":\"37\",\"amount\":\"2 förpackningar\"},\"2\":{\"id\":\"32\",\"amount\":\"2\"},\"3\":{\"id\":\"3\",\"amount\":\"2\"},\"4\":{\"id\":\"82\",\"amount\":\"1 msk\"},\"5\":{\"id\":\"38\",\"amount\":\"2\"},\"6\":{\"id\":\"83\",\"amount\":\"2 tsk\"},\"7\":{\"id\":\"70\",\"amount\":\"\"},\"8\":{\"id\":\"76\",\"amount\":\"2 msk\"},\"9\":{\"id\":\"84\",\"amount\":\"0.5 dl\"},\"10\":{\"id\":\"65\",\"amount\":\"2 dl\"}}}}',-1,4,'jpg','<ol><li>Koka riset enligt anvisningen på förpackningen</li><li>Häll av kikärterna i ett durkslag och skölj dem. Skala morötter och vitlök. Riv morötterna fint och finhacka vitlöken.</li><li>Mixa kikärterna till en massa i food processor eller med mixerstav. Tillsätt majsstärkelse, ägg och curry. Blanda ner morötter och vitlök, smaksätt med salt och peppar.</li><li>Forma 8 biffar (för 4 port) och stek dem sakta i oljan.</li><li>Blanda mango chutney med crème fraiche. Servera kikärtsbiffarna med mango chutney crème fraiche och ris.</li></ol>','no tags',-1),(29,'Pluras zucchinibiffar','2017-07-26 11:25:17',45,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"27\",\"amount\":\"2 \"},\"1\":{\"id\":\"13\",\"amount\":\"1 tsk\"},\"2\":{\"id\":\"37\",\"amount\":\"1 burk\"},\"3\":{\"id\":\"3\",\"amount\":\"3 \"},\"4\":{\"id\":\"38\",\"amount\":\"2 \"},\"5\":{\"id\":\"39\",\"amount\":\"1 dl\"},\"6\":{\"id\":\"40\",\"amount\":\"0.5 tsk\"},\"7\":{\"id\":\"92\",\"amount\":\"0.5 tsk\"},\"8\":{\"id\":\"41\",\"amount\":\"0.5 tsk\"},\"9\":{\"id\":\"7\",\"amount\":\"3 msk\"},\"10\":{\"id\":\"28\",\"amount\":\"1 dl\"}}}}',-1,4,'jpg','<ol><li>Riv zucchini grovt med ett rivjärn. Lägg i ett durkslag, strö över salt och rör om. Låt stå 15 min och krama sedan ut så mycket vätska som möjligt.</li><li>Mixa kikärtorna till en slät massa.</li><li> Blanda zucchini och kikärtor med resten av ingredienserna.</li><li>Hetta upp olja i en stekpanna. Klicka ut smeten till små biffar. Stek till fin stekyta, 2–3 min per sida. Det blir 12–16 stycken.</li></ol>','no tags',-1),(30,'Zucchinipaj med pesto','2017-07-26 11:44:57',1,'{\"0\":{\"title\":\"Pajdeg\",\"items\":{\"0\":{\"id\":\"7\",\"amount\":\"3 dl\"},\"1\":{\"id\":\"24\",\"amount\":\"150 g\"},\"2\":{\"id\":\"90\",\"amount\":\"2 msk\"}}},\"1\":{\"title\":\"Fyllning\",\"items\":{\"0\":{\"id\":\"91\",\"amount\":\"2\"},\"1\":{\"id\":\"64\",\"amount\":\"4 msk\"},\"2\":{\"id\":\"38\",\"amount\":\"3\"},\"3\":{\"id\":\"67\",\"amount\":\"2 dl\"},\"4\":{\"id\":\"13\",\"amount\":\"1 tsk\"},\"5\":{\"id\":\"20\",\"amount\":\"1 krm\"},\"6\":{\"id\":\"27\",\"amount\":\"1 medelstor\"}}},\"2\":{\"title\":\"Topping\",\"items\":{\"0\":{\"id\":\"93\",\"amount\":\"12\"},\"1\":{\"id\":\"94\",\"amount\":\"0.5\"},\"2\":{\"id\":\"28\",\"amount\":\"1 msk\"},\"3\":{\"id\":\"57\",\"amount\":\"1 tsk\"}}}}',5,10,'jpg','<ol><li>Arbeta samman vetemjöl och matfett, gärna i en matberedare. Tillsätt vatten och arbeta samman till en degboll.</li><li>Svep in i plastfilm och låt degen vila svalt i ca 30 minuter.</li><li>Sätt ugnen på 225°C. </li><li>Tryck eller kavla ut degen i en pajform ca 24 cm i diameter (för 10 port). Nagga pajskalet med en gaffel.</li><li>Förgrädda i ugnens mitt i ca 10 minuter.</li><li>Fyllning: Skär mozzarellan i tunna skivor och fördela i det förgräddade pajskalet. Bre ut pesto över mozzarellan.</li><li>Vispa samman ägg, mjölk och kryddor och häll över.</li><li>Hyvla tunna skivor zucchini med en osthyvel. Garnera pajen med skivorna i valfritt mönster.</li><li>Grädda i ugnens mitt i ca 35 minuter eller tills pajen har stannat helt och är gyllenbrun och fin.</li><li>Skär tomaterna i fjärdedelar eller halvor. Blanda samman tomaterna med basilika, olja och vinäger. Toppa pajen med detta vid serveringen.</li></ol>','no tags',-1),(31,'Svamp- och mozzarellarisotto','2017-09-19 19:50:52',45,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"30\",\"amount\":\"1\"},\"1\":{\"id\":\"24\",\"amount\":\"2 msk\"},\"2\":{\"id\":\"95\",\"amount\":\"3 dl\"},\"3\":{\"id\":\"6\",\"amount\":\"7 dl\"},\"4\":{\"id\":\"13\",\"amount\":\"0.5 tsk\"},\"5\":{\"id\":\"51\",\"amount\":\"1 krm\"},\"6\":{\"id\":\"12\",\"amount\":\"2 dl\"},\"7\":{\"id\":\"23\",\"amount\":\"200 g\"},\"8\":{\"id\":\"91\",\"amount\":\"1 fp\"},\"9\":{\"id\":\"94\",\"amount\":\"1 kruka\"}}}}',-1,4,'jpg','<ol><li>Skala och finhacka löken. Fräs löken i hälften av matfettet i en traktörpanna.</li><li>Tillsätt riset och låt fräsa med en kort stund. Häll över hälften av buljongen och låt puttra under lock ca 10 min.</li><li>Späd med resten av buljongen och låt koka ytterligare ca 10 min. Smaka av med salt och peppar och rör i parmesanosten.</li><li>Ansa och skär svampen i mindre bitar. Fräs svampen i resterande matfett i en stekpanna. Låt mozzarellaosten rinna av och skär i mindre bitar.</li><li>Vänd ned svamp och ost i pannan. Skär basilikabladen i strimlor och vänd ner i riset. Servera risotton med en tomatsallad.</li></ol>','no tags',1),(44,'Lasagne med majs och tomat','2017-09-22 22:31:39',45,'{\"0\":{\"title\":\"Lasagne\",\"items\":{\"0\":{\"id\":\"96\",\"amount\":\"380 g\"},\"1\":{\"id\":\"103\",\"amount\":\"390 g\"},\"2\":{\"id\":\"97\",\"amount\":\"500 g\"},\"3\":{\"id\":\"98\",\"amount\":\"1 dl\"},\"4\":{\"id\":\"99\",\"amount\":\"150 g\"},\"5\":{\"id\":\"70\",\"amount\":\"\"},\"6\":{\"id\":\"100\",\"amount\":\"15 st\"},\"7\":{\"id\":\"101\",\"amount\":\"4 dl\"}}},\"1\":{\"title\":\"Sallad\",\"items\":{\"0\":{\"id\":\"18\",\"amount\":\"0.5\"},\"1\":{\"id\":\"102\",\"amount\":\"2 tsk\"},\"2\":{\"id\":\"76\",\"amount\":\"1 msk\"}}}}',-1,4,'jpg','<ol><li>Sätt ugnen på 225°C.</li><li>Lasagne: Spola linserna i kallt vatten och låt rinna av.</li><li>Koka upp tomatkross, passerade tomater, tapenade, linser och majsen med spadet. Låt det koka ca 5 minuter på svag värme. Smaka av med salt och peppar.</li><li>Lägg lite av tomatsåsen i en ugnssäker form. Varva lasagneplattor med tomatsåsen. Toppa med tomatsås och ostsås.</li><li>Grädda lasagnen mitt i ugnen ca 30 minuter.</li><li>Sallad: Skär salladen i bitar. Blanda med vinäger och olja. Krydda med salt och peppar.</li><li>Servera lasagnen med sallad.</li></ol>','no tags',1),(45,'Frittata med rotfrukter, oregano och fetaost','2017-09-23 12:58:28',45,'{\"0\":{\"title\":\"Frittata\",\"items\":{\"0\":{\"id\":\"104\",\"amount\":\"250 g\"},\"1\":{\"id\":\"105\",\"amount\":\"500 g\"},\"2\":{\"id\":\"28\",\"amount\":\"2 msk\"},\"3\":{\"id\":\"106\",\"amount\":\"250 g\"},\"4\":{\"id\":\"107\",\"amount\":\"0.5\"},\"5\":{\"id\":\"108\",\"amount\":\"150 g\"},\"6\":{\"id\":\"38\",\"amount\":\"8\"},\"7\":{\"id\":\"67\",\"amount\":\"1.5 dl\"},\"8\":{\"id\":\"13\",\"amount\":\"0.5 tsk\"},\"9\":{\"id\":\"51\",\"amount\":\"2 krm\"}}},\"1\":{\"title\":\"Sallad\",\"items\":{\"0\":{\"id\":\"17\",\"amount\":\"1\"},\"1\":{\"id\":\"1\",\"amount\":\"1\"},\"2\":{\"id\":\"44\",\"amount\":\"1\"},\"3\":{\"id\":\"11\",\"amount\":\"2\"},\"4\":{\"id\":\"102\",\"amount\":\"1 msk\"},\"5\":{\"id\":\"28\",\"amount\":\"1 msk\"}}}}',5,4,'jpg','<ol><li>Sätt ugnen på 200°C.</li><li>Frittata: Skala och skär rotsellerin i små tärningar. Stek selleri och pytten i olivoljan i en stekpanna 6-8 minuter. Tillsätt sojabönorna och låt dem bli varma. Använd en stekpanna som tål att stå i ugnen. Annars häll över allt i en ugnssäker form.</li><li>Plocka av bladen från oreganon och hacka dem grovt. Smula fetaosten. Blanda ner hälften av varje i pytten.</li><li>Knäck äggen i en bunke och vispa upp dem med mjölken. Krydda med salt och peppar. Häll det över pytten och blanda runt. Strö på resten av oreganon och osten. Sätt in pannan eller formen mitt i ugnen 20-25 minuter.</li><li>Sallad: Dela och kärna ur paprikan, skär den och gurkan i stora bitar. Skala och skiva löken. Skär tomaterna i bitar. Blanda vinägern, olivoljan och grönsakerna i en skål. Krydda med salt och peppar. Vänd runt salladen så den blir marinerad av dressing.</li><li>Servera frittatan med salladen.</li></ol>','no tags',1),(46,'Rotfruktsgratäng med svamptäcke','2017-10-03 16:18:06',100,'{\"0\":{\"title\":\"Gratäng\",\"items\":{\"0\":{\"id\":\"30\",\"amount\":\"1\"},\"1\":{\"id\":\"31\",\"amount\":\"400 g\"},\"2\":{\"id\":\"32\",\"amount\":\"300 g\"},\"3\":{\"id\":\"109\",\"amount\":\"300 g\"},\"4\":{\"id\":\"43\",\"amount\":\"4 msk\"},\"5\":{\"id\":\"22\",\"amount\":\"5 dl\"},\"6\":{\"id\":\"110\",\"amount\":\"2 tsk\"},\"7\":{\"id\":\"13\",\"amount\":\"\"},\"8\":{\"id\":\"20\",\"amount\":\"\"}}},\"1\":{\"title\":\"Svamptäcke\",\"items\":{\"0\":{\"id\":\"111\",\"amount\":\"500 g\"},\"1\":{\"id\":\"30\",\"amount\":\"1\"},\"2\":{\"id\":\"7\",\"amount\":\"1 msk\"},\"3\":{\"id\":\"22\",\"amount\":\"2 dl\"},\"4\":{\"id\":\"80\",\"amount\":\"2 msk\"}}}}',-1,6,'jpg','<ol><li>Sätt ugnen på 225°C.</li><li>Skala, dela och skiva löken tunt. Skala och skär potatis, morot och palsternacka i mm-tunna skivor.</li><li>Fräs löken i hälften av oljan i en stor kastrull tills den mjuknar, utan att den får färg.</li><li>Tillsätt potatis, rotfrukter, grädde och timjan. Krydda med 1 tsk salt och 2 krm peppar (för 6-8 port). Koka upp och låt sjuda under omrörning tills blandningen tjocknar och blir krämig, ca 5 minuter.</li><li>Häll blandningen i en oljad ugnssäker form, ca 30 x 20 cm. Ställ in i mitten av ugnen ca 30 minuter. Gör svamptäcket under tiden.</li><li>Svamptäcke: Ansa och hacka svampen. Skala, dela och finhacka löken. Fräs svampen i en torr stekpanna tills den har släppt sin vätska och den har kokat in. Tillsätt lök och resterande olja. Låt fräsa under omrörning tills allt börjar få lite färg. Ta från värmen. Strö över mjölet och rör runt ordentligt. Rör ner grädden och låt koka in. Krydda med persilja, ½ tsk salt och 1 krm peppar (för 6-8 port).</li><li>Ta ut gratängen. Bred på svamptäcket och ställ in i ugnen ytterligare 20-30 minuter eller tills rotfrukterna är mjuka.</li></ol>','no tags',1),(47,'Krämig pasta med halloumi och tomat','2017-10-05 11:13:10',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"62\",\"amount\":\"4\"},\"1\":{\"id\":\"112\",\"amount\":\"150 g\"},\"2\":{\"id\":\"3\",\"amount\":\"2\"},\"3\":{\"id\":\"11\",\"amount\":\"2\"},\"4\":{\"id\":\"63\",\"amount\":\"400 g\"},\"5\":{\"id\":\"76\",\"amount\":\"1 msk\"},\"6\":{\"id\":\"5\",\"amount\":\"1 dl\"},\"7\":{\"id\":\"65\",\"amount\":\"2 dl\"},\"8\":{\"id\":\"34\",\"amount\":\"1 tsk\"},\"9\":{\"id\":\"94\",\"amount\":\"1 tsk\"},\"10\":{\"id\":\"70\",\"amount\":\"\"},\"11\":{\"id\":\"87\",\"amount\":\"65 g\"}}}}',-1,4,'jpg','<ol></ol>','no tags',1),(48,'Grön potatiswok med mozzarella','2017-10-08 13:55:33',30,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"31\",\"amount\":\"10\"},\"1\":{\"id\":\"109\",\"amount\":\"3\"},\"2\":{\"id\":\"76\",\"amount\":\"2 msk\"},\"3\":{\"id\":\"114\",\"amount\":\"2\"},\"4\":{\"id\":\"4\",\"amount\":\"250 g\"},\"5\":{\"id\":\"91\",\"amount\":\"125 g\"},\"6\":{\"id\":\"13\",\"amount\":\"1 tsk\"},\"7\":{\"id\":\"51\",\"amount\":\"2 krm\"},\"8\":{\"id\":\"94\",\"amount\":\"3 msk\"},\"9\":{\"id\":\"113\",\"amount\":\"\"}}}}',-1,4,'jpg','<ol><li>Skala och skär potatis och palsternackor i små tärningar. Stek dem mjuka i olja ca 10 min.</li><li> Skölj, ansa och strimla purjolöken. Låt purjo och ärter fräsa med i woken några min. </li><li>Låt osten rinna av och skär den i bitar. Blanda ner i woken. Krydda med salt och peppar samt gärna hackad basilika. </li><li>Servera potatiswoken med bröd.</li></ol>','no tags',1),(49,'Currygryta med äpplen','2017-10-12 15:18:16',45,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"30\",\"amount\":\"1\"},\"1\":{\"id\":\"3\",\"amount\":\"1\"},\"2\":{\"id\":\"114\",\"amount\":\"0.5\"},\"3\":{\"id\":\"23\",\"amount\":\"200 g\"},\"4\":{\"id\":\"15\",\"amount\":\"1\"},\"5\":{\"id\":\"27\",\"amount\":\"0.5\"},\"6\":{\"id\":\"115\",\"amount\":\"2\"},\"7\":{\"id\":\"28\",\"amount\":\"1 tsk\"},\"8\":{\"id\":\"83\",\"amount\":\"2 tsk\"},\"9\":{\"id\":\"116\",\"amount\":\"0.5 dl\"},\"10\":{\"id\":\"117\",\"amount\":\"1 msk\"},\"11\":{\"id\":\"6\",\"amount\":\"1 tärning\"},\"12\":{\"id\":\"22\",\"amount\":\"1 dl\"},\"13\":{\"id\":\"5\",\"amount\":\"2 dl\"},\"14\":{\"id\":\"7\",\"amount\":\"2 msk\"},\"15\":{\"id\":\"118\",\"amount\":\"4 st\"}}}}',3,6,'jpg','<ol><li>Ansa och skär grönsakerna i mindre bitar. Fräs dem i oljan tillsammans med curry, fräs till löken har mjuknat.</li><li>Tillsätt tomatpuré, senap och buljongtärning. Skaka samman grädde, vatten och mjöl och rör ner bland grönsakerna.</li><li>Låt allt puttra samman. Smaka av med salt och peppar.</li><li>Skär ananasen i mindre bitar och tillsätt det och persiljan precis före servering.</li></ol>','no tags',1),(50,'Nudlar med tofu, haricot verts och ägg','2018-04-13 13:34:18',60,'{\"0\":{\"title\":\"default\",\"items\":{\"0\":{\"id\":\"119\",\"amount\":\"250 g\"},\"1\":{\"id\":\"120\",\"amount\":\"270 g\"},\"2\":{\"id\":\"15\",\"amount\":\"1\"},\"3\":{\"id\":\"43\",\"amount\":\"\"},\"4\":{\"id\":\"35\",\"amount\":\"0.75 dl\"},\"5\":{\"id\":\"112\",\"amount\":\"250 g\"},\"6\":{\"id\":\"121\",\"amount\":\"0.5 msk\"},\"7\":{\"id\":\"41\",\"amount\":\"0.5 tsk\"},\"8\":{\"id\":\"45\",\"amount\":\"0.5 dl\"},\"9\":{\"id\":\"28\",\"amount\":\"1 msk\"},\"10\":{\"id\":\"30\",\"amount\":\"\"}}},\"1\":{\"title\":\"Sås\",\"items\":{\"0\":{\"id\":\"3\",\"amount\":\"\"},\"1\":{\"id\":\"38\",\"amount\":\"4\"},\"2\":{\"id\":\"39\",\"amount\":\"\"}}}}',-1,4,'jpg','<ol>GÖR MATEN FFS</ol>','no tags',1);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(128) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL DEFAULT 'na@na.na',
  `user_first_name` varchar(32) NOT NULL DEFAULT 'Jane',
  `user_last_name` varchar(32) NOT NULL DEFAULT 'Doe',
  `user_shoe_size` int(2) NOT NULL DEFAULT '12',
  `user_active` int(1) NOT NULL DEFAULT '1',
  `user_salt` varchar(32) DEFAULT NULL,
  `user_level` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jonte','3fe2a5cd4e5c8c8c67ffe33828e06d7a77289e3a7dd3a6caa199fe18cbe7b94aa2ead87f3c2a189e18485c0022e35b10c54d495f255863b5a267cb97506da373','na@na.na','John','Bergelin',12,1,')3*GwMwez5PdeB1QaiI3ZHRE&6HsH6lI',0),(3,'alvedon','0b9c3761a021779fa87aea6819982ef0b93d5422fbed2eeafe2bd787f63a46b3dd4efb6483fe7796327e2202f6dc401cea4748c6e55a93bd02a99bbda22ef04b','','Anna','Helenius',12,1,'qVr0a^jgsJb&Mvx*7W4DdnN#3ic%8wuS',0),(5,'CiaH','b86c84595ef8a7aac54adaa42705207301dbaa2cd8b9b82ac1b70920bf7625fa05fc8fd3ee29d3fba5580dd6c348c279b1bbdbdd428830dd7e87ace3fc073579','cecilia@helenius.nu','Cecilia','Helenius',12,1,'24HGo)3l^kDaMeCF!IxQs7mZWVqNwb*X',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-12 20:47:25
