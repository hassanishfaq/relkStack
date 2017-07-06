-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 11:20 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syslog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ip_info`
--

CREATE TABLE `ip_info` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip_info`
--

INSERT INTO `ip_info` (`id`, `ip`, `latitude`, `longitude`, `city`) VALUES
(77, '182.180.109.168', '31.4888', '74.3686', 'Lahore'),
(78, '182.179.153.214', '33.69', '73.0551', 'Islamabad'),
(79, '39.35.222.3', '32.2511', '74.1648', 'Talwandi Rahwali'),
(80, '103.249.231.194', '30', '70', ''),
(81, '182.186.252.131', '31.4167', '73.0833', 'Faisalabad'),
(82, '101.50.127.255', '33.6007', '73.0679', 'Rawalpindi'),
(83, '121.52.159.189', '30.0156', '67.016', 'Quetta');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dat_time` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `ip`, `title`, `description`, `dat_time`) VALUES
(1, '182.180.109.168', 'islamabad', 'capital city', '3:02 PM\nMonday, 19 June 2017'),
(2, '182.179.153.214', 'Peshawar', 'capital of KPK', '3:02 PM\nMonday, 19 June 2017'),
(3, '39.35.222.3', 'lahore', 'capital of punjab', '3:02 PM\nMonday, 19 June 2017'),
(4, '103.249.231.194', 'Quetta', 'capital of baluchistan', '3:02 PM\nMonday, 19 June 2017'),
(5, '182.186.252.131', 'Multan', 'Big city of punjab', '3:02 PM\nMonday, 19 June 2017'),
(6, '101.50.127.255', 'karachi', 'capital of sind', '3:02 PM\nMonday, 19 June 2017'),
(26, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(27, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(28, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(29, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(30, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(31, '121.52.159.189', 'Balochistan', '', 'q3:02 PM\nMonday, 19 June 2017'),
(32, '121.52.159.189', 'Balochistan', '', '3:02 PM\nMonday, 19 June 2017'),
(33, '121.52.159.189', 'Balochistan', '', 'qw'),
(34, '121.52.159.189', 'Balochistan', '', 'qw'),
(35, '121.52.159.189', 'Balochistan', '', 'qw'),
(36, '121.52.159.189', 'Balochistan', '', 'qw'),
(37, '121.52.159.189', 'Balochistan', '', 'qw'),
(38, '121.52.159.189', 'Balochistan', '', 'qw'),
(39, '121.52.159.189', 'Balochistan', '', 'qw'),
(40, '121.52.159.189', 'Balochistan', '', 'qw'),
(41, '121.52.159.189', 'Balochistan', '', 'qw'),
(42, '121.52.159.189', 'Balochistan', '', 'qw'),
(43, '121.52.159.189', 'Balochistan', '', 'qw'),
(44, '121.52.159.189', 'Balochistan', '', 'qw'),
(45, '121.52.159.189', 'Balochistan', '', 'qw'),
(46, '121.52.159.189', 'Balochistan', '', 'qw'),
(47, '121.52.159.189', 'Balochistan', '', 'qw'),
(48, '121.52.159.189', 'Balochistan', '', 'qw'),
(49, '121.52.159.189', 'Balochistan', '', 'qw'),
(50, '121.52.159.189', 'Balochistan', '', 'qw'),
(51, '121.52.159.189', 'Balochistan', '', 'qw'),
(52, '121.52.159.189', 'Balochistan', '', 'reee'),
(53, '121.52.159.189', 'Balochistan', '', 'nhhh'),
(54, '121.52.159.189', 'Balochistan', '', 'yyy'),
(55, '121.52.159.189', 'Balochistan', '', 'xxx'),
(56, '121.52.159.189', 'Balochistan', '', 'zzz');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` int(255) NOT NULL,
  `function_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `detail` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `function_id`, `message`, `url`, `body`, `detail`, `category`) VALUES
(2, '1001', 'Couldn''t open /etc/securetty (root)', '_search', '{  \n      "query":{  \n         "query_string":{  \n            "query":" Couldn''t+open+//+etc+//+securetty ",\n            "fields":[  \n               "syslog_message"\n            ]\n         }\n      }\n   }\n', 'File missing. Root access unrestricted', 'Syslog,error'),
(3, '1002 ', 'bad_words(root)', '_search', '{  \n      "query":{  \n         "query_string":{  \n            "query":" $bad_words ",\n            "fields":[  \n               "syslog_message"\n            ],\n            "default_operator":"AND"\n         }\n      }\n   }\n', 'Unknown problem somewhere in the system', 'Syslog,error'),
(4, '1004', 'exiting on signal (root)', '_search', '{\n        "query_string": {\n"prefix": {\n            "query": " exiting on signal ",\n            "fields": ["syslog_message "],\n         "default_operator":"AND"\n\n}\n        }\n    }\n}\n', 'Syslogd exiting (logging stopped)', 'Syslog,error'),
(5, '1005', 'restart (root)', '_search', '{\n    "query": {\n        "query_string": {\n"prefix": {\n            "query": " restart ",\n            "fields": ["syslog_message "],\n         "default_operator":"AND"\n\n}\n        }\n    }\n}\n', 'Syslogd restarted', 'Syslog,error'),
(103, '1006', 'syslogd \\S+ restart (root)', '_search''', '{\n   "fields": [\n       "host"\n    ],\n   "filter": {\n      "bool": {\n         "should": [\n            {\n               "regexp": {\n                  "syslog_message": " syslogd.*"\n               }\n            },\n            {\n               "regexp": {\n                  " syslog_message ": ".* restart "\n               }\n            }\n         ]\n      }\n   }\n}\n', 'Syslogd restarted', 'Syslog,error'),
(104, '1007', 'file system full OR no space left on device (root)', '_search', '{  \n      "query":{  \n         "query_string":{  \n            "query":" file system full OR no space left on device ",\n            "fields":[  \n               "syslog_message"\n            ],\n            "default_operator":"AND"\n         }\n      }\n   }\n', 'File system full', 'Syslog,error'),
(105, '1008', 'killed by SIGTERM (root)', '_search', '{  \n      "query":{  \n         "query_string":{  \n            "query":" killed by SIGTERM ",\n            "fields":[  \n               "syslog_message"\n            ],\n            "default_operator":"AND"\n         }\n      }\n   }\n', 'Process exiting (killed)', 'Syslog,error'),
(106, '2100', 'automount OR mount (root)', '_search', '{\n    "query": {\n        "filtered": {\n            "filter": {\n                "regexp": {\n                    "syslog_message": " automount .* OR  mount.* "\n                }\n            },\n            "query": {\n                "match_all": {}\n            }\n        }\n    }\n}\n', 'NFS rules grouped', 'syslog,nfs'),
(107, '2101', 'nfs: mount failure (root)', '_search', '{\n    "query": {\n        "filtered": {\n            "filter": {\n                "regexp": {\n                    "syslog_message": " automount .* OR  mount.* AND nfs: mount failure "\n                }\n            },\n            "query": {\n                "match_all": {}\n            }\n        }\n    }\n}\n', 'Unable to mount the NFS share', 'syslog,nfs'),
(108, '2102', 'reason given by server: Permission denied (root)', '_search', '{\n    "query": {\n        "filtered": {\n            "filter": {\n                "regexp": {\n                    "syslog_message": " automount .* OR  mount.* AND reason given by server: Permission denied "\n                }\n            },\n            "query": {\n                "match_all": {}\n            }\n        }\n    }\n}\n', 'Unable to mount the NFS directory', 'syslog,nfs'),
(109, '2103', 'rpc.mountd: refused mount request from (root)', '_search', '{\n    "query": {\n        "filtered": {\n            "filter": {\n                "regexp": {\n                    "syslog_message": " rpc.mountd: refused mount request from .*"\n                }\n            },\n            "query": {\n                "match_all": {}\n            }\n        }\n    }\n}\n', 'Unable to mount the NFS directory', 'syslog,nfs'),
(110, '2104', 'automount OR mount AND lookup for \\S+ failed (root)', '_search', ' {\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" automount.* "\r\n}\r\n},\r\n{\r\n"regex":{\r\n" syslog_message ":" mount.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " lookup for.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": ".* failed "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'Automount informative message', 'syslog,nfs'),
(111, '2301', 'Deactivating service (root)', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " Deactivating service ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'Excessive number connections to a service', 'syslog,nfs'),
(112, '2501', 'User authentication failure', '_search', '{  \n      "query":{  \n         "query_string":{  \n            "query":" FAILED LOGIN OR authentication failure OR Authentication failed for OR invalid password for OR LOGIN FAILURE OR auth failure: OR authentication error OR authinternal failed OR Failed to authorize OR Wrong password given for OR login failed OR Auth: Login incorrect OR authentication_failed,",\n            "fields":[  \n               "syslog_message"\n            ],\n            "default_operator":"AND"\n         }\n      }\n   } \n', 'FAILED LOGIN OR authentication failure OR Authentication failed for OR invalid password for OR LOGIN FAILURE OR auth failure: OR authentication error OR authinternal failed OR Failed to authorize OR Wrong password given for OR login failed OR Auth: Login incorrect OR authentication_failed,", (root)', 'Access control messages'),
(113, '2502', 'User missed the password more than one time', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" more authentication failures; OR REPEATED login failures ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'more authentication failures;|REPEATED login failures (root)', 'Access control messages'),
(114, '2503', 'Connection blocked by Tcp Wrappers', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n         "should": [\r\n{\r\n               "regexp": {\r\n                  " syslog_message ": " libwrap refused connection.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Connection from.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": ".* denied "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'libwrap refused connection OR Connection from \\S+ denied (root)', 'Access control messages'),
(115, '2504', 'Illegal root login', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" ILLEGAL ROOT LOGIN OR ROOT LOGIN REFUSED ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'ILLEGAL ROOT LOGIN|ROOT LOGIN REFUSED (root)', 'Access control messages'),
(116, '2505', 'Physical root login', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " ROOT LOGIN  on ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'ROOT LOGIN  on (root)', 'Access control messages'),
(117, '2506', 'Pop3 Authentication passed', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " Authentication passed ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'Authentication passed (root)', 'Access control messages'),
(118, '2550', 'rshd messages grouped', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" rshd ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'rshd (root)', 'syslog,access_control'),
(119, '2551', 'Connection to rshd from unprivileged port. Possible network scan', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" rshd "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Connection from.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": ".* on illegal port "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'rshd AND Connection from \\S+ on illegal port (root)', 'syslog,access_control'),
(120, '2701', 'Ignoring procmail messages', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " procmail ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'procmail (root)', 'Mail/Procmail messages '),
(121, '2800', 'Pre-match rule for smartd', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    "syslog_message": "smart.*"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'smart (root)', 'Smartd messages'),
(122, '2801', 'Smartd Started but not configured', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    "syslog_message": "smart.* AND No configuration file /etc/smartd.conf found "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'smart.* AND No configuration file /etc/smartd.conf found (root)', '	 Smartd messages'),
(123, '2802', 'Smartd configuration problem', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    "syslog_message": "smart.* AND Unable to register ATA device"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'Smartd configuration problem', '	 Smartd messages'),
(124, '2803', 'Device configured but not available to Smartd', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    "syslog_message": "smart.* AND No such device or address "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'smart.* AND No such device or address (root)', '_search'),
(125, '5100', 'Pre-match rule for kernel messages', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " kernel .*"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'kernel (root)', 'Syslog Linuxkernel'),
(126, '5101', 'Informative message from the kernel', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " kernel .* AND PCI: if you experience problems, try using option "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'kernel .* AND PCI: if you experience problems, try using (root)', '	 Syslog Linuxkernel'),
(127, '5102', 'Informative message from the kernel', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " kernel .* AND modprobe: Can''t locate module sound "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'kernel .* AND modprobe: Can''t locate module sound (root)', '	 Syslog Linuxkernel'),
(128, '5103', 'Error message from the kernel, Ping of death attack', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " kernel .* AND Oversized packet received from "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'kernel .* AND Oversized packet received from (root)', '	 Syslog Linuxkernel'),
(129, '5104', 'Interface entered in promiscuous(sniffing) mode', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " device.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": ".* entered promiscuous mode "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND device \\S+ entered promiscuous mode (root)', '	 Syslog Linuxkernel'),
(130, '5105', 'Invalid request to /dev/fd0 (bug on the kernel)', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " end_request: I/O error, dev fd0, sector 0 OR Buffer I/O error on device fd0, logical block 0"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND end_request: I/O error, dev fd0, sector 0 OR Buffer I/O error on device fd0, logical block 0 (root)', '	 Syslog Linuxkernel'),
(131, '5106', 'NFS incompability between Linux and Solaris', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " svc: unknown program 100227 (me 100003)"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND svc: unknown program 100227 (me 100003) (root)', '	 Syslog Linuxkernel'),
(132, '5107', 'NFS incompability between Linux and Solaris', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " svc: bad direction "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND svc: bad direction (root)', '	 Syslog Linuxkernel'),
(133, '5108', 'System running out of memory, Availability of the system is in risk', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Out of Memory: "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND Out of Memory: (root)', '	 Syslog Linuxkernel'),
(134, '5109', 'Kernel Input/Output error', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " I/O error: dev OR end_request: I/O error, dev "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND I/O error: dev OR end_request: I/O error, dev (root)', '	 Syslog Linuxkernel'),
(135, '5110', 'IRC misconfiguration', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Forged DCC command from "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND Forged DCC command from (root)', '	 Syslog Linuxkernel'),
(136, '5111', 'Kernel device error', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " ipw2200: Firmware error detected."\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND ipw2200: Firmware error detected. (root)', '	 Syslog Linuxkernel'),
(137, '5112', 'Kernel usbhid probe error (ignored)', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " usbhid: probe of "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND usbhid: probe of (root)', '	 Syslog Linuxkernel'),
(138, '5113', 'System is shutting down', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Kernel log daemon terminating "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND Kernel log daemon terminating (root)', 'Syslog Linuxkernel'),
(139, '5130', 'Monitor ADSL line is down', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " ADSL line is down "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND ADSL line is down (root)', '	 Syslog Linuxkernel'),
(140, '5131', 'Monitor ADSL line is up', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" kernel.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " ADSL line is up "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'kernel AND ADSL line is up (root)', '	 Syslog Linuxkernel'),
(141, '5200', 'Ignoring hpiod for producing useless logs', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " hpiod: unable to ParDevice.*"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'hpiod: unable to ParDevice (root)', '	 Syslog Linuxkernel'),
(142, '2830', 'Crontab rule group', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" crond OR crontab "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " unable to exec.*"\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'crond OR crontab AND unable to exec (root)', 'SYSLOG,LINUXKERNEL'),
(143, '2834', 'Crontab opened for editing', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" crond OR crontab "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " BEGIN EDIT "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'crond OR crontab AND BEGIN EDIT (root)', 'SYSLOG,LINUXKERNEL'),
(144, '2832', 'Crontab entry changed', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" crond OR crontab "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " REPLACE "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'crond OR crontab AND REPLACE (root)', 'SYSLOG,LINUXKERNEL'),
(145, '2833', 'Root''s crontab entry changed', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" crond OR crontab "\r\n}\r\n},\r\n{\r\n"regex":{\r\n" syslog_message ":" REPLACE "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " (root).* "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'crond OR crontab AND REPLACE AND (root)', 'SYSLOG,LINUXKERNEL'),
(146, '5300', 'Initial grouping for su messages', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" su ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'su (root)', 'Ayslog, SU'),
(147, '5301', 'User missed the password to change UID (user id)', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" su "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " authentication failure; OR failed OR BAD su OR ^- OR -  "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'su AND Connection from \\S+ on illegal port (root)', 'Ayslog, SU'),
(148, '5302', 'User missed the password to change UID to root', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" su AND authentication failure; OR failed OR BAD su OR ^- OR -  "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " root.* "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'su AND Connection from \\S+ on illegal port (root)', 'Ayslog, SU'),
(149, '7101', 'Problems with the tripwire checking', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" Integrity Check failed: File could not ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'Integrity Check failed: File could not (root)', 'Syslog, Tripwire'),
(150, '5901', 'New group added to the system', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " new group ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'new group (root)', 'Syslog, Adduser'),
(151, '5902', 'New user added to the system', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " new user OR new account added ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'new user OR new account added (root)', 'Ayslog, SU'),
(152, '5903', 'Group (or user) deleted from the system', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " new user OR account deleted OR remove group ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'new user OR account deleted OR remove group (root)', 'Ayslog, SU'),
(153, '5904', 'Information from the user was changed', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " changed user ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n} \r\n', 'changed user (root)', 'Ayslog, SU'),
(154, '5400', 'Initial group for sudo messages', 'sudo (root)', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" sudo ",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'sudo (root)', 'Syslog Sudo'),
(155, '9100', 'PPTPD messages grouped', '_search', '{\r\n    "query": {\r\n        "query_string": {\r\n"prefix": {\r\n            "query": " pptpd ",\r\n            "fields": ["syslog_message "],\r\n         "default_operator":"AND"\r\n\r\n}\r\n        }\r\n    }\r\n}\r\n', 'pptpd (root)', 'Syslog, Pptp'),
(156, '9101', 'PPTPD failed message (communication error)', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n"title":" pptpd.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  "title": " GRE:.*"\r\n               }\r\n            },\r\n            {\r\n               "regexp": {\r\n                  "title": ".* failed: status = -1 "\r\n               }\r\n            }\r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'pptpd AND GRE: \\S+ from \\S+ failed: status = -1  (root)', 'Syslog, Pptp'),
(157, '9102', 'PPTPD communication error', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n"title":" pptpd.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  "title": " tcflush failed: Bad file descriptor.*"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'pptpd AND tcflush failed: Bad file descriptor (root)', 'Syslog, Pptp'),
(158, '10100', 'First time user logged in', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    "syslog_message": " squid.*"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'squid (root)', 'Syslog, Fts'),
(159, '9201', 'Squid debug message', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" squid.* "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " ctx: enter level.* OR sslRead.* OR urlParse: Illegal.* OR  httpReadReply: Request not yet.* OR httpReadReply: Excess data.* "\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'squid AND ctx: enter level.* OR sslRead.* OR urlParse: Illegal.* OR  httpReadReply: Request not yet.* OR httpReadReply: Excess data.* (root)', 'Syslog, Fts'),
(160, '2900', 'Dpkg (Debian Package) log', '_search', '{\r\n   "query":{\r\n      "filtered":{\r\n         "filter":{\r\n            "bool":{\r\n               "must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":"@"\r\n                     }\r\n                  }\r\n]\r\n            }\r\n         }\r\n      }\r\n   }\r\n}\r\n}\r\n}\r\n', ' \\d\\d\\d\\d-\\d\\d-\\d\\d \\d\\d:\\d\\d:\\d\\d \\w+  (root)', 'Syslog, Dpkg'),
(161, '2901', 'New dpkg (Debian Package) requested to install', '_search', '{\r\n   "query":{\r\n      "filtered":{\r\n         "filter":{\r\n            "bool":{\r\n               "must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":"@"\r\n                     }\r\n                  }\r\n]\r\n"must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":"install"\r\n                     }\r\n                  }\r\n]\r\n\r\n            }\r\n         }\r\n      }\r\n   }\r\n}\r\n}\r\n}\r\n', '\\d\\d\\d\\d-\\d\\d-\\d\\d \\d\\d:\\d\\d:\\d\\d install (root)', 'Syslog, Dpkg'),
(162, '2902', 'New dpkg (Debian Package) installed', '_search', '{\r\n   "query":{\r\n      "filtered":{\r\n         "filter":{\r\n            "bool":{\r\n               "must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":"@"\r\n                     }\r\n                  }\r\n]\r\n"must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":" status installed "\r\n                     }\r\n                  }\r\n]\r\n\r\n            }\r\n         }\r\n      }\r\n   }\r\n}\r\n}\r\n}\r\n', '\\d\\d\\d\\d-\\d\\d-\\d\\d \\d\\d:\\d\\d:\\d\\d status installed (root)', 'Syslog, Dpkg'),
(163, '2903', 'Dpkg (Debian Package) removed', '_search', '{\r\n   "query":{\r\n      "filtered":{\r\n         "filter":{\r\n            "bool":{\r\n               "must":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":"@"\r\n                     }\r\n                  }\r\n],\r\n"should":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":" remove "\r\n                     }\r\n                  }\r\n] ,\r\n"should":\r\n[\r\n                  {\r\n                     "regexp":{\r\n                        " syslog_message ":"[0-9]{4}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}"\r\n                     }\r\n                  },\r\n\r\n  {\r\n                     "regexp":{\r\n                        " syslog_message ":" purge "\r\n                     }\r\n                  }\r\n]\r\n\r\n            }\r\n         }\r\n      }\r\n   }\r\n}\r\n}\r\n}\r\n', '\\d\\d\\d\\d-\\d\\d-\\d\\d \\d\\d:\\d\\d:\\d\\d remove | purge (root)', 'Syslog, Dpkg'),
(164, '2930', 'Yum logs', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " yum .*"\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'yum (root)', 'Syslog, Dpkg'),
(165, '2931', 'Yum logs', '_search', '{\r\n    "query": {\r\n        "filtered": {\r\n            "filter": {\r\n                "regexp": {\r\n                    " syslog_message ": " Installed .* OR  Updated.* OR  Erased.*  "\r\n                }\r\n            },\r\n            "query": {\r\n                "match_all": {}\r\n            }\r\n        }\r\n    }\r\n}\r\n', 'Installed OR Updated OR Erased (root)', 'Syslog, Dpkg'),
(166, '2932', 'New Yum package installed', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" yum.* AND Installed.* OR  Updated.* OR  Erased.*  "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Installed.*"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'yum AND Installed  OR  Updated OR  Erased  AND Installed (root)', 'Syslog, Dpkg'),
(167, '2933', 'Yum package updated', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" yum.* AND Installed.* OR  Updated.* OR  Erased.*  "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Updated.*"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'yum AND Installed  OR  Updated OR  Erased  AND Updated (root)', 'Syslog, Dpkg'),
(168, '2934', 'Yum package deleted', '_search', '{\r\n   "fields": [\r\n       "host"\r\n    ],\r\n   "filter": {\r\n      "bool": {\r\n"must":[\r\n{\r\n"regex":{\r\n" syslog_message ":" yum.* AND Installed.* OR  Updated.* OR  Erased.*  "\r\n}\r\n}\r\n]\r\n         "should": [\r\n            {\r\n               "regexp": {\r\n                  " syslog_message ": " Erased.*"\r\n               }\r\n            }\r\n            \r\n         ]\r\n      }\r\n   }\r\n}\r\n', 'yum AND Installed  OR  Updated OR  Erased  AND Erased (root)', 'Syslog, Dpkg'),
(181, '5401', 'Three failed attempts to run sudo', '_search', 'sudo AND 3 incorrect password attempts (root)', 'sudo AND 3 incorrect password attempts (root)', 'Syslog, Sudo'),
(182, '5402', 'Successful sudo to ROOT executed', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" sudo AND ; USER=root ; COMMAND=",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'sudo AND ; USER=root ; COMMAND= (root)', 'Syslog, Sudo'),
(183, '5403', 'First time user executed sudo', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" sudo AND First time user executed sudo.",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'sudo AND First time user executed sudo. (root)', 'Syslog, Sudo'),
(184, '000', 'Test Query', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" Failed.",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'Test query to verify stability. (root)', 'Test'),
(185, '000', 'Test Query1', '_search', '{  \r\n      "query":{  \r\n         "query_string":{  \r\n            "query":" Failed.",\r\n            "fields":[  \r\n               "syslog_message"\r\n            ],\r\n            "default_operator":"AND"\r\n         }\r\n      }\r\n   }\r\n', 'Test query to verify stability. (root)', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ip_info`
--
ALTER TABLE `ip_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ip_info`
--
ALTER TABLE `ip_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
