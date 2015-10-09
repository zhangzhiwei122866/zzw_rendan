/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50021
Source Host           : localhost:3306
Source Database       : lover

Target Server Type    : MYSQL
Target Server Version : 50021
File Encoding         : 65001

Date: 2014-09-17 10:53:53
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '当前登录用户的id',
  `album_id` int(11) NOT NULL COMMENT '相册的id',
  `album_name` varchar(255) NOT NULL,
  `photo_id` int(11) NOT NULL COMMENT '对应图片的id',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='相册';

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO album VALUES ('1', '0', '1', '爱情记录', '1');
INSERT INTO album VALUES ('2', '0', '3', '你好吗', '1');

-- ----------------------------
-- Table structure for `copy`
-- ----------------------------
DROP TABLE IF EXISTS `copy`;
CREATE TABLE `copy` (
  `id` int(11) NOT NULL auto_increment,
  `copy_user` varchar(255) NOT NULL COMMENT '转载的用户（当前登录的用户）',
  `copy_id` int(11) NOT NULL COMMENT '转载日志的id',
  `copy_content` varchar(255) NOT NULL COMMENT '转载的内容',
  `copy_time` datetime NOT NULL COMMENT '转载的时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='转载';

-- ----------------------------
-- Records of copy
-- ----------------------------

-- ----------------------------
-- Table structure for `discuss`
-- ----------------------------
DROP TABLE IF EXISTS `discuss`;
CREATE TABLE `discuss` (
  `id` int(11) NOT NULL auto_increment COMMENT '发表评论的id',
  `discuss_id` int(11) NOT NULL COMMENT '某条日志或心情的id',
  `discuss_user` varchar(255) NOT NULL COMMENT '当前登陆的用户',
  `discuss_content` varchar(255) NOT NULL COMMENT '评论的内容',
  `discuss_time` datetime NOT NULL COMMENT '发表评论的时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='对某个用户日志或心情的评论';

-- ----------------------------
-- Records of discuss
-- ----------------------------

-- ----------------------------
-- Table structure for `draft`
-- ----------------------------
DROP TABLE IF EXISTS `draft`;
CREATE TABLE `draft` (
  `id` int(11) NOT NULL auto_increment COMMENT '发表日志或日记的id',
  `draft_content` varchar(255) NOT NULL COMMENT '用户添加日志或日记的内容',
  `draft_time` datetime NOT NULL COMMENT '用户添加日志或日记当时的时间',
  `user_id` int(11) NOT NULL COMMENT '添加日志或日记的用户的id',
  `draft_status` int(11) NOT NULL default '0' COMMENT '日记或日志的类型',
  `draft_title` varchar(255) NOT NULL COMMENT '发表日志或日记的标题',
  `draft_attribute` int(11) NOT NULL COMMENT '日志的属性',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='草稿';

-- ----------------------------
-- Records of draft
-- ----------------------------
INSERT INTO draft VALUES ('1', '安会计师的那款绝对是南非', '2013-09-18 11:42:46', '16', '1', '那空间的室内空间阿迪', '2');

-- ----------------------------
-- Table structure for `friend`
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL COMMENT '当前用户的id',
  `friend_id` int(11) default NULL COMMENT '所加朋友的id（可根据这个id，找到自己想要找的信息）',
  `friend_time` datetime default NULL COMMENT '添加朋友的时间',
  `friend_status` int(11) default '0' COMMENT '用来判断是好友（为1）或者特别关注的（为2）',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='添加好友';

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO friend VALUES ('1', '26', '16', '2013-09-30 17:52:38', '1');
INSERT INTO friend VALUES ('2', '16', '26', '2013-10-08 16:32:33', '1');
INSERT INTO friend VALUES ('3', '26', '15', '2013-10-09 23:15:13', '2');

-- ----------------------------
-- Table structure for `photo`
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL auto_increment,
  `src` varchar(255) default NULL COMMENT '图片的路径',
  `info` varchar(255) default NULL COMMENT '图片的名字',
  `add_time` varchar(255) default NULL,
  `album_id` int(11) default '0' COMMENT '相册的id',
  `user_id` int(11) default NULL COMMENT '当前登录的用户',
  `photo_status` int(11) default '3' COMMENT '相册的权限',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传图片';

-- ----------------------------
-- Records of photo
-- ----------------------------

-- ----------------------------
-- Table structure for `picture`
-- ----------------------------
DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `user_id` int(11) NOT NULL auto_increment,
  `picture_name` varchar(255) default NULL,
  `picture_path` varchar(255) NOT NULL,
  `picture_type` varchar(255) default NULL,
  `picture_size` varchar(255) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传图片的基本信息';

-- ----------------------------
-- Records of picture
-- ----------------------------

-- ----------------------------
-- Table structure for `record`
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `record_id` int(11) NOT NULL auto_increment COMMENT '发表日志或日记的id',
  `record_content` varchar(8000) NOT NULL COMMENT '用户添加日志或日记的内容',
  `record_time` datetime NOT NULL COMMENT '用户添加日志或日记当时的时间',
  `user_id` int(11) NOT NULL COMMENT '添加日志或日记的用户的id',
  `record_status` int(11) NOT NULL default '0' COMMENT '日记或日志的类型',
  `record_title` varchar(255) NOT NULL COMMENT '发表日志或日记的标题',
  `record_attribute` int(11) NOT NULL COMMENT '日志的属性',
  `user_time` varchar(255) default NULL COMMENT '用户登录的时候记录的时间和发表日志的时间差',
  PRIMARY KEY  (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录心情或日志';

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO record VALUES ('23', '啊大法师打发是的发送到阿迪法师的法定打法的司法斯啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法司法斯啊大法师打发是的发送到阿迪法师的法定打法的司法斯啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法司法斯蒂芬啊大法大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是大法师打啊大法师打发是的发送到阿迪法师的法定打法的司法斯啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法司法斯蒂芬啊大法大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是大法师打啊大法师打发是的发送到阿迪法师的法定打法的司法斯啊大法师打发是的发送到阿迪法师的法定', '2013-10-24 19:03:10', '16', '0', '打底衫卡萨丁1', '2', 'Array月之前');
INSERT INTO record VALUES ('24', '啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大大法上事实大啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大大法上事实大啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非啊是大是大非', '2013-09-30 16:36:19', '26', '2', '你啊啊哦啊地卡罗肯定2', '1', 'Array月之前');
INSERT INTO record VALUES ('25', '的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实大法师上事实的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实大法师上事实的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实上事实上的事实上事实', '2013-09-30 16:45:51', '26', '2', '你打打3', '2', 'Array月之前');
INSERT INTO record VALUES ('26', '啊大法师打发是的发送到阿迪法师的法定打法的司法斯啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法司法斯蒂芬啊大法师打发是的发送到阿迪法师的法定打法的司法斯蒂芬啊大法师打发是的发送到阿迪法师大法师打发是', '2013-10-09 23:15:53', '15', '0', '打底衫卡萨丁4', '2', 'Array月之前');

-- ----------------------------
-- Table structure for `time`
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL COMMENT '用户的id',
  `user_time` datetime NOT NULL COMMENT '填写相爱时间所显示的时间差值',
  `friend_time` datetime NOT NULL COMMENT '第一次见面的时间',
  `date_time` datetime NOT NULL,
  `love_time` datetime NOT NULL COMMENT '单膝下跪的时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='相爱的时间';

-- ----------------------------
-- Records of time
-- ----------------------------

-- ----------------------------
-- Table structure for `trend`
-- ----------------------------
DROP TABLE IF EXISTS `trend`;
CREATE TABLE `trend` (
  `trendid` int(11) NOT NULL auto_increment COMMENT '发表心情的id',
  `trend_content` varchar(255) NOT NULL COMMENT '发表心情的内容',
  `trend_time` datetime NOT NULL COMMENT '发表时间的时间',
  PRIMARY KEY  (`trendid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录的小动态';

-- ----------------------------
-- Records of trend
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment COMMENT '用户名的id',
  `username` varchar(255) NOT NULL COMMENT '用户的昵称',
  `phone` varchar(255) NOT NULL COMMENT '用户的手机号',
  `Fphone` varchar(255) NOT NULL COMMENT '对方的手机号',
  `password` varchar(255) NOT NULL COMMENT '用户密码',
  `repassword` varchar(255) NOT NULL COMMENT '密码验证',
  `mail` varchar(255) NOT NULL COMMENT '邮箱',
  `sex` varchar(255) NOT NULL COMMENT '性别',
  `age` int(11) default NULL COMMENT '年龄',
  `like` varchar(255) default NULL COMMENT '个人喜好',
  `introduce` varchar(255) default NULL COMMENT '个人详细简介',
  `picture_name` varchar(255) default NULL,
  `picture_size` int(11) default NULL,
  `picture_path` varchar(255) default NULL,
  `picture_type` varchar(255) default NULL,
  `sex_status` int(11) NOT NULL default '2' COMMENT '表示的是如果注册的用户为女性为1男性为2',
  `grade` int(11) NOT NULL default '0' COMMENT '用户的等级',
  `integral` int(11) NOT NULL default '0' COMMENT '用户的积分',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='注册用户的基本信息';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('16', 'zzw_122866', '18236592871', '18236592892', '111111', '111111', '121@qq.com', '男', null, null, null, null, null, null, null, '2', '0', '26');
INSERT INTO user VALUES ('26', 'zzw_122867', '18236592891', '18236592897', '111111', '111111', '11@qq.com', '男', null, null, null, null, null, null, null, '2', '0', '14');

-- ----------------------------
-- Table structure for `userphoto`
-- ----------------------------
DROP TABLE IF EXISTS `userphoto`;
CREATE TABLE `userphoto` (
  `id` int(11) NOT NULL,
  `useralbum` varchar(255) NOT NULL,
  `albumname` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户的相册';

-- ----------------------------
-- Records of userphoto
-- ----------------------------
INSERT INTO userphoto VALUES ('1', '打法', '啊打发', '11');
