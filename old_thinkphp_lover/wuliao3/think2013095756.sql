set charset utf8;
CREATE TABLE `think_chengji` (
  `name` varchar(255) NOT NULL,
  `php` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `java` int(11) NOT NULL,
  `c#` int(11) NOT NULL,
  `zong` int(11) NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `think_chengji`(`name`,`php`,`english`,`java`,`c#`,`zong`) values('呵呵','21','21','21','21','84');
insert into `think_chengji`(`name`,`php`,`english`,`java`,`c#`,`zong`) values('张三','20','50','60','90','300');
insert into `think_chengji`(`name`,`php`,`english`,`java`,`c#`,`zong`) values('您好','55','50','55','55','331');
insert into `think_chengji`(`name`,`php`,`english`,`java`,`c#`,`zong`) values('打几号','21','21','21','21','84');
insert into `think_chengji`(`name`,`php`,`english`,`java`,`c#`,`zong`) values('王老师','33','33','33','33','132');
CREATE TABLE `think_img` (
  `id` tinyint(5) NOT NULL auto_increment,
  `lujing` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `think_img`(`id`,`lujing`) values('51','/wuliao3/Public/class/../images/upload/20130905/20130905102738_86437.jpg');
insert into `think_img`(`id`,`lujing`) values('52','/wuliao3/Public/class/../images/upload/20130905/20130905102739_87143.jpg');
insert into `think_img`(`id`,`lujing`) values('53','/wuliao3/Public/class/../images/upload/20130905/20130905102741_38927.jpg');
insert into `think_img`(`id`,`lujing`) values('54','/wuliao3/Public/class/../images/upload/20130905/20130905102742_41324.jpg');
insert into `think_img`(`id`,`lujing`) values('56','/wuliao3/Public/class/../images/upload/20130905/20130905102833_81446.jpg');
insert into `think_img`(`id`,`lujing`) values('57','/wuliao3/Public/class/../images/upload/20130905/20130905103140_77263.jpg');
insert into `think_img`(`id`,`lujing`) values('58','/wuliao3/Public/class/../images/upload/20130905/20130905103157_73976.jpg');
insert into `think_img`(`id`,`lujing`) values('59','/wuliao3/Public/class/../images/upload/20130905/20130905103159_12774.jpg');
CREATE TABLE `think_xue` (
  `id` tinyint(10) NOT NULL auto_increment COMMENT '0',
  `name` varchar(250) NOT NULL,
  `password` int(250) NOT NULL,
  `emalil` varchar(50) NOT NULL,
  `seal` tinyint(2) NOT NULL,
  `quan` tinyint(10) default '0',
  `ming` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('1','123456','111111','','0','1','张三');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('2','654321','111','','0','0','王老师');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('7','不少于六位','0','','1','0','');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('8','1234567','123456','','1','0','');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('9','12345678','123456','','1','0','');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('10','12345678','444444','','1','0','');
insert into `think_xue`(`id`,`name`,`password`,`emalil`,`seal`,`quan`,`ming`) values('11','123456','123456','','1','0','');
