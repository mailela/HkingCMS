DROP TABLE IF EXISTS `hkingcms_banner_type`;
CREATE TABLE `hkingcms_banner_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;