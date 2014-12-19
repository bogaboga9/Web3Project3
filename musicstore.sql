-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2014 at 08:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musicstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
`ID` bigint(20) unsigned NOT NULL,
  `Artist` varchar(128) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `About` text NOT NULL,
  `Release` date NOT NULL,
  `CD` tinyint(1) NOT NULL,
  `MP3` tinyint(1) NOT NULL,
  `Quant` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `Artist`, `Name`, `About`, `Release`, `CD`, `MP3`, `Quant`, `Price`) VALUES
(1, 'Foreigner', 'No End in Sight: The Very Best of Foreigner', 'This is the most epic Foreigner Album of all time. I can mow the lawn and ROCK OUT!', '2008-07-15', 1, 1, 9996, 19.95),
(2, 'Foreigner', 'Double Vision', 'This is the Best Album to get Drunk to.', '2002-08-06', 1, 0, 9995, 9.95),
(4, 'Loverboy', 'Get Luky', 'The Title says it all.', '2006-08-25', 1, 0, 1000, 8.95),
(5, 'Loverboy', 'Unfinished Business', 'Classic Loverboy song. This album doesn''t suck, like that stuff those Aqua Jerks listen to.', '2014-07-15', 1, 1, 1000, 9.95),
(6, 'Boston', 'Boston', 'All I can say is, BOSTON!', '2006-03-01', 1, 1, 981, 5.95),
(7, 'Boston', 'Walk On', 'Yeah, if you don''t like this, then you should get out of my store.', '1994-05-09', 1, 1, 992, 8.95),
(8, 'Backstreet Boys', 'The Essential Backstreet Boys', 'I had to get this for that Meatwad. He gets crazy for this crap!', '2013-09-22', 1, 0, 952, 10.99),
(9, 'Fattburger', 'Greatest Hits', 'For not being Rock, this isn''t bad', '2007-03-27', 1, 1, 974, 9.49),
(10, 'Jay-Z', 'Magna Carta Holy Grail', 'I hate it, but Master Shake Buys it. It''s that Rap music those kids are into these days.', '2013-07-08', 0, 1, 0, 4.99);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `ID` int(11) NOT NULL,
  `Number` tinyint(4) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Length` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`ID`, `Number`, `Name`, `Length`) VALUES
(1, 1, 'Feels Like the First Time', '3:52'),
(1, 2, 'Long, Long Way From Home', '2:55'),
(1, 3, 'Cold As Ice', '3:20'),
(1, 4, 'Headnocker', '3:01'),
(2, 1, 'Hot Blooded', '4:28'),
(2, 2, 'Blue Morning, Blue Day new', '3:13'),
(2, 3, 'You''re All I Am', '3:24'),
(2, 4, 'Back Where You Belong', '3:15'),
(2, 5, 'Love Has Taken Its Toll', '3:31'),
(2, 6, 'Double Vision', '3:44'),
(2, 7, 'Tramontane (Instrumental)', '3:56'),
(2, 8, 'I Have Waited So Long', '4:07'),
(2, 9, 'Lonely Children', '3:37'),
(2, 10, 'Spellbinder', '4:55'),
(2, 11, 'Hot Blooded [Live Version]', '6:57'),
(2, 12, 'Love Maker [Live Version]', '6:48'),
(1, 5, 'Starrider', '4:01'),
(1, 6, 'Double Vision', '3:44'),
(2, 7, 'Blue Morning, Blue Day', '3:12'),
(1, 8, 'Hot Blooded', '4:27'),
(1, 9, 'Dirty White Boy', '3:40'),
(1, 10, 'Head Games', '3:40'),
(1, 11, 'Women', '3:26'),
(1, 12, 'Night Life', '3:51'),
(1, 13, 'Break It Up', '4:15'),
(1, 14, 'Juke Box Hero', '4:22'),
(2, 15, 'Urgent', '4:30'),
(1, 16, 'Waiting For A Girl Like You', '5:01'),
(1, 17, 'I Want To Know What Love Is', '5:01'),
(1, 18, 'Down On Love', '4:08'),
(1, 19, 'Reaction To Action', '3:32'),
(0, 0, '', ''),
(1, 20, 'That Was Yesterday', '3:50'),
(1, 21, 'Say You Will', '4:15'),
(1, 22, 'I Don''t Want To Live Without You', '3:57'),
(1, 23, 'Can''t Wait', '4:31'),
(1, 24, 'Tooth And Nail', '3:57'),
(1, 25, 'Heart Turns To Stone', '4:11'),
(1, 26, 'Lowdown And Dirty', '4:23'),
(1, 27, 'I''ll Fight For You', '6:03'),
(1, 28, 'Until The End Of Time', '4:53'),
(1, 20, 'That Was Yesterday', '3:50'),
(1, 21, 'Say You Will', '4:15'),
(1, 22, 'I Don''t Want To Live Without You', '3:57'),
(1, 23, 'Can''t Wait', '4:31'),
(1, 24, 'Tooth And Nail', '3:57'),
(1, 25, 'Heart Turns To Stone', '4:11'),
(1, 26, 'Lowdown And Dirty', '4:23'),
(1, 27, 'I''ll Fight For You', '6:03'),
(1, 28, 'Until The End Of Time', '4:53'),
(1, 30, 'Say You Will [Live 2008]', '4:31'),
(1, 31, 'Starrider [Live 2005]', '7:04'),
(1, 32, 'Juke Box Hero / Whole Lotta Love [Live 2005]', '8:43'),
(1, 29, 'Too Late', '3:45'),
(4, 1, 'Working for the Week', '3:41'),
(4, 2, 'When It''s Over', '5:07'),
(4, 3, 'Jump', '3:39'),
(4, 4, 'Gangs In The Street', '4:34'),
(4, 5, 'Emotional', '4:53'),
(4, 6, 'Lucky Ones', '3:50'),
(4, 7, 'It''s Your Life', '4:04'),
(4, 8, 'Watch Out', '3:57'),
(4, 9, 'Take Me To The Top', '6:11'),
(4, 10, 'I Told You So', '1:12'),
(4, 11, 'Boy Like The Girl', '4:30'),
(4, 12, 'Your Town Saturday Night', '3:07'),
(4, 13, 'Working For The Week', '3:47'),
(5, 1, 'Fire Me Up', '3:45'),
(5, 2, 'Countin'' The Nights', '3:50'),
(5, 3, 'Ain''t Such a Bad Thing', '3:59'),
(5, 4, 'Come Undone', '4:06'),
(5, 5, 'Slave', '4:41'),
(5, 6, 'What Makes You So Special', '4:03'),
(5, 7, 'War Bride', '6:19'),
(5, 8, 'Doin'' It The Hard Way', '3:32'),
(5, 9, 'You Play The Star', '4:38'),
(5, 10, 'Crack Of The Whip', '5:55'),
(7, 1, 'I Need Your Love', '5:33'),
(7, 2, 'Surrender to Me', '5:34'),
(7, 3, 'Livin'' for You', '4:58'),
(7, 4, 'Walin'' at Night', '2:02'),
(7, 5, 'Walk On', '2:58'),
(7, 6, 'Get Organ-ized/Get Reogan-ized', '4:28'),
(7, 7, 'Walk On (Some More)', '2:55'),
(7, 8, 'What''s Your Name', '4:28'),
(7, 9, 'Magdalene', '5:58'),
(7, 10, 'We Can Make It', '5:30'),
(6, 1, 'More Than a Feeling', '4:44'),
(6, 2, 'Peace of Mind', '5:02'),
(6, 3, 'Foreplay/Long Time', '7:47'),
(6, 4, 'Rock and Roll Band', '3:00'),
(6, 5, 'Smokin', '4:22'),
(6, 6, 'Hitch a Ride', '4:12'),
(6, 7, 'Something About You', '3:48'),
(6, 8, 'Let Me Take You Home Tonight', '4:44'),
(8, 1, 'Everybody (Backstreet''s Back)', '4:46'),
(8, 2, 'As Long As You Love Me', '3:32'),
(8, 3, 'Quit Playing Games (With My Heart)', '3:53'),
(8, 4, 'I''ll Never Break Your Heart', '4:47'),
(8, 5, 'We''ve Got It Goin'' On', '3:40'),
(8, 6, 'All I Have to Give', '4:35'),
(8, 7, 'The Call', '3:24'),
(8, 8, 'I Want It That Way', '3:34'),
(8, 9, 'Show Me the Meaning of Being Lonely', '3:55'),
(8, 10, 'Get Down (You''re the One for Me)', '3:51'),
(8, 11, 'If You Stay', '4:17'),
(8, 12, 'The One', '3:46'),
(8, 13, 'Shape of My Heart', '3:51'),
(8, 14, 'More Than That', '3:44'),
(8, 15, 'Larger Than Life', '3:52'),
(9, 1, 'Oye Como Va', '4:04'),
(9, 2, 'Anything''s Possible', '4:32'),
(9, 3, 'Work to Do', '4:18'),
(9, 4, 'You''ve Got Mail', '5:17'),
(9, 5, 'Creepin''', '4:38'),
(9, 6, 'Groovin'' (On A Sunday Afternoon)', '3:38'),
(9, 7, 'Sizzlin''', '4:29'),
(9, 8, 'Trail of Tears', '4:02'),
(9, 9, 'Evil Ways', '4:37'),
(9, 10, 'Do That Again', '5:26'),
(10, 1, 'Holy Grail', '5:38'),
(10, 2, 'Picasso Baby', '4:06'),
(10, 3, 'Tom Ford', '3:09'),
(10, 4, 'F*WithMeYouKnowIGotIt', '4:03'),
(10, 5, 'Oceans', '3:58'),
(10, 6, 'F.U.T.W.', '4:02'),
(10, 7, 'Somewhereinamerica', '2:28'),
(10, 8, 'Crown', '4:33'),
(10, 9, 'Heaven', '4:03'),
(10, 10, 'Versus', '0:51'),
(10, 11, 'Part II (On the Run)', '5:33'),
(10, 12, 'Beach Is Better', '0:55'),
(10, 13, 'BBC', '3:12'),
(10, 14, 'JAY Z Blue', '3:50'),
(10, 15, 'La Familia', '3:33'),
(10, 16, 'Nickels and Dimes', '5:03');

-- --------------------------------------------------------

--
-- Table structure for table `uapg`
--

CREATE TABLE IF NOT EXISTS `uapg` (
  `ua` varchar(64) NOT NULL,
  `up` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uapg`
--

INSERT INTO `uapg` (`ua`, `up`) VALUES
('Andrew', '$2y$10$KInibRSRl7r1K3akWlT48.aCG1sIyQAnoL1xbFtRCRy/rKpo5bbUC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `uapg`
--
ALTER TABLE `uapg`
 ADD UNIQUE KEY `ua` (`ua`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
