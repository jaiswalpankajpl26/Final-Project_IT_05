<?php

require_once 'class.config.php';
class sqlFunction extends configuration {
    private $connection;  
    protected $datetime;  
    protected $currentDate;
    protected $myDate;
    
    
    protected function  __construct() {
        parent::__construct();
        $this->connection = mysql_connect($this->mysqlServer, $this->mysqlUsername, $this->mysqlPassword);

        date_default_timezone_set('Asia/Calcutta');
        $this->datetime = date('c');
        $this->currentDate = date("d-m-y");  
		$this->myDate = date("Ymd");
        
    }

    protected function processQuery($sqlQuery){
        mysql_select_db($this->mysqlDatabase, $this->connection);
        $query = mysql_query($sqlQuery);// or die(mysql_error());
     //   echo '<div align="right">'.$query.'</div>';

        if(!$query)
            return false;

        return $query;
    }

    protected function processArray($sqlQuery){
        mysql_select_db($this->mysqlDatabase, $this->connection);
        if($query = $this->processQuery($sqlQuery)){
            if(mysql_num_rows($query)){
                $query = mysql_fetch_array($query);
                return $query;
            }
            return false;
        }
        return false;
    }

    protected function getValue($column, $table, $condition, $value){     

        $query = "SELECT $column FROM $table WHERE $condition = \"$value\" LIMIT 1";
       
      
        if($query = $this->processArray($query))
                return $query[0];

        return false;

    }

    protected function getCounter($field){
        $query = "SELECT starter, value FROM counter WHERE field = \"$field\" ";

        if($query = $this->processQuery($query)){
            if(mysql_num_rows($query) == 1){
                $query = mysql_fetch_array($query);
                
                $counter = $query['starter'].($query['value'] + 1);
                $this->updateCounter($counter);
                return $counter;
            }
            return false;
        }
        return false;
    }

    protected function updateCounter($counter){
        $starter = substr($counter, 0, 3);      //the first three characters of the counter
        $length = strlen($counter) - 3;

        $counter = substr($counter, 3, $length);

        $query = "UPDATE counter SET value = \"$counter\" WHERE starter = \"$starter\" ";
        $this->processQuery($query);
    }
    
    protected function getCounterTable($id){
    	$starter = substr($id, 0, 3);
    	$sqlQuery = "SELECT table_name FROM counter WHERE starter = \"$starter\" ";
    	
    	$sqlQuery = $this->processArray($sqlQuery);
    	
    	return $sqlQuery[0];
    }
    
    protected function getTableIdDetails($id){
    	$table = $this->getCounterTable($id);
    	$sqlQuery = "SELECT * FROM $table WHERE id = \"$id\" ";
    	return $this->processArray($sqlQuery);
    }
    
    protected function dropTableId($id, $flag){
    	$table = $this->getCounterTable($id);
    	if ($flag)
    		$sqlQuery = "DELETE FROM $table WHERE id = \"$id\" ";
    	else 
    		$sqlQuery = "UPDATE $table SET active = \"n\" WHERE id = \"$id\" ";
    	$this->processQuery($sqlQuery); 

    	$this->logProcess($id, "Dropped By The User");
    }
    
    
    protected function ActivateTableId($id, $flag){
    	$table = $this->getCounterTable($id);
    	if ($flag)
    		$sqlQuery = "DELETE FROM $table WHERE id = \"$id\" ";
    	else 
    		$sqlQuery = "UPDATE $table SET active = \"y\" WHERE id = \"$id\" ";
    	$this->processQuery($sqlQuery); 

    	$this->logProcess($id, "Activated By The User");
    }
    
    
    protected function getDataArray($resourceId){
    	$data = array();
    	if (func_num_args() > 1){
    		$i = 0;
    		while ($result = mysql_fetch_array($resourceId)){
    			$data[$i] = array();
    			for ($count = 0; $count < func_get_arg(1); ++$count)
    				array_push($data[$i], $result[$count]);
    			++$i;
    		}
    	}else{
    		while ($result = mysql_fetch_array($resourceId)){
    			array_push($data, $result[0]);
    		}
    	}
    	return $data;    	
    }   
    
	protected function getLoggedUser(){
    	return $_SESSION['loggedUser'];
    }
    
    public function getLoggedPatient()
    {
    	return  $_SESSION['PatientLogged'];
    }
    
	public function logProcess($operation_id, $operation){
    	$counter = $this->getCounter('userlog');
    	$sqlQuery = "INSERT INTO userlog 
    					(id, operation_id, officer_id, datetime, operation) 
    					VALUES (\"$counter\", \"$operation_id\", \"".$this->getLoggedUser()."\", \"$this->datetime\", \"$operation\")";
    	$this->processQuery($sqlQuery);
    }

    public function getFlagValue($flag){
    	return $this->getValue('comments', 'flag', 'flag', $flag);
    }
    
    public function getDateDisplay($date=''){
    	if($date == '')
    	{
    		$date = $this->currentDate;
    	}
    	$data = explode('-', $date);
    	return date("F d, Y", mktime(0, 0, 0, $data[1], $data[0], $data[2]));
    }
    
     public function malert($message, $url){     //this function is used to show a alert box with the message defined within
        echo "<script>
          alert( \"$message\" );
          </script>";
        $this->redirect($url);        
    } 
    
    public function redirect($url){             //this function is used to redirect the user to any url 
    	echo "<script type=\"text/javascript\">
                    window.location= \"$url\"
            </script>";
        echo "Please Wait For Some Time. If The Time Exceeds For More Than 15 Seconds Then The javascript Of Your Browser is Disabled. So Please Enable it to use the software";
        exit(0);
    }
    
    
}
?>
