<?php
$DBDebug = false;
$DBDebugToFile = false;

// need for old distros
define('CACHED_b_lang', 3600);
define('CACHED_b_agent', 3600);
define('CACHED_b_lang_domain', 3600);

define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);
@umask(~(BX_FILE_PERMISSIONS|BX_DIR_PERMISSIONS)&0777);

define("MYSQL_TABLE_TYPE", "INNODB");
define("SHORT_INSTALL", true);


define("BX_UTF", true);

define("BX_CRONTAB_SUPPORT", true);
define("BX_DISABLE_INDEX_PAGE", true);
define("BX_COMPRESSION_DISABLED", true);
define("BX_USE_MYSQLI", true);


//define("BX_TEMPORARY_FILES_DIRECTORY", "/home/bitrix/.bx_temp/dbmuttivillas/");


if (isset($_SERVER['HTTP_X_FORWARDED_PORT']) && !empty($_SERVER['HTTP_X_FORWARDED_PORT'])) {
    $_SERVER['SERVER_PORT'] = $_SERVER['HTTP_X_FORWARDED_PORT'];
}


?>
