/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : muzi_edu

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-12-27 10:00:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for edu_course
-- ----------------------------
DROP TABLE IF EXISTS `edu_course`;
CREATE TABLE `edu_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '操作人',
  `type_id` int(11) DEFAULT NULL COMMENT '所属分类',
  `title` varchar(150) DEFAULT NULL COMMENT '课件标题',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `cover` varchar(150) DEFAULT NULL COMMENT '封面图片',
  `people_num` int(11) DEFAULT NULL COMMENT '观看人数',
  `time_long` int(11) DEFAULT NULL COMMENT '时长',
  `integral` int(11) DEFAULT NULL COMMENT '所需积分',
  `integral_type` int(11) DEFAULT NULL COMMENT '积分类型',
  `score` int(10) DEFAULT NULL COMMENT '总评分',
  `ave_score` tinyint(1) DEFAULT NULL COMMENT '平均评分最大10',
  `is_upload` tinyint(1) DEFAULT NULL COMMENT '是否上传文件',
  `is_ open` tinyint(1) DEFAULT NULL COMMENT '是否公开',
  `is_ask_too` tinyint(1) DEFAULT NULL COMMENT '回答错误是否可过',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `label_str` varchar(255) DEFAULT NULL COMMENT '标签ID以”,”拆分',
  `power_str` varchar(255) DEFAULT NULL COMMENT '权限ID以”,”拆分',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_date` int(11) DEFAULT NULL COMMENT '更新时间',
  `day` date DEFAULT NULL COMMENT '放置天数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件表';

-- ----------------------------
-- Records of edu_course
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_answer
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_answer`;
CREATE TABLE `edu_course_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '答题人',
  `ask_id` int(11) DEFAULT NULL COMMENT '题目id',
  `course_id` int(11) DEFAULT NULL COMMENT '课件表的id，视频',
  `is_correct` tinyint(1) DEFAULT NULL COMMENT '是否正确',
  `answer` varchar(255) DEFAULT NULL COMMENT '这条题目的答案',
  `create_date` int(11) DEFAULT NULL COMMENT '回答时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件问题回答';

-- ----------------------------
-- Records of edu_course_answer
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_ask
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_ask`;
CREATE TABLE `edu_course_ask` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '出题人',
  `course_id` int(11) DEFAULT NULL COMMENT '课件表的id，视频',
  `subject` varchar(100) DEFAULT NULL COMMENT '题目',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `types` tinyint(1) DEFAULT NULL COMMENT '类型',
  `answer` varchar(255) DEFAULT NULL COMMENT '答案',
  `score` int(10) DEFAULT NULL COMMENT '题目分数',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件题目表';

-- ----------------------------
-- Records of edu_course_ask
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_combination
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_combination`;
CREATE TABLE `edu_course_combination` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `description` varchar(255) DEFAULT NULL COMMENT '课件组的课程描述',
  `content` text COMMENT '内容简介',
  `course_str` varchar(255) DEFAULT NULL COMMENT '课件ID以”,”拆分',
  `cover` varchar(150) DEFAULT NULL COMMENT '封面图片',
  `course_num` int(11) DEFAULT NULL COMMENT '课件数',
  `score` int(10) DEFAULT NULL COMMENT '总评分',
  `ave_score` tinyint(1) DEFAULT NULL COMMENT '平均评分最大10',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件组';

-- ----------------------------
-- Records of edu_course_combination
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_file
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_file`;
CREATE TABLE `edu_course_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '上传人',
  `types` tinyint(1) DEFAULT NULL COMMENT '本地与外网',
  `course_id` int(11) DEFAULT NULL COMMENT '课件的id',
  `title` varchar(50) DEFAULT NULL COMMENT '标题[默认与课件表相同]',
  `course_url` varchar(255) DEFAULT NULL COMMENT '课件上传路径',
  `create_date` int(11) DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='视频上传文件';

-- ----------------------------
-- Records of edu_course_file
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_label
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_label`;
CREATE TABLE `edu_course_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `pid` int(11) DEFAULT NULL COMMENT '所属上级',
  `name` varchar(100) DEFAULT NULL COMMENT '标签名称',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件标签';

-- ----------------------------
-- Records of edu_course_label
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_power
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_power`;
CREATE TABLE `edu_course_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `school_uid` int(11) DEFAULT NULL COMMENT '创建人[管理员]',
  `name` varchar(50) DEFAULT NULL COMMENT '组名称',
  `description` varchar(255) DEFAULT NULL COMMENT '组描述',
  `group_str` varchar(255) DEFAULT NULL COMMENT '用户角色ID以”,”拆分',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件权限组';

-- ----------------------------
-- Records of edu_course_power
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_reply
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_reply`;
CREATE TABLE `edu_course_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `pid` int(11) DEFAULT NULL COMMENT '所属上级[用于回复]',
  `uid` int(11) DEFAULT NULL COMMENT '用户',
  `course_id` int(11) DEFAULT NULL COMMENT '课件表id',
  `content` varchar(200) DEFAULT NULL COMMENT '评论内容',
  `create_date` int(11) DEFAULT NULL COMMENT '评论时间',
  `is_verify` tinyint(1) DEFAULT NULL COMMENT '状态[是否审核]',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件评论回复';

-- ----------------------------
-- Records of edu_course_reply
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_score
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_score`;
CREATE TABLE `edu_course_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `course_id` int(11) DEFAULT NULL COMMENT '课件表id',
  `score` int(11) DEFAULT NULL COMMENT '评分',
  `create_date` int(11) DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件评分';

-- ----------------------------
-- Records of edu_course_score
-- ----------------------------

-- ----------------------------
-- Table structure for edu_course_type
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_type`;
CREATE TABLE `edu_course_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `pid` int(11) DEFAULT NULL COMMENT '所属上级',
  `school_id` int(11) DEFAULT NULL COMMENT '学校id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `name` varchar(50) DEFAULT NULL COMMENT '课件分类名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='课件分类';

-- ----------------------------
-- Records of edu_course_type
-- ----------------------------
INSERT INTO `edu_course_type` VALUES ('1', '0', '1', '1', '测试', '测试', '11111');

-- ----------------------------
-- Table structure for edu_course_watch
-- ----------------------------
DROP TABLE IF EXISTS `edu_course_watch`;
CREATE TABLE `edu_course_watch` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `course_id` int(11) DEFAULT NULL COMMENT '课件id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `when_long` int(11) DEFAULT NULL COMMENT '观看课件的时间记录',
  `end_date` int(11) DEFAULT NULL COMMENT '最后观看时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='课件观看记录';

-- ----------------------------
-- Records of edu_course_watch
-- ----------------------------

-- ----------------------------
-- Table structure for edu_examination
-- ----------------------------
DROP TABLE IF EXISTS `edu_examination`;
CREATE TABLE `edu_examination` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` varchar(255) DEFAULT NULL COMMENT '创建人',
  `title` varchar(150) DEFAULT NULL COMMENT '试卷标题',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `sub_str` int(11) DEFAULT NULL COMMENT '题目组ID[以‘，’拆分]',
  `grade_id` int(11) DEFAULT NULL COMMENT '年级ID',
  `class_str` varchar(255) DEFAULT NULL COMMENT '班级ID[以‘，’拆分]',
  `subject_num` int(11) DEFAULT NULL COMMENT '题目数量',
  `all_score` text COMMENT '总分数',
  `score_json` text COMMENT '分数[存入题目ID和题目分]',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `open_date` int(11) DEFAULT NULL COMMENT '开考时间',
  `end_date` int(11) DEFAULT NULL COMMENT '结果时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='试券表';

-- ----------------------------
-- Records of edu_examination
-- ----------------------------

-- ----------------------------
-- Table structure for edu_exa_answer
-- ----------------------------
DROP TABLE IF EXISTS `edu_exa_answer`;
CREATE TABLE `edu_exa_answer` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `exa_user_id` int(11) DEFAULT NULL COMMENT '用户试卷ID',
  `uid` int(11) DEFAULT NULL COMMENT '回答人',
  `subject_id` int(11) DEFAULT NULL COMMENT '题目ID',
  `content` text COMMENT '内容与回答【json】',
  `score` int(11) DEFAULT NULL COMMENT '得分',
  `is_ error` tinyint(11) DEFAULT NULL COMMENT '是否正确回答',
  `teacher_uid` varchar(255) DEFAULT NULL COMMENT '批题教师ID',
  `teacher_reply` text COMMENT '教师回复',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `create_date` int(11) DEFAULT NULL COMMENT '回答时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='试卷题目回答';

-- ----------------------------
-- Records of edu_exa_answer
-- ----------------------------

-- ----------------------------
-- Table structure for edu_exa_subject
-- ----------------------------
DROP TABLE IF EXISTS `edu_exa_subject`;
CREATE TABLE `edu_exa_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `grade_id` int(11) DEFAULT NULL COMMENT '年级ID',
  `title` varchar(150) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容与答案[JSON数据]',
  `file_url` varchar(255) DEFAULT NULL COMMENT '文件地址',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `type_id` int(11) DEFAULT NULL COMMENT '学科',
  `types` tinyint(1) DEFAULT NULL COMMENT '类型012单选,多选,文本',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `is_auto` tinyint(1) DEFAULT NULL COMMENT '自动批量',
  `is_ open` tinyint(1) DEFAULT NULL COMMENT '是否公开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='题目表';

-- ----------------------------
-- Records of edu_exa_subject
-- ----------------------------

-- ----------------------------
-- Table structure for edu_exa_user
-- ----------------------------
DROP TABLE IF EXISTS `edu_exa_user`;
CREATE TABLE `edu_exa_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `exa_id` int(11) DEFAULT NULL COMMENT '试卷ID',
  `uid` int(11) DEFAULT NULL COMMENT '内容与回答[JSON数据]',
  `content` text COMMENT '总得分',
  `score` int(11) DEFAULT NULL COMMENT '总得分',
  `right_num` int(11) DEFAULT NULL COMMENT '正确数',
  `error_num` int(11) DEFAULT NULL COMMENT '错误数',
  `open_date` int(11) DEFAULT NULL COMMENT '开考时间',
  `end_date` int(11) DEFAULT NULL COMMENT '结果时间',
  `audit_date` int(11) DEFAULT NULL COMMENT '审核时间',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态012[开始,结果,审核]',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户试卷';

-- ----------------------------
-- Records of edu_exa_user
-- ----------------------------

-- ----------------------------
-- Table structure for edu_exa__sub_combination
-- ----------------------------
DROP TABLE IF EXISTS `edu_exa__sub_combination`;
CREATE TABLE `edu_exa__sub_combination` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `title` varchar(11) DEFAULT NULL COMMENT '标题',
  `subject_str` text COMMENT '题目ID【以‘，’拆分】',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `grade_str` varchar(255) DEFAULT NULL COMMENT '年级ID【以‘，’拆分】',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='题目组';

-- ----------------------------
-- Records of edu_exa__sub_combination
-- ----------------------------

-- ----------------------------
-- Table structure for edu_grade
-- ----------------------------
DROP TABLE IF EXISTS `edu_grade`;
CREATE TABLE `edu_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) DEFAULT NULL COMMENT '年级名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='年级';

-- ----------------------------
-- Records of edu_grade
-- ----------------------------

-- ----------------------------
-- Table structure for edu_grade_class
-- ----------------------------
DROP TABLE IF EXISTS `edu_grade_class`;
CREATE TABLE `edu_grade_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `name` varchar(50) DEFAULT NULL COMMENT '班级名称',
  `level_id` int(11) DEFAULT NULL COMMENT '年级id',
  `second_college` int(11) DEFAULT NULL COMMENT '系部名称',
  `teacher_str` varchar(255) DEFAULT NULL COMMENT '教师ID[以“，”拆分]',
  `major` varchar(50) DEFAULT NULL COMMENT '专业名称',
  `course_id` int(11) DEFAULT NULL COMMENT '课程id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='班级';

-- ----------------------------
-- Records of edu_grade_class
-- ----------------------------

-- ----------------------------
-- Table structure for edu_grade_class_course
-- ----------------------------
DROP TABLE IF EXISTS `edu_grade_class_course`;
CREATE TABLE `edu_grade_class_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '操作人',
  `uid` int(11) DEFAULT NULL COMMENT '课程名称',
  `name` varchar(50) DEFAULT NULL COMMENT '描述',
  `description` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL COMMENT '班级',
  `teacher_str` varchar(255) DEFAULT NULL COMMENT '教师ID[以“，”拆分]',
  `grade_com_str` varchar(255) DEFAULT NULL COMMENT '年级课程组[以“，”拆分]',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_date` int(11) DEFAULT NULL COMMENT '更新时间',
  `open_date` date DEFAULT NULL COMMENT '开课时间',
  `end_date` date DEFAULT NULL COMMENT '结果时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='班级课程';

-- ----------------------------
-- Records of edu_grade_class_course
-- ----------------------------

-- ----------------------------
-- Table structure for edu_grade_course_combination
-- ----------------------------
DROP TABLE IF EXISTS `edu_grade_course_combination`;
CREATE TABLE `edu_grade_course_combination` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `uid` int(11) DEFAULT NULL COMMENT '操作人',
  `grade_id` int(11) DEFAULT NULL COMMENT '年级id',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `title` int(11) DEFAULT NULL COMMENT '课程标题',
  `description` int(11) DEFAULT NULL COMMENT '描述',
  `content` int(11) DEFAULT NULL COMMENT '内容',
  `course_com_str` text COMMENT '课件组[以’,’拆分]',
  `type_id` int(11) DEFAULT NULL COMMENT '学科',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='年级课程组';

-- ----------------------------
-- Records of edu_grade_course_combination
-- ----------------------------

-- ----------------------------
-- Table structure for edu_integration_detailed
-- ----------------------------
DROP TABLE IF EXISTS `edu_integration_detailed`;
CREATE TABLE `edu_integration_detailed` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `type_id` int(11) DEFAULT NULL COMMENT '积分类型id',
  `have` float(10,2) DEFAULT NULL COMMENT '剩余积分数量',
  `have_num` float(10,2) DEFAULT NULL COMMENT '使用数据',
  `is_income` tinyint(1) DEFAULT NULL COMMENT '是否为收入',
  `description` varchar(255) DEFAULT NULL COMMENT '明细描述',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分明细表';

-- ----------------------------
-- Records of edu_integration_detailed
-- ----------------------------

-- ----------------------------
-- Table structure for edu_intergration_types
-- ----------------------------
DROP TABLE IF EXISTS `edu_intergration_types`;
CREATE TABLE `edu_intergration_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校ID',
  `name` char(10) DEFAULT NULL COMMENT '积分名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分类型表';

-- ----------------------------
-- Records of edu_intergration_types
-- ----------------------------

-- ----------------------------
-- Table structure for edu_live
-- ----------------------------
DROP TABLE IF EXISTS `edu_live`;
CREATE TABLE `edu_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uid` int(11) DEFAULT NULL COMMENT '创建用户',
  `title` varchar(150) DEFAULT NULL COMMENT '直播标题',
  `teacher_uid` int(11) DEFAULT NULL COMMENT '直播人ID',
  `description` int(11) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `people_num` int(11) DEFAULT NULL COMMENT '可进人数',
  `integration_type_id` int(11) DEFAULT NULL COMMENT '积分类型',
  `integration` float(10,2) DEFAULT NULL COMMENT '所需积分',
  `live_url` varchar(255) DEFAULT NULL COMMENT '直播地址链接',
  `group_str` varchar(255) DEFAULT NULL COMMENT '可进角色权限',
  `open_date` int(11) DEFAULT NULL COMMENT '直播开始时间',
  `end_date` int(11) DEFAULT NULL COMMENT '直播结果时间',
  `create_date` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '012[等待,开始,结果]',
  `is_ audit` tinyint(1) DEFAULT NULL COMMENT '审核',
  `audit_date` int(11) DEFAULT NULL COMMENT '审核时间',
  `audit_school_id` int(11) DEFAULT NULL COMMENT '审核管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='直播设置';

-- ----------------------------
-- Records of edu_live
-- ----------------------------

-- ----------------------------
-- Table structure for edu_live_reply
-- ----------------------------
DROP TABLE IF EXISTS `edu_live_reply`;
CREATE TABLE `edu_live_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `pid` int(11) DEFAULT NULL COMMENT '所属上级[用于回复]',
  `uid` int(11) DEFAULT NULL COMMENT '用户',
  `live_id` int(11) DEFAULT NULL COMMENT '直播表id',
  `content` varchar(255) DEFAULT NULL COMMENT '评论内容',
  `create_date` int(11) DEFAULT NULL COMMENT '评论时间',
  `is_audit` tinyint(1) DEFAULT NULL COMMENT '状态[是否审核]',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='直播评论回复';

-- ----------------------------
-- Records of edu_live_reply
-- ----------------------------

-- ----------------------------
-- Table structure for edu_live_user
-- ----------------------------
DROP TABLE IF EXISTS `edu_live_user`;
CREATE TABLE `edu_live_user` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `uid` int(11) DEFAULT NULL COMMENT '报名用户',
  `live_id` int(11) DEFAULT NULL COMMENT '直播间ID',
  `message` varchar(255) DEFAULT NULL COMMENT '用户留言',
  `create_date` int(11) DEFAULT NULL COMMENT '报名时间',
  `is_ audit` tinyint(4) DEFAULT NULL COMMENT '审核',
  `audit_date` int(11) DEFAULT NULL COMMENT '审核时间',
  `audit_uid` int(11) DEFAULT NULL COMMENT '审核人ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='直播设置';

-- ----------------------------
-- Records of edu_live_user
-- ----------------------------

-- ----------------------------
-- Table structure for edu_school_role
-- ----------------------------
DROP TABLE IF EXISTS `edu_school_role`;
CREATE TABLE `edu_school_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `code` varchar(50) NOT NULL COMMENT '角色编号',
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `des` varchar(400) DEFAULT NULL COMMENT '角色描述',
  `create_user` varchar(50) DEFAULT NULL COMMENT '创建人',
  `create_date` datetime DEFAULT NULL COMMENT '创建时间',
  `update_user` varchar(50) DEFAULT NULL COMMENT '更新人',
  `update_date` datetime DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `rule` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色数据';

-- ----------------------------
-- Records of edu_school_role
-- ----------------------------
INSERT INTO `edu_school_role` VALUES ('1', '001', '管理员', '管理员', '', null, null, null, '1', '');

-- ----------------------------
-- Table structure for edu_school_rule
-- ----------------------------
DROP TABLE IF EXISTS `edu_school_rule`;
CREATE TABLE `edu_school_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `route` char(80) DEFAULT '' COMMENT '路由',
  `title` char(20) DEFAULT '' COMMENT '名称',
  `icon` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '类型',
  `condition` char(100) DEFAULT '' COMMENT '描述',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `tips` text COMMENT '提示',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='权限路由';

-- ----------------------------
-- Records of edu_school_rule
-- ----------------------------
INSERT INTO `edu_school_rule` VALUES ('1', '0', 'rule', '权限管理', '', '3', '权限管理', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('2', '1', 'rule/index', '权限列表', '', '1', '权限列表', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('3', '1', 'rule/create', '创建权限', '', '1', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('4', '0', 'user', '用户管理', '', '3', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('5', '4', 'user/index', '管理员列表', '', '1', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('6', '4', 'user/create', '创建用户', '', '1', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('7', '0', 'role', '角色管理', '', '3', '是', '8', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('8', '7', 'role/index', '角色列表', '', '1', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('9', '7', 'role/create', '创建角色', '', '1', '是', '3', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('10', '1', 'rule/update', '修改权限', '', '2', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('11', '4', 'user/update', '修改用户', '', '2', '是', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('12', '0', 'course', '课件相关', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('13', '12', 'course/index', '课件管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('16', '12', 'course_type/index', '课件分类', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('57', '12', 'course_file/index', '上传管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('58', '12', 'course_score/index\r\n', '课件评分', null, '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('23', '0', 'examination', '考试管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('24', '23', 'testpapermanage/index', '试卷管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('25', '23', 'usertestpaper/index', '学员考试', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('26', '23', 'subjectmanage/index', '题目管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('27', '23', 'examination/combination', '题目组', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('28', '0', 'live', '直播管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('29', '28', 'livemanage/index', '直播管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('30', '0', 'grade', '学校相关', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('31', '30', 'grade/index', '学校信息', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('32', '30', 'grade/grade-class', '班级管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('33', '30', 'grade/course', '年级课程', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('34', '30', 'classcourse/index', '班级课程', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('35', '30', 'grade/teacher', '教师管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('36', '30', 'grade/student', '学生管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('37', '0', 'user', '会员管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('38', '37', 'user/index', '会员管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('39', '37', 'user/intergration', '积分管理', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('40', '37', 'intergrationtype/index', '积分类型', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('41', '37', 'intergrationdetailed/index', '积分明细', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('42', '37', 'user/group', '会员角色', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('43', '37', 'user/course', '会员课程', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('44', '37', 'user/examination', '会员考试', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('48', '12', 'course_ask/index', '课件题目', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('49', '30', 'gradecoursegroup/index', '年级课程组', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('52', '12', 'course_reply/index', '课件评论', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('55', '12', 'course_label/index', '课件标签', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('53', '12', 'course_watch/index', '观看记录', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('56', '12', 'course_power/index', '课件权限', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('46', '12', 'course_combination/index', '课件组', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('45', '23', 'questionanswer/index', '试卷题目回答', '', '1', '', '1', '1', '1', '1');
INSERT INTO `edu_school_rule` VALUES ('47', '12', 'course_answer/index', '课件问答', '', '1', '', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for edu_school_user
-- ----------------------------
DROP TABLE IF EXISTS `edu_school_user`;
CREATE TABLE `edu_school_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `mobile` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT '手机',
  `gender` tinyint(1) DEFAULT '0' COMMENT '01男女',
  `login_ip` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后一次登录IP',
  `login_time` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  `login_num` int(11) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员';

-- ----------------------------
-- Records of edu_school_user
-- ----------------------------
INSERT INTO `edu_school_user` VALUES ('1', 'admin', '罗亮清', null, '$2y$13$Hsfj2gB49u6szVUDpV7.P.CgB3wAUBEh6tbGmfMQy15mTWbC4zgRe', null, '', '1', null, null, '1', null, '0', null, null, '0');

-- ----------------------------
-- Table structure for edu_user_course
-- ----------------------------
DROP TABLE IF EXISTS `edu_user_course`;
CREATE TABLE `edu_user_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL COMMENT '课件id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `school_id` int(11) DEFAULT NULL COMMENT '学校id',
  `Create_date` int(11) DEFAULT NULL COMMENT '添加课件时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户选课表';

-- ----------------------------
-- Records of edu_user_course
-- ----------------------------

-- ----------------------------
-- Table structure for edu_user_exa
-- ----------------------------
DROP TABLE IF EXISTS `edu_user_exa`;
CREATE TABLE `edu_user_exa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `Examination_id` int(11) DEFAULT NULL COMMENT '考试表id',
  `exa_answer_id` int(11) DEFAULT NULL COMMENT '试卷题目回答id',
  `score` int(11) DEFAULT NULL COMMENT '考试得分',
  `status` int(11) DEFAULT NULL COMMENT '状态 试卷是否批改',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户考试表';

-- ----------------------------
-- Records of edu_user_exa
-- ----------------------------

-- ----------------------------
-- Table structure for edu_user_info
-- ----------------------------
DROP TABLE IF EXISTS `edu_user_info`;
CREATE TABLE `edu_user_info` (
  `id` int(11) unsigned NOT NULL COMMENT '自增ID',
  `uid` int(11) DEFAULT NULL COMMENT '用户名',
  `school_id` int(11) DEFAULT NULL COMMENT '学校id',
  `major` varchar(100) DEFAULT NULL COMMENT '所学专业',
  `classname` varchar(50) DEFAULT NULL COMMENT '班级名称',
  `integral` varchar(255) DEFAULT NULL COMMENT '用户积分',
  `grade` varchar(255) DEFAULT NULL COMMENT '用户等级',
  `Fans` varchar(255) DEFAULT NULL COMMENT '粉丝',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `follow` varchar(255) DEFAULT NULL COMMENT '关注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户配置表';

-- ----------------------------
-- Records of edu_user_info
-- ----------------------------

-- ----------------------------
-- Table structure for edu_user_integration
-- ----------------------------
DROP TABLE IF EXISTS `edu_user_integration`;
CREATE TABLE `edu_user_integration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `all` int(11) DEFAULT NULL COMMENT '全部积分',
  `done` int(11) DEFAULT NULL COMMENT '使用了多少',
  `type` int(11) DEFAULT NULL COMMENT '类型',
  `create_date` date DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户积分字段表';

-- ----------------------------
-- Records of edu_user_integration
-- ----------------------------

-- ----------------------------
-- Table structure for edu_web_role
-- ----------------------------
DROP TABLE IF EXISTS `edu_web_role`;
CREATE TABLE `edu_web_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `code` varchar(50) NOT NULL COMMENT '角色编号',
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `des` varchar(400) DEFAULT NULL COMMENT '角色描述',
  `create_user` varchar(50) DEFAULT NULL COMMENT '创建人',
  `create_date` datetime DEFAULT NULL COMMENT '创建时间',
  `update_user` varchar(50) DEFAULT NULL COMMENT '更新人',
  `update_date` datetime DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `rule` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色数据';

-- ----------------------------
-- Records of edu_web_role
-- ----------------------------
INSERT INTO `edu_web_role` VALUES ('1', '001', '会员', '会员', '', null, null, null, '1', '1,2,3,4,5,6,8,9,10,11,12,13,14,7,15,16,17,18,19,20,21,22,23,24,25,26,27,70,71');
INSERT INTO `edu_web_role` VALUES ('2', '002', '老师', '老师', null, null, null, null, '1', '1,2,3,4,5,6,8,9,10,11,12,13,14,7,15,16,17,18,19,20,21,22,23,24,25,26,27,70,71');
INSERT INTO `edu_web_role` VALUES ('3', '003', '学生', '学生', null, null, null, null, '1', '1,2,3,4,5,6,8,9,10,11,12,13,14,7,15,16,17,18,19,20,21,22,23,24,25,26,27,70,71');

-- ----------------------------
-- Table structure for edu_web_rule
-- ----------------------------
DROP TABLE IF EXISTS `edu_web_rule`;
CREATE TABLE `edu_web_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `route` char(80) DEFAULT '' COMMENT '路由',
  `title` char(20) DEFAULT '' COMMENT '名称',
  `icon` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '类型',
  `condition` char(100) DEFAULT '' COMMENT '描述',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `tips` text COMMENT '提示',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COMMENT='权限路由';

-- ----------------------------
-- Records of edu_web_rule
-- ----------------------------
INSERT INTO `edu_web_rule` VALUES ('1', '0', 'userinfo', '个人中心', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('2', '0', 'course', '课件管理', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('3', '0', 'usercourse', '用户课程', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('4', '0', 'examination', '考试相关', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('5', '0', 'live', '直播管理', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('6', '0', 'news', '文章管理', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('8', '1', 'userinfo/index', '基本设置', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('9', '1', 'userinfo/integral', '积分管理', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('10', '2', 'course/index', '我的课件', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('11', '2', 'course/watch', '观看记录', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('12', '2', 'course/reply', '课件评论', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('13', '2', 'course/answer', '课件问答', '', '1', '', null, '', '1', '1');
INSERT INTO `edu_web_rule` VALUES ('14', '3', 'usercourse/index', '自选课程', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('7', '0', 'gradeclass', '我的班级', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('15', '3', 'usercourse/schedule', '课程进度', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('16', '4', 'examination/user', '我的试卷', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('17', '4', 'examination/index', '发布试卷', null, '1', '老师', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('18', '4', 'examination/combination', '发布题目组', null, '1', '老师', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('19', '4', 'examination/subject', '发布题目', null, '1', '老师', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('20', '4', 'examination/answer', '题目回答', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('21', '5', 'live/index', '我的直播间', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('22', '5', 'live/user', '直播数据', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('23', '6', 'news/index', '我的文章', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('24', '7', 'gradeclass/index', '班级设置', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('25', '7', 'gradeclass/course', '班级课程', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('26', '7', 'gradeclass/combination', '课程组', null, '1', '老师可改', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('27', '7', 'gradeclass/schedule', '班级课程进度', null, '1', '', null, null, '1', '1');
INSERT INTO `edu_web_rule` VALUES ('70', '0', 'index/index', '首页', null, '1', '', '1', null, '1', '1');

-- ----------------------------
-- Table structure for edu_web_user
-- ----------------------------
DROP TABLE IF EXISTS `edu_web_user`;
CREATE TABLE `edu_web_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT '0' COMMENT '所属学校',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `mobile` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT '手机',
  `gender` tinyint(1) DEFAULT '0' COMMENT '01男女',
  `login_ip` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后一次登录IP',
  `login_time` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  `login_num` int(11) DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学生老师';

-- ----------------------------
-- Records of edu_web_user
-- ----------------------------
INSERT INTO `edu_web_user` VALUES ('1', '0', 'ptlm007', '罗亮清', null, '$2y$13$Hsfj2gB49u6szVUDpV7.P.CgB3wAUBEh6tbGmfMQy15mTWbC4zgRe', null, '', '1', null, null, '1', null, '0', null, null, '0');
