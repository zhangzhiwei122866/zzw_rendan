/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50021
Source Host           : localhost:3306
Source Database       : labsystem

Target Server Type    : MYSQL
Target Server Version : 50021
File Encoding         : 65001

Date: 2014-09-17 10:53:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `academy`
-- ----------------------------
DROP TABLE IF EXISTS `academy`;
CREATE TABLE `academy` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) unsigned default NULL COMMENT '学院编号',
  `name` varchar(30) default NULL COMMENT '学院名称',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of academy
-- ----------------------------
INSERT INTO academy VALUES ('1', '101', '计算机学院');
INSERT INTO academy VALUES ('2', '102', '物理学院');
INSERT INTO academy VALUES ('3', '103', '软件学院');

-- ----------------------------
-- Table structure for `equipment_borrow`
-- ----------------------------
DROP TABLE IF EXISTS `equipment_borrow`;
CREATE TABLE `equipment_borrow` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `equipment_number` int(11) default NULL COMMENT '设备编号',
  `equipment_name` varchar(50) default NULL COMMENT '设备名称',
  `borrow_man` varchar(50) default NULL COMMENT '借用人',
  `location` text COMMENT '现存地',
  `approval_man` varchar(50) default NULL COMMENT '审批人',
  `manage_man` varchar(50) default NULL COMMENT '保管人',
  `borrow_date` date default NULL COMMENT '借用日期',
  `return_date` date default NULL COMMENT '归还日期',
  `borrow_reason` text COMMENT '借用原因',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment_borrow
-- ----------------------------
INSERT INTO equipment_borrow VALUES ('2', '20', 'sadsad', 'sadsad', 'sadsad', 'sadsad', 'dsad', '2013-11-09', '2013-11-11', 'dasdsadsadsa', 'dsadsad');
INSERT INTO equipment_borrow VALUES ('3', '120', 'dsa', 'dsad', 'dsa', 'sadas', 'dsa', '2013-11-07', '2013-11-02', 'dsadsa', 'sda');
INSERT INTO equipment_borrow VALUES ('4', '123', '123', '123', '123', '123', '123123', '0000-00-00', '0000-00-00', '123123', '123');
INSERT INTO equipment_borrow VALUES ('5', '123', '123', '123', '123', '123', '123', '1899-11-02', '1899-11-09', '123', '');

-- ----------------------------
-- Table structure for `equipment_break_info`
-- ----------------------------
DROP TABLE IF EXISTS `equipment_break_info`;
CREATE TABLE `equipment_break_info` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `equipment_number` int(11) unsigned default NULL,
  `equipment_name` varchar(50) default NULL COMMENT '设备名称',
  `value` int(11) default NULL COMMENT '设备价值',
  `buy_date` date default NULL COMMENT '购买日期',
  `manage_man` varchar(50) default NULL COMMENT '管理人',
  `approval_man` varchar(50) default NULL COMMENT '审批人',
  `break_reason` text COMMENT '报废原因',
  `approval_reason` text COMMENT '审批原因',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment_break_info
-- ----------------------------
INSERT INTO equipment_break_info VALUES ('6', '10111', '计1设1', '10000', '2013-12-02', '小亮', '小王', '损坏原因', '审批原因', '备注');
INSERT INTO equipment_break_info VALUES ('8', '10112', '计1设2', '10000', '2013-12-02', '小亮', '小王', '损坏原因', '审批原因', '备注');
INSERT INTO equipment_break_info VALUES ('9', '10121', '计2设1', '20000', '2013-12-02', '小亮', '小王', '损坏原因', ' 审批原因', '备注');
INSERT INTO equipment_break_info VALUES ('10', '3467', '的双方各', '54645', '1999-04-06', '的', '的', '的', '说的', '的');

-- ----------------------------
-- Table structure for `equipment_info`
-- ----------------------------
DROP TABLE IF EXISTS `equipment_info`;
CREATE TABLE `equipment_info` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) unsigned default NULL COMMENT '设备编号',
  `name` varchar(50) default NULL COMMENT '设备名称',
  `lab_number` int(11) default NULL,
  `academy_number` int(11) default NULL,
  `type_name` varchar(50) default NULL COMMENT '分类名称',
  `lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `value` int(11) unsigned default NULL COMMENT '价值',
  `status` varchar(10) default NULL COMMENT '状态',
  `buy_time` date default NULL COMMENT '购买日期',
  `location` varchar(50) default NULL COMMENT '存储地',
  `use_people` varchar(30) default NULL COMMENT '领用人',
  `manage_people` varchar(30) default NULL COMMENT '管理人',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment_info
-- ----------------------------
INSERT INTO equipment_info VALUES ('1', '10111', '计1设1', '1011', '101', '分类名称', '计算机实验室1', '10000', '在用', '2012-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('2', '10112', '计1设2', '1011', '101', '分类名称', '计算机实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('3', '10113', '计1设3', '1011', '101', '分类名称', '计算机实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('4', '10121', '计2设1', '1012', '101', '分类名称', '计算机实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('5', '10122', '计2设2', '1012', '101', '分类名称', '计算机实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('6', '10123', '计2设3', '1012', '101', '分类名称', '计算机实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('7', '10131', '计3设1', '1013', '101', '分类名称', '计算机实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('8', '10132', '计3设2', '1013', '101', '分类名称', '计算机实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('9', '10133', '计3设3', '1013', '101', '分类名称', '计算机实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('10', '10211', '物理1设1', '1021', '102', '分类名称', '物理实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('11', '10212', '物理1设2', '1021', '102', '分类名称', '物理实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('12', '10213', '物理1设3', '1021', '102', '分类名称', '物理实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('13', '10221', '物理2设1', '1022', '102', '分类名称', '物理实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('14', '10222', '物理2设2', '1022', '102', '分类名称', '物理实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('15', '10223', '物理2设3', '1022', '102', '分类名称', '物理实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('16', '10231', '物理3设1', '1023', '102', '分类名称', '物理实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('17', '10232', '物理3设2', '1023', '102', '分类名称', '物理实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('18', '10233', '物理3设3', '1023', '102', '分类名称', '物理实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('19', '10311', '软件1设1', '1031', '103', '分类名称', '软件实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('20', '10312', '软件1设2', '1031', '103', '分类名称', '软件实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('21', '10313', '软件1设3', '1031', '103', '分类名称', '软件实验室1', '10000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('22', '10321', '软件2设1', '1032', '103', '分类名称', '软件实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('23', '10322', '软件2设2', '1032', '103', '分类名称', '软件实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('24', '10323', '软件2设3', '1032', '103', '分类名称', '软件实验室2', '20000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('25', '10331', '软件3设1', '1033', '103', '分类名称', '软件实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('26', '10332', '软件3设2', '1033', '103', '分类名称', '软件实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');
INSERT INTO equipment_info VALUES ('27', '10333', '软件3设3', '1033', '103', '分类名称', '软件实验室3', '30000', '在用', '2013-12-02', '存储地', '小王', '小亮');

-- ----------------------------
-- Table structure for `equipment_repair`
-- ----------------------------
DROP TABLE IF EXISTS `equipment_repair`;
CREATE TABLE `equipment_repair` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `equipment_number` int(11) unsigned NOT NULL COMMENT '设备编号',
  `equipment_name` varchar(50) NOT NULL COMMENT '设备名称',
  `manage_man` varchar(50) default NULL COMMENT '管理人',
  `lab_name` varchar(50) NOT NULL COMMENT '实验室名称',
  `repair_cost` int(11) unsigned default NULL COMMENT '维修费用',
  `repair_man` varchar(50) default NULL COMMENT '报修人',
  `approval_man` varchar(50) default NULL COMMENT '审批人',
  `repair_department` varchar(50) default NULL COMMENT '维修单位',
  `malfunction` text COMMENT '故障',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment_repair
-- ----------------------------
INSERT INTO equipment_repair VALUES ('1', '12', 'aaa', '胡锦涛 ', '508', '8', '习近平', '江泽民', '人民大会堂', '原子弹', '123456');
INSERT INTO equipment_repair VALUES ('2', '10', 'sadsad', 'dsadsads', 'dsad', '0', 'sadsa', 'dsa', 'dsad', 'sadsa', 'sadasdsad');
INSERT INTO equipment_repair VALUES ('5', '111', 'dsa', '123', 'dsa', '212112312', '132354', 'dsa', 'dsa', '123456789', 'dsa');
INSERT INTO equipment_repair VALUES ('6', '123', '多大', '多大', '多大', '324', '的', '的飞', '的', '的的', '的');
INSERT INTO equipment_repair VALUES ('7', '1236', '娃儿', '娃儿', '娃儿', '33', '33', '33', '33', '', '');

-- ----------------------------
-- Table structure for `equipment_type`
-- ----------------------------
DROP TABLE IF EXISTS `equipment_type`;
CREATE TABLE `equipment_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `type` varchar(50) default NULL COMMENT '设备类别',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment_type
-- ----------------------------
INSERT INTO equipment_type VALUES ('1', '计算机');
INSERT INTO equipment_type VALUES ('2', '交换机');
INSERT INTO equipment_type VALUES ('3', '路由器');

-- ----------------------------
-- Table structure for `lab_allocation`
-- ----------------------------
DROP TABLE IF EXISTS `lab_allocation`;
CREATE TABLE `lab_allocation` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lab_number` int(11) unsigned default NULL COMMENT '实验室编号',
  `lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `job_number` int(11) unsigned default NULL COMMENT '工号',
  `teacher` varchar(30) default NULL COMMENT '教师姓名',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_allocation
-- ----------------------------
INSERT INTO lab_allocation VALUES ('1', '11', '物理实验室', '11', '李老师');
INSERT INTO lab_allocation VALUES ('2', '12', '网络实验室', '12', '网络是');
INSERT INTO lab_allocation VALUES ('3', '12', '网络实验室', '2234', '撒的发');
INSERT INTO lab_allocation VALUES ('4', '12', '网络实验室', '44', '恩恩');
INSERT INTO lab_allocation VALUES ('5', '122866', 'php实验室张志伟', '23', '高');

-- ----------------------------
-- Table structure for `lab_assess`
-- ----------------------------
DROP TABLE IF EXISTS `lab_assess`;
CREATE TABLE `lab_assess` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lab_number` int(11) unsigned default NULL COMMENT '实验室编号',
  `lab_name` varchar(30) default NULL COMMENT '实验室名称',
  `year` year(4) default NULL COMMENT '年份',
  `man_hour` int(11) unsigned default NULL COMMENT '实验课人时数',
  `academy_number` int(11) unsigned default NULL COMMENT '学院编号',
  `academy_name` varchar(50) default NULL COMMENT '学院名称',
  `capacity` int(11) unsigned default NULL COMMENT '实验室容量',
  `use_rate` varchar(30) default NULL COMMENT '实验室利用率',
  `use_equipment` int(11) unsigned default NULL COMMENT '在用设备台数',
  `all_equipment` int(11) unsigned default NULL COMMENT '设备总台数',
  `intact_rate` varchar(30) default NULL COMMENT '设备完好率',
  `render_project` int(11) unsigned default NULL COMMENT '项目开出数',
  `all_render_project` int(11) unsigned default NULL COMMENT '实验项目开出总数',
  `project_rate` varchar(30) default NULL COMMENT '实验项目开出率',
  `new_equipment_value` int(11) default NULL COMMENT '新加入设备价值',
  `all_equipment_value` int(11) default NULL COMMENT '设备总价值',
  `year_expenditure` int(11) default NULL COMMENT '年运行经费',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_assess
-- ----------------------------

-- ----------------------------
-- Table structure for `lab_info`
-- ----------------------------
DROP TABLE IF EXISTS `lab_info`;
CREATE TABLE `lab_info` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) unsigned NOT NULL COMMENT '编号',
  `name` varchar(50) NOT NULL COMMENT '实验室名称',
  `year` date default NULL COMMENT '建立年份',
  `place` varchar(250) default NULL COMMENT '所在位置',
  `area` int(11) default NULL COMMENT '面积',
  `type` int(11) unsigned NOT NULL COMMENT '实验室类别',
  `subject` varchar(250) default NULL COMMENT '所属学科',
  `teach_expenditure` int(11) unsigned default NULL COMMENT '实验教学运行经费',
  `material_expenditure` int(11) unsigned default NULL COMMENT '年材料消耗费',
  `enter_time` date NOT NULL COMMENT '录入时间',
  `job_responsibility` text COMMENT '岗位职责',
  `institution` text COMMENT '管理制度',
  `s_number` int(11) NOT NULL COMMENT '学院编号',
  `s_name` text NOT NULL COMMENT '学院名字',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_info
-- ----------------------------
INSERT INTO lab_info VALUES ('1', '1011', '计算机实验室', '2013-11-12', '计算设计院二楼602', '300', '1', '软件学院', '50000', '40001', '2013-11-04', '岗位职责', '管理制度', '101', '计算机学院');
INSERT INTO lab_info VALUES ('2', '1012', '计算机实验室2', '2013-11-11', '某个号地方', '301', '2', '物理', '50001', '40002', '2013-11-04', '岗位职责', '管理制度', '101', '计算机学院');
INSERT INTO lab_info VALUES ('3', '1013', '计算机实验室3', '2013-11-21', '计算机与信息科学学院5楼508', '302', '1', '计算机', '50002', '40003', '2008-11-01', '岗位职责', '管理制度', '101', '计算机学院');
INSERT INTO lab_info VALUES ('4', '1021', '物理实验室1', '2011-09-01', '位置', '303', '1', '看看', '50003', '40004', '2014-04-10', '岗位职责', '管理制度', '102', '物理学院');
INSERT INTO lab_info VALUES ('5', '1022', '物理实验室2', '2012-08-01', '位置', '304', '2', '多大', '50004', '40005', '2013-12-02', '岗位职责', '管理制度', '102', '物理学院');
INSERT INTO lab_info VALUES ('6', '1023', '物理实验室3', '2013-12-04', '位置', '305', '2', '二娃', '50005', '40006', '2013-12-02', '岗位职责', '管理制度', '102', '物理学院');
INSERT INTO lab_info VALUES ('7', '1031', '软件实验室1', '2013-12-02', '位置', '306', '1', '解决', '50006', '40007', '2013-12-02', '岗位职责', '管理制度', '103', '软件学院');
INSERT INTO lab_info VALUES ('8', '1032', '软件实验室2', '2013-12-02', '的', '307', '1', '当事人分为', '50007', '40008', '2013-12-02', '岗位职责', '管理制度', '103', '软件学院');
INSERT INTO lab_info VALUES ('9', '1033', '软件实验室3', '2013-12-02', '撒的发', '308', '2', '撒旦', '50008', '40009', '2013-12-02', '岗位职责', '管理制度', '103', '软件学院');
INSERT INTO lab_info VALUES ('10', '122866', 'php实验室张志伟', '2013-12-03', '斯蒂芬大萨菲的', '2000', '1', '计算机', '23232', '232323', '2013-12-03', 'java', '撒卢卡斯的减肥拉克丝', '101', '计算机学院');
INSERT INTO lab_info VALUES ('11', '123456', 'java实验室名称', '2013-12-06', '撒旦法撒阿斯达发', '1231231', '2', '士大夫', '1231', '1231', '2013-12-06', '士大夫', '爱色阿迪萨法说的啊', '103', '软件学院');

-- ----------------------------
-- Table structure for `lab_manager`
-- ----------------------------
DROP TABLE IF EXISTS `lab_manager`;
CREATE TABLE `lab_manager` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) unsigned default NULL COMMENT '工号',
  `name` varchar(30) default NULL COMMENT '姓名',
  `sex` varchar(10) default NULL COMMENT '性别',
  `birthday` date default NULL COMMENT '出生日期',
  `inland_train` text COMMENT '国内培训',
  `foreign_train` text COMMENT '国外培训',
  `lab_number` int(11) default NULL COMMENT '实验室编号',
  `lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `education` varchar(255) default NULL COMMENT '教育程度',
  `subject` varchar(255) default NULL COMMENT '所属学科',
  `enter_time` date default NULL COMMENT '录入时间',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_manager
-- ----------------------------
INSERT INTO lab_manager VALUES ('1', '11', '李老师', null, null, null, null, '1031', '软件实验室1', null, null, null, null);
INSERT INTO lab_manager VALUES ('3', '12223', '撒旦', '男', '0000-00-00', '开关', '撒旦', '13', '创新开发实验室', '地方', '大众', '1899-11-01', '飞');
INSERT INTO lab_manager VALUES ('5', '3455', '不的', '男', '1899-11-02', '地方', '啊', '333', '说的', '阿萨德', '撒的发', '0000-00-00', '地方');

-- ----------------------------
-- Table structure for `lab_safe`
-- ----------------------------
DROP TABLE IF EXISTS `lab_safe`;
CREATE TABLE `lab_safe` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lab_number` int(11) default NULL COMMENT '实验室编号',
  `lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `equipment_lost` varchar(50) default NULL COMMENT '设备丢失',
  `equipment_button` varchar(10) default NULL COMMENT '设备开关',
  `power_button` varchar(10) default NULL COMMENT '电源开关',
  `light_button` varchar(10) default NULL COMMENT '照明开关',
  `windows` varchar(10) default NULL COMMENT '窗户窗帘',
  `door` varchar(10) default NULL COMMENT '大门门锁',
  `heating` varchar(10) default NULL COMMENT '暖气泄露',
  `check_date` date default NULL COMMENT '检查日期',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_safe
-- ----------------------------
INSERT INTO lab_safe VALUES ('17', '1011', '计算机实验室1', '是', '是', '是', '是', '是', '是', '是', '2013-12-02', '                    	多大                    ');
INSERT INTO lab_safe VALUES ('18', '1012', '计算机实验室2', '否', '否', '是', '是', '是', '是', '是', '2013-12-02', '                    	的                    ');
INSERT INTO lab_safe VALUES ('19', '1013', '计算机实验室3', '是', '是', '是', '是', '是', '是', '是', '2013-11-02', '的撒旦阿瑟的');
INSERT INTO lab_safe VALUES ('20', '1021', '物理实验室1', '是', '是', '是', '是', '是', '是', '是', '2013-11-02', '啊搜房网飞我');
INSERT INTO lab_safe VALUES ('21', '1022', '物理实验室2', '是', '是', '是', '是', '是', '是', '是', '2013-11-02', '请注明详细的信息');
INSERT INTO lab_safe VALUES ('22', '1023', '物理实验室3', '是', '是', '是', '否', '否', '是', '是', '2013-11-02', '                    	                    	请注明详细的信息                                        ');
INSERT INTO lab_safe VALUES ('23', '1031', '软件实验室1', '否', '否', '否', '是', '否', '否', '否', '2013-11-02', '暗示法');
INSERT INTO lab_safe VALUES ('24', '1032', '软件实验室2', '是', '是', '否', '是', '否', '是', '是', '2013-11-02', '飞');
INSERT INTO lab_safe VALUES ('25', '1033', '软件实验室3', '否', '否', '否', '是', '是', '是', '是', '2013-11-02', '请注明详细的信息');
INSERT INTO lab_safe VALUES ('26', '1011', '计算机实验室1', '是', '是', '是', '是', '是', '是', '是', '2013-11-02', '请注明详细的信息');
INSERT INTO lab_safe VALUES ('27', '1012', '计算机实验室2', '否', '是', '是', '是', '是', '是', '是', '2013-11-02', '请注明详细的信息');

-- ----------------------------
-- Table structure for `lab_type`
-- ----------------------------
DROP TABLE IF EXISTS `lab_type`;
CREATE TABLE `lab_type` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lab_type_number` int(11) unsigned NOT NULL COMMENT '实验室类型编号',
  `lab_type` varchar(50) NOT NULL COMMENT '实验室类别',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lab_type
-- ----------------------------
INSERT INTO lab_type VALUES ('1', '1', '网络基础实验室');
INSERT INTO lab_type VALUES ('2', '2', '数字媒体实验室');
INSERT INTO lab_type VALUES ('3', '3', '通讯基础实验室');

-- ----------------------------
-- Table structure for `lesson_allocation`
-- ----------------------------
DROP TABLE IF EXISTS `lesson_allocation`;
CREATE TABLE `lesson_allocation` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lesson_number` int(11) default NULL COMMENT '课程编号',
  `lesson_name` varchar(50) default NULL COMMENT '课程名称',
  `lab_number` int(11) default NULL COMMENT '实验室编号',
  `lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `teacher_number` int(11) default NULL COMMENT '工号',
  `teacher_name` varchar(30) default NULL COMMENT '教师姓名',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lesson_allocation
-- ----------------------------
INSERT INTO lesson_allocation VALUES ('1', '300', '课程1', '1011', '计算机实验室1', '111', '小米', '2013-10-29');
INSERT INTO lesson_allocation VALUES ('2', '301', '课程2', '1011', '计算机实验室1', '111', '小米', '2013-11-12');
INSERT INTO lesson_allocation VALUES ('3', '302', '课程3', '1012', '计算机实验室2', '112', '小明', '2013-11-19');
INSERT INTO lesson_allocation VALUES ('4', '303', '课程4', '1012', '计算机实验室2', '112', '小明', '2013-12-02');
INSERT INTO lesson_allocation VALUES ('5', '304', '课程5', '1013', '计算机实验室3', '113', '小华', '2013-12-02');
INSERT INTO lesson_allocation VALUES ('9', '123456', '你好还是我好', '122866', 'php实验室张志伟', '234234', '是打发', '2013-12-03');

-- ----------------------------
-- Table structure for `lesson_cheching`
-- ----------------------------
DROP TABLE IF EXISTS `lesson_cheching`;
CREATE TABLE `lesson_cheching` (
  `cheching_id` int(11) unsigned NOT NULL auto_increment,
  `class_number` int(11) unsigned default NULL COMMENT '课程编号',
  `progect_number` int(11) default NULL COMMENT '项目编号',
  `teacher_name1` varchar(30) default NULL COMMENT '教师姓名',
  `cheching_lab_number` int(11) unsigned default NULL COMMENT '实验室编号',
  `cheching_lab_name` varchar(50) default NULL COMMENT '实验室名称',
  `class` varchar(50) default NULL COMMENT '上课班级',
  `monitor` varchar(30) default NULL COMMENT '班长姓名',
  `class_time` time default NULL COMMENT '上课时间',
  `attendence` int(11) default NULL COMMENT '出勤人数',
  `absence` int(11) default NULL COMMENT '缺勤人数',
  `cheching_date` date default NULL COMMENT '日期',
  `remark` text COMMENT '备注',
  PRIMARY KEY  (`cheching_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lesson_cheching
-- ----------------------------
INSERT INTO lesson_cheching VALUES ('1', '300', '401', '周老师', '1011', '计算机实验室1', '11-1-5', '小王', '16:15:34', '100', '15', '2013-11-07', 'ss');
INSERT INTO lesson_cheching VALUES ('2', '300', '402', '周老师', '1011', '计算机实验室1', '11-2-5', '小刘', '10:11:00', '100', '15', '2013-11-25', 'ss');
INSERT INTO lesson_cheching VALUES ('7', '301', '403', '李志伟', '1011', '计算机实验室1', '11-6-5', '张志伟', '08:15:00', '12', '23', '2013-11-25', '硕大的');
INSERT INTO lesson_cheching VALUES ('8', '301', '404', '霍志伟', '1011', '计算机实验室1', '11-7-5', '张志伟', '08:15:00', '12', '23', '2013-11-25', '撒发送到');
INSERT INTO lesson_cheching VALUES ('9', '302', '405', '志伟', '1012', '计算机实验室2', '11-8-5', '张志伟', '08:15:00', '12', '23', '2013-11-25', '撒旦飞洒');
INSERT INTO lesson_cheching VALUES ('10', '302', '406', '志伟', '1012', '计算机实验室2', '11-9-5', '张志伟', '08:15:00', '12', '12', '2013-11-25', '撒旦法');

-- ----------------------------
-- Table structure for `lesson_info`
-- ----------------------------
DROP TABLE IF EXISTS `lesson_info`;
CREATE TABLE `lesson_info` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lesson_number` int(11) default NULL COMMENT '课程编号',
  `lesson_name` varchar(50) default NULL COMMENT '课程名称',
  `academy` int(11) unsigned default NULL COMMENT '学院编号',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lesson_info
-- ----------------------------
INSERT INTO lesson_info VALUES ('1', '300', '课程1', '101');
INSERT INTO lesson_info VALUES ('2', '301', '课程2', '101');
INSERT INTO lesson_info VALUES ('3', '302', '课程3', '101');
INSERT INTO lesson_info VALUES ('4', '303', '课程4', '101');
INSERT INTO lesson_info VALUES ('5', '304', '课程5', '101');
INSERT INTO lesson_info VALUES ('6', '305', '课程6', '101');
INSERT INTO lesson_info VALUES ('7', '306', '课程7', '102');
INSERT INTO lesson_info VALUES ('8', '307', '课程8', '102');
INSERT INTO lesson_info VALUES ('9', '308', '课程9', '102');
INSERT INTO lesson_info VALUES ('10', '309', '课程10', '102');
INSERT INTO lesson_info VALUES ('11', '310', '课程11', '102');
INSERT INTO lesson_info VALUES ('12', '311', '课程12', '102');
INSERT INTO lesson_info VALUES ('13', '312', '课程13', '103');
INSERT INTO lesson_info VALUES ('14', '313', '课程14', '103');
INSERT INTO lesson_info VALUES ('15', '314', '课程15', '103');
INSERT INTO lesson_info VALUES ('16', '315', '课程16', '103');
INSERT INTO lesson_info VALUES ('17', '316', '课程17', '103');
INSERT INTO lesson_info VALUES ('18', '317', '课程18', '103');

-- ----------------------------
-- Table structure for `lesson_project`
-- ----------------------------
DROP TABLE IF EXISTS `lesson_project`;
CREATE TABLE `lesson_project` (
  `lesson_id` int(11) unsigned NOT NULL auto_increment,
  `lab_number` int(11) unsigned default NULL COMMENT '实验室编号',
  `lab_name` varchar(30) default NULL COMMENT '实验室名称',
  `number` int(11) default NULL COMMENT '项目编号',
  `name` varchar(50) default NULL COMMENT '项目名称',
  `class_number` int(11) default NULL COMMENT '课程编号',
  `teacher_name` varchar(30) default NULL COMMENT '教师姓名',
  `character` text COMMENT '项目性质',
  `period` int(11) default NULL COMMENT '所需课时',
  `date` date default NULL COMMENT '日期',
  PRIMARY KEY  (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lesson_project
-- ----------------------------
INSERT INTO lesson_project VALUES ('1', '1011', '计算机实验室1', '401', '实验项目1', '300', '张志伟', '项目性质', '1', '2012-12-02');
INSERT INTO lesson_project VALUES ('2', '1011', '计算机实验室1', '402', '实验项目2', '300', '刘老师', '项目性质', '2', '2013-11-07');
INSERT INTO lesson_project VALUES ('3', '1011', '计算机实验室1', '403', '实验项目3', '301', '李老师', '项目性质', '3', '2013-11-05');
INSERT INTO lesson_project VALUES ('4', '1011', '计算机实验室1', '404', '实验项目4', '301', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('5', '1012', '计算机实验室2', '405', '实验项目5', '302', '张志伟', '项目性质', '5', '0000-00-00');
INSERT INTO lesson_project VALUES ('6', '1012', '计算机实验室2', '406', '实验项目6', '302', '张志伟', '项目性质', '6', '2013-12-02');
INSERT INTO lesson_project VALUES ('7', '1012', '计算机实验室2', '407', '实验项目7', '303', '张志伟', '项目性质', '7', '2013-12-02');
INSERT INTO lesson_project VALUES ('8', '1012', '计算机实验室2', '408', '实验项目8', '303', '张志伟', '项目性质', '8', '2013-12-02');
INSERT INTO lesson_project VALUES ('9', '1013', '计算机实验室3', '409', '实验项目9', '304', '张志伟', '项目性质', '9', '2013-12-02');
INSERT INTO lesson_project VALUES ('10', '1013', '计算机实验室3', '410', '实验项目10', '304', '张志伟', '项目性质', '1', '2013-12-02');
INSERT INTO lesson_project VALUES ('11', '1013', '计算机实验室3', '411', '实验项目11', '305', '张志伟', '项目性质', '2', '2013-12-02');
INSERT INTO lesson_project VALUES ('12', '1013', '计算机实验室4', '412', '实验项目12', '305', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('13', '1021', '物理实验室1', '413', '实验项目13', '306', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('14', '1021', '物理实验室1', '414', '实验项目14', '306', '张志伟', '项目性质', '5', '2013-12-02');
INSERT INTO lesson_project VALUES ('15', '1021', '物理实验室1', '415', '实验项目15', '307', '张志伟', '项目性质', '5', '2013-12-02');
INSERT INTO lesson_project VALUES ('16', '1021', '物理实验室1', '416', '实验项目16', '307', '张志伟', '项目性质', '6', '2013-12-02');
INSERT INTO lesson_project VALUES ('17', '1022', '物理实验室2', '417', '实验项目17', '308', '张志伟', '项目性质', '7', '2013-12-02');
INSERT INTO lesson_project VALUES ('18', '1022', '物理实验室2', '418', '实验项目18', '308', '张志伟', '项目性质', '7', '2013-12-02');
INSERT INTO lesson_project VALUES ('19', '1022', '物理实验室2', '419', '实验项目19', '309', '张志伟', '项目性质', '6', '2013-12-02');
INSERT INTO lesson_project VALUES ('20', '1022', '物理实验室2', '420', '实验项目20', '309', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('21', '1023', '物理实验室3', '421', '实验项目21', '310', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('22', '1023', '物理实验室3', '422', '实验项目22', '310', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('23', '1023', '物理实验室3', '423', '实验项目23', '311', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('24', '1023', '物理实验室3', '424', '实验项目24', '311', '张志伟', '项目性质', '2', '2013-12-02');
INSERT INTO lesson_project VALUES ('25', '1031', '软件实验室1', '425', '实验项目25', '312', '张志伟', '项目性质', '2', '2013-12-02');
INSERT INTO lesson_project VALUES ('26', '1031', '软件实验室1', '426', '实验项目26', '312', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('27', '1031', '软件实验室1', '427', '实验项目27', '313', '张志伟', '项目性质', '2', '2013-12-02');
INSERT INTO lesson_project VALUES ('28', '1031', '软件实验室1', '428', '实验项目28', '313', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('29', '1032', '软件实验室2', '429', '实验项目29', '314', '张志伟', '项目性质', '2', '2013-12-02');
INSERT INTO lesson_project VALUES ('30', '1032', '软件实验室2', '430', '实验项目30', '314', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('31', '1032', '软件实验室2', '431', '实验项目31', '315', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('32', '1032', '软件实验室2', '432', '实验项目32', '315', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('33', '1033', '软件实验室3', '433', '实验项目33', '316', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('34', '1033', '软件实验室3', '434', '实验项目34', '316', '张志伟', '项目性质', '3', '2013-12-02');
INSERT INTO lesson_project VALUES ('35', '1033', '软件实验室3', '435', '实验项目35', '317', '张志伟', '项目性质', '4', '2013-12-02');
INSERT INTO lesson_project VALUES ('36', '1033', '软件实验室3', '436', '实验项目36', '317', '张志伟', '项目性质', '3', '2013-12-11');
INSERT INTO lesson_project VALUES ('38', null, '额', null, '水电费', '309', '的', '恩恩', '4', null);
INSERT INTO lesson_project VALUES ('39', null, 'php实验室张志伟', null, '阿斯顿发', '300', '法师打发', '打法', '123', '2013-12-03');
INSERT INTO lesson_project VALUES ('40', null, '计算机实验室1', null, '是', '300', '是', '是', '2', '2013-12-06');
INSERT INTO lesson_project VALUES ('43', '122866', 'php实验室张志伟', '123123123', '我很好', '300', '你好吗', '真的很好嘛', '234234', '2013-12-06');

-- ----------------------------
-- Table structure for `manager_extra_workload`
-- ----------------------------
DROP TABLE IF EXISTS `manager_extra_workload`;
CREATE TABLE `manager_extra_workload` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `manager_number` int(11) unsigned default NULL COMMENT '工号',
  `manager_name` varchar(30) default NULL COMMENT '姓名',
  `extra_workload` int(11) default NULL COMMENT '额外工作量',
  `work_introductions` varchar(255) default NULL COMMENT '工作说明',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager_extra_workload
-- ----------------------------

-- ----------------------------
-- Table structure for `manager_workload`
-- ----------------------------
DROP TABLE IF EXISTS `manager_workload`;
CREATE TABLE `manager_workload` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `manager_number` int(11) unsigned default NULL COMMENT '实验员工号',
  `manager_name` varchar(30) default NULL COMMENT '实验员姓名',
  `semester` year(4) default NULL COMMENT '学期',
  `basic_workload` int(11) unsigned default NULL COMMENT '基本工作量',
  `extra_workload` int(11) unsigned default NULL COMMENT '额外工作量',
  `final_workload` int(11) unsigned default NULL COMMENT '最终工作量',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager_workload
-- ----------------------------

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `type` varchar(30) NOT NULL default '' COMMENT '类型',
  PRIMARY KEY  (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO role VALUES ('1', '教务主任');
INSERT INTO role VALUES ('2', '教务处行政人员');
INSERT INTO role VALUES ('3', '实验课教学辅导老师');
INSERT INTO role VALUES ('4', '实验室管理员');
INSERT INTO role VALUES ('5', '实验室主任');
INSERT INTO role VALUES ('6', '任课教师');
INSERT INTO role VALUES ('7', '设备处行政管理人员');
INSERT INTO role VALUES ('8', '学生');
INSERT INTO role VALUES ('9', '班长');
INSERT INTO role VALUES ('10', '网站维护人员');
INSERT INTO role VALUES ('11', '超级管理员');

-- ----------------------------
-- Table structure for `teacher_workload`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_workload`;
CREATE TABLE `teacher_workload` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) default NULL COMMENT '工号',
  `teacher` varchar(30) default NULL COMMENT '教师姓名',
  `lesson_name` varchar(50) default NULL COMMENT '课程名称',
  `year` year(4) default NULL COMMENT '年份',
  `workload` int(11) unsigned default NULL COMMENT '本课程工作量',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher_workload
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `number` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(100) NOT NULL COMMENT '密码',
  `date` int(10) unsigned NOT NULL COMMENT '日期',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('2', '123', '撒旦', '1', 'qwe', '1233665554');
INSERT INTO user VALUES ('5', '111', '小米', '1', '123', '1376411032');
INSERT INTO user VALUES ('6', '112', '小明', '2', '123', '1377412032');
INSERT INTO user VALUES ('7', '113', '小华', '3', '123', '1377411031');
INSERT INTO user VALUES ('8', '114', '小辉', '4', '123', '1377411732');
INSERT INTO user VALUES ('9', '115', '小伟', '5', '123', '1377411832');
INSERT INTO user VALUES ('10', '116', '小洁', '6', '123', '1377411632');
INSERT INTO user VALUES ('11', '117', '小亮', '7', '123', '1377411532');
INSERT INTO user VALUES ('12', '118', '小高', '8', '111dertsd', '1377411432');
INSERT INTO user VALUES ('13', '119', '小胡', '9', '111', '1377411332');
INSERT INTO user VALUES ('14', '120', '小磊', '10', '111', '1377411232');
INSERT INTO user VALUES ('15', '121', '超级管理员', '11', '123qwe', '1377411132');
