<?php
// PHP Grid database connection settings
define("PHPGRID_DBTYPE","Mysql"); // or mysqli
define("PHPGRID_DBHOST","mysql.serversfree.com");
define("PHPGRID_DBUSER","u851320107_root");
define("PHPGRID_DBPASS","manoj123456");
define("PHPGRID_DBNAME","u851320107_hms");

// Automatically make db connection inside lib
define("PHPGRID_AUTOCONNECT",0);

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);
