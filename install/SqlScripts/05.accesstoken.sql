-- init Access Token Table

CREATE TABLE `acctokens`(
  `id` INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Token ID',
  `app` INT NOT NULL COMMENT 'App Connect ID',
  `uid` INT NOT NULL COMMENT 'App Connect User',
  `token` VARCHAR(32) BINARY COLLATE 'utf8_bin' COMMENT 'Access Token',
  `refresh` VARCHAR(32) BINARY COLLATE 'utf8_bin' COMMENT 'Refresh Token',
  `token_expire` TIMESTAMP COMMENT 'Token Expired Time',
  `refresh_expire` TIMESTAMP COMMENT 'Refresh Expired Time'
) COMMENT 'Access Tokens'

-- init end

/*
  1. User can deactivate Tokens
  2. Access Token is valid for 30 minutes
  3. Refresh Token is valid for 7 days
  4. Refresh Token will be rebuit when App has rebuilt Access Token
 */