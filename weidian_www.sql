/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.5
Source Server Version : 50546
Source Host           : 192.168.1.5:3306
Source Database       : weidian_www

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2016-12-05 16:27:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_ad
-- ----------------------------
DROP TABLE IF EXISTS `t_ad`;
CREATE TABLE `t_ad` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(150) NOT NULL COMMENT '广告名称',
  `a_alias` varchar(50) NOT NULL COMMENT '别名',
  `a_picture` varchar(150) NOT NULL,
  `a_link` varchar(255) NOT NULL COMMENT '链接地址',
  `a_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1正常，2禁用',
  `a_addtime` datetime NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='广告管理';

-- ----------------------------
-- Records of t_ad
-- ----------------------------
INSERT INTO `t_ad` VALUES ('9', '嗯嗯', 'www', 'http://oc1bn3cfn.bkt.clouddn.com/product/20160817/c86b5594-b019-4971-a00d-f046682f4be9.png', 'http://www.baidu.com/', '1', '2016-08-17 14:21:14');
INSERT INTO `t_ad` VALUES ('10', '第五代PURTIER胎盘素3', 'sky', 'http://image.visp.info/product/20160818/e90a75f9-cb0f-4513-a61f-d00dbf2501dc.jpg', 'http://x.eqxiu.com/s/WKtbXkK8', '1', '2016-08-17 16:33:58');
INSERT INTO `t_ad` VALUES ('11', 'PURTIER胎盘素', 'banner1471449600', 'http://image.visp.info/product/20160818/d0dad048-f16a-478c-b2f8-c006909f5191.jpg', 'http://x.eqxiu.com/s/WKtbXkK8', '1', '2016-08-17 16:35:07');
INSERT INTO `t_ad` VALUES ('12', '测试233', 'test', 'http://image.visp.info/weixin/20160929/203f14e3-948c-47c8-b069-144d03eb9c3f.png', 'http://www.huibaogd.com/3', '1', '2016-09-26 17:04:57');
INSERT INTO `t_ad` VALUES ('13', '测试43', 'test', 'http://image.visp.info/weixin/20161011/be856a8c-c6ea-4357-b08a-c671ccf47f0c.png', '12312://www.baidu.com/', '1', '2016-09-29 16:40:25');

-- ----------------------------
-- Table structure for t_ad_group
-- ----------------------------
DROP TABLE IF EXISTS `t_ad_group`;
CREATE TABLE `t_ad_group` (
  `ag_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '组id',
  `ag_name` varchar(250) DEFAULT NULL COMMENT '广告组名',
  `ag_cname` varchar(50) DEFAULT NULL COMMENT '广告别名',
  `a_ids` varchar(250) DEFAULT NULL COMMENT '关联的广告id',
  `ag_addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='广告组';

-- ----------------------------
-- Records of t_ad_group
-- ----------------------------
INSERT INTO `t_ad_group` VALUES ('19', '首页轮播', 'home_focus', '10,9,11', '2016-08-18 15:45:01');
INSERT INTO `t_ad_group` VALUES ('20', '新闻轮播', 'news_focus', '10,11', '2016-08-20 15:42:09');
INSERT INTO `t_ad_group` VALUES ('22', '测试二号2', '大', '13,9,10,11,12', '2016-09-26 17:32:45');

-- ----------------------------
-- Table structure for t_basic_config
-- ----------------------------
DROP TABLE IF EXISTS `t_basic_config`;
CREATE TABLE `t_basic_config` (
  `bc_id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_type` tinyint(4) NOT NULL COMMENT '类型: 1、SEO；2、提示信息，3、样式模板，4、购买配置，5收货配置，6提现配置',
  `bc_title` varchar(50) NOT NULL COMMENT '名称',
  `bc_key` varchar(50) NOT NULL COMMENT '键',
  `bc_value` text NOT NULL COMMENT '值',
  `bc_sort` int(11) NOT NULL COMMENT '排序',
  `bc_addtime` datetime NOT NULL,
  PRIMARY KEY (`bc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='基础配置表';

-- ----------------------------
-- Records of t_basic_config
-- ----------------------------
INSERT INTO `t_basic_config` VALUES ('1', '1', '网站名称', 'site_name', '阿斯达', '1', '2016-08-12 14:51:47');
INSERT INTO `t_basic_config` VALUES ('2', '2', '非会员获取二维码提示', 'not_member_tip', '您还不是代言人，请先购买产品成为代言人，然后生成推广二维码！', '2', '2016-08-13 16:00:58');
INSERT INTO `t_basic_config` VALUES ('3', '3', '样式模版', 'style template', '蓝白雨滴款', '3', '2016-08-13 16:01:45');
INSERT INTO `t_basic_config` VALUES ('6', '6', '多少金额可以提现', 'cash_config', '10', '6', '2016-08-13 16:03:30');
INSERT INTO `t_basic_config` VALUES ('7', '4', '自动取消订单时效', 'auto_cancle_order', '0.5', '7', '2016-08-13 16:16:08');
INSERT INTO `t_basic_config` VALUES ('8', '4', '重复购买折扣', 'mall_again', '9.5', '8', '2016-08-13 16:17:23');
INSERT INTO `t_basic_config` VALUES ('9', '5', '发货多少天自动收货', 'auto_complete_order', '10', '9', '2016-08-13 16:17:58');
INSERT INTO `t_basic_config` VALUES ('10', '6', '每日提现次数', 'withdraw_times', '10', '0', '0000-00-00 00:00:00');
INSERT INTO `t_basic_config` VALUES ('11', '6', '收货后多少天提现', 'receipt_day', '10', '0', '0000-00-00 00:00:00');
INSERT INTO `t_basic_config` VALUES ('14', '1', '分享标题', 'share_title', '我是{nickname},你还不快分享', '2', '2016-08-18 16:59:21');
INSERT INTO `t_basic_config` VALUES ('15', '1', '分享内容', 'share_content', '我是{nickname},据说，你要分享了，你今天买彩票能中大奖！你信不！', '3', '2016-08-18 17:00:34');
INSERT INTO `t_basic_config` VALUES ('16', '1', '第三方统计代码', 'stat_code', '<script> var _hmt = _hmt || []; (function() {     var hm = document.createElement(\"script\");     hm.src = \"//hm.baidu.com/hm.js?9c8b537a4ae72722fea3211cf4aa3117\";     var s = document.getElementsByTagName(\"script\")[0];     s.parentNode.insertBefore(hm, s); })(); </script>', '4', '2016-08-18 17:01:49');
INSERT INTO `t_basic_config` VALUES ('17', '6', '提现金额限制', 'withdraw_money', '200', '0', '0000-00-00 00:00:00');
INSERT INTO `t_basic_config` VALUES ('18', '1', '公众号名称', 'weixin_service_name', '上善网络', '1', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for t_cron_log
-- ----------------------------
DROP TABLE IF EXISTS `t_cron_log`;
CREATE TABLE `t_cron_log` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_url` varchar(150) NOT NULL COMMENT '任务URL',
  `cl_status` tinyint(4) NOT NULL COMMENT '任务执行结果：1成功，2失败',
  `cl_result` varchar(255) NOT NULL COMMENT '任务执行结果',
  `cl_datetime` datetime NOT NULL COMMENT '执行时间',
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='任务日志表';

-- ----------------------------
-- Records of t_cron_log
-- ----------------------------
INSERT INTO `t_cron_log` VALUES ('29', '/cron/order/collectCancleOrder', '1', '{\"code\":1,\"info\":\"Count:13\"}', '2016-08-22 10:03:21');
INSERT INTO `t_cron_log` VALUES ('30', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u72b6\\u6001\\u66f4\\u6539\\u5931\\u8d25\"}', '2016-08-22 10:03:36');
INSERT INTO `t_cron_log` VALUES ('31', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:05:51');
INSERT INTO `t_cron_log` VALUES ('32', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:22');
INSERT INTO `t_cron_log` VALUES ('33', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:22');
INSERT INTO `t_cron_log` VALUES ('34', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:23');
INSERT INTO `t_cron_log` VALUES ('35', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:23');
INSERT INTO `t_cron_log` VALUES ('36', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:24');
INSERT INTO `t_cron_log` VALUES ('37', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:24');
INSERT INTO `t_cron_log` VALUES ('38', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:24');
INSERT INTO `t_cron_log` VALUES ('39', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:25');
INSERT INTO `t_cron_log` VALUES ('40', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:25');
INSERT INTO `t_cron_log` VALUES ('41', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:25');
INSERT INTO `t_cron_log` VALUES ('42', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:26');
INSERT INTO `t_cron_log` VALUES ('43', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u53d6\\u6d88\\u6210\\u529f\"}', '2016-08-22 10:06:38');
INSERT INTO `t_cron_log` VALUES ('44', '/cron/order/dealCancleOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-22 10:06:39');
INSERT INTO `t_cron_log` VALUES ('45', '/cron/order/collectCompleteOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-23 09:17:50');
INSERT INTO `t_cron_log` VALUES ('46', '/cron/order/collectCompleteOrder', '1', '{\"code\":1,\"info\":\"Count:1\"}', '2016-08-23 09:19:34');
INSERT INTO `t_cron_log` VALUES ('47', '/cron/order/dealCompleteOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u786e\\u8ba4\\u6210\\u529f\"}', '2016-08-23 09:19:49');
INSERT INTO `t_cron_log` VALUES ('48', '/cron/order/dealCompleteOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-23 09:20:58');
INSERT INTO `t_cron_log` VALUES ('49', '/cron/order/dealCompleteOrder', '1', '{\"code\":1,\"info\":\"\\u8ba2\\u5355\\u786e\\u8ba4\\u6210\\u529f\"}', '2016-08-23 09:21:16');
INSERT INTO `t_cron_log` VALUES ('50', '/cron/order/collectCancleOrder', '1', '{\"code\":1,\"info\":\"Count:8\"}', '2016-08-24 16:39:38');
INSERT INTO `t_cron_log` VALUES ('51', '/cron/order/collectCancleOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-24 16:40:22');
INSERT INTO `t_cron_log` VALUES ('52', '/cron/order/collectCancleOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-24 16:41:57');
INSERT INTO `t_cron_log` VALUES ('53', '/cron/order/collectCompleteOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-24 16:42:34');
INSERT INTO `t_cron_log` VALUES ('54', '/cron/order/collectCompleteOrder', '1', '{\"code\":1,\"info\":\"No data processing\"}', '2016-08-24 16:43:19');
INSERT INTO `t_cron_log` VALUES ('55', '/cron/queue/dealQueue', '1', '{\"code\":1,\"info\":\"Deal Success\"}', '2016-08-25 15:27:22');
INSERT INTO `t_cron_log` VALUES ('56', '/cron/queue/dealQueue', '1', '{\"code\":1,\"info\":\"Deal Success!ID:9\"}', '2016-08-25 15:27:56');

-- ----------------------------
-- Table structure for t_member
-- ----------------------------
DROP TABLE IF EXISTS `t_member`;
CREATE TABLE `t_member` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_openId` varchar(50) NOT NULL,
  `m_nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `m_realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `m_avatar` varchar(255) DEFAULT NULL,
  `m_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `m_password` varchar(150) NOT NULL COMMENT '密码',
  `m_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1正常，2禁用',
  `m_regIp` bigint(20) NOT NULL COMMENT '注册IP',
  `m_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`m_id`),
  KEY `m_openId` (`m_openId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of t_member
-- ----------------------------
INSERT INTO `t_member` VALUES ('37', 'omr0kwDkce9RqufziPv7qNgdHLEU', '莫小白', null, 'http://wx.qlogo.cn/mmopen/wcib2GksmGOlHPr5sGKwk7IFJJypkwPYquLwFzj1cnk3cKibrZicxOb1YRs1gVRY7g7QqcOFIicE4UNvuHBN3eAYAA/0', '13400507914', 'M^TIzNDU2', '1', '0', '2016-08-24 14:26:46');

-- ----------------------------
-- Table structure for t_member_address
-- ----------------------------
DROP TABLE IF EXISTS `t_member_address`;
CREATE TABLE `t_member_address` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `a_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `a_realname` varchar(25) NOT NULL COMMENT '联系人',
  `a_province` varchar(25) NOT NULL COMMENT '省',
  `a_city` varchar(25) NOT NULL COMMENT '市',
  `a_area` varchar(25) NOT NULL COMMENT '区',
  `a_default` tinyint(4) NOT NULL DEFAULT '2' COMMENT '是否默认: 1不是默认，2默认',
  `a_address` varchar(100) NOT NULL COMMENT '地址',
  `a_addtime` datetime NOT NULL,
  PRIMARY KEY (`a_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='收货地址';

-- ----------------------------
-- Records of t_member_address
-- ----------------------------
INSERT INTO `t_member_address` VALUES ('14', '32', '15806026996', '小叶', '广东', '广州', '越秀区', '2', '3333', '2016-10-12 16:12:43');
INSERT INTO `t_member_address` VALUES ('16', '37', '13400507914', '张三', '北京', '东城区', '', '2', '阿斯达', '2016-10-17 15:26:53');

-- ----------------------------
-- Table structure for t_news
-- ----------------------------
DROP TABLE IF EXISTS `t_news`;
CREATE TABLE `t_news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `nc_id` int(11) NOT NULL COMMENT '分类ID',
  `n_title` varchar(255) NOT NULL COMMENT '标题',
  `n_des` varchar(255) DEFAULT NULL COMMENT '导读',
  `n_cover` varchar(155) DEFAULT NULL COMMENT '封面',
  `n_content` text NOT NULL,
  `n_sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `n_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1正常，2禁用',
  `n_addtime` datetime NOT NULL COMMENT '添加时间',
  `n_recommend` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否推荐: 1不推荐，2推荐',
  PRIMARY KEY (`n_id`),
  KEY `nc_id` (`nc_id`),
  KEY `n_title` (`n_title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of t_news
-- ----------------------------
INSERT INTO `t_news` VALUES ('1', '25', '【环球时报驻印尼特约记者 游弦鹤】今天是印尼国庆日。', '【环球时报驻印尼特约记者 游弦鹤】今天是印尼国庆日。+1', 'http://7xw2p1.com1.z0.glb.clouddn.com/news/20161017/7c157898-563c-4044-9113-874e84200038.jpg', '<p>【环球时报驻印尼特约记者 游弦鹤】今天是印尼国庆日。</p>', '1', '1', '2016-08-17 15:09:37', '1');
INSERT INTO `t_news` VALUES ('2', '23', '南海军演222', '南海军演33', 'http://image.visp.info/news/20161011/0d20e4dc-db88-4c00-8b7a-031a9b81ac27.jpg', '<p>南海军演</p>', '1', '1', '2016-08-18 11:13:11', '1');

-- ----------------------------
-- Table structure for t_news_category
-- ----------------------------
DROP TABLE IF EXISTS `t_news_category`;
CREATE TABLE `t_news_category` (
  `nc_id` int(11) NOT NULL AUTO_INCREMENT,
  `nc_parent_id` int(11) NOT NULL COMMENT '父分类',
  `nc_alias` varchar(50) NOT NULL COMMENT '别名',
  `nc_name` varchar(100) NOT NULL COMMENT '分类名称',
  `nc_sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `nc_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1正常，2禁用',
  `nc_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`nc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of t_news_category
-- ----------------------------
INSERT INTO `t_news_category` VALUES ('23', '0', 'information', '资讯21', '1', '2', '2016-08-17 14:58:29');
INSERT INTO `t_news_category` VALUES ('25', '0', 'information2', '使用指南', '3', '1', '2016-08-17 15:03:32');
INSERT INTO `t_news_category` VALUES ('32', '0', 'teast', '测试', '1', '1', '2016-09-27 16:23:00');
INSERT INTO `t_news_category` VALUES ('33', '0', 'information3', 'dege', '1', '1', '2016-09-27 16:36:07');
INSERT INTO `t_news_category` VALUES ('34', '32', 'infomation', '测试二', '1', '1', '2016-09-29 17:00:50');
INSERT INTO `t_news_category` VALUES ('35', '34', 'www', 'dae', '1', '1', '2016-10-11 14:52:13');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_order_no` varchar(50) NOT NULL COMMENT '订单号',
  `m_id` int(11) NOT NULL COMMENT '用户ID',
  `o_price` decimal(10,2) NOT NULL COMMENT '商品单价',
  `o_express_fee` int(11) NOT NULL DEFAULT '0' COMMENT '运费',
  `o_order_amount` decimal(10,2) NOT NULL COMMENT '订单总额',
  `o_payment_amount` decimal(10,2) NOT NULL COMMENT '实付金额',
  `o_pay_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '支付状态:1待付款，2取消订单，3已经支付',
  `o_order_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '订单状态:1未发货，2已经发货,3已完成',
  `o_refund_status` tinyint(4) DEFAULT '1' COMMENT '1未退款，2退款中，3已退款',
  `o_addtime` datetime NOT NULL,
  `o_paytime` datetime DEFAULT NULL COMMENT '订单支付时间',
  `o_close_remark` varchar(255) DEFAULT NULL,
  `o_memo` varchar(255) DEFAULT NULL COMMENT '客户留言',
  `o_updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('92', '201608251509562665', '37', '27500.00', '111', '27500.00', '2000.00', '1', '1', '1', '2016-08-25 15:09:56', null, null, '', '2016-10-14 14:02:54');
INSERT INTO `t_order` VALUES ('109', '201610171117421389', '37', '0.00', '0', '0.00', '0.00', '1', '1', '1', '2016-10-17 11:17:43', null, null, '', null);
INSERT INTO `t_order` VALUES ('110', '201610171118088196', '37', '0.00', '0', '0.00', '0.00', '1', '1', '1', '2016-10-17 11:18:08', null, null, '', null);
INSERT INTO `t_order` VALUES ('111', '201610171119594895', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-10-17 11:19:59', null, null, '', null);
INSERT INTO `t_order` VALUES ('112', '201610171120178079', '37', '100.00', '0', '300.00', '300.00', '1', '1', '1', '2016-10-17 11:20:17', null, null, '', null);
INSERT INTO `t_order` VALUES ('113', '201611071422158869', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:22:15', null, null, '', null);
INSERT INTO `t_order` VALUES ('114', '201611071422324253', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:22:32', null, null, '', null);
INSERT INTO `t_order` VALUES ('115', '201611071441017439', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:41:01', null, null, '', null);
INSERT INTO `t_order` VALUES ('116', '201611071442458804', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:42:45', null, null, '', null);
INSERT INTO `t_order` VALUES ('117', '201611071450435108', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:50:44', null, null, '', null);
INSERT INTO `t_order` VALUES ('118', '201611071451364601', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:51:37', null, null, '', null);
INSERT INTO `t_order` VALUES ('119', '201611071452096754', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:52:09', null, null, '', null);
INSERT INTO `t_order` VALUES ('120', '201611071453090032', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:53:09', null, null, '', null);
INSERT INTO `t_order` VALUES ('121', '201611071454274197', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:54:27', null, null, '', null);
INSERT INTO `t_order` VALUES ('122', '201611071455263071', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:55:27', null, null, '', null);
INSERT INTO `t_order` VALUES ('123', '201611071455331157', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:55:33', null, null, '', null);
INSERT INTO `t_order` VALUES ('124', '201611071456597530', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:56:59', null, null, '', null);
INSERT INTO `t_order` VALUES ('125', '201611071457116020', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:57:11', null, null, '', null);
INSERT INTO `t_order` VALUES ('126', '201611071457389444', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:57:38', null, null, '', null);
INSERT INTO `t_order` VALUES ('127', '201611071459593840', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 14:59:59', null, null, '', null);
INSERT INTO `t_order` VALUES ('128', '201611071502570982', '37', '100.00', '0', '100.00', '100.00', '1', '1', '1', '2016-11-07 15:02:57', null, null, '', null);
INSERT INTO `t_order` VALUES ('129', '201611071506461447', '37', '100.00', '0', '200.00', '200.00', '1', '1', '1', '2016-11-07 15:06:46', null, null, '', null);

-- ----------------------------
-- Table structure for t_order_auto_close
-- ----------------------------
DROP TABLE IF EXISTS `t_order_auto_close`;
CREATE TABLE `t_order_auto_close` (
  `oac_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL COMMENT '订单ID',
  `oac_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '处理状态:1未处理，2处理完毕',
  `oac_addtime` datetime NOT NULL COMMENT '添加时间',
  `oac_updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`oac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='订单自动关闭';

-- ----------------------------
-- Records of t_order_auto_close
-- ----------------------------
INSERT INTO `t_order_auto_close` VALUES ('37', '75', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('38', '77', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('39', '78', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('40', '79', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('41', '80', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('42', '81', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('43', '82', '1', '2016-08-24 16:39:37', null);
INSERT INTO `t_order_auto_close` VALUES ('44', '85', '1', '2016-08-24 16:39:38', null);

-- ----------------------------
-- Table structure for t_order_auto_complete
-- ----------------------------
DROP TABLE IF EXISTS `t_order_auto_complete`;
CREATE TABLE `t_order_auto_complete` (
  `oac_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL COMMENT '订单ID',
  `oac_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '处理状态: 1未处理，2已经处理',
  `oac_addtime` datetime NOT NULL COMMENT '添加时间',
  `oac_updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`oac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='订单自动完成';

-- ----------------------------
-- Records of t_order_auto_complete
-- ----------------------------
INSERT INTO `t_order_auto_complete` VALUES ('3', '74', '2', '2016-08-23 09:19:34', '2016-08-23 09:21:16');

-- ----------------------------
-- Table structure for t_order_express
-- ----------------------------
DROP TABLE IF EXISTS `t_order_express`;
CREATE TABLE `t_order_express` (
  `oe_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL COMMENT '订单ID',
  `oe_contacts` varchar(50) NOT NULL COMMENT '收货人',
  `oe_phone` varchar(11) NOT NULL COMMENT '收货人电话',
  `oe_address` varchar(255) NOT NULL COMMENT '收货人地址',
  `oe_express_company` varchar(50) DEFAULT NULL COMMENT '快递公司',
  `oe_express_number` varchar(50) DEFAULT NULL COMMENT '快递单号',
  `oe_addtime` datetime NOT NULL COMMENT '添加时间',
  `oe_sipping_time` datetime DEFAULT NULL COMMENT '发货时间',
  PRIMARY KEY (`oe_id`),
  KEY `o_id` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='订单快递表';

-- ----------------------------
-- Records of t_order_express
-- ----------------------------
INSERT INTO `t_order_express` VALUES ('1', '92', '张三', '13400507914', '福建省福州东大路89号', '顺丰快递', '4442123123', '2016-09-29 15:01:19', '2016-09-29 15:01:22');
INSERT INTO `t_order_express` VALUES ('2', '109', '李四', '13400507914', '北京西城区阿斯达斯', null, null, '2016-10-17 11:17:43', null);
INSERT INTO `t_order_express` VALUES ('3', '110', '李四', '13400507914', '北京西城区阿斯达斯', null, null, '2016-10-17 11:18:08', null);
INSERT INTO `t_order_express` VALUES ('4', '111', '李四', '13400507914', '北京西城区阿斯达斯', null, null, '2016-10-17 11:19:59', null);
INSERT INTO `t_order_express` VALUES ('5', '112', '李四', '13400507914', '北京西城区阿斯达斯', null, null, '2016-10-17 11:20:18', null);
INSERT INTO `t_order_express` VALUES ('6', '113', '', '', '', null, null, '2016-11-07 14:22:16', null);
INSERT INTO `t_order_express` VALUES ('7', '114', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:22:33', null);
INSERT INTO `t_order_express` VALUES ('8', '115', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:41:01', null);
INSERT INTO `t_order_express` VALUES ('9', '116', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:42:45', null);
INSERT INTO `t_order_express` VALUES ('10', '117', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:50:44', null);
INSERT INTO `t_order_express` VALUES ('11', '118', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:51:37', null);
INSERT INTO `t_order_express` VALUES ('12', '119', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:52:09', null);
INSERT INTO `t_order_express` VALUES ('13', '120', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:53:09', null);
INSERT INTO `t_order_express` VALUES ('14', '121', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:54:27', null);
INSERT INTO `t_order_express` VALUES ('15', '122', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:55:27', null);
INSERT INTO `t_order_express` VALUES ('16', '123', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:55:33', null);
INSERT INTO `t_order_express` VALUES ('17', '124', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:56:59', null);
INSERT INTO `t_order_express` VALUES ('18', '125', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:57:12', null);
INSERT INTO `t_order_express` VALUES ('19', '126', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 14:57:38', null);
INSERT INTO `t_order_express` VALUES ('20', '127', '', '', '', null, null, '2016-11-07 14:59:59', null);
INSERT INTO `t_order_express` VALUES ('21', '128', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 15:02:57', null);
INSERT INTO `t_order_express` VALUES ('22', '129', '张三', '13400507914', '北京东城区阿斯达', null, null, '2016-11-07 15:06:47', null);

-- ----------------------------
-- Table structure for t_order_list
-- ----------------------------
DROP TABLE IF EXISTS `t_order_list`;
CREATE TABLE `t_order_list` (
  `ol_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) DEFAULT NULL COMMENT '订单id',
  `p_id` int(11) DEFAULT NULL COMMENT '商品id',
  `p_title` varchar(255) DEFAULT NULL,
  `pp_ids` varchar(255) DEFAULT NULL COMMENT '套餐列表用逗号分隔 ',
  `pp_names` text COMMENT '套餐名称',
  `ol_num` int(11) DEFAULT NULL COMMENT '套餐数量',
  PRIMARY KEY (`ol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COMMENT='订单商品表';

-- ----------------------------
-- Records of t_order_list
-- ----------------------------
INSERT INTO `t_order_list` VALUES ('1', '92', '186', '商品一号', '224,226,229', '套餐一', '10');
INSERT INTO `t_order_list` VALUES ('2', '92', '186', '商品二号', '224,226,229', '套餐二', '10');
INSERT INTO `t_order_list` VALUES ('14', '109', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('15', '110', '192', '测试商品7', '', '', '3');
INSERT INTO `t_order_list` VALUES ('16', '111', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('17', '112', '192', '测试商品7', '', '', '3');
INSERT INTO `t_order_list` VALUES ('18', '113', '195', '测试商品10', '', '', '1');
INSERT INTO `t_order_list` VALUES ('19', '114', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('20', '115', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('21', '116', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('22', '117', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('23', '118', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('24', '119', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('25', '120', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('26', '121', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('27', '122', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('28', '123', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('29', '124', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('30', '125', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('31', '126', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('32', '127', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('33', '128', '192', '测试商品7', '', '', '1');
INSERT INTO `t_order_list` VALUES ('34', '129', '193', '测试商品8', '', '', '2');

-- ----------------------------
-- Table structure for t_order_progress
-- ----------------------------
DROP TABLE IF EXISTS `t_order_progress`;
CREATE TABLE `t_order_progress` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL COMMENT '订单ID',
  `op_memo` varchar(50) NOT NULL COMMENT '订单备注',
  `op_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`op_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COMMENT='订单进度';

-- ----------------------------
-- Records of t_order_progress
-- ----------------------------
INSERT INTO `t_order_progress` VALUES ('30', '38', '用户取消订单', '2016-08-20 14:59:01');
INSERT INTO `t_order_progress` VALUES ('31', '39', '用户取消订单', '2016-08-20 14:58:40');
INSERT INTO `t_order_progress` VALUES ('32', '38', '用户取消订单', '2016-08-20 15:00:25');
INSERT INTO `t_order_progress` VALUES ('33', '38', '用户取消订单', '2016-08-20 15:01:27');
INSERT INTO `t_order_progress` VALUES ('34', '38', '用户取消订单', '2016-08-20 15:03:57');
INSERT INTO `t_order_progress` VALUES ('35', '38', '用户取消订单', '2016-08-20 15:09:21');
INSERT INTO `t_order_progress` VALUES ('36', '40', '创建订单', '2016-08-20 15:25:11');
INSERT INTO `t_order_progress` VALUES ('37', '40', '成功支付订单', '2016-08-20 15:26:45');
INSERT INTO `t_order_progress` VALUES ('38', '41', '创建订单', '2016-08-20 15:42:32');
INSERT INTO `t_order_progress` VALUES ('39', '42', '创建订单', '2016-08-20 15:55:44');
INSERT INTO `t_order_progress` VALUES ('40', '43', '创建订单', '2016-08-20 15:55:50');
INSERT INTO `t_order_progress` VALUES ('41', '44', '创建订单', '2016-08-20 15:56:55');
INSERT INTO `t_order_progress` VALUES ('42', '45', '创建订单', '2016-08-20 15:57:34');
INSERT INTO `t_order_progress` VALUES ('43', '46', '创建订单', '2016-08-20 15:58:36');
INSERT INTO `t_order_progress` VALUES ('44', '46', '用户取消订单', '2016-08-20 15:59:03');
INSERT INTO `t_order_progress` VALUES ('45', '45', '成功支付订单', '2016-08-20 16:00:36');
INSERT INTO `t_order_progress` VALUES ('46', '45', '用户确认订单', '2016-08-20 16:01:47');
INSERT INTO `t_order_progress` VALUES ('47', '47', '创建订单', '2016-08-20 16:17:20');
INSERT INTO `t_order_progress` VALUES ('48', '48', '创建订单', '2016-08-20 16:23:19');
INSERT INTO `t_order_progress` VALUES ('49', '48', '成功支付订单', '2016-08-20 16:24:03');
INSERT INTO `t_order_progress` VALUES ('50', '48', '用户确认订单', '2016-08-20 16:26:09');
INSERT INTO `t_order_progress` VALUES ('51', '49', '创建订单', '2016-08-20 16:43:19');
INSERT INTO `t_order_progress` VALUES ('52', '50', '创建订单', '2016-08-20 17:11:49');
INSERT INTO `t_order_progress` VALUES ('53', '51', '创建订单', '2016-08-20 17:31:35');
INSERT INTO `t_order_progress` VALUES ('54', '40', '填写快递信息', '2016-08-20 17:48:29');
INSERT INTO `t_order_progress` VALUES ('55', '52', '创建订单', '2016-08-20 17:58:19');
INSERT INTO `t_order_progress` VALUES ('56', '53', '创建订单', '2016-08-20 17:59:00');
INSERT INTO `t_order_progress` VALUES ('57', '54', '创建订单', '2016-08-20 18:00:30');
INSERT INTO `t_order_progress` VALUES ('58', '55', '创建订单', '2016-08-22 09:55:54');
INSERT INTO `t_order_progress` VALUES ('59', '56', '创建订单', '2016-08-22 09:59:40');
INSERT INTO `t_order_progress` VALUES ('60', '57', '创建订单', '2016-08-22 09:59:55');
INSERT INTO `t_order_progress` VALUES ('61', '57', '用户取消订单', '2016-08-22 10:01:04');
INSERT INTO `t_order_progress` VALUES ('62', '56', '用户取消订单', '2016-08-22 10:01:23');
INSERT INTO `t_order_progress` VALUES ('63', '55', '用户取消订单', '2016-08-22 10:01:48');
INSERT INTO `t_order_progress` VALUES ('64', '37', '用户取消订单', '2016-08-22 10:05:51');
INSERT INTO `t_order_progress` VALUES ('65', '39', '用户取消订单', '2016-08-22 10:06:22');
INSERT INTO `t_order_progress` VALUES ('66', '41', '用户取消订单', '2016-08-22 10:06:22');
INSERT INTO `t_order_progress` VALUES ('67', '42', '用户取消订单', '2016-08-22 10:06:23');
INSERT INTO `t_order_progress` VALUES ('68', '43', '用户取消订单', '2016-08-22 10:06:23');
INSERT INTO `t_order_progress` VALUES ('69', '44', '用户取消订单', '2016-08-22 10:06:23');
INSERT INTO `t_order_progress` VALUES ('70', '47', '用户取消订单', '2016-08-22 10:06:24');
INSERT INTO `t_order_progress` VALUES ('71', '49', '用户取消订单', '2016-08-22 10:06:24');
INSERT INTO `t_order_progress` VALUES ('72', '50', '用户取消订单', '2016-08-22 10:06:25');
INSERT INTO `t_order_progress` VALUES ('73', '51', '用户取消订单', '2016-08-22 10:06:25');
INSERT INTO `t_order_progress` VALUES ('74', '52', '用户取消订单', '2016-08-22 10:06:25');
INSERT INTO `t_order_progress` VALUES ('75', '53', '用户取消订单', '2016-08-22 10:06:26');
INSERT INTO `t_order_progress` VALUES ('76', '54', '用户取消订单', '2016-08-22 10:06:38');
INSERT INTO `t_order_progress` VALUES ('77', '58', '创建订单', '2016-08-22 10:07:51');
INSERT INTO `t_order_progress` VALUES ('78', '58', '成功支付订单', '2016-08-22 10:08:19');
INSERT INTO `t_order_progress` VALUES ('79', '58', '发货成功', '2016-08-22 10:11:37');
INSERT INTO `t_order_progress` VALUES ('80', '58', '填写快递信息', '2016-08-22 10:13:32');
INSERT INTO `t_order_progress` VALUES ('81', '58', '用户确认订单', '2016-08-22 10:14:28');
INSERT INTO `t_order_progress` VALUES ('82', '58', '用户确认订单', '2016-08-22 10:14:41');
INSERT INTO `t_order_progress` VALUES ('83', '59', '创建订单', '2016-08-22 10:14:52');
INSERT INTO `t_order_progress` VALUES ('84', '60', '创建订单', '2016-08-22 10:18:14');
INSERT INTO `t_order_progress` VALUES ('85', '60', '用户取消订单', '2016-08-22 10:19:03');
INSERT INTO `t_order_progress` VALUES ('86', '59', '用户取消订单', '2016-08-22 10:19:30');
INSERT INTO `t_order_progress` VALUES ('87', '61', '创建订单', '2016-08-22 10:20:30');
INSERT INTO `t_order_progress` VALUES ('88', '61', '用户取消订单', '2016-08-22 10:20:57');
INSERT INTO `t_order_progress` VALUES ('89', '62', '创建订单', '2016-08-22 10:23:19');
INSERT INTO `t_order_progress` VALUES ('90', '62', '用户取消订单', '2016-08-22 10:23:30');
INSERT INTO `t_order_progress` VALUES ('91', '63', '创建订单', '2016-08-22 10:26:31');
INSERT INTO `t_order_progress` VALUES ('92', '64', '创建订单', '2016-08-22 10:26:53');
INSERT INTO `t_order_progress` VALUES ('93', '64', '用户取消订单', '2016-08-22 10:27:05');
INSERT INTO `t_order_progress` VALUES ('94', '63', '用户取消订单', '2016-08-22 10:27:34');
INSERT INTO `t_order_progress` VALUES ('95', '65', '创建订单', '2016-08-22 10:29:22');
INSERT INTO `t_order_progress` VALUES ('96', '65', '成功支付订单', '2016-08-22 10:29:33');
INSERT INTO `t_order_progress` VALUES ('97', '66', '创建订单', '2016-08-22 10:32:52');
INSERT INTO `t_order_progress` VALUES ('98', '66', '修改订单价格为556.00', '2016-08-22 10:33:39');
INSERT INTO `t_order_progress` VALUES ('99', '67', '创建订单', '2016-08-22 10:45:48');
INSERT INTO `t_order_progress` VALUES ('100', '65', '用户确认订单', '2016-08-22 10:53:43');
INSERT INTO `t_order_progress` VALUES ('101', '58', '用户确认订单', '2016-08-22 10:53:54');
INSERT INTO `t_order_progress` VALUES ('102', '58', '用户确认订单', '2016-08-22 10:54:09');
INSERT INTO `t_order_progress` VALUES ('103', '66', '用户取消订单', '2016-08-22 10:58:51');
INSERT INTO `t_order_progress` VALUES ('104', '67', '用户取消订单', '2016-08-22 10:59:45');
INSERT INTO `t_order_progress` VALUES ('105', '68', '创建订单', '2016-08-22 11:00:39');
INSERT INTO `t_order_progress` VALUES ('106', '68', '成功支付订单', '2016-08-22 11:02:36');
INSERT INTO `t_order_progress` VALUES ('107', '68', '用户确认订单', '2016-08-22 11:03:06');
INSERT INTO `t_order_progress` VALUES ('108', '58', '用户确认订单', '2016-08-22 11:04:10');
INSERT INTO `t_order_progress` VALUES ('109', '40', '用户确认订单', '2016-08-22 11:04:38');
INSERT INTO `t_order_progress` VALUES ('110', '58', '用户确认订单', '2016-08-22 11:04:47');
INSERT INTO `t_order_progress` VALUES ('111', '69', '创建订单', '2016-08-22 11:06:25');
INSERT INTO `t_order_progress` VALUES ('112', '69', '成功支付订单', '2016-08-22 11:06:34');
INSERT INTO `t_order_progress` VALUES ('113', '69', '用户确认订单', '2016-08-22 11:06:46');
INSERT INTO `t_order_progress` VALUES ('114', '70', '创建订单', '2016-08-22 11:07:07');
INSERT INTO `t_order_progress` VALUES ('115', '70', '用户取消订单', '2016-08-22 11:07:24');
INSERT INTO `t_order_progress` VALUES ('116', '71', '创建订单', '2016-08-22 11:09:31');
INSERT INTO `t_order_progress` VALUES ('117', '71', '成功支付订单', '2016-08-22 11:09:53');
INSERT INTO `t_order_progress` VALUES ('118', '71', '用户确认订单', '2016-08-22 11:10:35');
INSERT INTO `t_order_progress` VALUES ('119', '72', '创建订单', '2016-08-22 11:10:54');
INSERT INTO `t_order_progress` VALUES ('120', '72', '成功支付订单', '2016-08-22 11:11:11');
INSERT INTO `t_order_progress` VALUES ('121', '72', '用户确认订单', '2016-08-22 11:11:20');
INSERT INTO `t_order_progress` VALUES ('122', '73', '创建订单', '2016-08-23 09:10:14');
INSERT INTO `t_order_progress` VALUES ('123', '73', '用户取消订单', '2016-08-23 09:10:34');
INSERT INTO `t_order_progress` VALUES ('124', '74', '创建订单', '2016-08-23 09:10:51');
INSERT INTO `t_order_progress` VALUES ('125', '74', '成功支付订单', '2016-08-23 09:11:49');
INSERT INTO `t_order_progress` VALUES ('126', '74', '发货成功', '2016-08-23 09:19:16');
INSERT INTO `t_order_progress` VALUES ('127', '74', '用户确认订单', '2016-08-23 09:19:49');
INSERT INTO `t_order_progress` VALUES ('128', '74', '用户确认订单', '2016-08-23 09:21:16');
INSERT INTO `t_order_progress` VALUES ('129', '75', '创建订单', '2016-08-23 09:35:52');
INSERT INTO `t_order_progress` VALUES ('130', '76', '创建订单', '2016-08-23 11:08:56');
INSERT INTO `t_order_progress` VALUES ('131', '76', '用户取消订单', '2016-08-23 11:09:09');
INSERT INTO `t_order_progress` VALUES ('132', '77', '创建订单', '2016-08-23 11:16:15');
INSERT INTO `t_order_progress` VALUES ('133', '78', '创建订单', '2016-08-23 11:16:19');
INSERT INTO `t_order_progress` VALUES ('134', '79', '创建订单', '2016-08-23 11:16:28');
INSERT INTO `t_order_progress` VALUES ('135', '80', '创建订单', '2016-08-23 11:16:37');
INSERT INTO `t_order_progress` VALUES ('136', '81', '创建订单', '2016-08-23 11:16:44');
INSERT INTO `t_order_progress` VALUES ('137', '82', '创建订单', '2016-08-23 11:16:52');
INSERT INTO `t_order_progress` VALUES ('138', '83', '创建订单', '2016-08-23 11:18:08');
INSERT INTO `t_order_progress` VALUES ('139', '83', '填写快递信息', '2016-08-23 11:32:24');
INSERT INTO `t_order_progress` VALUES ('140', '83', '填写快递信息', '2016-08-23 11:32:31');
INSERT INTO `t_order_progress` VALUES ('141', '83', '发货成功', '2016-08-23 11:33:05');
INSERT INTO `t_order_progress` VALUES ('142', '83', '发货成功', '2016-08-23 11:42:01');
INSERT INTO `t_order_progress` VALUES ('143', '83', '填写快递信息', '2016-08-23 11:50:25');
INSERT INTO `t_order_progress` VALUES ('144', '84', '创建订单', '2016-08-24 12:03:22');
INSERT INTO `t_order_progress` VALUES ('145', '84', '成功支付订单', '2016-08-24 12:03:37');
INSERT INTO `t_order_progress` VALUES ('146', '85', '创建订单', '2016-08-24 15:24:19');
INSERT INTO `t_order_progress` VALUES ('147', '86', '创建订单', '2016-08-25 14:50:35');
INSERT INTO `t_order_progress` VALUES ('148', '86', '用户取消订单', '2016-08-25 14:54:49');
INSERT INTO `t_order_progress` VALUES ('149', '84', '用户确认订单', '2016-08-25 14:54:59');
INSERT INTO `t_order_progress` VALUES ('150', '83', '用户确认订单', '2016-08-25 14:55:06');
INSERT INTO `t_order_progress` VALUES ('151', '87', '创建订单', '2016-08-25 14:55:31');
INSERT INTO `t_order_progress` VALUES ('152', '87', '成功支付订单', '2016-08-25 14:56:04');
INSERT INTO `t_order_progress` VALUES ('153', '87', '用户确认订单', '2016-08-25 14:56:09');
INSERT INTO `t_order_progress` VALUES ('154', '88', '创建订单', '2016-08-25 14:57:42');
INSERT INTO `t_order_progress` VALUES ('155', '88', '成功支付订单', '2016-08-25 14:57:49');
INSERT INTO `t_order_progress` VALUES ('156', '89', '创建订单', '2016-08-25 15:05:44');
INSERT INTO `t_order_progress` VALUES ('157', '89', '成功支付订单', '2016-08-25 15:05:56');
INSERT INTO `t_order_progress` VALUES ('158', '90', '创建订单', '2016-08-25 15:08:01');
INSERT INTO `t_order_progress` VALUES ('159', '90', '成功支付订单', '2016-08-25 15:08:09');
INSERT INTO `t_order_progress` VALUES ('160', '90', '用户确认订单', '2016-08-25 15:08:31');
INSERT INTO `t_order_progress` VALUES ('161', '91', '创建订单', '2016-08-25 15:09:34');
INSERT INTO `t_order_progress` VALUES ('162', '91', '用户取消订单', '2016-08-25 15:09:46');
INSERT INTO `t_order_progress` VALUES ('163', '92', '创建订单', '2016-08-25 15:09:56');
INSERT INTO `t_order_progress` VALUES ('164', '92', '成功支付订单', '2016-08-25 15:10:02');
INSERT INTO `t_order_progress` VALUES ('165', '92', '用户确认订单', '2016-08-25 15:10:10');
INSERT INTO `t_order_progress` VALUES ('166', '89', '填写快递信息', '2016-09-01 15:35:24');
INSERT INTO `t_order_progress` VALUES ('167', '89', '发货成功', '2016-09-01 15:35:34');
INSERT INTO `t_order_progress` VALUES ('168', '88', '填写快递信息', '2016-09-01 15:41:30');
INSERT INTO `t_order_progress` VALUES ('169', '88', '发货成功', '2016-09-01 16:36:20');
INSERT INTO `t_order_progress` VALUES ('170', '88', '用户确认订单', '2016-09-01 16:36:35');
INSERT INTO `t_order_progress` VALUES ('171', '81', '修改订单价格为33.00', '2016-09-29 14:52:06');
INSERT INTO `t_order_progress` VALUES ('172', '82', '修改订单价格为36', '2016-09-29 14:52:15');
INSERT INTO `t_order_progress` VALUES ('173', '89', '填写快递信息', '2016-09-29 14:53:13');
INSERT INTO `t_order_progress` VALUES ('174', '89', '填写快递信息', '2016-09-30 10:11:46');
INSERT INTO `t_order_progress` VALUES ('175', '89', '填写快递信息', '2016-10-11 15:12:51');
INSERT INTO `t_order_progress` VALUES ('176', '89', '填写快递信息', '2016-10-11 15:13:24');
INSERT INTO `t_order_progress` VALUES ('177', '85', '修改订单价格为123123', '2016-10-11 15:14:52');
INSERT INTO `t_order_progress` VALUES ('178', '81', '修改订单价格为999', '2016-10-13 09:40:09');
INSERT INTO `t_order_progress` VALUES ('179', '0', '关闭订单', '2016-10-13 17:12:26');
INSERT INTO `t_order_progress` VALUES ('180', '0', '关闭订单', '2016-10-13 17:14:30');
INSERT INTO `t_order_progress` VALUES ('181', '0', '关闭订单', '2016-10-13 17:20:03');
INSERT INTO `t_order_progress` VALUES ('182', '0', '关闭订单', '2016-10-13 17:21:21');
INSERT INTO `t_order_progress` VALUES ('183', '92', '修改订单价格为2000', '2016-10-14 14:02:54');
INSERT INTO `t_order_progress` VALUES ('184', '109', '创建订单', '2016-10-17 11:17:43');
INSERT INTO `t_order_progress` VALUES ('185', '110', '创建订单', '2016-10-17 11:18:08');
INSERT INTO `t_order_progress` VALUES ('186', '111', '创建订单', '2016-10-17 11:19:59');
INSERT INTO `t_order_progress` VALUES ('187', '112', '创建订单', '2016-10-17 11:20:18');
INSERT INTO `t_order_progress` VALUES ('188', '113', '创建订单', '2016-11-07 14:22:15');
INSERT INTO `t_order_progress` VALUES ('189', '114', '创建订单', '2016-11-07 14:22:33');
INSERT INTO `t_order_progress` VALUES ('190', '115', '创建订单', '2016-11-07 14:41:01');
INSERT INTO `t_order_progress` VALUES ('191', '116', '创建订单', '2016-11-07 14:42:45');
INSERT INTO `t_order_progress` VALUES ('192', '117', '创建订单', '2016-11-07 14:50:44');
INSERT INTO `t_order_progress` VALUES ('193', '118', '创建订单', '2016-11-07 14:51:37');
INSERT INTO `t_order_progress` VALUES ('194', '119', '创建订单', '2016-11-07 14:52:09');
INSERT INTO `t_order_progress` VALUES ('195', '120', '创建订单', '2016-11-07 14:53:09');
INSERT INTO `t_order_progress` VALUES ('196', '121', '创建订单', '2016-11-07 14:54:27');
INSERT INTO `t_order_progress` VALUES ('197', '122', '创建订单', '2016-11-07 14:55:27');
INSERT INTO `t_order_progress` VALUES ('198', '123', '创建订单', '2016-11-07 14:55:33');
INSERT INTO `t_order_progress` VALUES ('199', '124', '创建订单', '2016-11-07 14:56:59');
INSERT INTO `t_order_progress` VALUES ('200', '125', '创建订单', '2016-11-07 14:57:12');
INSERT INTO `t_order_progress` VALUES ('201', '126', '创建订单', '2016-11-07 14:57:38');
INSERT INTO `t_order_progress` VALUES ('202', '127', '创建订单', '2016-11-07 14:59:59');
INSERT INTO `t_order_progress` VALUES ('203', '128', '创建订单', '2016-11-07 15:02:57');
INSERT INTO `t_order_progress` VALUES ('204', '129', '创建订单', '2016-11-07 15:06:46');

-- ----------------------------
-- Table structure for t_order_refund
-- ----------------------------
DROP TABLE IF EXISTS `t_order_refund`;
CREATE TABLE `t_order_refund` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL COMMENT '帐号ID',
  `or_order_no` varchar(50) NOT NULL COMMENT '订单号',
  `or_refund_no` varchar(50) NOT NULL COMMENT '退款单号',
  `or_transaction_no` varchar(50) NOT NULL COMMENT '第三方平台交易单号',
  `or_amount` decimal(10,2) NOT NULL COMMENT '退款金额',
  `or_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态: 1退款中，2退款成功',
  `or_addtime` datetime NOT NULL COMMENT '添加时间',
  `or_refund_result` varchar(255) DEFAULT NULL COMMENT '退款结果',
  `or_updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`or_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单退款';

-- ----------------------------
-- Records of t_order_refund
-- ----------------------------

-- ----------------------------
-- Table structure for t_pay_notify_log
-- ----------------------------
DROP TABLE IF EXISTS `t_pay_notify_log`;
CREATE TABLE `t_pay_notify_log` (
  `nl_id` int(11) NOT NULL AUTO_INCREMENT,
  `nl_platform` int(11) NOT NULL COMMENT '平台ID，1微信',
  `out_trade_no` varchar(100) DEFAULT NULL COMMENT '平台订单号',
  `transaction_id` varchar(100) DEFAULT NULL COMMENT '微信订单号',
  `nl_data` text NOT NULL COMMENT '日志',
  `nl_datetime` datetime NOT NULL COMMENT '通知时间',
  PRIMARY KEY (`nl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COMMENT='支付通知回调日志';

-- ----------------------------
-- Records of t_pay_notify_log
-- ----------------------------
INSERT INTO `t_pay_notify_log` VALUES ('131', '1', '2016121212111', '2016121212111666666', '{\"out_trade_no\":\"2016121212111\",\"transaction_id\":\"2016121212111666666\"}', '2016-08-20 10:15:43');

-- ----------------------------
-- Table structure for t_payment
-- ----------------------------
DROP TABLE IF EXISTS `t_payment`;
CREATE TABLE `t_payment` (
  `p_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `p_type` tinyint(4) NOT NULL COMMENT '支付渠道：1微信',
  `p_order_no` varchar(50) NOT NULL COMMENT '订单号',
  `p_transaction_no` varchar(50) NOT NULL COMMENT '第三方平台订单号',
  `p_money` decimal(10,2) NOT NULL COMMENT '支付总金额',
  `p_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`p_id`),
  KEY `p_order_no` (`p_order_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户支付表';

-- ----------------------------
-- Records of t_payment
-- ----------------------------
INSERT INTO `t_payment` VALUES ('1', '1', '1', '1', '1', '1.00', '2016-09-29 15:45:46');

-- ----------------------------
-- Table structure for t_product
-- ----------------------------
DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_id` int(11) NOT NULL COMMENT '分类id',
  `p_title` varchar(255) NOT NULL COMMENT '标题',
  `p_cover` varchar(255) NOT NULL COMMENT '封面',
  `p_content` text,
  `p_collect` int(11) DEFAULT NULL COMMENT '收藏数',
  `p_sales` int(11) NOT NULL DEFAULT '0' COMMENT '销量',
  `p_stock` int(11) NOT NULL COMMENT '商品库存',
  `p_price` decimal(10,2) DEFAULT '0.00' COMMENT '商品价格（前台显示）',
  `p_sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `p_status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '订单状态: 1为上架，2为下架，3为删除',
  `p_addTime` datetime NOT NULL,
  `p_updateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_title` (`p_title`) USING BTREE,
  KEY `pc_id` (`pc_id`) USING BTREE,
  KEY `p_order` (`p_sort`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='旅游产品';

-- ----------------------------
-- Records of t_product
-- ----------------------------
INSERT INTO `t_product` VALUES ('186', '36', '测试商品1', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('187', '36', '测试商品2', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('188', '36', '测试商品3', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('189', '36', '测试商品4', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('190', '36', '测试商品5', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('191', '36', '测试商品6', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', '2016-10-13 09:15:13');
INSERT INTO `t_product` VALUES ('192', '36', '测试商品7', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '37', '100.00', '10', '2', '2016-10-13 09:08:53', '2016-11-15 16:58:54');
INSERT INTO `t_product` VALUES ('193', '36', '测试商品8', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '48', '100.00', '10', '1', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('194', '36', '测试商品9', 'weixin/20161115/513326c4-0a9e-4d4b-911e-f745adc48fc5.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', '2016-11-15 17:07:14');
INSERT INTO `t_product` VALUES ('195', '36', '测试商品10', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '1', '2016-10-13 09:08:53', null);
INSERT INTO `t_product` VALUES ('196', '36', '测试商品11', 'weixin/20161013/7cba44f0-f192-46fe-bf52-a4bb6d4e317f.jpg', '<p>测试商品测试商品测试商品</p>', null, '10', '50', '100.00', '10', '2', '2016-10-13 09:08:53', '2016-10-13 09:15:44');

-- ----------------------------
-- Table structure for t_product_category
-- ----------------------------
DROP TABLE IF EXISTS `t_product_category`;
CREATE TABLE `t_product_category` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级分类id',
  `pc_img` varchar(255) DEFAULT NULL COMMENT '分类图片',
  `pc_name` varchar(255) NOT NULL COMMENT '分类名',
  `pc_alise` varchar(255) NOT NULL COMMENT '别名',
  `pc_order` int(11) NOT NULL COMMENT '排序 ',
  `pc_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1为正常2为禁用',
  PRIMARY KEY (`pc_id`),
  KEY `pc_pid` (`pc_pid`) USING BTREE,
  KEY `pc_status` (`pc_status`) USING BTREE,
  KEY `pc_order` (`pc_order`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='产品分类表';

-- ----------------------------
-- Records of t_product_category
-- ----------------------------
INSERT INTO `t_product_category` VALUES ('36', '0', '', '上善若水', 'water', '0', '1');
INSERT INTO `t_product_category` VALUES ('38', '0', '', '上善关爱2', 'love', '2', '1');
INSERT INTO `t_product_category` VALUES ('44', '0', null, '丝路8', 'love123123', '1', '1');
INSERT INTO `t_product_category` VALUES ('45', '36', null, '123', '123', '1', '1');
INSERT INTO `t_product_category` VALUES ('46', '36', null, '测试', 'love2', '1', '1');

-- ----------------------------
-- Table structure for t_product_collect
-- ----------------------------
DROP TABLE IF EXISTS `t_product_collect`;
CREATE TABLE `t_product_collect` (
  `pco_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL COMMENT '商品id',
  `m_id` int(11) NOT NULL COMMENT '收藏用户id',
  `openID` varchar(255) DEFAULT NULL,
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`pco_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8 COMMENT='商品收藏';

-- ----------------------------
-- Records of t_product_collect
-- ----------------------------

-- ----------------------------
-- Table structure for t_product_discount
-- ----------------------------
DROP TABLE IF EXISTS `t_product_discount`;
CREATE TABLE `t_product_discount` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL COMMENT '商品id',
  `pd_title` varchar(255) NOT NULL COMMENT '限时折扣名称',
  `pd_startTime` datetime NOT NULL COMMENT '折扣开始时间',
  `pd_endTime` datetime NOT NULL COMMENT '折扣结束时间',
  `pd_number` int(11) NOT NULL DEFAULT '0' COMMENT '限购数量',
  `pd_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='商品限时折扣';

-- ----------------------------
-- Records of t_product_discount
-- ----------------------------
INSERT INTO `t_product_discount` VALUES ('4', '186', '国庆特惠', '2016-10-13 01:05:00', '2016-10-21 03:35:00', '1', '2016-10-13 09:36:14');

-- ----------------------------
-- Table structure for t_product_pic
-- ----------------------------
DROP TABLE IF EXISTS `t_product_pic`;
CREATE TABLE `t_product_pic` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL COMMENT '商品id',
  `pp_url` varchar(255) NOT NULL COMMENT '图片链接',
  `pp_order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`pp_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1262 DEFAULT CHARSET=utf8 COMMENT='产品图片列表';

-- ----------------------------
-- Records of t_product_pic
-- ----------------------------
INSERT INTO `t_product_pic` VALUES ('1261', '194', 'weixin/20161115/5cd37cdd-b8a9-428f-ac03-42d21402f70f.jpg', '0');

-- ----------------------------
-- Table structure for t_product_profile
-- ----------------------------
DROP TABLE IF EXISTS `t_product_profile`;
CREATE TABLE `t_product_profile` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `pt_id` int(11) DEFAULT '1' COMMENT '套餐类型',
  `pp_name` varchar(255) NOT NULL COMMENT '套餐名称',
  `pp_price` decimal(10,2) NOT NULL COMMENT '价格',
  `pp_stock` int(11) NOT NULL COMMENT '库存',
  `pp_sales` int(11) NOT NULL DEFAULT '0' COMMENT '销量',
  `pp_editTime` datetime NOT NULL COMMENT '修改时间',
  `pp_addTime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`pp_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=utf8 COMMENT='基础套餐配置表';

-- ----------------------------
-- Records of t_product_profile
-- ----------------------------
INSERT INTO `t_product_profile` VALUES ('224', '1', '1', '3', '0.00', '3', '0', '2016-08-13 15:25:38', '2016-08-13 15:15:37');
INSERT INTO `t_product_profile` VALUES ('226', '1', '2', '44', '0.00', '44', '0', '2016-08-13 15:25:38', '2016-08-13 15:19:17');
INSERT INTO `t_product_profile` VALUES ('229', '189', '1', '红色', '5.00', '20', '0', '2016-09-30 10:08:35', '2016-08-18 16:17:18');
INSERT INTO `t_product_profile` VALUES ('230', '187', '1', '黄色', '5.00', '100', '0', '2016-09-30 10:08:35', '2016-08-18 16:17:18');
INSERT INTO `t_product_profile` VALUES ('231', '181', '2', 's', '5.00', '100', '0', '2016-09-30 10:08:35', '2016-08-18 16:17:18');
INSERT INTO `t_product_profile` VALUES ('243', '182', '1', '3', '0.00', '3', '0', '2016-09-30 09:20:28', '2016-08-20 17:52:08');
INSERT INTO `t_product_profile` VALUES ('244', '182', '2', '4', '0.00', '4', '0', '2016-09-30 09:20:28', '2016-08-20 17:52:08');
INSERT INTO `t_product_profile` VALUES ('246', '176', '2', 'L', '333.00', '46', '6', '2016-10-12 15:30:43', '2016-08-22 10:16:52');
INSERT INTO `t_product_profile` VALUES ('247', '176', '2', 'M', '444.00', '62', '3', '2016-10-12 15:30:43', '2016-08-22 10:16:53');
INSERT INTO `t_product_profile` VALUES ('249', '183', '1', '3', '3.00', '3', '0', '2016-09-30 14:47:44', '2016-09-30 14:47:44');
INSERT INTO `t_product_profile` VALUES ('259', '175', '2', 'xxL', '44.00', '44', '0', '2016-10-12 15:29:53', '2016-10-10 15:15:16');
INSERT INTO `t_product_profile` VALUES ('260', '175', '2', 'xL', '33.00', '33', '0', '2016-10-12 15:29:53', '2016-10-10 15:15:16');
INSERT INTO `t_product_profile` VALUES ('261', '175', '2', 'L', '22.00', '22', '0', '2016-10-12 15:29:53', '2016-10-10 15:15:16');
INSERT INTO `t_product_profile` VALUES ('264', '184', '2', '123', '123.00', '123', '0', '2016-10-11 15:19:25', '2016-10-11 15:19:25');
INSERT INTO `t_product_profile` VALUES ('265', '184', '1', '132', '132.00', '132', '0', '2016-10-11 15:19:25', '2016-10-11 15:19:25');
INSERT INTO `t_product_profile` VALUES ('266', '184', '10', '132', '123.00', '132', '0', '2016-10-11 15:19:25', '2016-10-11 15:19:25');
INSERT INTO `t_product_profile` VALUES ('268', '179', '1', '红色', '188.00', '50', '0', '2016-10-13 09:06:11', '2016-10-13 09:06:11');
INSERT INTO `t_product_profile` VALUES ('270', '178', '1', '红色', '199.00', '20', '0', '2016-10-13 09:07:57', '2016-10-13 09:07:57');
INSERT INTO `t_product_profile` VALUES ('271', '185', '1', '红色', '199.00', '100', '0', '2016-10-13 09:08:53', '2016-10-13 09:08:53');
INSERT INTO `t_product_profile` VALUES ('272', '174', '1', '红色', '199.00', '100', '0', '2016-10-13 09:09:56', '2016-10-13 09:09:56');
INSERT INTO `t_product_profile` VALUES ('273', '191', '2', '紫色', '199.00', '100', '0', '2016-10-13 09:15:13', '2016-10-13 09:15:13');
INSERT INTO `t_product_profile` VALUES ('274', '196', '1', '红色', '199.00', '100', '0', '2016-10-13 09:15:44', '2016-10-13 09:15:44');
INSERT INTO `t_product_profile` VALUES ('275', '192', '1', '33', '33.00', '33', '0', '2016-11-15 16:58:54', '2016-11-15 16:58:54');
INSERT INTO `t_product_profile` VALUES ('276', '194', '2', 't55', '55.00', '55', '0', '2016-11-15 17:07:14', '2016-11-15 17:02:47');

-- ----------------------------
-- Table structure for t_product_profile_type
-- ----------------------------
DROP TABLE IF EXISTS `t_product_profile_type`;
CREATE TABLE `t_product_profile_type` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_name` varchar(50) NOT NULL COMMENT '套餐类型名称',
  `pt_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1正常，2禁用',
  `pt_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='套餐类型表';

-- ----------------------------
-- Records of t_product_profile_type
-- ----------------------------
INSERT INTO `t_product_profile_type` VALUES ('1', '颜色', '1', '0000-00-00 00:00:00');
INSERT INTO `t_product_profile_type` VALUES ('2', '规格', '1', '0000-00-00 00:00:00');
INSERT INTO `t_product_profile_type` VALUES ('11', '尺寸', '1', '2016-10-11 15:43:03');

-- ----------------------------
-- Table structure for t_quick_memu
-- ----------------------------
DROP TABLE IF EXISTS `t_quick_memu`;
CREATE TABLE `t_quick_memu` (
  `qm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `u_id` int(11) NOT NULL COMMENT '用户ID',
  `m_id` int(11) NOT NULL COMMENT '菜单ID',
  `m_mergeName` text NOT NULL COMMENT '合并名称',
  PRIMARY KEY (`qm_id`),
  KEY `u_id` (`u_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户快捷菜单';

-- ----------------------------
-- Records of t_quick_memu
-- ----------------------------

-- ----------------------------
-- Table structure for t_shopping_cart
-- ----------------------------
DROP TABLE IF EXISTS `t_shopping_cart`;
CREATE TABLE `t_shopping_cart` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL COMMENT '帐号ID',
  `p_id` int(11) NOT NULL,
  `pp_ids` varchar(50) DEFAULT NULL COMMENT '套餐ID',
  `sc_number` int(11) NOT NULL COMMENT '购买数量',
  `sc_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`sc_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='购物车';

-- ----------------------------
-- Records of t_shopping_cart
-- ----------------------------
INSERT INTO `t_shopping_cart` VALUES ('9', '32', '192', '', '4', '2016-10-13 15:14:22');
INSERT INTO `t_shopping_cart` VALUES ('10', '32', '193', '', '1', '2016-10-13 15:14:30');
INSERT INTO `t_shopping_cart` VALUES ('15', '37', '192', '', '1', '2016-11-07 16:13:46');

-- ----------------------------
-- Table structure for t_system_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_system_admin`;
CREATE TABLE `t_system_admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_username` varchar(50) NOT NULL COMMENT '登录帐号',
  `a_password` varchar(100) NOT NULL COMMENT '密码',
  `a_realname` varchar(50) NOT NULL COMMENT '真实姓名',
  `a_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `a_addtime` datetime NOT NULL COMMENT '添加时间',
  `a_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `a_role` tinyint(4) NOT NULL DEFAULT '2' COMMENT '角色：1超级管理员，2普通管理员',
  `a_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：1正常，2禁用',
  `a_openId` varchar(150) DEFAULT NULL COMMENT 'openId',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='系统管理员';

-- ----------------------------
-- Records of t_system_admin
-- ----------------------------
INSERT INTO `t_system_admin` VALUES ('1', 'moxiaobai', 'cc8a15d31a04d375382b2f2b32169193', '任先生', '13509351822', '2016-05-03 21:09:14', '2016-10-10 09:56:01', '1', '1', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk');
INSERT INTO `t_system_admin` VALUES ('16', 'dexinlin', 'cc8a15d31a04d375382b2f2b32169193', '林德新', '13400507914', '2016-07-06 10:08:27', '2016-11-07 09:22:54', '1', '1', 'oBp4Jt5iXvIQC101nKLuuwkSVf_8');
INSERT INTO `t_system_admin` VALUES ('17', 'monyyip', 'cc8a15d31a04d375382b2f2b32169193', '叶财源', '15806026996', '2016-07-07 10:38:18', '2016-11-15 16:56:33', '1', '1', null);
INSERT INTO `t_system_admin` VALUES ('18', 'huibaogd', 'cc8a15d31a04d375382b2f2b32169193', '汇宝国鼎', '15806026997', '2016-07-07 14:24:00', '2016-08-23 10:33:38', '1', '1', null);
INSERT INTO `t_system_admin` VALUES ('19', 'comylife', 'cc8a15d31a04d375382b2f2b32169193', 'mlkom', '13509351821', '2016-08-17 14:10:29', '2016-08-18 09:24:41', '2', '1', null);
INSERT INTO `t_system_admin` VALUES ('24', 'mlkom', 'cc8a15d31a04d375382b2f2b32169193', 'mlkom', '13509375018', '2016-10-10 10:00:04', null, '2', '1', '1');
INSERT INTO `t_system_admin` VALUES ('25', 'test', 'c5bb082a338aad2262149e7abb075704', 'dqwq', '13400507912', '2016-10-10 11:45:32', null, '2', '1', 'ssss');

-- ----------------------------
-- Table structure for t_system_loginLog
-- ----------------------------
DROP TABLE IF EXISTS `t_system_loginLog`;
CREATE TABLE `t_system_loginLog` (
  `ll_id` int(11) NOT NULL AUTO_INCREMENT,
  `ll_aid` int(11) NOT NULL COMMENT '管理员ID',
  `ll_username` varchar(50) NOT NULL COMMENT '登录帐号',
  `ll_realname` varchar(50) NOT NULL,
  `ll_login_ip` bigint(11) NOT NULL COMMENT '登录IP',
  `ll_login_time` datetime NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`ll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8 COMMENT='后台登录日志';

-- ----------------------------
-- Records of t_system_loginLog
-- ----------------------------
INSERT INTO `t_system_loginLog` VALUES ('73', '16', 'dexinlin', '林德新', '3232235893', '2016-08-12 10:12:57');
INSERT INTO `t_system_loginLog` VALUES ('74', '16', 'dexinlin', '林德新', '3232235893', '2016-08-12 14:43:36');
INSERT INTO `t_system_loginLog` VALUES ('75', '17', 'monyyip', '叶财源', '3232235894', '2016-08-12 14:49:36');
INSERT INTO `t_system_loginLog` VALUES ('76', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-12 15:44:28');
INSERT INTO `t_system_loginLog` VALUES ('77', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 10:03:44');
INSERT INTO `t_system_loginLog` VALUES ('78', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 10:54:28');
INSERT INTO `t_system_loginLog` VALUES ('79', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 14:07:08');
INSERT INTO `t_system_loginLog` VALUES ('80', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 14:28:27');
INSERT INTO `t_system_loginLog` VALUES ('81', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 14:28:40');
INSERT INTO `t_system_loginLog` VALUES ('82', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-13 16:53:49');
INSERT INTO `t_system_loginLog` VALUES ('83', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-15 09:06:21');
INSERT INTO `t_system_loginLog` VALUES ('84', '17', 'monyyip', '叶财源', '3232235894', '2016-08-15 10:20:36');
INSERT INTO `t_system_loginLog` VALUES ('85', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-16 09:30:09');
INSERT INTO `t_system_loginLog` VALUES ('86', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-16 11:17:55');
INSERT INTO `t_system_loginLog` VALUES ('87', '1', 'moxiaobai', '任先生1', '3232235882', '2016-08-16 16:46:35');
INSERT INTO `t_system_loginLog` VALUES ('88', '16', 'dexinlin', '林德新1', '3232235893', '2016-08-17 09:19:52');
INSERT INTO `t_system_loginLog` VALUES ('89', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-17 11:17:47');
INSERT INTO `t_system_loginLog` VALUES ('90', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-17 11:45:20');
INSERT INTO `t_system_loginLog` VALUES ('91', '19', 'comylife', 'mlkom', '3232235882', '2016-08-17 14:11:02');
INSERT INTO `t_system_loginLog` VALUES ('92', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-17 14:11:11');
INSERT INTO `t_system_loginLog` VALUES ('93', '16', 'dexinlin', '林德新', '3232235893', '2016-08-17 14:42:20');
INSERT INTO `t_system_loginLog` VALUES ('94', '19', 'comylife', 'mlkom', '3232235882', '2016-08-17 17:57:35');
INSERT INTO `t_system_loginLog` VALUES ('95', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-17 17:57:52');
INSERT INTO `t_system_loginLog` VALUES ('96', '16', 'dexinlin', '林德新', '3232235893', '2016-08-18 09:09:26');
INSERT INTO `t_system_loginLog` VALUES ('97', '19', 'comylife', 'mlkom', '3232235882', '2016-08-18 09:19:10');
INSERT INTO `t_system_loginLog` VALUES ('98', '19', 'comylife', 'mlkom', '3232235882', '2016-08-18 09:24:41');
INSERT INTO `t_system_loginLog` VALUES ('99', '16', 'dexinlin', '林德新', '3232235893', '2016-08-18 09:46:40');
INSERT INTO `t_system_loginLog` VALUES ('100', '20', 'wendyHaw', '何小八', '3232235882', '2016-08-18 11:37:45');
INSERT INTO `t_system_loginLog` VALUES ('101', '17', 'monyyip', '叶财源', '3232235894', '2016-08-18 15:38:32');
INSERT INTO `t_system_loginLog` VALUES ('102', '16', 'dexinlin', '林德新', '3232235893', '2016-08-18 17:46:04');
INSERT INTO `t_system_loginLog` VALUES ('103', '17', 'monyyip', '叶财源', '3232235894', '2016-08-19 09:20:34');
INSERT INTO `t_system_loginLog` VALUES ('104', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-20 11:21:18');
INSERT INTO `t_system_loginLog` VALUES ('105', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-20 14:29:13');
INSERT INTO `t_system_loginLog` VALUES ('106', '16', 'dexinlin', '林德新', '3232235893', '2016-08-20 14:38:37');
INSERT INTO `t_system_loginLog` VALUES ('107', '16', 'dexinlin', '林德新', '3232235893', '2016-08-20 17:56:47');
INSERT INTO `t_system_loginLog` VALUES ('108', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-22 09:41:50');
INSERT INTO `t_system_loginLog` VALUES ('109', '17', 'monyyip', '叶财源', '3232235893', '2016-08-22 10:26:14');
INSERT INTO `t_system_loginLog` VALUES ('110', '16', 'dexinlin', '林德新', '3232235894', '2016-08-22 13:59:53');
INSERT INTO `t_system_loginLog` VALUES ('111', '16', 'dexinlin', '林德新', '3232235894', '2016-08-22 17:42:28');
INSERT INTO `t_system_loginLog` VALUES ('112', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-22 18:16:15');
INSERT INTO `t_system_loginLog` VALUES ('113', '16', 'dexinlin', '林德新', '3232235894', '2016-08-23 10:27:26');
INSERT INTO `t_system_loginLog` VALUES ('114', '18', 'huibaogd', '汇宝国鼎', '3232235894', '2016-08-23 10:33:38');
INSERT INTO `t_system_loginLog` VALUES ('115', '16', 'dexinlin', '林德新', '3232235894', '2016-08-23 15:03:52');
INSERT INTO `t_system_loginLog` VALUES ('116', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-24 10:35:51');
INSERT INTO `t_system_loginLog` VALUES ('117', '16', 'dexinlin', '林德新', '3232235894', '2016-08-26 10:00:20');
INSERT INTO `t_system_loginLog` VALUES ('118', '16', 'dexinlin', '林德新', '3232235893', '2016-08-29 09:05:08');
INSERT INTO `t_system_loginLog` VALUES ('119', '1', 'moxiaobai', '任先生', '3232235882', '2016-08-29 09:39:05');
INSERT INTO `t_system_loginLog` VALUES ('120', '16', 'dexinlin', '林德新', '3232235893', '2016-09-01 15:31:01');
INSERT INTO `t_system_loginLog` VALUES ('121', '1', 'moxiaobai', '任先生', '3232235882', '2016-09-01 17:36:34');
INSERT INTO `t_system_loginLog` VALUES ('122', '16', 'dexinlin', '林德新', '3232235893', '2016-09-05 10:48:30');
INSERT INTO `t_system_loginLog` VALUES ('123', '1', 'moxiaobai', '任先生', '3232235882', '2016-09-06 15:35:12');
INSERT INTO `t_system_loginLog` VALUES ('124', '16', 'dexinlin', '林德新', '3232235893', '2016-09-06 15:54:39');
INSERT INTO `t_system_loginLog` VALUES ('125', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:00:39');
INSERT INTO `t_system_loginLog` VALUES ('126', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:06:57');
INSERT INTO `t_system_loginLog` VALUES ('127', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:15:59');
INSERT INTO `t_system_loginLog` VALUES ('128', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:41:22');
INSERT INTO `t_system_loginLog` VALUES ('129', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:44:41');
INSERT INTO `t_system_loginLog` VALUES ('130', '16', 'dexinlin', '林德新', '3232235893', '2016-09-07 11:45:51');
INSERT INTO `t_system_loginLog` VALUES ('131', '1', 'moxiaobai', '任先生', '3232235882', '2016-09-07 14:34:16');
INSERT INTO `t_system_loginLog` VALUES ('132', '1', 'moxiaobai', '任先生', '3232235882', '2016-09-23 09:56:44');
INSERT INTO `t_system_loginLog` VALUES ('133', '1', 'moxiaobai', '任先生', '3232235882', '2016-09-23 10:19:26');
INSERT INTO `t_system_loginLog` VALUES ('134', '17', 'monyyip', '叶财源222', '3232235889', '2016-09-23 10:30:03');
INSERT INTO `t_system_loginLog` VALUES ('135', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 11:30:20');
INSERT INTO `t_system_loginLog` VALUES ('136', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 11:33:14');
INSERT INTO `t_system_loginLog` VALUES ('137', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 11:40:12');
INSERT INTO `t_system_loginLog` VALUES ('138', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 11:41:39');
INSERT INTO `t_system_loginLog` VALUES ('139', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 11:44:36');
INSERT INTO `t_system_loginLog` VALUES ('140', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 14:30:33');
INSERT INTO `t_system_loginLog` VALUES ('141', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 14:32:38');
INSERT INTO `t_system_loginLog` VALUES ('142', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 16:21:20');
INSERT INTO `t_system_loginLog` VALUES ('143', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 16:44:30');
INSERT INTO `t_system_loginLog` VALUES ('144', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 16:47:40');
INSERT INTO `t_system_loginLog` VALUES ('145', '17', 'monyyip', '叶财源', '3232235889', '2016-09-23 17:27:17');
INSERT INTO `t_system_loginLog` VALUES ('146', '17', 'monyyip', '叶财源', '3232235889', '2016-09-26 09:19:24');
INSERT INTO `t_system_loginLog` VALUES ('147', '16', 'dexinlin', '林德新', '3232235893', '2016-09-26 09:47:09');
INSERT INTO `t_system_loginLog` VALUES ('148', '16', 'dexinlin', '林德新', '3232235893', '2016-09-26 11:12:56');
INSERT INTO `t_system_loginLog` VALUES ('149', '16', 'dexinlin', '林德新', '3232235893', '2016-09-27 09:18:47');
INSERT INTO `t_system_loginLog` VALUES ('150', '16', 'dexinlin', '林德新', '3232235893', '2016-09-27 11:08:16');
INSERT INTO `t_system_loginLog` VALUES ('151', '16', 'dexinlin', '林德新', '3232235893', '2016-09-27 11:15:52');
INSERT INTO `t_system_loginLog` VALUES ('152', '16', 'dexinlin', '林德新', '3232235893', '2016-09-27 11:26:10');
INSERT INTO `t_system_loginLog` VALUES ('153', '16', 'dexinlin', '林德新', '3232235893', '2016-09-27 11:26:52');
INSERT INTO `t_system_loginLog` VALUES ('154', '16', 'dexinlin', '林德新', '3232235889', '2016-09-29 09:02:32');
INSERT INTO `t_system_loginLog` VALUES ('155', '17', 'monyyip', '叶财源', '3232235893', '2016-09-29 10:04:35');
INSERT INTO `t_system_loginLog` VALUES ('156', '17', 'monyyip', '叶财源', '3232235893', '2016-09-30 09:56:30');
INSERT INTO `t_system_loginLog` VALUES ('157', '17', 'monyyip', '叶财源', '3232235893', '2016-09-30 15:36:24');
INSERT INTO `t_system_loginLog` VALUES ('158', '16', 'dexinlin', '林德新', '3232235889', '2016-10-08 09:16:17');
INSERT INTO `t_system_loginLog` VALUES ('159', '17', 'monyyip', '叶财源', '3232235893', '2016-10-09 10:00:54');
INSERT INTO `t_system_loginLog` VALUES ('160', '1', 'moxiaobai', '任先生', '3232235807', '2016-10-10 09:56:01');
INSERT INTO `t_system_loginLog` VALUES ('161', '17', 'monyyip', '叶财源', '3232235893', '2016-10-10 10:33:40');
INSERT INTO `t_system_loginLog` VALUES ('162', '16', 'dexinlin', '林德新', '3232235889', '2016-10-10 16:10:00');
INSERT INTO `t_system_loginLog` VALUES ('163', '16', 'dexinlin', '林德新', '3232235889', '2016-10-10 16:21:16');
INSERT INTO `t_system_loginLog` VALUES ('164', '16', 'dexinlin', '林德新', '3232235889', '2016-10-11 11:00:11');
INSERT INTO `t_system_loginLog` VALUES ('165', '16', 'dexinlin', '林德新', '3232235889', '2016-10-12 08:45:42');
INSERT INTO `t_system_loginLog` VALUES ('166', '16', 'dexinlin', '林德新', '3232235889', '2016-10-12 14:19:13');
INSERT INTO `t_system_loginLog` VALUES ('167', '16', 'dexinlin', '林德新', '3232235889', '2016-10-14 09:12:02');
INSERT INTO `t_system_loginLog` VALUES ('168', '17', 'monyyip', '叶财源', '3232235893', '2016-10-14 10:02:16');
INSERT INTO `t_system_loginLog` VALUES ('169', '17', 'monyyip', '叶财源', '3232235893', '2016-10-14 10:02:59');
INSERT INTO `t_system_loginLog` VALUES ('170', '16', 'dexinlin', '林德新', '3232235893', '2016-10-17 08:43:11');
INSERT INTO `t_system_loginLog` VALUES ('171', '17', 'monyyip', '叶财源', '3232235889', '2016-10-17 10:12:29');
INSERT INTO `t_system_loginLog` VALUES ('172', '16', 'dexinlin', '林德新', '3232235893', '2016-10-19 09:06:45');
INSERT INTO `t_system_loginLog` VALUES ('173', '17', 'monyyip', '叶财源', '3232235889', '2016-10-20 15:11:28');
INSERT INTO `t_system_loginLog` VALUES ('174', '16', 'dexinlin', '林德新', '3232235893', '2016-10-24 16:50:54');
INSERT INTO `t_system_loginLog` VALUES ('175', '16', 'dexinlin', '林德新', '3232235896', '2016-11-07 09:22:54');
INSERT INTO `t_system_loginLog` VALUES ('176', '17', 'monyyip', '叶财源', '3232235893', '2016-11-15 16:56:33');

-- ----------------------------
-- Table structure for t_system_menus
-- ----------------------------
DROP TABLE IF EXISTS `t_system_menus`;
CREATE TABLE `t_system_menus` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_parent_id` int(11) NOT NULL COMMENT '父菜单ID',
  `m_name` varchar(50) NOT NULL COMMENT '菜单名称',
  `m_url` varchar(50) NOT NULL DEFAULT '#' COMMENT '菜单url 地址',
  `m_tag` varchar(50) DEFAULT NULL,
  `m_memo` text COMMENT '帮助',
  `m_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '菜单状态 1代表正常,2代表禁用',
  `m_addtime` datetime NOT NULL,
  `m_order` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `m_module_name` varchar(50) NOT NULL COMMENT '模块名称',
  `m_controller_name` varchar(50) NOT NULL COMMENT '控制器名称',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='后台菜单';

-- ----------------------------
-- Records of t_system_menus
-- ----------------------------
INSERT INTO `t_system_menus` VALUES ('1', '0', '系统菜单', '#Main-Nav-System', 'Main-Nav-System', '', '1', '2016-09-26 12:01:33', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('2', '1', '系统管理', '#Main-Nav-System-menu', 'Main-Nav-System-menu', null, '1', '2016-09-23 18:02:06', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('3', '2', '菜单管理', '/admin/menu/index', 'adminmenuindex', null, '1', '2016-09-23 18:02:47', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('47', '1', '商品管理', '#Main-Nav-Product', 'Main-Nav-Product', '', '1', '2016-09-26 09:51:39', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('48', '47', '商品管理', '/admin/product/index', 'adminproductindex', '', '1', '2016-09-26 10:03:12', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('49', '47', '商品分类管理', '/admin/category/index', 'admincategoryindex', '', '1', '2016-09-26 10:02:59', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('50', '47', '限时折扣管理', '/admin/discount/index', 'admindiscountindex', '', '1', '2016-09-26 10:03:26', '4', '', '');
INSERT INTO `t_system_menus` VALUES ('51', '1', '订单管理', '#Main-Nav-Order', 'Main-Nav-Order', '', '1', '2016-09-26 09:53:47', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('52', '1', '会员管理', '#Main-Nav-Member', 'Main-Nav-Member', '', '1', '2016-09-26 09:54:42', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('53', '51', '订单管理', '/admin/order/index', 'adminorderindex', '', '1', '2016-09-26 09:54:17', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('54', '1', '广告管理', '#Main-Nav-Grop', 'Main-Nav-Grop', '', '1', '2016-09-26 09:55:16', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('55', '1', '店铺管理', '#Main-Nav-Right', 'Main-Nav-Right', '', '2', '2016-09-26 09:57:00', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('56', '1', '文章管理', '#Main-Nav-Article', 'Main-Nav-Article', '', '1', '2016-09-26 09:57:20', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('57', '1', '微信公众号管理', '#Main-Nav-Weixin', 'Main-Nav-Weixin', '', '1', '2016-09-26 09:57:52', '5', '', '');
INSERT INTO `t_system_menus` VALUES ('58', '52', '会员管理', '/admin/member/index', 'AdminMemberIndex', '', '1', '2016-09-29 16:36:27', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('59', '52', '收货地址', '/admin/address/index', 'AdminAddressIndex', '', '2', '2016-09-26 11:12:36', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('60', '47', '商品套餐分类管理', '/admin/profiletype/index', 'adminprofiletypeindex', '', '1', '2016-09-26 10:03:19', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('61', '2', '权限管理', '/admin/right/index', 'adminrightindex', '', '1', '2016-09-27 09:40:52', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('63', '54', '广告列表', '/admin/ads/index', 'AdminAdsIndex', '', '1', '2016-09-26 15:50:30', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('64', '54', '广告组管理', '/admin/adsgroup/index', 'AdminAdsgroupIndex', '', '1', '2016-09-26 15:50:45', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('65', '0', '', '', '', '', '2', '2016-09-26 16:47:53', '0', '', '');
INSERT INTO `t_system_menus` VALUES ('66', '1', 'test', 'test', 'test', '', '2', '2016-09-27 09:19:46', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('67', '2', '管理员管理', '/admin/user/index', 'adminuserindex', '', '1', '2016-09-27 09:40:46', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('68', '2', '登陆日志管理', '/admin/log/index', 'AdminLogIndex', '', '1', '2016-09-27 14:03:51', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('69', '56', '文章管理', '/admin/news/index', 'AdminNewsIndex', '', '1', '2016-09-27 15:24:38', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('70', '56', '文章分类管理', '/admin/newscategory/index', 'AdminNewscategoryIndex', '', '1', '2016-09-27 15:25:07', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('71', '57', '公众号配置', '/admin/weixinconfig/index', 'AdminWeixinconfigIndex', '', '1', '2016-09-27 17:01:16', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('72', '57', '微信菜单管理', '/admin/weixinmenu/index', 'AdminWeixinmenuIndex', '', '1', '2016-09-29 10:08:20', '2', '', '');
INSERT INTO `t_system_menus` VALUES ('73', '57', '微信关键字回复管理', '/admin/weixinkeywords/index', 'AdminWeixinkeywordsIndex', '', '1', '2016-09-29 10:41:28', '3', '', '');
INSERT INTO `t_system_menus` VALUES ('74', '57', '关注回复管理', '/admin/weixinsubscribe/index', 'AdminWeixinsubscribeIndex', '', '1', '2016-09-29 14:41:52', '4', '', '');
INSERT INTO `t_system_menus` VALUES ('75', '1', '支付管理', '#Main-Nav-Payment', 'Main-Nav-Payment', '', '1', '2016-09-29 15:27:59', '4', '', '');
INSERT INTO `t_system_menus` VALUES ('76', '75', '支付明细', '/admin/payment/index', 'adminpaymentindex', '', '1', '2016-09-29 15:28:37', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('77', '2', '三级菜单', 'dege', 'dege', '', '2', '2016-10-11 11:15:21', '1', '', '');
INSERT INTO `t_system_menus` VALUES ('78', '1', '测试123', '123', '123', '', '2', '2016-10-12 14:44:21', '2', '12312', '');
INSERT INTO `t_system_menus` VALUES ('79', '1', '123', '12312', '123123fd', '', '2', '2016-10-12 14:47:51', '123', '12312', '123123');

-- ----------------------------
-- Table structure for t_system_right
-- ----------------------------
DROP TABLE IF EXISTS `t_system_right`;
CREATE TABLE `t_system_right` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `m_ids` text NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='后台权限表';

-- ----------------------------
-- Records of t_system_right
-- ----------------------------
INSERT INTO `t_system_right` VALUES ('50', '19', '3,68,67,61,58,63,64,49,48,60,50,53,69,70,76,71,72,73,74');
INSERT INTO `t_system_right` VALUES ('51', '18', '3,68,67,61,58,63,64,49,48,60,50,53,69,70,76,71,72,73,74');
INSERT INTO `t_system_right` VALUES ('52', '20', '3,68,67,61,58,63,64,49,48,60,50,53,69,70,76,71,72,73,74');
INSERT INTO `t_system_right` VALUES ('53', '17', '3,68,67,61,58,63,64,49,60,50,53,69,70,76,71,72,73,74');

-- ----------------------------
-- Table structure for t_weixin_config
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_config`;
CREATE TABLE `t_weixin_config` (
  `wc_id` int(11) NOT NULL AUTO_INCREMENT,
  `wc_appid` varchar(50) NOT NULL COMMENT '微信appid',
  `wc_appsecret` varchar(100) NOT NULL COMMENT '微信appsecret',
  `wc_apptoken` varchar(100) NOT NULL COMMENT '微信token',
  `wc_mch_id` varchar(50) DEFAULT NULL COMMENT '支付密钥',
  `wc_pay_key` varchar(100) DEFAULT NULL COMMENT '商户支付密钥',
  `wc_sslcert_path` varchar(150) DEFAULT NULL COMMENT '证书路径',
  `wc_sslkey_path` varchar(150) DEFAULT NULL COMMENT '证书路径',
  `wc_addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`wc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='微信公众号配置';

-- ----------------------------
-- Records of t_weixin_config
-- ----------------------------
INSERT INTO `t_weixin_config` VALUES ('1', 'wx8712e046ea408c74', 'b7a9d6977258052729fe4bb25d3844d4', 'xJ4EPvdb7Pk8bm85y8JN', '1406189802', 'QPpVrSIvh8EHMYaDviPftzBhbkCL46ks', 'public/cert/apiclient_cert.pem', 'public/cert/apiclient_key.pem', null);

-- ----------------------------
-- Table structure for t_weixin_keywords
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_keywords`;
CREATE TABLE `t_weixin_keywords` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_title` varchar(255) DEFAULT NULL COMMENT '标题',
  `k_keys` varchar(255) DEFAULT NULL COMMENT '关键字',
  `k_type` varchar(255) DEFAULT NULL COMMENT '关键字类型',
  `k_content` text,
  `k_url` varchar(255) DEFAULT NULL COMMENT '跳转链接',
  `k_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `addtime` datetime DEFAULT NULL,
  `k_status` tinyint(1) DEFAULT '1' COMMENT '状态（-1禁用，1为启用）',
  PRIMARY KEY (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='微信关键字回复';

-- ----------------------------
-- Records of t_weixin_keywords
-- ----------------------------
INSERT INTO `t_weixin_keywords` VALUES ('14', '与可口米饭的相遇', '23', 'news', '<p>当一份历经春、夏、秋三季的大米来到你的面前，请不要辜负它。和爱的人，好好吃上一顿饭。</p>', 'http://mp.weixin.qq.com/s?__biz=MzIxMzE4MDU4Mw==&mid=403004953&idx=1&sn=5a4ddd0abb4a163c78c140195b2a70bd#rd', 'weixin/20160929/5d845f4f-97a8-47d3-9a8a-9860bc8f3b54.png', '2016-03-29 17:55:38', '-1');
INSERT INTO `t_weixin_keywords` VALUES ('15', '可米生活智慧社区综合服务平台，改变你的生活', '1', 'news', '我们致力于为社区居民提供高效便捷的品质生活服务。', 'http://property.comylife.com/guide/about', 'weixin/20160329/6b52f4bb-8a07-4c02-ba89-06f87195ed44.jpg', '2016-03-29 17:56:39', '-1');
INSERT INTO `t_weixin_keywords` VALUES ('16', '可米生活 为你放价', '3', 'news', '可米君来美伦浩洋丽都送福利啦！', 'http://property.comylife.com/event/firstpush/index', 'weixin/20160421/b81c9133-bd67-4f5f-9fae-d22cfbec91ea.jpg', '2016-04-21 10:15:51', '1');
INSERT INTO `t_weixin_keywords` VALUES ('17', '可米生活微信公众平台内测开放', '上可米有生活', 'news', '5月17日，可米生活综合服务平台开启内测，乐趣生活抢先体验！', 'http://property.comylife.com/home/index/', 'weixin/20160513/4e2d47d2-8ee0-4cc1-b0f5-7501de89338d.png', '2016-05-13 10:34:45', '-1');
INSERT INTO `t_weixin_keywords` VALUES ('18', '免费住 | 这一晚，住在全球最大房车院子里，看星辰大海', '房车', 'text', '报名已经截至咯~\n可以点击这里回顾活动详情<a href=\"http://mp.weixin.qq.com/s?__biz=MzIxMzE4MDU4Mw==&mid=2651615269&idx=1&sn=7ac63291d9a6deff85cd32abf64b9dc4#rd \">免费住 | 这一晚，住在全球最大房车院子里，看星辰大海</a>\n敬请期待晚上九点的开奖活动吧~', '', 'weixin/20160705/16fcc6ad-a64f-496e-8727-35072a001e3e.jpg', '2016-07-05 17:35:22', '1');
INSERT INTO `t_weixin_keywords` VALUES ('19', 'wonderful', 'wonderful', 'text', '<a href=\"http://m.baidu.com\">wonderful</a>', '', null, '2016-07-05 17:35:52', '-1');
INSERT INTO `t_weixin_keywords` VALUES ('20', '免费吃｜老板没有跑，公司没有倒，就想送你5斤大葡萄', '我要吃葡萄', 'text', '<a href=\"http://mp.weixin.qq.com/s?__biz=MzIxMzE4MDU4Mw==&mid=2651615321&idx=1&sn=36258e3a7462ae11b68e4ca341c80767&scene=0#wechat_redirect\n\">免费吃｜老板没有跑，公司没有倒，就想送你5斤大葡萄</a>活动报名已截止，点击蓝字可回顾活动详情。下一波活动马上来，敬请期待！\n\n', '', null, '2016-07-15 17:23:01', '1');
INSERT INTO `t_weixin_keywords` VALUES ('21', '关爱单身狗 七夕送口粮', '我是单身', 'text', '我知道你是单身啦！\n\n活动<a href=\"http://mp.weixin.qq.com/s?__biz=MzIxMzE4MDU4Mw==&mid=2651615392&idx=1&sn=a5eb34e8618e7e60b0c4756cbb052ccd#rd\">免费送 | 关爱单身狗，七夕送口粮</a>已结束，点击蓝字回顾活动详情~\n\n下一波活动马上就来喔！敬请期待！', '', null, '2016-08-01 14:37:52', '1');
INSERT INTO `t_weixin_keywords` VALUES ('22', 'fdas', '33', 'news', '什么是什么', '33', 'weixin/20160818/a4807ff8-8d0b-4f56-8bce-c9b27acf4a62.jpg', '2016-08-15 15:38:08', '-1');
INSERT INTO `t_weixin_keywords` VALUES ('23', '的安慰', '张三', 'news', '<p>请问权威<br/></p>', 'asdasdas', 'weixin/20161011/6e66a287-840d-45f4-9a12-6501d7dc09b8.jpg', '2016-10-11 14:33:57', '1');

-- ----------------------------
-- Table structure for t_weixin_log
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_log`;
CREATE TABLE `t_weixin_log` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_openId` varchar(50) NOT NULL COMMENT 'OpenId',
  `cl_type` varchar(10) NOT NULL COMMENT '消息类型',
  `cl_data` text NOT NULL,
  `cl_datetime` datetime NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信通讯日志';

-- ----------------------------
-- Records of t_weixin_log
-- ----------------------------

-- ----------------------------
-- Table structure for t_weixin_menu
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_menu`;
CREATE TABLE `t_weixin_menu` (
  `wm_id` int(11) NOT NULL AUTO_INCREMENT,
  `wm_pid` int(11) NOT NULL DEFAULT '0',
  `wm_type` varchar(100) DEFAULT NULL COMMENT '菜单事件',
  `wm_key` varchar(100) DEFAULT NULL COMMENT '菜单key',
  `wm_name` varchar(50) NOT NULL COMMENT '菜单名称',
  `wm_status` tinyint(1) DEFAULT '1' COMMENT '1为正常2为禁用',
  `wm_sort` int(11) DEFAULT NULL,
  `wm_addtime` datetime NOT NULL,
  PRIMARY KEY (`wm_id`),
  KEY `wm_pid` (`wm_pid`),
  KEY `wm_sort` (`wm_sort`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='微信菜单';

-- ----------------------------
-- Records of t_weixin_menu
-- ----------------------------
INSERT INTO `t_weixin_menu` VALUES ('1', '0', 'view', 'http://vips.visp.info/', '贵族养生233', '1', '1', '2016-08-17 15:04:49');
INSERT INTO `t_weixin_menu` VALUES ('2', '0', '', '', '使用指南', '1', '2', '0000-00-00 00:00:00');
INSERT INTO `t_weixin_menu` VALUES ('3', '0', '', '', '会员中心', '1', '3', '0000-00-00 00:00:00');
INSERT INTO `t_weixin_menu` VALUES ('4', '3', 'click', 'myQrcode', '我的二维码', '1', '3', '2016-08-17 15:33:32');
INSERT INTO `t_weixin_menu` VALUES ('5', '1', 'view', 'http://m.comylife.com', '当季热卖', '2', '1', '0000-00-00 00:00:00');
INSERT INTO `t_weixin_menu` VALUES ('6', '1', 'view', 'http://www.visp.top/m/new.php?id=82', '招商合作', '2', '2', '2016-08-17 17:05:52');
INSERT INTO `t_weixin_menu` VALUES ('7', '3', 'view', 'http://vips.visp.info/mall/order/index/', '订单查询', '1', '1', '2016-08-24 10:54:11');
INSERT INTO `t_weixin_menu` VALUES ('8', '3', 'view', 'http://vips.visp.info/member/member/index/', '会员中心', '1', '2', '2016-08-24 10:54:34');
INSERT INTO `t_weixin_menu` VALUES ('9', '2', 'view', 'http://www.visp.top/purtier/', '产品介绍', '1', '1', '2016-08-24 10:57:09');
INSERT INTO `t_weixin_menu` VALUES ('10', '2', 'view', 'http://vips.visp.info/mall/news/index', '上善资讯', '1', '2', '2016-08-24 10:58:03');
INSERT INTO `t_weixin_menu` VALUES ('11', '0', 'click', 'dege/index', '测试菜单', '1', '1', '2016-09-29 10:30:49');

-- ----------------------------
-- Table structure for t_weixin_message
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_message`;
CREATE TABLE `t_weixin_message` (
  `wm_id` int(11) NOT NULL AUTO_INCREMENT,
  `wm_key` varchar(30) NOT NULL COMMENT '键值',
  `wm_title` varchar(100) NOT NULL COMMENT '标题',
  `wm_content` varchar(255) NOT NULL COMMENT '模板内容',
  `wm_memo` varchar(255) DEFAULT NULL COMMENT '说明',
  `wm_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为正常2为禁用',
  `wm_addtime` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`wm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='微信客服消息';

-- ----------------------------
-- Records of t_weixin_message
-- ----------------------------
INSERT INTO `t_weixin_message` VALUES ('1', 'subscribe_notice', '关注通知', '恭喜您由公众号：【上善网络】推荐成为上善网络的第【{mid}】会员！', null, '1', '0000-00-00 00:00:00');
INSERT INTO `t_weixin_message` VALUES ('2', 'subscribe_scan_notice', '扫码关注通知', '欢迎【{nickname}】关注上善网络公众号，如果没有购买成为会员，请购买成为会员，创建属于您的上善网络家族!', null, '1', '0000-00-00 00:00:00');
INSERT INTO `t_weixin_message` VALUES ('3', 'purchase_order_notice', '购买下单通知', '您的一级代言人【{nickname}】在{datetime}下单，订单号为：{orderNo}；订单金额为：{money}元；您将获得的提成为：{award}元。', null, '1', '2016-08-18 16:02:05');
INSERT INTO `t_weixin_message` VALUES ('4', 'cancle_order_notice', '取消订单通知', '您的一级代言人【{nickname}】在{datetime}取消定单，订单号为：{orderNo}。', null, '1', '2016-08-18 16:04:16');
INSERT INTO `t_weixin_message` VALUES ('5', 'confirm_order_notice', '确认订单通知', '您的一级代言人【{nickname}】在{datetime}确认收货，订单号为：{orderNo}；订单金额为：{money}元；您将获得的提成为：{award}元。', null, '1', '2016-08-18 16:05:10');
INSERT INTO `t_weixin_message` VALUES ('6', 'deliver_goods_notice', '发货通知', '您购买的商品{title}已经发货，订单号为{orderNo}。', null, '1', '2016-08-18 16:08:05');
INSERT INTO `t_weixin_message` VALUES ('7', 'express_notice', '快递发送通知', '您购买的商品{title}快递已发件，快递公司为: {company},快递单号:{number}', null, '1', '2016-08-18 16:09:19');
INSERT INTO `t_weixin_message` VALUES ('8', 'become_promoter_notice', '成为推广人通知', '【{nickname}】通过二维码关注了本公众号，成为了您的一级上善网络家族成员!', null, '1', '2016-08-18 16:28:44');
INSERT INTO `t_weixin_message` VALUES ('9', 'payment_order_notice', '成功支付订单', '您的一级代言人【{nickname}】在{datetime}支付订单，订单号为：{orderNo}；订单金额为：{money}元；您将获得的提成为：{award}元。', null, '1', '2016-08-20 11:22:24');

-- ----------------------------
-- Table structure for t_weixin_queue
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_queue`;
CREATE TABLE `t_weixin_queue` (
  `wq_id` int(11) NOT NULL AUTO_INCREMENT,
  `wq_openId` varchar(150) NOT NULL COMMENT 'Open_ID',
  `wq_key` varchar(100) NOT NULL COMMENT '键值',
  `wq_data` text NOT NULL COMMENT '发送的数据',
  `wq_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态:1未处理，2已经处理',
  `wq_addtime` datetime NOT NULL COMMENT '添加时间',
  `wq_updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`wq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='微信客服消息队列';

-- ----------------------------
-- Records of t_weixin_queue
-- ----------------------------
INSERT INTO `t_weixin_queue` VALUES ('7', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'purchase_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:05:44\",\"orderNo\":\"201608251505445508\",\"money\":27500,\"award\":825}', '2', '2016-08-25 15:05:44', '2016-08-25 15:27:21');
INSERT INTO `t_weixin_queue` VALUES ('9', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'purchase_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:08:02\",\"orderNo\":\"201608251508014931\",\"money\":27500,\"award\":825}', '2', '2016-08-25 15:08:02', '2016-08-25 15:27:56');
INSERT INTO `t_weixin_queue` VALUES ('10', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'payment_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:08:09\",\"orderNo\":\"201608251508014931\",\"money\":\"27500.00\",\"award\":\"825.00\"}', '1', '2016-08-25 15:08:09', null);
INSERT INTO `t_weixin_queue` VALUES ('11', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'confirm_order_notice', '{\"nickname\":\"monyyip\",\"datetime\":\"2016-08-25 15:08:31\",\"orderNo\":\"201608251508014931\",\"money\":\"27500.00\",\"award\":\"825.00\"}', '1', '2016-08-25 15:08:31', null);
INSERT INTO `t_weixin_queue` VALUES ('12', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'purchase_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:09:34\",\"orderNo\":\"201608251509349205\",\"money\":27500,\"award\":825}', '1', '2016-08-25 15:09:34', null);
INSERT INTO `t_weixin_queue` VALUES ('13', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'cancle_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:09:47\",\"orderNo\":\"201608251509349205\"}', '1', '2016-08-25 15:09:47', null);
INSERT INTO `t_weixin_queue` VALUES ('14', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'purchase_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:09:57\",\"orderNo\":\"201608251509562665\",\"money\":27500,\"award\":825}', '1', '2016-08-25 15:09:57', null);
INSERT INTO `t_weixin_queue` VALUES ('15', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'payment_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:10:02\",\"orderNo\":\"201608251509562665\",\"money\":\"27500.00\",\"award\":\"825.00\"}', '1', '2016-08-25 15:10:02', null);
INSERT INTO `t_weixin_queue` VALUES ('16', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'confirm_order_notice', '{\"nickname\":\"\\u83ab\\u5c0f\\u767d\",\"datetime\":\"2016-08-25 15:10:10\",\"orderNo\":\"201608251509562665\",\"money\":\"27500.00\",\"award\":\"825.00\"}', '1', '2016-08-25 15:10:10', null);
INSERT INTO `t_weixin_queue` VALUES ('17', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'express_notice', '{\"title\":\"\\u3010\\u4e0a\\u5584\\u82e5\\u6c34\\u3011 \\u7535\\u89e3\\u8fd8\\u539f\\u6c34\\u673a-\\u9876\\u7ea7\\u4ea7\\u54c1\\u503c\\u5f97\\u4fe1\\u8d56\",\"company\":\"\\u7533\\u901a\\u5feb\\u9012\",\"number\":\"3313253705855\"}', '1', '2016-09-01 15:35:25', null);
INSERT INTO `t_weixin_queue` VALUES ('18', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'deliver_goods_notice', '{\"title\":\"\\u3010\\u4e0a\\u5584\\u82e5\\u6c34\\u3011 \\u7535\\u89e3\\u8fd8\\u539f\\u6c34\\u673a-\\u9876\\u7ea7\\u4ea7\\u54c1\\u503c\\u5f97\\u4fe1\\u8d56\",\"orderNo\":\"201608251505445508\"}', '1', '2016-09-01 15:35:34', null);
INSERT INTO `t_weixin_queue` VALUES ('19', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'express_notice', '{\"title\":\"\\u3010\\u4e0a\\u5584\\u82e5\\u6c34\\u3011 \\u7535\\u89e3\\u8fd8\\u539f\\u6c34\\u673a-\\u9876\\u7ea7\\u4ea7\\u54c1\\u503c\\u5f97\\u4fe1\\u8d56\",\"company\":\"\\u987a\\u4e30\\u5feb\\u9012\",\"number\":\"3313253705855\"}', '1', '2016-09-01 15:41:30', null);
INSERT INTO `t_weixin_queue` VALUES ('20', 'oBp4Jt0jr95a3XzWJci7BKK-sHOk', 'deliver_goods_notice', '{\"title\":\"\\u3010\\u4e0a\\u5584\\u82e5\\u6c34\\u3011 \\u7535\\u89e3\\u8fd8\\u539f\\u6c34\\u673a-\\u9876\\u7ea7\\u4ea7\\u54c1\\u503c\\u5f97\\u4fe1\\u8d56\",\"orderNo\":\"201608251457420579\"}', '1', '2016-09-01 16:36:20', null);

-- ----------------------------
-- Table structure for t_weixin_subscribe
-- ----------------------------
DROP TABLE IF EXISTS `t_weixin_subscribe`;
CREATE TABLE `t_weixin_subscribe` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_cate` tinyint(1) DEFAULT NULL,
  `s_title` varchar(255) DEFAULT NULL COMMENT '标题',
  `s_type` varchar(255) DEFAULT NULL COMMENT '关键字类型',
  `s_content` text,
  `s_url` varchar(255) DEFAULT NULL COMMENT '跳转链接',
  `s_beginTime` datetime DEFAULT NULL COMMENT '开始时间',
  `s_endTime` datetime DEFAULT NULL COMMENT '结束时间',
  `s_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `addtime` datetime DEFAULT NULL,
  `s_status` tinyint(1) DEFAULT '1' COMMENT '状态（-1禁用，1为启用）',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='微信关注回复';

-- ----------------------------
-- Records of t_weixin_subscribe
-- ----------------------------
INSERT INTO `t_weixin_subscribe` VALUES ('14', '1', '', 'text', '感谢您关注“可米生活”智慧社区综合服务平台！\n足不出户享受便捷物业服务，还能在线购买可米君为您精选的商品和旅游线路。\n123\n上可米，有生活！2\n', '', '2016-03-30 09:55:00', '2016-03-30 09:55:00', '', '2016-03-30 10:00:35', '1');
INSERT INTO `t_weixin_subscribe` VALUES ('15', '2', '上线预告', 'text', '亲爱的业主：\n感谢您长期以来对我们物业工作的支持和配合，\n为了更好地为大家提供服务，创造更好的生活，\n我们联合可米生活共同推出智慧社区综合服务平台。\n我们将于4月1日正式亮相，届时也将为大家送上见面礼！\n要等我喔~~~\n\n回复【1】我会告诉你平台有哪些服务\n回复【2】我会偷偷告诉你见面礼是什么', 'http://pms.comylife.com', '2016-03-23 10:00:00', '2016-04-01 00:00:00', 'weixin/20160330/02d79bd7-6e92-4706-8ad4-142b1f0802bd.jpg', '2016-03-30 10:02:51', '1');
INSERT INTO `t_weixin_subscribe` VALUES ('16', '2', '', 'news', '[{\"s_title\":\"\\u53ef\\u7c73\\u751f\\u6d3b\\u667a\\u6167\\u793e\\u533a\\u7efc\\u5408\\u670d\\u52a1\\u5e73\\u53f0\\uff0c\\u6539\\u53d8\\u4f60\\u7684\\u751f\\u6d3b\",\"s_url\":\"http:\\/\\/property.comylife.com\\/guide\\/about\",\"s_thumb\":\"weixin\\/20160818\\/2cb4c181-5b33-4112-9e82-fceca8da38c2.jpg\",\"s_order\":\"1\"},{\"s_title\":\"\\u4e0e\\u53ef\\u53e3\\u7c73\\u996d\\u7684\\u76f8\\u9047\",\"s_url\":\"http:\\/\\/mp.weixin.qq.com\\/s?__biz=MzIxMzE4MDU4Mw==&mid=403004953&idx=1&sn=5a4ddd0abb4a163c78c140195b2a70bd#rd\",\"s_thumb\":\"weixin\\/20160818\\/263e1abb-49c0-45d0-988f-467e461d781c.jpg\",\"s_order\":\"2\"}]', '', '2016-04-07 09:30:00', '2016-04-07 09:40:00', '', '2016-04-06 11:35:00', '-1');
INSERT INTO `t_weixin_subscribe` VALUES ('17', '2', '', 'news', '[{\"s_title\":\"\\u53ef\\u7c73\\u751f\\u6d3b \\u4e3a\\u4f60\\u653e\\u4ef7\",\"s_url\":\"http:\\/\\/property.comylife.com\\/event\\/firstpush\\/index\",\"s_thumb\":\"weixin\\/20160818\\/b30fbd27-e529-4283-bad2-a87a01980535.png\",\"s_order\":\"1\"},{\"s_title\":\"\\u53ef\\u7c73\\u751f\\u6d3b\\u667a\\u6167\\u793e\\u533a\\u7efc\\u5408\\u670d\\u52a1\\u5e73\\u53f0\\uff0c\\u6539\\u53d8\\u4f60\\u7684\\u751f\\u6d3b\",\"s_url\":\"http:\\/\\/property.comylife.com\\/guide\\/about\",\"s_thumb\":\"weixin\\/20160818\\/7b7c6a54-f36a-4fb5-9020-fa53164c01d2.jpg\",\"s_order\":\"2\"}]', '', '2016-04-21 17:00:00', '2016-04-21 18:30:00', '', '2016-04-21 17:04:54', '-1');
INSERT INTO `t_weixin_subscribe` VALUES ('18', '2', '', 'text', '感谢您关注“可米生活”智慧社区综合服务平台！\n足不出户享受便捷物业服务，还能在线购买可米君为您精选的商品和旅游线路。\n\n上可米，有生活！\n\n我们正在进行<a href=\"http://mp.weixin.qq.com/s?__biz=MzIxMzE4MDU4Mw==&mid=2651615392&idx=1&sn=a5eb34e8618e7e60b0c4756cbb052ccd#rd\">免费送 | 关爱单身狗，七夕送口粮</a>活动，点击蓝字查看活动详情，期待你的参与，可米君祝你好运！\n', '', '2016-08-01 21:00:00', '2016-08-08 12:00:00', '', '2016-07-15 17:36:51', '1');
INSERT INTO `t_weixin_subscribe` VALUES ('19', '2', '', 'text', '感谢您关注“可米生活”智慧社区综合服务平台！\n足不出户享受便捷物业服务，还能在线购买可米君为您精选的商品和旅游线路。\n\n上可米，有生活！\n\n', '', '2016-07-22 12:00:00', '2016-07-24 21:00:00', '', '2016-07-19 09:19:27', '-1');
INSERT INTO `t_weixin_subscribe` VALUES ('20', '2', '', 'news', '[{\"s_title\":\"44\",\"s_url\":\"44\",\"s_thumb\":\"weixin\\/20160822\\/30847fde-4e60-426f-a851-b0695ac44d07.jpg\",\"s_order\":\"1\"},{\"s_title\":\"3333\",\"s_url\":\"33\",\"s_thumb\":\"weixin\\/20160822\\/eca9a39a-2f99-4808-b8cb-051aa3ce3f2d.jpg\",\"s_order\":\"1\"}]', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2016-08-22 14:24:01', '1');
