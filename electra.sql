# SQL Manager 2011 for MySQL 5.1.0.2
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : electra


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `electra`;

CREATE DATABASE `electra`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_unicode_ci';

USE `electra`;

#
# Удаление объектов БД
#

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `hb_type_equipment`;
DROP TABLE IF EXISTS `hb_room`;
DROP TABLE IF EXISTS `hb_equipment`;
DROP TABLE IF EXISTS `games`;
DROP TABLE IF EXISTS `energy`;
DROP TABLE IF EXISTS `comfort`;

#
# Структура для таблицы `comfort`: 
#

CREATE TABLE `comfort` (
  `stars` INTEGER(4) DEFAULT NULL COMMENT 'Звезды',
  `min_level` INTEGER(11) DEFAULT NULL COMMENT 'Минимальное значение',
  `max_level` INTEGER(11) DEFAULT NULL COMMENT 'Максимальное значение'
)ENGINE=MyISAM
AVG_ROW_LENGTH=13 ROW_FORMAT=FIXED CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Структура для таблицы `energy`: 
#

CREATE TABLE `energy` (
  `en_lvl` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL COMMENT 'классы энергопотребления',
  `min_level` INTEGER(11) DEFAULT NULL COMMENT 'минимальный уровень',
  `max_level` INTEGER(11) DEFAULT NULL COMMENT 'Максимальный уровень'
)ENGINE=MyISAM
AVG_ROW_LENGTH=20 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Структура для таблицы `games`: 
#

CREATE TABLE `games` (
  `game_id` INTEGER(11) NOT NULL AUTO_INCREMENT COMMENT 'id игры',
  `cash` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Сумма затраченных средств',
  `power` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Мощность',
  `comfort` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Комфорт',
  `input` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Потребляемая мощность',
  `user_name` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Имя',
  `user_surname` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Фамилия',
  `user_patronymic` VARCHAR(255) COLLATE utf8_general_ci NOT NULL COMMENT 'Отчество',
  `date` DATE NOT NULL COMMENT 'Дата игры',
  `k` FLOAT(5,2) NOT NULL COMMENT 'итоговый балл',
  PRIMARY KEY (`game_id`)
)ENGINE=MyISAM
AUTO_INCREMENT=55 AVG_ROW_LENGTH=92 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Структура для таблицы `hb_equipment`: 
#

CREATE TABLE `hb_equipment` (
  `equipment_id` INTEGER(4) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор',
  `type` INTEGER(4) NOT NULL COMMENT 'тип оборудования',
  `name` TEXT COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название',
  `photo` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Картинка',
  `input` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Потребление',
  `power` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Мощность',
  `k_working` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'К_эксплуатации',
  `price` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Стоимость',
  `k_comfort` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Комфорт',
  `additional` INTEGER(11) DEFAULT 0 COMMENT 'дополнительно или основное',
  `room_id` VARCHAR(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'комната',
  UNIQUE KEY `id` (`equipment_id`)
)ENGINE=MyISAM
AUTO_INCREMENT=65 AVG_ROW_LENGTH=114 CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
COMMENT='Справочник оборудования';

#
# Структура для таблицы `hb_room`: 
#

CREATE TABLE `hb_room` (
  `room_id` INTEGER(4) NOT NULL AUTO_INCREMENT COMMENT 'id комнаты',
  `name_room` VARCHAR(50) COLLATE utf8_general_ci NOT NULL COMMENT 'название комнаты',
  PRIMARY KEY (`room_id`)
)ENGINE=MyISAM
AUTO_INCREMENT=4 AVG_ROW_LENGTH=21 CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
COMMENT='Комнаты';

#
# Структура для таблицы `hb_type_equipment`: 
#

CREATE TABLE `hb_type_equipment` (
  `type` INTEGER(4) NOT NULL COMMENT 'Тип оборудования',
  `name` VARCHAR(50) COLLATE utf8_general_ci NOT NULL COMMENT 'Название',
  PRIMARY KEY (`type`)
)ENGINE=MyISAM
AVG_ROW_LENGTH=37 CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'
COMMENT='Тип оборудования';

#
# Структура для таблицы `users`: 
#

CREATE TABLE `users` (
  `user_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `password` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `control_question` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `control_answer` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `comment` VARCHAR(250) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`login`)
)ENGINE=MyISAM
AUTO_INCREMENT=2 AVG_ROW_LENGTH=40 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='Пользователи';

#
# Data for the `comfort` table  (LIMIT -494,500)
#

INSERT INTO `comfort` (`stars`, `min_level`, `max_level`) VALUES 
  (1,0,48),
  (2,49,67),
  (3,68,86),
  (4,87,105),
  (5,106,200);
COMMIT;

#
# Data for the `energy` table  (LIMIT -492,500)
#

INSERT INTO `energy` (`en_lvl`, `min_level`, `max_level`) VALUES 
  ('a',0,614),
  ('b',615,779),
  ('c',780,943),
  ('d',944,1107),
  ('e',1108,1271),
  ('f',1272,1435),
  ('g',1436,2000);
COMMIT;

#
# Data for the `games` table  (LIMIT -497,500)
#

INSERT INTO `games` (`game_id`, `cash`, `power`, `comfort`, `input`, `user_name`, `user_surname`, `user_patronymic`, `date`, `k`) VALUES 
  (53,'1682','9661','91','565','Александр','Патрикеев','Андреевич','2012-04-19',77.00),
  (54,'8182','14561','98','674','Александр','Патрикеев','Андреевич','2012-04-28',78.00);
COMMIT;

#
# Data for the `hb_equipment` table  (LIMIT -436,500)
#

INSERT INTO `hb_equipment` (`equipment_id`, `type`, `name`, `photo`, `input`, `power`, `k_working`, `price`, `k_comfort`, `additional`, `room_id`) VALUES 
  (1,1,'Телевизор с электронно-лучевой трубкой','1-1.png ','12','100','0,17','10000','7',0,'1'),
  (2,1,'Телевизор жидкокристаллический','1-2.png','9,6','80','0,17','20000','12',0,'1'),
  (3,1,'Телевизор плазменный','1-3.png','36','300','0,17','30000','8',0,'1'),
  (4,2,'DVD проигрыватель и аккустическая система','2-1.png','4,8','80','0,08','7000','1',0,'1'),
  (5,2,'Домашний кинотеатр коробочный (DVD проигрыватель и аккустическая система в комплекте)','2-2.png','4,2','70','0,08','9000','2',0,'1'),
  (6,2,'Домашний кинотеатр компонентный (DVD проигрыватель, усилитель и аккустическая система в разных корпусах)','2-3.png','5,4','90','0,08','13000','3',0,'1'),
  (7,3,'Компьютер и монитор с ЭЛТ','3-1.png','45,9','510','0,13','15000','1',0,'1'),
  (8,3,'Компьютер и монитор жидкокристаллический','3-2.png','40,5','450','0,13','25000','3',0,'1'),
  (9,3,'Ноутбук','3-3.png','5,85','65','0,13','25000','3',0,'1'),
  (10,4,'Пылесос с тканевым мешком','4-1.png','24','1600','0,02','1500','1',0,'1'),
  (11,4,'Пылесос без мешка для сбора пыли','4-2.png','21','1400','0,02','2500','2',0,'1'),
  (12,4,'Пылесос с аквафильтром (водяной)','4-3.png','18','1200','0,02','4000','3',0,'1'),
  (13,5,'Простой утюг','5-1.png','45','1500','0,04','2400','1',0,'1'),
  (14,5,'Утюг с терморегулятором и разбрызгивателем','5-2.png','60','2000','0,04','3300','2',0,'1'),
  (15,5,'Утюг с парогенератором','5-3.png','72','2400','0,04','4500','3',0,'1'),
  (16,6,'Лампы накаливания','6-1.png','16,74','93','0,25','10','7',0,'1'),
  (17,6,'Лампы компактные люминисцентные','6-2.png','5,4','30','0,25','180','5',0,'1'),
  (18,6,'Лампы светодиодные','6-3.png','2,16','12','0,25','250','2',0,'1'),
  (19,7,'Классическая электрическая плита (с эмалированной рабочей поверхностью и блинами-конфорками) ','7-1.png','135','1500','0,13','5000','1',0,'2'),
  (20,7,'Стеклокерамическая варочная панель с тремя комфорками','7-2.png','135','1500','0,13','12000','2',0,'2'),
  (21,7,'Стеклокерамическая варочная панель с четырьмя комфорками','7-3.png','153','1700','0,13','15000','3',0,'2'),
  (22,8,'Статический духовой шкаф','8-1.png','120','4000','0,04','12000','1',0,'2'),
  (23,8,'Конвекционный духовой шкаф','8-2.png','105','3500','0,04','16000','2',0,'2'),
  (24,8,'Конвекционный духовой шкаф с дополнительными режимами приготовления продуктов','8-3.png','114','3800','0,04','20000','3',0,'2'),
  (25,9,'Холодильник однокамерный','9-1.png','61,2','85','1','15000','3',0,'2'),
  (26,9,'Холодильник двухкамерный','9-2.png','108','150','1','25000','6',0,'2'),
  (27,9,'Холодильник двухкамерный с функцией NO FROST','9-3.png','144','200','1','40000','10',0,'2'),
  (28,10,'Стиральная машина','10-1.png','36','1200','0,04','14000','2',0,'3'),
  (29,10,'Стиральная машина с функцией сушки белья','10-2.png','45','1500','0,04','18000','5',0,'3'),
  (30,10,'Стиральная машина с функциями сушки и глажки','10-3.png','63','2100','0,04','21000','9',0,'3'),
  (31,11,'Металлический чайник','11-1.png','0','0','0,04','1500','1',0,'2'),
  (32,11,'Электрический чайник','11-2.png','30','1000','0,04','2500','2',0,'2'),
  (33,11,'Чайники - термосы','11-3.png','22,5','750','0,04','3000','3',0,'2'),
  (34,12,'Душевая кабина душ','12-1.png','36','600','0,08','23000','8',0,'3'),
  (35,12,'Душевая кабина душ + ванна','12-2.png','30','1000','0,04','35000','12',0,'3'),
  (36,12,'Душевая кабина душ + ванна + баня','12-3.png','45','1500','0,04','50000','20',0,'3'),
  (37,13,'Оконная система','13-1.png','102','1700','0,08','20000','2',1,'3'),
  (38,13,'Канальный кондиционер','13-2.png','102','1700','0,08','40000','1',1,'1'),
  (39,13,'Сплит-система','13-3.png','120','2000','0,08','30000','1',1,'1'),
  (40,14,'Тёплый пол','14-1.png','360','2000','0,25','6000','1',1,'1'),
  (41,15,'Микроволновая печь','15-1.png','22,5','1500','0,02','2500','1',1,'2'),
  (42,15,'Микроволновая печь с функцией гриля','15-2.png','25,5','1700','0,02','4000','2',1,'2'),
  (43,15,'Микроволновая печь с функциями гриля и пароварки','15-3.png','30','2000','0,02','6000','3',1,'2'),
  (44,16,'Вытяжной воздухоочиститель','16-1.png','9,6','160','0,08','6500','1',1,'2'),
  (45,16,'Фильтрующий воздухоочиститель №1','16-2.png','42','700','0,08','10000','2',1,'2'),
  (46,16,'Фильтрующий воздухоочиститель №2','16-3.png','30','500','0,08','12000','3',1,'2'),
  (47,17,'Лампы накаливания ','6-1.png','16,74','93','0,25','10','4',0,'2'),
  (48,17,'Лампы компактные люминисцентные','6-2.png','5,4','30','0,25','180','7',0,'2'),
  (49,17,'Лампы светодиодные','6-3.png','2,16','12','0,25','250','4',0,'2'),
  (50,18,'Лампы накаливания','6-1.png','16,74','93','0,25','10','3',0,'3'),
  (51,18,'Лампы компактные люминисцентные','6-2.png','5,4','30','0,25','180','4',0,'3'),
  (52,18,'Лампы светодиодные','6-3.png','2,16','12','0,25','250','6',0,'3'),
  (53,19,'Лампы накаливания','6-1.png','5,4','60','0,13','8','3',1,'1'),
  (54,19,'Лампы компактные люминисцентные','6-2.png','1,35','15','0,13','150','2',1,'1'),
  (55,19,'Лампы светодиодные','6-3.png','0,54','6','0,13','220','1',1,'1'),
  (56,20,'Лампы накаливания','6-1.png','5,4','60','0,13','8','1',1,'2'),
  (57,20,'Лампы компактные люминисцентные','6-2.png','1,35','15','0,13','150','3',1,'2'),
  (58,20,'Лампы светодиодные','6-3.png','0,54','6','0,13','220','2',1,'2'),
  (59,21,'Лампы накаливания','6-1.png','5,4','60','0,13','8','1',1,'3'),
  (60,21,'Лампы компактные люминисцентные','6-2.png','1,35','15','0,13','150','2',1,'3'),
  (61,21,'Лампы светодиодные','6-3.png','0,54','6','0,13','220','3',1,'3'),
  (62,22,'Тёплый пол','14-1.png','180','1500','0,17','5000','3',1,'2'),
  (63,23,'Тёплый пол','14-1.png','30','1000','0,04','4000','2',1,'3');
COMMIT;

#
# Data for the `hb_room` table  (LIMIT -496,500)
#

INSERT INTO `hb_room` (`room_id`, `name_room`) VALUES 
  (1,'Зал'),
  (2,'Кухня'),
  (3,'Ванная');
COMMIT;

#
# Data for the `hb_type_equipment` table  (LIMIT -476,500)
#

INSERT INTO `hb_type_equipment` (`type`, `name`) VALUES 
  (1,'Телевизор'),
  (2,'Домашний кинотеатр'),
  (3,'Компьютер'),
  (4,'Пылесос'),
  (5,'Утюг'),
  (6,'Освещение зал'),
  (7,'Электрическая варочная панель'),
  (8,'Духовой шкаф'),
  (9,'Холодильник'),
  (10,'Стиральная машина'),
  (11,'Электрический чайник'),
  (12,'Душевая кабина'),
  (13,'Кондиционер'),
  (14,'Тёплый пол зал'),
  (15,'Микроволновая печь'),
  (16,'Вытяжной воздухоочиститель'),
  (17,'Освещение кухня'),
  (18,'Освещение санузел'),
  (19,'Точечное освещение зал'),
  (20,'Точечное освещение кухня'),
  (21,'Точечное освещение санузел'),
  (22,'Тёплый пол кухня'),
  (23,'Тёплый пол санузел');
COMMIT;

#
# Data for the `users` table  (LIMIT -498,500)
#

INSERT INTO `users` (`user_id`, `login`, `password`, `control_question`, `control_answer`, `comment`) VALUES 
  (1,'admin','admin','admin','admin','admin');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;