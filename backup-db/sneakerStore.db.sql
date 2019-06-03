BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `news` (
	`news_id`	INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
	`title`	TEXT,
	`content`	TEXT,
	`image`	TEXT,
	`published_date`	TEXT,
	`active`	INTEGER
);
INSERT INTO `news` VALUES (1,'a','aa','https://c.static-nike.com/a/images/t_PDP_1280_v1/f_auto/b1hmpw4jksyie2f60c4y/air-max-90-essential-shoe-eoToLJLJ.jpg','1/1/1',1);
INSERT INTO `news` VALUES (2,'News aaaa','yessonsafoinefoi noaifnoaien foiae nfoiaefn oaeifn oaeifn oeafin aoefinaeofi naefi naeoi naeofi naeofi noefn oanf onaof noifn oinafoi aeoe nfoinae foieopifn oiaenf','https://assets.adidas.com/images/w_600,f_auto,q_auto/d285610e30664900b857a7fa00ed0201_9366/Superstar_sko_Hvid_C77124_01_standard.jpg','12/09/2018',0);
COMMIT;
