-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2015 at 08:54 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vedica_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_academic_details`
--

CREATE TABLE IF NOT EXISTS `added_academic_details` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_degree_level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_degree_level_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_name_of_college` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_university` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_university_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_degree_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_degree_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_discipline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_discipline_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_specialisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_degree_completed` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_year_completion` int(11) DEFAULT NULL,
  `extra_academic_grading_system` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_aggregate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_gpa_obtained` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_gpa_max` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `added_work_experience_details`
--

CREATE TABLE IF NOT EXISTS `added_work_experience_details` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_type_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `started_work_date` datetime DEFAULT NULL,
  `completed_work_date` datetime DEFAULT NULL,
  `joined_as` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annual_renumeration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles_and_responsibilty` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=664 ;

-- --------------------------------------------------------

--
-- Table structure for table `admission_config`
--

CREATE TABLE IF NOT EXISTS `admission_config` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `registration_closed` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `test` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `admission_section_status`
--

CREATE TABLE IF NOT EXISTS `admission_section_status` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `personal_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `academic_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_ex_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_details_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_users`
--

CREATE TABLE IF NOT EXISTS `admission_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_system_registrations_date` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_registrations_user_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reminder_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Reminder tracking only for pending status',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=565 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_system_email_activation`
--

CREATE TABLE IF NOT EXISTS `login_system_email_activation` (
  `login_system_email_activation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_system_email_activation_user_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `login_system_email_activation_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_email_activation_expire` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_email_activation_useremail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_email_activation_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_email_activation_date` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_email_activation_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_email_activation_attempts` int(10) NOT NULL,
  `login_system_email_activation_blocked_time` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_email_activation_status` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`login_system_email_activation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=565 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_system_forgot_password`
--

CREATE TABLE IF NOT EXISTS `login_system_forgot_password` (
  `login_system_forgot_password_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_system_forgot_password_user_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `login_system_forgot_password_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_forgot_password_expire` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_forgot_password_useremail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_forgot_password_token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_forgot_password_date` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_forgot_password_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_forgot_password_attempts` int(10) NOT NULL,
  `login_system_forgot_password_blocked_time` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`login_system_forgot_password_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_system_login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_system_login_attempts` (
  `login_system_login_attempts_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_system_login_attempts_user_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `login_system_login_attempts_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_login_attempts_attempts` int(10) NOT NULL,
  `login_system_login_attempts_date` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_login_attempts_blocked_time` datetime DEFAULT '0000-00-00 00:00:00',
  `login_system_login_attempts_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`login_system_login_attempts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_system_register_social_networks`
--

CREATE TABLE IF NOT EXISTS `login_system_register_social_networks` (
  `login_system_register_social_networks_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_system_register_social_networks_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_provider_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_profile_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_system_register_social_networks_date` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`login_system_register_social_networks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_graduation_discipline`
--

CREATE TABLE IF NOT EXISTS `lookup_graduation_discipline` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_graduation_university`
--

CREATE TABLE IF NOT EXISTS `lookup_graduation_university` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=422 ;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_industry_type`
--

CREATE TABLE IF NOT EXISTS `lookup_industry_type` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_organisation_type`
--

CREATE TABLE IF NOT EXISTS `lookup_organisation_type` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_export`
--

CREATE TABLE IF NOT EXISTS `pdf_export` (
  `application_id` varchar(255) NOT NULL DEFAULT '',
  `pdf_generated` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_academic_details`
--

CREATE TABLE IF NOT EXISTS `users_academic_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tenth_name_of_institute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenth_board` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenth_board_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenth_aggregate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenth_year_completion` int(11) DEFAULT NULL,
  `is_twelfth_or_diploma` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twelfth_name_of_institution` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twelfth_board` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twelfth_board_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twelfth_aggregate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twelfth_year_completion` int(11) DEFAULT NULL,
  `graduation_name_of_college` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_university` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_university_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_degree_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_degree_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_discipline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_discipline_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_specialisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_degree_completed` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_year_completion` int(11) DEFAULT NULL,
  `graduation_grading_system` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_aggregate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_gpa_obtained` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_gpa_max` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_academic_added_count` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `achievements_awards` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_cat_score_details`
--

CREATE TABLE IF NOT EXISTS `users_cat_score_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cat_application_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_exam_date` date DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_cet_score_details`
--

CREATE TABLE IF NOT EXISTS `users_cet_score_details` (
  `application_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cet_roll_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cet_marks` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cet_percentile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `application_id` (`application_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_contact_details`
--

CREATE TABLE IF NOT EXISTS `users_contact_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address_line1` text COLLATE utf8_unicode_ci,
  `current_address_line2` text COLLATE utf8_unicode_ci,
  `current_address_line3` text COLLATE utf8_unicode_ci,
  `current_address_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address_state_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address_pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_same_as_current_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address_line1` text COLLATE utf8_unicode_ci,
  `permanent_address_line2` text COLLATE utf8_unicode_ci,
  `permanent_address_line3` text COLLATE utf8_unicode_ci,
  `permanent_address_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address_state_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address_pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_documents_uploads`
--

CREATE TABLE IF NOT EXISTS `users_documents_uploads` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `passport_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_did_you_hear_of_jbims` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `applied_to_jbims_before` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `applied_to_jbims_before_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_support_information` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_gmat_score_details`
--

CREATE TABLE IF NOT EXISTS `users_gmat_score_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gmat_registration_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_exam_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_verbal_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_quant_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_total_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_verbal_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_quant_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_total_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_awa_awaited` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_awa_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_awa_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_integrated_reasoning_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmat_integrated_reasoning_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_gre_score_details`
--

CREATE TABLE IF NOT EXISTS `users_gre_score_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gre_registration_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_exam_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_verbal_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_quant_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_total_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_verbal_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_quant_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_total_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_awa_awaited` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_awa_score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gre_awa_percentile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_payment_details`
--

CREATE TABLE IF NOT EXISTS `users_payment_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd_payment_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd_reference_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd_email_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd_bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dd_date` date DEFAULT NULL,
  `payment_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notified_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Only in case of DD',
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_personal_details`
--

CREATE TABLE IF NOT EXISTS `users_personal_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `f_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_ssn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_issued_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `differently_abled` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university_of_graduation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_reference_details`
--

CREATE TABLE IF NOT EXISTS `users_reference_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_of_refree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_refree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacity_of_knowing` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_test_score_details`
--

CREATE TABLE IF NOT EXISTS `users_test_score_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `test_apprearing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_work_experience_details`
--

CREATE TABLE IF NOT EXISTS `users_work_experience_details` (
  `application_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `work_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_organization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_type_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `started_work_date` date DEFAULT NULL,
  `completed_work_date` date DEFAULT NULL,
  `joined_as` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annual_renumeration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles_and_responsibilty` text COLLATE utf8_unicode_ci,
  `extra_workex_count` int(11) DEFAULT NULL,
  `total_work_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
