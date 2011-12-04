-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2009 年 12 月 23 日 17:35
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `11ok_yii`
--

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_articles`
--

CREATE TABLE IF NOT EXISTS `y11ok_articles` (
  `id` int(11) NOT NULL auto_increment,
  `blogsId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `articlesCategoryId` int(11) NOT NULL default '0',
  `globalArticlesCategoriesId` int(11) NOT NULL default '0',
  `countReads` int(10) default '0',
  `countComments` int(10) default '0',
  `top` tinyint(1) default '0',
  `status` tinyint(1) default '1',
  `title` varchar(255) default NULL,
  `summary` text,
  `settings` text,
  `createDate` int(11) NOT NULL,
  `updateDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blogs2articles` (`blogsId`),
  KEY `globalArticlesCategories2articles` (`globalArticlesCategoriesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `y11ok_articles`
--

INSERT INTO `y11ok_articles` (`id`, `blogsId`, `usersId`, `articlesCategoryId`, `globalArticlesCategoriesId`, `countReads`, `countComments`, `top`, `status`, `title`, `summary`, `settings`, `createDate`, `updateDate`) VALUES
(1, 1, 1, 3, 2, 0, 0, 1, 1, '美国军火商发布iPhone作战辅助软件', '美国军火商雷神公司（Raytheon）今天公布新软件，可让iPhone或iPod Touch成为作战工具，预计日后还会发布一系列相关软件。', 'b:0;', 1261035404, 1261463996),
(2, 9, 11, 8, 3, 0, 0, 0, 1, '崔世安就任澳门新特首 澳门进入"崔世安时代"', '核心提示：庆祝澳门回归祖国十周年大会暨澳门特区第三届政府就职典礼20日上午在澳门东亚运动会体育馆举行，澳门第三任行政长官崔世安宣誓就职,胡锦涛到场祝贺并发表讲话。', 'N;', 1261376301, 1261376301),
(3, 9, 11, 7, 3, 0, 0, 0, 1, '工信部:推进手机实名制打击手机色情', '核心提示：近日，工业和信息化部下发通知称，力争在2010年底前出台《通信短信息服务管理规定》，为电话用户实名登记工作提供法律依据，为彻底整治手机淫秽色情奠定坚实基础', 'N;', 1261376513, 1261376513);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_articlescategories`
--

CREATE TABLE IF NOT EXISTS `y11ok_articlescategories` (
  `id` int(11) NOT NULL auto_increment,
  `usersId` int(11) NOT NULL,
  `blogsId` int(11) default '0',
  `parentId` int(11) default '0',
  `countArticles` int(10) default '0',
  `name` varchar(255) default NULL,
  `description` text,
  `settings` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `y11ok_articlescategories`
--

INSERT INTO `y11ok_articlescategories` (`id`, `usersId`, `blogsId`, `parentId`, `countArticles`, `name`, `description`, `settings`) VALUES
(1, 1, 1, 0, 0, '产品', '', NULL),
(3, 1, 1, 0, 1, '日志', 'admin的日志记录\r\n', NULL),
(6, 5, 2, 0, 0, '我的日志', '', NULL),
(7, 11, 9, 0, 1, '杂类', '', 'N;'),
(8, 11, 9, 0, 1, '日志', '', 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_articlescomments`
--

CREATE TABLE IF NOT EXISTS `y11ok_articlescomments` (
  `id` int(11) NOT NULL auto_increment,
  `blogsId` int(11) default NULL,
  `articlesid` int(11) NOT NULL,
  `parentId` int(11) default NULL,
  `usersId` int(11) default NULL,
  `private` tinyint(1) default NULL,
  `userName` varchar(255) default NULL,
  `userEmail` varchar(255) default NULL,
  `userUrl` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `content` text,
  `clientIp` varchar(15) default NULL,
  `status` tinyint(1) default NULL,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `articles2articlesComments` (`articlesid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_articlescomments`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_articlestext`
--

CREATE TABLE IF NOT EXISTS `y11ok_articlestext` (
  `articlesId` int(11) NOT NULL,
  `content` text,
  `noHtmlContent` text,
  PRIMARY KEY  (`articlesId`),
  KEY `articles2articlesText` (`articlesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_articlestext`
--

INSERT INTO `y11ok_articlestext` (`articlesId`, `content`, `noHtmlContent`) VALUES
(1, '<p>\r\n	<strong>美国军火商雷神公司（Raytheon）今天公布新软件，可让iPhone或iPod Touch成为作战工具，预计日后还会发布一系列相关软件。</strong><br />\r\n	<strong><img align="left" alt="" height="66" src="/uploads/userfiles/images/7bf016d89f7e69e7b5965fc7cf8690e9.gif" width="163" /></strong>OFT（One Force Tracker）软件利用苹果（Apple）这两项触控式移动装置的内建功能，让士兵能在地图上实时追踪盟军与敌方下落。该公司先进计划与科技部门主管巴 特尔（TusharPatel）表示：&ldquo;我们根据军事讯息标准，开发出情境察觉软件，能提供多媒体、语音及文字显示兴趣点、免费文字简讯、协同规划、地点 回报以及紧急火力支持要求等多项功能。&rdquo;</p>\r\n<p>\r\n	它充分运用iPhone与iPod Touch多项功能，包括全球定位、高速网络以及感应翻转、倾斜或旋转的加速器。<br />\r\n	<br />\r\n	医疗、消防与救灾时，这款软件也可派上用场。<br />\r\n	<br />\r\n	OFT在iPhone上操作时，可以看到地图显示各部队间相互位置。<br />\r\n	<br />\r\n	士兵也可利用无线网络，同步向彼此传送最新状况，就像汽车驾驶用智能型手机分享交通路况般。</p>\r\n', '美国军火商雷神公司（Raytheon）今天公布新软件，可让iPhone或iPod Touch成为作战工具，预计日后还会发布一系列相关软件。\r\nOFT（One Force Tracker）软件利用苹果（Apple）这两项触控式移动装置的内建功能，让士兵能在地图上实时追踪盟军与敌方下落。该公司先进计划与科技部门主管巴 特尔（TusharPatel）表示：&ldquo;我们根据军事讯息标准，开发出情境察觉软件，能提供多媒体、语音及文字显示兴趣点、免费文字简讯、协同规划、地点 回报以及紧急火力支持要求等多项功能。&rdquo;\n它充分运用iPhone与iPod Touch多项功能，包括全球定位、高速网络以及感应翻转、倾斜或旋转的加速器。\n医疗、消防与救灾时，这款软件也可派上用场。\nOFT在iPhone上操作时，可以看到地图显示各部队间相互位置。\n士兵也可利用无线网络，同步向彼此传送最新状况，就像汽车驾驶用智能型手机分享交通路况般。'),
(2, '<p>\r\n	12月20日，庆祝澳门回归祖国十周年大会暨澳门特别行政区第三届政府就职典礼在澳门东亚运动会体育馆举行。澳门特区第三任行政长官崔世安宣誓就职，国家主席胡锦涛监誓。</p>\r\n<p>\r\n	<strong>人民网澳门12月20日电</strong> 庆祝澳门回归祖国10周年大会暨澳门特别行政区第三届政府就职典礼20日上午在澳门东亚运动会体育馆隆重举行，中共中央总书记、国家主席、中央军委主席胡 锦涛出席并发表重要讲话。他指出，&ldquo;一国两制&rdquo;在澳门的成功实践，为澳门发展谱写出新的辉煌篇章，为国家发展增添了夺目光彩。我们坚信，澳门的明天与伟大 祖国一样，一定会更加美好；澳门同胞的未来生活与全国各族人民一样，一定会更加幸福。</p>\r\n<p>\r\n	今天是澳门回归祖国10周年的喜庆日子，澳门东亚运动会体育馆洋溢着庄严而热烈的气氛。会场里摆放着盛开的鲜花，主席台上方悬挂着鲜艳的中华人民共 和国国旗和澳门特别行政区区旗。当胡锦涛和夫人刘永清在澳门特别行政区第三任行政长官崔世安和夫人霍慧芬陪同下步入会场时，全场起立鼓掌。</p>\r\n<p>\r\n	庆祝大会暨就职典礼在雄壮的国歌声中开始。</p>\r\n<p>\r\n	胡锦涛走上主席台监誓。崔世安首先宣誓就职，他面对国旗和澳门特别行政区区旗，举起右手庄严宣誓。宣誓完毕，胡锦涛同崔世安紧紧握手，全场掌声雷动。</p>\r\n<p>\r\n	接着，由胡锦涛监誓，澳门特别行政区第三届政府主要官员在崔世安带领下上台宣誓就职。宣誓完毕后，胡锦涛同他们一一握手致意。</p>\r\n<p>\r\n	随后，由崔世安监誓，澳门特别行政区行政会委员宣誓就职。</p>\r\n<p>\r\n	在热烈的掌声中，胡锦涛发表了重要讲话。他代表中央政府和全国各族人民，向全体澳门市民致以诚挚的问候，向新就任的澳门特别行政区行政长官崔世安和 特别行政区主要官员、行政会委员表示热烈的祝贺。胡锦涛表示相信，新一届澳门特别行政区政府一定能够总结经验、继往开来，团结带领广大澳门市民把澳门建设 得更加美好。</p>\r\n<p>\r\n	胡锦涛说，此时此刻，我们要向创造性地提出&ldquo;一国两制&rdquo;科学构想、为澳门回归祖国开辟了正确道路的邓小平先生，表示深深的怀念。向为实现澳门顺利交接和成功落实&ldquo;一国两制&rdquo;作出了历史性贡献的江泽民先生，致以崇高的敬意。</p>\r\n<p>\r\n	胡锦涛指出，澳门回归祖国10年来，在中央政府和祖国内地大力支持下，澳门特别行政区行政长官何厚铧和特区政府带领澳门各界人士团结奋斗、务实进 取，积极应对亚洲金融危机、非典疫情、国际金融危机等带来的严峻挑战，努力克服澳门发展进程中遇到的种种困难，保持澳门繁荣稳定，各项事业取得长足进步， 使澳门这座历史悠久的商埠名城焕发出前所未有的生机活力。</p>\r\n<p>\r\n	胡锦涛强调，澳门回归祖国以来的10年，是&ldquo;一国两制&rdquo;在澳门成功实践的10年，是澳门基本法顺利实施的10年，也是澳门各界人士积极探索符合澳门 实际的发展道路、不断取得进步的10年。回顾澳门回归祖国10年来的不平凡历程，可以得出以下重要启示。第一，必须全面准确理解和贯彻&ldquo;一国两制&rdquo;方针。 关键是要把爱国和爱澳有机统一起来，在爱国爱澳旗帜下实现最广泛的团结，构筑起澳门长期繁荣稳定的牢固政治基础。第二，必须严格依照澳门基本法办事。澳门 基本法在澳门特别行政区法律体系中具有最高地位。依法治澳，就是要按照澳门基本法办事，坚决维护澳门基本法的权威。第三，必须集中精力推动发展。始终牢牢 把握发展这个主题，更加注重集民智、聚民心、汇民力，更加注重发展的全面性、协调性、可持续性，切实提高澳门抵御各种经济金融风险能力。第四，必须坚持维 护社会和谐稳定。澳门同胞向来讲团结、重协商，只要大家在维护澳门长期繁荣稳定的大目标下相互尊重、求同存异、加强沟通、顾全大局，就一定能够找到解决矛 盾和问题的办法，为澳门各项事业发展营造良好社会氛围。第五，必须着力培养各类人才。不断提升澳门竞争力，最关键的支撑因素是人才。要培养造就一大批澳门 社会发展需要的政治人才、经济人才、专业技术人才以及其他各方面人才。要高度重视和加强爱国爱澳优秀年轻人才培养，使&ldquo;一国两制&rdquo;事业后继有人。</p>\r\n<p>\r\n	胡锦涛指出，把&ldquo;一国两制&rdquo;伟大事业继续推向前进，需要中央政府和香港特别行政区政府、澳门特别行政区政府以及社会各界人士共同努力。中央政府将继 续坚定不移贯彻&ldquo;一国两制&rdquo;、&ldquo;港人治港&rdquo;、&ldquo;澳人治澳&rdquo;、高度自治的方针，严格按照香港基本法、澳门基本法办事，全力支持香港特别行政区、澳门特别行政 区行政长官和特区政府依法施政。中央政府对香港、澳门采取的任何方针政策措施，都会始终坚持有利于保持香港、澳门长期繁荣稳定，有利于增进香港、澳门全体 市民福祉，有利于推动香港、澳门和国家共同发展的原则。伟大的祖国始终是香港、澳门繁荣稳定的坚强后盾。</p>\r\n<p>\r\n	崔世安在致辞中说，10年来，在中央政府和祖国内地强而有力的支持下，以何厚铧为首的澳门特别行政区政府和广大居民共同写下了澳门历史新篇章，澳门特别行政区所呈现的勃勃生机正反映出&ldquo;一国两制&rdquo;的强大生命力。</p>\r\n<p>\r\n	崔世安表示，新一届澳门特别行政区政府定将秉持&ldquo;以民为本&rdquo;的施政理念，积极推动澳门经济适度多元发展，努力提升澳门居民生活质素，构建高效廉洁政府，重视人才培养与储备，把&ldquo;一国两制&rdquo;伟大实践继续向前推进。</p>\r\n<p>\r\n	刘延东、令计划、王沪宁、李建国、廖晖和陈炳德等出席庆祝大会暨就职典礼。</p>\r\n<p>\r\n	香港特别行政区行政长官曾荫权，澳门特别行政区前任行政长官何厚铧，以及澳门各界代表和特邀嘉宾也出席庆祝大会暨就职典礼。</p>\r\n', '12月20日，庆祝澳门回归祖国十周年大会暨澳门特别行政区第三届政府就职典礼在澳门东亚运动会体育馆举行。澳门特区第三任行政长官崔世安宣誓就职，国家主席胡锦涛监誓。\n人民网澳门12月20日电 庆祝澳门回归祖国10周年大会暨澳门特别行政区第三届政府就职典礼20日上午在澳门东亚运动会体育馆隆重举行，中共中央总书记、国家主席、中央军委主席胡 锦涛出席并发表重要讲话。他指出，&ldquo;一国两制&rdquo;在澳门的成功实践，为澳门发展谱写出新的辉煌篇章，为国家发展增添了夺目光彩。我们坚信，澳门的明天与伟大 祖国一样，一定会更加美好；澳门同胞的未来生活与全国各族人民一样，一定会更加幸福。\n今天是澳门回归祖国10周年的喜庆日子，澳门东亚运动会体育馆洋溢着庄严而热烈的气氛。会场里摆放着盛开的鲜花，主席台上方悬挂着鲜艳的中华人民共 和国国旗和澳门特别行政区区旗。当胡锦涛和夫人刘永清在澳门特别行政区第三任行政长官崔世安和夫人霍慧芬陪同下步入会场时，全场起立鼓掌。\n庆祝大会暨就职典礼在雄壮的国歌声中开始。\n胡锦涛走上主席台监誓。崔世安首先宣誓就职，他面对国旗和澳门特别行政区区旗，举起右手庄严宣誓。宣誓完毕，胡锦涛同崔世安紧紧握手，全场掌声雷动。\n接着，由胡锦涛监誓，澳门特别行政区第三届政府主要官员在崔世安带领下上台宣誓就职。宣誓完毕后，胡锦涛同他们一一握手致意。\n随后，由崔世安监誓，澳门特别行政区行政会委员宣誓就职。\n在热烈的掌声中，胡锦涛发表了重要讲话。他代表中央政府和全国各族人民，向全体澳门市民致以诚挚的问候，向新就任的澳门特别行政区行政长官崔世安和 特别行政区主要官员、行政会委员表示热烈的祝贺。胡锦涛表示相信，新一届澳门特别行政区政府一定能够总结经验、继往开来，团结带领广大澳门市民把澳门建设 得更加美好。\n胡锦涛说，此时此刻，我们要向创造性地提出&ldquo;一国两制&rdquo;科学构想、为澳门回归祖国开辟了正确道路的邓小平先生，表示深深的怀念。向为实现澳门顺利交接和成功落实&ldquo;一国两制&rdquo;作出了历史性贡献的江泽民先生，致以崇高的敬意。\n胡锦涛指出，澳门回归祖国10年来，在中央政府和祖国内地大力支持下，澳门特别行政区行政长官何厚铧和特区政府带领澳门各界人士团结奋斗、务实进 取，积极应对亚洲金融危机、非典疫情、国际金融危机等带来的严峻挑战，努力克服澳门发展进程中遇到的种种困难，保持澳门繁荣稳定，各项事业取得长足进步， 使澳门这座历史悠久的商埠名城焕发出前所未有的生机活力。\n胡锦涛强调，澳门回归祖国以来的10年，是&ldquo;一国两制&rdquo;在澳门成功实践的10年，是澳门基本法顺利实施的10年，也是澳门各界人士积极探索符合澳门 实际的发展道路、不断取得进步的10年。回顾澳门回归祖国10年来的不平凡历程，可以得出以下重要启示。第一，必须全面准确理解和贯彻&ldquo;一国两制&rdquo;方针。 关键是要把爱国和爱澳有机统一起来，在爱国爱澳旗帜下实现最广泛的团结，构筑起澳门长期繁荣稳定的牢固政治基础。第二，必须严格依照澳门基本法办事。澳门 基本法在澳门特别行政区法律体系中具有最高地位。依法治澳，就是要按照澳门基本法办事，坚决维护澳门基本法的权威。第三，必须集中精力推动发展。始终牢牢 把握发展这个主题，更加注重集民智、聚民心、汇民力，更加注重发展的全面性、协调性、可持续性，切实提高澳门抵御各种经济金融风险能力。第四，必须坚持维 护社会和谐稳定。澳门同胞向来讲团结、重协商，只要大家在维护澳门长期繁荣稳定的大目标下相互尊重、求同存异、加强沟通、顾全大局，就一定能够找到解决矛 盾和问题的办法，为澳门各项事业发展营造良好社会氛围。第五，必须着力培养各类人才。不断提升澳门竞争力，最关键的支撑因素是人才。要培养造就一大批澳门 社会发展需要的政治人才、经济人才、专业技术人才以及其他各方面人才。要高度重视和加强爱国爱澳优秀年轻人才培养，使&ldquo;一国两制&rdquo;事业后继有人。\n胡锦涛指出，把&ldquo;一国两制&rdquo;伟大事业继续推向前进，需要中央政府和香港特别行政区政府、澳门特别行政区政府以及社会各界人士共同努力。中央政府将继 续坚定不移贯彻&ldquo;一国两制&rdquo;、&ldquo;港人治港&rdquo;、&ldquo;澳人治澳&rdquo;、高度自治的方针，严格按照香港基本法、澳门基本法办事，全力支持香港特别行政区、澳门特别行政 区行政长官和特区政府依法施政。中央政府对香港、澳门采取的任何方针政策措施，都会始终坚持有利于保持香港、澳门长期繁荣稳定，有利于增进香港、澳门全体 市民福祉，有利于推动香港、澳门和国家共同发展的原则。伟大的祖国始终是香港、澳门繁荣稳定的坚强后盾。\n崔世安在致辞中说，10年来，在中央政府和祖国内地强而有力的支持下，以何厚铧为首的澳门特别行政区政府和广大居民共同写下了澳门历史新篇章，澳门特别行政区所呈现的勃勃生机正反映出&ldquo;一国两制&rdquo;的强大生命力。\n崔世安表示，新一届澳门特别行政区政府定将秉持&ldquo;以民为本&rdquo;的施政理念，积极推动澳门经济适度多元发展，努力提升澳门居民生活质素，构建高效廉洁政府，重视人才培养与储备，把&ldquo;一国两制&rdquo;伟大实践继续向前推进。\n刘延东、令计划、王沪宁、李建国、廖晖和陈炳德等出席庆祝大会暨就职典礼。\n香港特别行政区行政长官曾荫权，澳门特别行政区前任行政长官何厚铧，以及澳门各界代表和特邀嘉宾也出席庆祝大会暨就职典礼。'),
(3, '<p>\r\n	<strong>千龙网12月21日报道</strong>&nbsp; 近日，工业和信息化部印发《工业和信息化部关于进一步深入整治手机淫秽色情专项行动工作方案》的通知。通知指出整治手机淫秽色情专项行动分为三个阶段，并 强调落实基础电信企业领导人问责制，严格清理接入资源层层转租问题，强力治理网站变换域名、逃避监管行为。通知强调，2010年底前，各基础电信企业不得 再新建WAP网关，并力争出台《通信短信息服务管理规定》，为电话用户实名登记工作提供法律依据，为彻底整治手机淫秽色情奠定坚实基础。</p>\r\n<p>\r\n	根据通知，第一阶段为全面清理，重点整治，落实责任阶段时间从2009年11月12日至2009年12月31日。通知要求各相关主体快速反应，排查 问题，重拳出击，净化手机网络环境初见成效。第二阶段为落实方案，抓好整改，强化手段。时间从2010年1月1日到9月30日。第三阶段为健全机制，夯实 基础，提升管理阶段，时间从2010年10月1日至2010年12月31日，要深化企业监测体系建设，完善企业资源管理平台建设，加强监督检查，健全长效 管理机制。</p>\r\n<p>\r\n	通知指出，要落实基础电信企业领导人问责制，明确指出各基础电信企业的法定代表人为本单位信息安全第一责任人，对本企业信息安全工作负主要领导责任，企业分管信息安全的负责人为本单位信息安全责任人，对本企业信息安全工作负直接领导责任。&nbsp;&nbsp;</p>\r\n<p>\r\n	通知强调，基础电信运营商、接入服务商要对网站接入环节进行全面整改。接入服务商必须持证经营、所接入的网站必须取得经营许可或备案，违反 者要追究相关人员责任。要与所提供接入服务的网站签订信息安全管理协议，未签协议的立即补签，已签协议但协议内容不完善的立即重签，不签协议擅自提供接入 的，追究相关人员的责任。</p>\r\n<p>\r\n	通知要求，基础电信企业、接入服务商要全面整改接入资源层层转租问题。在2010年1月30日前，要完成企业内部接入资源层层转租问题 的排查，全面检查用户接入资源的在用情况，发现再转租行为的，立即停止租用合同并收回接入资源。要制定具体的整改措施，重点清理电信资源租用合同，采取切 实有效措施，打击电信资源再次转租行为。做好转租接入资源收回后用户的善后处理工作，避免影响合法用户的正常使用。要制定有关接入资源管理规章制度，将接 入资源管理责任落实到具体部门和人员。对擅自转租接入资源的，要严肃追究相关人员的责任，彻底杜绝接入资源层层转租现象。</p>\r\n<p>\r\n	通知指出，基础电信企业要采取各种优惠措施，鼓励用户提供有效身份证件等信息进行实名登记和补登记，逐步提高电话用户实名登记的比例。 工业和信息化部会同公安部、国务院新闻办，加快立法进度，力争在2010年底前出台《通信短信息服务管理规定》，为全面实施电话用户实名登记工作提供法律 依据。</p>\r\n', '千龙网12月21日报道 近日，工业和信息化部印发《工业和信息化部关于进一步深入整治手机淫秽色情专项行动工作方案》的通知。通知指出整治手机淫秽色情专项行动分为三个阶段，并 强调落实基础电信企业领导人问责制，严格清理接入资源层层转租问题，强力治理网站变换域名、逃避监管行为。通知强调，2010年底前，各基础电信企业不得 再新建WAP网关，并力争出台《通信短信息服务管理规定》，为电话用户实名登记工作提供法律依据，为彻底整治手机淫秽色情奠定坚实基础。\n根据通知，第一阶段为全面清理，重点整治，落实责任阶段时间从2009年11月12日至2009年12月31日。通知要求各相关主体快速反应，排查 问题，重拳出击，净化手机网络环境初见成效。第二阶段为落实方案，抓好整改，强化手段。时间从2010年1月1日到9月30日。第三阶段为健全机制，夯实 基础，提升管理阶段，时间从2010年10月1日至2010年12月31日，要深化企业监测体系建设，完善企业资源管理平台建设，加强监督检查，健全长效 管理机制。\n通知指出，要落实基础电信企业领导人问责制，明确指出各基础电信企业的法定代表人为本单位信息安全第一责任人，对本企业信息安全工作负主要领导责任，企业分管信息安全的负责人为本单位信息安全责任人，对本企业信息安全工作负直接领导责任。\n通知强调，基础电信运营商、接入服务商要对网站接入环节进行全面整改。接入服务商必须持证经营、所接入的网站必须取得经营许可或备案，违反 者要追究相关人员责任。要与所提供接入服务的网站签订信息安全管理协议，未签协议的立即补签，已签协议但协议内容不完善的立即重签，不签协议擅自提供接入 的，追究相关人员的责任。\n通知要求，基础电信企业、接入服务商要全面整改接入资源层层转租问题。在2010年1月30日前，要完成企业内部接入资源层层转租问题 的排查，全面检查用户接入资源的在用情况，发现再转租行为的，立即停止租用合同并收回接入资源。要制定具体的整改措施，重点清理电信资源租用合同，采取切 实有效措施，打击电信资源再次转租行为。做好转租接入资源收回后用户的善后处理工作，避免影响合法用户的正常使用。要制定有关接入资源管理规章制度，将接 入资源管理责任落实到具体部门和人员。对擅自转租接入资源的，要严肃追究相关人员的责任，彻底杜绝接入资源层层转租现象。\n通知指出，基础电信企业要采取各种优惠措施，鼓励用户提供有效身份证件等信息进行实名登记和补登记，逐步提高电话用户实名登记的比例。 工业和信息化部会同公安部、国务院新闻办，加快立法进度，力争在2010年底前出台《通信短信息服务管理规定》，为全面实施电话用户实名登记工作提供法律 依据。');

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_articles_articlescategories`
--

CREATE TABLE IF NOT EXISTS `y11ok_articles_articlescategories` (
  `articlesId` int(11) NOT NULL,
  `articlesCategoriesId` int(11) NOT NULL,
  PRIMARY KEY  (`articlesId`,`articlesCategoriesId`),
  KEY `articles2articlesCategories` (`articlesId`),
  KEY `articlesCategories2articles` (`articlesCategoriesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_articles_articlescategories`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_authassignment`
--

CREATE TABLE IF NOT EXISTS `y11ok_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_authassignment`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_authitem`
--

CREATE TABLE IF NOT EXISTS `y11ok_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_authitem`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_authitemchild`
--

CREATE TABLE IF NOT EXISTS `y11ok_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY  (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_authitemchild`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_blogcategories`
--

CREATE TABLE IF NOT EXISTS `y11ok_blogcategories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `description` varchar(255) default NULL,
  `settings` text,
  `countBlogs` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- 导出表中的数据 `y11ok_blogcategories`
--

INSERT INTO `y11ok_blogcategories` (`id`, `name`, `description`, `settings`, `countBlogs`) VALUES
(1, '化学原料', '用于工业、科学、摄影、农业、园艺、森林的化学品,未加工人造合成树脂,未加工塑料物质,肥料,灭火用合成物,淬火和金属焊接用制剂,保存食品用化学品,鞣料,工业粘合剂', '', 3),
(2, '颜料油漆', '颜料,清漆,漆,防锈剂和木材防腐剂,着色剂,媒染剂，未加工的天然树脂,画家、装饰家、印刷商和艺术家用金属箔及金属粉', '', 3),
(3, '日化用品', '洗衣用漂白剂及其他物料,清洁、擦亮、去渍及研磨用制剂,肥皂,香料,香精油,化妆品,洗发水,牙膏', '', 2),
(4, '燃料油脂', '工业用油及油脂,润滑剂,吸收、喷洒和粘结灰尘用品,燃料（包括马达用的汽油）和照明材料 ,照明用蜡烛和灯芯', NULL, 0),
(5, '医药', '医用和兽医用制剂，医用卫生制剂,医用营养品,婴儿食品,膏药,绷敷材料,填塞牙孔和牙模用料,消毒剂,消灭有害动物制剂,杀真菌剂,除锈剂', NULL, 0),
(6, '金属材料', '普通金属及其合金,金属建筑材料 ,可移动金属建筑物,铁轨用金属材料 ,非电气用缆索和金属线,小五金具,金属管,保险箱,不属别类的普通金属制品,矿砂', NULL, 0),
(7, '机械设备', '机器和机床,马达和发动机（陆地车辆用的除外）,机器传动用联轴节和传动机件（陆地车辆用的除外）,非手动农业工具,孵化器', NULL, 0),
(8, '手工器械', '手工用具和器械（手工操作的）,刀、叉和勺餐具,佩刀,剃刀', NULL, 0),
(9, '科学仪器', '科学、航海、测地、摄影、电影、光学、衡具、量具、信号、检验（监督）、救护（营救）和教学用具及仪器；处理、开关、传送、积累、调节或控制电的仪器和器具，录制、通讯、重放声音和形象的器具，磁性数据载体，录音盘，自动售货器和投币启动装置和投币启动装置的机械结构，现金收入记录机，计算机和数据处理装置，灭火器械', NULL, 0),
(10, '医疗器械', '外科、医疗、牙科和兽医用仪器及器械,假肢、假眼和假牙,矫形用品,缝合用材料', NULL, 0),
(11, '灯具空调', '照明、加温、蒸汽、烹调、冷藏、干燥、通风、供水以及卫生设备装置', NULL, 0),
(12, '运输工具', '车辆,陆、空、海用运载器', NULL, 0),
(13, '军火烟火', '火器,军火及子弹,爆炸物,焰火', NULL, 0),
(14, '珠宝钟表', '贵重金属及其合金以及不属别类的贵重金属制品或镀有贵重金属的物品,珠宝,首饰,宝石,钟表和计时仪器', NULL, 0),
(15, '乐器', '乐器', NULL, 0),
(16, '办公品', '不属别类的纸、纸板及其制品,印刷品,装订用品,照片,文具用品,文具或家庭用粘合剂,美术用品,画笔,打字机和办公用品（家具除外）,教育或教学用品（仪器除外），包装用塑料物品（不属别类的），印刷铅字，印版', NULL, 0),
(17, '橡胶制品', '不属别类的橡胶，古塔胶,树胶,石棉,云母以及这些原材料的制品,生产用半成品塑料制品,包装、填充和绝缘用材料,非金属软管', NULL, 0),
(18, '皮革皮具', '皮革及人造皮革,不属别类的皮革及人造皮革制品,毛皮,箱子及旅行袋,雨伞,阳伞及手杖,鞭和马具', NULL, 0),
(19, '建筑材料', '非金属的建筑材料,建筑用非金属刚性管,沥青,柏油,可移动非金属建筑物,非金属碑', NULL, 0),
(20, '家具', '家具,玻璃镜子,镜框,不属别类的木、软木、苇、藤、柳条、角、骨、象牙、鲸骨、贝壳、琥珀、珍珠母、海泡石制品,这些材料的代用品或塑料制品', NULL, 0),
(21, '厨房洁具', '家庭或厨房用具及容器,梳子及海棉，刷子（画笔除外）,制刷材料,清扫用具,钢丝绒,未加工或半加工玻璃（建筑用玻璃除外），不属别类的玻璃器皿，瓷器及陶器', NULL, 0),
(22, '绳网袋篷', '缆,绳,网,遮篷,帐篷，防水遮布,帆,袋（不属别类的）,衬垫及填充料（橡胶或塑料除外）,纺织用纤维原料', NULL, 0),
(23, '纱线丝', '纺织用纱、线', NULL, 0),
(24, '布料床单', '不属别类的布料及纺织品,床单和桌布', NULL, 0),
(25, '服装鞋帽', '服装,鞋,帽', NULL, 0),
(26, '钮扣拉链', '花边及刺绣,饰带及编带,钮扣，领钩扣,饰针及缝针,假花', NULL, 0),
(27, '地毯席垫', '地毯,地席,席类,油毡及其他铺地板用品,非纺织品墙帷', NULL, 0),
(28, '键身器材', '娱乐品,玩具,不属别类的体育及运动用品,圣诞树用装饰品', NULL, 0),
(29, '食品', '肉,鱼,家禽及野味,肉汁,腌渍、冷冻、干制及煮熟的水果和蔬菜,果冻,果酱,蜜饯,蛋,奶及乳制品,食用油和油脂', NULL, 0),
(30, '方便食品', '咖啡,茶,可可,糖,米,食用淀粉,西米,咖啡代用品,面粉及谷类制品,面包,糕点及糖果,冰制食品,蜂蜜,糖浆,鲜酵母,发酵粉,食盐,芥末,醋,沙司（调味品）,调味用香料，饮用冰', NULL, 0),
(31, '饲料种籽', '农业,园艺,林业产品及不属别类的谷物,牲畜,新鲜水果和蔬菜,种籽,草木及花卉,动物饲料,麦芽', NULL, 0),
(32, '啤酒饮料', '啤酒,矿泉水和汽水以及其他不含酒精的饮料,水果饮料及果汁,糖浆及其他供饮料用的制剂', NULL, 0),
(33, '酒', '含酒精的饮料（啤酒除外）', NULL, 0),
(34, '烟草烟具', '烟草,烟具,火柴', NULL, 0),
(35, '广告销售', '广告,实业经营,实业管理,办公事务', NULL, 0),
(36, '金融物管', '保险,金融,货币事务,不动产事务', NULL, 0),
(37, '建筑修理', '房屋建筑,修理,安装服务', NULL, 0),
(38, '通讯服务', '电信', NULL, 0),
(39, '运输贮藏', '运输,商品包装和贮藏,旅行安排', NULL, 0),
(40, '材料加工', '材料处理', NULL, 0),
(41, '教育娱乐', '教育,提供培训,娱乐,文体活动', NULL, 0),
(42, '设计研究', '科学技术服务和与之相关的研究与设计服务；工业分析与研究；计算机硬件与软件的设计与开发', NULL, 1),
(43, '餐饮住宿', '提供食物和饮料服务，临时住宿 ', NULL, 0),
(44, '医疗园艺', '医疗服务，兽医服务，人或动物的卫生和美容服务，农业、园艺或林业服务', NULL, 0),
(45, '社会法律', '法律服务，由他人提供的为满足个人需要的私人和社会服务，为保护财产和人身安全的服务', NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_blogs`
--

CREATE TABLE IF NOT EXISTS `y11ok_blogs` (
  `id` int(11) NOT NULL auto_increment,
  `usersId` int(11) NOT NULL,
  `blogCategoryId` int(11) NOT NULL,
  `countPosts` int(10) default NULL,
  `countComments` int(10) default NULL,
  `status` tinyint(1) NOT NULL default '1',
  `name` varchar(50) default NULL,
  `about` text,
  `settings` text,
  `createDate` int(11) default NULL,
  `updateDate` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `users2blogs` (`usersId`),
  KEY `blogCategories2blogs` (`blogCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 导出表中的数据 `y11ok_blogs`
--

INSERT INTO `y11ok_blogs` (`id`, `usersId`, `blogCategoryId`, `countPosts`, `countComments`, `status`, `name`, `about`, `settings`, `createDate`, `updateDate`) VALUES
(1, 1, 42, NULL, NULL, 1, '第一个博客', 'admin blogs1', 'a:2:{s:5:"theme";s:7:"default";s:6:"number";i:10;}', 1259373998, 1260433548),
(2, 5, 2, NULL, NULL, 1, '独飞的博客', 'dufei22 blogs', NULL, 1259380387, 1259380387),
(3, 6, 1, NULL, NULL, 1, 'My博客', '', NULL, 1259402450, 1259402450),
(4, 7, 2, NULL, NULL, 1, '独飞的博客2', '哈哈哈哈', NULL, 1259402599, 1259402599),
(5, 8, 3, NULL, NULL, 1, 'aaaaa', '', NULL, 1259402784, 1259402784),
(6, 9, 2, NULL, NULL, 1, 'abc1', '', NULL, 1259552464, 1259552464),
(7, 10, 3, NULL, NULL, 1, 'aaa的博客aa', '<h1>aaa</h1>', NULL, 1259632998, 1259897512),
(8, 4, 1, NULL, NULL, 1, '4444', '4444', NULL, NULL, NULL),
(9, 11, 1, NULL, NULL, 1, 'bbb博客', '', 'a:1:{s:5:"theme";s:7:"default";}', 1261361626, 1261361626);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_configs`
--

CREATE TABLE IF NOT EXISTS `y11ok_configs` (
  `configKey` varchar(255) NOT NULL,
  `configValue` text,
  `configType` tinyint(1) default NULL,
  PRIMARY KEY  (`configKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_configs`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_friends`
--

CREATE TABLE IF NOT EXISTS `y11ok_friends` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) default NULL,
  `friendId` int(11) default NULL,
  `status` tinyint(1) default NULL,
  `message` varchar(255) default NULL,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_friends`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_gallery`
--

CREATE TABLE IF NOT EXISTS `y11ok_gallery` (
  `id` int(11) NOT NULL auto_increment,
  `galleryAlbumsId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL default '0',
  `blogsId` int(11) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `countReads` int(11) NOT NULL default '0',
  `countComments` int(11) default '0',
  `title` varchar(50) default NULL,
  `description` text COMMENT '  \n',
  `filePath` varchar(255) default NULL,
  `fileName` varchar(255) default NULL,
  `fileType` varchar(25) default NULL,
  `fileSize` int(11) NOT NULL default '0',
  `metaData` text,
  `settings` text,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `galleryAlbums2gallery` (`galleryAlbumsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `y11ok_gallery`
--

INSERT INTO `y11ok_gallery` (`id`, `galleryAlbumsId`, `usersId`, `blogsId`, `status`, `countReads`, `countComments`, `title`, `description`, `filePath`, `fileName`, `fileType`, `fileSize`, `metaData`, `settings`, `createDate`) VALUES
(1, 1, 1, 1, 2, 0, 0, '商业图片', '0000', NULL, '20091216134747596.jpg', 'jpg', 79551, NULL, 'a:0:{}', 1260942467),
(2, 1, 1, 1, 1, 0, 0, '2', '2222222', NULL, '20091216134747725.jpg', 'jpg', 85300, NULL, 'a:0:{}', 1260942467),
(4, 1, 1, 1, 1, 0, 0, '4', '4444444', NULL, '20091216134832122.jpg', 'jpg', 55780, NULL, 'a:0:{}', 1260942512),
(6, 3, 5, 2, 1, 0, 0, 'aa', 'aaa', NULL, '20091216170321300.jpg', 'jpg', 82803, NULL, 'a:0:{}', 1260954202),
(7, 3, 5, 2, 1, 0, 0, 'bb', 'bbb', NULL, '20091216170322535.jpg', 'jpg', 48652, NULL, 'a:0:{}', 1260954202),
(8, 2, 5, 2, 1, 0, 0, '1920340', '', NULL, '20091216171157256.jpg', 'jpg', 44266, NULL, 'a:0:{}', 1260954717);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_galleryalbums`
--

CREATE TABLE IF NOT EXISTS `y11ok_galleryalbums` (
  `id` int(11) NOT NULL auto_increment,
  `parentId` int(11) NOT NULL default '0',
  `usersId` int(11) NOT NULL default '0',
  `blogsId` int(11) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `countGallery` int(11) default '0',
  `name` varchar(255) default NULL,
  `description` text,
  `settings` text,
  PRIMARY KEY  (`id`),
  KEY `users2galleryAlbums` (`usersId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `y11ok_galleryalbums`
--

INSERT INTO `y11ok_galleryalbums` (`id`, `parentId`, `usersId`, `blogsId`, `status`, `countGallery`, `name`, `description`, `settings`) VALUES
(1, 0, 1, 1, 1, 3, '家乡', '家乡景色1', NULL),
(2, 0, 5, 2, 1, 1, '个人照', '', NULL),
(3, 0, 5, 2, 1, 2, '风景', '', NULL),
(4, 0, 1, 1, 1, 0, '个人照', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_gallerycomments`
--

CREATE TABLE IF NOT EXISTS `y11ok_gallerycomments` (
  `id` int(11) NOT NULL auto_increment,
  `galleryId` int(11) NOT NULL,
  `blogsId` int(11) default NULL,
  `parentId` int(11) default NULL,
  `usersId` int(11) default NULL,
  `private` tinyint(1) default NULL,
  `userName` varchar(255) default NULL,
  `userEmail` varchar(255) default NULL,
  `userUrl` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `content` text,
  `clientIp` varchar(15) default NULL,
  `status` tinyint(1) default NULL,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `gallery2galleryComments` (`galleryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_gallerycomments`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_globalarticlescategories`
--

CREATE TABLE IF NOT EXISTS `y11ok_globalarticlescategories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `settings` text,
  `countArticles` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `y11ok_globalarticlescategories`
--

INSERT INTO `y11ok_globalarticlescategories` (`id`, `name`, `description`, `settings`, `countArticles`) VALUES
(1, '默认', '', '', 1),
(2, '供应', '', '', 0),
(3, '求购', '', '', 2);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_groups`
--

CREATE TABLE IF NOT EXISTS `y11ok_groups` (
  `id` int(11) NOT NULL auto_increment,
  `ownerId` int(11) default NULL,
  `countPosts` int(11) default NULL,
  `countReplys` int(11) default NULL,
  `status` tinyint(1) default NULL,
  `name` varchar(255) default NULL,
  `about` text,
  `settings` text,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_groups`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_groupsposts`
--

CREATE TABLE IF NOT EXISTS `y11ok_groupsposts` (
  `id` int(11) NOT NULL auto_increment,
  `parentId` int(11) default NULL,
  `groupsid` int(11) NOT NULL,
  `usersId` int(11) default NULL,
  `countReads` int(11) default NULL,
  `countReply` int(11) default NULL,
  `top` tinyint(1) default NULL,
  `status` tinyint(1) default NULL,
  `title` varchar(255) default NULL,
  `content` text,
  `createDate` int(11) NOT NULL,
  `updateDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `groups2groupsPosts` (`groupsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_groupsposts`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_groups_users`
--

CREATE TABLE IF NOT EXISTS `y11ok_groups_users` (
  `groupsid` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `status` tinyint(1) default NULL,
  `createDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`groupsid`,`usersid`),
  KEY `groups2users` (`groupsid`),
  KEY `users2groups` (`usersid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_groups_users`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_guestbook`
--

CREATE TABLE IF NOT EXISTS `y11ok_guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `blogsId` int(11) NOT NULL default '0',
  `parentId` int(11) default '0',
  `private` tinyint(1) default '0',
  `usersId` int(11) default '0',
  `userName` varchar(25) default NULL,
  `userEmail` varchar(255) default NULL,
  `userUrl` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `content` text,
  `clientIp` varchar(15) default NULL,
  `status` tinyint(1) default '0',
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `blogs2guestBook` (`blogsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_guestbook`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_sitesms`
--

CREATE TABLE IF NOT EXISTS `y11ok_sitesms` (
  `id` int(11) NOT NULL auto_increment,
  `postId` int(11) default NULL,
  `toId` int(11) default NULL,
  `status` tinyint(1) default NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_sitesms`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_userinfo`
--

CREATE TABLE IF NOT EXISTS `y11ok_userinfo` (
  `usersId` int(11) NOT NULL,
  `position` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `native` varchar(50) default NULL,
  `url` varchar(50) default NULL,
  `hobby` varchar(255) default NULL,
  `tel` varchar(25) default NULL,
  `mobilePhone` varchar(50) default NULL,
  `qq` varchar(11) default NULL,
  `msn` varchar(255) default NULL,
  `about` text,
  UNIQUE KEY `usersId` (`usersId`),
  KEY `users2userInfo` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `y11ok_userinfo`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_userlogs`
--

CREATE TABLE IF NOT EXISTS `y11ok_userlogs` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) default NULL,
  `action` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `info` text,
  `status` tinyint(1) default NULL,
  `createDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_userlogs`
--


-- --------------------------------------------------------

--
-- 表的结构 `y11ok_users`
--

CREATE TABLE IF NOT EXISTS `y11ok_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) default NULL,
  `email` varchar(50) default NULL,
  `avatar` varchar(255) default NULL,
  `realname` varchar(12) default NULL,
  `compnay` varchar(255) default NULL,
  `sex` tinyint(1) default NULL,
  `blogCategoryId` int(11) default NULL,
  `province` varchar(25) default NULL,
  `city` varchar(50) default NULL,
  `area` varchar(25) default NULL,
  `birthday` date default NULL,
  `userType` tinyint(1) NOT NULL default '1',
  `userStatus` tinyint(1) NOT NULL default '1',
  `top_trade` tinyint(1) NOT NULL default '0' COMMENT '行业推荐',
  `top_site` tinyint(1) NOT NULL default '0' COMMENT '全站推荐',
  `settings` text NOT NULL,
  `lastLoginDate` int(11) default NULL,
  `regIp` varchar(15) default NULL,
  `lastLoginIp` varchar(15) default NULL,
  `regDate` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 导出表中的数据 `y11ok_users`
--

INSERT INTO `y11ok_users` (`id`, `username`, `password`, `email`, `avatar`, `realname`, `compnay`, `sex`, `blogCategoryId`, `province`, `city`, `area`, `birthday`, `userType`, `userStatus`, `top_trade`, `top_site`, `settings`, `lastLoginDate`, `regIp`, `lastLoginIp`, `regDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@11ok.net', 'avatar.jpg', '管理员', '搜商网', 0, 42, '湖南省', '邵阳市', '市辖区', '1983-03-19', 1, 1, 0, 1, '', 1261469328, '127.0.0.1', '127.0.0.1', 1259373998),
(4, 'abc111', 'b59c67bf196a4758191e42f76670ceba', 'eeew@fd.com', 'avatar.jpg', NULL, NULL, 2, 1, '吉林省', '长春市', '市辖区', '2000-12-05', 1, 1, 0, 1, '', 1261216253, '127.0.0.1', '127.0.0.1', 1259373998),
(5, 'dufei22', 'b59c67bf196a4758191e42f76670ceba', 'dufei22@gmail.com', 'avatar.jpg', NULL, NULL, 1, 2, '湖南省', '长沙市', '市辖区', '0000-00-00', 1, 1, 0, 1, '', 1261114483, '127.0.0.1', '127.0.0.1', 1259380387),
(6, 'abcabc', 'b59c67bf196a4758191e42f76670ceba', '232@fd.com', NULL, NULL, NULL, 0, 1, '湖南省', '0', '大祥区', NULL, 1, 1, 0, 1, '', 1259402450, '127.0.0.1', NULL, 1259402450),
(7, '独飞', 'b59c67bf196a4758191e42f76670ceba', 'dufei22@qq.com', NULL, '龙程', '易翔商务', 1, 2, '湖南省', '0', '大祥区', NULL, 1, 1, 0, 1, '', 1259402599, '127.0.0.1', NULL, 1259402599),
(8, 'abca', 'b59c67bf196a4758191e42f76670ceba', '11dfs@fd.com', NULL, NULL, NULL, 2, 3, '湖南省', '邵阳市', '邵东县', NULL, 1, 1, 1, 0, '', 1259402784, '127.0.0.1', NULL, 1259402784),
(9, 'abc1', 'b59c67bf196a4758191e42f76670ceba', 'abc1@fd.com', NULL, NULL, NULL, 1, 2, '湖南省', '邵阳市', '大祥区', '1983-03-22', 1, 1, 1, 0, '', 1261216649, '127.0.0.1', '127.0.0.1', 1259552464),
(10, 'aaaa', 'b59c67bf196a4758191e42f76670ceba', 'aaa@aa.com', 'avatar.jpg', NULL, NULL, 0, 3, '黑龙江省', '鹤岗市', '市辖区', '1991-04-04', 1, 1, 1, 0, '', 1261216229, '127.0.0.1', '127.0.0.1', 1259632998),
(11, 'bbbb', 'b59c67bf196a4758191e42f76670ceba', '13e43fs@fd.com', NULL, '测试用户', '测试企业名称', 0, 1, '广东省', '广州市', '市辖区', '2007-05-03', 1, 1, 1, 0, 'N;', 1261361638, '127.0.0.1', '127.0.0.1', 1261361626);

-- --------------------------------------------------------

--
-- 表的结构 `y11ok_visits`
--

CREATE TABLE IF NOT EXISTS `y11ok_visits` (
  `id` int(11) NOT NULL auto_increment,
  `userId` int(11) default NULL,
  `visitId` int(11) default NULL,
  `visitDate` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `y11ok_visits`
--


--
-- 限制导出的表
--

--
-- 限制表 `y11ok_articles`
--
ALTER TABLE `y11ok_articles`
  ADD CONSTRAINT `blogs2articles` FOREIGN KEY (`blogsid`) REFERENCES `y11ok_blogs` (`id`),
  ADD CONSTRAINT `globalArticlesCategories2articles` FOREIGN KEY (`globalArticlesCategoriesId`) REFERENCES `y11ok_globalarticlescategories` (`id`);

--
-- 限制表 `y11ok_articlescomments`
--
ALTER TABLE `y11ok_articlescomments`
  ADD CONSTRAINT `articles2articlesComments` FOREIGN KEY (`articlesid`) REFERENCES `y11ok_articles` (`id`);

--
-- 限制表 `y11ok_articlestext`
--
ALTER TABLE `y11ok_articlestext`
  ADD CONSTRAINT `articles2articlesText` FOREIGN KEY (`articlesId`) REFERENCES `y11ok_articles` (`id`);

--
-- 限制表 `y11ok_articles_articlescategories`
--
ALTER TABLE `y11ok_articles_articlescategories`
  ADD CONSTRAINT `articles2articlesCategories` FOREIGN KEY (`articlesId`) REFERENCES `y11ok_articles` (`id`),
  ADD CONSTRAINT `articlesCategories2articles` FOREIGN KEY (`articlesCategoriesId`) REFERENCES `y11ok_articlescategories` (`id`);

--
-- 限制表 `y11ok_authassignment`
--
ALTER TABLE `y11ok_authassignment`
  ADD CONSTRAINT `y11ok_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `y11ok_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `y11ok_authitemchild`
--
ALTER TABLE `y11ok_authitemchild`
  ADD CONSTRAINT `y11ok_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `y11ok_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `y11ok_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `y11ok_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `y11ok_blogs`
--
ALTER TABLE `y11ok_blogs`
  ADD CONSTRAINT `blogCategories2blogs` FOREIGN KEY (`blogCategoryId`) REFERENCES `y11ok_blogcategories` (`id`),
  ADD CONSTRAINT `users2blogs` FOREIGN KEY (`usersId`) REFERENCES `y11ok_users` (`id`);

--
-- 限制表 `y11ok_gallery`
--
ALTER TABLE `y11ok_gallery`
  ADD CONSTRAINT `galleryAlbums2gallery` FOREIGN KEY (`galleryAlbumsId`) REFERENCES `y11ok_galleryalbums` (`id`);

--
-- 限制表 `y11ok_galleryalbums`
--
ALTER TABLE `y11ok_galleryalbums`
  ADD CONSTRAINT `users2galleryAlbums` FOREIGN KEY (`usersId`) REFERENCES `y11ok_users` (`id`);

--
-- 限制表 `y11ok_gallerycomments`
--
ALTER TABLE `y11ok_gallerycomments`
  ADD CONSTRAINT `gallery2galleryComments` FOREIGN KEY (`galleryId`) REFERENCES `y11ok_gallery` (`id`);

--
-- 限制表 `y11ok_groupsposts`
--
ALTER TABLE `y11ok_groupsposts`
  ADD CONSTRAINT `groups2groupsPosts` FOREIGN KEY (`groupsid`) REFERENCES `y11ok_groups` (`id`);

--
-- 限制表 `y11ok_groups_users`
--
ALTER TABLE `y11ok_groups_users`
  ADD CONSTRAINT `groups2users` FOREIGN KEY (`groupsid`) REFERENCES `y11ok_groups` (`id`),
  ADD CONSTRAINT `users2groups` FOREIGN KEY (`usersid`) REFERENCES `y11ok_users` (`id`);

--
-- 限制表 `y11ok_guestbook`
--
ALTER TABLE `y11ok_guestbook`
  ADD CONSTRAINT `blogs2guestBook` FOREIGN KEY (`blogsId`) REFERENCES `y11ok_blogs` (`id`);

--
-- 限制表 `y11ok_userinfo`
--
ALTER TABLE `y11ok_userinfo`
  ADD CONSTRAINT `users2userInfo` FOREIGN KEY (`usersId`) REFERENCES `y11ok_users` (`id`);
