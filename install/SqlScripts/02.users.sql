-- init User table

CREATE TABLE `Users` (
  `uid`        INT PRIMARY KEY AUTO_INCREMENT
  COMMENT 'User ID',
  `name`       VARCHAR(30) BINARY
               COLLATE 'utf8_bin' NOT NULL UNIQUE
  COMMENT 'User Name',
  `password`   TEXT BINARY
               COLLATE 'utf8_bin' NOT NULL
  COMMENT 'User Password',
  `mail`       TEXT               NOT NULL
  COLLATE 'utf8_general_ci'
  COMMENT 'User E-Mail',
  `group`      INT DEFAULT 1000   NOT NULL
  COMMENT 'User Group',
  `mailstatus` BOOL            DEFAULT FALSE
  COMMENT 'User E-Mail Check Status'
)
  COMMENT 'User List'

-- init User end

