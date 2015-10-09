/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50021
Source Host           : localhost:3306
Source Database       : kfhome

Target Server Type    : MYSQL
Target Server Version : 50021
File Encoding         : 65001

Date: 2014-03-11 20:19:26
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `charge_department`
-- ----------------------------
DROP TABLE IF EXISTS `charge_department`;
CREATE TABLE `charge_department` (
  `cd_id` int(11) NOT NULL auto_increment,
  `dep_name` varchar(200) NOT NULL COMMENT '收费部门名称',
  PRIMARY KEY  (`cd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charge_department
-- ----------------------------

-- ----------------------------
-- Table structure for `charge_info`
-- ----------------------------
DROP TABLE IF EXISTS `charge_info`;
CREATE TABLE `charge_info` (
  `ci_id` int(11) NOT NULL auto_increment,
  `number` text NOT NULL COMMENT '项目序号',
  `project` text NOT NULL COMMENT '收费项目',
  `biaozhun` text NOT NULL COMMENT '收费标准',
  `yiju` varchar(200) NOT NULL COMMENT '收费依据',
  `mark` text NOT NULL COMMENT '备注',
  `dep_id` int(3) NOT NULL COMMENT '收费部门id',
  PRIMARY KEY  (`ci_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charge_info
-- ----------------------------

-- ----------------------------
-- Table structure for `fuwu_daohang`
-- ----------------------------
DROP TABLE IF EXISTS `fuwu_daohang`;
CREATE TABLE `fuwu_daohang` (
  `fd_id` int(11) NOT NULL auto_increment,
  `type` int(11) NOT NULL COMMENT '服务类型：1（代表工作时间）2（代表中心简介）3（各个楼层布局）',
  `picture_path` text NOT NULL COMMENT '图片路径',
  `content` text NOT NULL COMMENT '内容',
  `title` varchar(255) NOT NULL COMMENT '标题',
  PRIMARY KEY  (`fd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fuwu_daohang
-- ----------------------------

-- ----------------------------
-- Table structure for `gov_department`
-- ----------------------------
DROP TABLE IF EXISTS `gov_department`;
CREATE TABLE `gov_department` (
  `gd_id` int(11) NOT NULL auto_increment,
  `dep_type` int(11) NOT NULL COMMENT '政府部门类型',
  `dep_name` varchar(100) NOT NULL COMMENT '政府部门名称',
  `dep_logo` text COMMENT '政府部门图标',
  `dep_url` text COMMENT '政府部门网站链接',
  `phone` varchar(20) NOT NULL default '' COMMENT '电话',
  PRIMARY KEY  (`gd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gov_department
-- ----------------------------
INSERT INTO gov_department VALUES ('1', '1', '开封市行政服务中心', null, null, '66666');
INSERT INTO gov_department VALUES ('2', '1', '开封市国税局', null, null, '66666');
INSERT INTO gov_department VALUES ('3', '1', '公共资源交易中心', null, null, '66666');
INSERT INTO gov_department VALUES ('4', '1', '人社局', null, null, '66666');
INSERT INTO gov_department VALUES ('5', '1', '房地产交易登记中心', null, null, '66666');
INSERT INTO gov_department VALUES ('6', '1', '公安局', null, null, '55555');
INSERT INTO gov_department VALUES ('7', '1', '地税局', null, null, '44444');
INSERT INTO gov_department VALUES ('8', '1', '市纪委效能中心', null, null, '33333');
INSERT INTO gov_department VALUES ('9', '1', '工商局', null, null, '22222');
INSERT INTO gov_department VALUES ('10', '1', '联通公司', null, null, '11111');
INSERT INTO gov_department VALUES ('11', '1', '新区管委会', null, null, '00000');

-- ----------------------------
-- Table structure for `gov_dep_project`
-- ----------------------------
DROP TABLE IF EXISTS `gov_dep_project`;
CREATE TABLE `gov_dep_project` (
  `gdp_id` int(11) NOT NULL auto_increment,
  `dep_id` int(11) NOT NULL COMMENT '部门id',
  `project_title` text NOT NULL COMMENT '事项名称',
  `project_content` text NOT NULL COMMENT '事项内容',
  `status` int(3) NOT NULL COMMENT '0（代表未办理事项）1（代表已经办理事项）',
  `number` varchar(20) NOT NULL COMMENT '编号',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`gdp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gov_dep_project
-- ----------------------------

-- ----------------------------
-- Table structure for `gov_dep_table_download`
-- ----------------------------
DROP TABLE IF EXISTS `gov_dep_table_download`;
CREATE TABLE `gov_dep_table_download` (
  `gdtd_id` int(11) NOT NULL auto_increment,
  `dep_id` int(11) NOT NULL COMMENT '部门id',
  `project_id` text NOT NULL COMMENT '事项id',
  `table_path` text NOT NULL COMMENT '表格下载路径',
  `table_name` varchar(100) NOT NULL COMMENT '表格名称',
  PRIMARY KEY  (`gdtd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gov_dep_table_download
-- ----------------------------

-- ----------------------------
-- Table structure for `gov_dep_type`
-- ----------------------------
DROP TABLE IF EXISTS `gov_dep_type`;
CREATE TABLE `gov_dep_type` (
  `gdt_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(100) NOT NULL COMMENT '政府部门类型名称',
  `type_logo` text COMMENT '政府部门类型图标',
  PRIMARY KEY  (`gdt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gov_dep_type
-- ----------------------------
INSERT INTO gov_dep_type VALUES ('1', '备案核准', null);
INSERT INTO gov_dep_type VALUES ('2', '出入境管理', null);
INSERT INTO gov_dep_type VALUES ('3', '人力资源', null);
INSERT INTO gov_dep_type VALUES ('4', 'dddddd', null);

-- ----------------------------
-- Table structure for `serve_company`
-- ----------------------------
DROP TABLE IF EXISTS `serve_company`;
CREATE TABLE `serve_company` (
  `sc_id` int(11) NOT NULL auto_increment,
  `company_type` int(11) NOT NULL COMMENT '公司类型',
  `company_name` varchar(100) NOT NULL COMMENT '公司名称',
  `company_logo` text NOT NULL COMMENT '公司图标',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `company_url` text NOT NULL COMMENT '公司网站链接',
  PRIMARY KEY  (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serve_company
-- ----------------------------

-- ----------------------------
-- Table structure for `serve_company_type`
-- ----------------------------
DROP TABLE IF EXISTS `serve_company_type`;
CREATE TABLE `serve_company_type` (
  `sct_id` int(11) NOT NULL auto_increment,
  `type_name` int(11) NOT NULL COMMENT '公司类型名称',
  `type_logo` text NOT NULL COMMENT '公司类型图标',
  PRIMARY KEY  (`sct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serve_company_type
-- ----------------------------

-- ----------------------------
-- Table structure for `serve_notice`
-- ----------------------------
DROP TABLE IF EXISTS `serve_notice`;
CREATE TABLE `serve_notice` (
  `sn_id` int(11) NOT NULL auto_increment,
  `notice_type` int(11) NOT NULL COMMENT '1(代表信用评级)2（代表违规曝光）',
  `notice_content` text NOT NULL COMMENT '内容',
  PRIMARY KEY  (`sn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serve_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `serve_project`
-- ----------------------------
DROP TABLE IF EXISTS `serve_project`;
CREATE TABLE `serve_project` (
  `sp_id` int(11) NOT NULL auto_increment,
  `company_id` int(11) NOT NULL COMMENT '公司id',
  `project_title` text NOT NULL COMMENT '事项名称',
  `project_content` text NOT NULL COMMENT '事项内容',
  PRIMARY KEY  (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serve_project
-- ----------------------------

-- ----------------------------
-- Table structure for `tousu`
-- ----------------------------
DROP TABLE IF EXISTS `tousu`;
CREATE TABLE `tousu` (
  `tid` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL COMMENT '投诉标题',
  `content` text NOT NULL COMMENT '投诉内容',
  `department` int(11) NOT NULL COMMENT '投诉部门',
  `zixunren` varchar(20) NOT NULL COMMENT '咨询人',
  `phone` varchar(20) NOT NULL COMMENT '手机',
  `time` int(10) NOT NULL COMMENT '时间',
  `email` varchar(60) NOT NULL COMMENT 'email',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `status` int(3) NOT NULL COMMENT '0(代表未解决)1（已经解决）',
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tousu
-- ----------------------------

-- ----------------------------
-- Table structure for `tousu_reply`
-- ----------------------------
DROP TABLE IF EXISTS `tousu_reply`;
CREATE TABLE `tousu_reply` (
  `tr_id` int(11) NOT NULL auto_increment,
  `content` text NOT NULL COMMENT '回复内容',
  `ts_id` int(11) NOT NULL COMMENT '投诉信息id',
  `time` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`tr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tousu_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_area`
-- ----------------------------
DROP TABLE IF EXISTS `trade_area`;
CREATE TABLE `trade_area` (
  `aid` int(11) NOT NULL auto_increment,
  `kaibiaoshi_am` int(11) NOT NULL COMMENT '开标室上午',
  `kaibiaoshi_pm` int(11) NOT NULL COMMENT '开标室下午',
  `pingbiaoshi_am` int(11) NOT NULL COMMENT '评标室上午',
  `pingbiaoshi_pm` int(11) NOT NULL COMMENT '评标室下午',
  `paimaiting_am` int(11) NOT NULL COMMENT '拍卖厅上午',
  `paimaiting_pm` int(11) NOT NULL COMMENT '拍卖厅下午',
  `huiyishi_am` int(11) NOT NULL COMMENT '会议室上午',
  `huiyishi_pm` int(11) NOT NULL COMMENT '会议室下午',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_area
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_flow`
-- ----------------------------
DROP TABLE IF EXISTS `trade_flow`;
CREATE TABLE `trade_flow` (
  `tf_id` int(11) NOT NULL auto_increment,
  `trade_type` int(11) NOT NULL default '0' COMMENT '交易类型',
  `flow_name` varchar(255) NOT NULL COMMENT '交易名称',
  `flow_content` text NOT NULL COMMENT '交易内容',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`tf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_flow
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_law`
-- ----------------------------
DROP TABLE IF EXISTS `trade_law`;
CREATE TABLE `trade_law` (
  `tf_id` int(11) NOT NULL auto_increment,
  `trade_type` int(11) NOT NULL default '0' COMMENT '交易类型',
  `law_name` varchar(255) NOT NULL COMMENT '法律法规名称',
  `law_content` text NOT NULL COMMENT '法律法规内容',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`tf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_law
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_matter`
-- ----------------------------
DROP TABLE IF EXISTS `trade_matter`;
CREATE TABLE `trade_matter` (
  `tm_id` int(11) NOT NULL auto_increment,
  `trade_type` int(11) NOT NULL default '0' COMMENT '交易类型',
  `matter_name` text NOT NULL COMMENT '事项名称',
  `matter_content` text NOT NULL COMMENT '事项内容',
  PRIMARY KEY  (`tm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_matter
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_notice`
-- ----------------------------
DROP TABLE IF EXISTS `trade_notice`;
CREATE TABLE `trade_notice` (
  `tnid` int(11) NOT NULL auto_increment,
  `notice_title` varchar(255) NOT NULL COMMENT '公告标题',
  `notice_content` varchar(255) NOT NULL COMMENT '公告内容',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`tnid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_project`
-- ----------------------------
DROP TABLE IF EXISTS `trade_project`;
CREATE TABLE `trade_project` (
  `tl_id` int(11) NOT NULL auto_increment,
  `trade_type` int(11) NOT NULL default '0' COMMENT '交易类型',
  `project_name` varchar(255) NOT NULL COMMENT '项目名称',
  `project_content` text NOT NULL COMMENT '项目内容',
  `time` int(10) NOT NULL COMMENT '时间',
  `status` int(11) NOT NULL COMMENT '项目状态（1招标，2中标，3弃标，4公正）“如果需要自己另外增加”',
  PRIMARY KEY  (`tl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_project
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_table_download`
-- ----------------------------
DROP TABLE IF EXISTS `trade_table_download`;
CREATE TABLE `trade_table_download` (
  `ttd_id` int(11) NOT NULL auto_increment,
  `trade_type` int(11) NOT NULL COMMENT '交易类型',
  `table_name` varchar(200) NOT NULL COMMENT '项目表格名称',
  `table_content` text NOT NULL COMMENT '项目表格内容',
  `time` int(11) NOT NULL COMMENT '时间',
  `file_path` text NOT NULL COMMENT '文件下载路径',
  `file_name` varchar(200) NOT NULL COMMENT '文件名称',
  PRIMARY KEY  (`ttd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_table_download
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_today`
-- ----------------------------
DROP TABLE IF EXISTS `trade_today`;
CREATE TABLE `trade_today` (
  `tid` int(11) NOT NULL auto_increment,
  `trade_type` varchar(50) NOT NULL COMMENT '单位名称=（交易类型）',
  `project_name` varchar(200) NOT NULL COMMENT '项目名称',
  `purpose` varchar(200) NOT NULL COMMENT '用途',
  `time` int(10) NOT NULL COMMENT '时间',
  `home` varchar(100) NOT NULL COMMENT '房间名称',
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_today
-- ----------------------------

-- ----------------------------
-- Table structure for `trade_type`
-- ----------------------------
DROP TABLE IF EXISTS `trade_type`;
CREATE TABLE `trade_type` (
  `tt_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(250) NOT NULL COMMENT '交易类别',
  `trade_url` text NOT NULL COMMENT '类别链接',
  PRIMARY KEY  (`tt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trade_type
-- ----------------------------

-- ----------------------------
-- Table structure for `web_url`
-- ----------------------------
DROP TABLE IF EXISTS `web_url`;
CREATE TABLE `web_url` (
  `id` int(11) NOT NULL auto_increment,
  `type` int(11) NOT NULL COMMENT '1(国务院各部委)2(省内地市州)3(各地政府服务中心)4(各区市直各部门)5(各区政务服务中心)6(常用信息平台)',
  `name` varchar(100) NOT NULL COMMENT '网站名称',
  `url` text COMMENT '网站链接',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_url
-- ----------------------------
INSERT INTO web_url VALUES ('1', '1', '恩恩1', 'www.baidu.com');
INSERT INTO web_url VALUES ('2', '2', 'ee2', 'www.baidu.com');
INSERT INTO web_url VALUES ('3', '3', 'ee3', 'www.baidu.com');
INSERT INTO web_url VALUES ('4', '4', 'ee4', 'www.baidu.com');
INSERT INTO web_url VALUES ('5', '5', 'ee5', 'www.baidu.com');
INSERT INTO web_url VALUES ('6', '6', 'ee6', 'www.baidu.com');
INSERT INTO web_url VALUES ('7', '1', 'ee1', 'www.baidu.com');
INSERT INTO web_url VALUES ('8', '1', '22', 'www.baidu.com');
INSERT INTO web_url VALUES ('9', '1', '33', 'www.baidu.com');
INSERT INTO web_url VALUES ('10', '1', '33', 'www.baidu.com');
INSERT INTO web_url VALUES ('11', '1', 'we', 'www.baidu.com');
INSERT INTO web_url VALUES ('12', '1', 'ss', 'www.baidu.com');
INSERT INTO web_url VALUES ('13', '1', 'ss', 'www.baidu.com');
INSERT INTO web_url VALUES ('14', '1', 'ww', 'www.baidu.com');
INSERT INTO web_url VALUES ('15', '1', 'dd', 'www.baidu.com');

-- ----------------------------
-- Table structure for `zhanguan_introduce`
-- ----------------------------
DROP TABLE IF EXISTS `zhanguan_introduce`;
CREATE TABLE `zhanguan_introduce` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `type` int(3) NOT NULL COMMENT '1（代表展馆简介）2（代表开放时间）',
  `time` int(10) NOT NULL COMMENT '时间',
  `views` int(11) NOT NULL COMMENT '访问次数',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zhanguan_introduce
-- ----------------------------

-- ----------------------------
-- Table structure for `zhanguan_news`
-- ----------------------------
DROP TABLE IF EXISTS `zhanguan_news`;
CREATE TABLE `zhanguan_news` (
  `zn_id` int(11) NOT NULL auto_increment,
  `news_title` int(11) NOT NULL COMMENT '展馆新闻动态标题',
  `news_content` text NOT NULL COMMENT '新闻内容',
  `time` int(11) NOT NULL COMMENT '时间',
  `views` int(11) NOT NULL COMMENT '访问次数',
  PRIMARY KEY  (`zn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zhanguan_news
-- ----------------------------

-- ----------------------------
-- Table structure for `zhanguan_news_picture`
-- ----------------------------
DROP TABLE IF EXISTS `zhanguan_news_picture`;
CREATE TABLE `zhanguan_news_picture` (
  `zpp_id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL COMMENT '新闻的ID',
  `picture_path` text NOT NULL COMMENT '图片路径',
  PRIMARY KEY  (`zpp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zhanguan_news_picture
-- ----------------------------

-- ----------------------------
-- Table structure for `zhanguan_picture_area`
-- ----------------------------
DROP TABLE IF EXISTS `zhanguan_picture_area`;
CREATE TABLE `zhanguan_picture_area` (
  `zn_id` int(11) NOT NULL auto_increment,
  `zhanqu_name` int(11) NOT NULL COMMENT '展区名称',
  `zhanqu_introduce` text NOT NULL COMMENT '展区介绍',
  `time` int(11) NOT NULL COMMENT '时间',
  `views` int(11) NOT NULL COMMENT '访问次数',
  PRIMARY KEY  (`zn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zhanguan_picture_area
-- ----------------------------

-- ----------------------------
-- Table structure for `zixun`
-- ----------------------------
DROP TABLE IF EXISTS `zixun`;
CREATE TABLE `zixun` (
  `zid` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL COMMENT '咨询标题',
  `content` text NOT NULL COMMENT '咨询内容',
  `department` int(11) NOT NULL COMMENT '咨询部门',
  `zixunren` varchar(255) NOT NULL COMMENT '咨询人',
  `phone` varchar(255) NOT NULL COMMENT '手机',
  `time` int(11) NOT NULL COMMENT '时间',
  `status` int(11) NOT NULL COMMENT '0（代表未解决）1（已经解决）',
  PRIMARY KEY  (`zid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zixun
-- ----------------------------

-- ----------------------------
-- Table structure for `zixun_reply`
-- ----------------------------
DROP TABLE IF EXISTS `zixun_reply`;
CREATE TABLE `zixun_reply` (
  `zr_id` int(11) NOT NULL auto_increment,
  `content` text NOT NULL COMMENT '回复内容',
  `zx_id` int(11) NOT NULL COMMENT '咨询信息ID',
  `reply_people` varchar(255) NOT NULL COMMENT '回复人',
  `time` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY  (`zr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zixun_reply
-- ----------------------------
