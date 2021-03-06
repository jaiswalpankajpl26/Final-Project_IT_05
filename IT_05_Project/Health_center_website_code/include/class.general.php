<?php
require_once 'class.sqlFunctions.php';

class general extends sqlFunction {
	private $general_id;
	
	public function __construct() {
		parent::__construct ();
	}
	
	public function addOption($name, $type) {
		$counter = $this->getCounter ( 'option' );
		$sql = "INSERT INTO `option` (id, name, type, active) VALUES (\"$counter\", \"$name\", \"$type\", \"y\")";
		if ($this->processQuery ( $sql ))
			return $counter;
	}
	
	public function updateOption($id, $name, $type) {
		$sqlQuery = "UPDATE `option` SET name = \"$name\", type = \"$type\" WHERE id = \"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getOption($type) {
		
		$sqlQuery = "SELECT id FROM `option` WHERE type =\"$type\" && active=\"y\" ";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getOptionDetail($id) {
		$sqlQuery = "SELECT * FROM `option` WHERE id=\"$id\"";
		return $this->detail = $this->processArray ( $sqlQuery );
	
	}
	
	public function getoptionValue() {
		return $this->detail [1];
	}
	
	public function getOptionValueById($id) {
		$sqlQuery = "SELECT name FROM `option` WHERE id=\"$id\"";
		$data = $this->processArray ( $sqlQuery );
		return $data [0];
	
	}
	
	public function getTimingId($dc) {
		$sqlQuery = "SELECT id FROM `timing` WHERE doctor = \"$dc\" ";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getTimeById($id) {
		$sqlQuery = "SELECT time FROM `timing` WHERE id = \"$id\" ";
		$data = $this->processArray ( $sqlQuery );
		return $data [0];
	
	}
	
	public function getDayById($id) {
		$sqlQuery = "SELECT day FROM `timing` WHERE id = \"$id\" ";
		$data = $this->processArray ( $sqlQuery );
		return $data [0];
	}
	
	public function updateTiming($id, $day, $time) {
		$sqlQuery = "UPDATE `timing` SET day = \"$day\",
										time = \"$time\"
								WHERE id=\"$id\" ";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function deleteTime($id) {
		$sqlQuery = "DELETE FROM `timing` WHERE id = \"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	public function doRegistration($pid, $rid, $did){
		
		$counter = $this->getCounter ( 'registration' );
		$srn = $this->getCounter ( 'sr' );
		$r = explode ( "N", $srn );
		$sr = "MNNIT/HC/" . $this->myDate . "/" . $r [1];
		$tab = $this->getCounterTable ( $srn );
		$today = $this->myDate;
		if ($today > $tab) {
			
			$this->updateTableName ( $today );
			$sr = "MNNIT/HC/" . $this->myDate . "/1";
		}
		
		$sqlQuery = "INSERT INTO `rgistration` (id,sr_no,patient_id,receptionist,doctor,checked,checkup_time,referred,mode,active)
												VALUES(\"$counter\",\"$sr\",\"$pid\",\"$rid\",\"$did\",\"n\",\"$this->datetime\",\"NONE\",\"n\",\"y\")";
		if ($this->processQuery ( $sqlQuery ))
			return $counter;
	
	}
	
	
	public function doOffRegistration($pid, $rid, $did) {
		
		$counter = $this->getCounter ( 'registration' );
		$srn = $this->getCounter ( 'sr' );
		$r = explode ( "N", $srn );
		$sr = "MNNIT/HC/" . $this->myDate . "/" . $r [1];
		$tab = $this->getCounterTable ( $srn );
		$today = $this->myDate;
		if ($today > $tab) {
			
			$this->updateTableName ( $today );
			$sr = "MNNIT/HC/" . $this->myDate . "/1";
		}
		
		$sqlQuery = "INSERT INTO `rgistration` (id,sr_no,patient_id,receptionist,doctor,checked,checkup_time,referred,mode,active)
												VALUES(\"$counter\",\"$sr\",\"$pid\",\"$rid\",\"$did\",\"n\",\"$this->datetime\",\"NONE\",\"f\",\"y\")";
		if ($this->processQuery ( $sqlQuery ))
			return $counter;
	
	}
	
	
	
	public function updateTableName($id) {
		$sqlQuery = "UPDATE `counter` SET table_name = \"$id\" , value=\"1\" WHERE field=\"sr\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	public function getRegistraionId($id) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE patient_id = \"$id\" && checked=\"n\" && active=\"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	public function getAllRegistraionId($id) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE patient_id = \"$id\" && active=\"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
public function deleteAdvice($id) {
		$sqlQuery = "DELETE FROM `medical_advice` WHERE id=\"$id\" && active=\"y\"";
		if($this->processQuery($sqlQuery))
		return true;	
		else return false;
	}
	
	public function activateCheckup($id){
		$sqlQuery = "UPDATE `rgistration` SET checked=\"n\" WHERE id=\"$id\"";
		if($this->processQuery($sqlQuery))
		return true;
	}
	
public function getOffRegistraionIds() {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE mode = \"f\" && checked = \"n\"  && active = \"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getRegistraionIdForDr() {
		$dr = $this->getLoggedUser ();
		$sqlQuery = "SELECT id FROM `rgistration` WHERE doctor = \"$dr\" && checked=\"n\" && referred = \"NONE\"  && active=\"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function addAdvice($pid, $rid, $advice, $p, $bp, $wt, $tp,$diag,$next, $checked = '') {
		
		$referred = $this->getValue ( "referred", "rgistration", "id", $rid );
		if ($referred == "NONE") {
			$rf = $rid;
		} else {
			do {
				$r1 = $referred;
				$referred = $this->getValue ( "referred", "referrel", "id", $referred );
			} while ( $referred != 'NONE' );
			$rf = $r1;
		}
		
		$counter = $this->getCounter ( 'medical_advice' );
		$sqlQuery = "INSERT INTO `medical_advice` (id,patient_id,regId,advice,active,timestamp,pres_given,pathology,bp,weight,temprature,diagnosis,next_visit)
						 VALUES(\"$counter\",\"$pid\",\"$rf\",\"$advice\",\"y\",\"$this->datetime\",\"n\",\"$p\",\"$bp\",\"$wt\",\"$tp\",\"$diag\",\"$next\")";
		if (mysql_query ( $sqlQuery )) {
			
			if ($checked == true) {
				$sqlQuery = "UPDATE `rgistration` SET checked = \"y\" WHERE id=\"$rid\"";
				if ($this->processQuery ( $sqlQuery ))
					return $counter;
			}
		
		}
	
	}
public function updateAdvice($aid,$pid, $rid, $advice, $p, $bp, $wt, $tp,$diag,$next, $checked = '') {
		
		$referred = $this->getValue ( "referred", "rgistration", "id", $rid );
		$rf = $rid;
		$counter = $this->getCounter ( 'medical_advice' );
		$sqlQuery = "UPDATE `medical_advice` SET patient_id = \"$pid\",
												regId = \"$rid\",
												advice = \"$advice\",
												timestamp = \"$this->datetime\",
												pathology = \"$p\",
												bp = \"$bp\",
												weight = \"$wt\",
												temprature = \"$tp\",
												diagnosis = \"$diag\",
												next_visit = \"$next\"
									WHERE id = \"$aid\" ";
		if($this->processQuery($sqlQuery))
		return true;
	
	}
	
	public function addMedicineAdvice($aid, $medicine, $quant, $dosage, $rid) {
		$counter = $this->getCounter ( 'medicine_name_quantity' );
		$sqlQuery = "INSERT INTO `medicine_name_quantity` (id,advice_id,name,quantity,dosage)
							VALUES(\"$counter\",\"$aid\",\"$medicine\",\"$quant\",\"$dosage\")";
		if (mysql_query ( $sqlQuery )) {
			return $counter;
		}
	}
public function updateMedicineAdvice($mnqId, $medicine, $quant, $dosage) {
		$sqlQuery = "UPDATE  medicine_name_quantity SET
										name = \"$medicine\",
										quantity = \"$quant\",
										dosage = \"$dosage\"
										WHERE id = \"$mnqId\" ";
		
		if (mysql_query ( $sqlQuery )) {
			return true;
		}
	}
	
	public function getAdviceId($id) {
		
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE patient_id = \"$id\" && active=\"y\" ORDER BY id DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getAdviceDetails($id) {
		$sqlQuery = "SELECT * FROM `medical_advice` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getAdviceMedId($id) {
		$sqlQuery = "SELECT id FROM `medicine_name_quantity` WHERE advice_id = \"$id\" ORDER BY id ASC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getAdviceMedDetails($id) {
		$sqlQuery = "SELECT * FROM `medicine_name_quantity` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
public function checkMedicineIssue($id) {
		$sqlQuery = "SELECT id  FROM `patient_issue` WHERE medicine_name_quantity=\"$id\"";
		
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		
		if ($data[0] != '')
			return $data[0];
		else
			return false;
	}
	
	public function getAllOptions() {
		$sqlQuery = "SELECT id FROM `option`";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		if ($data)
			return $data;
		else
			return false;
	}
	
	public function dropOption($id) {
		$sqlQuery = "UPDATE `option` SET active=\"n\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function activateOption($id) {
		$sqlQuery = "UPDATE `option` SET active=\"y\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function deleteOption($id) {
		$sqlQuery = "DELETE FROM `option` WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function updateRoom($id, $room, $sp) {
		$sqlQuery = "UPDATE `doctor` SET room_no =\"$room\", specialization = \"$sp\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getStampId($date) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE checkup_time >= \"$date\" && active=\"y\"";
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
public function getUncheckedStampId() {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE checked=\"n\" && active=\"y\"";
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getTodayStampId() {
		$date = $this->datetime;
		$rep = "00:00:00+05:30";
		$date = substr_replace ( $date, $rep, 11, 14 );
		
		$sqlQuery = "SELECT id FROM `rgistration` WHERE checkup_time >= \"$date\" && checked=\"y\"";
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getStampIdByDateDiff($sdate, $edate) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE checkup_time between \"$sdate\" AND \"$edate\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getCheckedIdByDateDiff($sdate, $edate) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE checked = \"y\" && checkup_time between \"$sdate\" AND \"$edate\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getDateTime() {
		return $this->datetime;
	}
	
	public function getRegistrationDetails($id) {
		$sqlQuery = "SELECT * FROM `rgistration` WHERE id = \"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function AddComplain($complains) {
		$user = $this->getLoggedUser ();
		
		if ($user == '') {
			
			$user = $this->getLoggedPatient ();
		
		}
		$counter = $this->getCounter ( 'complain' );
		$sqlQuery = "INSERT INTO `complain` (id,user,complains,active,timestamp)
						VALUES (\"$counter\",\"$user\",\"$complains\",\"y\",\"$this->datetime\")";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getStampDetails($id) {
		$sqlQuery = "SELECT * FROM `rgistration` WHERE id = \"$id\"";
		$data = $this->processQuery ( $sqlQuery );
		$row = mysql_fetch_array ( $data, MYSQL_ASSOC );
		return $row;
	}
	
	public function getRegistraionIdBySr($id) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE sr_no = \"$id\" && checked=\"n\" && active=\"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	
	public function getAllRegistraionIdBySr($id) {
		$sqlQuery = "SELECT id FROM `rgistration` WHERE sr_no = \"$id\" && active=\"y\" ORDER BY checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getAdviceIdByReg($id) {
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE regId = \"$id\"";
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getActiveAdviceIds() {
		
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE  active=\"y\" &&  DATE_ADD(timestamp,INTERVAL 2 DAY) >= \"$this->datetime\"";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	}
	
	public function getAllAdviceIds($id) {
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE regId = \"$id\" ";
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getComplaintIds($flag) {
		if ($flag)
			$sqlQuery = "SELECT id FROM `complain` WHERE active=\"y\" ORDER BY timestamp DESC LIMIT 100";
		else
			$sqlQuery = "SELECT id FROM `complain` ORDER BY timestamp DESC LIMIT 100";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
public function getLoginLogIds() {
		
		$sqlQuery = "SELECT id FROM `login_log` ORDER BY datetime DESC LIMIT 500";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
public function getLoginTrackIds() {
		
		$sqlQuery = "SELECT id FROM `login_track` ORDER BY login_time DESC LIMIT 500";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
public function getOnlineOfficersIds() {
		$cur_time = $this->datetime;
		$sqlQuery = "SELECT id FROM `login_track` WHERE login_time < \"$cur_time\" && logout_time > \"$cur_time\" 
		ORDER BY login_time DESC LIMIT 50";
		//echo "<div style='text-align:right'>".$sqlQuery."</div>";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		//echo "<div style='text-align:right'>".$sqlQuery."</div>";
		return $data;
	}
	
	public function getComplainIdsByDate($sdate, $edate, $flag) {
		if (func_num_args () > 2) {
			$sqlQuery = "SELECT id FROM `complain` WHERE active = \"y\" && timestamp BETWEEN \"$sdate\" AND \"$edate\"";
		} else
			$sqlQuery = "SELECT id FROM `complain` WHERE  timestamp BETWEEN \"$sdate\" AND \"$edate\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
public function getLoginLogIdsByDate($sdate, $edate) {
		$sqlQuery = "SELECT id FROM `login_log` WHERE  datetime BETWEEN \"$sdate\" AND \"$edate\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
public function getLoginTrackIdsByDate($sdate, $edate) {
		$sqlQuery = "SELECT id FROM `login_track` WHERE  login_time BETWEEN \"$sdate\" AND \"$edate\" ORDER by login_time DESC";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getComplaintDetails($id) {
		$sqlQuery = "SELECT * FROM `complain` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function dropComplains($id) {
		$sqlQuery = "UPDATE `complain` SET active=\"n\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getAllAdviceId() {
		
		$sqlQuery = "SELECT id FROM `medical_advice` ORDER BY id DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function addTest($aid, $test) {
		$counter = $this->getCounter ( 'pathology_test' );
		$sqlQuery = "INSERT INTO `pathology_test` (id,advice_id,test,active,timestamp)
					VALUES(\"$counter\",\"$aid\",\"$test\",\"y\",\"$this->datetime\")";
		if ($this->processQuery ( $sqlQuery )) {
			return $counter;
		}
	}
	
	public function getTestByAdviceIds($aid) {
		$sqlQuery = "SELECT id FROM `pathology_test` WHERE advice_id = \"$aid\" && active = \"y\"";
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getTestDetails($id) {
		$sqlQuery = "SELECT * FROM `pathology_test` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function deactivateTest($id) {
		$sqlQuery = "UPDATE `pathology_test` SET active = \"n\" WHERE id =\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	public function getInactiveTestByAdviceIds($aid) {
		$sqlQuery = "SELECT id FROM `pathology_test` WHERE advice_id = \"$aid\" && active = \"n\"";
		//echo $sqlQuery;
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getAllTestByAdviceIds($aid) {
		$sqlQuery = "SELECT id FROM `pathology_test` WHERE advice_id = \"$aid\" ";
		//echo $sqlQuery;
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getAllAdviceIdByReg($id) {
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE regId = \"$id\"";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getTodayTestedId() {
		$date = $this->datetime;
		$rep = "00:00:00+05:30";
		$date = substr_replace ( $date, $rep, 11, 14 );
		
		$sqlQuery = "SELECT id FROM `pathology_test` WHERE timestamp >= \"$date\" && active=\"n\"";
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getTestIdByDateDiff($sdate, $edate) {
		$sqlQuery = "SELECT id FROM `pathology_test` WHERE timestamp between \"$sdate\" AND \"$edate\" && active=\"n\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getActivePathologyAdviceId($id = "") {
		
		if ($id == "") {
			$sqlQuery = "SELECT id FROM `medical_advice` WHERE pathology =\"y\" ORDER BY id DESC";
		} else {
			$sqlQuery = "SELECT id FROM `medical_advice` WHERE patient_id = \"$id\" && pathology =\"y\" ORDER BY id DESC";
		}
		//echo $sqlQuery;
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function deactivateTestInMedicalAdvice($id) {
		$sqlQuery = "UPDATE `medical_advice` SET pathology = \"n\" WHERE id =\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function addReferrel($rid, $dc) {
		$counter = $this->getCounter ( 'referrel' );
		$referrer_from = $this->getLoggedUser ();
		$sqlQuery = "INSERT INTO `referrel` (id,regid,doctor,checkup_time,referred_from,referred)
					VALUES(\"$counter\",\"$rid\",\"$dc\",\"$this->datetime\",\"$referrer_from\",\"NONE\")";
		if ($this->processQuery ( $sqlQuery )) {
			return $counter;
		}
	}
	
	public function updateRegOnReferrel($rid, $refId) {
		$referred = $this->getValue ( "referred", "rgistration", "id", $rid );
		if ($referred == "NONE") {
			$sqlQuery = "UPDATE `rgistration` SET referred = \"$refId\" WHERE id =\"$rid\"";
		} else {
			do {
				$r1 = $referred;
				$referred = $this->getValue ( "referred", "referrel", "id", $referred );
			} while ( $referred != 'NONE' );
			$sqlQuery = "UPDATE `referrel` SET referred = \"$refId\" WHERE id =\"$r1\"";
		}
		
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	public function getReferrelIdForDr() {
		$dr = $this->getLoggedUser ();
		$sqlQuery = "SELECT referrel.id FROM `referrel`,`rgistration` WHERE referrel.regid = rgistration.id && rgistration.checked = \"n\" && referrel.doctor = \"$dr\" && referrel.referred = \"NONE\" ORDER BY referrel.checkup_time DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getDetails($id) {
		return $this->getTableIdDetails ( $id );
	}
	public function getAllPrescriptionId() {
		
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE pres_given = \"n\" && DATE_ADD(timestamp,INTERVAL 2 DAY) >= \"$this->datetime\" ORDER BY id DESC";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getMyPatients() {
		$ofc = $this->getLoggedUser();	
			
		$sqlQuery = "SELECT medical_advice.id FROM medical_advice,rgistration WHERE medical_advice.regId = rgistration.id && rgistration.doctor =\"$ofc\" && medical_advice.pres_given = \"n\" ORDER BY medical_advice.id DESC LIMIT 100";
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getAllAdviceIdByPatient($pid) {
		
		$sqlQuery = "SELECT id FROM `medical_advice` WHERE patient_id = \"$pid\" ORDER  BY timestamp DESC";
		
		
		if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
			return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		else
			return false;
	
	}
	
	public function getReferrer($rid){
		
		return $this->getValue("referred_from", "referrel", "id", $rid);
	}
public function deactivateRegistration($id) {
		$sqlQuery = "UPDATE `rgistration` SET active = \"n\" WHERE id =\"$id\" && checked=\"n\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getPrescriptionIdsByDate($sdate,$edate) {
       
        $sqlQuery = "SELECT id FROM `medical_advice` WHERE pres_given = \"n\" && timestamp >= \"$sdate\" && timestamp <= \"$edate\"  ORDER BY id DESC";
       
        if ($this->getDataArray ( $this->processQuery ( $sqlQuery ) ))
            return $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
        else
            return false;
   
    }

	
}
