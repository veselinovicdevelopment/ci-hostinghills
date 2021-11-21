#
# TABLE STRUCTURE FOR: hd_account_details
#

DROP TABLE IF EXISTS `hd_account_details`;

CREATE TABLE `hd_account_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'en_US',
  `address` varchar(64) COLLATE utf8_unicode_ci DEFAULT '-',
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT '-',
  `mobile` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'english',
  `department` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_gravatar` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `as_company` enum('false','true') COLLATE utf8_unicode_ci DEFAULT 'false',
  `allowed_modules` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `hourly_rate` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

INSERT INTO `hd_account_details` (`id`, `user_id`, `fullname`, `company`, `city`, `country`, `locale`, `address`, `phone`, `mobile`, `skype`, `language`, `department`, `avatar`, `use_gravatar`, `as_company`, `allowed_modules`, `hourly_rate`) VALUES ('1', 1, 'Admin test', '1', NULL, NULL, 'en_US', '-', '', NULL, NULL, 'english', NULL, 'default_avatar.jpg', 'Y', 'false', NULL, '0.00');


#
# TABLE STRUCTURE FOR: hd_activities
#

DROP TABLE IF EXISTS `hd_activities`;

CREATE TABLE `hd_activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `module` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_field_id` int(11) DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'fa-coffee',
  `value1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_activities` (`activity_id`, `user`, `module`, `module_field_id`, `activity`, `activity_date`, `icon`, `value1`, `value2`, `deleted`) VALUES (1, 1, 'Clients', 4, 'activity_added_new_company', '2020-06-29 06:24:01', 'fa-user', 'jamesDoe', NULL, 0);


#
# TABLE STRUCTURE FOR: hd_additional_fields
#

DROP TABLE IF EXISTS `hd_additional_fields`;

CREATE TABLE `hd_additional_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` int(100) NOT NULL,
  `field_name` text NOT NULL,
  `field_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: hd_blocks
#

DROP TABLE IF EXISTS `hd_blocks`;

CREATE TABLE `hd_blocks` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (10, 'Module', '', 'domains_domain_availability_checker_block', 'Domains', 'original', 'full_width_top', 1);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (21, 'Module', '', 'domains_domain_pricing_table_block', 'Domains', 'original', 'content_top', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (34, 'Module', 'Home Slider', 'sliders_7', 'Sliders', 'original', 'full_width_top', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (35, 'Module', 'Main Menu', 'menus_1', 'Menus', 'original', 'main_menu', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (36, 'Custom', 'Footer About us', '14', 'Block', 'original', 'footer_left', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (37, 'Custom', 'Block with PHP', '5', 'Block', 'original', 'footer_center', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (38, 'Custom', 'Just text', '21', 'Block', 'original', 'footer_right', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (39, 'Module', 'Information', 'menus_8', 'Menus', 'original', 'footer_right', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (40, 'Module', 'Shared Hosting', 'items_12', 'Items', 'original', 'page_bottom', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (42, 'Custom', 'Contact Details Top', '12', 'Block', 'original', 'header_top_left', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (43, 'Module', 'Website Packages', 'items_13', 'Items', 'original', 'content_top', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (44, 'Custom', 'Sidebar Right', '18', 'Block', 'original', 'sidebar_right', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (45, 'Custom', 'Left Sidebar', '19', 'Block', 'original', 'sidebar_left', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (46, 'Custom', 'Just another example', '20', 'Block', 'original', 'sidebar_left', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (47, 'Custom', 'Google Map', '17', 'Block', 'original', 'full_width_top', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (48, 'Custom', 'Contact Page Image', '16', 'Block', 'original', 'sidebar_right', 0);
INSERT INTO `hd_blocks` (`block_id`, `type`, `name`, `id`, `module`, `theme`, `section`, `weight`) VALUES (51, 'Custom', 'Top icons', '24', 'Block', 'original', 'header_top_right', 0);


#
# TABLE STRUCTURE FOR: hd_blocks_custom
#

DROP TABLE IF EXISTS `hd_blocks_custom`;

CREATE TABLE `hd_blocks_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` longtext NOT NULL,
  `format` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL DEFAULT 'Custom',
  `module` varchar(5) NOT NULL DEFAULT 'Block',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (5, 'Block with PHP', '$address = config_item(\'company_address\');\r\n$phone = config_item(\'company_phone\');\r\n$email = config_item(\'company_email\');\r\n$phone = config_item(\'company_phone\');\r\necho \'<h3 class=\"section-header section-title\">Our Address</h3>\r\n							<ul class=\"contact-info\">\r\n								<li><span><i class=\"fa fa-home\"></i>\' .  $address  . \'</span></li>\r\n								<li><span><i class=\"fa fa-phone\"></i>\' .  $phone . \'</span></li>\r\n								<li><i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i><a href=\"#\">\' .  $email . \'</a></li>\r\n							 \r\n							</ul>\'; ', 'php', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (12, 'Contact Details Top', '<ul class=\"list-inline top-contact\">\r\n								<li>\r\n									<p>	<span><i class =\"fa fa-phone\"></i>+ 255 545 11222</span>\r\n									</p>\r\n								</li>\r\n								<li>\r\n									<p><span><i class =\"fa fa-envelope\"></i> info@hostingbilling.net</span>\r\n									</p>\r\n								</li>\r\n							</ul>', 'js', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (14, 'Footer About us', '<h3 class=\"section-header section-title\">About Us</h3>\r\n       <p>Hosting Billing is a client management and invoicing system for <strong>web hosting</strong>\r\n and domain registration resellers. It comes packed with features that \r\nare designed to automate your daily tasks, saving you time and money.&nbsp;</p>', 'rich_text', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (16, 'Contact Page Image', '<img src=\"resource/images/contact.png\">', 'rich_text', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (17, 'Google Map', '<div class=\"embed-responsive embed-responsive-100x400px\">\r\n<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d35818.719732048536!2d-4.25169!3d55.868392!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488815562056ceeb%3A0x71e683b805ef511e!2sGlasgow%2C+Glasgow+City%2C+UK!5e0!3m2!1sen!2sus!4v1448625188752\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>\r\n  </div>', 'js', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (18, 'Sidebar Right', '<h1 style=\"text-align: center; \"><h2>Right Sidebar</h2><br></h1><p style=\"text-align: center; \"><img src=\"data:image/jpeg;base64,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\" data-filename=\"special.jpg\" style=\"width: 334px;\"><br></p>', 'rich_text', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (19, 'Left Sidebar', '<h2>Left sidebar</h2>\r\n<h4>Example with code</h4>\r\n\r\n<div id=\"MyClockDisplay\" class=\"clock\" onload=\"showTime()\"></div>\r\n<script>\r\n\r\nfunction showTime(){\r\n    var date = new Date();\r\n    var h = date.getHours(); // 0 - 23\r\n    var m = date.getMinutes(); // 0 - 59\r\n    var s = date.getSeconds(); // 0 - 59\r\n    var session = \"AM\";\r\n    \r\n    if(h == 0){\r\n        h = 12;\r\n    }\r\n    \r\n    if(h > 12){\r\n        h = h - 12;\r\n        session = \"PM\";\r\n    }\r\n    \r\n    h = (h < 10) ? \"0\" + h : h;\r\n    m = (m < 10) ? \"0\" + m : m;\r\n    s = (s < 10) ? \"0\" + s : s;\r\n    \r\n    var time = h + \":\" + m + \":\" + s + \" \" + session;\r\n    document.getElementById(\"MyClockDisplay\").innerText = time;\r\n    document.getElementById(\"MyClockDisplay\").textContent = time;\r\n    \r\n    setTimeout(showTime, 1000);\r\n    \r\n}\r\n\r\nshowTime();\r\n\r\n</script>', 'js', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (20, 'Just another example', '<p><img cyii=\" data-filename=\" xss=\"removed\"><img src=\"data:image/png;base64,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\" data-filename=\"offers.png\" style=\"width: 408px;\"><br></p>', 'rich_text', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (21, 'Just text', '<h2>Information</h2>', 'rich_text', 'Custom', 'Block');
INSERT INTO `hd_blocks_custom` (`id`, `name`, `code`, `format`, `type`, `module`) VALUES (24, 'Top icons', 'echo \'<ul class=\"list-inline top-widget\">\r\n								<li class=\"top-social\">\r\n									<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n									<a href=\"#\"><i class=\"fa fa-twitter\"></i></a>\r\n									<a href=\"#\"><i class=\"fa fa-google-plus\"></i></a>\r\n									<a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>\r\n								</li>\r\n								<li>\r\n									<a class=\"button-quote\" href=\"\'.base_url().\'auth/login\" id=\"\">Sign in</a>\r\n								</li>\r\n							</ul>\';', 'php', 'Custom', 'Block');


#
# TABLE STRUCTURE FOR: hd_blocks_modules
#

DROP TABLE IF EXISTS `hd_blocks_modules`;

CREATE TABLE `hd_blocks_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `settings` varchar(255) NOT NULL,
  `param` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'Module',
  `module` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `hd_blocks_modules` (`id`, `name`, `settings`, `param`, `type`, `module`) VALUES (6, 'Main Menu', '', 'menus_1', 'Module', 'Menus');
INSERT INTO `hd_blocks_modules` (`id`, `name`, `settings`, `param`, `type`, `module`) VALUES (7, 'Home Slider', '', 'sliders_7', 'Module', 'Sliders');
INSERT INTO `hd_blocks_modules` (`id`, `name`, `settings`, `param`, `type`, `module`) VALUES (8, 'Information', '', 'menus_8', 'Module', 'Menus');
INSERT INTO `hd_blocks_modules` (`id`, `name`, `settings`, `param`, `type`, `module`) VALUES (9, 'Shared Hosting', '', 'items_12', 'Module', 'Items');
INSERT INTO `hd_blocks_modules` (`id`, `name`, `settings`, `param`, `type`, `module`) VALUES (10, 'Website Packages', '', 'items_13', 'Module', 'Items');


#
# TABLE STRUCTURE FOR: hd_blocks_pages
#

DROP TABLE IF EXISTS `hd_blocks_pages`;

CREATE TABLE `hd_blocks_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `mode` varchar(10) NOT NULL DEFAULT 'show',
  `theme` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (48, 10, 'home', 'show', 'original', 'Domains');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (49, 10, 'domain_registration', 'show', 'original', 'Domains');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (50, 21, 'domain_registration', 'show', 'original', 'Domains');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (73, 34, 'home', 'show', 'original', 'Sliders');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (74, 35, 'all', 'hide', 'original', 'Menus');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (75, 36, 'all', 'hide', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (76, 37, 'all', 'hide', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (77, 38, 'all', 'hide', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (78, 39, 'all', 'hide', 'original', 'Menus');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (80, 40, 'home', 'show', 'original', 'Items');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (82, 42, 'all', 'hide', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (83, 43, 'packages', 'show', 'original', 'Items');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (84, 44, 'layouts', 'show', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (85, 45, 'layouts', 'show', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (86, 46, 'packages', 'show', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (87, 47, 'contact', 'show', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (88, 48, 'contact', 'show', 'original', 'Block');
INSERT INTO `hd_blocks_pages` (`id`, `block_id`, `page`, `mode`, `theme`, `module`) VALUES (92, 51, 'all', 'hide', 'original', 'Block');


#
# TABLE STRUCTURE FOR: hd_captcha
#

DROP TABLE IF EXISTS `hd_captcha`;

CREATE TABLE `hd_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(16) COLLATE utf8_unicode_ci DEFAULT '0',
  `word` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_categories
#

DROP TABLE IF EXISTS `hd_categories`;

CREATE TABLE `hd_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `module` varchar(32) DEFAULT 'expenses',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (8, 'Domains', 0, 'items');
INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (9, 'Hosting', 0, 'items');
INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (10, 'Products & Services', 0, 'items');
INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (12, 'Shared Hosting', 9, 'items');
INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (13, 'Website Packages', 10, 'items');
INSERT INTO `hd_categories` (`id`, `cat_name`, `parent`, `module`) VALUES (14, 'Domains', 8, 'items');


#
# TABLE STRUCTURE FOR: hd_companies
#

DROP TABLE IF EXISTS `hd_companies`;

CREATE TABLE `hd_companies` (
  `co_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_ref` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `individual` tinyint(4) DEFAULT 0,
  `transaction_value` decimal(10,2) DEFAULT 0.00,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary_contact` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_email` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_fax` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VAT` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_companies` (`co_id`, `company_ref`, `individual`, `transaction_value`, `company_name`, `primary_contact`, `company_email`, `company_phone`, `company_mobile`, `company_fax`, `company_address`, `company_address_two`, `company_website`, `language`, `city`, `state`, `currency`, `country`, `VAT`, `date_added`, `zip`, `notes`) VALUES (1, '8412593', 0, '0.00', 'Hosting Domain', '1', 'demo@hostingdomain.co.za', NULL, NULL, NULL, 'Demo, Codecanyon.', '', NULL, '', NULL, NULL, 'USD', NULL, '', '2020-03-14 11:56:29', NULL, NULL);


#
# TABLE STRUCTURE FOR: hd_config
#

DROP TABLE IF EXISTS `hd_config`;

CREATE TABLE `hd_config` (
  `config_key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('2checkout_private_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('2checkout_publishable_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('2checkout_seller_id', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('accept_coin', 'BTC');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('active_theme', 'original');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('allowed_files', 'gif|png|jpeg|jpg|pdf|doc|txt|docx|xls|zip|rar|xls|mp4');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('allow_client_registration', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('allow_js_php_blocks', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('automatic_activation', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('automatic_email_on_recur', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('auto_backup_db', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('auto_close_ticket', '30');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('beta_updates', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('billing_email', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('billing_email_name', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('bitcoin_active', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('bitcoin_address', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('bitcoin_api_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('bitcoin_live', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('build', '0');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('button_color', 'success');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('captcha_login', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('captcha_registration', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('cart', 'php');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('chart_color', '#11A7DB');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('coinpayments_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('coinpayments_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('coinpayments_private_key', '8395262B2f59424A638C839ad8AE7dFF29872d1E69c3d9af1bc1c57fEf5ac388');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('coinpayments_public_key', '161eb244ecf8abef157cc681bbc7649aabab1e9151168eb54e74540a85b15f08');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_address', 'No 1, Official Building, Sample Street');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_address_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_city', 'Richmond');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_city_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_country', 'Canada');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_country_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_domain', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_domain_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_email', 'support@hostingbilling.net');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_email_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_fax', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_fax_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_id_prefix', 'COM');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_legal_name', 'Hosting Billing');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_legal_name_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_logo', 'logo.png');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_mobile', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_mobile_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_name', 'Hosting Billing');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_name_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_phone', '+555 555 555');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_phone_2', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_phone_2_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_phone_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_registration', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_registration_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_state', 'British Columbia');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_state_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_vat', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_vat_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_zip_code', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('company_zip_code_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('contact_person', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('contact_person_french', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('contact_sidebar_right', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('cron_key', 'FHF6545AV75223G97JB17GKGSH89');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('cron_last_run', 'a:11:{s:14:\"cron_recurring\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:31:\"There are no recurring invoices\";}s:13:\"cron_projects\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:29:\"There are no overdue projects\";}s:13:\"cron_invoices\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:29:\"There are no overdue invoices\";}s:13:\"cron_outgoing\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:28:\"There are no outgoing emails\";}s:18:\"cron_close_tickets\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:29:\"There are no inactive tickets\";}s:14:\"cron_backup_db\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:31:\"Database backed up successfully\";}s:11:\"cron_xrates\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:22:\"Exchange rates updated\";}s:18:\"cron_fetch_tickets\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:15:\"Tickets fetched\";}s:12:\"cron_hosting\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:26:\"There are no renewals due.\";}s:16:\"cron_suspensions\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:29:\"There are no suspensions due.\";}s:17:\"cron_terminations\";a:2:{s:7:\"success\";b:1;s:6:\"result\";s:30:\"There are no terminations due.\";}}');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('currency_decimals', '2');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('currency_position', 'before');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('date_format', '%Y-%m-%d');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('date_php_format', 'Y-m-d');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('date_picker_format', 'yyyy-mm-dd');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('decimal_separator', '.');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_currency', 'USD');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_currency_symbol', '$');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_language', 'english');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_project_settings', '{\"show_team_members\":\"off\",\"show_milestones\":\"on\",\"show_project_tasks\":\"on\",\"show_project_files\":\"on\",\"show_timesheets\":\"off\",\"show_project_bugs\":\"on\",\"show_project_history\":\"off\",\"show_project_calendar\":\"on\",\"show_project_comments\":\"on\",\"show_project_links\":\"on\",\"client_add_tasks\":\"on\",\"show_project_gantt\":\"on\",\"show_project_hours\":\"on\"}');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_tax', '14.00');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_tax2', '0.00');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('default_terms', 'Thank you for your business. Please process this invoice before the due date.');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('demo_mode', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('developer', 'ig63Yd/+yuA8127gEyTz9TY4pnoeKq8dtocVP44+BJvtlRp8Vqcetwjk51dhSB6Rx8aVIKOPfUmNyKGWK7C/gg==');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('disable_emails', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('display_invoice_badge', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domainscoza_apikey', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domainscoza_live', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_address_1', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_address_2', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_city', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_company', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_country', 'South Africa');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_email', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_firstname', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_lastname', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_phone', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_state', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_admin_zip', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('domain_checker', 'default');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('email_account_details', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('email_invoice_message', 'Hello {CLIENT}<br>Here is the invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('email_piping', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('email_staff_tickets', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('enable_languages', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('file_max_size', '80000');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('increment_invoice_number', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('installed', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('instamojo_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('instamojo_api_key', 'test_e1aca867f696f9d889b63c0f4e1');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('instamojo_hash', '44532b09bd374481b58ab65954029367');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('instamojo_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('instamojo_oath_token', 'test_8ba6a245f5b4e94f54d2c515cbc');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoices_due_after', '7');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoices_due_before', '7');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_color', '#53B567');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_footer', 'Thank you.');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_language', 'en');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_logo', 'invoice_logo.png');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_logo_height', '72');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_logo_width', '210.433');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_prefix', 'INV');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('invoice_start_no', '1');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('languages', 'afar');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('last_check', '1585557268');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('last_seen_activities', '1588776275');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('locale', 'en_GB');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('login_bg', 'bg_login.jpg');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('login_title', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('logo_or_icon', 'logo_title');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mailbox', 'INBOX');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_encryption', 'tls');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_flags', '/novalidate-cert');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_imap', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_imap_host', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_password', 'df13a5f137e01490a9c3ed278f16d9bf57053fc2faa80bbfdc10d2254aa1353c872fd28cbc40420113be96ad99dc1fa617183a9a996e9db58c95933b1324a9eb48ebQ0qTGFQFO7bDfId1YXI=');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_port', '993');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_search', 'UNSEEN');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_ssl', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mail_username', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mollie_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mollie_api_key', 'test_G7meUPuywH8GGBxn57fEVjQJwgafMQ');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('mollie_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('namecheap_apikey', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('namecheap_live', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('nameserver_five', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('nameserver_four', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('nameserver_one', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('nameserver_three', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('nameserver_two', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('notify_payment_received', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('notify_ticket_closed', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('notify_ticket_reopened', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('notify_ticket_reply', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('payfast_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('payfast_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('payfast_merchant_id', '10018446');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('payfast_merchant_key', 'untw67wiis04u');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('payfast_passphrase', 'SomeString-123_Random');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_cancel_url', 'paypal/cancel');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_email', 'support@hostingbilling.net');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_ipn_url', 'paypal/t_ipn/ipn');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('paypal_success_url', 'paypal/success');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('pdf_engine', 'invoicr');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('protocol', 'mail');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('purchase_code', '00000000-0000-0000-0000-000000000000');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('quantity_decimals', '0');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('razorpay_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('razorpay_api_key', 'rzp_test_AsdXAaoJRFNySw');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('razorpay_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('recaptcha_public_key', '6LexGeIUAAAAAJ70v7Am0fGQcgHDmresRKP2WOw5');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('reminder_message', 'Hello {CLIENT}<br>This is a friendly reminder to pay your invoice of {CURRENCY} {AMOUNT}<br>You can view the invoice online at:<br>{LINK}<br>Best Regards,<br>{COMPANY}');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('remote_login_expires', '72');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('resellerclub_apikey', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('resellerclub_live', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('resellerclub_resellerid', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('reset_key', 'FHF6545AV75223G97JB17GKGSH89');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('rows_per_table', '25');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('settings', 'system');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('show_invoice_tax', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('show_login_image', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('show_only_logo', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('show_time_ago', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('sidebar_theme', 'dark');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('site_appleicon', 'logo_favicon.png');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('site_author', 'Hosting Domain');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('site_desc', 'Hosting Billing is a domain and web hosting billing system.');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('site_favicon', 'logo_favicon.png');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('site_icon', 'fa-globe');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('smtp_encryption', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('smtp_host', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('smtp_pass', 'd01d4ece2a24b9c3a38ba622e7468dfd7154a5d3d8f87bbd0040f32dddc578169c051d9b49b784c545153cb7f9d6f9e0136ae07f9835f609a86a47d0afbed1cfnmvIn7+9LFt21yHoC/KSXQ==');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('smtp_port', '587');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('smtp_user', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('stop_timer_logout', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('stripe_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('stripe_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('stripe_private_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('stripe_public_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('support_email', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('support_email_name', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('suspend_after', '3');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('suspend_due', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('swap_to_from', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('system_font', 'ubuntu');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('tax_decimals', '0');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('terminate_after', '10');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('terminate_due', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('theme_color', 'primary');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('thousand_separator', ',');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('ticket_default_department', '2');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('ticket_start_no', '1');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('timezone', 'Africa/Abidjan');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('top_bar_color', 'skin-black');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('two_checkout_active', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('two_checkout_live', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('updates', '1');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('update_xrates', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('use_alternate_emails', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('use_recaptcha', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('use_whoisxmlapi', 'FALSE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('valid_license', 'TRUE');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('website_name', 'Hosting Billing');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('website_name_french', 'ABC');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('whoisxmlapi_key', '');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('xrates_app_id', '76ab484d43b141239ab622283ca707cf');
INSERT INTO `hd_config` (`config_key`, `value`) VALUES ('xrates_check', '2020-06-29');


#
# TABLE STRUCTURE FOR: hd_countries
#

DROP TABLE IF EXISTS `hd_countries`;

CREATE TABLE `hd_countries` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (1, 'Afghanistan', '93', 'AF / AFG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (2, 'Albania', '355', 'AL / ALB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (3, 'Algeria', '213', 'DZ / DZA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (4, 'American Samoa', '1-684', 'AS / ASM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (5, 'Andorra', '376', 'AD / AND');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (6, 'Angola', '244', 'AO / AGO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (7, 'Anguilla', '1-264', 'AI / AIA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (8, 'Antarctica', '672', 'AQ / ATA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (9, 'Antigua and Barbuda', '1-268', 'AG / ATG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (10, 'Argentina', '54', 'AR / ARG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (11, 'Armenia', '374', 'AM / ARM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (12, 'Aruba', '297', 'AW / ABW');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (13, 'Australia', '61', 'AU / AUS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (14, 'Austria', '43', 'AT / AUT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (15, 'Azerbaijan', '994', 'AZ / AZE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (16, 'Bahamas', '1-242', 'BS / BHS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (17, 'Bahrain', '973', 'BH / BHR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (18, 'Bangladesh', '880', 'BD / BGD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (19, 'Barbados', '1-246', 'BB / BRB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (20, 'Belarus', '375', 'BY / BLR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (21, 'Belgium', '32', 'BE / BEL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (22, 'Belize', '501', 'BZ / BLZ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (23, 'Benin', '229', 'BJ / BEN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (24, 'Bermuda', '1-441', 'BM / BMU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (25, 'Bhutan', '975', 'BT / BTN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (26, 'Bolivia', '591', 'BO / BOL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (27, 'Bosnia and Herzegovina', '387', 'BA / BIH');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (28, 'Botswana', '267', 'BW / BWA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (29, 'Brazil', '55', 'BR / BRA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (30, 'British Indian Ocean Territory', '246', 'IO / IOT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (31, 'British Virgin Islands', '1-284', 'VG / VGB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (32, 'Brunei', '673', 'BN / BRN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (33, 'Bulgaria', '359', 'BG / BGR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (34, 'Burkina Faso', '226', 'BF / BFA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (35, 'Burundi', '257', 'BI / BDI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (36, 'Cambodia', '855', 'KH / KHM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (37, 'Cameroon', '237', 'CM / CMR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (38, 'Canada', '1', 'CA / CAN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (39, 'Cape Verde', '238', 'CV / CPV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (40, 'Cayman Islands', '1-345', 'KY / CYM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (41, 'Central African Republic', '236', 'CF / CAF');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (42, 'Chad', '235', 'TD / TCD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (43, 'Chile', '56', 'CL / CHL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (44, 'China', '86', 'CN / CHN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (45, 'Christmas Island', '61', 'CX / CXR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (46, 'Cocos Islands', '61', 'CC / CCK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (47, 'Colombia', '57', 'CO / COL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (48, 'Comoros', '269', 'KM / COM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (49, 'Cook Islands', '682', 'CK / COK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (50, 'Costa Rica', '506', 'CR / CRI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (51, 'Croatia', '385', 'HR / HRV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (52, 'Cuba', '53', 'CU / CUB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (53, 'Curacao', '599', 'CW / CUW');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (54, 'Cyprus', '357', 'CY / CYP');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (55, 'Czech Republic', '420', 'CZ / CZE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (56, 'Democratic Republic of the Congo', '243', 'CD / COD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (57, 'Denmark', '45', 'DK / DNK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (58, 'Djibouti', '253', 'DJ / DJI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (59, 'Dominica', '1-767', 'DM / DMA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (60, 'Dominican Republic', '1-809, 1-829, 1-849', 'DO / DOM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (61, 'East Timor', '670', 'TL / TLS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (62, 'Ecuador', '593', 'EC / ECU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (63, 'Egypt', '20', 'EG / EGY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (64, 'El Salvador', '503', 'SV / SLV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (65, 'Equatorial Guinea', '240', 'GQ / GNQ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (66, 'Eritrea', '291', 'ER / ERI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (67, 'Estonia', '372', 'EE / EST');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (68, 'Ethiopia', '251', 'ET / ETH');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (69, 'Falkland Islands', '500', 'FK / FLK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (70, 'Faroe Islands', '298', 'FO / FRO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (71, 'Fiji', '679', 'FJ / FJI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (72, 'Finland', '358', 'FI / FIN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (73, 'France', '33', 'FR / FRA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (74, 'French Polynesia', '689', 'PF / PYF');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (75, 'Gabon', '241', 'GA / GAB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (76, 'Gambia', '220', 'GM / GMB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (77, 'Georgia', '995', 'GE / GEO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (78, 'Germany', '49', 'DE / DEU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (79, 'Ghana', '233', 'GH / GHA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (80, 'Gibraltar', '350', 'GI / GIB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (81, 'Greece', '30', 'GR / GRC');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (82, 'Greenland', '299', 'GL / GRL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (83, 'Grenada', '1-473', 'GD / GRD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (84, 'Guam', '1-671', 'GU / GUM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (85, 'Guatemala', '502', 'GT / GTM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (86, 'Guernsey', '44-1481', 'GG / GGY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (87, 'Guinea', '224', 'GN / GIN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (88, 'Guinea-Bissau', '245', 'GW / GNB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (89, 'Guyana', '592', 'GY / GUY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (90, 'Haiti', '509', 'HT / HTI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (91, 'Honduras', '504', 'HN / HND');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (92, 'Hong Kong', '852', 'HK / HKG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (93, 'Hungary', '36', 'HU / HUN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (94, 'Iceland', '354', 'IS / ISL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (95, 'India', '91', 'IN / IND');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (96, 'Indonesia', '62', 'ID / IDN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (97, 'Iran', '98', 'IR / IRN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (98, 'Iraq', '964', 'IQ / IRQ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (99, 'Ireland', '353', 'IE / IRL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (100, 'Isle of Man', '44-1624', 'IM / IMN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (101, 'Israel', '972', 'IL / ISR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (102, 'Italy', '39', 'IT / ITA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (103, 'Ivory Coast', '225', 'CI / CIV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (104, 'Jamaica', '1-876', 'JM / JAM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (105, 'Japan', '81', 'JP / JPN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (106, 'Jersey', '44-1534', 'JE / JEY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (107, 'Jordan', '962', 'JO / JOR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (108, 'Kazakhstan', '7', 'KZ / KAZ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (109, 'Kenya', '254', 'KE / KEN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (110, 'Kiribati', '686', 'KI / KIR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (111, 'Kosovo', '383', 'XK / XKX');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (112, 'Kuwait', '965', 'KW / KWT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (113, 'Kyrgyzstan', '996', 'KG / KGZ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (114, 'Laos', '856', 'LA / LAO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (115, 'Latvia', '371', 'LV / LVA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (116, 'Lebanon', '961', 'LB / LBN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (117, 'Lesotho', '266', 'LS / LSO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (118, 'Liberia', '231', 'LR / LBR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (119, 'Libya', '218', 'LY / LBY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (120, 'Liechtenstein', '423', 'LI / LIE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (121, 'Lithuania', '370', 'LT / LTU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (122, 'Luxembourg', '352', 'LU / LUX');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (123, 'Macau', '853', 'MO / MAC');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (124, 'Macedonia', '389', 'MK / MKD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (125, 'Madagascar', '261', 'MG / MDG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (126, 'Malawi', '265', 'MW / MWI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (127, 'Malaysia', '60', 'MY / MYS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (128, 'Maldives', '960', 'MV / MDV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (129, 'Mali', '223', 'ML / MLI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (130, 'Malta', '356', 'MT / MLT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (131, 'Marshall Islands', '692', 'MH / MHL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (132, 'Mauritania', '222', 'MR / MRT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (133, 'Mauritius', '230', 'MU / MUS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (134, 'Mayotte', '262', 'YT / MYT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (135, 'Mexico', '52', 'MX / MEX');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (136, 'Micronesia', '691', 'FM / FSM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (137, 'Moldova', '373', 'MD / MDA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (138, 'Monaco', '377', 'MC / MCO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (139, 'Mongolia', '976', 'MN / MNG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (140, 'Montenegro', '382', 'ME / MNE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (141, 'Montserrat', '1-664', 'MS / MSR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (142, 'Morocco', '212', 'MA / MAR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (143, 'Mozambique', '258', 'MZ / MOZ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (144, 'Myanmar', '95', 'MM / MMR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (145, 'Namibia', '264', 'NA / NAM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (146, 'Nauru', '674', 'NR / NRU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (147, 'Nepal', '977', 'NP / NPL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (148, 'Netherlands', '31', 'NL / NLD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (149, 'Netherlands Antilles', '599', 'AN / ANT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (150, 'New Caledonia', '687', 'NC / NCL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (151, 'New Zealand', '64', 'NZ / NZL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (152, 'Nicaragua', '505', 'NI / NIC');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (153, 'Niger', '227', 'NE / NER');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (154, 'Nigeria', '234', 'NG / NGA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (155, 'Niue', '683', 'NU / NIU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (156, 'North Korea', '850', 'KP / PRK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (157, 'Northern Mariana Islands', '1-670', 'MP / MNP');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (158, 'Norway', '47', 'NO / NOR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (159, 'Oman', '968', 'OM / OMN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (160, 'Pakistan', '92', 'PK / PAK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (161, 'Palau', '680', 'PW / PLW');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (162, 'Palestine', '970', 'PS / PSE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (163, 'Panama', '507', 'PA / PAN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (164, 'Papua New Guinea', '675', 'PG / PNG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (165, 'Paraguay', '595', 'PY / PRY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (166, 'Peru', '51', 'PE / PER');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (167, 'Philippines', '63', 'PH / PHL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (168, 'Pitcairn', '64', 'PN / PCN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (169, 'Poland', '48', 'PL / POL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (170, 'Portugal', '351', 'PT / PRT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (171, 'Puerto Rico', '1-787, 1-939', 'PR / PRI');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (172, 'Qatar', '974', 'QA / QAT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (173, 'Republic of the Congo', '242', 'CG / COG');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (174, 'Reunion', '262', 'RE / REU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (175, 'Romania', '40', 'RO / ROU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (176, 'Russia', '7', 'RU / RUS');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (177, 'Rwanda', '250', 'RW / RWA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (178, 'Saint Barthelemy', '590', 'BL / BLM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (179, 'Saint Helena', '290', 'SH / SHN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (180, 'Saint Kitts and Nevis', '1-869', 'KN / KNA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (181, 'Saint Lucia', '1-758', 'LC / LCA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (182, 'Saint Martin', '590', 'MF / MAF');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (183, 'Saint Pierre and Miquelon', '508', 'PM / SPM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (184, 'Saint Vincent and the Grenadines', '1-784', 'VC / VCT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (185, 'Samoa', '685', 'WS / WSM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (186, 'San Marino', '378', 'SM / SMR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (187, 'Sao Tome and Principe', '239', 'ST / STP');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (188, 'Saudi Arabia', '966', 'SA / SAU');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (189, 'Senegal', '221', 'SN / SEN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (190, 'Serbia', '381', 'RS / SRB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (191, 'Seychelles', '248', 'SC / SYC');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (192, 'Sierra Leone', '232', 'SL / SLE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (193, 'Singapore', '65', 'SG / SGP');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (194, 'Sint Maarten', '1-721', 'SX / SXM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (195, 'Slovakia', '421', 'SK / SVK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (196, 'Slovenia', '386', 'SI / SVN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (197, 'Solomon Islands', '677', 'SB / SLB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (198, 'Somalia', '252', 'SO / SOM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (199, 'South Africa', '27', 'ZA / ZAF');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (200, 'South Korea', '82', 'KR / KOR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (201, 'South Sudan', '211', 'SS / SSD');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (202, 'Spain', '34', 'ES / ESP');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (203, 'Sri Lanka', '94', 'LK / LKA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (204, 'Sudan', '249', 'SD / SDN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (205, 'Suriname', '597', 'SR / SUR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (206, 'Svalbard and Jan Mayen', '47', 'SJ / SJM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (207, 'Swaziland', '268', 'SZ / SWZ');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (208, 'Sweden', '46', 'SE / SWE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (209, 'Switzerland', '41', 'CH / CHE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (210, 'Syria', '963', 'SY / SYR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (211, 'Taiwan', '886', 'TW / TWN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (212, 'Tajikistan', '992', 'TJ / TJK');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (213, 'Tanzania', '255', 'TZ / TZA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (214, 'Thailand', '66', 'TH / THA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (215, 'Togo', '228', 'TG / TGO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (216, 'Tokelau', '690', 'TK / TKL');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (217, 'Tonga', '676', 'TO / TON');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (218, 'Trinidad and Tobago', '1-868', 'TT / TTO');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (219, 'Tunisia', '216', 'TN / TUN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (220, 'Turkey', '90', 'TR / TUR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (221, 'Turkmenistan', '993', 'TM / TKM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (222, 'Turks and Caicos Islands', '1-649', 'TC / TCA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (223, 'Tuvalu', '688', 'TV / TUV');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (224, 'U.S. Virgin Islands', '1-340', 'VI / VIR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (225, 'Uganda', '256', 'UG / UGA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (226, 'Ukraine', '380', 'UA / UKR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (227, 'United Arab Emirates', '971', 'AE / ARE');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (228, 'United Kingdom', '44', 'GB / GBR');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (229, 'United States', '1', 'US / USA');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (230, 'Uruguay', '598', 'UY / URY');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (231, 'Uzbekistan', '998', 'UZ / UZB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (232, 'Vanuatu', '678', 'VU / VUT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (233, 'Vatican', '379', 'VA / VAT');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (234, 'Venezuela', '58', 'VE / VEN');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (235, 'Vietnam', '84', 'VN / VNM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (236, 'Wallis and Futuna', '681', 'WF / WLF');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (237, 'Western Sahara', '212', 'EH / ESH');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (238, 'Yemen', '967', 'YE / YEM');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (239, 'Zambia', '260', 'ZM / ZMB');
INSERT INTO `hd_countries` (`id`, `value`, `phone`, `code`) VALUES (240, 'Zimbabwe', '263', 'ZW / ZWE');


#
# TABLE STRUCTURE FOR: hd_currencies
#

DROP TABLE IF EXISTS `hd_currencies`;

CREATE TABLE `hd_currencies` (
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrate` decimal(12,5) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('AED', 'United Arab Emirates Dirham', 'د.إ', '3.67320');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('AUD', 'Australian Dollar', '$', '1.45505');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('BRL', 'Brazilian Real', 'R$', '5.25230');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('CAD', 'Canadian Dollar', '$', '1.36669');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('CHF', 'Swiss Franc', 'Fr', '0.94714');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('CLP', 'Chilean Peso', '$', '821.50021');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('CNY', 'Chinese Yuan', '¥', '7.07830');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('CZK', 'Czech Koruna', 'Kč', '23.80400');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('DKK', 'Danish Krone', 'Kr', '6.62950');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('EUR', 'Euro', '€', '0.88953');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('GBP', 'British Pound', '£', '0.80861');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('HKD', 'Hong Kong Dollar', '$', '7.75050');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('HUF', 'Hungarian Forint', 'Ft', '316.07000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('IDR', 'Indonesian Rupiah', 'Rp', '14392.75000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('ILS', 'Israeli New Shekel', '₪', '3.43109');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('INR', 'Indian Rupee', '₹', '75.58249');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('JPY', 'Japanese Yen', '¥', '107.08533');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('KES', 'Kenya shillings', ' KSh', '106.45000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('KN', 'Hrvatska kuna', 'kn', '7.00000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('KRW', 'Korean Won', '₩', '1200.96000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('MXN', 'Mexican Peso', '$', '23.04090');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('MYR', 'Malaysian Ringgit', 'RM', '4.28700');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('NOK', 'Norwegian Krone', 'kr', '9.68859');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('NZD', 'New Zealand Dollar', '$', '1.55594');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('PHP', 'Philippine Peso', '₱', '49.88038');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('PKR', 'Pakistan Rupee', '₨', '167.55446');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('PLN', 'Polish Zloty', 'zł', '3.97498');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('RUB', 'Russian Ruble', '₽', '69.79800');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('SEK', 'Swedish Krona', 'kr', '9.30490');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('SGD', 'Singapore Dollar', '$', '1.39351');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('THB', 'Thai Baht', '฿', '30.89000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('TRY', 'Turkish Lira', '₺', '6.85490');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('TWD', 'Taiwan Dollar', '$', '29.51550');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('USD', 'US Dollar', '$', '1.00000');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('VEF', 'Bolívar Fuerte', 'Bs.', '248487.64224');
INSERT INTO `hd_currencies` (`code`, `name`, `symbol`, `xrate`) VALUES ('ZAR', 'South African Rand', 'R', '17.32480');


#
# TABLE STRUCTURE FOR: hd_departments
#

DROP TABLE IF EXISTS `hd_departments`;

CREATE TABLE `hd_departments` (
  `deptid` int(10) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depthidden` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_departments` (`deptid`, `deptname`, `depthidden`) VALUES (2, 'Support', NULL);
INSERT INTO `hd_departments` (`deptid`, `deptname`, `depthidden`) VALUES (5, 'kknjk', NULL);


#
# TABLE STRUCTURE FOR: hd_domain_registrar
#

DROP TABLE IF EXISTS `hd_domain_registrar`;

CREATE TABLE `hd_domain_registrar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `registrar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id_2` (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: hd_email_templates
#

DROP TABLE IF EXISTS `hd_email_templates`;

CREATE TABLE `hd_email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_group` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_body` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (1, 'registration', 'Registration successful', '                                        <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px;\" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>New Account</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {USERNAME},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Thank you for registering at {SITE_NAME}. Please find your login details below:<br>Home page: <a href=\"{SITE_URL}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>{SITE_NAME}</strong></a><br><br>Link doesn\'t work? Copy the link below and paste it in your browser address bar:<br><br>{SITE_URL}<br><br>			Your username: {USERNAME}<br>			Your email address: {EMAIL}<br>			Your password: {PASSWORD}<br><br><br>										Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (2, 'forgot_password', 'Forgot Password', '                    <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px;\" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>New Password</h4>\r\n																	<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Forgot your password, huh? No big deal.<br>To create a new password, just follow this link:<br>			<a href=\"{PASS_KEY_URL}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>Create new password</strong></a><br><br>Link doesn\'t work? Copy the link below and paste it in your browser address bar:<br>			{PASS_KEY_URL}<br><br>			You received this email, because it was requested by a {SITE_NAME} user.This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.<br><br>Thank you,<br><br>										Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (3, 'change_email', 'Change Email', '                    <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px; \" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Change Email</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {NEW_EMAIL},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			You have changed your email address for {SITE_NAME}.<br>Please follow the link below to confirm your new email address:<br>			<a href=\"{NEW_EMAIL_KEY_URL}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>Confirm Email</strong></a><br><br>			Link doesn\'t work? Copy the link below and paste it in your browser address bar:<br>			{NEW_EMAIL_KEY_URL}<br><br>			Your email address: {NEW_EMAIL}<br><br>			You received this email, because it was requested by a {SITE_NAME} user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. After a short time, the request will be removed from the system.<br><br>Thank you,<br><br>										Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (4, 'activate_account', 'Activate Account', '                                                                                <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px; \" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Activate Account</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {USERNAME},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Thanks for registering at {SITE_NAME}.&nbsp; Please follow the link below to verify your email address:<br>			<a href=\"{ACTIVATE_URL}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>Complete Registration</strong></a><br><br>			Link doesn\'t work? Copy the link below and paste it in your&nbsp; browser address bar:<br>			{ACTIVATE_URL}<br>			Please verify your email within {ACTIVATION_PERIOD} hours, otherwise your registration will become invalid and you will have to register again.<br><br>			Your username: {USERNAME}<br>			Your email address: {EMAIL}<br>			Your password: {PASSWORD}<br><br><br>																					Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (5, 'reset_password', 'Reset Password', '                    <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px;\" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>New Password</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {USERNAME},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			You have successfully changed your password.<br><br>Your username: {USERNAME}<br>Your email address: {EMAIL}<br>Your new password: {NEW_PASSWORD}<br><br><br>										Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (16, 'payment_email', 'Payment Received', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">\r\n\r\n	<tbody>\r\n\r\n		<tr>\r\n\r\n			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n				<tbody>\r\n\r\n					<tr>\r\n\r\n						<td height=\"50\" width=\"600\">&nbsp;</td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">\r\n\r\n							<tbody>\r\n\r\n								<tr>\r\n\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n\r\n								</tr>\r\n\r\n								<tr>\r\n\r\n									<td width=\"560\">									<h4>Invoice {REF} Payment</h4>\r\n\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Dear Customer,</p>\r\n\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">								We have received your payment of {INVOICE_CURRENCY}{PAID_AMOUNT}.<br>								Thank you for your Payment and business. We look forward to working with you again.<br>								--------------------------<br>																		<br><br>																		Best Regards,<br>																		{SITE_NAME}</p>\r\n\r\n									</td>\r\n\r\n								</tr>\r\n\r\n								<tr>\r\n\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n\r\n								</tr>\r\n\r\n							</tbody>\r\n\r\n						</table>\r\n\r\n						</td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td height=\"10\" width=\"600\">&nbsp;</td>\r\n\r\n					</tr>\r\n\r\n					<tr>\r\n\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n\r\n					</tr>\r\n\r\n				</tbody>\r\n\r\n			</table>\r\n\r\n			</td>\r\n\r\n		</tr>\r\n\r\n	</tbody>\r\n\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (17, 'invoice_message', 'Customer Invoice', '                                                            <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px;\" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\"> </td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									\r\n									<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">Dear {CLIENT},<br><br>This is a notice that invoice {REF} has been generated.<br><br>Invoice Reference: {REF}<br>Amount Due: {CURRENCY}{AMOUNT}<br><br>You can use the link below to view and pay the invoice.<br><a href=\"{INVOICE_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Invoice</strong></a><br>									<br>									Best Regards,<br>									{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\"> </td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (18, 'invoice_reminder', 'Invoice Reminder', '                    <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px;\" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Invoice {REF} Reminder</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Dear {CLIENT},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">									This is a friendly reminder to pay your invoice of {CURRENCY}{AMOUNT}<br>									You can view the invoice online at:<br>																		<a href=\"{INVOICE_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Invoice</strong>									</a><br><br>																		Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (19, 'message_received', 'Message Received', '<table align=\"center\" id=\"backgroundTable\">\n	<tbody>\n		<tr>\n			<td valign=\"top\">			<table align=\"center\">\n				<tbody>\n					<tr>\n						<td height=\"50\" width=\"600\">&nbsp;</td>\n					</tr>\n					<tr>\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\n					</tr>\n					<tr>\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px; \">\n							<tbody>\n								<tr>\n									<td height=\"10\" width=\"560\">&nbsp;</td>\n								</tr>\n								<tr>\n									<td width=\"560\">									<h4>New message received</h4>\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {RECIPIENT},</p>\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">You have received a message from <strong>{SENDER}</strong>.<br>------------------------------------------------------------------:<br><span style=\"font-style:italic;\">{MESSAGE}</span><br><br><a href=\"{SITE_URL}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Message</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>\n									</td>\n								</tr>\n								<tr>\n									<td height=\"10\" width=\"560\">&nbsp;</td>\n								</tr>\n							</tbody>\n						</table>\n						</td>\n					</tr>\n					<tr>\n						<td height=\"10\" width=\"600\">&nbsp;</td>\n					</tr>\n					<tr>\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\n					</tr>\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (21, 'ticket_staff_email', 'Ticket [SUBJECT]', '                    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				<tbody>\r\n					<tr>\r\n						<td height=\"50\" width=\"600\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">\r\n							<tbody>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>New Ticket</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {USER_EMAIL},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">Ticket <strong>{SUBJECT}</strong> has been opened.<br>You may view the ticket by clicking on the following link:<br>Client Email : {REPORTER_EMAIL}<br><br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"10\" width=\"600\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (22, 'ticket_client_email', 'Ticket [SUBJECT]', '                                                                                <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				<tbody>\r\n					<tr>\r\n						<td height=\"50\" width=\"600\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">\r\n							<tbody>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\"> </td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Ticket Opened</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {CLIENT_EMAIL},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Your ticket has been opened with us.<br>Ticket <strong>{SUBJECT}</strong><br>Status : Open<br>Click on the below link to see the ticket details and post replies: <br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\"> </td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"10\" width=\"600\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (23, 'ticket_reply_email', 'Ticket [SUBJECT] response', '                                                                                <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">	<tbody>		<tr>			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">				<tbody>					<tr>						<td height=\"50\" width=\"600\">&nbsp;</td>					</tr>					<tr>						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>					</tr>					<tr>						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">							<tbody>								<tr>									<td height=\"10\" width=\"560\">&nbsp;</td>								</tr>								<tr>									<td width=\"560\">									<h4>Ticket Response</h4>									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi There,</p>								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">A new response has been added to Ticket <strong>{SUBJECT}</strong><br><br>Ticket : <strong>#{TICKET_CODE}</strong><br>Status : <strong>{TICKET_STATUS}</strong><br><span style=\"font-style:italic;\">{TICKET_REPLY}</span><br><br>\r\nTo see the response and post additional comments, click on the link below:<br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br>								Best Regards,<br>																		{SITE_NAME}</p>									</td>								</tr>								<tr>									<td height=\"10\" width=\"560\">&nbsp;</td>								</tr>							</tbody>						</table>						</td>					</tr>					<tr>						<td height=\"10\" width=\"600\">&nbsp;</td>					</tr>					<tr>						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>					</tr>				</tbody>			</table>			</td>		</tr>	</tbody></table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (24, 'ticket_closed_email', 'Ticket [SUBJECT] closed', '                    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">	<tbody>		<tr>			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">				<tbody>					<tr>						<td height=\"50\" width=\"600\">&nbsp;</td>					</tr>					<tr>						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>					</tr>					<tr>						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">							<tbody>								<tr>									<td height=\"10\" width=\"560\">&nbsp;</td>								</tr>								<tr>									<td width=\"560\">									<h4>Ticket Closed</h4>									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {REPORTER_EMAIL},</p>								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Ticket <strong>{SUBJECT}</strong> has been closed by <strong>{STAFF_USERNAME}</strong><br>Ticket : <strong>#{TICKET_CODE}</strong><br>Status : <strong>{TICKET_STATUS}</strong><br>To see the responses or open the ticket, click on the link below:<br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>									</td>								</tr>								<tr>									<td height=\"10\" width=\"560\">&nbsp;</td>								</tr>							</tbody>						</table>						</td>					</tr>					<tr>						<td height=\"10\" width=\"600\">&nbsp;</td>					</tr>					<tr>						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>					</tr>				</tbody>			</table>			</td>		</tr>	</tbody></table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (27, 'email_signature', NULL, '                                        Powered by Hosting Domain<br>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (28, 'auto_close_ticket', 'Ticket Auto Closed', '                                        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				<tbody>\r\n					<tr>\r\n						<td height=\"50\" width=\"600\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">\r\n							<tbody>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\"> </td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Ticket Closed</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {REPORTER_EMAIL},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">Ticket <strong>{SUBJECT}</strong> has been auto closed due to inactivity. <br><br>Ticket : <strong>#{TICKET_CODE}</strong><br>Status : <strong>{TICKET_STATUS}</strong><br>To see the responses or open the ticket, click on the link below:<br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\"> </td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"10\" width=\"600\"> </td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (32, 'ticket_reopened_email', 'Ticket [SUBJECT] reopened', '                                                            <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" id=\"backgroundTable\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				<tbody>\r\n					<tr>\r\n						<td height=\"50\" width=\"600\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"90\" style=\"color:#999999\" width=\"600\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td bgcolor=\"whitesmoke\" height=\"200\" style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" valign=\"top\" width=\"600\">						<table align=\"center\" style=\"margin-left:15px;\">\r\n							<tbody>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\">									<h4>Ticket re-opened</h4>\r\n									<p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {RECIPIENT},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Ticket <b>{SUBJECT}</b> was re-opened by <b>{USER}</b>.<br>Status : Open<br>Click on the below link to see the ticket details and post replies: <br><a href=\"{TICKET_LINK}\" style=\"color: #11A7DB; text-decoration: none;\"><strong>View Ticket</strong></a><br><br><br>									Best Regards,									<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"10\" width=\"560\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td height=\"10\" width=\"600\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO `hd_email_templates` (`template_id`, `email_group`, `subject`, `template_body`) VALUES (34, 'hosting_account', 'Hosting Account Information', '                                                                                                                                                                                                                                                                                                                                <table id=\"backgroundTable\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">			<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n				<tbody>\r\n					<tr>\r\n						<td width=\"600\" height=\"50\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"color:#999999\" width=\"600\" height=\"90\">{INVOICE_LOGO}</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"background:whitesmoke; border:1px solid #e0e0e0; font-family:Helvetica,Arial,sans-serif\" width=\"600\" valign=\"top\" height=\"200\" bgcolor=\"whitesmoke\">						<table style=\"margin-left:15px; \" align=\"center\">\r\n							<tbody>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td></tr><tr><td width=\"560\"><p style=\"font-size:12px; font-family:Helvetica,Arial,sans-serif\">Hi {CLIENT},</p>\r\n								<p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\">			Thank you for using {SITE_NAME}. <br>Your hosting account for&nbsp;{DOMAIN} has been activated.</p><h3>ACCOUNT DETAILS</h3><p style=\"font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif\"><b>Username:</b> {ACCOUNT_USERNAME}<br><b>Password:</b> {ACCOUNT_PASSWORD}<br><b>Next Invoice Date</b>: {RENEWAL_DATE}<br><b>Package: </b>{PACKAGE}<br><b>Payment:</b> {RENEWAL}<br><b>Amount:</b> {AMOUNT}<br><br>																					Best Regards,<br>																		{SITE_NAME}</p>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td width=\"560\" height=\"10\">&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td width=\"600\" height=\"10\">&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"right\"><span style=\"font-size:10px; color:#999999; font-family:Helvetica,Arial,sans-serif\">{SIGNATURE}</span></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');


#
# TABLE STRUCTURE FOR: hd_fields
#

DROP TABLE IF EXISTS `hd_fields`;

CREATE TABLE `hd_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `deptid` int(10) NOT NULL,
  `module` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uniqid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `required` int(11) DEFAULT NULL,
  `field_options` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_files
#

DROP TABLE IF EXISTS `hd_files`;

CREATE TABLE `hd_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT 0,
  `file_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ext` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(10) DEFAULT NULL,
  `is_image` int(2) DEFAULT NULL,
  `image_width` int(5) DEFAULT NULL,
  `image_height` int(5) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_formmeta
#

DROP TABLE IF EXISTS `hd_formmeta`;

CREATE TABLE `hd_formmeta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(64) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `meta_key` varchar(64) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `hd_formmeta` (`id`, `module`, `client_id`, `ticket_id`, `field_id`, `meta_key`, `meta_value`) VALUES (1, 'clients', 2, NULL, 1, 'cell', '12345');


#
# TABLE STRUCTURE FOR: hd_hooks
#

DROP TABLE IF EXISTS `hd_hooks`;

CREATE TABLE `hd_hooks` (
  `module` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hook` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `access` int(2) NOT NULL,
  `core` int(2) DEFAULT NULL,
  `visible` int(2) DEFAULT 1,
  `permission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1,
  `last_run` datetime DEFAULT NULL,
  PRIMARY KEY (`module`,`hook`,`access`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_backup_db', '', 'cron_job_admin', 'fa-database', 'auto_backup_database', 'crons/backup_db', 7, 1, 1, 1, '', 1, '2020-06-29 05:19:27');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_close_tickets', '', 'cron_job_admin', 'fa-ticket', 'auto_close_tickets', 'crons/close_tickets', 5, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_fetch_tickets', '', 'cron_job_admin', 'fa-ticket', 'fetch_ticket_emails', 'crons/fetch_tickets', 6, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_hosting', '', 'cron_job_admin', 'fa-server', 'hosting_renewals', 'crons/accounts', 3, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_invoices', '', 'cron_job_admin', 'fa-clock-o', 'overdue_invoices', 'crons/invoices', 3, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_outgoing', '', 'cron_job_admin', 'fa-envelope-o', 'pending_emails', 'crons/outgoing_emails', 4, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_recurring', '', 'cron_job_admin', 'fa-retweet', 'recurring_invoices', 'crons/recur', 1, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_suspensions', '', 'cron_job_admin', 'fa-ban', 'hosting_suspensions', 'crons/suspensions', 3, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_terminations', '', 'cron_job_admin', 'fa-trash', 'hosting_terminations', 'crons/terminations', 3, 1, 1, 1, '', 1, '2020-06-29 05:46:43');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('cron_xrates', '', 'cron_job_admin', 'fa-money', 'open_exchange_rates', 'crons/xrates', 8, 1, 1, 1, '', 1, '2020-06-24 07:07:10');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_accounts', '', 'main_menu_admin', 'fa-server', 'accounts', 'accounts', 3, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_accounts', '', 'main_menu_client', 'fa-server', 'accounts', 'accounts', 4, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_accounts', '', 'main_menu_staff', 'fa-server', 'accounts', 'accounts', 3, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_clients', '', 'main_menu_admin', 'fa-group', 'clients', 'companies', 7, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_clients', '', 'main_menu_staff', 'fa-users', 'clients', 'companies', 6, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_dashboard', '', 'main_menu_admin', 'fa-tachometer', 'dashboard', 'dashboard', 1, 1, 1, 1, '1', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_dashboard', '', 'main_menu_staff', 'fa-tachometer', 'dashboard', 'dashboard', 1, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_domains', '', 'main_menu_admin', 'fa-globe', 'domains', 'domains', 4, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_domains', '', 'main_menu_client', 'fa-globe', 'domains', 'domains', 2, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_domains', '', 'main_menu_staff', 'fa-globe', 'domains', 'domains', 4, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_home', '', 'main_menu_client', 'fa-dashboard', 'dashboard', 'clients', 1, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_invoices', 'menu_sales', 'main_menu_admin', 'fa-money', 'invoices', 'invoices', 5, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_invoices', '', 'main_menu_client', 'fa-list', 'invoices', 'invoices', 5, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_invoices', '', 'main_menu_staff', 'fa-list', 'invoices', 'invoices', 5, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_items', 'menu_sales', 'main_menu_admin', 'fa-align-justify', 'items', 'items', 8, 0, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_orders', '', 'main_menu_admin', 'fa-shopping-basket', 'orders', 'orders', 2, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_orders', '', 'main_menu_client', 'fa-shopping-basket', 'new_order', 'orders/add_order', 7, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_orders', '', 'main_menu_staff', 'fa-shopping-basket', 'orders', 'orders', 2, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_payments', 'menu_sales', 'main_menu_admin', 'fa-credit-card', 'payments', 'payments', 6, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_payments', '', 'main_menu_client', 'fa-money', 'payments', 'payments', 3, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_payments', '', 'main_menu_staff', 'fa-money', 'payments', 'payments', 7, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_reports', '', 'main_menu_admin', 'fa-bar-chart-o', 'reports', 'reports', 13, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_reports_clientinvoices', 'menu_reports', 'main_menu_admin', 'fa-users', 'client_invoices', 'reports/view/invoicesbyclient', 4, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_reports_dashboard', 'menu_reports', 'main_menu_admin', 'fa-tachometer', 'report_dashboard', 'reports', 1, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_reports_invoices', 'menu_reports', 'main_menu_admin', 'fa-list', 'invoice_reports', 'reports/view/invoicesreport', 2, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_reports_payments', 'menu_reports', 'main_menu_admin', 'fa-credit-card', 'payments', 'reports/view/paymentsreport', 3, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_sales', '', 'main_menu_admin', 'fa-credit-card', 'sales', 'invoices', 5, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_settings', 'menu_system', 'main_menu_admin', 'fa-cogs', 'settings', 'settings', 1, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_system', '', 'main_menu_admin', 'fa-cogs', 'system', 'settings', 11, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_tax_rates', 'menu_system', 'main_menu_admin', 'fa-pencil-square-o', 'tax_rates', 'invoices/tax_rates', 9, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_tickets', '', 'main_menu_admin', 'fa-ticket', 'support', 'tickets', 10, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_tickets', '', 'main_menu_client', 'fa-ticket', 'tickets', 'tickets', 6, 2, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_tickets', '', 'main_menu_staff', 'fa-ticket', 'tickets', 'tickets', 8, 3, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('menu_users', 'menu_system', 'main_menu_admin', 'fa-lock', 'users', 'users/account', 12, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_categories', '', 'settings_menu_admin', 'fa-cube', 'categories', 'categories', 9, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_cron', '', 'settings_menu_admin', 'fa-rocket', 'cron_settings', 'crons', 13, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_custom_fields', '', 'settings_menu_admin', 'fa-star-o', 'custom_fields', 'fields', 11, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_departments', '', 'settings_menu_admin', 'fa-sitemap', 'departments', 'departments', 9, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_domain', '', 'settings_menu_admin', 'fa-folder', 'domain_settings', 'domain', 3, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_email', '', 'settings_menu_admin', 'fa-envelope-o', 'email_settings', 'email', 6, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_email_templates', '', 'settings_menu_admin', 'fa-pencil-square', 'email_templates', 'templates', 7, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_general', '', 'settings_menu_admin', 'fa-info-circle', 'general_settings', 'general', 1, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_invoice', 'menu_sales', 'settings_menu_admin', 'fa-money', 'invoice_settings', 'invoice', 6, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_menu', '', 'settings_menu_admin', 'fa-list-alt', 'menu_settings', 'menu', 10, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_payment', '', 'settings_menu_admin', 'fa-dollar', 'payment_settings', 'payments', 7, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_search', '', 'settings_menu_admin', 'fa-search', 'search_settings', 'search', 3, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_system', '', 'settings_menu_admin', 'fa-desktop', 'system_settings', 'system', 2, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_theme', '', 'settings_menu_admin', 'fa-code', 'theme_settings', 'theme', 9, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('settings_translations', '', 'settings_menu_admin', 'fa-globe', 'translations', 'translations', 12, 1, 1, 1, '', 1, '0000-00-00 00:00:00');
INSERT INTO `hd_hooks` (`module`, `parent`, `hook`, `icon`, `name`, `route`, `order`, `access`, `core`, `visible`, `permission`, `enabled`, `last_run`) VALUES ('user_menu_plugins', '', 'user_menu_admin', '', 'plugins', 'updates/plugins', 1, 1, 1, 1, '', 1, '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: hd_images
#

DROP TABLE IF EXISTS `hd_images`;

CREATE TABLE `hd_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `hd_images` (`id`, `image`, `thumb`, `post_id`) VALUES (1, 'no-image.jpg', 'no-image.jpg', 1);
INSERT INTO `hd_images` (`id`, `image`, `thumb`, `post_id`) VALUES (2, 'no-image.jpg', 'no-image.jpg', 2);


#
# TABLE STRUCTURE FOR: hd_invoices
#

DROP TABLE IF EXISTS `hd_invoices`;

CREATE TABLE `hd_invoices` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `allow_paypal` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `allow_coinpayments` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'No',
  `allow_stripe` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_2checkout` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'Yes',
  `allow_bitcoin` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_payfast` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_mollie` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_instamojo` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_razorpay` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow` int(11) NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax2` decimal(10,2) DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `recurring` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `r_freq` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '31',
  `recur_start_date` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recur_end_date` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recur_frequency` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recur_next_date` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `status` enum('Unpaid','Paid','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `archived` int(11) DEFAULT 0,
  `date_sent` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_deleted` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `date_saved` timestamp NOT NULL DEFAULT current_timestamp(),
  `emailed` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `show_client` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `viewed` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `alert_overdue` int(11) DEFAULT 0,
  `extra_fee` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`inv_id`),
  UNIQUE KEY `reference_no` (`reference_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_item_pricing
#

DROP TABLE IF EXISTS `hd_item_pricing`;

CREATE TABLE `hd_item_pricing` (
  `item_pricing_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT 0,
  `monthly` decimal(10,2) DEFAULT 0.00,
  `quarterly` decimal(10,2) DEFAULT 0.00,
  `semi_annually` decimal(10,2) DEFAULT 0.00,
  `annually` decimal(10,2) DEFAULT 0.00,
  `registration` decimal(10,2) DEFAULT 0.00,
  `transfer` decimal(10,2) DEFAULT 0.00,
  `renewal` decimal(10,2) DEFAULT 0.00,
  `monthly_payments` int(11) NOT NULL,
  `quarterly_payments` int(11) NOT NULL,
  `semi_annually_payments` int(11) NOT NULL,
  `annually_payments` int(11) NOT NULL,
  PRIMARY KEY (`item_pricing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (3, 7, 14, '0.00', '0.00', '0.00', '0.00', '10.00', '0.00', '10.00', 0, 0, 0, 0);
INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (6, 11, 14, '0.00', '0.00', '0.00', '0.00', '18.00', '18.00', '18.00', 0, 0, 0, 0);
INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (8, 13, 14, '0.00', '0.00', '0.00', '0.00', '19.00', '19.00', '19.00', 0, 0, 0, 0);
INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (13, 18, 14, '0.00', '0.00', '0.00', '0.00', '24.00', '24.00', '24.00', 0, 0, 0, 0);
INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (21, 27, 14, '0.00', '0.00', '0.00', '0.00', '12.00', '12.00', '12.00', 0, 0, 0, 0);
INSERT INTO `hd_item_pricing` (`item_pricing_id`, `item_id`, `category`, `monthly`, `quarterly`, `semi_annually`, `annually`, `registration`, `transfer`, `renewal`, `monthly_payments`, `quarterly_payments`, `semi_annually_payments`, `annually_payments`) VALUES (23, 29, 14, NULL, NULL, NULL, NULL, '10.00', '10.00', '10.00', 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: hd_items
#

DROP TABLE IF EXISTS `hd_items`;

CREATE TABLE `hd_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_tax_rate` decimal(10,2) DEFAULT 0.00,
  `item_tax_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quantity` decimal(10,2) DEFAULT 0.00,
  `total_cost` decimal(10,2) DEFAULT 0.00,
  `invoice_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Item Name',
  `item_desc` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT 0.00,
  `item_order` int(11) DEFAULT 0,
  `date_saved` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_items_saved
#

DROP TABLE IF EXISTS `hd_items_saved`;

CREATE TABLE `hd_items_saved` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'Item Name',
  `item_desc` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_features` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT 0.00,
  `item_tax_rate` decimal(10,2) DEFAULT 0.00,
  `item_tax_total` decimal(10,2) DEFAULT 0.00,
  `quantity` decimal(10,2) DEFAULT 0.00,
  `total_cost` decimal(10,2) DEFAULT 0.00,
  `setup_fee` decimal(10,2) NOT NULL,
  `payments` int(11) NOT NULL,
  `max_payments` int(11) NOT NULL,
  `deleted` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'No',
  `order_by` int(11) NOT NULL,
  `require_domain` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `reseller_package` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `allow_upgrade` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `server` int(11) DEFAULT 0,
  `default_registrar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `active` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (8, 'Website', 'Design', '', '', '500.00', '0.00', '0.00', '1.00', '500.00', '0.00', 0, 0, 'No', 0, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (11, 'com', '', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 1, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (13, 'net', '', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 12, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (14, 'co.za', '', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 0, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (18, 'mobi', '', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 13, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (19, NULL, NULL, NULL, '', NULL, '0.00', '0.00', NULL, '0.00', '0.00', 0, 0, 'No', 0, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (27, 'vip', '', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 11, 'No', 'No', 'No', 0, NULL, 'Yes', 'Yes');
INSERT INTO `hd_items_saved` (`item_id`, `item_name`, `item_desc`, `item_features`, `package_name`, `unit_cost`, `item_tax_rate`, `item_tax_total`, `quantity`, `total_cost`, `setup_fee`, `payments`, `max_payments`, `deleted`, `order_by`, `require_domain`, `reseller_package`, `allow_upgrade`, `server`, `default_registrar`, `display`, `active`) VALUES (29, 'xyz', NULL, NULL, NULL, NULL, NULL, '0.00', '1.00', '0.00', '0.00', 0, 0, 'No', 0, 'No', 'No', 'No', NULL, NULL, 'No', 'Yes');


#
# TABLE STRUCTURE FOR: hd_languages
#

DROP TABLE IF EXISTS `hd_languages`;

CREATE TABLE `hd_languages` (
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) DEFAULT 0,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_languages` (`code`, `name`, `icon`, `active`) VALUES ('en', 'english', 'us', 1);


#
# TABLE STRUCTURE FOR: hd_links
#

DROP TABLE IF EXISTS `hd_links`;

CREATE TABLE `hd_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link_title` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_locales
#

DROP TABLE IF EXISTS `hd_locales`;

CREATE TABLE `hd_locales` (
  `locale` varchar(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('aa_DJ', 'aa', 'afar', 'Afar (Djibouti)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('aa_ER', 'aa', 'afar', 'Afar (Eritrea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('aa_ET', 'aa', 'afar', 'Afar (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('af_ZA', 'af', 'afrikaans', 'Afrikaans (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('am_ET', 'am', 'amharic', 'Amharic (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('an_ES', 'an', 'aragonese', 'Aragonese (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_AE', 'ar', 'arabic', 'Arabic (United Arab Emirates)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_BH', 'ar', 'arabic', 'Arabic (Bahrain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_DZ', 'ar', 'arabic', 'Arabic (Algeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_EG', 'ar', 'arabic', 'Arabic (Egypt)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_IN', 'ar', 'arabic', 'Arabic (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_IQ', 'ar', 'arabic', 'Arabic (Iraq)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_JO', 'ar', 'arabic', 'Arabic (Jordan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_KW', 'ar', 'arabic', 'Arabic (Kuwait)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_LB', 'ar', 'arabic', 'Arabic (Lebanon)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_LY', 'ar', 'arabic', 'Arabic (Libya)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_MA', 'ar', 'arabic', 'Arabic (Morocco)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_OM', 'ar', 'arabic', 'Arabic (Oman)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_QA', 'ar', 'arabic', 'Arabic (Qatar)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_SA', 'ar', 'arabic', 'Arabic (Saudi Arabia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_SD', 'ar', 'arabic', 'Arabic (Sudan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_SY', 'ar', 'arabic', 'Arabic (Syria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_TN', 'ar', 'arabic', 'Arabic (Tunisia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ar_YE', 'ar', 'arabic', 'Arabic (Yemen)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ast_ES', 'ast', 'asturian', 'Asturian (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('as_IN', 'as', 'assamese', 'Assamese (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('az_AZ', 'az', 'azerbaijani', 'Azerbaijani (Azerbaijan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('az_TR', 'az', 'azerbaijani', 'Azerbaijani (Turkey)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bem_ZM', 'bem', 'bemba', 'Bemba (Zambia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ber_DZ', 'ber', 'berber', 'Berber (Algeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ber_MA', 'ber', 'berber', 'Berber (Morocco)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('be_BY', 'be', 'belarusian', 'Belarusian (Belarus)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bg_BG', 'bg', 'bulgarian', 'Bulgarian (Bulgaria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bn_BD', 'bn', 'bengali', 'Bengali (Bangladesh)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bn_IN', 'bn', 'bengali', 'Bengali (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bo_CN', 'bo', 'tibetan', 'Tibetan (China)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bo_IN', 'bo', 'tibetan', 'Tibetan (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('br_FR', 'br', 'breton', 'Breton (France)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('bs_BA', 'bs', 'bosnian', 'Bosnian (Bosnia and Herzegovina)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('byn_ER', 'byn', 'blin', 'Blin (Eritrea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ca_AD', 'ca', 'catalan', 'Catalan (Andorra)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ca_ES', 'ca', 'catalan', 'Catalan (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ca_FR', 'ca', 'catalan', 'Catalan (France)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ca_IT', 'ca', 'catalan', 'Catalan (Italy)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('crh_UA', 'crh', 'crimean turkish', 'Crimean Turkish (Ukraine)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('csb_PL', 'csb', 'kashubian', 'Kashubian (Poland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('cs_CZ', 'cs', 'czech', 'Czech (Czech Republic)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('cv_RU', 'cv', 'chuvash', 'Chuvash (Russia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('cy_GB', 'cy', 'welsh', 'Welsh (United Kingdom)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('da_DK', 'da', 'danish', 'Danish (Denmark)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_AT', 'de', 'german', 'German (Austria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_BE', 'de', 'german', 'German (Belgium)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_CH', 'de', 'german', 'German (Switzerland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_DE', 'de', 'german', 'German (Germany)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_LI', 'de', 'german', 'German (Liechtenstein)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('de_LU', 'de', 'german', 'German (Luxembourg)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('dv_MV', 'dv', 'divehi', 'Divehi (Maldives)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('dz_BT', 'dz', 'dzongkha', 'Dzongkha (Bhutan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ee_GH', 'ee', 'ewe', 'Ewe (Ghana)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('el_CY', 'el', 'greek', 'Greek (Cyprus)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('el_GR', 'el', 'greek', 'Greek (Greece)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_AG', 'en', 'english', 'English (Antigua and Barbuda)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_AS', 'en', 'english', 'English (American Samoa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_AU', 'en', 'english', 'English (Australia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_BW', 'en', 'english', 'English (Botswana)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_CA', 'en', 'english', 'English (Canada)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_DK', 'en', 'english', 'English (Denmark)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_GB', 'en', 'english', 'English (United Kingdom)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_GU', 'en', 'english', 'English (Guam)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_HK', 'en', 'english', 'English (Hong Kong SAR China)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_IE', 'en', 'english', 'English (Ireland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_IN', 'en', 'english', 'English (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_JM', 'en', 'english', 'English (Jamaica)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_MH', 'en', 'english', 'English (Marshall Islands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_MP', 'en', 'english', 'English (Northern Mariana Islands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_MU', 'en', 'english', 'English (Mauritius)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_NG', 'en', 'english', 'English (Nigeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_NZ', 'en', 'english', 'English (New Zealand)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_PH', 'en', 'english', 'English (Philippines)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_SG', 'en', 'english', 'English (Singapore)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_TT', 'en', 'english', 'English (Trinidad and Tobago)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_US', 'en', 'english', 'English (United States)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_VI', 'en', 'english', 'English (Virgin Islands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_ZA', 'en', 'english', 'English (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_ZM', 'en', 'english', 'English (Zambia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('en_ZW', 'en', 'english', 'English (Zimbabwe)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('eo', 'eo', 'esperanto', 'Esperanto');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_AR', 'es', 'spanish', 'Spanish (Argentina)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_BO', 'es', 'spanish', 'Spanish (Bolivia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_CL', 'es', 'spanish', 'Spanish (Chile)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_CO', 'es', 'spanish', 'Spanish (Colombia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_CR', 'es', 'spanish', 'Spanish (Costa Rica)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_DO', 'es', 'spanish', 'Spanish (Dominican Republic)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_EC', 'es', 'spanish', 'Spanish (Ecuador)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_ES', 'es', 'spanish', 'Spanish (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_GT', 'es', 'spanish', 'Spanish (Guatemala)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_HN', 'es', 'spanish', 'Spanish (Honduras)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_MX', 'es', 'spanish', 'Spanish (Mexico)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_NI', 'es', 'spanish', 'Spanish (Nicaragua)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_PA', 'es', 'spanish', 'Spanish (Panama)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_PE', 'es', 'spanish', 'Spanish (Peru)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_PR', 'es', 'spanish', 'Spanish (Puerto Rico)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_PY', 'es', 'spanish', 'Spanish (Paraguay)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_SV', 'es', 'spanish', 'Spanish (El Salvador)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_US', 'es', 'spanish', 'Spanish (United States)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_UY', 'es', 'spanish', 'Spanish (Uruguay)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('es_VE', 'es', 'spanish', 'Spanish (Venezuela)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('et_EE', 'et', 'estonian', 'Estonian (Estonia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('eu_ES', 'eu', 'basque', 'Basque (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('eu_FR', 'eu', 'basque', 'Basque (France)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fa_AF', 'fa', 'persian', 'Persian (Afghanistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fa_IR', 'fa', 'persian', 'Persian (Iran)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ff_SN', 'ff', 'fulah', 'Fulah (Senegal)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fil_PH', 'fil', 'filipino', 'Filipino (Philippines)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fi_FI', 'fi', 'finnish', 'Finnish (Finland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fo_FO', 'fo', 'faroese', 'Faroese (Faroe Islands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_BE', 'fr', 'french', 'French (Belgium)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_BF', 'fr', 'french', 'French (Burkina Faso)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_BI', 'fr', 'french', 'French (Burundi)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_BJ', 'fr', 'french', 'French (Benin)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_CA', 'fr', 'french', 'French (Canada)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_CF', 'fr', 'french', 'French (Central African Republic)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_CG', 'fr', 'french', 'French (Congo)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_CH', 'fr', 'french', 'French (Switzerland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_CM', 'fr', 'french', 'French (Cameroon)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_FR', 'fr', 'french', 'French (France)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_GA', 'fr', 'french', 'French (Gabon)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_GN', 'fr', 'french', 'French (Guinea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_GP', 'fr', 'french', 'French (Guadeloupe)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_GQ', 'fr', 'french', 'French (Equatorial Guinea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_KM', 'fr', 'french', 'French (Comoros)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_LU', 'fr', 'french', 'French (Luxembourg)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_MC', 'fr', 'french', 'French (Monaco)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_MG', 'fr', 'french', 'French (Madagascar)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_ML', 'fr', 'french', 'French (Mali)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_MQ', 'fr', 'french', 'French (Martinique)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_NE', 'fr', 'french', 'French (Niger)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_SN', 'fr', 'french', 'French (Senegal)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_TD', 'fr', 'french', 'French (Chad)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fr_TG', 'fr', 'french', 'French (Togo)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fur_IT', 'fur', 'friulian', 'Friulian (Italy)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fy_DE', 'fy', 'western frisian', 'Western Frisian (Germany)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('fy_NL', 'fy', 'western frisian', 'Western Frisian (Netherlands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ga_IE', 'ga', 'irish', 'Irish (Ireland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gd_GB', 'gd', 'scottish gaelic', 'Scottish Gaelic (United Kingdom)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gez_ER', 'gez', 'geez', 'Geez (Eritrea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gez_ET', 'gez', 'geez', 'Geez (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gl_ES', 'gl', 'galician', 'Galician (Spain)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gu_IN', 'gu', 'gujarati', 'Gujarati (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('gv_GB', 'gv', 'manx', 'Manx (United Kingdom)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ha_NG', 'ha', 'hausa', 'Hausa (Nigeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('he_IL', 'he', 'hebrew', 'Hebrew (Israel)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('hi_IN', 'hi', 'hindi', 'Hindi (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('hr_HR', 'hr', 'croatian', 'Croatian (Croatia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('hsb_DE', 'hsb', 'upper sorbian', 'Upper Sorbian (Germany)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ht_HT', 'ht', 'haitian', 'Haitian (Haiti)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('hu_HU', 'hu', 'hungarian', 'Hungarian (Hungary)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('hy_AM', 'hy', 'armenian', 'Armenian (Armenia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ia', 'ia', 'interlingua', 'Interlingua');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('id_ID', 'id', 'indonesian', 'Indonesian (Indonesia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ig_NG', 'ig', 'igbo', 'Igbo (Nigeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ik_CA', 'ik', 'inupiaq', 'Inupiaq (Canada)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('is_IS', 'is', 'icelandic', 'Icelandic (Iceland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('it_CH', 'it', 'italian', 'Italian (Switzerland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('it_IT', 'it', 'italian', 'Italian (Italy)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('iu_CA', 'iu', 'inuktitut', 'Inuktitut (Canada)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ja_JP', 'ja', 'japanese', 'Japanese (Japan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ka_GE', 'ka', 'georgian', 'Georgian (Georgia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('kk_KZ', 'kk', 'kazakh', 'Kazakh (Kazakhstan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('kl_GL', 'kl', 'kalaallisut', 'Kalaallisut (Greenland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('km_KH', 'km', 'khmer', 'Khmer (Cambodia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('kn_IN', 'kn', 'kannada', 'Kannada (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('kok_IN', 'kok', 'konkani', 'Konkani (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ko_KR', 'ko', 'korean', 'Korean (South Korea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ks_IN', 'ks', 'kashmiri', 'Kashmiri (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ku_TR', 'ku', 'kurdish', 'Kurdish (Turkey)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('kw_GB', 'kw', 'cornish', 'Cornish (United Kingdom)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ky_KG', 'ky', 'kirghiz', 'Kirghiz (Kyrgyzstan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('lg_UG', 'lg', 'ganda', 'Ganda (Uganda)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('li_BE', 'li', 'limburgish', 'Limburgish (Belgium)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('li_NL', 'li', 'limburgish', 'Limburgish (Netherlands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('lo_LA', 'lo', 'lao', 'Lao (Laos)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('lt_LT', 'lt', 'lithuanian', 'Lithuanian (Lithuania)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('lv_LV', 'lv', 'latvian', 'Latvian (Latvia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mai_IN', 'mai', 'maithili', 'Maithili (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mg_MG', 'mg', 'malagasy', 'Malagasy (Madagascar)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mi_NZ', 'mi', 'maori', 'Maori (New Zealand)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mk_MK', 'mk', 'macedonian', 'Macedonian (Macedonia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ml_IN', 'ml', 'malayalam', 'Malayalam (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mn_MN', 'mn', 'mongolian', 'Mongolian (Mongolia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mr_IN', 'mr', 'marathi', 'Marathi (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ms_BN', 'ms', 'malay', 'Malay (Brunei)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ms_MY', 'ms', 'malay', 'Malay (Malaysia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('mt_MT', 'mt', 'maltese', 'Maltese (Malta)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('my_MM', 'my', 'burmese', 'Burmese (Myanmar)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('naq_NA', 'naq', 'namibia', 'Namibia');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nb_NO', 'nb', 'norwegian bokmål', 'Norwegian Bokmål (Norway)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nds_DE', 'nds', 'low german', 'Low German (Germany)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nds_NL', 'nds', 'low german', 'Low German (Netherlands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ne_NP', 'ne', 'nepali', 'Nepali (Nepal)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nl_AW', 'nl', 'dutch', 'Dutch (Aruba)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nl_BE', 'nl', 'dutch', 'Dutch (Belgium)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nl_NL', 'nl', 'dutch', 'Dutch (Netherlands)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nn_NO', 'nn', 'norwegian nynorsk', 'Norwegian Nynorsk (Norway)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('no_NO', 'no', 'norwegian', 'Norwegian (Norway)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nr_ZA', 'nr', 'south ndebele', 'South Ndebele (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('nso_ZA', 'nso', 'northern sotho', 'Northern Sotho (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('oc_FR', 'oc', 'occitan', 'Occitan (France)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('om_ET', 'om', 'oromo', 'Oromo (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('om_KE', 'om', 'oromo', 'Oromo (Kenya)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('or_IN', 'or', 'oriya', 'Oriya (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('os_RU', 'os', 'ossetic', 'Ossetic (Russia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pap_AN', 'pap', 'papiamento', 'Papiamento (Netherlands Antilles)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pa_IN', 'pa', 'punjabi', 'Punjabi (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pa_PK', 'pa', 'punjabi', 'Punjabi (Pakistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pl_PL', 'pl', 'polish', 'Polish (Poland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ps_AF', 'ps', 'pashto', 'Pashto (Afghanistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pt_BR', 'pt', 'portuguese', 'Portuguese (Brazil)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pt_GW', 'pt', 'portuguese', 'Portuguese (Guinea-Bissau)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('pt_PT', 'pt', 'portuguese', 'Portuguese (Portugal)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ro_MD', 'ro', 'romanian', 'Romanian (Moldova)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ro_RO', 'ro', 'romanian', 'Romanian (Romania)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ru_RU', 'ru', 'russian', 'Russian (Russia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ru_UA', 'ru', 'russian', 'Russian (Ukraine)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('rw_RW', 'rw', 'kinyarwanda', 'Kinyarwanda (Rwanda)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sa_IN', 'sa', 'sanskrit', 'Sanskrit (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sc_IT', 'sc', 'sardinian', 'Sardinian (Italy)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sd_IN', 'sd', 'sindhi', 'Sindhi (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('seh_MZ', 'seh', 'sena', 'Sena (Mozambique)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('se_NO', 'se', 'northern sami', 'Northern Sami (Norway)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sid_ET', 'sid', 'sidamo', 'Sidamo (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('si_LK', 'si', 'sinhala', 'Sinhala (Sri Lanka)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sk_SK', 'sk', 'slovak', 'Slovak (Slovakia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sl_SI', 'sl', 'slovenian', 'Slovenian (Slovenia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sn_ZW', 'sn', 'shona', 'Shona (Zimbabwe)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('so_DJ', 'so', 'somali', 'Somali (Djibouti)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('so_ET', 'so', 'somali', 'Somali (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('so_KE', 'so', 'somali', 'Somali (Kenya)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('so_SO', 'so', 'somali', 'Somali (Somalia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sq_AL', 'sq', 'albanian', 'Albanian (Albania)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sq_MK', 'sq', 'albanian', 'Albanian (Macedonia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sr_BA', 'sr', 'serbian', 'Serbian (Bosnia and Herzegovina)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sr_ME', 'sr', 'serbian', 'Serbian (Montenegro)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sr_RS', 'sr', 'serbian', 'Serbian (Serbia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ss_ZA', 'ss', 'swati', 'Swati (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('st_ZA', 'st', 'southern sotho', 'Southern Sotho (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sv_FI', 'sv', 'swedish', 'Swedish (Finland)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sv_SE', 'sv', 'swedish', 'Swedish (Sweden)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sw_KE', 'sw', 'swahili', 'Swahili (Kenya)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('sw_TZ', 'sw', 'swahili', 'Swahili (Tanzania)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ta_IN', 'ta', 'tamil', 'Tamil (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('teo_UG', 'teo', 'teso', 'Teso (Uganda)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('te_IN', 'te', 'telugu', 'Telugu (India)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tg_TJ', 'tg', 'tajik', 'Tajik (Tajikistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('th_TH', 'th', 'thai', 'Thai (Thailand)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tig_ER', 'tig', 'tigre', 'Tigre (Eritrea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ti_ER', 'ti', 'tigrinya', 'Tigrinya (Eritrea)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ti_ET', 'ti', 'tigrinya', 'Tigrinya (Ethiopia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tk_TM', 'tk', 'turkmen', 'Turkmen (Turkmenistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tl_PH', 'tl', 'tagalog', 'Tagalog (Philippines)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tn_ZA', 'tn', 'tswana', 'Tswana (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('to_TO', 'to', 'tongan', 'Tongan (Tonga)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tr_CY', 'tr', 'turkish', 'Turkish (Cyprus)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tr_TR', 'tr', 'turkish', 'Turkish (Turkey)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ts_ZA', 'ts', 'tsonga', 'Tsonga (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('tt_RU', 'tt', 'tatar', 'Tatar (Russia)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ug_CN', 'ug', 'uighur', 'Uighur (China)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('uk_UA', 'uk', 'ukrainian', 'Ukrainian (Ukraine)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ur_PK', 'ur', 'urdu', 'Urdu (Pakistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('uz_UZ', 'uz', 'uzbek', 'Uzbek (Uzbekistan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('ve_ZA', 've', 'venda', 'Venda (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('vi_VN', 'vi', 'vietnamese', 'Vietnamese (Vietnam)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('wa_BE', 'wa', 'walloon', 'Walloon (Belgium)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('wo_SN', 'wo', 'wolof', 'Wolof (Senegal)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('xh_ZA', 'xh', 'xhosa', 'Xhosa (South Africa)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('yi_US', 'yi', 'yiddish', 'Yiddish (United States)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('yo_NG', 'yo', 'yoruba', 'Yoruba (Nigeria)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('zh_CN', 'zh', 'chinese', 'Chinese (China)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('zh_HK', 'zh', 'chinese', 'Chinese (Hong Kong SAR China)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('zh_SG', 'zh', 'chinese', 'Chinese (Singapore)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('zh_TW', 'zh', 'chinese', 'Chinese (Taiwan)');
INSERT INTO `hd_locales` (`locale`, `code`, `language`, `name`) VALUES ('zu_ZA', 'zu', 'zulu', 'Zulu (South Africa)');


#
# TABLE STRUCTURE FOR: hd_login_attempts
#

DROP TABLE IF EXISTS `hd_login_attempts`;

CREATE TABLE `hd_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_menu
#

DROP TABLE IF EXISTS `hd_menu`;

CREATE TABLE `hd_menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `position` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `group_id` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `page` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (37, 0, 'Home', '/', 1, 1, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (58, 0, 'Company', '/', 1, 8, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (60, 0, 'Packages', 'hosting_packages', 2, 1, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (33, 0, 'Terms of Service', '/', 2, 8, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (44, 0, 'Domain Registration', 'domain_registration', 4, 1, 8, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (54, 60, 'Flexible Packages', 'packages', 2, 1, 12, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (53, 0, 'ff', 'ff', 0, 0, 11, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (40, 0, 'layouts', 'layouts', 3, 1, 7, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (52, 0, 'Contact Us', 'contact', 5, 1, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (55, 0, 'Privacy Policy', '/', 3, 8, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (56, 0, 'F.A.Q', '/', 4, 8, 0, 1);
INSERT INTO `hd_menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`, `page`, `active`) VALUES (61, 60, 'Hosting Packages', 'cart/hosting_packages', 1, 1, 0, 1);


#
# TABLE STRUCTURE FOR: hd_menu_group
#

DROP TABLE IF EXISTS `hd_menu_group`;

CREATE TABLE `hd_menu_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `hd_menu_group` (`id`, `title`) VALUES (1, 'Main Menu');
INSERT INTO `hd_menu_group` (`id`, `title`) VALUES (8, 'Information');


#
# TABLE STRUCTURE FOR: hd_orders
#

DROP TABLE IF EXISTS `hd_orders`;

CREATE TABLE `hd_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `processed` date NOT NULL,
  `renewal_date` date NOT NULL,
  `domain` varchar(100) NOT NULL,
  `nameservers` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `item` int(11) NOT NULL,
  `item_parent` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 5,
  `type` varchar(100) NOT NULL,
  `order_id` bigint(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `process_id` bigint(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `renewal` varchar(100) DEFAULT NULL,
  `server` int(11) DEFAULT NULL,
  `registrar` varchar(100) DEFAULT NULL,
  `authcode` varchar(100) DEFAULT NULL,
  `additional_fields` int(11) DEFAULT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `processed` (`processed`,`renewal_date`),
  KEY `order_id` (`order_id`,`process_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: hd_outgoing_emails
#

DROP TABLE IF EXISTS `hd_outgoing_emails`;

CREATE TABLE `hd_outgoing_emails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sent_to` varchar(64) DEFAULT NULL,
  `sent_from` varchar(64) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date_sent` timestamp NULL DEFAULT current_timestamp(),
  `delivered` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_payment_methods
#

DROP TABLE IF EXISTS `hd_payment_methods`;

CREATE TABLE `hd_payment_methods` (
  `method_id` int(11) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(64) NOT NULL DEFAULT 'Paypal',
  PRIMARY KEY (`method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `hd_payment_methods` (`method_id`, `method_name`) VALUES (1, 'Online');
INSERT INTO `hd_payment_methods` (`method_id`, `method_name`) VALUES (2, 'Cash');
INSERT INTO `hd_payment_methods` (`method_id`, `method_name`) VALUES (3, 'Bank Deposit');
INSERT INTO `hd_payment_methods` (`method_id`, `method_name`) VALUES (5, 'Cheque');


#
# TABLE STRUCTURE FOR: hd_payments
#

DROP TABLE IF EXISTS `hd_payments`;

CREATE TABLE `hd_payments` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(64) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `amount` decimal(10,2) DEFAULT 0.00,
  `trans_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attached_file` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `month_paid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_paid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_deleted` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `refunded` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'No',
  PRIMARY KEY (`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_permissions
#

DROP TABLE IF EXISTS `hd_permissions`;

CREATE TABLE `hd_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (1, 'view_all_invoices', 'Allow user access to view all invoices', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (2, 'edit_all_invoices', 'Allow user access to edit all invoices', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (3, 'add_invoices', 'Allow user access to add invoices', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (4, 'delete_invoices', 'Allow user access to delete invoice', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (5, 'pay_invoice_offline', 'Allow user access to make offline Invoice Payments', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (6, 'view_payments', 'Allow user access to view own payments', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (7, 'email_invoices', 'Allow user access to email invoices', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (8, 'send_email_reminders', 'Allow user access to send invoice reminders', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (23, 'edit_settings', 'Allow user access to edit all settings', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (32, 'view_all_payments', 'Allow staff to view all payments', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (33, 'edit_payments', 'Allow staff to edit payments', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (35, 'manage_accounts', 'Allow user to activate, suspend and delete accounts', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (36, 'manage_orders', 'Allow user to activate, cancel and delete orders', 'active');
INSERT INTO `hd_permissions` (`permission_id`, `name`, `description`, `status`) VALUES (37, 'create_orders', 'Allow user to create orders', 'active');


#
# TABLE STRUCTURE FOR: hd_plugins
#

DROP TABLE IF EXISTS `hd_plugins`;

CREATE TABLE `hd_plugins` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plugin_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `installed` int(1) DEFAULT NULL,
  `licence` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_update` int(1) DEFAULT 0,
  `update_version` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_post_meta
#

DROP TABLE IF EXISTS `hd_post_meta`;

CREATE TABLE `hd_post_meta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'post',
  `title_arabic` varchar(255) DEFAULT NULL,
  `body_arabic` text DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_posts
#

DROP TABLE IF EXISTS `hd_posts`;

CREATE TABLE `hd_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `menu` int(11) NOT NULL,
  `sidebar_right` tinyint(1) NOT NULL,
  `sidebar_left` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `option` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `hd_posts` (`id`, `title`, `slug`, `pubdate`, `body`, `post_type`, `user_id`, `category_id`, `created`, `modified`, `parent_id`, `status`, `menu`, `sidebar_right`, `sidebar_left`, `order`, `option`) VALUES (1, 'Home', 'home', '2020-05-16', '<div class=\"row\">\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkMwOUY4RUQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkMwOUY4REQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pni7Z4sAAAOwSURBVHja7JtNbtpAFMcHxAHcG5gT1NzAZB0pZpdd4ARJTkA4AfQEkF13IVLXjW8Q9wThBvENqF09S5Zr+/3ffGCX8qSRSMD2/Dzve+zB8XhUEvn+46fSFMmFBsqRDNV/JhfgC3C9eDT6IJ5r4PwCbzS8HsDm89iiB4yEHrq4QED/yj9Ps5F2CBuU5rOwtsI1sIo+Iyv9IIQJBLCFzJGVHhrActAhTeAzG2sh8Hs2Pug4H4CFoQdc4sHAliUh9Y6ysayZqInE2VjRNZC57JrUuxVYAFtI6tiRHQQ3shZ6aBFWKfdeW6I1terdZsNS2D7KvOo/2oC/nUFilZvYMwR8e321Q+Jaz2Gn5OiwsOQYOqaRnAoWisMWofd0njHVu1MaE/p7TN/HrmChOFzy2lAm0xAeVhRSJN54S8mLNVhRakkrLVG/A63eQghbHJtPfCbM09k5SnLpUBCmEoJNLJjBVHDD5lwuICkPlwJYmxWU5HweV6hANpytrk/JPKrGLsrFgIoKxI6/mK7wPfi7hcPaOCHnh6xyZAocgfaGhBSf1O6l1K1gbY/kCbTnG1NgJGlHUtF1qc6NKOwU4e6DPnOyMlmgPzac2ejRgrpNmN9sQaDHbGwYlf3UnaitNu0r0OKZg+daMwlHSubTKTBnu0vh+bjf/+oauM2RhBqNgRAwod4C6zYROLXuFLjLtk8nwJ6BfVtX21MAB8zEUw3Y1MDGnQNz9ibtj3HJxdeugW+Y7zcCFd0BcVZ7hdFqCcnExoy39ijbipgb8wjUvFznpbFiQncPD0A+vVTtva+UOhj56txVzpeQ2iOFAZLENDpKFDgGUsM5TToBzqXruR/AQubV1IZRp7N1GHd9cHVbc20I+Pb6KgGdTqDkW6NonH8Bb+a+LaRJvDS6yohTkcJK9rlWVsIStWljAfSbMt8jLvpYKOyGc3ySNm0gLARCmuyT5qqu6XhfeE3PRhxGn+VocyS5hjwzviCiJCYyuFZrWxd55MEUFo2TocXzN0Jzjzy4gD2V1EIPzxS2cHh/efc2p7X+h2HL0EsUeOaqCD+xWi8g4CzusnutPZdYZMMa0AmViCtlf3/pQCuFbtTttLx0yYFx6V3VIxYbWvfK7NGnPcXufY0z8lpgF0aJBwPN7d/6lGpKmvEzUsmU8cCeBFYE3AAt2ay2/ZJHFZqFFQNXoJWS7fS7eKulgN4r8EmjkYZdFY5MqW4eDK+a00QJHpoZaV6oa9CqB4fl8lbLBfjM5LcAAwAdEkOHmxZ29gAAAABJRU5ErkJggg==\" data-filename=\"setup_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">Instant Setup<br><br></h4>\r\n<p>As soon as you make a successful payment your web hosting and domain names will be activated immediately. We do not charge extra fees for setting up your account.</p>\r\n</div>\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkMwOUY5MkQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkMwOUY5MUQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqYr6pQAAATESURBVHja5FtZaBVXGJ574y4GrVmIKCKaoFUTXEoExSWoiMYsbWk1LYK4PQktPtQu9M0NQV/EBUHwQYm4xHtVRNGoUGxB65tWRK1ixVYjrcs1atLcfj/5Bw6nZ86Z5c7NvZMfPsKcbe435z//+c4/k1g6nba8WPPpViuAzQM2AlOAv4GjwCag3e0Ay2prgtzf6mNlz+YAp4FBfF0MfA+UA03Av9n4EfEskY0B3wlkRfuMH4YVJcIDgUpN/ZSoEY4Zlk/fqBEmS/usy1vCOWF9fLpnPTADGMBlBbxO7wG0b90CXgeYOXLxUmAm32eQvXVhW6Qx/wBasEXd9/zjvezDuBn9kIPAckX1LmAP8DvwDugS6gZzebHD0LQ3b1OseSI6F9gCTJD6PKNtGaRbw3TpVQqyL4FFwHqe2XaJrN/13gG8ABJANXBcakMPby8moTAUwhiY2q6UionYOuBcyEvvFbAC+EUqL2f1FsoMTwKqpLIz9Cyksk+5/FdgH1ABpAxjd/Df1cBF4BqwAxgptHkDbBDa2vZxWIQXA/0lt9sttfmB9TG1nQqsBS4BC4G3mrH7AVuB/QCJ5enA10x+tNDuqmKW58P7PsgoYQxIUbhBETRuCNcTgR8V3UcAR4AizS2I3DeK8grW26K1Ksafk+kZnqiQfxRQ2oTrao1iGsrblpOVGA4dMeH6kaLNJ5kmXMtuJ1qBtI+/DSlgvVO4v2w18MLhGSHM7lynqCqSggq52p8hEG6WBMx4RZsyYHamZvhDDkCyFbIosI3IruFomilLAjuFawqaCxzaNmaKcJ1mbX7F69M2OuB/kSHSSRY5YjZkhUJxeYrWcRfuvFTTZBQwRCo7yRmMVACy9hjygxun6VPmRoSYZpii8zRN/SWHqJngmU75JPulQ98WoFPTtzEo4TrDieqEpi7hw72TGrIWq7fbmv7zTdE6HsCdnwMXDAQSinVoapsySNCkpr7U5NZxg3aeqqm/4nIbsoPPm4BtxMCoy3A2+CVca3Dnkx5c1Xbvdgeyyyz3uWk6WPymqV8A7xzmiTA6xBzEhm3/uHBn1QOiJfITu+0DPjB8bnlLxFPQOmWQqTVeZ7jS4M6kqp74iMAXWRuP4Xt861OSJg1JhgavhE3unAiwx3bxSetVgDGuAzc19QudREjcwZ3rNYM9NWxHoRu7dbMft1bNYpUisyHafRYjsZ4gK7zMM0V0cutjbggvcTiC2UZp08tW7huJkCJ4Q5tpDTda0bBSlVvHHQRHVGyRG8L9I0S4wm+KJ18t3tsIp3sbYVf7sM5I997LMQ6bre5EfyiEKfF+t4dVlixE2gItaoMNyEEvLQiTcE8Y5b7LQgvbOWSzOKtCOaxbrIvHRpVwJR/y6W0CfT1AuW96f5TEmi2OImE5wW8bvQVpiiLhyZq6qigSfqypexRFwvscyumd9KEoEj5rdX8V9FwoI4XXBOFxJ5vSMpu2iyM1pZPeAz9LDyByhMkeMsI7LxqsKwcfSjrMGSYt3aMZEcW/IBSESZiCSWeOzfCwMAmX5HsCoNdlPKJOONbbCP/lhvC1CBE+7Ibwakv/4Ug+GOmF7ZbiZZryXwCw131kdX8MXp6HZOlrgvPAAeju/71h/E+AAQBilxbT/hVOkQAAAABJRU5ErkJggg==\" data-filename=\"backup_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">Constant Backups<br><br></h4>\r\n<p>Your hosting account is backed up daily going 2 months back at no extra cost. We use dedicated backup servers, providing fast &amp; easy individual file rollback abilities.</p>\r\n</div>\r\n\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkNFRjdBMEQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkNFRjc5RkQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PjwiTYAAAAPrSURBVHja7Jq/TxRBFMf3FomdrT+4O/BHo8JxxlhZaWLDz6OzMsbCUlsrGuI/oLGxUTsrETgsIMHCkoOA6FEBonhQ2xkQfC98Ny7L7cyb3b29FfYlLxdu3s7Mh3nfnbdzm9nb27OOk9nWMbMU+KjbCdML3pZnVM058jfkt/D3Nvkr8kfkvxXXnSR/Rv7ANSce6D75D3fg3b7biVnhdvJJFyxbK/lDAKvsMeLcC8BkZfSbuJTmSb0n7/Jpv0fe4tPWgvZ6VkC/+SQBZ8nHyYuKmFOKsWy0+xn3O0HelgTgPNK4oIn7BD3Xs220q6yAcfLNBG7HyupgV8mHNTHDiFNZN49HN832ZgB3ALZbE7dC3i+AceJWhNAdcQLnDVZ2gLwq7LeK+FVBejN0oPTOmNTSGIS11KkJXSPvJV8OMKfLGOO8Ju4Lj0H78veGrDDSqCyAXQ0Ba+G6XsFK8zzKpultG8COK/ZZrxaXrXC2LExvns+YCbQ2pZHGEwLNrgH2a4SF0VWMrUvvzzy2JL2VwDFpNlZN2wnQbKyatkNq1tl6GgUbRNPK4uRQSjdZsw3X9AFgA81+Q5pVrfjtCubYEUTTtieNJw002wxYPgCoGmh60pveNmDP0Mc7ASz/t0rNgvVAl7ynIT7Qo8R32rvCT8mvaS5ex41jKQlnUwS9hPmsa0Kvge8AcI+ggrpDgyxaCTKazwLPS/CU1eMFzgj6/59P7DNe4CnNBRfJp0kLnUmiwHymMT+VTXmBn5BXBA/9Y4JiJC7YAooj3QlIBXz/gEkLNfoYFEBfwMbf1WTYbmEBwjyDxLfpV3icRUfXNR3xdtCHiiZucw70sgLYATfsoVoajQwyq+ksh0GLMcMWhbCzKC03tQ8PFLSFTV0HnYWmizHCjgthS+CQPw9Tep+z9k/9bwjSmx8iFmOAzQlha0EPAJKg6VCaNTrTcmm6ItD0hwakdxH9SmD7dbBaYJemJVtWm6X/jSlIGrcJYAf9NGsMbLhP5yKClmrWga2Ja0zDg3ippjcghSA3Mi4qyoI0npOmsfEK19H0nGDLKgdY6aIQlle2zxTWGBi2hefQigB6wgDa+R04G6VmowBmY80MkS8IoEcFTzOXEKeD5fGGTDQbFbCj014BND9ljWhiRiz9oRyPw4dyG2HuhmHfAKhB0/OauJvW/gsu9awV7Sqbxzi1kPON5B2Pn6i9VSv9i3zXp20X7aqVLWEcKwnA7nraD5rf1frj08bfv1bA9lv608nYgR1N8937o+u7HfKX5C801z5H3I7ruxn0txHhHM0Kj6Ng6culKXAKnAKnwClwCpwCp8ApcAqcAovsrwADAI9xZQ3N89abAAAAAElFTkSuQmCC\" data-filename=\"git_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">GIT/SVN Support<br><br></h4>\r\n<p>Web Developers love using version control systems. All our hosting accounts can use GIT &amp; SVN command line tools on our servers. Simply request SSH access to get started.</p>\r\n</div>\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkNFRjdBNEQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkNFRjdBM0Q5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlv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\" data-filename=\"script_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">280+ Install Scripts<br><br></h4>\r\n<p>All our hosting accounts allow you to install popular software such as Wordpress, Drupal, Joolma and Magento in one easy step. Upgrading your software is just as easy!</p>\r\n</div>\r\n\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkNFRjdBOEQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkNFRjdBN0Q5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PifEEHQAAAchSURBVHja7FtpbFRVGH1vajdqK0bqggvSqBiJJrgkLjEaa/wjxSggYNxBhdYl1Grq1lqptApFCS0/3FB+GEVqsDT+oMZYV6LB1A2poGIBhWLBbtjSdsbzZc6Fm5d5M/OWmTYyNzl5w5vOve/c8y33fvdhhkIh41hqAeMYaynCKcL/s3ac0x+80/yxXNKBG4GrgAuBCYAJ9AC/AJ8Bm4BOvx947vTr1HNcgcu9wCVABtABbATW4G8G/FZYCN8GlAGXA6cDpwDnA7OB1cDnwDPACX6TBtlSXD4CFgAFQB4wDXgB2IDvz7T7rek0LVFhaVlALZXuBfSORO1xQD6wDXgY2OIT3yeApcBBoB3YB5zF8U2O+SVwJ5Qe9NOHxWwepxnlsS8FGfgQsBM4FVgLXOkD2XKS7eJE3g88AATpnjLufuBS4IZEBK3DnPEmkjYsKkv/3UAasIJKeCFbA/zNOFEMBX/A9WmtX0VaJuDqREXpQZL+IAJpQ1M7n39nejDjLo1sG9yrAZ8fZP9BToYiPCGRaWmQCgjpXBvS4ufXujBtIfs8cIBkS0i2XogDu4A+oBqYSd9O5yQ4I4xOpwJZDs37QyA7wvchmtwtLn1WAtQiTdkSkpVU+CzuN5LwFE7wt44Io9M8+l0DPpsOlK6hGmk2318MjHfhs0LwO5IttpBdj/sLmQ5lsn9lMHWk8NnAJCpSgw7T4iS9j8QiLWpG6FsFcSqrk22TybchK5F6Fe/9Jvkf9/c7JSzpJAfYA8yTB4iTtCwAppJcKIJZZ9gFFIuyYiXbSTAW2QbGiN+Bxbj/lZulpfLDIAefqwWRoM1vZIXzOkkN2URkk99HI3skGosZa2Q7SKzKQraHZB/F/U/dbh6kk3+1hz5ApWtsfjeJ+fgCYHeUfoeBf2yisfLZdhtle6nse/TZes2MRdlWL7ulPzm4bsZdJF1rsQ7x9w005e2M2NEC3cmWZ6h04bP1nAAhWxpL2XhMWpaFPwLXcxlpaqQl/J9BRfP5gJNJdjAK2RAVruCkNPNeLq1ph40ZS559DnBlxnFvHtD5TbispDmblgeXXdBJ3CT00SJiKat+m8nJfoyTJu0h4BtgM9Ur0cxYyL4LLNSisSLbajhosfbDLcBWqjdgCTzdHDjAIBaKc9lo0gqkLee1iUSkvQLcp5GtAtZxk7CK93a6IRtzpYUOZXn2Ev04EOHBVW41HK6RFWmxiGVAkSZAD5eH/VR2HXdFDZrPLnZDNu79MEy7jP7UGyUluWkqL6dbzLuM1ZK1VLZBi8alTnzWbYlnBfPy3QwuQz4RNqmy1bzV50eAOrqP4wDlereEQYLAEkkLNLU8qmL6SHqIRGdo353G++KzUtZp9TyYixKP5NzbgUIuP9O1gBWkBQQ9mHcGyTVrKv/MouCRIl7Sqpac7Wr61UXAOUxPqrg3i/0OezDvOlpfE9Pi6JVptXaQJmY1s22Mrl5J6z49JgjbtUZel5DAkAfSy2jqG8cyYUXa9FHpkObTY5KwtPW8Vvnk06YfSieSsCIdonkbPpA2vJJOxmFaI3dHaS4nWJEWLEdanD5WCd/B5aJSuoLjeSEtAbDOC+lEEZ4DvEr/LdFIV/pIumisEBayb3KjIQWBp4D5Pis9TPMuGm3Ct5JsP+tamaxPtVl8utKjTw+qtbdT8w4kQNk+bt6zWQWR7d2WCNG7YjTMO+Aj2TWaskJW6tmLWJSzS1l+kRalZySL8ByLGSuyxTTneFJW0nzaLeFzjfDJv5RrX6MZ79bMOB6yfubpwXjztKP9MDoLUE2ZyRwO1kk4UTZSm8U0FoxzRZbJ7ajaSx/ihAnmY9/8hR8KL+CCQqWcn4zw4ZkM0uGBrFOflsndwdLTk7SSkFaIKIc4OZ7W0uiggGvivUb4PQpTMymZ7XoPZK1by2i7LCErbwiVQUV1ZCNHLy3cToqFyBmxHLy3uFKY58OyTTuRipoaAvThdsOfFi2QpdG6ajWyqu4mrxfJcc84/naaF5O+C7iZlcOgpXiXyerHrgRsOKyk5fMfRvjAO1L7nn4d1MpOzghDXTkVXMrA1G8hm808+LZh806Fz6TFR7MM++PW8QymBq3OlcIvGuEDs70W08rljN5jhM+EE7W11DccMrly7HONzd/PM45WTLc6DlpQV8qxsxmRhzlwDpVeyR3RQBKKCKpyYpBQJZ5NTHcTfHcInyfSGgpp8rIm+MRRHkYnhTRVgx2kMyB8TdXbjOS2mYzeKv0cz0WOuNJ5Rvh9zz1chJRjIt53qnA38+xkTVUps7xhHD39S2YT8x6hknl8nol8thGSlQj+sh3ZmCstqCyRbjX/WS2v+mkvl45Wk7cM5LXhy0g8RPLyGuJbeMbNnpaWICimMoSOOvnvUWUrRy1cF0yhGUtc+Ut2ZfjucMyFd+p/taQIpwinCKcIj+H2nwADAIPPt8XqH3sWAAAAAElFTkSuQmCC\" data-filename=\"cpanel_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">cPanel Included<br><br></h4>\r\n<p>All hosting accounts come with the latest version of cPanel. This makes life easy for you to do routine tasks such as setting up email addresses and managing MySQL databases.</p>\r\n</div>\r\n<div class=\"col-sm-4 wow fadeInUp\"><div style=\"text-align: center;\"><br></div><div style=\"text-align: center;\"><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBQkVBMjEyN0Q5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBQkVBMjEyNkQ5QjIxMUUyOUIzODgwQzExMTk5OUExNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpDNjYzQTg4QkZGRDhFMjExOUIyOUQzNDA5ODRBNThGNCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MzRBMzc3MDIzRDhFMjExQjE5NUMzQzQxMDY2RTg5MSIvPiA8L3JkZjpEZXNjcmlwdGlv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\" data-filename=\"php_icon.png\" style=\"width: 60px;\"></div><h4 style=\"text-align: center; \">Latest PHP &amp; MySQL<br><br></h4>\r\n<p>Our network runs the latest stable and secure versions of PHP &amp; MySQL. We also implement strict security and firewall rules to protect your website from unwanted visitors 24/7.</p>\r\n</div>\r\n</div>', 'page', 1, 0, '2020-05-12 05:41:45', '2020-06-24 03:22:47', 0, 1, 1, 0, 0, 0, NULL);
INSERT INTO `hd_posts` (`id`, `title`, `slug`, `pubdate`, `body`, `post_type`, `user_id`, `category_id`, `created`, `modified`, `parent_id`, `status`, `menu`, `sidebar_right`, `sidebar_left`, `order`, `option`) VALUES (7, 'layouts', 'layouts', '0000-00-00', '<h2 style=\"text-align: center; \">Flexible page layout.</h2><p><br></p><p><img src=\"data:image/png;base64,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\" data-filename=\"sections.png\" style=\"width: 800px;\"><br></p>', 'page', 1, 0, '2020-05-26 16:21:44', '2020-06-25 07:50:45', 0, 1, 1, 1, 1, 0, NULL);
INSERT INTO `hd_posts` (`id`, `title`, `slug`, `pubdate`, `body`, `post_type`, `user_id`, `category_id`, `created`, `modified`, `parent_id`, `status`, `menu`, `sidebar_right`, `sidebar_left`, `order`, `option`) VALUES (8, 'Domain Registration', 'domain_registration', '0000-00-00', '<p>.</p>', 'page', 1, 0, '2020-06-09 22:36:47', '2020-06-24 12:09:49', 0, 1, 1, 0, 0, 0, NULL);
INSERT INTO `hd_posts` (`id`, `title`, `slug`, `pubdate`, `body`, `post_type`, `user_id`, `category_id`, `created`, `modified`, `parent_id`, `status`, `menu`, `sidebar_right`, `sidebar_left`, `order`, `option`) VALUES (12, 'Flexible Packages', 'packages', '0000-00-00', '<h2><br></h2>', 'page', 1, 0, '2020-06-24 14:55:33', '2020-06-25 07:44:09', 0, 1, 1, 0, 1, 0, NULL);


#
# TABLE STRUCTURE FOR: hd_priorities
#

DROP TABLE IF EXISTS `hd_priorities`;

CREATE TABLE `hd_priorities` (
  `priority` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_priorities` (`priority`) VALUES ('Low');
INSERT INTO `hd_priorities` (`priority`) VALUES ('Medium');
INSERT INTO `hd_priorities` (`priority`) VALUES ('High');
INSERT INTO `hd_priorities` (`priority`) VALUES ('Urgent');


#
# TABLE STRUCTURE FOR: hd_resellerclub_ids
#

DROP TABLE IF EXISTS `hd_resellerclub_ids`;

CREATE TABLE `hd_resellerclub_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: hd_roles
#

DROP TABLE IF EXISTS `hd_roles`;

CREATE TABLE `hd_roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(64) NOT NULL,
  `default` int(11) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `hd_roles` (`r_id`, `role`, `default`, `permissions`) VALUES (1, 'admin', 1, '{\"settings\":\"permissions\",\"role\":\"admin\",\"view_all_invoices\":\"on\",\"edit_invoices\":\"on\",\"pay_invoice_offline\":\"on\",\"view_all_payments\":\"on\",\"email_invoices\":\"on\",\"send_email_reminders\":\"on\"}');
INSERT INTO `hd_roles` (`r_id`, `role`, `default`, `permissions`) VALUES (2, 'client', 2, '{\"settings\":\"permissions\",\"role\":\"client\"}');
INSERT INTO `hd_roles` (`r_id`, `role`, `default`, `permissions`) VALUES (3, 'staff', 3, '{\"settings\":\"permissions\",\"role\":\"staff\",\"view_all_invoices\":\"on\",\"edit_invoices\":\"on\",\"add_invoices\":\"on\",\"pay_invoice_offline\":\"on\",\"send_email_reminders\":\"on\",\"view_orders\":\"on\",\"manage_orders\":\"on\"}');


#
# TABLE STRUCTURE FOR: hd_servers
#

DROP TABLE IF EXISTS `hd_servers`;

CREATE TABLE `hd_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `port` int(10) NOT NULL,
  `use_ssl` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `username` varchar(100) NOT NULL,
  `authkey` text NOT NULL,
  `selected` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: hd_slider
#

DROP TABLE IF EXISTS `hd_slider`;

CREATE TABLE `hd_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `hd_slider` (`slider_id`, `name`, `status`) VALUES (7, 'Home Slider', 1);


#
# TABLE STRUCTURE FOR: hd_sliders
#

DROP TABLE IF EXISTS `hd_sliders`;

CREATE TABLE `hd_sliders` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (5, 0, 'edw', 'vvvv', '');
INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (6, 0, 'ff', 'gg', '');
INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (7, 0, 'gh', 'bnm', '');
INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (15, 7, '', '', 'slide1.jpg');
INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (16, 7, '', '', 'slide2.jpg');
INSERT INTO `hd_sliders` (`slide_id`, `slider`, `title`, `description`, `image`) VALUES (17, 7, 'HostingBilling', '    Slide with html  caption example <a href=\"auth/login\" class=\"btn btn-sm btn-warning\">Login</a>', 'slide3.jpg');


#
# TABLE STRUCTURE FOR: hd_status
#

DROP TABLE IF EXISTS `hd_status`;

CREATE TABLE `hd_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `hd_status` (`id`, `status`) VALUES (1, 'resolved');
INSERT INTO `hd_status` (`id`, `status`) VALUES (2, 'closed');
INSERT INTO `hd_status` (`id`, `status`) VALUES (3, 'open');
INSERT INTO `hd_status` (`id`, `status`) VALUES (5, 'pending');
INSERT INTO `hd_status` (`id`, `status`) VALUES (6, 'active');
INSERT INTO `hd_status` (`id`, `status`) VALUES (7, 'cancelled');
INSERT INTO `hd_status` (`id`, `status`) VALUES (8, 'deleted');
INSERT INTO `hd_status` (`id`, `status`) VALUES (9, 'suspended');
INSERT INTO `hd_status` (`id`, `status`) VALUES (10, 'status');


#
# TABLE STRUCTURE FOR: hd_tax_rates
#

DROP TABLE IF EXISTS `hd_tax_rates`;

CREATE TABLE `hd_tax_rates` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_rate_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `tax_rate_percent` decimal(10,2) NOT NULL DEFAULT 0.00,
  KEY `Index 1` (`tax_rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_tax_rates` (`tax_rate_id`, `tax_rate_name`, `tax_rate_percent`) VALUES (2, 'GST', '18.00');


#
# TABLE STRUCTURE FOR: hd_ticketreplies
#

DROP TABLE IF EXISTS `hd_ticketreplies`;

CREATE TABLE `hd_ticketreplies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticketid` int(10) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `replier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hd_tickets
#

DROP TABLE IF EXISTS `hd_tickets`;

CREATE TABLE `hd_tickets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `reporter` int(10) DEFAULT 0,
  `priority` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `archived_t` int(2) DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_code` (`ticket_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_un_sessions
#

DROP TABLE IF EXISTS `hd_un_sessions`;

CREATE TABLE `hd_un_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hd_un_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2934618fecf7ff55679db5e819fcfcd72c4661f1', '::1', 1474573713, '__ci_last_regenerate|i:1474573648;requested_page|s:24:\"http://localhost/folite/\";user_id|s:1:\"1\";username|s:5:\"admin\";role_id|s:1:\"1\";status|s:1:\"1\";previous_page|s:24:\"http://localhost/folite/\";');


#
# TABLE STRUCTURE FOR: hd_updates
#

DROP TABLE IF EXISTS `hd_updates`;

CREATE TABLE `hd_updates` (
  `build` int(11) NOT NULL DEFAULT 0,
  `code` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `importance` enum('low','medium','high') DEFAULT 'low',
  `dependencies` varchar(255) DEFAULT NULL,
  `installed` int(11) DEFAULT 0,
  `sql` text DEFAULT NULL,
  `files` text DEFAULT NULL,
  `depends` varchar(255) DEFAULT NULL,
  `includes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`build`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hd_user_autologin
#

DROP TABLE IF EXISTS `hd_user_autologin`;

CREATE TABLE `hd_user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires` timestamp NULL DEFAULT NULL,
  `remote` int(2) DEFAULT 0,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('0532486ae972ca6934e219aebf579e9b', 32, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '186.10.195.255', '2020-05-01 22:57:28', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('08701bb79b8c75b60b303e46dafbfbf6', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '103.120.201.165', '2020-05-03 00:40:35', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('102e6d927b33ef03537b548337d2d770', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '45.247.25.60', '2020-04-29 19:51:24', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('158a7de6d26112ce5397d333b3958ddb', 1, 'Mozilla/5.0 (Linux; U; Android 8.1.0; Infinix X624 Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile S', '82.145.220.196', '2020-04-30 20:46:57', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('15a47c93b4cadbbe370cf17c71274278', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '158.140.114.110', '2020-05-05 00:41:22', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('4095479d64c9a88e63e4c2a1f9fa0c74', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '82.64.234.146', '2020-05-04 05:25:37', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('5825b2724fb4dc71b1a2e30986e1fdfb', 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '88.81.80.248', '2020-04-30 21:11:05', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('5bad799069f7e3eb533cefed3a71430b', 12, '', '', '2020-05-03 01:12:38', '2020-05-05 23:05:12', 1);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('5bb820c49e56f1850bb3fc24f65ead3f', 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '182.160.105.162', '2020-05-01 01:03:51', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('61e5a11557a6d5d8d2e64fc6ea25947d', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Safari/537.36', '185.12.17.186', '2020-05-01 00:28:15', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('656e162c40b2401ef9e345165f3ff374', 1, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', '146.196.33.68', '2020-04-30 17:00:32', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('692b6c017c4ed9a4f999422272994a82', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '2.84.192.159', '2020-05-01 17:50:27', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('77837dbd774c627e8651c364919bc1be', 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '152.0.227.228', '2020-04-29 22:07:13', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('81bda9d23b3ad7ed82cfddb37f82e692', 26, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0', '43.239.80.167', '2020-04-30 09:44:19', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('8487bdfed27557d1aaa052066b419f8f', 1, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', '24.202.158.170', '2020-05-06 19:09:41', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('8da5ca4fdab9ce52b42eb436a66238c8', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '43.239.80.167', '2020-04-30 09:38:44', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('90b013c79df565b630f285e2d1eb2f58', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '45.250.245.139', '2020-05-02 04:57:56', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('956e7d078734c165b30af1ec99a05525', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36', '102.128.79.111', '2020-04-30 08:54:36', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('9dd587fa2fed94062f5382bcf89c2e43', 12, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Safari/537.36', '45.232.92.171', '2020-05-01 17:14:53', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('a940728ede301f0b628e4a390b452323', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '116.204.252.126', '2020-04-30 06:13:45', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('b16761744cb4c9e0d6c3e9fe169e4336', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36', '103.67.159.159', '2020-04-29 18:43:25', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('b7da37d7b3d916fbc1023c030d4c78b4', 12, 'Mozilla/5.0 (Windows NT 6.1; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', '41.92.117.20', '2020-05-04 12:00:25', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('de933142d5d05588231aa2abe51b7ddb', 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', '46.134.142.101', '2020-04-29 20:14:57', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('e9d0da5285ad57a5d0a3845e4427213d', 12, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 UBrowser/7.0.185.1002 Safari/537.36', '202.134.13.131', '2020-05-03 14:08:07', NULL, 0);
INSERT INTO `hd_user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`, `expires`, `remote`) VALUES ('eb8bd5e4d79d1cc1e28d1fcf8aabba82', 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '94.31.96.250', '2020-04-29 22:13:24', NULL, 0);


#
# TABLE STRUCTURE FOR: hd_users
#

DROP TABLE IF EXISTS `hd_users`;

CREATE TABLE `hd_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `created` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `hd_users` (`id`, `username`, `password`, `email`, `role_id`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES (1, 'Admin', '$P$B3Sxldfl58SYfEkjRLdIphpsTGRl9y1', 'support@sendformapi.com', 1, 1, 0, NULL, NULL, NULL, '', '', '127.0.0.1', '2020-06-29 05:13:16', '2020-03-14 12:56:29', '2020-06-29 07:13:16');


