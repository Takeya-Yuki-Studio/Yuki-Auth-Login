-- init apps table

CREATE TABLE `Apps` (
  `appid`       INT                                                            AUTO_INCREMENT PRIMARY KEY
  COMMENT 'App ID',
  `appname`     VARCHAR(32)                                           NOT NULL UNIQUE
  COMMENT 'App Name',
  `apptype`     ENUM('WinApp', 'AndroidApp', 'iOSApp', 'Web', 'cURL') NOT NULL DEFAULT 'cURL'
  COMMENT 'App Type',
  `cURLAgent`   VARCHAR(100)                                                   DEFAULT 'cURL'
  COMMENT 'cURL User-Agent (RESTAPI ONLY)',
  `returnUrl`   VARCHAR(250)                                                   DEFAULT 'oob'
  COMMENT 'Return URL (Web Only)',
  `secret`      VARCHAR(32) BINARY
                COLLATE 'utf8_bin'                                    NOT NULL
  COMMENT 'App Secret',
  `connecttime` TIMESTAMP                                             NOT NULL
  COMMENT 'Connect Time',
  `status`      INT                                                            DEFAULT 0
  COMMENT 'Connect Status'
)
  COMMENT 'Apps'

-- init apps end
/*

 Connect Status (来源显示只适合于主认证系统是社交平台的情况):
  0 - Developing (显示: 来自未经审核的应用)
  1 - Waiting for Review (显示: 来自未经审核的应用)
  2 - Review Rejected (显示: 来自未经审核的应用)
  3 - Review Accepted (显示: 来自应用)
  4 - Online (显示: 来自应用)

 */