/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50017
Source Host           : localhost:3306
Source Database       : genesis_correctiontools

Target Server Type    : MYSQL
Target Server Version : 50017
File Encoding         : 65001

Date: 2012-04-24 14:48:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ct_category`
-- ----------------------------
DROP TABLE IF EXISTS `ct_category`;
CREATE TABLE `ct_category` (
  `c_id` int(11) NOT NULL auto_increment,
  `fid` int(11) NOT NULL default '0',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_category
-- ----------------------------
INSERT INTO `ct_category` VALUES ('1', '0', 'TOEFL');
INSERT INTO `ct_category` VALUES ('2', '0', 'IELTS');
INSERT INTO `ct_category` VALUES ('3', '0', 'GRE');
INSERT INTO `ct_category` VALUES ('5', '1', 'Integrated');
INSERT INTO `ct_category` VALUES ('6', '1', 'Independent');
INSERT INTO `ct_category` VALUES ('7', '2', 'Task 1');
INSERT INTO `ct_category` VALUES ('8', '2', 'Task 2');
INSERT INTO `ct_category` VALUES ('9', '3', 'Argument');
INSERT INTO `ct_category` VALUES ('10', '3', 'Issue');
INSERT INTO `ct_category` VALUES ('11', '0', 'Other');

-- ----------------------------
-- Table structure for `ct_essay`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay`;
CREATE TABLE `ct_essay` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `questionid` int(11) default NULL,
  `customquestion` text,
  `submittime` timestamp NULL default CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL default '0',
  `markstatus` tinyint(4) NOT NULL default '0',
  `marktime` timestamp NULL default NULL,
  `cateid` int(11) NOT NULL,
  `subcateid` int(11) default NULL,
  `tid` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `user` (`uid`),
  KEY `subcate` (`subcateid`),
  KEY `cate` (`cateid`),
  KEY `question` (`questionid`),
  CONSTRAINT `cate` FOREIGN KEY (`cateid`) REFERENCES `ct_category` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `question` FOREIGN KEY (`questionid`) REFERENCES `ct_question` (`qid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subcate` FOREIGN KEY (`subcateid`) REFERENCES `ct_category` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`uid`) REFERENCES `ct_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay
-- ----------------------------
-- ----------------------------
-- Table structure for `ct_essay_annotation`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay_annotation`;
CREATE TABLE `ct_essay_annotation` (
  `a_id` int(11) NOT NULL auto_increment,
  `annotation` varchar(10) NOT NULL,
  `caption` varchar(50) default NULL,
  `caption_en` varchar(100) default NULL,
  `explain` varchar(100) default NULL,
  `explain_en` varchar(200) default NULL,
  `value` float(3,2) NOT NULL,
  PRIMARY KEY  (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay_annotation
-- ----------------------------
INSERT INTO `ct_essay_annotation` VALUES ('1', 'ABV', null, 'Incorrect abbreviation', null, 'Invalid abbreviated form or use', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('2', 'ADJ', null, 'Adjective error', null, 'Incorrect adjectival form or placement.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('3', 'ART', null, 'Incorrect use of the article.', null, 'The article is used to limit or specify a noun.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('4', 'CAP', null, 'Capitalization error.', null, 'A capital letter should be used to begin a sentence or for any form of proper nouns.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('5', 'CHI', null, 'Chinglish expression', null, 'A literal translation from Chinese to English.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('6', 'CLA', null, 'Clause deficiency', null, 'Incorrect formation or placement of the clause in the sentence.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('7', 'CNT', null, 'Contraction error', null, 'Improper or invalid contraction form or use.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('8', 'COL', null, 'Error in word combination', null, 'Abnormal combination of word usage.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('9', 'CON', null, 'Incorrect or missing conjunction', null, 'Use a conjunction to connect words, phrases or clauses.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('10', 'COU', null, 'Count noun error', null, 'Count nouns denote enumerable objects.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('11', 'CUT', null, 'This text is not required', null, 'The words are superfluous to the context of the clause or sentence.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('12', 'FOR', null, 'Formatting error', null, 'The  correct organization and arrangement of a specified text', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('13', 'FRG', null, 'Fragmentation error', null, 'An incomplete or isolated portion of text.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('14', 'GND', null, 'Use of incorrect gender', null, 'Invalid gender selection.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('15', 'INC', null, 'Incomprehensible text', null, 'The text  lacks clarity and cannot be understood in the context.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('16', 'INT', null, 'Invalid interrogative', null, 'Error with the interrogative form or usage.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('17', 'LON', null, 'The sentence is too long.', null, 'The sentence is too long and is  unclear.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('18', 'MIS', null, 'Words are missing.', null, 'Words have been omitted and the meaning of the sentence effected.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('19', 'MOD', null, 'Modifier error', null, 'Incorrect or misplaced modifier', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('20', 'PLU', null, 'Error in singular or plural form', null, 'Incorrect use of singular or plural form.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('21', 'POS', null, 'Incorrect possessive form', null, 'Invalid formation or use of the possessive case.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('22', 'POW', null, 'Poor word selection', null, 'Use of incorrect terminology.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('23', 'PRE', null, 'Preposition error', null, 'Incorrect or missing preposition.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('24', 'PRO', null, 'Pronoun error', null, 'Incorrect or missing preposition.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('25', 'PUN', null, 'Incorrect punctuation', null, 'Punctuation is omitted or the incorrect form.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('26', 'QOT', null, 'Quotation error', null, 'Error in quotation, inaccurate, incomplete or failure to acknowledge.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('27', 'REP', null, 'Repetitive word or comment', null, 'Words or phrases have been repeated in the text.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('28', 'SHS', null, 'The sentence is too short', null, 'The sentence is too short or is lacking in information.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('29', 'SPL', null, 'Spelling error', null, 'Word is spelt incorrectly.', '-0.25');
INSERT INTO `ct_essay_annotation` VALUES ('30', 'TYP', null, 'Text input error', null, 'Typographical mistake.', '0.00');
INSERT INTO `ct_essay_annotation` VALUES ('31', 'VAG', null, 'The reference is too vague.', null, 'The meaning is obscure or not precise in its description.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('32', 'VTE', null, 'Tense error', null, 'Use of incorrect verb tense.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('33', 'VFO', null, 'Invalid verb formation', null, 'Error in the conjugation of the verb.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('34', 'VOI', null, 'Invalid verb use', null, 'Incorrect application of the verb to active or passive voice.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('35', 'WFO', null, 'Invalid word formation', null, 'Improper affix, prefix or suffix.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('36', 'WOR', null, 'Incorrect word order', null, 'Words in a phrase or clause are placed incorrectly.', '-0.50');
INSERT INTO `ct_essay_annotation` VALUES ('37', 'EXC', null, 'Excellent', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('38', 'ANS', null, 'Sound analysis', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('39', 'CNC', null, 'Appropriate conclusion', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('40', 'COH', null, 'Sound cohesion', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('41', 'CRE', null, 'Original argument', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('42', 'ARG', null, 'Yes，I agree', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('43', 'IRO', null, 'Well founded introduction', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('44', 'PRG', null, 'Well formed paragraph', null, 'Good structure for a group of closely related sentences that develop a central idea', '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('45', 'WCH', null, 'Words choice appropriate', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('46', 'SEV', null, 'Well supported', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('47', 'SST', null, 'Competent structure', null, null, '1.00');
INSERT INTO `ct_essay_annotation` VALUES ('48', 'TRN', null, 'Reasonable transition', null, null, '1.00');

-- ----------------------------
-- Table structure for `ct_essay_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay_comment`;
CREATE TABLE `ct_essay_comment` (
  `id` int(11) NOT NULL auto_increment,
  `m_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `mark` (`m_id`),
  CONSTRAINT `mark` FOREIGN KEY (`m_id`) REFERENCES `ct_essay_marked` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `ct_essay_grade`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay_grade`;
CREATE TABLE `ct_essay_grade` (
  `g_id` tinyint(4) NOT NULL auto_increment,
  `gradename` varchar(10) NOT NULL,
  `caption` text NOT NULL,
  `caption_en` varchar(100) default NULL,
  `explain` text NOT NULL,
  `explain_en` varchar(200) default NULL,
  `rate` float(2,2) default NULL,
  `category` tinyint(4) NOT NULL,
  PRIMARY KEY  (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay_grade
-- ----------------------------
INSERT INTO `ct_essay_grade` VALUES ('37', 'P_RTP', 'Response to the prompt', '切题 ', 'response to the prompt with adequate explanation', '文章切题，阐说充分 ', null, '0');
INSERT INTO `ct_essay_grade` VALUES ('38', 'P_ORG', 'Organization', '文章结构 ', 'well-organized structure, clear and close transition as well', '段落组织有序，衔接紧密 ', null, '0');
INSERT INTO `ct_essay_grade` VALUES ('39', 'P_DAD', 'Development and Details', '内容展开及逻辑性 ', 'coherent structure, appropriate word usage,  adequate exampling ', '段落内句与句连接顺畅，句式使用恰当，用词确切，得体，论证充分', null, '0');
INSERT INTO `ct_essay_grade` VALUES ('40', 'P_GRA', 'Grammar', '语法准确性 ', 'accurate expression, advanced vocabulary with a high degree of accuracy', '表达准确，简单句、复杂句使用流畅  ', null, '0');
INSERT INTO `ct_essay_grade` VALUES ('41', 'I1_TR', 'Task Response', '任务完成情况 ', 'Covers all requirements of the task.', '满足题目所有要求 ', '0.20', '7');
INSERT INTO `ct_essay_grade` VALUES ('42', 'I1_OAS', 'Organization & Structure', '文章组织和结构 ', 'Sequencing of  information and ideas logically, sufficient and appropriate paragraphing.', '信息和内容组织符合逻辑，分段足够且恰当 ', '0.15', '7');
INSERT INTO `ct_essay_grade` VALUES ('43', 'I1_DAD', 'Development and Details', '论点扩展和细节运用', 'Clearly identifies all principle features and makes comparisons where needed.', '清晰辨别主要特征因素，必要时可适当运用比较 ', '0.20', '7');
INSERT INTO `ct_essay_grade` VALUES ('44', 'I1_LR', 'Lexical resources', '词汇运用', 'Uses a range of vocabulary fluently and flexibly to convey precise meanings.', '词汇丰富，能流畅使用丰富多样的语言并精准表达意思 ', '0.10', '7');
INSERT INTO `ct_essay_grade` VALUES ('45', 'I1_GRA', 'Grammar', '语法 ', 'Command of the elements of Standard Written English, including grammar,  and sentence structure.', '能运用标准的书面英语，包括语法及句式结构 ', '0.15', '7');
INSERT INTO `ct_essay_grade` VALUES ('46', 'I1_HA', 'Holistic Assessment', '整体评分 ', 'Effectively identify, analyze, and evaluate the facts, and conveyed clearly in a fluent manner.', '有效地对事实进行识别、分析及评价，表达准确流畅 ', '0.20', '7');
INSERT INTO `ct_essay_grade` VALUES ('47', 'I2_TR', 'Task Response', '任务完成情况 ', 'Addresses  all aspects of the task', '全面回答了问题 ', '0.20', '8');
INSERT INTO `ct_essay_grade` VALUES ('48', 'I2_OAS', 'Organization & Structure', '文章组织和结构 ', 'Sequencing of information and ideas logically using paragraphs appropriately', '信息及观点组织符合逻辑，分段恰当 ', '0.15', '8');
INSERT INTO `ct_essay_grade` VALUES ('49', 'I2_DAD', 'Development and Details', '论点扩展和细节运用', 'A well-developed response to the question with relevant, extended and supported ideas.', '话题展开良好并能用相关细节予以支持', '0.20', '8');
INSERT INTO `ct_essay_grade` VALUES ('50', 'I2_LR', 'Lexical resources', '词汇运用 ', 'Uses a range of vocabulary fluently and flexibly to convey precise meanings.', '词汇丰富，能流畅使用丰富多样的语言并精准表达意思 ', '0.10', '8');
INSERT INTO `ct_essay_grade` VALUES ('51', 'I2_GRA', 'Grammar', '语法 ', 'Command of the elements of Standard Written English, incl. grammar,  and variety of sentence structures.', '能运用标准的书面英语，包括语法及句式结构 ', '0.15', '8');
INSERT INTO `ct_essay_grade` VALUES ('52', 'I2_HA', 'Holistic Assessment', '整体评分 ', 'Effectively and completely answered the task, and conveyed clearly in a cohesive and  fluent manner.', '有效并完整地回答了问题。回答清楚，连贯流畅 ', '0.20', '8');
INSERT INTO `ct_essay_grade` VALUES ('53', 'G1_TR', 'Task Response', '任务完成情况 ', 'Identify aspects of the argument and examine them perceptively.', '识别对立的观点、并能够深度论述 ', '0.20', '9');
INSERT INTO `ct_essay_grade` VALUES ('54', 'G1_OAS', 'Organization & Structure', '文章组织和结构 ', 'Ideas are organized  logically, and connected with clear transitions.', '论点组织符合逻辑、起承转合准确 ', '0.15', '9');
INSERT INTO `ct_essay_grade` VALUES ('55', 'G1_DAD', 'Development and Details', '论点扩展和细节运用 ', 'Compelling  and detailed support for the reasoning, conveyed fluently and precisely.', '论证有力并且能够适当使用细节来支持自己的推理，表达流畅准确 ', '0.25', '9');
INSERT INTO `ct_essay_grade` VALUES ('56', 'G1_GRA', 'Grammar', '语法', 'Command of the elements of Standard Written English, including grammar, word usage, spelling, and punctuation.', '能运用标准的书面英语，包括语法，词汇，拼写及标点 ', '0.15', '9');
INSERT INTO `ct_essay_grade` VALUES ('57', 'G1_HA', 'Holistic Assessment', '整体评分 ', 'Effectively understand, analyze, and evaluate the argument, and clearly conveyed the evaluation in a fluent manner.', '准确理解对立的立场并加以分析和评价，表达清晰流畅 ', '0.25', '9');
INSERT INTO `ct_essay_grade` VALUES ('58', 'G2_TR', 'Task Response', '任务完成情况 ', 'Effectiveness in developing an argument to support your evaluation of the issue.', '准确分析题目并有效地论证自己的自己的观点 ', '0.20', '10');
INSERT INTO `ct_essay_grade` VALUES ('59', 'G2_OAS', 'Organization & Structure', '文章组织和结构 ', 'Clear, coherent structure, logical paragraphing and clear transitions in ideas.', '论证中结构连贯清晰、分段合理，符合逻辑且起承转合明显 ', '0.15', '10');
INSERT INTO `ct_essay_grade` VALUES ('60', 'G2_DAD', 'Development and Details', '论点扩展和细节运用 ', 'Persuasive  and fully developed examples; logical and sound reasoning, suitably supported. ', '例子说服力很强且完全展开、论证具有逻辑性和说服力、并能适当地使用例子进行支持 ', '0.25', '10');
INSERT INTO `ct_essay_grade` VALUES ('61', 'G2_GRA', 'Grammar', '语法 ', 'Command of the elements of Standard Written English, incl. grammar, word usage, spelling, and punctuation.', '能运用标准的书面英语，包括语法，词汇，拼写及标点 ', '0.15', '10');
INSERT INTO `ct_essay_grade` VALUES ('62', 'G2_HA', 'Holistic Assessment', '整体评分 ', 'Effectively articulate and develop an argument to support your evaluation of the issue cohesively  and fluently in the presentation of the text.', '有效提出并支持自己的观点，表达流畅，前后一致 ', '0.25', '10');
INSERT INTO `ct_essay_grade` VALUES ('63', 'T1_TR', 'Task Response', '任务完成情况 ', 'Presented the points in the lecture and the relationship to the reading.', '充分阐述听力材料中的观点，并指出其与阅读短文的关系 ', '0.20', '5');
INSERT INTO `ct_essay_grade` VALUES ('64', 'T1_OAS', 'Organization & Structure', '文章组织和结构 ', 'Clear, coherent structure stating the points in each passage and their relationship.', '能够表现出听力材料和阅读材料中的观点以及他们的关系。结构连贯清晰 ', '0.15', '5');
INSERT INTO `ct_essay_grade` VALUES ('65', 'T1_DAD', 'Development and Details', '论点扩展和细节运用 ', 'Accurate presentation of each point in both passages and their relationship.', '准确阐说两个材料中的每个观点及它们的关系 ', '0.20', '5');
INSERT INTO `ct_essay_grade` VALUES ('66', 'T1_GRA', 'Grammar', '语法 ', 'Command of the elements of Standard Written English, incl. grammar, word usage, spelling, and punctuation.', '能运用标准的书面英语，包括语法，词汇，拼写及标点 ', '0.20', '5');
INSERT INTO `ct_essay_grade` VALUES ('67', 'T1_HA', 'Holistic Assessment', '整体评分 ', 'Level of clarity, cohesion and fluency in the presentation of the text.', '表达清晰、文章连贯流畅 ', '0.25', '5');
INSERT INTO `ct_essay_grade` VALUES ('68', 'T2_TR', 'Task Response', '任务完成情况 ', 'Effectiveness in addressing  the topic and task.', '文章切题、阐述充分 ', '0.20', '6');
INSERT INTO `ct_essay_grade` VALUES ('69', 'T2_OAS', 'Organization & Structure', '文章组织和结构 ', 'Clear, coherent structure, logical paragraphing and clear transitions in ideas.', '结构连贯清晰、阐述每篇文章观点及他们的关系 ', '0.15', '6');
INSERT INTO `ct_essay_grade` VALUES ('70', 'T2_DAD', 'Development and Details', '论点扩展和细节运用 ', 'Relevant examples, details, reasons to support the position, presented in a unified and progressive way.', '能用相关的例子，细节和原因支持观点。前后一致并循序渐进 ', '0.25', '6');
INSERT INTO `ct_essay_grade` VALUES ('71', 'T2_GRA', 'Grammar', '语法 ', 'Command of the elements of Standard Written English, incl. grammar, word usage, spelling, and punctuation.', '能运用标准的书面英语，包括语法，词汇，拼写及标点 ', '0.15', '6');
INSERT INTO `ct_essay_grade` VALUES ('72', 'T2_HA', 'Holistic Assessment', '整体评分 ', 'Effectively addresses the topic and task cohesively  and fluently in the presentation of the text.', '内容切题，表达连贯流畅 ', '0.25', '6');

-- ----------------------------
-- Table structure for `ct_essay_gradescore`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay_gradescore`;
CREATE TABLE `ct_essay_gradescore` (
  `id` int(11) NOT NULL auto_increment,
  `m_id` int(11) NOT NULL,
  `P_RTP` tinyint(4) default NULL,
  `P_ORG` tinyint(4) default NULL,
  `P_DAD` tinyint(4) default NULL,
  `P_GRA` tinyint(4) default NULL,
  `I1_TR` tinyint(4) default NULL,
  `I1_OAS` tinyint(4) default NULL,
  `I1_DAD` tinyint(4) default NULL,
  `I1_LR` tinyint(4) default NULL,
  `I1_GRA` tinyint(4) default NULL,
  `I1_HA` tinyint(4) default NULL,
  `I2_TR` tinyint(4) default NULL,
  `I2_OAS` tinyint(4) default NULL,
  `I2_DAD` tinyint(4) default NULL,
  `I2_LR` tinyint(4) default NULL,
  `I2_GRA` tinyint(4) default NULL,
  `I2_HA` tinyint(4) default NULL,
  `G1_TR` tinyint(4) default NULL,
  `G1_OAS` tinyint(4) default NULL,
  `G1_DAD` tinyint(4) default NULL,
  `G1_GRA` tinyint(4) default NULL,
  `G1_HA` tinyint(4) default NULL,
  `G2_TR` tinyint(4) default NULL,
  `G2_OAS` tinyint(4) default NULL,
  `G2_DAD` tinyint(4) default NULL,
  `G2_GRA` tinyint(4) default NULL,
  `G2_HA` tinyint(4) default NULL,
  `T1_TR` tinyint(4) default NULL,
  `T1_OAS` tinyint(4) default NULL,
  `T1_DAD` tinyint(4) default NULL,
  `T1_GRA` tinyint(4) default NULL,
  `T1_HA` tinyint(4) default NULL,
  `T2_TR` tinyint(4) default NULL,
  `T2_OAS` tinyint(4) default NULL,
  `T2_DAD` tinyint(4) default NULL,
  `T2_GRA` tinyint(4) default NULL,
  `T2_HA` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `gmark` (`m_id`),
  CONSTRAINT `gmark` FOREIGN KEY (`m_id`) REFERENCES `ct_essay_marked` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay_gradescore
-- ----------------------------
-- ----------------------------
-- Table structure for `ct_essay_marked`
-- ----------------------------
DROP TABLE IF EXISTS `ct_essay_marked`;
CREATE TABLE `ct_essay_marked` (
  `m_id` int(11) NOT NULL auto_increment,
  `e_id` int(11) NOT NULL,
  `markedcontent` text NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  `marktime` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `tid` int(11) NOT NULL,
  `feedback` text,
  `score` int(2) default NULL,
  PRIMARY KEY  (`m_id`),
  KEY `essay` (`e_id`),
  KEY `teacher` (`tid`),
  CONSTRAINT `essay` FOREIGN KEY (`e_id`) REFERENCES `ct_essay` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `teacher` FOREIGN KEY (`tid`) REFERENCES `ct_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_essay_marked
-- ----------------------------

-- ----------------------------
-- Table structure for `ct_group`
-- ----------------------------
DROP TABLE IF EXISTS `ct_group`;
CREATE TABLE `ct_group` (
  `gid` int(11) NOT NULL auto_increment,
  `groupname` varchar(20) NOT NULL,
  `status` int(1) NOT NULL default '1',
  PRIMARY KEY  (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_group
-- ----------------------------
INSERT INTO `ct_group` VALUES ('1', 'admin', '1');
INSERT INTO `ct_group` VALUES ('2', 'user', '1');
INSERT INTO `ct_group` VALUES ('3', 'teacher', '1');

-- ----------------------------
-- Table structure for `ct_question`
-- ----------------------------
DROP TABLE IF EXISTS `ct_question`;
CREATE TABLE `ct_question` (
  `qid` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `cateid` tinyint(4) default NULL,
  `subcateid` tinyint(4) default NULL,
  `updatetime` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_question
-- ----------------------------
INSERT INTO `ct_question` VALUES ('1', 'Custom Quetion', ' ', null, null, '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `ct_user`
-- ----------------------------
DROP TABLE IF EXISTS `ct_user`;
CREATE TABLE `ct_user` (
  `uid` int(11) NOT NULL auto_increment COMMENT 'userid',
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int(1) default NULL,
  `country` varchar(20) default NULL,
  `active` int(1) NOT NULL default '1',
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_user
-- ----------------------------
INSERT INTO `ct_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@correctiontools.com', null, null, '1');
INSERT INTO `ct_user` VALUES ('2', 'teacher', 'e10adc3949ba59abbe56e057f20f883e', 'teacher@correctiontools.com', null, null, '1');
INSERT INTO `ct_user` VALUES ('3', 'student', 'e10adc3949ba59abbe56e057f20f883e', 'student@correctiontools.com', null, null, '1');

-- ----------------------------
-- Table structure for `ct_user_plus`
-- ----------------------------
DROP TABLE IF EXISTS `ct_user_plus`;
CREATE TABLE `ct_user_plus` (
  `uid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL default '2',
  `lastip` varchar(20) default NULL,
  `lastsignin` timestamp NULL default NULL,
  `account` float(4,2) default '0.00',
  `regtime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`uid`),
  KEY `group` (`groupid`),
  CONSTRAINT `group` FOREIGN KEY (`groupid`) REFERENCES `ct_group` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_user_plus
-- ----------------------------
INSERT INTO `ct_user_plus` VALUES ('1', '1', null, null, '0.00', '2012-04-10 15:07:45');
INSERT INTO `ct_user_plus` VALUES ('2', '3', null, null, '0.00', '2012-04-13 16:01:05');
INSERT INTO `ct_user_plus` VALUES ('3', '2', null, null, '0.00', '2012-04-13 16:01:05');
