--
-- Database: `loginsystem`
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `role` varchar(20) NOT NULL,
  `headline` varchar(40) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `userImg` varchar(500) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

