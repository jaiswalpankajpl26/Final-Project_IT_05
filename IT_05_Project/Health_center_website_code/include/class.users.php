<?php
require_once 'class.sqlFunctions.php';

class users extends sqlFunction {
	private $candidate_details;
	private $candidate_id;
	
	public function __construct() {
		parent::__construct ();
	}
	
	public function addOfficer($name, $username, $password, $designation, $specialization = '', $room = '') {
		$counter = $this->getCounter ( 'officer' );
		$sqlQuery = "INSERT INTO officer(id,username,name,password,job,active)
				VALUES(\"$counter\",\"$username\",\"$name\",\"$password\",\"$designation\",\"y\") ";
		if ($this->processQuery ( $sqlQuery ))
			if ($designation == "doctor") {
				$ncounter = $this->getCounter ( 'doctor' );
				$sqlQuery = "INSERT INTO doctor(id,dr_id,room_no,specialization)  VALUES(\"$ncounter\",\"$counter\",\"$room\",\"$specialization\")";
				if ($this->processQuery ( $sqlQuery ))
					return $counter;
			} else {
				return $counter;
			}
	
	}
	
	public function notExist($username) {
		$sqlQuery = "SELECT id FROM officer WHERE username = \"$username\"";
		$query = $this->processQuery ( $sqlQuery );
		//echo '<div align="right">'. mysql_num_rows($query).'</div>';
		if (mysql_num_rows ( $query ) > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	public function notExistCard($username) {
		$sqlQuery = "SELECT id FROM officer WHERE username = \"$username\"";
		$query = $this->processQuery ( $sqlQuery );
		//echo '<div align="right">'. mysql_num_rows($query).'</div>';
		if (mysql_num_rows ( $query ) > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	public function getAllOfficer($type, $flag) {
		if ($flag) {
			
			if ($type) {
				$sqlQuery = "SELECT id FROM `officer` WHERE job =\"$type\" && active=\"y\" ";
			} else {
				$sqlQuery = "SELECT id FROM `officer` WHERE active=\"y\"";
			}
		} else {
			if ($type) {
				$sqlQuery = "SELECT id FROM `officer` WHERE job =\"$type\" ";
			} else {
				$sqlQuery = "SELECT id FROM `officer`";
			}
		}
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
		public function getAllLockedOfficer()
		 {
		$sqlQuery = "SELECT id FROM `officer` WHERE active=\"y\" && status=\"n\" ";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getOfficerDetails($id) {
		$sqlQuery = "SELECT * FROM officer WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	
	// Patient Details 
	

	public function getAllUser($type, $flag) {
		if ($flag) {
			if ($type == 'staff') {
				$sqlQuery = "SELECT patient.id FROM `staff` , `patient` WHERE staff.staff_id = patient.id && patient.active = \"y\"";
			
			} elseif ($type == 'family') {
				$sqlQuery = "SELECT patient.id FROM `family` , `patient` WHERE family.family_id = patient.id && patient.active = \"y\"";
			} elseif ($type == 'student') {
				$$sqlQuery = "SELECT patient.id FROM `student` , `patient` WHERE student.student_id = patient.id && patient.active = \"y\"";
			} else {
				$sqlQuery = "SELECT id FROM `patient` WHERE active = \"y\"";
			}
		} else {
			if ($type == 'staff') {
				$sqlQuery = "SELECT id FROM  `patient` WHERE type=\"staff\" ORDER BY name ASC";
			
			} elseif ($type == 'family') {
				$sqlQuery = "SELECT id FROM  `patient` WHERE type=\"family\" ORDER BY name ASC";
			} elseif ($type == 'student') {
				$$sqlQuery = "SELECT id FROM  `patient` WHERE type=\"student\" ORDER BY name ASC";
			} else {
				$sqlQuery = "SELECT id FROM `patient` ORDER BY name ASC";
			}
		}
		
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	
	}
	
	public function getUserDetails($id) {
		$sqlQuery = "SELECT * FROM `patient` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getStaffDetail($id) {
		$sqlQuery = "SELECT * FROM `staff` WHERE staff_id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function addUserStudent($card_no, $password, $name, $dob, $contact, $address, $department, $validity, $course, $branch, $sex) {
		$counter = $this->getCounter ( 'patient' );
		$sqlQuery = "INSERT INTO `patient` (id,cardNo,password,name,dob,contact_no,address,validity,type,sex,active)
					VALUES (\"$counter\",\"$card_no\",\"$password\",\"$name\",\"$dob\",\"$contact\",\"$address\"
					,\"$validity\",\"student\",\"$sex\",\"y\")";
		if ($this->processQuery ( $sqlQuery )) {
			$ncounter = $this->getCounter ( 'student' );
			$sqlQuery = "INSERT INTO `student` (id,student_id,department,course,branch) VALUES(\"$ncounter\",\"$counter\",\"$department\",\"$course\",\"$branch\")";
			if ($this->processQuery ( $sqlQuery ))
				return $counter;
		}
	}
	
	public function updateUserStudent($id, $password, $name, $dob, $contact, $address, $department, $validity, $course, $branch, $sex, $status) {
		
		$sqlQuery = "UPDATE  `patient` SET 	password=\"$password\",
											name=\"$name\",
											dob=\"$dob\",
											contact_no=\"$contact\",
											address=\"$address\",
											
											validity=\"$validity\",
											sex = \"$sex\",
											active=\"$status\"
											 WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery )) {
			
			$sqlQuery = "UPDATE `student` SET course = \"$course\",
												branch = \"$branch\",
												department=\"$department\"
												WHERE student_id = \"$id\"";
			if ($this->processQuery ( $sqlQuery ))
				return true;
		}
	}
	
	public function addUserStaff($password, $name, $dob, $contact, $address, $department, $validity, $designation, $sex) {
		$counter = $this->getCounter ( 'patient' );
		$cardSr = $this->getCounter('employee_cardno');
		$card_no = explode("CC", $cardSr);
		$cardNo = "HC".sprintf("%04d",$card_no[1]);
		
		$sqlQuery = "INSERT INTO `patient` (id,cardNo,password,name,dob,contact_no,address,validity,type,sex,active)
					VALUES (\"$counter\",\"$cardNo\",\"$password\",\"$name\",\"$dob\",\"$contact\",\"$address\"
					,\"$validity\",\"staff\",\"$sex\",\"y\")";
	//	echo "<div style='text-align:right;width:100%'>".$sqlQuery."</div>";
		if ($this->processQuery ( $sqlQuery )) {
			$ncounter = $this->getCounter ( 'staff' );
			$sqlQuery = "INSERT INTO `staff` (id,staff_id,department,designation) VALUES(\"$ncounter\",\"$counter\",\"$department\",\"$designation\")";
			if ($this->processQuery ( $sqlQuery ))
				return $counter;
		}
	}
	
	public function updateUserStaff($id, $password, $name, $dob, $contact, $address, $department, $validity, $designation, $sex, $status) {
		$sqlQuery = "UPDATE  `patient` SET 		password=\"$password\",
											name=\"$name\",
											dob=\"$dob\",
											contact_no=\"$contact\",
											address=\"$address\",
											
											validity=\"$validity\",
											sex = \"$sex\",
											active=\"$status\"
											 WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery )) {
			$sqlQuery = "UPDATE `staff` SET designation = \"$designation\",
												department=\"$department\"
												WHERE staff_id = \"$id\"";
			if ($this->processQuery ( $sqlQuery ))
				return true;
		}
	}
	
	public function addUserFamily( $password, $name, $dob, $contact, $address, $validity, $relation, $staff_name, $sex) {
		$counter = $this->getCounter ( 'patient' );
		$cardSr = $this->getCounter('employee_cardno');
		$card_no = explode("CC", $cardSr);
		$cardNo = "HC".sprintf("%04d",$card_no[1]);
		
		$sqlQuery = "INSERT INTO `patient` (id,cardNo,password,name,dob,contact_no,address,validity,type,sex,active)
					VALUES (\"$counter\",\"$cardNo\",\"$password\",\"$name\",\"$dob\",\"$contact\",\"$address\"
					,\"$validity\",\"family\",\"$sex\",\"y\")";
		if ($this->processQuery ( $sqlQuery )) {
			$ncounter = $this->getCounter ( 'family' );
			$sqlQuery = "INSERT INTO `family` (id,family_id,relationship,staff) VALUES(\"$ncounter\",\"$counter\",\"$relation\",\"$staff_name\")";
			if ($this->processQuery ( $sqlQuery ))
				return $counter;
		}
	}
	
	public function updateUserFamily($id, $password, $name, $dob, $contact, $address, $validity, $relation, $staff_name, $sex, $status) {
		$sqlQuery = "UPDATE  `patient` SET    password=\"$password\",
											name=\"$name\",
											dob=\"$dob\",
											contact_no=\"$contact\",
											address=\"$address\",
											
											validity=\"$validity\",
											sex = \"$sex\",
											active=\"$status\"
											 WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery )) {
			$sqlQuery = "UPDATE `family` SET relationship = \"$relation\",
												staff=\"$staff_name\"
												WHERE family_id = \"$id\"";
			if ($this->processQuery ( $sqlQuery ))
				return true;
		}
	}
	
	public function dropUser($id) {
		$sqlQuery = "UPDATE `patient` SET active=\"n\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function activateUser($id) {
		$sqlQuery = "UPDATE `patient` SET active=\"y\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getFamily($id) {
		$sqlQuery = "SELECT * FROM `family` WHERE family_id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getStudent($id) {
		$sqlQuery = "SELECT * FROM `student` WHERE student_id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getStaff($id) {
		$sqlQuery = "SELECT * FROM `staff` WHERE staff_id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getStaffNameById($id) {
		$sqlQuery = "SELECT patient.name FROM `staff`,`patient` WHERE staff.staff_id = patient.id && staff.id = \"$id\"";
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
	}
	
	public function getIdByCardNo($card_no) {
		$sqlQuery = "SELECT id FROM `patient` WHERE cardNO = \"$card_no\"";
		$det = $this->processArray ( $sqlQuery );
		if ($det [0])
			return $det [0];
		else
			return false;
	}
	
	public function searchUsersByName($name) {
		$sqlQuery = "SELECT id FROM `patient` WHERE name LIKE \"%$name%\"";
		//echo "<div align=\"right\">".$sqlQuery."</div>";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	
	}
	
	public function getAllActiveOfficer($type) {
		$sqlQuery = "SELECT id FROM `officer` WHERE job=\"$type\"";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	
	}
	
	public function assignDuty($doctor, $day, $ftime, $ttime) {
		$time = $ftime . " to " . $ttime;
		$counter = $this->getCounter ( 'timing' );
		$sqlQuery = "INSERT INTO `timing` (id,doctor,day,time) VALUES(\"$counter\",\"$doctor\",\"$day\",\"$time \")";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	
	}
	
	public function getDoctorBySpecialization($sp) {
		$sqlQuery = "SELECT id FROM `doctor` WHERE specialization = \"$sp\" ";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	public function getAllDoctorIds() {
		$sqlQuery = "SELECT id FROM `doctor` ";
		$data = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		return $data;
	}
	
	public function getDrDetail($id) {
		$sqlQuery = "SELECT * FROM `doctor` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getSpByDrId($dr) {
		$sqlQuery = "SELECT specialization FROM `doctor`  WHERE id = \"$dr\"";
		
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
	}
	
	public function getRoomByDrId($dr) {
		$sqlQuery = "SELECT room_no FROM `doctor`  WHERE dr_id = \"$dr\"";
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
	}
	
	public function dropOfficer($id) {
		$sqlQuery = "UPDATE `officer` SET active=\"n\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function activateOfficer($id) {
		$sqlQuery = "UPDATE `officer` SET active=\"y\" WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function deleteOfficer($id) {
		$sqlQuery = "DELETE FROM `officer` WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getDrIdByOfficerId($id) {
		$sqlQuery = "SELECT id FROM `doctor` WHERE dr_id=\"$id\"";
		$data = $this->processArray ( $sqlQuery );
		return $data [0];
	}
	
	public function getRegDetails($id) {
		$sqlQuery = "SELECT * FROM `rgistration` WHERE id=\"$id\"";
		return $this->processArray ( $sqlQuery );
	}
	
	public function getOfficerNameById($id) {
		$sqlQuery = "SELECT name FROM `officer` WHERE id=\"$id\"";
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
	
	}
	
	public function updateOfficer($id, $name, $password = '') {
		if ($password == '') {
			$sqlQuery = "UPDATE `officer` SET name=\"$name\" WHERE id=\"$id\"";
		} else {
			$sqlQuery = "UPDATE `officer` SET name=\"$name\" , password=\"$password\" WHERE id=\"$id\"";
		}
		
		if ($this->processQuery ( $sqlQuery ))
			return true;
	}
	
	public function getPassword() {
		$user = $this->getLoggedUser ();
		if($user != ''){
		$sqlQuery = "SELECT password FROM `officer` WHERE id=\"$user\"";
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
		}
		else {
			$us = $this->getLoggedPatient();
		$sqlQuery = "SELECT password FROM `patient` WHERE id=\"$us\"";
		$det = $this->processArray ( $sqlQuery );
		return $det [0];
		}
	}
	
	public function changePassword($password) {
		if($this->getLoggedUser () != ''){
			$ofc = $this->getLoggedUser ();
		$sqlQuery = "UPDATE `officer` SET password = \"$password\" WHERE id = \"$ofc\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;	
		}
		else{
			$ofc = $this->getLoggedPatient();
		$sqlQuery = "UPDATE `patient` SET password = \"$password\" WHERE id = \"$ofc\"";
		if ($this->processQuery ( $sqlQuery ))
			return true;
		}
		
	}
	
	public function getloggedOfficer(){
		return $this->getLoggedUser();
	}
	
public function unlockOfficer($id) {
		$sqlQuery = "UPDATE officer SET status=\"y\", attempt =\"0\"  WHERE id=\"$id\"";
		if ($this->processQuery ( $sqlQuery ))
		return true;
	}
	
	public function updateLoginTrack(){
		$ofc = $this->getloggedOfficer();
		$sqlQuery = "SELECT id FROM login_track WHERE officer=\"$ofc\" ORDER BY logout_time DESC LIMIT 1";
		
		$ids  = $this->getDataArray ( $this->processQuery ( $sqlQuery ) );
		foreach ($ids as $id){
			$sqlQuery = "UPDATE login_track SET logout_time = \"$this->datetime\" WHERE id=\"$id\"";
			
			if($this->processQuery($sqlQuery))
			return true;
		}
		
		
	}

}