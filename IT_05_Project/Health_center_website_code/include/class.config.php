<?php
error_reporting(0);
class configuration{
    protected $mysqlServer;
    protected $mysqlUsername;
    protected $mysqlPassword;
    protected $mysqlDatabase;    
    protected $baseUrl;   
	protected $mainUrl;
	
	protected $mailerUser;
	protected $mailerPwd;
	protected $mailerDB;
	
    protected function  __construct() {
        $this->mysqlServer = "172.31.100.35";       //the ip of the mysql server
        $this->mysqlUsername ="root"; //the mysql username which will connect to the server
        $this->mysqlPassword = "@root123";    //the mysql password against the given username
        $this->mysqlDatabase = "dispensary_new";      //the database where the accounts details will be saved
        $this->baseUrl = "http://172.31.100.35/new/"; //the base url for the menu construction
      	
      	$this->mailerDB = "";
      	$this->mailerPwd = "";
      	$this->mailerUser = "";
    }
}
?>
