/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50021
Source Host           : localhost:3306
Source Database       : xkmanage

Target Server Type    : MYSQL
Target Server Version : 50021
File Encoding         : 65001

Date: 2014-09-17 10:53:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `academin_troops`
-- ----------------------------
DROP TABLE IF EXISTS `academin_troops`;
CREATE TABLE `academin_troops` (
  `position_id` int(33) NOT NULL auto_increment,
  `des_id` int(11) NOT NULL,
  `professor` int(33) NOT NULL COMMENT '教授',
  `associate_professor` int(33) NOT NULL COMMENT '副教授',
  `lecturer` int(33) NOT NULL COMMENT '讲师',
  `yuanshi` int(33) NOT NULL COMMENT '院士',
  `special_professor` int(33) NOT NULL COMMENT '省级特聘教授',
  `docter` int(33) NOT NULL COMMENT '博士',
  `master` int(33) NOT NULL COMMENT '硕士',
  PRIMARY KEY  (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of academin_troops
-- ----------------------------
INSERT INTO academin_troops VALUES ('10', '15', '20', '29', '14', '0', '2', '48', '8');
INSERT INTO academin_troops VALUES ('12', '17', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('16', '20', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('17', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('18', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('19', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('20', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('21', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('22', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('23', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('24', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('25', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('26', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('27', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('32', '36', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO academin_troops VALUES ('33', '37', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `academy`
-- ----------------------------
DROP TABLE IF EXISTS `academy`;
CREATE TABLE `academy` (
  `academy_id` int(11) NOT NULL auto_increment COMMENT '学院序号',
  `academy_number` int(11) unsigned NOT NULL COMMENT '学院编号',
  `academy_name` varchar(20) NOT NULL COMMENT '学院名称',
  PRIMARY KEY  (`academy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of academy
-- ----------------------------
INSERT INTO academy VALUES ('2', '10103', '欧亚学院');
INSERT INTO academy VALUES ('3', '1011', '国教院');
INSERT INTO academy VALUES ('4', '1012', '软件学院');
INSERT INTO academy VALUES ('5', '3243', '撒旦了会计法');

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL auto_increment,
  `research_id` int(11) default NULL COMMENT '研究员序号',
  `article_name` varchar(15) default NULL COMMENT '论文名称',
  `publish_time` date default NULL COMMENT '发表时间',
  `publish_magazine` varchar(20) default NULL COMMENT '发表期刊',
  `is_key_magazine` int(11) NOT NULL default '0' COMMENT '是否核心期刊发表 “0”否“1”是',
  `is_sci_receive` int(11) NOT NULL default '0' COMMENT '是否SCI/EI/ISTP收录',
  PRIMARY KEY  (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL auto_increment,
  `research_id` int(11) default NULL COMMENT '研究员序号',
  `course_name` varchar(20) default NULL COMMENT '主讲课程或讲座名称',
  `time` varchar(20) NOT NULL COMMENT '时间',
  `study_time` int(11) NOT NULL default '0' COMMENT '学时',
  `object` varchar(10) NOT NULL default '本科生' COMMENT '授课或讲座主要对象（本科生、研究生、博士生）',
  `people_sum` varchar(10) default NULL COMMENT '参与人数',
  PRIMARY KEY  (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO course VALUES ('8', '4', '化学基础与前沿', '2009-2011', '24', '研究生', '152');
INSERT INTO course VALUES ('9', '4', '半导体光催化基础', '2009-2011', '108', '研究生', '86');
INSERT INTO course VALUES ('10', '4', '材料科学前沿讲座', '2009-2011', '18', '本科生', '120');
INSERT INTO course VALUES ('11', '5', '天然产物化学', '2009至今', '36', '研究生', '10');
INSERT INTO course VALUES ('12', '6', '量子化学', '2009-2012', '60', '研究生', '10');
INSERT INTO course VALUES ('13', '6', '化学基础理论与前沿', '2009-2012', '60', '研究生', '100');
INSERT INTO course VALUES ('23', '5', '天然产物化学', '', '0', '', '');
INSERT INTO course VALUES ('24', '5', '天然产物化学', '', '0', '', '');
INSERT INTO course VALUES ('25', '5', '天然产物化学', '', '0', '', '');
INSERT INTO course VALUES ('26', '5', '天然产物化学', '', '0', '', '');
INSERT INTO course VALUES ('27', '1', '', '', '0', '', '');
INSERT INTO course VALUES ('28', '1', '', '', '0', '', '');
INSERT INTO course VALUES ('29', '7', '', '', '0', '', '');
INSERT INTO course VALUES ('30', '17', '', '', '0', '', '');
INSERT INTO course VALUES ('31', '4', 'y', '', '0', '', '');
INSERT INTO course VALUES ('32', '70', '', '', '0', '', '');

-- ----------------------------
-- Table structure for `discipline`
-- ----------------------------
DROP TABLE IF EXISTS `discipline`;
CREATE TABLE `discipline` (
  `des_id` int(11) NOT NULL auto_increment,
  `academy_id` int(11) NOT NULL default '0' COMMENT '学院序号',
  `academy_name` varchar(30) NOT NULL COMMENT '学院名称',
  `des_name` varchar(30) NOT NULL COMMENT '学科名称',
  `des_rank` int(11) NOT NULL default '1' COMMENT '学科级别',
  `des_no` char(33) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '学科编码',
  `start_time` date default NULL COMMENT '开始日期',
  `end_time` date default NULL COMMENT '截止日期',
  `is_doctor` int(11) NOT NULL default '0' COMMENT '是否博士点 "0"否 "1"是',
  `is_master` int(11) NOT NULL default '0' COMMENT '是否硕士点 "0"否 "1"是',
  `is_pro_key` int(11) NOT NULL default '0' COMMENT '是否省级重点学科 "0"否 "1"是',
  `ishave_pro_teach_job` int(11) NOT NULL default '0' COMMENT '是否设有省级特聘教授岗位 "0"否 "1"是',
  `ishave_pro_key_lab` int(11) NOT NULL default '0' COMMENT '是否有省部级以上重点实验室 "0"否 "1"是',
  `ishave_pro_base` int(11) NOT NULL default '0' COMMENT '是否有省部级以上科研、人才培养基地等 "0"否 "1"是',
  `get_doctor` int(11) NOT NULL default '0' COMMENT '招收博士生',
  `give_doctor_degree` int(11) NOT NULL default '0' COMMENT '授予博士学位',
  `get_academic_master` int(11) NOT NULL default '0' COMMENT '招收学术学位研究生',
  `get_professional_master` int(11) NOT NULL default '0' COMMENT '招收专业学位硕士生',
  `give_academic_master` int(11) NOT NULL default '0' COMMENT '授予学术学位硕士',
  `give_professional_master` int(11) NOT NULL COMMENT '授予专业学位硕士',
  `get_pro_teach_prize` int(11) NOT NULL default '0' COMMENT '获省级以上教学成果奖',
  `publish_book` int(11) NOT NULL default '0' COMMENT '出版教材（部）',
  `key_magazine_public` int(11) NOT NULL default '0' COMMENT '在学期间在国内外可信学术刊物上发表论文（部）',
  `publish_monographs` int(11) NOT NULL default '0' COMMENT '在学期间出版专著或译作（篇）',
  `get_pro_prize` int(11) NOT NULL default '0' COMMENT '在学期间科研成果获省（部）级以上奖励',
  `hold_intl_meeting` int(11) NOT NULL default '0' COMMENT '举办国际学术会议',
  `hold_inland_meeting` int(11) NOT NULL default '0' COMMENT '举办全国性学术会议',
  `join_out_meeting` int(11) NOT NULL default '0' COMMENT '出境参加国际会议',
  `join_in_meeting` int(11) NOT NULL default '0' COMMENT '参加全国性学术会议',
  `go_scholar` int(11) NOT NULL default '0' COMMENT '出境进修学者',
  `get_outland_scholar` int(11) NOT NULL default '0' COMMENT '接收境外进修学者',
  `inland_scholar` int(11) NOT NULL default '0' COMMENT '派出国内进修学者',
  `get_inland_scholar` int(11) NOT NULL default '0' COMMENT '接收国内进修学者',
  `cod_project` int(11) NOT NULL default '0' COMMENT '中外合作完成科研项目',
  `co_project` int(11) NOT NULL default '0' COMMENT '中外合作在研科研项目',
  `store_books` int(11) NOT NULL default '0' COMMENT '本学科中外文藏书合计',
  `have_magazine` int(11) NOT NULL default '0' COMMENT '拥有中外文期刊',
  `facility_value` double(10,0) NOT NULL default '0' COMMENT '本学科仪器设备总值(万元)',
  `school_give_money` double(10,0) NOT NULL default '0' COMMENT '学校对本学科的经费投入总计（万元）',
  `pro_give_money` double(10,0) NOT NULL default '0' COMMENT '省对本学科的经费投入总计（万元）',
  `other_give_money` double(10,0) NOT NULL default '0' COMMENT '其他经费投入总计（万元）',
  PRIMARY KEY  (`des_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of discipline
-- ----------------------------
INSERT INTO discipline VALUES ('15', '2', '欧亚', '化学', '2', '0703', '0000-00-00', '0000-00-00', '1', '1', '1', '1', '0', '0', '8', '4', '172', '18', '109', '9', '4', '6', '355', '0', '0', '0', '2', '38', '225', '3', '0', '0', '0', '2', '3', '0', '0', '2000', '600', '0', '100');
INSERT INTO discipline VALUES ('17', '2', '欧亚', '软件', '1', '0210', '0000-00-00', '0000-00-00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO discipline VALUES ('20', '3', '国教', '医学', '1', '1566', '0000-00-00', '0000-00-00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO discipline VALUES ('36', '4', '软件学院', '计算机科学', '1', '0213', null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO discipline VALUES ('37', '5', '撒旦了会计法', '地方', '1', '2345', null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL auto_increment COMMENT '日志序号',
  `ip` varchar(20) NOT NULL default '无' COMMENT '登陆ip',
  `login_time` datetime NOT NULL COMMENT '登陆时间',
  `user` varchar(30) NOT NULL default '0' COMMENT '账户名',
  PRIMARY KEY  (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO logs VALUES ('23', '172.20.1.50', '2013-06-06 18:36:30', 'admin');
INSERT INTO logs VALUES ('24', '172.20.92.113', '2013-06-06 18:45:04', 'admin');
INSERT INTO logs VALUES ('25', '182.120.0.42', '2013-06-07 20:48:07', 'admin');
INSERT INTO logs VALUES ('26', '172.20.92.113', '2013-06-07 20:57:56', 'admin');
INSERT INTO logs VALUES ('27', '172.20.92.113', '2013-06-07 20:58:15', 'admin');
INSERT INTO logs VALUES ('28', '172.20.92.113', '2013-06-07 21:42:36', 'admin');
INSERT INTO logs VALUES ('29', '172.20.92.113', '2013-06-07 21:42:41', 'admin');
INSERT INTO logs VALUES ('30', '172.20.1.50', '2013-06-08 20:41:32', 'admin');
INSERT INTO logs VALUES ('31', '172.20.92.113', '2013-06-08 20:46:07', 'admin');
INSERT INTO logs VALUES ('32', '172.20.92.113', '2013-06-08 20:46:57', 'admin');
INSERT INTO logs VALUES ('33', '172.20.92.113', '2013-06-08 20:47:15', 'admin');
INSERT INTO logs VALUES ('34', '172.20.92.113', '2013-06-08 20:49:09', 'admin');
INSERT INTO logs VALUES ('35', '172.20.92.113', '2013-06-08 20:49:33', 'admin');
INSERT INTO logs VALUES ('36', '172.20.92.113', '2013-06-08 20:54:41', 'admin');
INSERT INTO logs VALUES ('38', '172.20.1.50', '2013-06-09 11:58:30', 'admin');
INSERT INTO logs VALUES ('39', '172.20.1.50', '2013-06-09 11:59:23', 'admin');
INSERT INTO logs VALUES ('40', '218.196.207.176', '2013-06-09 15:44:30', 'admin');
INSERT INTO logs VALUES ('41', '182.120.2.125', '2013-06-10 10:11:30', 'admin');
INSERT INTO logs VALUES ('60', '172.20.1.50', '2013-06-18 20:30:16', 'admin');
INSERT INTO logs VALUES ('61', '127.0.0.1', '2013-06-18 20:31:59', '22');
INSERT INTO logs VALUES ('62', '127.0.0.1', '2013-06-18 20:41:54', 'admin');
INSERT INTO logs VALUES ('63', '127.0.0.1', '2013-06-18 20:43:21', 'admin');
INSERT INTO logs VALUES ('64', '127.0.0.1', '2013-06-18 20:44:01', 'admin');
INSERT INTO logs VALUES ('65', '127.0.0.1', '2013-06-18 20:44:57', 'admin');
INSERT INTO logs VALUES ('66', '127.0.0.1', '2013-06-18 20:46:16', 'admin');
INSERT INTO logs VALUES ('67', '172.20.1.50', '2013-06-18 20:46:58', 'admin');
INSERT INTO logs VALUES ('68', '172.20.1.50', '2013-06-18 20:47:35', 'admin');
INSERT INTO logs VALUES ('69', '172.20.1.50', '2013-06-18 20:48:54', 'admin');
INSERT INTO logs VALUES ('70', '127.0.0.1', '2013-06-18 20:53:30', 'admin');
INSERT INTO logs VALUES ('71', '127.0.0.1', '2013-06-18 21:00:17', 'admin');
INSERT INTO logs VALUES ('72', '127.0.0.1', '2013-07-20 11:58:59', 'admin');
INSERT INTO logs VALUES ('73', '127.0.0.1', '2013-08-28 10:17:44', 'admin');
INSERT INTO logs VALUES ('74', '172.20.1.50', '2013-09-17 10:17:51', '22');
INSERT INTO logs VALUES ('75', '172.20.1.50', '2013-09-17 11:59:23', '22');
INSERT INTO logs VALUES ('76', '127.0.0.1', '2013-09-23 20:05:08', 'admin');
INSERT INTO logs VALUES ('77', '127.0.0.1', '2013-09-23 20:05:37', 'admin');
INSERT INTO logs VALUES ('78', '172.20.1.50', '2013-09-24 11:34:44', 'admin');
INSERT INTO logs VALUES ('79', '172.20.1.50', '2013-09-24 11:49:07', 'admin');
INSERT INTO logs VALUES ('80', '127.0.0.1', '2014-01-15 18:17:55', 'admin');
INSERT INTO logs VALUES ('81', '127.0.0.1', '2014-01-17 08:48:40', 'admin');
INSERT INTO logs VALUES ('82', '127.0.0.1', '2014-01-17 14:58:53', 'admin');
INSERT INTO logs VALUES ('83', '127.0.0.1', '2014-01-18 08:32:48', 'admin');
INSERT INTO logs VALUES ('84', '127.0.0.1', '2014-01-18 09:58:16', 'admin');
INSERT INTO logs VALUES ('85', '127.0.0.1', '2014-01-18 15:17:34', 'admin');
INSERT INTO logs VALUES ('86', '127.0.0.1', '2014-01-19 09:11:41', 'admin');
INSERT INTO logs VALUES ('87', '127.0.0.1', '2014-01-19 14:41:26', 'admin');
INSERT INTO logs VALUES ('88', '127.0.0.1', '2014-02-07 14:51:50', 'admin');
INSERT INTO logs VALUES ('89', '127.0.0.1', '2014-03-28 16:28:12', 'admin');
INSERT INTO logs VALUES ('90', '127.0.0.1', '2014-08-21 19:04:45', 'admin');
INSERT INTO logs VALUES ('91', '127.0.0.1', '2014-08-25 17:01:28', 'admin');
INSERT INTO logs VALUES ('92', '127.0.0.1', '2014-09-01 13:32:12', 'admin');
INSERT INTO logs VALUES ('93', '127.0.0.1', '2014-09-17 10:41:19', 'admin');

-- ----------------------------
-- Table structure for `member_constitute`
-- ----------------------------
DROP TABLE IF EXISTS `member_constitute`;
CREATE TABLE `member_constitute` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `des_id` int(11) NOT NULL,
  `academic_direction_id` int(11) NOT NULL,
  `chengyuan_name` varchar(30) NOT NULL,
  `chengyuan_age` int(3) NOT NULL,
  `chengyuan_sex` varchar(10) NOT NULL,
  `chengyuan_post` varchar(10) NOT NULL,
  `chengyuan_xueli` varchar(10) NOT NULL,
  `chengyuan_xuewei` varchar(10) NOT NULL,
  `graduate_school` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member_constitute
-- ----------------------------

-- ----------------------------
-- Table structure for `money`
-- ----------------------------
DROP TABLE IF EXISTS `money`;
CREATE TABLE `money` (
  `money_id` int(11) NOT NULL auto_increment,
  `des_id` int(11) default '1' COMMENT '学科序号',
  `researcher_id` int(11) default NULL COMMENT '研究员序号',
  `time` int(11) default NULL COMMENT '使用经费的时间',
  `plan_use` varchar(300) NOT NULL default '0' COMMENT '计划经费使用（万元）',
  `reality_use` varchar(300) NOT NULL default '0' COMMENT '实际经费使用（万元）',
  PRIMARY KEY  (`money_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of money
-- ----------------------------
INSERT INTO money VALUES ('4', '0', '1', '0', '54', '20');
INSERT INTO money VALUES ('5', '0', '1', '0', '02', '20');
INSERT INTO money VALUES ('6', '0', '1', '2013', '02', '20');
INSERT INTO money VALUES ('16', '14', '0', '0', '0', '0');
INSERT INTO money VALUES ('17', '15', '0', '0', '', '');
INSERT INTO money VALUES ('21', '1', '52', '0', '', '');
INSERT INTO money VALUES ('22', '1', '52', '0', '', '');
INSERT INTO money VALUES ('23', '1', '52', '0', '', '');
INSERT INTO money VALUES ('24', '1', '53', '0', '', '');
INSERT INTO money VALUES ('25', '1', '53', '0', '', '');
INSERT INTO money VALUES ('26', '1', '53', '0', '', '');
INSERT INTO money VALUES ('27', '1', '54', '0', '', '');
INSERT INTO money VALUES ('28', '1', '54', '0', '', '');
INSERT INTO money VALUES ('29', '1', '54', '0', '', '');
INSERT INTO money VALUES ('31', '17', '0', '1974', '5', '0');
INSERT INTO money VALUES ('32', '17', '0', '42', '44', '22');
INSERT INTO money VALUES ('33', '17', '0', '0', '4', '0');
INSERT INTO money VALUES ('34', '1', '57', '2012', '34', '2');
INSERT INTO money VALUES ('35', '1', '57', '1899', '43', '2');
INSERT INTO money VALUES ('36', '1', '57', '0', '', '');
INSERT INTO money VALUES ('40', '1', '59', '0', '', '');
INSERT INTO money VALUES ('41', '1', '59', '0', '', '');
INSERT INTO money VALUES ('42', '1', '59', '0', '', '');
INSERT INTO money VALUES ('52', '1', '64', '0', '', '');
INSERT INTO money VALUES ('53', '1', '64', '0', '', '');
INSERT INTO money VALUES ('54', '1', '64', '0', '', '');
INSERT INTO money VALUES ('55', '1', '63', '0', '', '');
INSERT INTO money VALUES ('56', '1', '63', '0', '', '');
INSERT INTO money VALUES ('57', '1', '63', '0', '', '');
INSERT INTO money VALUES ('61', '1', '64', '0', '', '');
INSERT INTO money VALUES ('62', '1', '64', '0', '', '');
INSERT INTO money VALUES ('63', '1', '64', '0', '', '');
INSERT INTO money VALUES ('64', '20', '0', '0', '0', '0');
INSERT INTO money VALUES ('65', '20', '0', '0', '0', '0');
INSERT INTO money VALUES ('66', '20', '0', '0', '0', '0');
INSERT INTO money VALUES ('67', '1', '65', '0', '', '');
INSERT INTO money VALUES ('68', '1', '65', '0', '', '');
INSERT INTO money VALUES ('69', '1', '65', '0', '', '');
INSERT INTO money VALUES ('79', '1', '69', '0', '', '');
INSERT INTO money VALUES ('80', '1', '69', '0', '', '');
INSERT INTO money VALUES ('81', '1', '69', '0', '', '');
INSERT INTO money VALUES ('88', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('89', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('90', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('91', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('92', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('93', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('94', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('95', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('96', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('97', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('98', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('99', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('100', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('101', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('102', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('103', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('104', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('105', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('106', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('107', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('108', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('109', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('110', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('111', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('112', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('113', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('114', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('115', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('116', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('117', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('118', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('119', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('120', '0', '0', '0', '0', '0');
INSERT INTO money VALUES ('133', '36', null, null, '0', '0');
INSERT INTO money VALUES ('134', '36', null, null, '0', '0');
INSERT INTO money VALUES ('135', '36', null, null, '0', '0');
INSERT INTO money VALUES ('136', '1', '70', '0', '', '');
INSERT INTO money VALUES ('137', '1', '70', '0', '', '');
INSERT INTO money VALUES ('138', '1', '70', '0', '', '');
INSERT INTO money VALUES ('139', '37', null, null, '0', '0');
INSERT INTO money VALUES ('140', '37', null, null, '0', '0');
INSERT INTO money VALUES ('141', '37', null, null, '0', '0');

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL auto_increment,
  `des_id` int(11) NOT NULL default '1' COMMENT '学科序号',
  `notice_name` varchar(50) default NULL COMMENT '公告名称',
  `notice_content` text NOT NULL COMMENT '公告内容',
  `notice_time` date NOT NULL COMMENT '公告时间',
  `notice_company` varchar(20) default NULL COMMENT '公告单位',
  PRIMARY KEY  (`notice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO notice VALUES ('8', '1', '计算机与信息工程学院', '<h1><strong>清华大学</strong></h1>', '2013-05-17', '计算机与信息工程学院');
INSERT INTO notice VALUES ('9', '1', '物理学院', '北京大学', '2013-05-18', '物理学院');
INSERT INTO notice VALUES ('13', '1', '文学院', '文学院', '2013-05-18', '文学院');
INSERT INTO notice VALUES ('14', '1', '体育学院', '体育学院', '2013-05-17', '体育学院');
INSERT INTO notice VALUES ('15', '1', '艺术学院', '艺术学院', '2013-05-10', '艺术学院');

-- ----------------------------
-- Table structure for `performance_gather`
-- ----------------------------
DROP TABLE IF EXISTS `performance_gather`;
CREATE TABLE `performance_gather` (
  `id` int(30) unsigned NOT NULL auto_increment,
  `des_id` int(11) unsigned NOT NULL COMMENT '学科ID',
  `describe` text NOT NULL COMMENT '本学科点摘要',
  `guojiaji_jingfei` varchar(30) NOT NULL COMMENT '承担国家级科研项目（项）/经费',
  `shengji_jingfei` varchar(30) NOT NULL COMMENT '承担省部级科研项目（项）/经费',
  `hangye_jingfei` varchar(30) NOT NULL COMMENT '承担行业科研项目（项）/经费',
  `gaige_jingfei` varchar(30) NOT NULL COMMENT '承担省级教学改革立项（项）/经费',
  `hetong_jingfei` varchar(30) NOT NULL COMMENT '与企业政府的合作项目（项）/经费',
  `guojihezuo_jingfei` varchar(30) NOT NULL COMMENT '国际合作科研项目',
  `guoneihezuo_jingfei` varchar(30) NOT NULL COMMENT '国内合作科研项目',
  `aboveanmount_jingfei` varchar(30) NOT NULL COMMENT '上述六项科研经费总和/人均年经费',
  `kanwufabiao_amount` int(11) NOT NULL COMMENT '在国内外核心刊物发表论文',
  `beishoulu_amount` int(11) NOT NULL COMMENT '被SCI/SSCI/AHCI//,EI收录的论文',
  `chuban_amount` int(11) NOT NULL COMMENT '出版专著',
  `zhuanli_amount` int(11) NOT NULL COMMENT '获得专利',
  `jiaoxueprise_amount` int(11) NOT NULL COMMENT '获省部级以上教学成果奖励',
  `keyanprise_amount` int(11) NOT NULL COMMENT '获省部级以上科研成果奖励',
  `beyondshengji_amount` int(11) NOT NULL COMMENT '获省级以上质量工程项目',
  `beicaiyong_amount` int(11) NOT NULL COMMENT '被企业采用的科研成果',
  `zhuangrang_fieyong` int(11) NOT NULL COMMENT '科技成果转让费',
  `zengzhi_profit` int(11) NOT NULL COMMENT '科技成果转让为企业创造的增值',
  `beused_amount` int(11) NOT NULL COMMENT '被政府部门，事业单位采用的科研成果',
  `hezuo_amount` int(11) NOT NULL COMMENT '产学研合作单位',
  `boshi_amount` int(11) NOT NULL COMMENT '培养博士生',
  `yanjiusheng_amount` int(11) NOT NULL COMMENT '培养硕士生',
  `gaoceng_amount` int(11) NOT NULL COMMENT '引进高层次人才',
  `tepin_amount` int(11) NOT NULL COMMENT '上岗特聘教授',
  `gugan_amount` int(11) NOT NULL COMMENT '省级青年骨干教师，科研创新人才等',
  `peixun_amount` int(11) NOT NULL COMMENT '为企业或其他机构培训人员',
  `zhongdianshiyanshi_amount` int(11) NOT NULL COMMENT '国家或省级重点实验室',
  `gongcheng_amount` int(11) NOT NULL COMMENT '国家（教育部，省）工程中心',
  `boshidian_amount` int(11) NOT NULL COMMENT '新增博士点数量',
  `openshiyanshi_amount` int(11) NOT NULL COMMENT '省重点学科开放实验室',
  `yiqi_amount` int(11) NOT NULL COMMENT '购置万元以上仪器设备',
  `shebei_price` int(11) NOT NULL COMMENT '仪器设备总值',
  `chinesebook_amount` int(11) NOT NULL COMMENT '订购中文图书',
  `foreignbook_amount` int(11) NOT NULL COMMENT '订购外文图书',
  `chineseqikan_amount` int(11) NOT NULL COMMENT '订购中文期刊',
  `foreignqikan_amount` int(11) NOT NULL COMMENT '订购外文期刊',
  `yongfangmianji` int(11) NOT NULL COMMENT '建设或改造实验用房面积',
  `shiyanjidi_amount` int(11) NOT NULL COMMENT '建设教学，实验基地',
  `jinxiu_amount` int(11) NOT NULL COMMENT '出国进修/合作研究',
  `chuguospeech_amount` int(11) NOT NULL COMMENT '应邀出国讲学',
  `guoneispeech_amount` int(11) NOT NULL COMMENT '应邀国内讲学',
  `guojihuiyi_amount` int(11) NOT NULL COMMENT '主（承，协）办国际学术会议',
  `guoneihuiyi_amount` int(11) NOT NULL COMMENT '主（承，协）办国内学术会议',
  `guoneijigou_amount` int(11) unsigned NOT NULL COMMENT '国内学术合作机构',
  `guowaijigou_amount` int(11) NOT NULL COMMENT '国外学术合作机构',
  `guoneijiang_amount` int(11) NOT NULL COMMENT '国内学者来讲学',
  `guowaijiang_amount` int(11) NOT NULL COMMENT '国外学者来讲学',
  `guojihuiyi` int(11) NOT NULL COMMENT '参加学术会议(国外)',
  `guoneihuiyi` int(11) NOT NULL COMMENT '参加学术会议(国内)',
  `xuexiaotouru` int(11) NOT NULL COMMENT '学校投入经费',
  `xuekediantouru` int(11) NOT NULL COMMENT '学科点投入经费',
  `describe_canzhaoxi` text NOT NULL COMMENT '描述参照系',
  `describe_function` text NOT NULL COMMENT '实现目标的措施与方法',
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of performance_gather
-- ----------------------------
INSERT INTO performance_gather VALUES ('1', '15', '    		    		    		    		    		哇哇哇哇你想爱我吗我想爱你规划法规嗡嗡嗡打算打发斯蒂芬阿斯顿发生阿斯顿法师打发的阿斯顿发我爱sdf你    	    	    	    	    	    	    	    	    	    	    	    	    	    	', '201212/989340', '787878', '1115', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '0', '1215', '1215', '1215', '1215', '1212', '1215', '1215', '1215', '1212', '1215', '55555', '21215', '1215', '1215', '1215', '12115', '2215', '1215', '1215', '1215', '1215', '1215', '121215', '1215', '201212', '										qq群爱你真的很难真的想爱你噢噢噢噢阿斯顿发钱钱钱钱钱钱钱钱钱阿斯顿发送到我爱您														', '    	    	    	    	    	嗡嗡嗡难男男女女真的想爱你又有意义有意义阿斯顿发嘎嘎嘎嘎嘎嘎阿斯顿发送到发送地方你爱我                                                        ', '201212');
INSERT INTO performance_gather VALUES ('2', '15', '    		    		    		    		    		哇哇哇哇你想爱我吗我想爱你规划法规嗡嗡嗡打算打发斯蒂芬阿斯顿发生阿斯顿法师打发的阿斯顿发我爱sdf你    	    	    	    	    	    	    	    	    	    	    	    	    	    	', '201512', '787878', '1115', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '0', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '55555', '21215', '1215', '1215', '1215', '12115', '2215', '1215', '1215', '1215', '1215', '1215', '121215', '1215', '201512', '										qq群爱你真的很难真的想爱你噢噢噢噢阿斯顿发钱钱钱钱钱钱钱钱钱阿斯顿发送到我爱您														', '    	    	    	    	    	嗡嗡嗡难男男女女真的想爱你又有意义有意义阿斯顿发嘎嘎嘎嘎嘎嘎阿斯顿发送到发送地方你爱我                                                        ', '201512');
INSERT INTO performance_gather VALUES ('5', '17', '阿斯顿法师打发', '656565', '787878', '1115', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '55555', '21215', '1215', '1215', '1215', '12115', '2215', '1215', '1215', '1215', '1215', '1215', '121215', '1215', '656565', '阿斯顿发 撒旦法地方阿斯顿法师打发', '是的飞洒飞的', '201212');
INSERT INTO performance_gather VALUES ('6', '17', '啊打发撒地方斯蒂芬', '656565', '787878', '1115', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '1215', '12', '1215', '1215', '1215', '12', '1215', '55555', '21215', '1215', '1215', '1215', '12115', '2215', '1215', '1215', '1215', '1215', '1215', '121215', '1215', '656565', '阿斯顿发撒旦法撒旦法撒旦法', '阿迪司法斯蒂芬', '201512');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `pro_id` int(11) NOT NULL auto_increment,
  `researcher_id` int(11) default NULL COMMENT '研究员序号',
  `pro_name` varchar(500) default NULL COMMENT '项目名称',
  `pro_from` varchar(100) default NULL COMMENT '项目来源',
  `start_time` date default NULL COMMENT '开始时间',
  `end_time` date default NULL COMMENT '结束时间',
  `give_money` double(10,0) NOT NULL default '0' COMMENT '科研经费',
  `pro_position` varchar(10) NOT NULL default '主持' COMMENT '本人承担任务',
  `is_invent` int(11) NOT NULL default '0' COMMENT '是否获发明专利 "0"否 "1"是',
  `result_transfer` int(11) NOT NULL default '0' COMMENT '科研成果是否转让 “0”否 “1”是',
  `earn_money` double(10,0) NOT NULL default '0' COMMENT '直接经济效益（万元）',
  `is_complete` int(11) NOT NULL default '1' COMMENT '项目是否完成 “0”否 “1”是',
  `level` int(11) NOT NULL default '0' COMMENT '项目级别 “0”表示厅局级 “1”表示省部级 “2”表示国家级',
  PRIMARY KEY  (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO project VALUES ('1', '1', '铌氧簇稀土衍生物的控制合成、结构及光学性', '国家自然科学基金', '2011-12-00', '2013-12-00', '40', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('2', '1', '杂多阴离子配位聚合物的设计、控制合成及性', '博士学科点专项科研基金', '2009-01-00', '2011-12-00', '6', '主持', '0', '0', '0', '1', '1');
INSERT INTO project VALUES ('3', '1', '基于丰产元钼、钨的材料化学（094200', '河南省杰出人才', '2009-01-00', '2011-12-00', '50', '主持', '0', '0', '0', '1', '2');
INSERT INTO project VALUES ('4', '1', '聚金属氧簇配位聚合物内有机小分子配位的脱', '国家自然科学基金', '2008-01-00', '2010-12-00', '29', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('5', '1', '有机磷酸构筑的多金属氧簇的制备、结构及性', '国家自然科学基金', '2012-01-00', '2016-12-01', '0', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('6', '2', '基于多胺循环的“类黄铜-多胺”缀合物合成', '国家自然科学基金', '2012-01-00', '2015-12-00', '65', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('7', '2', '基于多胺转运的萘亚酰胺类小分子', '国家自然科学基金', '2013-04-01', '2013-05-10', '40', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('8', '2', '基于多胺转运的萘亚酰胺类小分子化合物对肿', '国家自然科学基金', '2010-01-00', '2012-12-00', '50', '主持', '0', '0', '0', '1', '1');
INSERT INTO project VALUES ('9', '2', '双向靶向性“蒽醌-多胺”缀合物的合成与生', '国家自然科学基金', '2010-04-16', '2011-12-00', '26', '主持', '0', '0', '0', '1', '2');
INSERT INTO project VALUES ('13', '4', '基于丰产元钼、钨的材料化学（094200', '国家自然科学基金', '2013-03-31', '2013-05-11', '60', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('14', '4', '基于丰产元钼、钨的材料化学（094200', '国家自然科学基金', '2013-04-01', '2013-04-03', '20', '主持', '0', '0', '0', '1', '1');
INSERT INTO project VALUES ('15', '4', '基于丰产元钼、钨的材料化学（094200', '国家自然科学基金', '2013-03-31', '2013-06-08', '40', '主持', '0', '0', '0', '1', '2');
INSERT INTO project VALUES ('16', '5', '聚金属氧簇配位聚合物内有机小分子配位的脱', '国家自然科学基金', '2013-04-16', '2013-05-31', '10', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('17', '5', '聚金属氧簇配位聚合物内有机小分子配位的脱', '国家自然科学基金', '2013-04-10', '2013-05-09', '20', '主持', '0', '0', '0', '1', '1');
INSERT INTO project VALUES ('18', '5', '聚金属氧簇配位聚合物内有机小分子配位的脱', '国家自然科学基金', '2013-03-31', '2013-05-11', '30', '主持', '0', '0', '0', '1', '2');
INSERT INTO project VALUES ('19', '6', '基于多胺转运的萘亚酰胺类小分子化合物对肿', '国家自然科学基金', '2013-04-01', '2013-05-11', '10', '主持', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('20', '6', '基于多胺转运的萘亚酰胺类小分子化合物对肿', '国家自然科学基金', '2013-04-08', '2013-05-11', '20', '主持', '0', '0', '0', '1', '1');
INSERT INTO project VALUES ('21', '6', '基于多胺转运的萘亚酰胺类小分子化合物对肿', '国家自然科学基金', '2013-05-05', '2013-07-06', '30', '主持', '0', '0', '0', '1', '2');
INSERT INTO project VALUES ('22', '1', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('23', '7', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('24', '7', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('25', '4', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('26', '17', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('27', '70', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('28', '70', 'fs', 'fs', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('29', '4', 'u', 'u', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('30', '70', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('31', '1', '', '', '2013-06-06', '0000-00-00', '0', '', '0', '0', '0', '1', '0');
INSERT INTO project VALUES ('32', '1', '', '', '0000-00-00', '0000-00-00', '0', '', '0', '0', '0', '1', '0');

-- ----------------------------
-- Table structure for `researchers`
-- ----------------------------
DROP TABLE IF EXISTS `researchers`;
CREATE TABLE `researchers` (
  `des_id` int(11) NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(10) default NULL COMMENT '姓名',
  `sex` varchar(5) NOT NULL default '男' COMMENT '性别',
  `birthday` varchar(20) default NULL COMMENT '出生日期',
  `position` varchar(10) default NULL COMMENT '专业技术职务',
  `set_time` date default NULL COMMENT '专业技术职务定职时间',
  `job` varchar(15) NOT NULL default '研导' COMMENT '博导/研导',
  `note` varchar(100) default NULL COMMENT '备注',
  `graduate_record` varchar(100) default NULL COMMENT '毕业时间、学校、专业、获得最高学位或最后学历',
  `work_section` varchar(50) NOT NULL default '河南大学化学化工学院' COMMENT '工作单位（至院、系、所）',
  `study_branch` int(11) NOT NULL COMMENT '主要研究方向',
  `part_time` varchar(100) NOT NULL COMMENT '国内外学术兼职情况',
  `academic_name` varchar(100) NOT NULL COMMENT '主要学术荣誉称号',
  `sci_receive` int(11) NOT NULL default '0' COMMENT 'SCI/EI/ISTP收录',
  `publish_article_in_key` int(11) NOT NULL default '0' COMMENT '在国内外核心学术刊物上发表论文总数',
  `publish_books` int(11) NOT NULL default '0' COMMENT '出版专著（译著等）',
  `won_sum` int(11) NOT NULL default '0' COMMENT '获奖成果总数',
  `won_nation_level` int(11) NOT NULL default '0' COMMENT '获国家级奖项数',
  `won_pro_level` int(11) NOT NULL default '0' COMMENT '获省部级奖项数',
  `won_office_level` int(11) NOT NULL default '0' COMMENT '获厅局级奖项数',
  `control_money` double(10,0) NOT NULL default '0' COMMENT '近三年可支配科研经费（万元）',
  `graduated_master` int(11) NOT NULL default '0' COMMENT '近三年培养已毕业研究生',
  `school_master` int(11) NOT NULL default '0' COMMENT '近三年培养的在校研究生',
  `graduated_doctor` int(11) NOT NULL default '0' COMMENT '近三年培养的已毕业博士生',
  `school_doctor` int(11) NOT NULL default '0' COMMENT '近三年培养的在校博士生数',
  `leader` int(11) NOT NULL default '0' COMMENT '是否是带头人0否1是',
  `degree` varchar(15) NOT NULL COMMENT '学历',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of researchers
-- ----------------------------
INSERT INTO researchers VALUES ('15', '1', '牛景杨', '男', '1964-09-01', '教授', '1999-11-08', '博导', 'D，E', '博士    ', '河南大学化学与化工院', '2', '中国化学会理事、无机化学专业委员会委员，河南省化学会副理事长理事、无机化学专业委员会主任，河南省化工学会常务理事', '享受政府特殊津贴专家、河南省优秀专家、河南省优秀青年科技专家、河南省跨世纪学术带头人、河南省中青年骨干教师', '0', '29', '1', '0', '0', '7', '2', '219', '1', '12', '1', '16', '0', '博士');
INSERT INTO researchers VALUES ('15', '2', '王超杰', '男', '1965-06-00', '教授', '2003-11-00', '博导', 'F', '1997年，中山大学，有机化学，博士', '河南大学，河南省天然药物与免疫工程重点实验室', '2', '河南省化学会常务理事、副秘书长', '河南省学术技术带头人', '0', '9', '0', '1', '0', '1', '0', '80', '0', '4', '6', '4', '1', '博士');
INSERT INTO researchers VALUES ('15', '4', '杨建军', '男', '1965-07-02', '教授', '1965-09-00', '博导', '', '2001年7月毕业于中国科学院兰州化学物理研究所获博士学位', '河南大学特种功能材料重点实验室', '1', '中国可再生能源学会理事，光化学专业委员会委员', '河南省教育厅学术技术带头人，河南省高校新世纪优秀人才', '0', '9', '0', '0', '0', '0', '0', '12', '0', '2', '3', '6', '0', '博士');
INSERT INTO researchers VALUES ('15', '5', '刘绣华', '女', '1966-02-00', '教授', '2002-00-00', '博导', 'F', '1998.12，中国科学院兰州化学物理研究所、昆明植物研究所，天然产物与药物化学，理学博士学位', '化学化工学位，化学系，环境与分析科学研究所', '0', '河南省化学会常务理事', '河南省“三八红旗手“；河南省学术技术带头人', '0', '10', '0', '25', '0', '0', '25', '162', '0', '8', '17', '15', '0', '博士');
INSERT INTO researchers VALUES ('15', '6', '张敬来', '男', '1964-07-00', '教授', '0000-00-00', '研导', '', '1996年毕业于四川大学物理化学专业获博士学位', '河南大学化学化工学院', '2', '无', '无', '0', '0', '0', '2', '0', '2', '0', '10', '0', '10', '3', '7', '0', '博士');
INSERT INTO researchers VALUES ('15', '7', '卜占伟', '男', '1964-05-00', '教授', '0000-00-00', '博士', '', '', '河南大学化学化工学院', '3', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '8', '王敬平', '男', '1964-10-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '9', '0', '0', '0', '硕士');
INSERT INTO researchers VALUES ('15', '9', '柏', '男', '1973-02-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '2', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '10', '赵俊伟', '男', '1976-06-00', '副教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '11', '江智勇', '男', '1974-08-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '2', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '12', '史峰', '男', '1978-08-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '13', '刘洪均', '男', '1984-08-00', '副教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '14', '石家华', '男', '1972-02-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '16', '李德亮', '男', '1964-09-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '1', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('15', '17', '赵彦保', '男', '1969-10-00', '教授', '0000-00-00', '研导', '', '', '河南大学化学化工学院', '2', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '0', '0', '0', '博士');
INSERT INTO researchers VALUES ('17', '57', '刘伟', '男', '', '', '0000-00-00', '', '', ' ', '', '14', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '');
INSERT INTO researchers VALUES ('20', '65', '卢丽丽', '女', '1966-02-00', '', '0000-00-00', '', '', '', '', '25', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO researchers VALUES ('20', '69', '张大坤', '男', '1966-02-00', '', '0000-00-00', '', '', '', '', '25', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '');
INSERT INTO researchers VALUES ('36', '70', '张顺', '', '', '', '0000-00-00', '', '', '', '', '34', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');

-- ----------------------------
-- Table structure for `researcher_achievement`
-- ----------------------------
DROP TABLE IF EXISTS `researcher_achievement`;
CREATE TABLE `researcher_achievement` (
  `achievement_id` int(11) unsigned NOT NULL auto_increment,
  `researcher_id` int(11) NOT NULL,
  `achievement_name` text NOT NULL COMMENT '成果名称',
  `department_time` text NOT NULL COMMENT '鉴定单位与时间',
  `signature` varchar(100) NOT NULL COMMENT '本人署名次序',
  PRIMARY KEY  (`achievement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of researcher_achievement
-- ----------------------------
INSERT INTO researcher_achievement VALUES ('1', '1', 'organic lsadkjf askdjfo sd f ', 'j.mater.chem;2011,21,1254', '通讯作者');
INSERT INTO researcher_achievement VALUES ('2', '1', 'asdfawe as f', 'dfa  f ', '通讯作者');
INSERT INTO researcher_achievement VALUES ('3', '1', 'dfgaf sdfa adsf ', '2011,12,4', '通讯作者');

-- ----------------------------
-- Table structure for `science_study`
-- ----------------------------
DROP TABLE IF EXISTS `science_study`;
CREATE TABLE `science_study` (
  `science_id` int(33) NOT NULL auto_increment,
  `des_id` int(11) NOT NULL,
  `core_article` int(33) NOT NULL COMMENT '核心期刊发表论文',
  `sci` int(33) NOT NULL COMMENT 'SCI/EI/ISTP',
  `publish_article` int(33) NOT NULL COMMENT '出版社学术专著/译著',
  `national_award` int(33) NOT NULL COMMENT '获国家奖级',
  `province_award` int(33) NOT NULL COMMENT '省部级奖',
  `other_award` int(33) NOT NULL COMMENT '其他科研奖',
  `own_invent_patent` int(33) NOT NULL COMMENT '获发明专利',
  `science_result` int(33) NOT NULL COMMENT '科研成果转让',
  `direct_economy` double(22,0) NOT NULL COMMENT '直接经济效益（万元）',
  `all_science_funds` double(22,0) NOT NULL COMMENT '科研经费合计（万元）',
  `year_average` double(22,0) NOT NULL COMMENT '年平均（万元）',
  `over_science_project` int(33) NOT NULL COMMENT '已完成科研项目',
  `in_science_project` int(33) NOT NULL COMMENT '目前承担科研项目',
  `over_national_science_education` int(33) NOT NULL COMMENT 'over国家发改委，科技部，教育项目',
  `in_national_science_education` int(33) NOT NULL COMMENT 'in国家发改委，科技部，教育项目',
  `over_national_socity_project` int(33) NOT NULL COMMENT 'over国家自然科学，社会科学基金项目',
  `in_national_socity_project` int(33) NOT NULL COMMENT 'in国家自然科学，社会科学基金项目',
  `over_other_national_project` int(33) NOT NULL COMMENT 'over国务院其他各部门及项目及国防重大项目',
  `in_other_national_project` int(33) NOT NULL COMMENT 'in国务院其他各部门及项目及国防重大项目',
  `over_local_govermment_project` int(33) NOT NULL COMMENT 'over地方政府项目',
  `in_local_govermment_project` int(33) NOT NULL COMMENT 'in地方政府项目',
  `over_company_project` int(33) NOT NULL COMMENT 'over企业单位委托项',
  `in_company_project` int(33) NOT NULL COMMENT 'in企业单位委托项',
  `in_have_project_funds` double(22,0) NOT NULL COMMENT '目前承担项目经费合计',
  `person_average` double(22,0) NOT NULL COMMENT '人均',
  PRIMARY KEY  (`science_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of science_study
-- ----------------------------
INSERT INTO science_study VALUES ('1', '1', '355', '320', '1', '0', '1', '65', '12', '0', '0', '1614', '538', '32', '61', '1', '5', '10', '22', '0', '0', '21', '30', '0', '4', '1269', '20');
INSERT INTO science_study VALUES ('2', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('3', '9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('4', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('5', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('6', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('7', '13', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('8', '14', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('9', '13', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('10', '14', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('11', '15', '355', '320', '1', '0', '1', '65', '12', '0', '0', '1614', '538', '0', '0', '1', '5', '10', '22', '0', '0', '21', '30', '0', '4', '1269', '20');
INSERT INTO science_study VALUES ('12', '16', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('13', '17', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('14', '18', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('15', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('16', '19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('17', '20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('18', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('21', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('22', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('23', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('24', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('26', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('27', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('28', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('33', '36', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO science_study VALUES ('34', '37', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `studybranch`
-- ----------------------------
DROP TABLE IF EXISTS `studybranch`;
CREATE TABLE `studybranch` (
  `branch_id` int(11) NOT NULL auto_increment,
  `des_id` int(11) NOT NULL COMMENT '学科序号',
  `researcher_id` int(11) NOT NULL COMMENT '研究人员序号',
  `branch_name` varchar(30) NOT NULL COMMENT '研究方向名称',
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studybranch
-- ----------------------------
INSERT INTO studybranch VALUES ('1', '15', '1', '多酸化学');
INSERT INTO studybranch VALUES ('2', '15', '1', '功能多聚物');
INSERT INTO studybranch VALUES ('3', '15', '1', '有机物');
INSERT INTO studybranch VALUES ('14', '17', '0', '嵌入式');
INSERT INTO studybranch VALUES ('25', '20', '0', '临床');
INSERT INTO studybranch VALUES ('31', '20', '0', '中医学');
INSERT INTO studybranch VALUES ('33', '20', '0', '外科');
INSERT INTO studybranch VALUES ('34', '36', '0', '软件工程');

-- ----------------------------
-- Table structure for `task_book`
-- ----------------------------
DROP TABLE IF EXISTS `task_book`;
CREATE TABLE `task_book` (
  `task_id` int(11) unsigned NOT NULL auto_increment COMMENT '目标任务书ID',
  `des_id` int(11) unsigned NOT NULL COMMENT '学科ID',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `birthday` varchar(30) NOT NULL COMMENT '出生日期',
  `post` varchar(30) NOT NULL COMMENT '职务',
  `digree` varchar(10) NOT NULL COMMENT '学位',
  `discribe` text NOT NULL COMMENT '研究方向意义',
  `academic_direction` varchar(250) NOT NULL COMMENT '学术方向',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `kanwu_amount` int(11) NOT NULL COMMENT '在国内外核心刊物发表论文',
  `sci_amount` int(11) NOT NULL COMMENT 'sci/ssci/收录的论文',
  `guojiaji_amount` int(11) NOT NULL COMMENT '主持国家级科研项目',
  `shengbuji_amount` int(11) NOT NULL COMMENT '主持省部级科研项目',
  `shengjiaoxue_amount` int(11) NOT NULL COMMENT '主持省级教学改革立项',
  `hengxiang_amount` int(11) NOT NULL COMMENT '承担横向协作项目',
  `guoji_amount` int(11) NOT NULL COMMENT '承担国际合作项目',
  `chuban_amount` int(11) NOT NULL COMMENT '出版著作',
  `zhuanli_amount` int(11) NOT NULL COMMENT '获得专利',
  `qiyehezuo_amount` int(11) NOT NULL COMMENT '与企业和其他机构的合作研究',
  `keyanjiangli_amount` int(11) NOT NULL COMMENT '获得省部级以上教学科研奖励',
  `guojihuiyi_amount` int(11) NOT NULL COMMENT '参加国际学术会议',
  `guoneihuiyi_amount` int(11) NOT NULL COMMENT '参加国内学术会议',
  `chuguojiangxue_amount` int(11) NOT NULL COMMENT '出国讲学或合作研究',
  `peiyangboshi_amount` int(11) NOT NULL COMMENT '培养博士生',
  `peiyangshuoshi_amount` int(11) NOT NULL COMMENT '培养硕士生',
  `guojijingfei` int(11) NOT NULL COMMENT '实际到位的科研经费（国际）',
  `guoneijingfei` int(11) NOT NULL COMMENT '实际到位的科研经费（国内）',
  PRIMARY KEY  (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of task_book
-- ----------------------------
INSERT INTO task_book VALUES ('1', '15', '男', '1991', '教授', '博士', '撒大是大非阿萨德发生的', '阿斯兰的发色哦爱上发动机我爱额飞', '马方圆', '2', '1', '44', '5', '6', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '675', '568');
INSERT INTO task_book VALUES ('2', '15', '男', '1980', '教授', '博士', '撒的发发发', '阿萨德发士大夫', '季少平', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '2123', '1234');
INSERT INTO task_book VALUES ('3', '17', '男', '1985', '教授', '博士', '撒的发生', '阿萨德法师', '齐轶群', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '435', '354');

-- ----------------------------
-- Table structure for `time`
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `time_id` int(11) NOT NULL auto_increment,
  `des_id` int(11) NOT NULL COMMENT '学科序号',
  `basic_time` date NOT NULL COMMENT '基本状况',
  `study_troop` date NOT NULL COMMENT '学术队伍',
  `science_study_start` date NOT NULL COMMENT '科学研究开始时间',
  `science_study_end` date NOT NULL COMMENT '科学研究终止时间',
  `science_study_end2` date NOT NULL COMMENT '目前承担项目前时间',
  `people_start` date NOT NULL COMMENT '人才培养开始时间',
  `people_end` date NOT NULL COMMENT '人才培养结束时间',
  `chat_start` date NOT NULL COMMENT '学术交流与合作开始时间',
  `chat_end` date NOT NULL COMMENT '学术交流与合作结束时间',
  `now1` date NOT NULL COMMENT '现有条件1',
  `now_start` date NOT NULL COMMENT '现有条件开始时间',
  `now_end` date NOT NULL COMMENT '现有条件结束时间',
  PRIMARY KEY  (`time_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of time
-- ----------------------------
INSERT INTO time VALUES ('4', '15', '2011-12-01', '2011-12-01', '2009-01-01', '2011-12-01', '2011-12-01', '2009-01-01', '2011-12-01', '2009-01-01', '2011-12-01', '2011-12-01', '2009-01-01', '2011-12-01');
INSERT INTO time VALUES ('6', '17', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('10', '20', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('11', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('12', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('13', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('14', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('15', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('16', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('17', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('18', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('19', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('20', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('21', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('26', '36', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');
INSERT INTO time VALUES ('27', '37', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for `treatise`
-- ----------------------------
DROP TABLE IF EXISTS `treatise`;
CREATE TABLE `treatise` (
  `treatise_id` int(11) NOT NULL auto_increment,
  `research_id` int(11) default NULL COMMENT '研究员序号',
  `treatise_name` varchar(20) default NULL COMMENT '专著/译著名称',
  `publish_time` date default NULL COMMENT '出版时间',
  `publish_company` varchar(15) default NULL COMMENT '出版单位',
  PRIMARY KEY  (`treatise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatise
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `researcher_id` int(11) NOT NULL COMMENT '研究员序号',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `account_name` varchar(10) NOT NULL default '学科研究员' COMMENT '账户名称',
  `password` varchar(255) NOT NULL,
  `power` enum('3','2','1','0') NOT NULL default '1' COMMENT '0 代表本账号被限制登陆 1代表校级管理员  2代表院级管理员 3代表普通研究员',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('3', '0', '22', '院级管理员', '123', '2');
INSERT INTO user VALUES ('4', '0', 'admin', '校级管理员', 'admin', '3');
INSERT INTO user VALUES ('37', '1', '1', '学科研究员', '123', '1');
INSERT INTO user VALUES ('38', '2', '2', '学科研究员', '123', '1');
INSERT INTO user VALUES ('39', '4', '3', '学科研究员', '123', '1');
INSERT INTO user VALUES ('40', '5', '4', '学科研究员', '123', '1');
INSERT INTO user VALUES ('41', '6', '5', '学科研究员', '123', '1');
INSERT INTO user VALUES ('42', '7', '6', '学科研究员', '123', '1');
INSERT INTO user VALUES ('43', '8', '7', '学科研究员', '123', '1');
INSERT INTO user VALUES ('44', '9', '8', '学科研究员', '123', '1');
INSERT INTO user VALUES ('45', '10', '9', '学科研究员', '123', '1');
INSERT INTO user VALUES ('46', '11', '10', '学科研究员', '123', '1');
INSERT INTO user VALUES ('47', '12', '11', '学科研究员', '123', '1');
INSERT INTO user VALUES ('48', '13', '12', '学科研究员', '123', '1');
INSERT INTO user VALUES ('49', '14', '13', '学科研究员', '123', '1');
INSERT INTO user VALUES ('50', '16', '14', '学科研究员', '123', '1');
INSERT INTO user VALUES ('55', '16', '17', '学科研究员', '123', '1');
INSERT INTO user VALUES ('56', '17', '18', '学科研究员', '123', '1');
INSERT INTO user VALUES ('59', '57', '57', '学科研究员', '123', '1');
INSERT INTO user VALUES ('60', '65', '15', '学科研究员', '123', '2');
