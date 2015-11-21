-- init groups table

CREATE TABLE `Groups`(
  `gid` int PRIMARY KEY AUTO_INCREMENT COMMENT 'Group ID',
  `gname` VARCHAR(30) BINARY CHARACTER SET 'utf8' NOT NULL UNIQUE COMMENT 'Group Name'
) COMMENT 'User Groups'

-- init groups end